
@extends('layouts.welcome')

@section('content')
<link rel="stylesheet"
    href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
{{ html()->div()->class('container-fluid pt-4')->open() }}

   
        {{ html()->div()->class('flex justify-between items-center mb-3 ml-3')->open() }}

        <h2 class="text-2xl font-bold">Enrollment</h2>
{{ html()->a(route('enrollments.create'),'New Enrollment')->class('inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm') }}
        
  {{html()->div()->close()}}

    @if(session('success'))
        {{ html()->div(session('success'))
            ->class('bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4') }}
    @endif

{{ html()->div()->class('bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden') }}

        {{ html()->div()->class('p-0')->open() }}

            <table id="enrollmentTable" class="w-full border-collapse border border-gray-200 mb-0">

                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th>ID</th>
                        <th>Program</th>
                        <th>Student</th>
                        <th>Semester</th>
                        <th>Subjects</th>
                        <th>Session</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                
            </table>
         {{ html()->div()->close() }}

    {{ html()->div()->close() }}

{{ html()->div()->close() }}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js">
</script>

<script>
     $(document).ready(function(){
        $('#enrollmentTable').DataTable({
            processing: true,
        serverSide: true,
        ajax: "{{ route('enrollments.data') }}",
     columns: [
    {data: 'id', name: 'id'},
    {data: 'program', name: 'program', orderable: false,searchable: true},
    {data: 'student', name: 'student', orderable: false,searchable: true},
    {data: 'semester', name: 'semester', orderable: false,searchable: true},
    { data: 'subjects', name: 'subjects', orderable: false,searchable: true },

    {data: 'session', name: 'session'},
    {data: 'status', name: 'status'},

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