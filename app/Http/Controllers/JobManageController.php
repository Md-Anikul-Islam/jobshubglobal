<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class JobManageController extends Controller
{

    public function searchJobs(Request $request)
    {
        $jobVacancy = Job::whereNotNull('vacancy')->count();
        $locations = Location::all();
        $categories = Category::all();
        $jobs = Job::query();
        // Filter by category if provided
        if ($request->categoryId) {
            $jobs->where('category_id', $request->categoryId);
        }
        // Filter by location if provided
        if ($request->locationId) {
            $jobs->where('location_id', $request->locationId);
        }
        // Filter by job title if provided
        if ($request->job_title) {
            $jobs->where('title', 'like', '%' . $request->job_title . '%');
        }

        // Filter by minimum salary if provided
        if ($request->min_salary) {
            $jobs->where('salary', '>=', $request->min_salary);
        }

        // Filter by maximum salary if provided
        if ($request->max_salary) {
            $jobs->where('salary', '<=', $request->max_salary);
        }


        // Include related data and paginate results
        $jobs = $jobs->with(['category', 'location'])->where('status', 1)->paginate(100);
        return view('frontend.jobs', compact('jobs', 'locations', 'categories','jobVacancy'));
    }

    public function jobDetails($id)
    {
        $job = Job::with(['category', 'location'])->where('id', $id)->first();
        return view('frontend.job-details', compact('job'));
    }



}
