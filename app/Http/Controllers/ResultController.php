<?php

namespace App\Http\Controllers;

use App\Models\ExamSetup;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index(){
        $results = Result::all();
        $examsetups = ExamSetup::all();

        return view('result.index',compact('results','examsetups'));


    }

    
}
