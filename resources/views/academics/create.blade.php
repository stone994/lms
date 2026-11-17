@extends('layouts.welcome')
@section('content')
<div class="w-full max-w-7xl mx-auto bg-white p-6 rounded-xl shadow-sm">
    <h2 class="text-xl font-bold mb-4">Add New Academics</h2>
    <form action="{{ route('academics.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="mb-4">

            <label class="block mb-2">
                Session Name
            </label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="2026 Spring"
                class="w-full border rounded p-2"
            >

        </div>
             <div class="mb-4">

            <label class="block mb-2">
                Start Date
            </label>

            <input
                type="date"
                name="start_date"
                value="{{ old('start_date') }}"
                class="w-full border rounded p-2"
            >

        </div>
 <div class="mb-4">

            <label class="block mb-2">
                End Date
            </label>

            <input
                type="date"
                name="end_date"
                value="{{ old('end_date') }}"
                class="w-full border rounded p-2"
            >

        </div>

         <div class="mb-4">

            <label class="block mb-2">
                Status
            </label>

            <select
                name="status"
                class="w-full border rounded p-2"
            >

                <option value="upcoming">
                    Upcoming
                </option>

                <option value="active">
                    Active
                </option>

                <option value="completed">
                    Completed
                </option>

            </select>
    <button
            type="submit"
            class="bg-blue-600 text-white px-5 py-2 rounded"
        >
            Save Session
        </button>

    </form>
        </div>
@endsection