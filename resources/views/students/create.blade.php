@extends('layouts.welcome')

@section('content')

{!! html()->div()
    ->class('w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm')
    ->open() !!}

    {!! html()->element('h2', 'Add Student')
        ->class('text-xl font-bold mb-4') !!}

    {{-- Student Form --}}
    {!! html()->form('POST', route('students.store'))
        ->attribute('enctype', 'multipart/form-data')
        ->class('space-y-4')
        ->open() !!}


        {{-- Validation Errors --}}
        @if ($errors->any())

            {!! html()->div()
                ->class('bg-red-100 text-red-700 p-4 rounded-lg mb-4')
                ->open() !!}

                {!! html()->element('h3', 'Please fix these errors:')
                    ->class('font-bold') !!}

                <ul class="list-disc ml-5">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            {!! html()->div()->close() !!}

        @endif


        {{-- LMS Account --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Lms Account', 'lms_account')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('lms_account', old('lms_account'))
                ->required()
                ->placeholder('bc230400004')
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('lms_account')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm mt-1') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Full Name --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Full Name', 'name')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('name', old('name'))
                ->required()
                ->placeholder('Kamran Ahmed')
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('name')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm mt-1') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Email Address --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Email Address', 'email')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->email('email', old('email'))
                ->required()
                ->placeholder('kamran@university.edu')
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('email')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm mt-1') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- CNIC --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Cnic', 'cnic')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('cnic', old('cnic'))
                ->id('cnic')
                ->required()
                ->attribute('maxlength', 13)
                ->attribute('minlength', 13)
                ->placeholder('3520212345671')
                ->class('w-full border p-2 rounded-lg mt-1') !!}

            @error('cnic')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm mt-1') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Student Image --}}
        {!! html()->div()->class('mb-5')->open() !!}

            {!! html()->label('Student Image', 'image')
                ->class('block text-sm font-semibold text-gray-700 mb-2') !!}

            {!! html()->div()
                ->class('border border-gray-300 rounded-xl p-4 bg-gray-50')
                ->open() !!}

                {!! html()->input('file', 'image')
                    ->id('image')
                    ->accept('image/jpeg,image/png,image/webp')
                    ->class('block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-100 file:text-blue-700 file:font-semibold hover:file:bg-blue-200') !!}

                {!! html()->element('p', 'Please select a JPG, PNG or WEBP image.')
                    ->class('text-xs text-gray-500 mt-3') !!}

            {!! html()->div()->close() !!}

            @error('image')
                {!! html()->element('p', $message)
                    ->class('text-red-500 text-sm mt-1') !!}
            @enderror

        {!! html()->div()->close() !!}


        {{-- Buttons --}}
        {!! html()->div()
            ->class('flex justify-end space-x-2 pt-2')
            ->open() !!}

            {!! html()->a(route('students.index'), 'Cancel')
                ->class('px-4 py-2 bg-gray-200 rounded-lg text-sm') !!}

            {!! html()->submit('Save Student')
                ->class('px-4 py-2 bg-green-600 text-white rounded-lg text-sm') !!}

        {!! html()->div()->close() !!}


    {!! html()->form()->close() !!}

{!! html()->div()->close() !!}

@endsection