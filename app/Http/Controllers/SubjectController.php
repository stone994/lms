<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $subject=Subject::all();
        return view('subject.index',compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subject.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $validated=$request->validate([
            'name'=>'required|string|max:255',
            'code'=>'required|string',
            'credit_hour'=>'required|integer|min:1|max:6',
          ]);
          Subject::create($validated);
          return redirect()->route('subject.index')->with('success','program created successfully');


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
        $subject=Subject::findOrFail($id);
        return view('subject.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated=$request->validate([
            'name'=>'required|string|max:255',
            'code'=>'required|string',
            'credit_hour'=>'required|integer|min:1|max:6',
          ]);
           $subject = Subject::findOrFail($id);
        $subject->update($validated);
          return redirect()->route('subject.index')->with('success','program created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
