<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LDAP\Result;

class ResultController extends Controller
{
    public function show(){
        return view('result.show');
    }
}
