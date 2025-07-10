<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCorner;
use App\Models\StudentCornerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class StudentCornerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('student-corner-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $studentCorner = StudentCorner::with('studentCornerCategory')->latest()->get();
        $category = StudentCornerCategory::all();
        return view('admin.pages.studentCorner.index', compact('studentCorner', 'category'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/studentCorner'), $imageName);
            $studentCorner = new StudentCorner();
            $studentCorner->student_corner_category_id = $request->student_corner_category_id;
            $studentCorner->title = $request->title;
            $studentCorner->link = $request->link;
            $studentCorner->date = $request->date;
            $studentCorner->details = $request->details;
            $studentCorner->image = $imageName;
            $studentCorner->save();
            Toastr::success('Student Corner Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
            ]);
            $studentCorner = StudentCorner::find($id);
            $studentCorner->student_corner_category_id = $request->student_corner_category_id;
            $studentCorner->title = $request->title;
            $studentCorner->link = $request->link;
            $studentCorner->date = $request->date;
            $studentCorner->details = $request->details;
            $studentCorner->status = $request->status;

            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/studentCorner'), $imageName);
                $studentCorner->image = $imageName;
            }

            $studentCorner->save();
            Toastr::success('Student Corner Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $studentCorner = StudentCorner::find($id);
            $imagePath = public_path('images/studentCorner/' . $studentCorner->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $studentCorner->delete();
            Toastr::success('Student Corner Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
