<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Enrollment;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments=Enrollment::with([
             'program',
            'student',
            'semester'
        ])->latest()->get();
        return view('enrollments.index',compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $programs = Program::all();
    $students = Student::all();   
    $semesters = Semester::all();
    return view('enrollments.create',compact('programs','students','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrollmentRequest $request)
    {
         $enrollment = Enrollment::create($request->validated());
          return redirect()
        ->route('enrollments.index')
        ->with('success', 'Enrollment created successfully.');
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
        $programs = Program::all();
    $students = Student::all();   
    $semesters = Semester::all();
    return view('enrollments.edit',compact('programs','students','semesters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnrollmentRequest $request, string $id)
    {
        $enrollment = Enrollment::update($request->validated());
          return redirect()
        ->route('enrollments.index')
        ->with('success', 'Enrollment update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $enrollment = Enrollment::findOrFail($id);
    $enrollment->delete();

    return redirect()
        ->route('enrollments.index')
        ->with('success', 'Enrollment deleted successfully.');
} 
}
