<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Elearning;
use App\Models\LoginLog;
use App\Models\PurchesElearning;
use App\Models\PurchesSubscription;
use App\Models\PurchesTraning;
use App\Models\Subscription;
use App\Models\Training;
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
        return view('admin.pages.subscription.purchaseSubscriptionlist', compact('purchasedSubscriptions'));
    }


    public function purchaseElearning(Request $request)
    {
        $request->validate([
            'e_learning_id' => 'required'
        ]);
        // Check if user already has this e-learning
        $existing = PurchesElearning::where('user_id', Auth::id())
            ->where('e_learning_id', $request->e_learning_id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You already have access to this e-learning!');
        }
        $price = ELearning::find($request->e_learning_id)->fee;
        // Create new purchase
        PurchesElearning::create([
            'user_id' => Auth::id(),
            'price' => $price,
            'e_learning_id' => $request->e_learning_id
        ]);
        Toastr::success('E-learning purchased successfully Check Portal and Payment.', 'Success');
        return redirect()->back();
    }

    public function purchaseElearningList()
    {
        $purchasedElearning = PurchesElearning::where('user_id', Auth::id())
            ->with('eLearning')
            ->get();
        return view('admin.pages.eLearning.purchaseElearninglist', compact('purchasedElearning'));
    }

    public function purchaseTraining(Request $request)
    {
        $request->validate([
            'training_id' => 'required'
        ]);
        // Check if user already has this training
        $existing = PurchesTraning::where('user_id', Auth::id())
            ->where('training_id', $request->training_id)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'You already have access to this training!');
        }
        $price = Training::find($request->training_id)->training_fee;
        // Create new purchase
        PurchesTraning::create([
            'user_id' => Auth::id(),
            'price' => $price,
            'training_id' => $request->training_id
        ]);
        Toastr::success('Training purchased successfully Check Portal and Payment.', 'Success');
        return redirect()->back();
    }

    public function purchaseTrainingList()
    {
        $purchasedTraining = PurchesTraning::where('user_id', Auth::id())
            ->with('training')
            ->get();
        return view('admin.pages.training.purchaseTraininglist', compact('purchasedTraining'));
    }


}
