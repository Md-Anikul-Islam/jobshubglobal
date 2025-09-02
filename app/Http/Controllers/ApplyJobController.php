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
        //dd($user, $job);
        $existingApplication = JobApplication::where('job_id', $job->id)
            ->where('user_id', $user->id)
            ->exists();
        //dd($job);

        if ($existingApplication) {
            Toastr::error('You have already applied for this job.', 'Error');
            return redirect()->back();
        }

        //dd($user->phone);

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

    function sendSms($mobile, $sms)
    {
        $url = 'https://bulksms.teletalk.com.bd/jlinktbls.php';

        $user = env('SMS_API_USERNAME');
        $apiPassword = env('SMS_API_PASSWORD');
        $userId = env('SMS_API_USERID', '11331'); // Move to .env for flexibility
        $encrKey = env('SMS_API_ENCR_KEY', '@***'); // Move to .env
        $cid = env('SMS_API_CID', '8801552146406'); // Move to .env

        // Hash password using MD5
        $pass = md5($apiPassword);

        // Generate 16-digit p_key
        $p_key = str_pad(strval(random_int(0, 9999999999999999)), 16, '0', STR_PAD_LEFT);

        // Correct a_key generation
        $a_key = md5(($userId + $p_key) . $encrKey);

        $data = [
            'op' => 'SMS',
            'user' => $user,
            'pass' => $pass,
            'sms' => $sms,
            'mobile' => $mobile,
            'smsclass' => 'GENERAL',
            'charset' => 'UTF-8',
            'validity' => '1440',
            'a_key' => $a_key,
            'p_key' => $p_key,
            'cid' => $cid,
        ];

        $payload = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For testing only
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // For testing only

        $response = curl_exec($ch);
        if ($response === false) {
            \Log::error('Teletalk SMS Error: ' . curl_error($ch));
        }
        curl_close($ch);

        \Log::info('Teletalk SMS Response: ' . $response);

        return $response;
    }





//    public function applyJobList()
//    {
//        $candidate = JobApplication::where('user_id',auth()->user()->id)->with('company','job')->get();
//        return view('user.pages.account.applyJob',compact('candidate'));
//    }
}
