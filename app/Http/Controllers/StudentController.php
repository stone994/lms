<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Support\Facades\Storage;

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

   
public function store(StudentRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('image')) {
        $data['path'] = $request->file('image')
            ->store('students', 'public');
    }

    unset($data['image']);

    Student::create($data);

    return redirect()
        ->route('students.index')
        ->with('success', 'Student added successfully!');
}
    public function edit(string $id)
{
    $student = Student::findOrFail($id);

    return view('students.edit', compact('student'));
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
