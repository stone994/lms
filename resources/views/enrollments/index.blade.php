
@extends('layouts.welcome')

@section('content')

<div class="container-fluid pt-4">

    <div class="flex justify-between items-center mb-3 ml-3">
        <h2 class="text-2xl font-bold">Enrollment</h2>

        <a href="{{ route('enrollments.create') }}"
           class="inline-flex items-center px-4 py-2 mr-3 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm rounded-md shadow-sm">
            <i class="fas fa-plus mr-2"></i> New Enroll
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">

        <div class="p-0">

            <table class="w-full border-collapse border border-gray-200 mb-0">

                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Program</th>
                        <th class="p-3">Student</th>
                        <th class="p-3">Semester</th>
                        <th class="p-3">Subjects</th>
                        <th class="p-3">Session</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Edit</th>
                        <th class="p-3">Delete</th>
                    </tr>
                </thead>

                <tbody class="divide-y text-sm">

                    @forelse($enrollments as $enrollment)

                        <tr>

                            {{-- ID --}}
                            <td class="p-3 font-mono text-blue-600">
                                {{ $enrollment->id }}
                            </td>

                            {{-- Program --}}
                            <td class="p-3">
                                {{ $enrollment->program->name ?? 'N/A' }}
                            </td>

                            {{-- Student --}}
                            <td class="p-3">
                                {{ $enrollment->student->name ?? 'N/A' }}
                            </td>

                            {{-- Semester --}}
                            <td class="p-3">
                                {{ $enrollment->semester->semester_number ?? 'N/A' }}
                            </td>

                            {{-- Subjects --}}
                            <td class="py-3 px-2">

                                @forelse($enrollment->subjects as $subject)

                                    <span class="inline-block bg-blue-50 text-blue-700 text-xs font-semibold px-2 py-1 rounded border border-blue-200 mr-1 mb-1">
                                        {{ $subject->name }}
                                    </span>

                                @empty

                                    <span class="text-xs text-gray-400">
                                        No subjects linked
                                    </span>

                                @endforelse

                            </td>

                            {{-- Session --}}
                            <td class="p-3">
                                {{ $enrollment->session }}
                            </td>

                            {{-- Status --}}
                            <td class="p-3">
                                {{ $enrollment->status }}
                            </td>

                            {{-- Edit --}}
                            <td class="p-3">
                                <a href="{{ route('enrollments.edit', $enrollment->id) }}"
                                   class="bg-slate-600 hover:bg-slate-700 text-white font-medium px-3 py-2 rounded-lg inline-block">
                                    Edit
                                </a>
                            </td>

                            {{-- Delete --}}
                            <td class="p-3">

                                <form action="{{ route('enrollments.destroy', $enrollment->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this enrollment?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-medium px-3 py-2 rounded-lg">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center p-5 text-gray-500">
                                No enrollments found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
