<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Yoeunes\Toastr\Facades\Toastr;

class TenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Gate::allows('tender-list')) {
                return redirect()->route('unauthorized.action');
            }
            return $next($request);
        })->only('index');
    }

    public function index()
    {
        $tender = Tender::when(auth()->user()->hasRole('Company'), function ($query) {
            return $query->where('user_id', auth()->id());
        })->get();
        return view('admin.pages.tender.index', compact('tender'));
    }
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'file' => 'required',
            ]);
            $file = time().'.'.$request->file->extension();
            $request->file->move(public_path('files/tender'), $file);

            $tender = new Tender();
            $tender->user_id = auth()->id();
            $tender->title = $request->title;
            $tender->description = $request->description;
            $tender->date = $request->date;
            $tender->file = $file;
            $tender->save();
            Toastr::success('Tender Added Successfully', 'Success');
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
            $tender = Tender::find($id);
            $tender->title = $request->title;
            $tender->description = $request->description;
            $tender->date = $request->date;
            $tender->status = $request->status;
            if ($request->image) {
                $file = time() . '.' . $request->file->extension();
                $request->file->move(public_path('files/tender'), $file);
                $tender->file = $file;
            }
            $tender->save();
            Toastr::success('Tender Updated Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $tender = Tender::find($id);
            $filePath = public_path('files/tender/' . $tender->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $tender->delete();
            Toastr::success('Tender Deleted Successfully', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
