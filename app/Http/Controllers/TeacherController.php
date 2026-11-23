<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
       return view('teachers.index', compact('teachers'));
    }

    public function getTeacher()
    {
        $teachers = Teacher::with('subjects')
            ->select('teachers.*');

        return DataTables::eloquent($teachers)

            ->addColumn('image', function ($teacher) {
                return $teacher->path
                    ? asset('storage/' . $teacher->path)
                    : null;
            })

            ->addColumn('subjects', function ($teacher) {
                return $teacher->subjects
                    ->pluck('name')
                    ->implode(', ');
            })

            ->addColumn('edit', function ($teacher) {
                return route('teachers.edit', $teacher->id);
            })

            ->addColumn('delete', function ($teacher) {
                return route('teachers.destroy', $teacher->id);
            })

            ->toJson();
    }

    public function create()
    {
     $subjects = Subject::all();

    return view('teachers.create', compact('subjects'));
    }

    public function store(TeacherRequest $request)
{
    $data = $request->validated();

    $subjectIds = $data['subject_ids'] ?? [];

    unset($data['subject_ids']);

    if ($request->hasFile('image')) {
        $data['path'] = $request->file('image')
            ->store('teachers', 'public');
    }

    unset($data['image']);

    $teacher = Teacher::create($data);

    $teacher->subjects()->sync($subjectIds);

    return redirect()
        ->route('teachers.index')
        ->with('success', 'Teacher added successfully!');
}
   

    public function show(string $id)
    {
       
    }

    public function edit(string $id)
    {
     $teacher = Teacher::findOrFail($id);

        return view('teachers.edit', compact('teacher'));  
    }

    public function update(TeacherRequest $request, string $id)
    {
     
         $teacher = Teacher::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($teacher->path) {
                Storage::disk('public')->delete($teacher->path);
            }

            $data['path'] = $request->file('image')
                ->store('teachers', 'public');
        }

        unset($data['image']);

        $teacher->update($data);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'teacher updated successfully!');
    }

    public function destroy(string $id)
    {
         $teacher = Teacher::findOrFail($id);

        if ($teacher->path) {
            Storage::disk('public')->delete($teacher->path);
        }

        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'teacher deleted successfully!');
    }
        
}