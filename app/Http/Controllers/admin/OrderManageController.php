<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PurchesElearning;
use App\Models\PurchesSubscription;
use App\Models\PurchesTraning;
use Illuminate\Http\Request;

class OrderManageController extends Controller
{
    public function subscription()
    {
        $subscription = PurchesSubscription::with('user','subscription')->latest()->get();
        return view('admin.pages.order.subscription',compact('subscription'));
    }

    public function training()
    {
        $training = PurchesTraning::with('user','training')->latest()->get();
        return view('admin.pages.order.training',compact('training'));
    }


    public function elearning()
    {
        $elearning = PurchesElearning::with('user','eLearning')->latest()->get();
        return view('admin.pages.order.elearning',compact('elearning'));
    }
}
