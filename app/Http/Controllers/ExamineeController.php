<?php

namespace App\Http\Controllers;

use App\Models\Examinee;
use App\Models\ExamSetup;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ExamineeController extends Controller
{
    public function create(){
        $examsetups = ExamSetup::all();
        return view('examinee.create',compact('examsetups'));
    }

    public function store(Request $request){
      
        // dd($request->all());
        $exam_id = $request->exam_setup_id;
        $exams = ExamSetup::where('id',$exam_id)->first();
        // dd($exams);
        $total_ques = $exams->total_question;
        $subject = $exams->subject_id;
        $chapter = $exams->chapter_id;
        // dd($chapter);
        $easy_ques = $exams->easy_question;
        $hard_ques = $exams->hard_question;
        $description_ques = $exams->question_description;
        // dd($easy);
        $easy_q =  QuestionBank::where('question_level','easy')->where('subject_id',$subject)->where('chapter_id',$chapter)->take($easy_ques)->get();
        $hard_q =  QuestionBank::where('question_level','hard')->where('subject_id',$subject)->where('chapter_id',$chapter)->take($hard_ques)->get();
        $description_q =  QuestionBank::where('question_level','hard')->where('subject_id',$subject)->where('chapter_id',$chapter)->take($description_ques)->get();

        $questions = $easy_q->concat($hard_q)->concat($description_q);

        

        try {
            $request->validate([
                'exam_setup_id'=>'required',
                'name' => 'required',
                'roll_no' => 'required'
            ]);
            $examinees =Examinee::create([
                'uuid'=> Str::uuid(),
                'exam_setup_id'=>$request->exam_setup_id,
                'name'=>$request->name,
                'roll_no'=>$request->roll_no
            ]);
        
            

            return view('examinee.questionpaper',compact('examinees','questions'));
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error("Database Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please contact support.');
        }
    }

    // public function questionpaper(){
    //     // dd($request->all());
    //     return view('examinee.questionpaper');
    // }

}
