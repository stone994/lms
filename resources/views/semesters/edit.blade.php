
@extends('layout.welcome')

@section('content')

<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">

    <h2 class="text-xl font-bold mb-4">Edit Semester Scheme</h2>

    <form action="{{ route('semesters.update', $semester->id) }}"
          method="POST"
          class="space-y-4">

        @csrf
        @method('PUT')

<div>
    <label for="program_name" class="block text-sm font-medium text-gray-700">Program Name</label>
    <input type="text" name="program_name" id="program_name"
           value="{{ old('program_name', $semester->program_name) }}"
           class="w-full border p-2 rounded-lg mt-1" required>

    @error('program_name')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>

        <div>
            <label for="semester_number"
                   class="block text-sm font-medium text-gray-700">
                Semester Number
            </label>

            <select name="semester_number"
                    id="semester_number"
                    required
                    class="w-full border p-2 rounded-lg mt-1">

                <option value="">-- Choose Semester --</option>

                @for($i = 1; $i <= 8; $i++)
                    <option value="{{ $i }}"
                        {{ old('semester_number', $semester->semester_number) == $i ? 'selected' : '' }}>
                        Semester {{ $i }}
                    </option>
                @endfor

            </select>

            @error('semester_number')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="total_subjects"
                   class="block text-sm font-medium text-gray-700">
                Total Subjects
            </label>

            <input type="number"
                   name="total_subjects"
                   id="total_subjects"
                   value="{{ old('total_subjects', $semester->total_subjects) }}"
                   min="0"
                   required
                   class="w-full border p-2 rounded-lg mt-1"
                   placeholder="Enter total subjects">

            @error('total_subjects')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        {{-- Compulsory Subjects --}}
        <div>
            <label class="block text-sm font-medium text-red-600">
                Compulsory Subjects
            </label>

        

            <div id="compulsory-container" class="space-y-2 mt-2">
@foreach($semesters as $semester)
    <label class="flex items-center gap-2">
        <input type="checkbox" name="compulsory_subjects[]" value="{{ $semester }}"
               {{ in_array($semester, old('compulsory_subjects', $semester->compulsory_subjects ?? [])) ? 'checked' : '' }}>
        {{ $subject }}
    </label>
@endforeach

            </div>

        </div>

        <div>
            <label class="block text-sm font-medium text-cyan-600">
                Optional / Elective Subjects
            </label>

         

            <div id="elective-container" class="space-y-2 mt-2">

                @forelse($elective as $subject)
                    <input type="text"
                           name="elective_subjects[]"
                           value="{{ $subject }}"
                           class="w-full border p-2 rounded-lg"
                           placeholder="Enter elective subject">
                @empty
                    <input type="text"
                           name="elective_subjects[]"
                           class="w-full border p-2 rounded-lg"
                           placeholder="Enter elective subject">
                @endforelse

            </div>

           
        </div>

        <div class="flex justify-end space-x-2 pt-2">

            <a href="{{ route('semesters.index') }}"
               class="px-4 py-2 bg-gray-200 rounded-lg text-sm">
                Cancel
            </a>

            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow">
                Update Semester
            </button>

        </div>

    </form>
</div>



@endsection
