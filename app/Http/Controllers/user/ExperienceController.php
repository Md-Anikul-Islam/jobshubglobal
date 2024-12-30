<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('experience-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $experience = Experience::where('user_id', auth()->user()->id)->latest()->get();
        return view('admin.pages.experience.index', compact('experience'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'designation' => 'required',
            ]);
            $experience = new Experience();
            $experience->office_name = $request->office_name;
            $experience->office_name_bn = $request->office_name_bn;
            $experience->designation = $request->designation;
            $experience->designation_bn = $request->designation_bn;
            $experience->year_of_experience = $request->year_of_experience;
            $experience->user_id = auth()->user()->id;
            $experience->save();
            Toastr::success('Experiences Added Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'designation' => 'required',
            ]);
            $experience = Experience::find($id);
            $experience->office_name = $request->office_name;
            $experience->office_name_bn = $request->office_name_bn;
            $experience->designation = $request->designation;
            $experience->designation_bn = $request->designation_bn;
            $experience->year_of_experience = $request->year_of_experience;
            $experience->save();
            Toastr::success('Experiences Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $experience = Experience::find($id);
            $experience->delete();
            Toastr::success('Experiences Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
