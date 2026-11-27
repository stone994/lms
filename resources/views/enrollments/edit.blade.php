@extends('layouts.welcome') 

@section('content')


    {{ html->div()->class('w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm')->open() }}

    <h2 class="text-xl font-bold mb-4">Enroll student</h2>
            {{ html()->form('PUT', route('enrollments.update', $enrollment->id))->open() }}
            {{ html()->div()->class('grid grid-cols-1 md:grid-cols-2 gap-6')->open() }}
            
    {{ html()->div()->open() }}

        {{ html()->label('Program', 'program_id')
                ->class('block text-sm font-medium text-gray-700 mb-1') }}

       {{ html()->select(
                'program_id',
                $programs->pluck('name', 'id')->toArray(),
                old('program_id', $enrollment->program_id)
            )
            ->placeholder('Select Program')
            ->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm') }}
{{ html()->div()->close() }}

   {{ html()->div()open() }}
       {{ html()->label('Student', 'student_id')
                ->class('block text-sm font-medium text-gray-700 mb-1') }}

            {{ html()->select(
                'student_id',
                $students->pluck('name', 'id')->toArray(),
                old('student_id', $enrollment->student_id)
            )
            ->placeholder('Select Student')
            ->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm') }}
    {{ html()->div()->close() }}

   {{ html()->div()open() }}

      {{ html()->label('Semester', 'semester_id')
                ->class('block text-sm font-medium text-gray-700 mb-1') }}

            {{ html()->select(
                'semester_id',
                $semesters->pluck('semester_number', 'id')->toArray(),
                old('semester_id', $enrollment->semester_id)
            )
            ->placeholder('Select Semester')
            ->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm') }}
   {{html()->div()->close()}}

{{html()->div()->open()}}
                 {{ html()->label('Select Subjects')
                ->class('block text-sm font-medium text-gray-700 mb-2') }}

                    
                @foreach($subjects as $subject)

                    <div class="flex items-center space-x-2">

                        {{ html()->checkbox(
                            'subject_ids[]',
                            in_array($subject->id, $selectedSubjects),
                            $subject->id
                        )
                        ->id('subject_' . $subject->id)
                        ->class('rounded text-blue-600') }}

                        {{ html()->label(
                            $subject->name,
                            'subject_' . $subject->id
                        )
                        ->class('text-sm text-gray-700 cursor-pointer') }}
                           {{html()->div()->close()}}

                                       @endforeach
 
   {{html()->div()->close()}}

       {{html()->div()->open()}}

        {{ html()->label('Session', 'session')
                ->class('block text-sm font-medium text-gray-700 mb-1') }}

            {{ html()->text(
                'session',
                old('session', $enrollment->session)
            )
            ->placeholder('Fall 2026')
            ->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm') }}
   {{html()->div()->close()}}

   {{html()->div()->open()}}

        {{ html()->label('Status', 'status')
                ->class('block text-sm font-medium text-gray-700 mb-1') }}

            {{ html()->select(
                'status',
                [
                    'active' => 'Active',
                    'inactive' => 'Inactive'
                ],
                old('status', $enrollment->status)
            )
            ->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm') }}

   {{html()->div()->close()}}

   {{html()->div()->close()}}


                {{ html()->div()->class('flex justify-end space-x-2 pt-2') }}
                {{ html()->a(
            route('enrollments.index'),
            'Cancel'
        )->class('px-4 py-2 bg-gray-200 rounded-lg text-sm') }}

        {{ html()->submit('Update Enrollment')
            ->class('px-4 py-2 bg-green-600 text-white rounded-lg text-sm') }}
   {{html()->div()->close()}}
    {{ html()->form()->close() }}
   {{html()->div()->close()}}
@endsection