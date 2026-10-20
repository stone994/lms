@extends('layout.welcome') 

@section('content')
<div class="container-fluid pt-4">
   <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Subjects Management</h2>
        <a href="{{ route('subjects.create') }}" class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors">
            <i class="fas fa-plus mr-2"></i> Add New Subjects
        </a></div>

    {{-- Fixed flash message key from 'status' to 'success' --}}
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
                        <th class="p-3">Name</th>
                        <th class="p-3">Course</th>
                        <th class="p-3">Credit Hour</th>
                        <th class="p-3">Edit</th>
                        <th class="p-3">Delete</th>
                    </tr>
                </thead>
                <tbody class="divide-y text-sm">
                    @foreach($subjects as $subject)
                    <tr>
                        <td class="p-3 font-semibold">{{ $subject->id }}</td>
                        <td class="p-3 font-mono text-blue-600">{{ $subject->name }}</td>
                        <td class="p-3 font-semibold">{{ $subject->code }}</td>
                        <td class="p-3 font-semibold">{{ $subject->credit_hour }}</td>
                        
                        {{-- Edit Button --}}
                        <td class="p-3">
                            <a href="{{ route('subjects.edit', $subject->id) }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg shadow transition inline-block">
                                Edit
                            </a>
                        </td> 

                        {{-- Delete Form (Requires POST with @method('DELETE')) --}}
                        <td class="p-3">
                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
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