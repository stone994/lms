@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Edit Program</h2>
    <form action="{{ route('programs.update', $program->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Name</label>
                <input type="text" name="name" value="{{ old('name', $program->name) }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Program Code</label>
                <input type="text" name="program_code" value="{{ old('program_code', $program->program_code) }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Duration (Years)</label>
                <input type="number" name="duration" value="{{ old('duration', $program->duration) }}" required class="w-full border p-2 rounded-lg mt-1">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Subjects</label>
                <div class="grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto">
                    @foreach($subjects as $subject)
                        <label class="flex items-center space-x-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" name="subject_ids[]" value="{{ $subject->id }}" 
                                class="rounded text-blue-600"
                                {{ in_array($subject->id, old('subject_ids', $program->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <span>{{ $subject->name }} ({{ $subject->course }})</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('programs.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">Update Program</button>
            </div>
    </form>
</div>
@endsection