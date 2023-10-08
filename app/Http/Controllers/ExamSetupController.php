<?php

namespace App\Http\Controllers;

use App\Models\ExamSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ExamSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examsetups=ExamSetup::all();
        return view('examsetup.index',compact('examsetups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('examsetup.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title'=>'required',
                'duration'=>'required',
                'total_question' => 'required',
                'easy_question' => 'required',
                'hard_question' => 'required',
                'question_description' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
            ]);
        
            ExamSetup::create([
                'uuid'=> Str::uuid(),
                'title'=>$request->title,
                'duration'=>$request->duration,
                'total_question'=>$request->total_question,
                'easy_question' => $request->easy_question,
                'hard_question' => $request->hard_question,
                'question_description' => $request->question_description,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ]);
        
            return redirect(route("examsetups.index"))->with('success', 'Examsetup Create Successfully');
            
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error("Database Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('An unexpected error occurred. Please contact support.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamSetup $examsetup)
    {
        return view('examsetup.show',compact('examsetup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamSetup $examsetup)
    {
        return view('examsetup.edit',compact('examsetup'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamSetup $examsetup)
    {
        try {
            $request->validate([
                'title'=>'required',
                'duration'=>'required',
                'total_question' => 'required',
                'easy_question' => 'required',
                'hard_question' => 'required',
                'question_description' => 'required',
                'start_at' => 'required',
                'end_at' => 'required',
            ]);
        
            $examsetup->update([
                'uuid'=> Str::uuid(),
                'title'=>$request->title,
                'duration'=>$request->duration,
                'total_question'=>$request->total_question,
                'easy_question' => $request->easy_question,
                'hard_question' => $request->hard_question,
                'question_description' => $request->question_description,
                'start_at' => $request->start_at,
                'end_at' => $request->end_at
            ]);
        
            return redirect(route("examsetups.index"))->with('success', 'Examsetup Updated Successfully');
            
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error("Database Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('An unexpected error occurred. Please contact support.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSetup $examsetup)
    {
        $examsetup->delete();

        return redirect(route("examsetups.index"))->with('success', 'Examsetup Deleted Successfully');
    }
}
