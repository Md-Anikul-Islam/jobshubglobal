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
        //dd($job);

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
        $this->sendSms($user->phone, 'Successfully applied for the job , Job ID' . $job->id);
        Toastr::success('Successfully applied for the job.', 'Success');
        return redirect()->back();
    }



    private function sendSms($mobile, $sms)
    {
        $url = 'http://bulksms.teletalk.com.bd/link_sms_send.php?' . http_build_query([
                'op'      => 'SMS',
                'user'    => env('SMS_API_USERNAME', 'iTuring'),
                'pass'    => env('SMS_API_PASSWORD', ''),
                'mobile'  => $mobile,
                'charset' => 'UTF-8',
                'sms'     => $sms
            ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }


//    public function applyJobList()
//    {
//        $candidate = JobApplication::where('user_id',auth()->user()->id)->with('company','job')->get();
//        return view('user.pages.account.applyJob',compact('candidate'));
//    }
}
