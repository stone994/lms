@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add Faculty Member</h2>
        <form action="{{ route('teachers.update',$teacher->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $teacher->name) }}" placeholder="Dr. Kamran Ahmed" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $teacher->email) }}" required placeholder="kamran@university.edu" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">phone</label>
                <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}" required placeholder="+92" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Department</label>
                <input type="text" name="department" value="{{ old('department', $teacher->department) }}" required placeholder="Computer Science" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Education</label>
                <input type="text" name="education" value="{{ old('education', $teacher->education) }}" required placeholder="MSCS" class="w-full border p-2 rounded-lg mt-1">
            </div>
             <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Select Subjects</label>
                <div class="grid grid-cols-2 gap-2 border p-3 rounded-lg max-h-48 overflow-y-auto">
                    @foreach($subjects as $subject)
                        <label class="flex items-center space-x-2 text-sm text-gray-700 cursor-pointer">
                            <input type="checkbox" name="subject_ids[]" value="{{ $subject->id }}" 
                                class="rounded text-blue-600"
                                {{ in_array($subject->id, old('subject_ids', $teacher->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <span>{{ $subject->name }} ({{ $subject->course }})</span>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('teachers.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Save Teacher</button>
            </div>
        </form>
</div>
@endsection