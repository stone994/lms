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
        $programs=Program::all();
        $programs = Program::with('subjects')->get();
        return view('programs.index',compact('programs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('programs.create',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request)
    {
        Program::create($request->validated());
        return redirect()->route('programs.index')->with('success','program created successfully');
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
        $program = Program::findOrFail($id);
        return view('programs.edit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramRequest $request, string $id)
    {
         
        $program = Program::findOrFail($id);
        $program->update($request);
        return redirect()->route('programs.index')->with('success','program update successfully');
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
