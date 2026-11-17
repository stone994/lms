@extends('layouts.welcome')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

<div class="container-fluid pt-4">
   <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Academic Session</h2>
        <a href="{{ route('academics.create') }}" class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors">
            <i class="fas fa-plus mr-2"></i> Add New Academic
        </a></div>

         @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

 <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
    <div class="p-0">
        <table id="AcademicTable" class="w-full border-collapse border border-gray-200 mb-0">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th>ID</th>
                    <th>Session Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>        
                </tr>
            </thead>
            
        </table>
        </div> 
</div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script>
    $(document).ready(function () {
    $('#AcademicTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('academics.data') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'start_date', name: 'start_date' },
            { data: 'end_date', name: 'end_date' },
            { data: 'status', name: 'status' },

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
                        <form action="${data}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 text-white px-3 py-2 rounded-lg">Delete</button>
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