@extends('layouts.welcome') 

@section('content')
<div class="container-fluid pt-4">
   <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Program Management</h2>
        <a href="{{ route('programs.create') }}" class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm transition-colors">
            <i class="fas fa-plus mr-2"></i> Add New Program
        </a></div>

    
    

    @if(session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

 
      

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script>

    $(document).ready(function () {

        $('#programsTable').DataTable({

            processing: true,

            serverSide: true,

            ajax: "{{ route('programs.data') }}",

            columns: [

                {
                    data: 'id',
                    name: 'id'
                },

                {
                    data: 'program_name',
                    name: 'program_name'
                },

                {
                    data: 'program_code',
                    name: 'program_code'
                },

                {
                    data: 'duration',
                    name: 'duration'
                },

                {
                    data: 'cnic',
                    name: 'cnic'
                },


                {
                    data: 'edit',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'delete',
                    orderable: false,
                    searchable: false
                },

                

            ]

        });

    });

</script>
@endsection