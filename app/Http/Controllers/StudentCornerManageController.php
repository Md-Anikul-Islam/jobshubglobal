<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\StudentCorner;
use App\Models\StudentCornerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCornerManageController extends Controller
{
//    public function studentCorner(Request $request)
//    {
//        $query = StudentCorner::query();
//        // Apply title-wise search if a search term is provided
//        if ($request->has('find_job') && $request->find_job != '') {
//            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
//        }
//        // Apply category filter if a category is selected
//        if ($request->has('category_id') && $request->category_id != '') {
//            $query->where('student_corner_category_id', $request->category_id);
//        }
//        $studentCorner = $query->latest()->paginate(12);
//        //dd($studentCorner);
//        $categories = StudentCornerCategory::all();
//        return view('frontend.studentCorner', compact('studentCorner', 'categories'));
//    }

    public function studentCorner(Request $request)
    {
        $query = StudentCorner::query();

        // Title-wise search
        if ($request->filled('find_job')) {
            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
        }

        // Category filter
        if ($request->filled('category_id')) {
            $query->where('student_corner_category_id', $request->category_id);
        }

        // ✅ New: Level Type filter
        if ($request->filled('level_type')) {
            $query->where('level_type', $request->level_type);
        }

        // ✅ New: Country filter
        if ($request->filled('country_id')) {
            $query->where('country_id', $request->country_id);
        }

        $studentCorner = $query->latest()->paginate(12);

        $categories = StudentCornerCategory::all();
        $countries = Country::where('status', 1)->get();

        return view('frontend.studentCorner', compact('studentCorner', 'categories', 'countries'));
    }



    public function studentCornerDetails($id)
    {
        $studentCorner = StudentCorner::where('id',$id)->first();
        $siteSetting = DB::table('site_settings')->first();
        return view('frontend.studentCornerDetails',compact('studentCorner','siteSetting'));
    }
}
