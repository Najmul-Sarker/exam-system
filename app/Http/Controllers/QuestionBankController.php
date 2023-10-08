<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\QuestionBank;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class QuestionBankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $questionbanks = QuestionBank::with('chapter.subject')->get();
        $questionbanks = QuestionBank::with('chapter.subject')->get();
        $subjects=Subject::all();
        return view('questionbank.index',compact('questionbanks','subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects =Subject::all();
        $chapters =Chapter::all();
        return view('questionbank.create',compact('subjects','chapters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'subject_id'=>'required',
                'chapter_id'=>'required',
                'question_text' => 'required',
                'option1' => 'required',
                'option2' => 'required',
                'option3' => 'required',
                'option4' => 'required',
                'correcct_answer' => 'required',
                'question_level' => 'required',
                'marks' => 'required',
                'type' => 'required'
            ]);
        
            QuestionBank::create([
                'uuid'=> Str::uuid(),
                'subject_id'=>$request->subject_id,
                'chapter_id'=>$request->chapter_id,
                'question_text'=>$request->question_text,
                'option1' => $request->option1,
                'option2' => $request->option2,
                'option3' => $request->option3,
                'option4' => $request->option4,
                'correcct_answer' => $request->correcct_answer,
                'question_level' => $request->question_level,
                'marks' => $request->marks,
                'type' => $request->type
            ]);
        
            return redirect(route("questionbanks.index"))->with('success', 'Question Create Successfully');
            
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
    public function show(QuestionBank $questionbank)
    {
        $subjects =Subject::all();
        return view('questionbank.show',compact('questionbank','subjects'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionBank $questionbank)
    {
        $subjects=Subject::all();
        $chapters=Chapter::all();
        return view('questionbank.edit',compact('questionbank','subjects','chapters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionBank $questionbank)
    {
        // dd($questionBank->all());
        try {
            $request->validate([
                'subject_id'=>'required',
                'chapter_id'=>'required',
                'question_text' => 'required',
                'option1' => 'required',
                'option2' => 'required',
                'option3' => 'required',
                'option4' => 'required',
                'correcct_answer' => 'required',
                'question_level' => 'required',
                'marks' => 'required',
                'type' => 'required'
            ]);
        
            $questionbank->update([
                'uuid'=> Str::uuid(),
                'subject_id'=>$request->subject_id,
                'chapter_id'=>$request->chapter_id,
                'question_text'=>$request->question_text,
                'option1' => $request->option1,
                'option2' => $request->option2,
                'option3' => $request->option3,
                'option4' => $request->option4,
                'correcct_answer' => $request->correcct_answer,
                'question_level' => $request->question_level,
                'marks' => $request->marks,
                'type' => $request->type
            ]);
        
            return redirect(route("questionbanks.index"))->with('success', 'Question Updated Successfully');
            
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
    public function destroy(QuestionBank $questionbank)
    {
        $questionbank->delete();

        return redirect(route("questionbanks.index"))->with('success', 'Question Deleted Successfully');
    }
}
