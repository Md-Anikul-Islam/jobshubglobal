<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use App\Models\Slider;
use App\Models\Training;
use App\Models\User;
use App\Models\VisaMigration;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $jobTotal = Job::where('deadline', '>=', now()->toDateString())->count();
        $company = User::where('is_registration_by','=','Company')->count();
        $jobVacancy = Job::whereNotNull('vacancy')->count();



        $locations = Location::where('status',1)->latest()->get();
        $categories = Category::where('status',1)->latest()->get();
        $job = Job::with('company')->where('deadline', '>=', now()->toDateString())->latest()->limit(50)->get();
        $training = Training::latest()->limit(10)->get();
        $visaMigration = VisaMigration::latest()->limit(10)->get();
        return view('frontend.home',compact('locations','categories',
        'jobTotal','job','company','jobVacancy','training','visaMigration'));
    }

	public function about()
	{
		return view('frontend.about');
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
