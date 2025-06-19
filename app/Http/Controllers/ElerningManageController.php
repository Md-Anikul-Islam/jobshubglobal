<?php

namespace App\Http\Controllers;

use App\Models\Elearning;
use App\Models\ElearningCategory;
use Illuminate\Http\Request;

class ElerningManageController extends Controller
{
    public function elearning(Request $request)
    {
        $query = Elearning::query();

        // Apply title-wise search if a search term is provided
        if ($request->has('find_job') && $request->find_job != '') {
            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
        }

        // Apply category filter if a category is selected
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('elearning_category_id', $request->category_id);
        }

        $elearning = $query->latest()->paginate(12);
        $categories = ElearningCategory::all(); // Fetch categories for the filter


        return view('frontend.elearning', compact('elearning', 'categories'));
    }
}
