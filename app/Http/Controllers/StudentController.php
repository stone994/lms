<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $students= Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        Student::create($request->validated());
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }

    public function edit(string $id)
    {
        $students = Student::findOrFail($id);
        return view('students.edit', compact('students'));
    }

    public function update(StudentRequest $request, string $id)
    {

        $student = Student::findOrFail($id);
        $student->update($request);

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
