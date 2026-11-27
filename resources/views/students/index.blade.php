@extends('layouts.welcome')

@section('content')

<link rel="stylesheet"
    href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

{!! html()->div()->class('container-fluid pt-4')->open() !!}

    {{-- Heading and Add Button --}}
    {!! html()->div()->class('flex justify-between items-center mb-3 ml-3')->open() !!}

        {!! html()->element('h2', 'Student Management')
            ->class('text-2xl font-bold') !!}

        {!! html()->a(
            route('students.create'),
            '<i class="fas fa-plus mr-2"></i> Add New Student'
        )->class('inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors')->attribute('style', 'text-decoration:none;') !!}

    {!! html()->div()->close() !!}

    {{-- Success Message --}}
    @if(session('success'))
        {!! html()->div()
            ->class('alert alert-success mb-4')
            ->open() !!}

            {{ session('success') }}

        {!! html()->div()->close() !!}
    @endif

    {{-- Table Container --}}
    {!! html()->div()
        ->class('bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden')
        ->open() !!}

        {!! html()->div()->class('p-3')->open() !!}

            <table id="studentsTable"
                class="w-full border-collapse border border-gray-200 mb-0">

                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th>ID</th>
                        <th>LMS Account</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>CNIC</th>
                        <th>Upload Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        <th>Print PDF</th>
                    </tr>
                </thead>

            </table>

        {!! html()->div()->close() !!}

    {!! html()->div()->close() !!}

{!! html()->div()->close() !!}

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

<script>

$(document).ready(function () {

    $('#studentsTable').DataTable({

        processing: true,
        serverSide: true,

        ajax: "{{ route('students.data') }}",

        columns: [

            { data: 'id', name: 'id' },

            { data: 'lms_account', name: 'lms_account' },

            { data: 'name', name: 'name' },

            { data: 'email', name: 'email' },

            { data: 'cnic', name: 'cnic' },

            {
                data: 'image',
                name: 'path',

                render: function(data) {
                    return data
                        ? `<img src="${data}" class="w-16 h-16 rounded-full object-cover">`
                        : 'No image';
                },

                orderable: false,
                searchable: false
            },

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
            },

            {
                data: 'print',
                name: 'print',

                render: function(data) {
                    return `<a href="${data}" target="_blank" class="bg-green-600 text-white px-3 py-2 rounded-lg">Print PDF</a>`;
                },

                orderable: false,
                searchable: false
            }

        ]

    });

});

</script>

@endsection