<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Elearning;
use App\Models\ElearningCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ElearningController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('eLearning-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $eLearning = Elearning::with('elearningCategory')->latest()->get();
        $category = ElearningCategory::latest()->get();
        return view('admin.pages.eLearning.index', compact('eLearning', 'category'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'elearning_category_id' => 'required',
                'title' => 'required',
                'details' => 'required',
                'fee' => 'required',
            ]);
            $eLearning = new Elearning();
            $eLearning->elearning_category_id = $request->elearning_category_id;
            $eLearning->title = $request->title;
            $eLearning->details = $request->details;
            $eLearning->fee = $request->fee;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/eLearning'), $imageName);
                $eLearning->image = $imageName;
            }
            $eLearning->save();
            Toastr::success('E-Learning Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'elearning_category_id' => 'required',
                'title' => 'required',
                'details' => 'required',
                'fee' => 'required',
            ]);
            $eLearning = Elearning::find($id);
            $eLearning->elearning_category_id = $request->elearning_category_id;
            $eLearning->title = $request->title;
            $eLearning->details = $request->details;
            $eLearning->fee = $request->fee;
            $eLearning->status = $request->status;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/eLearning'), $imageName);
                $eLearning->image = $imageName;
            }
            $eLearning->save();
            Toastr::success('E-Learning Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $eLearning = Elearning::find($id);
            $eLearning->delete();
            Toastr::success('E-Learning Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
