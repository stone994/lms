<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use App\Http\Requests\ProgramRequest;
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $subjects = Subject::all();
        return view('programs.create', compact('subjects'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
public function store(ProgramRequest $request)
{
    $program = Program::create($request->validated());

    $program->subjects()->sync(
        $request->input('subject_ids', [])
    );

    return redirect()
        ->route('programs.index')
        ->with('status', 'Program created successfully.');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $program = Program::with('subjects')->findOrFail($id);

        return view('programs.show', compact('program')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    
public function edit(string $id)
    {
        $program = Program::findOrFail($id);
        $subjects = Subject::all(); 
        
        return view('programs.edit', compact('program', 'subjects'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(ProgramRequest $request, string $id)
    {
        $program = Program::findOrFail($id);
        $program->update($request->validated());
        $program->subjects()->sync($request->input('subject_ids', []));
        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return redirect()->route('programs.index')->with('success', 'program deleted successfully.');
    }
}
