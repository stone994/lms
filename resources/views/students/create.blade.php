@extends('layouts.welcome') 

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add Student</h2>
    
    <form action="{{ route('students.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Lms Account</label>
            <input type="text" name="lms_account" required placeholder="bc230400004" value="{{ old('lms_account') }}" class="w-full border p-2 rounded-lg mt-1">
            @error('lms_account') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Full Name</label>
            <input type="text" name="name" required placeholder="Kamran Ahmed" value="{{ old('name') }}" class="w-full border p-2 rounded-lg mt-1">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email" required placeholder="kamran@university.edu" value="{{ old('email') }}" class="w-full border p-2 rounded-lg mt-1">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Cnic</label>
            <input type="text" name="cnic" required placeholder="3333333333" value="{{ old('cnic') }}" class="w-full border p-2 rounded-lg mt-1">
            @error('cnic') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-5">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Student Image
            </label>

            <div class="border border-gray-300 rounded-xl p-4 bg-gray-50">
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
            </div>

            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-2 pt-2">
            <a href="{{ route('students.index') }}" class="px-4 py-2 bg-gray-200 rounded-lg text-sm">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Save Student</button>
        </div>
    </form>
</div>
@endsection