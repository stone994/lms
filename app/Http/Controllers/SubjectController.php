<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectProgram;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $subjects=Subject::all();
        return view('subjects.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubjectProgram $request)
    {
        Subject::create($request->validated());
        return redirect()->route('subjects.index')->with('success','program created successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subjects=Subject::findOrFail($id);
        return view('subjects.edit',compact('subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectProgram $request, string $id)
    {
        
           $subject = Subject::findOrFail($id);
          $subject->update($request->validated());
          return redirect()->route('subjects.index')->with('success','program created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
