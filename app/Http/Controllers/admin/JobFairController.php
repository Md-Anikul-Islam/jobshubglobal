<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobFair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class JobFairController extends Controller
{

    public function jobFair()
    {
        return view('auth.jobFairReg');
    }

    public function storeJobFair(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'fair_type' => 'required',
            ]);
            $jobFair = new JobFair();
            $jobFair->name = $request->name;
            $jobFair->email = $request->email;
            $jobFair->phone = $request->phone;
            $jobFair->address = $request->address;
            $jobFair->fair_type = $request->fair_type;
            $jobFair->save();
            Toastr::success('Job Fair  Registration Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
