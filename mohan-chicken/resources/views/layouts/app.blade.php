<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mohan Chicken</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('images/mclogo.png') }}" alt="Mohan Chicken Logo" class="h-10 w-10 rounded-full object-cover">
                <span class="text-2xl font-bold text-red-700 tracking-wide">Mohan Chicken</span>
            </div>
            <nav>
                <ul class="flex space-x-6 text-lg">
                    <li><a href="{{ url('/') }}" class="hover:text-red-500 transition">Home</a></li>
                    <li><a href="{{ url('/menu-items') }}" class="hover:text-red-500 transition">Menu</a></li>
                    <li><a href="{{ url('/orders/create') }}" class="hover:text-red-500 transition">Order Online</a></li>
                    <li><a href="{{ url('/reservations/create') }}" class="hover:text-red-500 transition">Book a Table</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-red-500 transition">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-md mt-8">
        <div class="container mx-auto px-4 py-6 flex flex-col md:flex-row justify-between items-center text-gray-600">
            
            <div class="flex space-x-4 mb-2 md:mb-0">
                <a href="{{ url('/about') }}" class="hover:text-red-500">About</a>
                <a href="{{ url('/privacy') }}" class="hover:text-red-500">Privacy</a>
                <a href="{{ url('/contact') }}" class="hover:text-red-500">Contact</a>
            </div>
            <div class="text-sm">&copy; {{ date('Y') }} Mohan Chicken. All rights reserved.</div>
        </div>
    </footer>
</body>
</html>
