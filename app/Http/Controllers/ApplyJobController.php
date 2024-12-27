<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;

class ApplyJobController extends Controller
{
    public function applyJob(Request $request, Job $job)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to apply for the job.');
        }

        $user = auth()->user();
        $existingApplication = JobApplication::where('job_id', $job->id)
            ->where('user_id', $user->id)
            ->exists();

        if ($existingApplication) {
            Toastr::error('You have already applied for this job.', 'Error');
            return redirect()->back();
        }

        // Create the job application
        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => $user->id,
            'company_id' => $job->company_id,
        ]);

        Toastr::success('Successfully applied for the job.', 'Success');
        return redirect()->back();
    }


//    public function applyJobList()
//    {
//        $candidate = JobApplication::where('user_id',auth()->user()->id)->with('company','job')->get();
//        return view('user.pages.account.applyJob',compact('candidate'));
//    }
}
