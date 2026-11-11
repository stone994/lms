<?php

namespace App\Http\Controllers;


use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function getStudents()
    {
        $students = Student::query();

        return DataTables::eloquent($students)
            ->addColumn('image', function ($student) {
                return $student->path
                    ? asset('storage/' . $student->path)
                    : null;
            })
            ->addColumn('edit', function ($student) {
                return route('students.edit', $student->id);
            })
            ->addColumn('delete', function ($student) {
                return route('students.destroy', $student->id);
            })
            ->addColumn('print', function ($student) {
                return route('students.print', $student->id);
            })
            ->toJson();
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

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($student->path) {
                Storage::disk('public')->delete($student->path);
            }

            $data['path'] = $request->file('image')
                ->store('students', 'public');
        }

        unset($data['image']);

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);

        // Clean up the image file from storage when the record is deleted
        if ($student->path) {
            Storage::disk('public')->delete($student->path);
        }

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}