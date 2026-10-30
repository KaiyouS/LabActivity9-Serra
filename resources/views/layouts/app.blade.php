<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

<!-- Top Navigation Bar -->
<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">

        <!-- App Brand & Navigation Links -->
        <div class="flex items-center space-x-6">
            <a href="/" class="text-xl font-bold text-blue-600 hover:text-blue-700">
                Bakuna Tracker
            </a>

            @auth
                <div class="hidden sm:flex items-center space-x-4 text-sm font-medium">
                    <a href="/dashboard" class="text-gray-600 hover:text-blue-600 transition">
                        Dashboard
                    </a>
                    <a href="/schedule" class="text-gray-600 hover:text-blue-600 transition">
                        Schedule
                    </a>
                </div>
            @endauth
        </div>

        <!-- Auth Status & Links -->
        <div class="flex items-center space-x-4 text-sm">
            @auth
                <span class="text-gray-600">
                    Hi, <strong class="text-gray-900">{{ auth()->user()->name }}</strong>
                </span>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500 hover:text-red-700 underline cursor-pointer">
                        Logout
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded font-medium transition">
                    Sign in
                </a>
            @endguest
        </div>

    </div>
</nav>

<!-- Page Content Container -->
<main class="max-w-6xl mx-auto px-4 py-6 flex-1 w-full">
    @yield('content')
</main>

<!-- Footer -->
<footer class="mt-auto border-t border-gray-200 bg-white py-6 text-center text-sm text-gray-500">
    <div class="max-w-6xl mx-auto px-4">
        <p>&copy; {{ date('Y') }} Barangay Matina Crossing Health Center &mdash; Davao City. All rights reserved.</p>
        <p class="text-xs text-gray-400 mt-1">Bakuna Tracker &bull; Purok Serra Vaccination Desk</p>
    </div>
</footer>

</body>
</html>
