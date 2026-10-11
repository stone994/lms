@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
   <h2 class="text-xl font-bold mb-4">Edit Program</h2>
        <form action="{{ route('programs.update', $program->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Name</label>
                <input type="text" name="name" value="{{ $program->name }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Code</label>
                <input type="text" name="program_code" value="{{ $program->program_code }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Duration (Years)</label>
                <input type="number" name="duration" value="{{ $program->duration }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">subjects </label>
                <input type="number" name="subjects" value="{{ $program->subjects }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('programs.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Update Program</button>
            </div>
        </form>
</div>
@endsection