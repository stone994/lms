@extends('layout.welcome') 

@section('content')
<main class="flex-1 p-6 overflow-y-auto space-y-6">
    <div class="mb-3">
        <a href="{{ route('subjects.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
            Add New Subject
        </a>
    </div>

    {{-- Fixed flash message key from 'status' to 'success' --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-2">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-sm w-full">
            <h2 class="text-xl font-bold mb-4">Subject List</h2>
            <table class="w-full text-left border-collapse">
                <thead>
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
</main>
@endsection