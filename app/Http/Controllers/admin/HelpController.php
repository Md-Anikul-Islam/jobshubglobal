<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Yoeunes\Toastr\Facades\Toastr;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('help-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $help = Help::latest()->get();
        return view('admin.pages.help.index', compact('help'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'details' => 'nullable|string',
            ]);

            Help::create([
                'name'    => $request->name,
                'slug'    => Str::slug($request->name),
                'details' => $request->details,
            ]);

            Toastr::success('Help Added Successfully', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'details' => 'nullable|string',
            ]);

            $help = Help::findOrFail($id);
            $help->update([
                'name'    => $request->name,
                'slug'    => Str::slug($request->name),
                'details' => $request->details,
            ]);

            Toastr::success('Help Updated Successfully', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            Help::findOrFail($id)->delete();

            Toastr::success('Help Deleted Successfully', 'Success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
