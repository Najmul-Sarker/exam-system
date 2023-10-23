<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ExamineeController;
use App\Http\Controllers\ExamSetupController;
use App\Http\Controllers\AnswerScriptController;
use App\Http\Controllers\QuestionBankController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function(){

   
        
        Route::resource('subjects', SubjectController::class);

        Route::resource('chapters', ChapterController::class);
        Route::resource('questionbanks', QuestionBankController::class);
        
        
        Route::get('questionbank/excel', [QuestionBankController::class,'excel'])->name('questionbank.excel');
        Route::post('questionbank/import', [QuestionBankController::class,'import'])->name('questionbank.import');
        
        
        Route::resource('examsetups', ExamSetupController::class);
        Route::get('examsetups/examineelist/{id}',[ExamSetupController::class,'examineelist'])->name('examsetup.examineelist');
        Route::get('examsetups/individualresult/{roll_no}',[ExamSetupController::class,'individualresult'])->name('examsetup.individualresult');
        Route::put('examsetups/status/update/{examsetup}', [ExamSetupController::class,'updatestatus'])->name('examsetup.update.status');
        
        
        Route::get('examinees/create',[ExamineeController::class,'create'])->name('examinees.create');
        Route::post('examinees/store',[ExamineeController::class,'store'])->name('examinees.store');
        // Route::get('examinees/questionpaper',[ExamineeController::class,'questionpaper'])->name('examinees.questionpapers');
        
        
        
        
        // Route::get('answerscripts/create',[ExamineeController::class,'create'])->name('examinees.create');
        Route::post('answerscripts/store',[AnswerScriptController::class,'store'])->name('answerscripts.store');
        // Route::get('examinees/questionpaper',[ExamineeController::class,'questionpaper'])->name('examinees.questionpapers');
        
        
        Route::get('results/index',[ResultController::class,'index'])->name('index.show');
        Route::get('results/show',[ResultController::class,'show'])->name('result.show');

         //routes for user
        Route::prefix('users')->name('user.')->controller(UserController::class)->group(function(){
    
        Route::get('/user/view','user')->name('view');
        Route:: get('/','index')->name('index');
        Route:: get('/myprofile','myprofile')->name('myprofile');
        Route:: get('/edit/{user}','edit')->name('edit');
        Route:: post('/update/{user}','update')->name('update');
        Route:: delete('/delete/{user}','delete')->name('delete');

    

    });

        

});