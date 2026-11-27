
@extends('layouts.welcome')

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">

    <h2 class="text-xl font-bold mb-4">Enroll Student</h2>

    {{ html()->form('POST')->route('enrollments.store')->open() }}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Program -->
        <div>
            {{ html()->label('Program', 'program_id') }}

            {{ html()->select(
                'program_id',
                $programs->pluck('name', 'id')->toArray()
            )->placeholder('Select Program')->class('w-full rounded-lg border px-3 py-2') }}
        </div>

        <!-- Student -->
        <div>
            {{ html()->label('Student', 'student_id') }}

            {{ html()->select(
                'student_id',
                $students->pluck('name', 'id')->toArray()
            )->placeholder('Select Student')->class('w-full rounded-lg border px-3 py-2') }}
        </div>

        <!-- Semester -->
        <div>
            {{ html()->label('Semester', 'semester_id') }}

            {{ html()->select(
                'semester_id',
                $semesters->pluck('semester_number', 'id')->toArray()
            )->placeholder('Select Semester')->class('w-full rounded-lg border px-3 py-2') }}
        </div>

        <!-- Subjects -->
        <div>

            {{ html()->label('Select Subjects') }}

            @forelse($subjects as $subject)

                <div class="flex items-center space-x-2">

                    {{ html()->checkbox(
                        'subject_ids[]',
                        false,
                        $subject->id
                    ) }}

                    {{ html()->label(
                        $subject->name,
                        'subject_ids'
                    ) }}

                </div>

            @empty

                <p class="text-red-600 text-sm">
                    No subjects found. Please add subjects first.
                </p>

            @endforelse

        </div>

        <!-- Session -->
        <div>
            {{ html()->label('Session', 'session') }}

            {{ html()->text('session')
                ->placeholder('Fall 2026')
                ->class('w-full rounded-lg border px-3 py-2') }}
        </div>

        <!-- Status -->
        <div>
            {{ html()->label('Status', 'status') }}

            {{ html()->select('status', [
                'active' => 'Active',
                'inactive' => 'Inactive'
            ], 'active')
            ->class('w-full rounded-lg border px-3 py-2') }}
        </div>

    </div>

    <!-- Buttons -->
    <div class="flex justify-end space-x-2 pt-2">

        <a href="{{ route('enrollments.index') }}"
           class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
            Cancel
        </a>

        {{ html()->submit('Save Enrollment')
            ->class('px-4 py-2 bg-green-600 text-white rounded-lg text-sm') }}

    </div>

    {{ html()->form()->close() }}

</div>

@endsection
