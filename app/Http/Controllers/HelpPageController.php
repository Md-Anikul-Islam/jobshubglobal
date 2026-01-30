<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class HelpPageController extends Controller
{
    public function show($slug)
    {
        $help = Help::where('slug', $slug)->firstOrFail();
        return view('frontend.help', compact('help'));
    }
}
