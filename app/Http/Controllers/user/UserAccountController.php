<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\AccountVerificationMail;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yoeunes\Toastr\Facades\Toastr;

class UserAccountController extends Controller
{
    public function showUserRegistrationForm()
    {
        return view('auth.registrationFormForUser');
    }

    public function storeUserRegisterInfo(Request $request)
    {
        // Validate input
        $this->validate($request, [
            'is_registration_by' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $verificationCode = rand(100000, 999999);



        try {
            // Create user with verification code
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'address' => $input['address'],
                'password' => $input['password'],
                'verification_code' => $verificationCode,
                'status' => 0,
                'is_registration_by' => $input['is_registration_by'],
            ]);

            // Send verification email
            Mail::to($request->email)->send(new AccountVerificationMail($user));
            Toastr::success('Account created, please verify', 'Success');
            return redirect()->route('company.verification');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return back()->withErrors(['email' => 'The email has already been taken. Please choose a different email.']);
            }
            return back()->withErrors(['email' => 'An error occurred. Please try again later.']);
        }
    }

}
