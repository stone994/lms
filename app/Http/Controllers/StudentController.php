<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $students = Student::paginate(1);
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }
public function printPdf($id)
{
    $student = Student::findOrFail($id);

    $pdf = Pdf::loadView('students.print', compact('student'));

    return $pdf->stream('student-' . $student->id . '.pdf');
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
    $student = Student::create($data);

    if ($request->input('action') === 'print') {
        return redirect()->route('students.print', $student->id);
    }


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
        $student->update($request->validated());

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
