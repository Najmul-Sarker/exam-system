<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapters=Chapter::all();
        return view('chapter.index',compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects =Subject::all();
        return view('chapter.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                // dd($request->all());

                try {
                    $request->validate([
                        'subject_id'=>'required',
                        'title' => 'required',
                        'description' => 'required'
                    ], [
                        "title.required" => "Enter your Title",
                        "description.required" => "Write your description here"
                    ]);
                
                    Chapter::create([
                        'uuid'=> Str::uuid(),
                        'subject_id'=>$request->subject_id,
                        'title' => $request->title,
                        'description' => $request->description,
                    ]);
                
                    return redirect(route("chapters.index"))->with('success', 'Subject Create Successfully');
                } catch (\Illuminate\Database\QueryException $e) {
                    Log::error("Database Error: " . $e->getMessage());
                    return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
                } catch (\Exception $e) {
                    Log::error("Error: " . $e->getMessage());
                    return redirect()->back()->with('error', 'An unexpected error occurred. Please contact support.');
                }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        return view('chapter.show',compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        $subjects=Subject::all();
        return view('chapter.edit',compact('chapter','subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapter $chapter)
    {
        // dd($request->all());
        try {
            $request->validate([
                'subject_id'=>'required',
                'title' => 'required',
                'description' => 'required'
            ], [
                "title.required" => "Enter your Title",
                "description.required" => "Write your description here"
            ]);
        
            $chapter->update([
                'uuid'=> Str::uuid(),
                'subject_id'=>$request->subject_id,
                'title' => $request->title,
                'description' => $request->description,
            ]);
        
            return redirect(route("chapters.index"))->with('success', 'Subject Create Successfully');
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error("Database Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the data. Please try again later.');
        } catch (\Exception $e) {
            Log::error("Error: " . $e->getMessage());
            return redirect()->back()->with('error', 'An unexpected error occurred. Please contact support.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();

        return redirect(route("chapters.index"))->with('success', 'Chapter Deleted Successfully');
    }
}
