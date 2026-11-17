<?php

namespace App\Http\Controllers;
use App\Http\Requests\AcademicRequest;
use App\Models\Academic;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

use function Laravel\Prompts\datatable;

class AcademicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $academics = Academic::all();

        return view('academics.index', compact('academics'));
    }

    public function getAcademic(){
        $academic=Academic::query();

        return DataTables::eloquent($academic)

        ->addColumn('edit',function($academic){
            return route('academics.edit', $academic->id);
        })
        ->addColumn('delete', function ($academic) {
                return route('academics.destroy', $academic->id);
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(){
        $academics=Academic::all();
        return view('academics.create',compact('academics'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(AcademicRequest $request)
{
    $academic = Academic::create($request->validated());

    return redirect()
        ->route('academics.index')
        ->with('success', 'Academic session created successfully');
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
        $academic=Academic::findOrFail($id);
        return view('academics.edit',compact('academics'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicRequest $request, string $id)
    {
       $academic = Academic::update($request->validated());
        return redirect()
            ->route('academics.index')
            ->with('success', 'sessions deleted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                $academic = Academic::findOrFail($id);
 $academic->delete();
        return redirect()
            ->route('academics.index')
            ->with('success', 'sessions deleted successfully!');
    }
}

