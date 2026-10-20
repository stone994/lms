@extends('layout.welcome') 

@section('content')
<div class="container-fluid pt-4">
   <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Teacher Management</h2>
        <a href="{{ route('teachers.create') }}" class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors">
            <i class="fas fa-plus mr-2"></i> Add New Teacher
        </a></div>

    @if(session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

<div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
    <div class="p-0">
        <table class="w-full border-collapse border border-gray-200 mb-0">
            <thead class="bg-gray-800 text-white">
                <tr class="bg-gray-50 border-b text-xs font-semibold uppercase text-gray-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Phone No</th>
                    <th class="p-3">department</th>
                    <th class="p-3">Education</th>
                    <th class="py-3 px-2">Subjects</th>
                    <th class="p-3">Edit</th>
                    <th class="p-3">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @foreach($teachers as $teacher)
                <tr>
                    <td class="p-3 font-semibold">{{ $teacher->id }}</td>
                    <td class="p-3 font-mono text-blue-600">{{ $teacher->name }}</td>
                    <td class="p-3 font-semibold">{{ $teacher->email }}</td>
                    <td class="p-3 font-semibold">{{ $teacher->phone }}</td>
                    <td class="p-3 font-semibold">{{ $teacher->department }}</td>
                    <td class="p-3 font-semibold">{{ $teacher->education }}</td>
                    <td class="py-3 px-2">
                        @forelse($teacher->subjects as $subject)
                            <span class="inline-block bg-blue-50 text-blue-700 text-xs font-semibold px-2 py-1 rounded border border-blue-200 mr-1 mb-1">
                                {{ $subject->name }} ({{ $subject->course }})
                            </span>
                        @empty
                            <span class="text-xs text-gray-400">No subjects linked</span>
                        @endforelse
                    </td>
                    <td><a href="{{ route('teachers.edit',$teacher->id) }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">Edit</a></td> 
                  <td class="p-3">
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
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
    </div> </div>
</div>
@endsection