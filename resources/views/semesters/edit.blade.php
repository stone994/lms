@extends('layouts.welcome')

@section('content')

@php
    $selectedSubjects = old(
        'subject_ids',
        $semester->subjects->pluck('id')->toArray()
    );
@endphp

{!! html()->div()
    ->class('w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm')
    ->open() !!}

    {!! html()->element('h2', 'Edit Semester Scheme')
        ->class('text-xl font-bold mb-4') !!}

    {{-- Form --}}
    {!! html()->form('PUT', route('semesters.update', $semester->id))
        ->class('space-y-4')
        ->open() !!}


        {{-- Program Name --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Program Name', 'program_name')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text(
                'program_name',
                old('program_name', $semester->program_name)
            )
                ->id('program_name')
                ->required()
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('program_name')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Semester Number --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Semester Number', 'semester_number')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->select(
                'semester_number',
                collect(range(1, 8))->mapWithKeys(function ($i) {
                    return [$i => 'Semester ' . $i];
                })->toArray(),
                old('semester_number', $semester->semester_number)
            )
                ->id('semester_number')
                ->placeholder('-- Choose Semester --')
                ->required()
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('semester_number')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Select Subjects --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Select Subjects')
                ->class('block text-sm font-medium text-gray-700 mb-2') !!}

            {!! html()->div()
                ->class('grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto')
                ->open() !!}

                @foreach($subjects as $subject)

                    {!! html()->div()
                        ->class('flex items-center space-x-2 text-sm text-gray-700 cursor-pointer')
                        ->open() !!}

                      {{  !! html()->checkbox(
    'subject_ids[]',
    in_array(
        $subject->id,
        old('subject_ids', $semester->subjects->pluck('id')->toArray())
    ),
    $subject->id
)
    ->id('subject_' . $subject->id)
    ->class('rounded text-blue-600') !!}

                        {!! html()->label(
                            $subject->name . ' (' . $subject->course . ')',
                            'subject_' . $subject->id
                        ) !!}

                    {!! html()->div()->close() !!}

                @endforeach

            {!! html()->div()->close() !!}

        {!! html()->div()->close() !!}


        {{-- Total Subjects --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Total Subjects', 'total_subjects')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->number(
                'total_subjects',
                old('total_subjects', $semester->total_subjects)
            )
                ->id('total_subjects')
                ->attribute('min', 0)
                ->required()
                ->placeholder('Enter total subjects')
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('total_subjects')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Subject Type --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Subject Type', 'type')
                ->class('block mb-2 font-medium') !!}

            {!! html()->select('type', [
                'Compulsory' => 'Compulsory',
                'Optional' => 'Optional'
            ], old('type', $semester->type))
                ->id('type')
                ->required()
                ->class('w-full border rounded-md p-2') !!}

        {!! html()->div()->close() !!}


        {{-- Optional / Elective Subjects --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Optional / Elective Subjects')
                ->class('block text-sm font-medium text-cyan-600') !!}

        {!! html()->div()->close() !!}


        {{-- Buttons --}}
        {!! html()->div()
            ->class('flex justify-end space-x-2 pt-2')
            ->open() !!}

            {!! html()->a(route('semesters.index'), 'Cancel')
                ->class('px-4 py-2 bg-gray-200 rounded-lg text-sm') !!}

            {!! html()->submit('Update Semester')
                ->class('bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow') !!}

        {!! html()->div()->close() !!}


    {!! html()->form()->close() !!}

{!! html()->div()->close() !!}

@endsection