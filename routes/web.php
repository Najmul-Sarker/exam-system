<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ExamSetupController;
use App\Http\Controllers\QuestionBankController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::resource('subjects', SubjectController::class);
Route::resource('chapters', ChapterController::class);
Route::resource('questionbanks', QuestionBankController::class);
Route::resource('examsetups', ExamSetupController::class);