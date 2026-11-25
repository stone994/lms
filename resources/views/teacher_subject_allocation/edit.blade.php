
@extends('layouts.welcome')

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">

    <h2 class="text-xl font-bold mb-4">
        Edit Teacher Subject Allocation
    </h2>

    <form action="{{ route('teacher_subject_allocation.update', $allocate->id) }}"
          method="POST" class="space-y-4">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Teacher -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Teacher
                </label>

                <select name="teacher_id"
                        class="w-full border rounded-lg px-3 py-2">

                    <option value="">Select Teacher</option>

                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}"
                            {{ old('teacher_id', $teacher_subject_allocation->teacher_id) == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->name }}
                        </option>
                    @endforeach

                </select>

                @error('teacher_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subject -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Subject
                </label>

                <select name="subject_id"
                        class="w-full border rounded-lg px-3 py-2">

                    <option value="">Select Subject</option>

                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}"
                            {{ old('subject_id', $teacher_subject_allocation->subject_id) == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach

                </select>

                @error('subject_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Semester -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Semester
                </label>

                <select name="semester_id"
                        class="w-full border rounded-lg px-3 py-2">

                    <option value="">Select Semester</option>

                    @foreach($semesters as $semester)
                        <option value="{{ $semester->id }}"
                            {{ old('semester_id', $teacher_subject_allocation->semester_id) == $semester->id ? 'selected' : '' }}>
                            {{ $semester->semester_number }}
                        </option>
                    @endforeach

                </select>

                @error('semester_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Section -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Section
                </label>

                <input type="text"
                       name="section"
                       value="{{ old('section', $teacher_subject_allocation->section) }}"
                       placeholder="Group A"
                       class="w-full border rounded-lg px-3 py-2">

                @error('section')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Session -->
            <div>
                <label class="block text-sm font-medium mb-1">
                    Session
                </label>

                <input type="text"
                       name="session"
                       value="{{ old('session', $teacher_subject_allocation->session) }}"
                       placeholder="Fall 2026"
                       class="w-full border rounded-lg px-3 py-2">

                @error('session')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <!-- Buttons -->
        <div class="flex justify-end space-x-2 pt-4">

            <a href="{{ route('teacher_subject_allocation.index') }}"
               class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
                Cancel
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
                Update Allocation
            </button>

        </div>

    </form>

</div>

@endsection
