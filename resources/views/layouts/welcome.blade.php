
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LMS Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">

    <aside class="w-64 bg-[#1e2438] text-gray-300 flex flex-col shrink-0">

        <div class="p-5 text-center border-b border-gray-700">
            <h2 class="text-2xl font-bold text-white">
                <i class="fas fa-graduation-cap"></i> LMS
            </h2>
            <p class="text-xs text-gray-400 mt-1">
                Learning Management System
            </p>
        </div>
<nav class="flex-1 p-3 space-y-1 overflow-y-auto">

            <a href="{{ route('dashboard') }}"
               class="flex items-center space-x-3 px-4 py-3 rounded-md
               {{ request()->routeIs('dashboard') ? 'bg-[#2b344d] text-white' : 'hover:bg-[#252d41] hover:text-white' }}">
                <i class="fas fa-home w-5"></i>
                <span>Home</span>
            </a>

            @auth

                @if(auth()->user()->role == 'admin')

                    <a href="{{ route('programs.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-graduation-cap w-5"></i>
                        <span>Programs</span>
                    </a>

                    <a href="{{ route('subjects.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-book w-5"></i>
                        <span>Subjects</span>
                    </a>

                    <a href="{{ route('teachers.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-chalkboard-teacher w-5"></i>
                        <span>Teachers</span>
                    </a>

                    <a href="{{ route('students.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-user-graduate w-5"></i>
                        <span>Students</span>
                    </a>

                    <a href="{{ route('semesters.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-calendar-alt w-5"></i>
                        <span>Semester Management</span>
                    </a>

                @endif


                @if(auth()->user()->role == 'teacher')

                    <a href="{{ route('teachers.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-chalkboard-teacher w-5"></i>
                        <span>Teachers</span>
                    </a>

                    <a href="{{ route('subjects.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-book w-5"></i>
                        <span>Subjects</span>
                    </a>

                    <a href="{{ route('students.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-user-graduate w-5"></i>
                        <span>Students</span>
                    </a>

                @endif


                @if(auth()->user()->role == 'student')

                    <a href="{{ route('students.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-user-graduate w-5"></i>
                        <span>Students</span>
                    </a>

                    <a href="{{ route('programs.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-graduation-cap w-5"></i>
                        <span>Programs</span>
                    </a>

                    <a href="{{ route('semesters.index') }}"
                       class="flex items-center space-x-3 px-4 py-3 rounded-md hover:bg-[#252d41] hover:text-white">
                        <i class="fas fa-calendar-alt w-5"></i>
                        <span>Semester Management</span>
                    </a>

                @endif


                

            @endauth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="flex items-center space-x-3 bg-red-600 text-white px-5 py-3 rounded-lg hover:bg-red-700 mt-5 w-full">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
        </nav>

    </aside>


    <div class="flex-1 flex flex-col min-w-0">

        <header class="bg-blue-600 text-white h-16 flex items-center justify-between px-6 shadow-md shrink-0">

            <div class="flex items-center space-x-3">

                <div class="bg-white p-1 rounded shadow-sm">
                    <span class="text-blue-600 font-black text-xl px-1">
                        LMS
                    </span>
                </div>

                <h1 class="text-xl font-semibold tracking-wide hidden sm:block">
                    Learning Management System
                </h1>

            </div>

        </header>


        <div class="bg-white px-6 py-4 shadow-sm">

            <h2 class="text-xl font-semibold text-gray-700">
                Welcome To Dashboard
            </h2>

        </div>


      
        <main class="p-6 flex-1">

            @yield('content')

        </main>

    </div>

</div>

</body>
</html>
