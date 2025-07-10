<?php

namespace App\Http\Controllers;

use App\Models\StudentCorner;
use App\Models\StudentCornerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentCornerManageController extends Controller
{
    public function studentCorner(Request $request)
    {
        $query = StudentCorner::query();
        // Apply title-wise search if a search term is provided
        if ($request->has('find_job') && $request->find_job != '') {
            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
        }
        // Apply category filter if a category is selected
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('student_corner_category_id', $request->category_id);
        }
        $studentCorner = $query->latest()->paginate(12);
        //dd($studentCorner);
        $categories = StudentCornerCategory::all();
        return view('frontend.studentCorner', compact('studentCorner', 'categories'));
    }


    public function studentCornerDetails($id)
    {
        $studentCorner = StudentCorner::where('id',$id)->first();
        $siteSetting = DB::table('site_settings')->first();
        return view('frontend.studentCornerDetails',compact('studentCorner','siteSetting'));
    }
}
