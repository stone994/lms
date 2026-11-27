@extends('layouts.welcome')

@section('content')

{!! html()->div()
    ->class('w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm')
    ->open() !!}

    {!! html()->element('h2', 'Add Faculty Member')
        ->class('text-xl font-bold mb-4') !!}

    {!! html()->form('PUT', route('students.update', $student->id))
        ->attribute('enctype', 'multipart/form-data')
        ->class('space-y-4')
        ->open() !!}

        {{-- LMS Account --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Lms Account', 'lms_account')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('lms_account', old('lms_account', $student->lms_account))
                ->placeholder('bc2304000088')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Full Name --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Full Name', 'name')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('name', old('name', $student->name))
                ->placeholder('Kamran Ahmed')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Email Address --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Email Address', 'email')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->email('email', old('email', $student->email))
                ->required()
                ->placeholder('kamran@university.edu')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- CNIC --}}
        {!! html()->div()->open() !!}
            {!! html()->label('Cnic', 'cnic')
                ->class('block text-sm font-medium text-gray-700') !!}

            {!! html()->text('cnic', old('cnic', $student->cnic))
                ->required()
                ->placeholder('+92')
                ->class('w-full border p-2 rounded-lg mt-1') !!}
        {!! html()->div()->close() !!}

        {{-- Current and New Image --}}
        {!! html()->div()->open() !!}

            {!! html()->label('Current Image', 'current_image')
                ->class('block text-sm font-medium mb-2') !!}

            @if($student->path)
                <img src="{{ asset('storage/' . $student->path) }}"
                     alt="Student Image"
                     class="w-24 h-24 object-cover rounded-full border mb-3">
            @else
                {!! html()->element('p', 'No image uploaded')
                    ->class('text-gray-500 mb-3') !!}
            @endif

            {!! html()->label('Choose New Image (Optional)', 'image')
                ->class('block text-sm font-medium') !!}

            {!! html()->input('file', 'image')
                ->accept('image/jpeg,image/png,image/webp')
                ->class('block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-100 file:text-blue-700 file:font-semibold hover:file:bg-blue-200') !!}

            {!! html()->element('p', 'Please select a JPG, PNG or WEBP image.')
                ->class('text-xs text-gray-500 mt-3') !!}

            @error('image')
                {!! html()->element('p', $message)
                    ->class('text-red-500') !!}
            @enderror

        {!! html()->div()->close() !!}

        {{-- Buttons --}}
        {!! html()->div()
            ->class('flex justify-end space-x-2 pt-2')
            ->open() !!}

            {!! html()->a(route('students.index'), 'Cancel')
                ->class('px-4 py-2 bg-gray-200 rounded-lg text-sm') !!}

            {!! html()->submit('Update Student')
                ->class('px-4 py-2 bg-green-600 text-white rounded-lg text-sm') !!}

        {!! html()->div()->close() !!}

    {!! html()->form()->close() !!}

{!! html()->div()->close() !!}

@endsection