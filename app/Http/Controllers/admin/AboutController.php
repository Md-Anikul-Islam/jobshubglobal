<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('about-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $about = About::where('id', 1)->first();
        return view('admin.pages.about.index', compact('about'));
    }

    public function createOrUpdateAbout(Request $request, $id = null)
    {
        $rules = [
            'title' => 'nullable',
            'details' => 'nullable',
        ];



        // Validate the request data
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the About entry with the provided ID exists
        if ($id) {
            $about = About::findOrFail($id);
            $about->update($request->except(['image']));
        } else {
            $about = new About($request->except(['image'])); // Fixing variable name
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $name = time().'.'.$request->file('image')->extension();
            $request->file('image')->move(public_path('images/about'), $name);
            $about->image = 'images/about/'.$name;
        }

        $about->save();

        $message = $id ? 'About updated successfully!' : 'About created successfully!';
        return redirect()->back()->with('success', $message);
    }
}
