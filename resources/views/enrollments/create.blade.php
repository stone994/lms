
@extends('layouts.welcome')

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
<<<<<<< HEAD

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
=======
    <h2 class="text-xl font-bold mb-4">Enroll student</h2>
    {{ html()->form('POST', route('enrollments.store'))->open() }}

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <label for="program_id" class="block text-sm font-medium text-gray-700 mb-1">Program</label>
            {{ html()->select('program_id', $programs)->placeholder('Select Program')->class('w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition') }}
        </div>

        <div>
            <label for="student_id" class="block text-sm font-medium text-gray-700 mb-1">Student</label>
            <select name="student_id" id="student_id" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
                <option value="">Select Student</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="semester_id" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
            <select name="semester_id" id="semester_id" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
                <option value="">Select Semester</option>
                @foreach ($semesters as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->semester_number }}</option>
                @endforeach
            </select>
        </div>
     
    <div>
    <label class="block text-sm font-medium text-gray-700 mb-1">
            Select Subjects
        </label>
        
            @forelse($subjects as $subject)
                <label class="flex items-center space-x-2 text-sm text-gray-700 cursor-pointer">
                    <input
                        type="checkbox"
                        name="subject_ids[]"
                        value="{{ $subject->id }}"
                        class="rounded text-blue-600"
                    >

                    <span>
                        {{ $subject->name }} 
                    </span>
                </label>
            @empty
                <p class="text-red-600 text-sm">
                    No subjects found. Please add subjects first.
                </p>
            @endforelse
>>>>>>> 860f18a24a334d84c2963f7c3f0f60d7a59242fd

        </div>

        <div>
            <label for="session" class="block text-sm font-medium text-gray-700 mb-1">Session</label>
            <input type="text" name="session" id="session" placeholder="Fall 2026" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
        </div>

        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status" id="status" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>
    </div>

<<<<<<< HEAD
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
=======
          
            
        <div class="flex justify-end space-x-2 pt-2">
            <a href="{{ route('enrollments.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Save Enrollment</button>
        </div>
    {{ html()->form()->close() }}
</div>
@endsection
>>>>>>> 860f18a24a334d84c2963f7c3f0f60d7a59242fd
