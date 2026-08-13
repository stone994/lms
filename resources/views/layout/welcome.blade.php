<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="flex min-h-screen">
                <aside class="w-64 bg-[#1e2438] text-gray-300 flex flex-col shrink-0">
                     <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
                <a href="#" class="flex items-center space-x-3 px-4 py-2.5 rounded-md bg-[#2b344d] text-white transition">
                   
                    <span>Home</span>
                </a>
                <a href="{{ route('programs.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-md hover:bg-[#252d41] hover:text-white transition">
                    
                    <span>Program</span>
                </a>
                <a href="{{ route('subjects.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-md hover:bg-[#252d41] hover:text-white transition">
                  
                    <span>Subject</span>
                </a>
                <a href="{{ route('teachers.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-md hover:bg-[#252d41] hover:text-white transition">
                    <div class="flex items-center space-x-3">
                       
                        <span>Teacher</span>
                    </div>
                   
                </a>
                <a href="{{ route('students.index') }}" class="flex items-center space-x-3 px-4 py-2.5 rounded-md hover:bg-[#252d41] hover:text-white transition">
                    
                    <span>Student</span>
                </a>
                
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="bg-[#1e73be] text-white h-16 flex items-center justify-between px-6 shadow-md shrink-0">
                <div class="flex items-center space-x-3">
                    <div class="bg-white p-1 rounded shadow-sm flex items-center justify-center">
                        <span class="text-[#1e73be] font-black text-xl px-1">LMS</span>
                    </div>
                    <h1 class="text-xl font-semibold tracking-wide hidden sm:block">Learning Management System</h1>
                </div>
                
            </header>
            @yield('content')

           
        </div>
    </div>

</body>
</html>