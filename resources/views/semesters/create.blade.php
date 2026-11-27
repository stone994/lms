@extends('layouts.welcome')

@section('content')

{!! html()->div()->class('container mx-auto px-4 pt-6')->open() !!}

    {!! html()->div()->class('flex justify-center')->open() !!}

        {!! html()->div()->class('w-full max-w-4xl')->open() !!}

            {{-- Card Container --}}
            {!! html()->div()->class('bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden')->open() !!}

                {{-- Header --}}
                {!! html()->div()->class('bg-indigo-600 px-6 py-4')->open() !!}

                    {!! html()->element('h3', 'Add Semester')
                        ->class('text-lg font-semibold text-white') !!}

                {!! html()->div()->close() !!}

                {{-- Form --}}
                {!! html()->form('POST', route('semesters.store'))->open() !!}

                    {{-- Validation Errors --}}
                    @if ($errors->any())

                        {!! html()->div()->class('text-red-600 mb-4')->open() !!}

                            @foreach ($errors->all() as $error)

                                {!! html()->element('p', $error) !!}

                            @endforeach

                        {!! html()->div()->close() !!}

                    @endif

                    {!! html()->div()->class('p-6 space-y-6')->open() !!}

                        {{-- Program Name --}}
                        {!! html()->div()->open() !!}

                            {!! html()->label('Program Name', 'program_name')
                                ->class('block text-sm font-medium text-gray-700') !!}

                            {!! html()->text('program_name', old('program_name'))
                                ->required()
                                ->placeholder('e.g. BS Computer Science')
                                ->class('w-full border p-2 rounded-lg mt-1') !!}

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
                                old('semester_number')
                            )
                                ->placeholder('-- Choose Semester --')
                                ->id('semester_number')
                                ->required()
                                ->class('mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-3 py-2') !!}

                        {!! html()->div()->close() !!}


                        {{-- Horizontal Line --}}
                        <hr class="border-t border-gray-200 my-4">


                        {{-- Total Subjects --}}
                        {!! html()->div()->open() !!}

                            {!! html()->label('Total Subjects', 'total_subjects')
                                ->class('block text-sm font-medium text-gray-700 mb-2') !!}

                            {!! html()->number('total_subjects', old('total_subjects'))
                                ->id('total_subjects')
                                ->attribute('min', 0)
                                ->required()
                                ->placeholder('Enter total subjects')
                                ->class('w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm py-2 px-3 border') !!}

                            @error('total_subjects')

                                {!! html()->element('p', $message)
                                    ->class('text-red-500 text-sm mt-1') !!}

                            @enderror

                        {!! html()->div()->close() !!}


                        {{-- Select Subjects --}}
                        {!! html()->div()->open() !!}

                            {!! html()->label('Select Subjects')
                                ->class('block text-sm font-medium text-gray-700 mb-2') !!}

                            {!! html()->div()
                                ->class('grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto')
                                ->open() !!}

                                @forelse($subjects as $subject)

                                    {!! html()->div()
                                        ->class('flex items-center space-x-2 text-sm text-gray-700 cursor-pointer')
                                        ->open() !!}

                                        {!! html()->checkbox(
                                            'subject_ids[]',
                                            in_array($subject->id, old('subject_ids', [])),
                                            $subject->id
                                        )
                                            ->id('subject_' . $subject->id)
                                            ->class('rounded text-blue-600') !!}

                                        {!! html()->label(
                                            $subject->name . ' (' . $subject->course . ')',
                                            'subject_' . $subject->id
                                        ) !!}

                                    {!! html()->div()->close() !!}

                                @empty

                                    {!! html()->element(
                                        'p',
                                        'No subjects found. Please add subjects first.'
                                    )->class('text-red-600 text-sm') !!}

                                @endforelse

                            {!! html()->div()->close() !!}

                        {!! html()->div()->close() !!}


                        {{-- Subject Type --}}
                        {!! html()->div()->open() !!}

                            {!! html()->label('Subject Type', 'type')
                                ->class('block mb-2 font-medium') !!}

                            {!! html()->select('type', [
                                'Compulsory' => 'Compulsory',
                                'Optional' => 'Optional'
                            ], old('type'))
                                ->required()
                                ->class('w-full border rounded-md p-2') !!}

                        {!! html()->div()->close() !!}

                    {!! html()->div()->close() !!}


                    {{-- Footer Buttons --}}
                    {!! html()->div()
                        ->class('px-6 py-4 bg-gray-50 border-t border-gray-200 text-right space-x-3')
                        ->open() !!}

                        {!! html()->a(route('semesters.index'), 'Cancel')
                            ->class('inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500') !!}

                        {!! html()->submit('Save Semester Scheme')
                            ->class('inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500') !!}

                    {!! html()->div()->close() !!}

                {!! html()->form()->close() !!}

            {!! html()->div()->close() !!}

        {!! html()->div()->close() !!}

    {!! html()->div()->close() !!}

{!! html()->div()->close() !!}

@endsection