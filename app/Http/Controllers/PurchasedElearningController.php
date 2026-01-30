<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchesElearning;
use Illuminate\Support\Facades\Http;

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
            'cus_name' => auth()->user()->name,
            'cus_email' => auth()->user()->email,
            'cus_phone' => auth()->user()->phone ?? '017XXXXXXXX',
        ];

        $response = Http::asForm()->post('https://securepay.sslcommerz.com/gwprocess/v4/api.php', $post_data);

        if (isset($response['GatewayPageURL'])) {
            return redirect($response['GatewayPageURL']);
        } else {
            return back()->with('error', 'Payment gateway error! Try again.');
        }
    }

    // Payment Success
    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $purchase = PurchesElearning::where('tran_id', $tran_id)->first();

        if ($purchase) {
            $purchase->payment_status = 'completed';
            $purchase->save();
        }

        return redirect()->route('admin.purchased')->with('success', 'Payment Successful!');
    }

    // Payment Fail
    public function fail(Request $request)
    {
        return redirect()->route('admin.purchased')->with('error', 'Payment Failed!');
    }

    // Payment Cancel
    public function cancel(Request $request)
    {
        return redirect()->route('admin.purchased')->with('error', 'Payment Canceled!');
    }

    // IPN Listener
    public function ipn(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $status = $request->input('status');

        $purchase = PurchesElearning::where('tran_id', $tran_id)->first();

        if ($purchase && $status == 'VALID') {
            $purchase->payment_status = 'completed';
            $purchase->save();
        }
    }
}
