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
        // Include related data and paginate results
        $jobs = $jobs->with(['category', 'location'])->where('status', 1)->paginate(100);
        return view('frontend.jobs', compact('jobs', 'locations', 'categories','jobVacancy'));
    }



}
