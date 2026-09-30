<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::latest()->get();
        return view('admin.pages.blog.index', compact('blog'));
    }

    public function store(Request $request)
    {

        try {
            $request->validate([
                'title' => 'required',
                'details' => 'required',
            ]);


            $blog = new Blog();
            $blog->title = $request->title;
            $blog->slug = Str::slug($request->title);
            $blog->details = $request->details;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/blog'), $file);
                $blog->image = $file;
            }
            $blog->save();
            Toastr::success('Blog Added Successfully', 'Success');
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
            $blog = Blog::find($id);
            $blog->title = $request->title;
            $blog->details = $request->details;
            $blog->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/blog'), $file);
                $blog->image = $file;
            }
            $blog->save();
            Toastr::success('Blog Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $blog = Blog::find($id);
            $filePath = public_path('images/blog/' . $blog->image);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $blog->delete();
            Toastr::success('Blog Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}

