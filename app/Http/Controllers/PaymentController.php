<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\PurchesElearning;
use App\Models\PurchesSubscription;
use App\Models\PurchesTraning;
class PaymentController extends Controller
{
    /* =======================
       PAYMENT START
    ========================*/
    public function pay($type, $id)
    {
        $purchase = match ($type) {
            'elearning' => PurchesElearning::findOrFail($id),
            'subscription' => PurchesSubscription::findOrFail($id),
            'training' => PurchesTraning::findOrFail($id),
        };

        $tran_id = uniqid('pay_');

        $purchase->update([
            'tran_id' => $tran_id,
            'payment_status' => 'pending'
        ]);

        $post_data = [
            'store_id' => 'jobshubglobal0live',
            'store_passwd' => '697AE3BC06C3116685',
            'total_amount' => $purchase->price,
            'currency' => 'BDT',
            'tran_id' => $tran_id,
            'success_url' => route('ssl.success'),
            'fail_url' => route('ssl.fail'),
            'cancel_url' => route('ssl.cancel'),
            'ipn_url' => route('ssl.ipn'),

            'cus_name' => auth()->user()->name,
            'cus_email' => auth()->user()->email,
            'cus_phone' => auth()->user()->phone ?? '017XXXXXXXX',

            // 🔑 Identify payment
            'value_a' => $type,
            'value_b' => $purchase->id,
        ];

        $response = Http::asForm()->post(
            'https://securepay.sslcommerz.com/gwprocess/v4/api.php',
            $post_data
        );

        return redirect()->away($response['GatewayPageURL']);
    }

    /* =======================
       SUCCESS / FAIL / CANCEL
    ========================*/
    public function success()
    {
        return redirect()->route('dashboard')
            ->with('success', 'Payment successful!');
    }

    public function fail()
    {
        return redirect()->route('dashboard')
            ->with('error', 'Payment failed!');
    }

    public function cancel()
    {
        return redirect()->route('dashboard')
            ->with('error', 'Payment canceled!');
    }

    /* =======================
       IPN HANDLER (REAL UPDATE)
    ========================*/
    public function ipn(Request $request)
    {
        if (!$request->tran_id || !$request->val_id) {
            return response('Invalid IPN', 400);
        }

        $verify = Http::asForm()->post(
            'https://securepay.sslcommerz.com/validator/api/validationserverAPI.php',
            [
                'val_id' => $request->val_id,
                'store_id' => 'jobshubglobal0live',
                'store_passwd' => '697AE3BC06C3116685',
                'format' => 'json',
            ]
        )->json();

        if (($verify['status'] ?? '') !== 'VALID') {
            return response('Payment Not Valid', 400);
        }

        match ($request->value_a) {
            'elearning' => PurchesElearning::where('id', $request->value_b)
                ->update(['payment_status' => 'completed']),

            'subscription' => PurchesSubscription::where('id', $request->value_b)
                ->update(['payment_status' => 'completed']),

            'training' => PurchesTraning::where('id', $request->value_b)
                ->update(['payment_status' => 'completed']),
        };

        return response('IPN OK', 200);
    }
}
