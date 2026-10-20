<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemesterRequest;
use App\Models\Semester;
use Illuminate\Http\Request;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
     $semesters= Semester::all();
     return view('semesters.index', compact('semesters'));
 
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $semesters = Semester::all();

    return view('semesters.create', compact('semesters'));
}
        
    /**
     * Store a newly created resource in storage.
     */
    
public function store(SemesterRequest $request)
{
    Semester::create($request->validated());

    return redirect()
        ->route('semesters.index')
        ->with('success', 'Semester added successfully!');
}
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
     public function edit(string $id)
{
    $semester = Semester::findOrFail($id);
    return view('semesters.edit', compact('semester'));
}

public function update(SemesterRequest $request, string $id)
{
    $semester = Semester::findOrFail($id);
    $semester->update($request->validated());

    return redirect()
        ->route('semesters.index')
        ->with('success', 'Semester updated successfully!');
}
   
        
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Subject deleted successfully.');
    }
}
