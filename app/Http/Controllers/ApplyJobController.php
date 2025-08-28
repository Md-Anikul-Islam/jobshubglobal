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

    function sendSms($mobile, $sms) {
        $url = 'https://bulksms.teletalk.com.bd/jlinktbls.php';

        $user = env('SMS_API_USERNAME');
        $pass = env('SMS_API_PASSWORD');
        $userId = '11331';
        $encrKey = '@***';

        // Generate 16-digit p_key
        $p_key = str_pad(strval(random_int(0, 9999999999999999)), 16, '0', STR_PAD_LEFT);

        $a_key = md5($userId . $p_key . $encrKey);

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
            'cid' => '8801552146406' // <-- your Bill MSISDN
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
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // for debug only
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // for debug only

        $response = curl_exec($ch);
        if ($response === false) {
            dd(curl_error($ch));
        }
        curl_close($ch);

        dd($response); // <-- inspect API response

        return $response;
    }











//    private function sendSms($mobile, $sms)
//    {
//        $data = [
//            'op' => 'SMS',
//            'chunk' => 'S',
//            'user' => env('SMS_API_USERNAME'),
//            'pass' => env('SMS_API_PASSWORD'),
//            'smsclass' => 'GENERAL',
//            'mobile' => $mobile,
//            'sms' => $sms,
//            'charset' => 'UTF-8',
//            'validity' => '1440',
//            'a_key' => '0f10d53d80db812c581745a1834054e8',
//            'p_key' => '1595157663255938',
//            'cid' => uniqid(),
//        ];
//
//        $ch = curl_init('https://bulksms.teletalk.com.bd/jlinktbls.php');
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        return $response;
//    }



//    private function sendSms($mobile, $sms)
//    {
//        $url = 'https://bulksms.teletalk.com.bd/jlinktbls.php?' . http_build_query([
//                'op'      => 'SMS',
//                'user'    => env('SMS_API_USERNAME', 'iTuring'),
//                'pass'    => env('SMS_API_PASSWORD', ''),
//                'mobile'  => $mobile,
//                'charset' => 'UTF-8',
//                'sms'     => $sms
//            ]);
//
//        $ch = curl_init($url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        $response = curl_exec($ch);
//        curl_close($ch);
//        return $response;
//    }


//    public function applyJobList()
//    {
//        $candidate = JobApplication::where('user_id',auth()->user()->id)->with('company','job')->get();
//        return view('user.pages.account.applyJob',compact('candidate'));
//    }
}
