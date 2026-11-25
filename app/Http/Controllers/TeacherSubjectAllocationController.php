<?php

namespace App\Http\Controllers;

use App\Http\Requests\AllocationRequest;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Semester;
use App\Models\TeacherSubjectAllocation;
use Yajra\DataTables\Facades\DataTables;
class TeacherSubjectAllocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allocate=TeacherSubjectAllocation::with([
             'teacher',
            'subject',
            'semester'
        ])->latest()->get();
        return view('teacher_subject_allocation.index',compact('allocate'));
    }

    public function getAllocate()
    {
        $allocate = TeacherSubjectAllocation::with([
            'teacher',
            'subject',
            'semester'
        ])->select('teacher_subject_allocations.*');

        return DataTables::eloquent($allocate)

            ->addColumn('teacher', function ($allocate) {
                return $allocate->teacher->name;
            })

            ->addColumn('subject', function ($allocate) {
                return $allocate->subject->name;
            })

            ->addColumn('semester', function ($allocate) {
                return $allocate->semester->semester_number;
            })

            ->addColumn('edit', function ($allocate) {
                return route(
                    'teacher_subject_allocation.edit',
                    $allocate->id
                );
            })

            ->addColumn('delete', function ($allocate) {
                return route(
                    'teacher_subject_allocation.destroy',
                    $allocate->id
                );
            })
            ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers=Teacher::all();
        $subjects=Subject::all();
        $semesters=Semester::all();
        return view('teacher_subject_allocation.create',compact('teachers','subjects','semesters'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(AllocationRequest $request)
{
    $allocate = TeacherSubjectAllocation::create(
        $request->validated()
    );
     

    return redirect()
        ->route('teacher_subject_allocation.index')
        ->with('success', 'Allocation created successfully.');
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
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $semesters = Semester::all();

        return view(
            'teacher_subject_allocation.edit',
            compact(
                'teachers',
                'subjects',
                'semesters'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AllocationRequest $request, string $id)
    {
        $allocate = TeacherSubjectAllocation::findOrFail($id);

    $allocate->update($request->validated());


    return redirect()
        ->route('teacher_subject_allocation.index')
        ->with('success', 'allocation updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $allocate = TeacherSubjectAllocation::findOrFail($id);


    $allocate->delete();

    return redirect()
        ->route('teacher_subject_allocation.index')
        ->with('success', 'allocation deleted successfully.');
    }
}
