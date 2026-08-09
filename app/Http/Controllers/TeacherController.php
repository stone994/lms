<?php

namespace App\Http\Controllers;

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
         $teacher=Teacher::all();
        return view('teacher.index',compact('teacher'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'phone'=>'required|string|max:11',
            'department'=>'required|string|max:255',
            'education'=>'required|string|max:255',
        ]);
        Teacher::create($validated);
        return redirect()->route('teacher.index')->with('success','teacher create successfullt');
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
        $teacher=Teacher::findOrFail($id);
        return view('teacher.edit',compact('teacher'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'phone'=>'required|string|max:11',
            'department'=>'required|string|max:255',
            'education'=>'required|string|max:255',
        ]);
        $teacher=Teacher::findOrFail($id);
        $teacher->update($validated);
        return redirect()->route('teacher.index')->with('success','teacher create successfullt');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
