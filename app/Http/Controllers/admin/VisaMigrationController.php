<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\VisaMigration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class VisaMigrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('migration-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }
    public function index()
    {
        $migration = VisaMigration::latest()->get();
        return view('admin.pages.visaMigration.index', compact('migration'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/migration'), $imageName);
            $migration = new VisaMigration();
            $migration->title = $request->title;
            $migration->title_bn = $request->title_bn;
            $migration->link = $request->link;
            $migration->date = $request->date;
            $migration->details = $request->details;
            $migration->details_bn = $request->details_bn;
            $migration->image = $imageName;
            $migration->save();
            Toastr::success('Visa Migration Added Successfully', 'Success');
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
            $migration = VisaMigration::find($id);
            $migration->title = $request->title;
            $migration->title_bn = $request->title_bn;
            $migration->link = $request->link;
            $migration->date = $request->date;
            $migration->details = $request->details;
            $migration->details_bn = $request->details_bn;
            $migration->status = $request->status;

            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images/migration'), $imageName);
                $migration->image = $imageName;
            }

            $migration->save();
            Toastr::success('Visa Migration Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $migration = VisaMigration::find($id);
            $imagePath = public_path('images/migration/' . $migration->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $migration->delete();
            Toastr::success('Visa Migration Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
