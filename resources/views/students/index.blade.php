@extends('layout.welcome') 

@section('content')
<main class="flex-1 p-6 overflow-y-auto space-y-6">
    <div class="mb-3">
        <a href="{{ route('students.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">Add New student</a>
       
    </div>

    @if(session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-bold mb-4">Student List</h2>
            <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b text-xs font-semibold uppercase text-gray-600">
                    <th class="p-3">ID</th>
                    <th class="p-3">Lms Account</th>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Cnic</th>
                    <th class="p-3">Edit</th>
                    <th class="p-3">Delete</th>
                </tr>
            </thead>
            <tbody class="divide-y text-sm">
                @foreach($students as $student)
                <tr>
                    <td class="p-3 font-semibold">{{ $student->id }}</td>
                    <td class="p-3 font-mono text-blue-600">{{ $student->lms_account }}</td>
                    <td class="p-3 font-semibold">{{ $student->name }}</td>
                    <td class="p-3 font-semibold">{{ $student->email }}</td>
                    <td class="p-3 font-semibold">{{ $student->cnic }}</td>
                    <td><a href="{{ route('students.edit',$student->id) }}" class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">Edit</a></td> 
                    <td><a href="{{ route('students.destroy',$student->id) }}" class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-2 rounded-lg shadow transition">Delete</a></td>   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> </div>
</main>
@endsection