
@extends('layouts.welcome')

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">

    <h2 class="text-xl font-bold mb-4">Teacher Subject Allocation</h2>

    <form action="{{ route('teacher_subject_allocation.store') }}"
          method="POST" class="space-y-4">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label>Teacher</label>
                <select name="teacher_id" class="w-full border p-2 rounded">
                    <option value="">Select Teacher</option>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">
                            {{ $teacher->name }}
                        </option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Subject</label>
                <select name="subject_id" class="w-full border p-2 rounded">
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
                @error('subject_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Semester</label>
                <select name="semester_id" class="w-full border p-2 rounded">
                    <option value="">Select Semester</option>
                    @foreach ($semesters as $semester)
                        <option value="{{ $semester->id }}">
                            {{ $semester->semester_number }}
                        </option>
                    @endforeach
                </select>
                @error('semester_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Section</label>
                <input type="text" name="section"
                       placeholder="A"
                       class="w-full border p-2 rounded">
                @error('section')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Session</label>
                <input type="text" name="session"
                       placeholder="Fall 2026"
                       class="w-full border p-2 rounded">
                @error('session')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="flex justify-end">
            <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded">
                Create Allocation
            </button>
        </div>

    </form>

</div>

@endsection
