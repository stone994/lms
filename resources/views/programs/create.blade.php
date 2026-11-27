@extends('layouts.welcome')

@section('content')

{!! html()->div()->class('w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm')->open() !!}

    {!! html()->element('h2', 'Add New Program')->class('text-xl font-bold mb-4') !!}

    {!! html()->form('POST', route('programs.store'))->class('space-y-4')->open() !!}

        {{-- Program Name --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Program Name', 'name')->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('name')
                ->required()
                ->placeholder('e.g. BS Computer Science')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Program Code --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Program Code', 'program_code')->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('program_code')
                ->required()
                ->placeholder('e.g. BSCS')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Duration --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Duration (Years)', 'duration')->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->number('duration', 4)
                ->required()
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Select Subjects --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Select Subjects')->class('block text-sm font-medium text-gray-700 mb-2') !!}

            {!! html()->div()->class('grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto')->open() !!}

                @forelse($subjects as $subject)

                    {!! html()->div()->class('flex items-center space-x-2 text-sm text-gray-700 cursor-pointer')->open() !!}

                        {!! html()->checkbox('subject_ids[]', false, $subject->id)
                            ->id('subject_' . $subject->id)
                            ->class('rounded text-blue-600') !!}

                        {!! html()->label(
                            $subject->name . ' (' . $subject->course . ')',
                            'subject_' . $subject->id
                        ) !!}

                    {!! html()->div()->close() !!}

                @empty

                    {!! html()->element('p', 'No subjects found. Please add subjects first.')
                        ->class('text-red-600 text-sm') !!}

                @endforelse

            {!! html()->div()->close() !!}

        {!! html()->div()->close() !!}

        {{-- Buttons --}}
        {!! html()->div()->class('flex justify-end space-x-2 pt-2')->open() !!}

            {!! html()->a(route('programs.index'), 'Cancel')
                ->class('px-4 py-2 bg-gray-200 rounded-lg text-sm') !!}

            {!! html()->submit('Save Program')
                ->class('bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition') !!}

        {!! html()->div()->close() !!}

    {!! html()->form()->close() !!}

{!! html()->div()->close() !!}

@endsection