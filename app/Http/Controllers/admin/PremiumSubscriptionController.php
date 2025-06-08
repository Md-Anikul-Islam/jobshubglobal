<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class PremiumSubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('subscription-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $subscription = Subscription::all();
        return view('admin.pages.subscription.index', compact('subscription'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $subscription = new Subscription();
            $subscription->title = $request->title;
            $subscription->details = $request->details;
            $subscription->price = $request->price;
            $subscription->save();
            Toastr::success('Subscription Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $request->validate([
                'title' => 'required',
            ]);
            $subscription = Subscription::find($id);
            $subscription->title = $request->title;
            $subscription->details = $request->details;
            $subscription->price = $request->price;
            $subscription->status = $request->status;
            $subscription->save();
            Toastr::success('Subscription Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $subscription = Subscription::find($id);
            $subscription->delete();
            Toastr::success('Subscription Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
