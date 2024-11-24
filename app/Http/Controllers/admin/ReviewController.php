<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('review-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $review = Review::latest()->get();
        return view('admin.pages.review.index', compact('review'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'details' => 'required',
            ]);
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/review'), $file);
            $review = new Review();
            $review->name = $request->name;
            $review->name_bn = $request->name_bn;
            $review->details = $request->details;
            $review->details_bn = $request->details_bn;
            $review->image = $file;
            $review->save();
            Toastr::success('Review Added Successfully', 'Success');
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
            $review = Review::find($id);
            $review->name = $request->name;
            $review->name_bn = $request->name_bn;
            $review->details = $request->details;
            $review->details_bn = $request->details_bn;
            $review->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/review'), $file);
                $review->image = $file;
            }
            $review->save();
            Toastr::success('Review Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $review = Review::find($id);
            $filePath = public_path('images/review/' . $review->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $review->delete();
            Toastr::success('Review Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

}
