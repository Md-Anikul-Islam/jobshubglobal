<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Location;
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
                if (!empty($company->profile) && file_exists($profileFilePath)) {
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


    public function companyUnderPostedJob($id)
    {
        $location = Location::latest()->get();
        $category = Category::latest()->get();
        $job = Job::where('company_id', $id)->with('company')->latest()->get();
        $company = User::findOrFail($id);
        return view('admin.pages.company.companyUnderPostedJob', compact('job', 'location', 'category', 'company'));
    }

    public function storeCompanyUnderPostedJob(Request $request)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'location_id' => 'required',
            ]);
            $job = new Job();
            $job->category_id = $request->category_id;
            $job->location_id = $request->location_id;
            $job->title = $request->title;
            $job->title_bn = $request->title_bn;
            $job->address = $request->address;
            $job->address_bn = $request->address_bn;
            $job->vacancy = $request->vacancy;
            $job->job_type = $request->job_type;
            $job->salary = $request->salary;
            $job->deadline = $request->deadline;
            $job->details = $request->details;
            $job->details_bn = $request->details_bn;
            $job->company_id = $request->company_id;
            $job->save();
            Toastr::success('Job Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updateCompanyUnderPostedJob(Request $request, $id)
    {
        try {
            $request->validate([
                'category_id' => 'required',
                'location_id' => 'required',
            ]);
            $job = Job::find($id);
            $job->category_id = $request->category_id;
            $job->location_id = $request->location_id;
            $job->title = $request->title;
            $job->title_bn = $request->title_bn;
            $job->address = $request->address;
            $job->address_bn = $request->address_bn;
            $job->vacancy = $request->vacancy;
            $job->job_type = $request->job_type;
            $job->salary = $request->salary;
            $job->deadline = $request->deadline;
            $job->details = $request->details;
            $job->details_bn = $request->details_bn;
            $job->status = $request->status;
            $job->save();
            Toastr::success('Job Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroyCompanyUnderPostedJob($id)
    {
        try {
            $job = Job::find($id);
            $job->delete();
            Toastr::success('Job Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function companyUnderJobApplyCandidate($id)
    {
        $jobApplication = JobApplication::where('job_id', $id)->with('user')->latest()->get();
        $jobApplicationCount = JobApplication::where('job_id', $id)->count();
        return view('admin.pages.company.job.companyUnderJobApplication', compact('jobApplication', 'jobApplicationCount'));
    }

    public function companyUnderJobApplyCandidateDestroy($id)
    {
        try {
            $jobApplication = JobApplication::find($id);
            $jobApplication->delete();
            Toastr::success('Job Application Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
