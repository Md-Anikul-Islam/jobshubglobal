<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use Illuminate\Http\Request;

class JobManageController extends Controller
{
//    public function myJobs($categoryId = null, $locationId = null)
//    {
//        $jobs = Job::query();
//        if ($categoryId) {
//            $jobs->where('category_id', $categoryId);
//        }
//        if ($locationId) {
//            $jobs->where('location_id', $locationId);
//        }
//        $jobs = $jobs->with(['category', 'location'])->where('status', 1)->paginate(10);
//        return view('frontend.jobs', compact('jobs'));
//    }
    public function myJobsCategory($categoryId = null)
    {
        $locations = Location::all();
        $categories = Category::all();
        $jobs = Job::query();
        if ($categoryId) {
            $jobs->where('category_id', $categoryId);
        }
        $jobs = $jobs->with(['category'])->where('status', 1)->paginate(10);
        return view('frontend.jobs', compact('jobs','locations','categories'));
    }

    public function myJobsLocation($locationId = null)
    {
        $locations = Location::all();
        $categories = Category::all();
        $jobs = Job::query();
        if ($locationId) {
            $jobs->where('location_id', $locationId);
        }
        $jobs = $jobs->with(['location'])->where('status', 1)->paginate(10);

        return view('frontend.jobs', compact('jobs','locations','categories'));
    }


//    public function myJobs($categoryId = null, $locationId = null)
//    {
//        $jobs = Job::query();
//
//        if ($categoryId) {
//            $jobs->where('category_id', $categoryId);
//        }
//
//        if ($locationId) {
//            $jobs->where('location_id', $locationId);
//        }
//
//        $jobs = $jobs->with(['category', 'location'])->where('status', 1)->paginate(10);
//
//        return view('frontend.jobs', compact('jobs'));
//    }


}
