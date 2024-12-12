<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\VisaMigration;
use Illuminate\Http\Request;

class ElearningController extends Controller
{
    public function eLearning(Request $request)
    {
        $query = Training::query();
        // Apply title-wise search if a search term is provided
        if ($request->has('find_job') && $request->find_job != '') {
            $query->where('title', 'LIKE', '%' . $request->find_job . '%');
        }
        $training = $query->latest()->paginate(12);
        return view('frontend.elearning', compact('training'));
    }

    public function detailsTraining($id)
    {
        $trainingAll = Training::latest()->limit(4)->get();
        $training = Training::where('id',$id)->first();
        return view('frontend.learning-details',compact('training','trainingAll'));
    }

    public function detailsVisaMigration($id)
    {
        $visaMigration = VisaMigration::where('id',$id)->first();
        return view('frontend.visa-migration-details',compact('visaMigration'));
    }


}
