@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add New Program</h2>
    <form action="{{ route('programs.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Name</label>
                <input type="text" name="name" required placeholder="e.g. BS Computer Science" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Code</label>
                <input type="text" name="program_code" required placeholder="e.g. BSCS" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Duration (Years)</label>
                <input type="number" name="duration" value="4" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('programs.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">Update Student</button>
            </div>
            </form>
</div>
@endsection