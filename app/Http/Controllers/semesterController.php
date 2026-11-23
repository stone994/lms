<?php

namespace App\Http\Controllers;

use App\Http\Requests\SemesterRequest;
use App\Models\Semester;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
        $semesters = Semester::all();
     return view('semesters.index', compact('semesters'));
 
}
public function assignSubjects(Request $request){
    $semester=Semester::findOrFail($request->semester_id);
    $semester->subjects()->attach([
        1 => ['subject_type' => 'compulsory'],
        2 => ['subject_type' => 'optional'],
        3 => ['subject_type' => 'compulsory'],
    ]);
    return "subjects asssign successsfully";
}

public function getSemester()
    {
        $semesters = Semester::with('subjects')
            ->select('semesters.*');

        return DataTables::eloquent($semesters)

            ->addColumn('subjects', function ($semester) {
                return $semester->subjects
                    ->pluck('name')
                    ->implode(', ');
            })

            ->addColumn('edit', function ($semester) {
                return route('semesters.edit', $semester->id);
            })

            ->addColumn('delete', function ($semester) {
                return route('semesters.destroy', $semester->id);
            })

            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $subjects = Subject::all();
        return view('semesters.create', compact('subjects'));
}
        
    /**
     * Store a newly created resource in storage.
     */

  

/**
     * Store a newly created resource in storage.*/
    
   public function store(SemesterRequest $request)
{
    $semester = Semester::create($request->validated());
    $semester->subjects()->sync(
        $request->input('subject_ids', [])
    );

    return redirect()
        ->route('semesters.index')
        ->with('status', 'Program created successfully.');
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
            $subjects = Subject::all(); 

    return view('semesters.edit', compact('semester', 'subjects'));
}

public function show(string $id)
{
    $semester = Semester::with('subjects')->findOrFail($id);

    return view('semesters.show', compact('semester'));
}

public function update(SemesterRequest $request, string $id)
{
    $semester = Semester::findOrFail($id);
    $semester->update($request->validated());
        $semester->subjects()->sync($request->input('subject_ids', []));

    return redirect()
        ->route('semesters.index')
        ->with('success', 'Semester updated successfully!');
}
   
        
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect()->route('semesters.index')
            ->with('success', 'Subject deleted successfully.');
    }
}
