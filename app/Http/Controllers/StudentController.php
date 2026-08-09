<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $student= Student::all();
        return view('student.index', compact('student'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lms_account' => 'required|string|max:20',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'cnic'        => 'required|string|max:20',
        ]);

        Student::create($validated);

        return redirect()->route('student.index')->with('success', 'Student added successfully!');
    }

    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'lms_account' => 'required|string|max:20',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'cnic'        => 'required|string|max:20',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validated);

        return redirect()->route('student.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.index')->with('success', 'Student deleted successfully!');
    }
}
