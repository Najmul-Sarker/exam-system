<?php

namespace App\Http\Controllers;

use App\Models\AnswerScript;
use App\Models\ExamSetup;
use App\Models\QuestionBank;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class AnswerScriptController extends Controller
{
    public function store(Request $request){

        try {

            $answers = $request->except('_token','exam_id','examinee_name','roll_no','examinee_id','total_ques');
            $wrong_answer=0;
            $right_answer=0;
            $marks = 0;
            $total_marks=0;
            foreach ($answers as $id => $answer) {
                $question = QuestionBank::find($id);
                $correct = $question->correcct_answer;
                $total_marks +=$question->marks;
                
                if ($answer == $correct) {
                    $result = 'right';
                    $right_answer++;
                    $marks += $question->marks;
                    
                }else {
                    $result = 'wrong';
                    $wrong_answer++;
                }
               AnswerScript::create([
                   'uuid'=> Str::uuid(),
                    'subject_id'=>$question->subject_id,
                    'chapter_id'=>$question->chapter_id,
                    'examinee_name'=>$request->examinee_name,
                    'roll_no'=>$request->roll_no,
                    'exam_id'=>$request->exam_id,
                    'question_text'=>$question->question_text,
                    'option1' => $question->option1,
                    'option2' => $question->option2,
                    'option3' => $question->option3,
                    'option4' => $question->option4,
                    'correcct_answer' => $question->correcct_answer,
                    'submitted_answer' =>$answer,
                    'status'=>$result,
                    'question_level' => $question->question_level,
                    'marks' => $question->marks,
                    'type' => $question->type
                ]);
            }
            

            $examsetups = ExamSetup::all();

            $total_question=$request->total_ques;
            $answered_question = $right_answer+$wrong_answer;
            $negative_marks = $wrong_answer*.25;

            $get_marks=$marks-$negative_marks;

            if ($get_marks <($total_marks*0.33)) {
                $status = 'failed';
            }else{
                $status = 'passed';
            }
            
            $resultsheet = Result::create([
                'uuid'=> Str::uuid(),
                'examinee_name'=>$request->examinee_name,
                'examinee_roll_no'=>$request->roll_no,
                'exam_id'=>$request->exam_id,
                'total_marks'=> $get_marks,
                'status'=>$status,
            ]);

            return view('result.show',compact('resultsheet','total_question','right_answer','answered_question','wrong_answer','negative_marks','get_marks','total_marks','examsetups'));

            // return view ('',compact('resultsheet','total_question','right_answer','answered_question','wrong_answer','negative_marks'));
            
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error("Database Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->withInput()->withErrors('An unexpected error occurred. Please contact support.');
        }
    }
}
