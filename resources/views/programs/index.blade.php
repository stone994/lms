@extends('layout.welcome') 

@section('content')
<main class="flex-1 p-6 overflow-y-auto space-y-6">
    <div class="mb-3">
        <a href="{{ route('programs.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">Add New Program</a>
        
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-bold mb-4">Program List</h2>
            <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b text-xs font-semibold uppercase text-gray-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Program Code</th>
                    <th class="p-3">Duration</th>
                    <th class="py-3 px-2">Subjects</th>
                    <th class="p-3">Edit</th>
                    <th class="p-3">Delete</th>

                    
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @foreach($programs as $program)
                <tr>
                    <td class="p-3 font-semibold">{{ $program->id }}</td>
                    <td class="p-3 font-mono text-blue-600">{{ $program->name }}</td>
                    <td class="p-3 font-semibold">{{ $program->program_code }}</td>
                    <td class="p-3 font-semibold">{{ $program->duration }}</td> 
                    
                    <td class="py-3 px-2">
                        @forelse($program->subjects as $subject)
                            <span class="inline-block bg-blue-50 text-blue-700 text-xs font-semibold px-2 py-1 rounded border border-blue-200 mr-1 mb-1">
                                {{ $subject->name }} ({{ $subject->course }})
                            </span>
                        @empty
                            <span class="text-xs text-gray-400">No subjects linked</span>
                        @endforelse
                    </td>
                    
                    <td><a href="{{ route('programs.edit',$program->id) }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">Edit</a></td> 
                   <td class="p-3">
                            <form action="{{ route('programs.destroy', $program->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subject?');">
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
</main>
@endsection