<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchesElearning;
use Illuminate\Support\Facades\Http;
use Yoeunes\Toastr\Facades\Toastr;

class PurchasedElearningController extends Controller
{
    // Payment শুরু
    public function payNow($id)
    {
        $purchase = PurchesElearning::findOrFail($id);

        // ইউনিক ট্রানজেকশন আইডি তৈরি
        $tran_id = uniqid('elearning_');
        $purchase->tran_id = $tran_id;
        $purchase->save();

        $post_data = [
            'store_id' => 'jobshubglobal0live',
            'store_passwd' => '697AE3BC06C3116685',
            'total_amount' => $purchase->price,
            'currency' => 'BDT',
            'tran_id' => $tran_id,
            'success_url' => route('ssl.success'),
            'fail_url' => route('ssl.fail'),
            'cancel_url' => route('ssl.cancel'),
            'ipn_url' => route('ssl.ipn'), // IPN must
            'cus_name' => auth()->user()->name,
            'cus_email' => auth()->user()->email,
            'cus_phone' => auth()->user()->phone ?? '017XXXXXXXX',
        ];

        $response = Http::asForm()->post('https://securepay.sslcommerz.com/gwprocess/v4/api.php', $post_data);

        if (!empty($response['GatewayPageURL'])) {
            return redirect()->away($response['GatewayPageURL']);
        }

        \Log::error('SSLCOMMERZ ERROR', $response);
        Toastr::error('Payment gateway not responding', 'Error');
        return redirect()->back();
    }

    // Payment Success
    public function success(Request $request)
    {
        // Success URL দিয়ে browser আসলে সবার আগে IPN update হবে
        Toastr::success('Payment process completed! Check your course access.', 'Success');
        return redirect()->route('dashboard');
    }

    // Payment Fail
    public function fail(Request $request)
    {
        Toastr::error('Payment Failed!', 'Error');
        return redirect()->route('dashboard');
    }

    // Payment Cancel
    public function cancel(Request $request)
    {
        Toastr::error('Payment Canceled!', 'Error');
        return redirect()->route('dashboard');
    }

    // IPN Listener
    public function ipn(Request $request)
    {
        $tran_id = $request->input('tran_id');

        if (!$tran_id) {
            return response('Invalid IPN', 400);
        }

        // Validation API call
        $validation_url = "https://securepay.sslcommerz.com/validator/api/validationserverAPI.php";

        $response = Http::asForm()->post($validation_url, [
            'val_id'       => $request->val_id,
            'store_id'     => 'jobshubglobal0live',
            'store_passwd' => '697AE3BC06C3116685',
            'format'       => 'json'
        ]);

        $data = $response->json();

        if (isset($data['status']) && $data['status'] === 'VALID') {
            // Update purchase by tran_id
            $purchase = PurchesElearning::where('tran_id', $tran_id)
                ->where('payment_status', 'pending')
                ->first();

            // Fallback: tran_id missing বা mismatch হলে user_id + e_learning_id দিয়ে update
            if (!$purchase && isset($request->cus_id, $request->product_id)) {
                $purchase = PurchesElearning::where('user_id', $request->cus_id)
                    ->where('e_learning_id', $request->product_id)
                    ->where('payment_status', 'pending')
                    ->first();
            }

            if ($purchase) {
                $purchase->payment_status = 'completed';
                $purchase->save();
            }

            return response('IPN OK', 200);
        }

        return response('Payment Not Valid', 400);
    }
}
