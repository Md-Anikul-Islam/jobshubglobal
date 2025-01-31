<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MigrationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class MigrationCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('migration-category-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $migrationCategory = MigrationCategory::latest()->get();
        return view('admin.pages.migrationCategory.index', compact('migrationCategory'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
            ]);
            $migrationCategory = new MigrationCategory();
            $migrationCategory->name = $request->name;
            $migrationCategory->name_bn = $request->name_bn;
            $migrationCategory->save();
            Toastr::success('Migration Category Added Successfully', 'Success');
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
            $migrationCategory = MigrationCategory::find($id);
            $migrationCategory->name = $request->name;
            $migrationCategory->name_bn = $request->name_bn;
            $migrationCategory->status = $request->status;
            $migrationCategory->save();
            Toastr::success('Migration Category Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $migrationCategory = MigrationCategory::find($id);
            $migrationCategory->delete();
            Toastr::success('Migration Category Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
