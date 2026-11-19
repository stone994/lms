@extends('layouts.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Enroll student</h2>
        <form action="{{ route('enrollments.update') }}" method="POST" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label for="program_id" class="block text-sm font-medium text-gray-700 mb-1">Program</label>
        <select name="program_id" id="program_id" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
            <option value="">Select Program</option>
            @foreach ($programs as $program)
                <option value="{{ $program->id }}">{{ $program->name }}</option>
            @endforeach
        </select>
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

    <!--  -->
    <div>
        <label for="semester_id" class="block text-sm font-medium text-gray-700 mb-1">Semester</label>
        <select name="semester_id" id="semester_id" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
            <option value="">Select Semester</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}">{{ $semester->semester_number }}</option>
            @endforeach
        </select>
    </div>

    <!-- Session -->
    <div>
        <label for="session" class="block text-sm font-medium text-gray-700 mb-1">Session</label>
        <input type="text" name="session" id="session" placeholder="Fall 2026" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm placeholder-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
    </div>

    <!-- Status -->
    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
        <select name="status" id="status" class="w-full rounded-lg border-gray-300 border px-3 py-2 text-sm text-gray-700 bg-white shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 focus:outline-none transition">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>
    </div>
</div>

          
            
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('enrollments.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Update Enrollment</button>
            </div>
        </form>
</div>
@endsection