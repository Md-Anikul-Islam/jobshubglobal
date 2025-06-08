<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LoginLog;
use App\Models\PurchesSubscription;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yoeunes\Toastr\Facades\Toastr;

class AdminDashboardController extends Controller
{
    public function index()
    {
       $loginLog = LoginLog::orderBy('last_login','desc')->get();
       return view('admin.dashboard', compact('loginLog'));
    }

    public function unauthorized()
    {
        return view('admin.unauthorized');
    }

    public function purchaseSubscription(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required|exists:subscriptions,id'
        ]);

        // Check if user already has this subscription
        $existing = PurchesSubscription::where('user_id', Auth::id())
            ->where('subscription_id', $request->subscription_id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You already have this subscription!');
        }

        //dd($request->all());

        $price = Subscription::find($request->subscription_id)->price;

        // Create new purchase
        PurchesSubscription::create([
            'user_id' => Auth::id(),
            'price' => $price,
            'subscription_id' => $request->subscription_id
        ]);
        Toastr::success('Subscription purchased successfully Check Portal and Payment.', 'Success');
        return redirect()->back();
    }

    public function purchaseSubscriptionList()
    {
        $purchasedSubscriptions = PurchesSubscription::where('user_id', Auth::id())
            ->with('subscription')
            ->get();
        return view('admin.PAGES.subscription.purchaseSubscriptionlist', compact('purchasedSubscriptions'));
    }


}
