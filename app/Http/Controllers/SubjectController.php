<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());

        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ], [
                "title.required" => "Enter your Title",
                "description.required" => "Write your description here"
            ]);
        
            Subject::create([
                'uuid'=> Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
            ]);
        
            return redirect(route("subjects.index"))->with('success', 'Subject Create Successfully');
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
    public function show(Subject $subject)
    {
        return view('subject.show',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required'
            ], [
                "title.required" => "Enter your Title",
                "description.required" => "Write your description here"
            ]);
        
            $subject->update([
                'uuid'=> Str::uuid(),
                'title' => $request->title,
                'description' => $request->description,
            ]);
        
            return redirect(route("subjects.index"))->with('success', 'Subject Create Successfully');
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
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect(route("subjects.index"))->with('success', 'Subject Deleted Successfully');
      
    }
}
