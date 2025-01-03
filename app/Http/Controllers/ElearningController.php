<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\TrainingCategory;
use App\Models\VisaMigration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElearningController extends Controller
{

    public function eLearning(Request $request)
    {
        $query = Training::query();

        // Apply title-wise search if a search term is provided
        if ($request->has('find_job') && $request->find_job != '') {
            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
        }

        // Apply category filter if a category is selected
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('training_category_id', $request->category_id);
        }

        $training = $query->latest()->paginate(12);
        $categories = TrainingCategory::all(); // Fetch categories for the filter


        return view('frontend.elearning', compact('training', 'categories'));
    }

    public function detailsTraining($id)
    {
        $trainingAll = Training::latest()->limit(4)->get();
        $training = Training::where('id',$id)->first();
        $siteSetting = DB::table('site_settings')->first();
        return view('frontend.learning-details',compact('training','trainingAll','siteSetting'));
    }

    public function detailsVisaMigration($id)
    {
        $visaMigration = VisaMigration::where('id',$id)->first();
        $siteSetting = DB::table('site_settings')->first();
        return view('frontend.visa-migration-details',compact('visaMigration','siteSetting'));
    }


}
