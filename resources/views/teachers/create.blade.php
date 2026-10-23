@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add Faculty Member</h2>
        <form action="{{ route('teachers.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" required placeholder="Dr. Kamran Ahmed" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required placeholder="kamran@university.edu" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">phone</label>
                <input type="text" name="phone" required placeholder="+92" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" name="department" required placeholder="Computer Science" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Education</label>
                <input type="text" name="education" required placeholder="MSCS" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div class="grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto">

        @forelse($subjects as $subject)
            <label class="flex items-center space-x-2 text-sm text-gray-700 cursor-pointer">
                <input
                    type="checkbox"
                    name="subject_ids[]"
                    value="{{ $subject->id }}"
                    class="rounded text-blue-600"
                >

                <span>
                    {{ $subject->name }} ({{ $subject->course }})
                </span>
            </label>
        @empty
            <p class="text-red-600 text-sm">
                No subjects found. Please add subjects first.
            </p>
        @endforelse
        </div>
    </div>
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('teachers.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Save Teacher</button>
            </div>
        </form>
</div>
@endsection