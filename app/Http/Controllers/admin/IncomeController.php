<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\PurchesElearning;
use App\Models\PurchesSubscription;
use App\Models\PurchesTraning;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class IncomeController extends Controller
{
    public function subscriptionIncome()
    {
        $subscription = PurchesSubscription::with('user', 'subscription')->get();
        return view('admin.pages.account.subscriptionIncome',compact('subscription'));
    }

    public function subscriptionDestroy($id)
    {
        try {
            $subscription = PurchesSubscription::find($id);
            $subscription->delete();
            Toastr::success('Purches Subscription Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }



    public function trainingIncome()
    {
        $training = PurchesTraning::with('user', 'training')->get();
        return view('admin.pages.account.trainingIncome',compact('training'));
    }


    public function trainingDestroy($id)
    {
        try {
            $training = PurchesTraning::find($id);
            $training->delete();
            Toastr::success('Purches Training Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function elearningIncome()
    {
        $elearningIncome = PurchesElearning::with('user', 'eLearning')->get();
        return view('admin.pages.account.elearningIncome',compact('elearningIncome'));
    }

    public function elearningDestroy($id)
    {
        try {
            $training = PurchesElearning::find($id);
            $training->delete();
            Toastr::success('Purches Elearning Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
