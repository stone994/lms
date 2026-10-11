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
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {
        Teacher::create($request->validated());
        return redirect()->route('teachers.index')->with('success','teacher create successfullt');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers=Teacher::findOrFail($id);
        return view('teachers.edit',compact('teachers'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {
       
        $teacher=Teacher::findOrFail($id);
        $teacher->update($request);
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
