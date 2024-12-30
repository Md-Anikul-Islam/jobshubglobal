<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        $siteSettings = SiteSetting::first();
        return view('frontend.contact-us', compact('siteSettings'));
    }
}
