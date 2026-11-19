@extends('layouts.welcome') 

@section('content')
<div class="container-fluid pt-4">
   <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Enrollement</h2>
        <a href="{{ route('enrollments.create') }}" class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors">
            <i class="fas fa-plus mr-2"></i> New Enroll
        </a></div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

 <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
    <div class="p-0">
        <table class="w-full border-collapse border border-gray-200 mb-0">
            <thead class="bg-gray-800 text-white">
                    <tr class="bg-gray-50 border-b text-xs font-semibold uppercase text-gray-600">
                        <th class="p-3">ID</th>
                        <th class="p-3">Program</th>
                        <th class="p-3">Student</th>
                        <th class="p-3">Semester</th>
                        <th class="p-3">Session</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Edit</th>
                        <th class="p-3">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    @foreach($enrollments as $enrollment)
                    <tr>
                        <td class="p-3 font-mono text-blue-600">{{ $enrollment->id }}</td>
                        <td class="p-3 font-mono text-blue-600">{{ $enrollment->program->name }}</td>
                        <td class="p-3 font-mono text-blue-600">{{ $enrollment->student->name }}</td>
                       <td class="p-3 font-mono text-blue-600">{{ $enrollment->semester->semester_number }}</td>
                      
                       <td class="p-3 font-mono text-blue-600">{{ $enrollment->session }}</td>
                       <td class="p-3 font-mono text-blue-600">{{ $enrollment->status }}</td>
                        
                        <td class="p-3">
                            <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg shadow transition inline-block">
                                Edit
                            </a>
                        </td> 

                        {{-- Delete Form (Requires POST with @method('DELETE')) --}}
                        <td class="p-3">
                            <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this enrollment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">
                                    Delete
                                </button>
                            </form>
                        </td>   
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div> 
    </div>
</div>@endsection