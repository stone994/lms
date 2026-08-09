@extends('layout.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add Subject</h2>
        <form action="{{ route('subject.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" required placeholder="intro to cs" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Course Code</label>
                <input type="text" name="code" required placeholder="cs202" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Credit Hour</label>
                <input type="text" name="credit_hour" required placeholder="3" class="w-full border p-2 rounded-lg mt-1">
            </div>
            
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('subject.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Save Subject</button>
            </div>
        </form>
</div>
@endsection