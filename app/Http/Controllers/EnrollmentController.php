<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Program;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Enrollment;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('enrollments.index');
    }

    public function getEnrollment()
{
            $enrollments = Enrollment::with(['program', 'student', 'semester', 'subjects']);
    return DataTables::eloquent($enrollments)
        ->addColumn('image', function ($enrollment) {
            return $enrollment->path
                ? asset('storage/' . $enrollment->path)
                : null;
        })
      
        ->addColumn('subjects', function ($enrollment) {
            return $enrollment->subjects
                ->pluck('name')
                ->implode(', ');
        })
        
        ->addColumn('edit', function ($enrollment) {
            return route('enrollments.edit', $enrollment->id);
        })
        ->addColumn('delete', function ($enrollment) {
            return route('enrollments.destroy', $enrollment->id);
        })
        ->toJson();
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $programs = Program::pluck('name','id');
    $students = Student::all();   
    $semesters = Semester::all();
    $subjects = Subject::all();
    return view('enrollments.create',get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EnrollmentRequest $request)
    {
         $enrollment = Enrollment::create($request->validated());
         $enrollment->subjects()->sync(
            $request->input('subject_ids',[])
         );
          return redirect()->route('enrollments.index')->with('success', 'Enrollment created successfully.');
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
    $enrollment = Enrollment::with('subjects')->findOrFail($id);

    $programs = Program::all();
    $students = Student::all();
    $semesters = Semester::all();
    $subjects = Subject::all();

   return view('enrollments.edit', get_defined_vars());
}

    /**
     * Update the specified resource in storage.
     */
    public function update(EnrollmentRequest $request, string $id)
    {
    $enrollment = Enrollment::findOrFail($id);

    $enrollment->update($request->validated());

    $enrollment->subjects()->sync(
        $request->input('subject_ids', [])
    );

            return redirect()->route('enrollments.index')->with('success', 'Enrollment updated successfully.');
}
    

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $enrollment = Enrollment::findOrFail($id);

    $enrollment->subjects()->detach();

    $enrollment->delete();

    return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
}     
}
