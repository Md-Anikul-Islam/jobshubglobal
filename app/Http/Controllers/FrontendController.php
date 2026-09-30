<?php

namespace App\Http\Controllers;

use App\Models\Advisment;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Job;
use App\Models\Location;
use App\Models\Slider;
use App\Models\Subscription;
use App\Models\Tender;
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
        $subscription = Subscription::where('status',1)->orderBy('id', 'asc')->get();
        $tender = Tender::where('status',1)->with('user')->latest()->get();
        $advisement = Advisment::where('status',1)->first();


        return view('frontend.home',compact('locations','categories',
        'jobTotal','job','company','jobVacancy','training','visaMigration','subscription','tender','advisement'));
    }


    public function blog(Request $request)
    {
        $blogs = Blog::query()
            ->when($request->filled('find_job'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->find_job . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('frontend.blog', compact('blogs'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug',$slug)->first();
        return view('frontend.blogDetails', compact('blog'));
    }

}
