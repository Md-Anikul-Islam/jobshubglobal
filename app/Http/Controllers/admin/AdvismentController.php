<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Advisment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class AdvismentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('advisement-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $advisement = Advisment::all();
        return view('admin.pages.advisement.index', compact('advisement'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'image' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/advisement'), $file);

            $advisement = new Advisment();
            $advisement->title = $request->title;
            $advisement->details = $request->details;
            $advisement->image = $file;
            $advisement->save();
            Toastr::success('Advisement Added Successfully', 'Success');
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
            $advisement = Advisment::find($id);
            $advisement->title = $request->title;
            $advisement->details = $request->details;
            $advisement->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/advisement'), $file);
                $advisement->image = $file;
            }
            $advisement->save();
            Toastr::success('Advisement Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $advisement = Advisment::find($id);
            $filePath = public_path('images/advisement/' . $advisement->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            $advisement->delete();
            Toastr::success('Advisement Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
