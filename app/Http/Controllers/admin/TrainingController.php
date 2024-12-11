<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('training-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $training = Training::latest()->get();
        return view('admin.pages.training.index', compact('training'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
        try {
            $request->validate([
                'title' => 'required',
                'details' => 'required',
                'training_date' => 'required',
                'training_time' => 'required',
                'training_duration' => 'required',
                'training_fee' => 'required',
            ]);


            $training = new Training();
            $training->title = $request->title;
            $training->title_bn = $request->title_bn;
            $training->details = $request->details;
            $training->details_bn = $request->details_bn;
            $training->training_date = $request->training_date;
            $training->training_time = $request->training_time;
            $training->training_duration = $request->training_duration;
            $training->training_fee = $request->training_fee;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/training'), $imageName);
                $training->image = $imageName;
            }
            $training->save();

            Toastr::success('Training Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'title' => 'required',
                'details' => 'required',
                'training_date' => 'required',
                'training_time' => 'required',
                'training_duration' => 'required',
                'training_fee' => 'required',

            ]);
            $training = Training::find($id);
            $training->title = $request->title;
            $training->title_bn = $request->title_bn;
            $training->details = $request->details;
            $training->details_bn = $request->details_bn;
            $training->training_date = $request->training_date;
            $training->training_time = $request->training_time;
            $training->training_duration = $request->training_duration;
            $training->training_fee = $request->training_fee;
            $training->status = $request->status;
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/training'), $imageName);
                $training->image = $imageName;
            }
            $training->save();
            Toastr::success('Training Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $training = Training::find($id);
            $training->delete();
            Toastr::success('Training Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
