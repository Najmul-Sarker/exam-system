<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\Chapter;
use App\Models\Examinee;
use App\Models\ExamSetup;
use App\Models\Result;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ExamSetupController extends Controller
{
    public function index()
    {
        $examsetups=ExamSetup::all();
        $subjects=Subject::all();
        $chapters=Chapter::all();
        return view('examsetup.index',compact('examsetups','subjects','chapters'));
    }

    public function create()
    {
        $subjects=Subject::all();
        $chapters=Chapter::all();
        return view('examsetup.create',compact('subjects','chapters'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'subject_id'=>'required',
                'chapter_id'=>'required',
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
                'subject_id'=>$request->subject_id,
                'chapter_id'=>$request->chapter_id,
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

    public function show(ExamSetup $examsetup)
    {
        return view('examsetup.show',compact('examsetup'));
    }

    public function edit(ExamSetup $examsetup)
    {
        $subjects=Subject::all();
        // dd($subjects);
        $chapters=Chapter::all();
        return view('examsetup.edit',compact('examsetup','subjects','chapters'));
    }

    public function update(Request $request, ExamSetup $examsetup)
    {
        try {
            $request->validate([
                'subject_id'=>'required',
                'chapter_id'=>'required',
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
                'subject_id'=>$request->subject_id,
                'chapter_id'=>$request->chapter_id,
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

    public function destroy(ExamSetup $examsetup)
    {
        $examsetup->delete();

        return redirect(route("examsetups.index"))->with('success', 'Examsetup Deleted Successfully');
    }

    public function examineelist($id){
        $examineelists = Examinee::find($id,'exam_setup_id')->get();
        $results=Result::all();
        return view('examsetup.examineelist',compact('results','examineelists'));
    }


    public function individualresult($roll_no){

        $answers = AnswerScript::where('roll_no',$roll_no)->get();
        $answerscripts=[];
        foreach ($answers as $value) {
            $answerscripts[] = $value;
        }



        return view('examsetup.indiviualresult',compact('answerscripts'));

    }

    public function updatestatus(Request $request, ExamSetup $examsetup)

    {

        $examsetup->status = $request->status == 1 ? 0 : 1;
        $examsetup->save();

    return redirect()->back();

    }

}
