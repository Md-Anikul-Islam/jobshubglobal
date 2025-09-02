<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\AccountVerificationMail;
use App\Models\JobApplication;
use App\Models\JoinCategory;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Facades\Toastr;

class UserAccountController extends Controller
{
    public function showUserRegistrationForm()
    {
        $joinCategories = JoinCategory::where('status', 1)->get();
        return view('auth.registrationFormForUser', compact('joinCategories'));
    }

//    public function storeUserRegisterInfo(Request $request)
//    {
//        // Validate input
//        $this->validate($request, [
//            'is_registration_by' => 'required',
//            'name' => 'required',
//            'phone' => 'required',
//            'email' => 'required|email|unique:users,email',
//            'password' => 'required',
//        ]);
//
//        $input = $request->all();
//        $input['password'] = Hash::make($input['password']);
//        $verificationCode = rand(100000, 999999);
//
//
//
//        try {
//            // Create user with verification code
//            $user = User::create([
//                'name' => $input['name'],
//                'email' => $input['email'],
//                'phone' => $input['phone'],
//                'address' => $input['address'],
//                'join_category_id' => $input['join_category_id'],
//                'password' => $input['password'],
//                'verification_code' => $verificationCode,
//                'status' => 0,
//                'is_registration_by' => $input['is_registration_by'],
//            ]);
//
//            // Send verification email
//            //Mail::to($request->email)->send(new AccountVerificationMail($user));
//            // Send OTP via SMS here
//            $this->sendSms($request->phone, 'Your OTP is: ' . $verificationCode);
//            Toastr::success('Account created, please verify', 'Success');
//            return redirect()->route('company.verification');
//        } catch (QueryException $e) {
//            if ($e->getCode() === '23000') {
//                return back()->withErrors(['email' => 'The email has already been taken. Please choose a different email.']);
//            }
//            return back()->withErrors(['email' => 'An error occurred. Please try again later.']);
//        }
//    }


    public function storeUserRegisterInfo(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'is_registration_by' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'join_category_id' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $verificationCode = rand(100000, 999999);

            // Check if "Other" category was selected
            if ($input['join_category_id'] === 'other') {
                // Validate the other category field
                $this->validate($request, [
                    'other_category' => 'required|string|max:255'
                ]);

                // Create new category
                $newCategory = JoinCategory::create([
                    'name' => $input['other_category'],
                    'status' => 1
                ]);

                $input['join_category_id'] = $newCategory->id;
            }

            // Create user with verification code
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'join_category_id' => $input['join_category_id'],
                'password' => $input['password'],
                'verification_code' => $verificationCode,
                'status' => 0,
                'is_registration_by' => $input['is_registration_by'],
            ]);

            // Send verification email
            //Mail::to($request->email)->send(new AccountVerificationMail($user));

            // Send OTP via SMS here
            $this->sendSms($request->phone, 'Your OTP is: ' . $verificationCode);

            DB::commit();

            Toastr::success('Account created, please verify', 'Success');
            return redirect()->route('company.verification');
        } catch (QueryException $e) {
            DB::rollBack();
            if ($e->getCode() === '23000') {
                return back()->withErrors(['email' => 'The email has already been taken. Please choose a different email.']);
            }
            return back()->withErrors(['email' => 'An error occurred. Please try again later.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'An error occurred. Please try again later.']);
        }
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


    public function applyJobList()
    {
        $candidate = JobApplication::where('user_id',auth()->user()->id)->with('company','job')->get();
        return view('admin.pages.applyJob.index',compact('candidate'));
    }

    public function userAccount()
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('admin.pages.user.index', compact('user'));
    }

    public function createOrUpdateUserAccount(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'name' => 'nullable',
            'name_bn' => 'nullable',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'phone' => 'nullable|unique:users,phone,' . $id,
            'father_name' => 'nullable',
            'father_name_bn' => 'nullable',
            'mother_name' => 'nullable',
            'mother_name_bn' => 'nullable',
            'nationality' => 'nullable',
            'nationality_bn' => 'nullable',
            'blood_group' => 'nullable',
            'blood_group_bn' => 'nullable',
            'nid' => 'nullable',
            'dob' => 'nullable|date',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:5120',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'address' => 'nullable',
            'address_bn' => 'nullable',
            'details' => 'nullable',
            'details_bn' => 'nullable',
        ];

        //dd($request->all());
        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find or create user based on provided ID
        $user = $id ? User::findOrFail($id) : new User;

        // Update user fields except for files
        $user->fill($request->except(['profile', 'cv', 'resume']));

        // Handle profile image upload
        if ($request->hasFile('profile')) {
            // Delete the previous profile image if it exists
            if ($user->profile && File::exists(public_path($user->profile))) {
                File::delete(public_path($user->profile));
            }
            $profileName = time().'.'.$request->file('profile')->extension();
            $request->file('profile')->move(public_path('images/profile'), $profileName);
            $user->profile = 'images/profile/'.$profileName;
        }

        // Handle CV upload
        if ($request->hasFile('cv')) {
            // Delete the previous CV if it exists
            if ($user->cv && File::exists(public_path($user->cv))) {
                File::delete(public_path($user->cv));
            }
            $cvName = time().'.'.$request->file('cv')->extension();
            $request->file('cv')->move(public_path('images/cv'), $cvName);
            $user->cv = 'images/cv/'.$cvName;
        }

        // Handle resume upload
        if ($request->hasFile('resume')) {
            // Delete the previous resume if it exists
            if ($user->resume && File::exists(public_path($user->resume))) {
                File::delete(public_path($user->resume));
            }
            $resumeName = time().'.'.$request->file('resume')->extension();
            $request->file('resume')->move(public_path('images/resume'), $resumeName);
            $user->resume = 'images/resume/'.$resumeName;
        }

        // Save user data
        $user->save();

        $message = $id ? 'Account settings updated successfully!' : 'Account created successfully!';
        return redirect()->back()->with('success', $message);
    }

}
