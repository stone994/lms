<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Transliterator;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $teachers=Teacher::all();
        return view('teachers.index',compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('teachers.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        $teacher=Teacher::create($request->validated());
        $teacher->subjects()->sync(
        $request->input('subject_ids', [])
    );
        return redirect()->route('teachers.index')->with('success','teacher create successfullt');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::with('subjects')->findOrFail($id);
        return view('teachers.show', compact('teacher')); 
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $teacher = Teacher::findOrFail($id);
    $subjects = Subject::all();

    return view('teachers.edit', [
        'teacher' => $teacher,
        'subjects' => $subjects,
    ]);
}
    
   
    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {
       
        $teacher=Teacher::findOrFail($id);
        $teacher->update($request->validated());
        $teacher->subjects()->sync($request->input('subject_ids', []));
        return redirect()->route('teachers.index')->with('success','teacher create successfullt');
    }
    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'teacher deleted successfully.');
    }
}
