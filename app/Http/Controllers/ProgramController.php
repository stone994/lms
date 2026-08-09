<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program=Program::all();
        return view('program.index',compact('program'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated= $request->validate([
            'name'=>'required|string|max:255',
            'program_code'=>'required|string',
            'duration'=>'required|integer|min:1|max:5',
        ]);
        Program::create($validated);
        return redirect()->route('program.index')->with('success','program created successfully');
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
        return view('program.edit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'name'=>'required|string|max:255',
            'program_code'=>'required|string',
            'duration'=>'required|integer|min:1|max:5',
        ]);

        
        $program = Program::findOrFail($id);
        $program->update($request);
        return redirect()->route('program.index')->with('success','program update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
