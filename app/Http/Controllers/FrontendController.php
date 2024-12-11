<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $locations = Location::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        return view('frontend.home',compact('locations','categories'));
    }

	public function about()
	{
		return view('frontend.about');
	}

	public function myJobs()
	{
		return view('frontend.jobs');
	}

	public function eLearning()
	{
		return view('frontend.elearning');
	}

	public function details()
	{
		return view('frontend.learning-details');
	}
}
