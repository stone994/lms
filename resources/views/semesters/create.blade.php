@extends('layout.welcome') 

@section('content')

<div class="container mx-auto px-4 pt-6">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <!-- Card Container -->
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <div class="bg-indigo-600 px-6 py-4">
                    <h3 class="text-lg font-semibold text-white">Add Semester </h3>
                </div>

               <form action="{{ route('semesters.store') }}" method="POST"> 
    @csrf 
    <div class="p-6 space-y-6"> 
       

 <div>
                <label class="block text-sm font-medium text-gray-700">Program Name</label>
                <input type="text" name="program_name" required placeholder="e.g. BS Computer Science" class="w-full border p-2 rounded-lg mt-1">
            </div>


                        <div>
                            <label for="semester_number" class="block text-sm font-medium text-gray-700">Semester Number</label>
                            <select name="semester_number" id="semester_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border px-3 py-2" required>
                                <option value="">-- Choose Semester --</option>
                                @for($i = 1; $i <= 8; $i++)
                                    <option value="{{ $i }}">Semester {{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <hr class="border-t border-gray-200 my-4">

<div>
    <label for="total_subjects"
           class="block text-sm font-medium text-gray-700 mb-2">
        Total Subjects
    </label>

    <input
        type="number"
        name="total_subjects"
        id="total_subjects"
        value="{{ old('total_subjects') }}"
        min="0"
        class="w-full rounded-md border-gray-300 shadow-sm
               focus:border-indigo-500 focus:ring-indigo-500
               text-sm py-2 px-3 border"
        placeholder="Enter total subjects"
        required
    >

    @error('total_subjects')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>
 <div>
                <label class="block text-sm font-medium text-gray-700">Subject Name</label>
                <input type="text" name="subject_name" required placeholder="e.g. Intro To Dev OPS" class="w-full border p-2 rounded-lg mt-1">
            </div>
                        <div>
            <label class="block mb-2 font-medium">Subject Type</label>
            <select name="type" class="w-full border rounded-md p-2" required>
                <option value="Compulsory">Compulsory</option>
                <option value="Optional">Optional</option>
            </select>
        </div>

                        

                    </div>
                    
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-right space-x-3">
                        <a href="{{ route('semesters.index') }}" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save Semester Scheme
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection