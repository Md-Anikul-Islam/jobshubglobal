<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function about()
    {
        $about = About::latest()->first();
        return view('frontend.about',compact('about'));
    }

}
