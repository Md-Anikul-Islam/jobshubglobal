<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('skill-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $skill = Skill::where('user_id', auth()->user()->id)->latest()->get();
        return view('admin.pages.skill.index', compact('skill'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $skill = new Skill();
            $skill->name = $request->name;
            $skill->name_bn = $request->name_bn;
            $skill->user_id = auth()->user()->id;
            $skill->save();
            Toastr::success('Skill Added Successfully', 'Success');
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
                'name' => 'required',
            ]);
            $skill = Skill::find($id);
            $skill->name = $request->name;
            $skill->name_bn = $request->name_bn;
            $skill->status = $request->status;
            $skill->save();
            Toastr::success('Skill Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $skill = Skill::find($id);
            $skill->delete();
            Toastr::success('Skill Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
