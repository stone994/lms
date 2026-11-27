@extends('layouts.welcome')

@section('content')

<link rel="stylesheet"
    href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">

{{-- Main Container --}}
{!! html()->div()->class('container-fluid pt-4')->open() !!}

    {{-- Heading and Add Button --}}
    {!! html()->div()->class('flex justify-between items-center mb-3 ml-3')->open() !!}

        {!! html()->element('h2', 'Semester Management')
            ->class('text-2xl font-bold') !!}

        {!! html()->a(
            route('semesters.create'),
            html()->i()->class('fas fa-plus mr-2')->toHtml() . ' Add New Semester'
        )
            ->class('inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors') !!}

    {!! html()->div()->close() !!}


    {{-- Success Message --}}
    @if(session('success'))

        {!! html()->div(session('success'))
            ->class('bg-green-100 text-green-800 p-3 rounded mb-4') !!}

    @endif


    {{-- Table Card --}}
    {!! html()->div()
        ->class('bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden')
        ->open() !!}

        {!! html()->div()->class('p-0')->open() !!}

            <table id="semesterTable"
                class="w-full border-collapse border border-gray-200 mb-0">

                <thead class="bg-gray-800 text-white">

                    <tr>
                        <th>ID</th>
                        <th>Program Name</th>
                        <th>Semester</th>
                        <th>Total Subjects</th>
                        <th>Subjects</th>
                        <th>Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>

                </thead>

            </table>

        {!! html()->div()->close() !!}

    {!! html()->div()->close() !!}

{!! html()->div()->close() !!}


{{-- JavaScript --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>

<script>

    $(document).ready(function(){

        $('#semesterTable').DataTable({

            processing: true,
            serverSide: true,

            ajax: "{{ route('semesters.data') }}",

            columns: [

                { data: 'id', name: 'id' },

                { data: 'program_name', name: 'program_name' },

                { data: 'semester_number', name: 'semester_number' },

                { data: 'total_subjects', name: 'total_subjects' },

                {
                    data: 'subjects',
                    name: 'subjects',
                    orderable: false,
                    searchable: true
                },

                { data: 'type', name: 'type' },

                {
                    data: 'edit',
                    name: 'edit',

                    render: function(data) {

                        return `<a href="${data}"
                            class="bg-slate-600 text-white px-3 py-2 rounded-lg">
                            Edit
                        </a>`;

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

                                <button type="submit"
                                    class="bg-red-600 text-white px-3 py-2 rounded-lg">
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