@extends('layouts.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add Faculty Member</h2>
        <form action="{{ route('students.update',$student->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700">lms Account</label>
                <input type="text" name="lms_account" value="{{ old('lms_account', $student->lms_account) }}" placeholder="bc2304000088" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="name" value="{{ old('name', $student->name) }}" placeholder=" Kamran Ahmed" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" required placeholder="kamran@university.edu" class="w-full border p-2 rounded-lg mt-1">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Cnic</label>
                <input type="text" name="cnic" value="{{ old('cnic', $student->cnic) }}" required placeholder="+92" class="w-full border p-2 rounded-lg mt-1">
            </div>
             <div>
            <label class="block text-sm font-medium mb-2">
                Current Image
            </label>

            @if($student->path)
                <img src="{{ asset('storage/' . $student->path) }}"
                     alt="Student Image"
                     class="w-24 h-24 object-cover rounded-full border mb-3">
            @else
                <p class="text-gray-500 mb-3">No image uploaded</p>
            @endif

            <label class="block text-sm font-medium">
                Choose New Image (Optional)
            </label>

            <input type="file"
               name="image"
               accept="image/jpeg,image/png,image/webp"
               class="block w-full text-sm text-gray-600
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-lg file:border-0
                      file:bg-blue-100 file:text-blue-700
                      file:font-semibold
                      hover:file:bg-blue-200">

        <p class="text-xs text-gray-500 mt-3">
            Please select a JPG, PNG or WEBP image.
        </p>

            @error('image')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>
            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Update Student</button>
            </div>
        </form>
</div>
@endsection