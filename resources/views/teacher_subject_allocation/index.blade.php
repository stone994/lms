
@extends('layouts.welcome')

@section('content')
<link rel="stylesheet"
    href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
<div class="container-fluid pt-4">

    <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Teacher Subject Allocation</h2>

        <a href="{{ route('teacher_subject_allocation.create') }}"
           class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm">
            <i class="fas fa-plus mr-2"></i> Add Allocation
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">

        <div class="p-0">

            <table id="allocationTable" class="w-full border-collapse border border-gray-200 mb-0">

                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th>ID</th>
                        <th>Teacher</th>
                        <th>Subject</th>
                        <th>Semester</th>
                        <th>Section</th>
                        <th>Session</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
<tbody></tbody>
                
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js">
</script>

<script>
     $(document).ready(function(){
        $('#allocationTable').DataTable({
            processing: true,
        serverSide: true,
        ajax: "{{ route('teacher_subject_allocation.data') }}",
     columns: [
    {data: 'id', name: 'id'},
    {data: 'teacher', name: 'teacher', orderable: false},
    {data: 'subject', name: 'subject', orderable: false},
    {data: 'semester', name: 'semester', orderable: false},
    {data: 'section', name: 'section'},
    {data: 'session', name: 'session'},
    

    {
        data: 'edit',
        name: 'edit',
        render: function(data) {
            return `<a href="${data}" class="bg-slate-600 text-white px-3 py-2 rounded-lg">Edit</a>`;
        },
        orderable: false,
        searchable: false
    },

    {
        data: 'delete',
        name: 'delete',
        render: function(data) {
            return `
                <form action="${data}" method="POST"
                    onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-3 py-2 rounded-lg">
                        Delete
                    </button>
                </form>
            `;
        },
        orderable: false,
        searchable: false
    }
]
        });
    });
</script>
@endsection