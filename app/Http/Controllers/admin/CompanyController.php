<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Yoeunes\Toastr\Facades\Toastr;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('company-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $company = User::where('is_registration_by','=','Company')->latest()->get();
        return view('admin.pages.company.index', compact('company'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'password' => 'required|min:8',
                'profile' => 'required',
            ]);

            // Handle licence image upload
            $licenceFile = time() . '.' . $request->tread_licence->extension();
            $request->tread_licence->move(public_path('images/licence'), $licenceFile);

            $company = new User();
            $company->name = $request->name;
            $company->name_bn = $request->name_bn;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->is_registration_by = 'Company';
            $company->status = 1;
            $company->email_verified_at = now();
            $company->tread_licence = $licenceFile;

            // Handle profile image upload if provided
            if ($request->hasFile('profile')) {
                $profileFile = time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('images/logo'), $profileFile);
                $company->profile = $profileFile;
            }
            // Hash and save password
            $company->password = bcrypt($request->password);
            $company->save();

            // Assign role based on registration type
            $role = match ($company->is_registration_by) {
                'Company' => 'Company',
                'User' => 'User',
                default => 'User', // Default fallback
            };
            $company->assignRole($role);

            Toastr::success('Company Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'phone' => 'required',
                'tread_licence' => 'nullable|image',
                'profile' => 'nullable',
            ]);

            $company = User::findOrFail($id);
            $company->name = $request->name;
            $company->name_bn = $request->name_bn;
            $company->email = $request->email;
            $company->phone = $request->phone;
            $company->address = $request->address;
            $company->status = $request->status;

            // Update password if provided
            if ($request->filled('password')) {
                $company->password = Hash::make($request->password);
            }

            // Licence image upload if provided
            if ($request->hasFile('tread_licence')) {
                $licenceFilePath = public_path('images/licence/' . $company->tread_licence);
                if (file_exists($licenceFilePath)) {
                    unlink($licenceFilePath);
                }
                $licenceFile = time() . '.' . $request->tread_licence->extension();
                $request->tread_licence->move(public_path('images/licence'), $licenceFile);
                $company->tread_licence = $licenceFile;
            }

            // Profile image upload if provided
            if ($request->hasFile('profile')) {
                $profileFilePath = public_path('images/logo/' . $company->profile);
                if (file_exists($profileFilePath)) {
                    unlink($profileFilePath);
                }
                $profileFile = time() . '.' . $request->profile->extension();
                $request->profile->move(public_path('images/logo'), $profileFile);
                $company->profile = $profileFile;
            }

            $company->save();
            Toastr::success('Company Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $company = User::findOrFail($id);

            // Delete licence image if exists
            $licenceFilePath = public_path('images/licence/' . $company->tread_licence);
            if (file_exists($licenceFilePath)) {
                unlink($licenceFilePath);
            }

            // Delete profile image if exists
            $profileFilePath = public_path('images/logo/' . $company->profile);
            if (file_exists($profileFilePath)) {
                unlink($profileFilePath);
            }

            $company->delete();
            Toastr::success('Company Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
