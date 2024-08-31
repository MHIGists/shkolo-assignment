<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div
    class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div class="p-4 rounded-md shadow-lg max-w-xl mx-auto text-gray-600 ">
        <p class="text-xl font-semibold mb-2">
            This is my own interpretation of the given task. I hope I haven't deviated too much.
        </p>
        <p class="mb-2">
            I kept the default login system & profile settings as well as most of the style.
        </p>
        <p class="mb-2">
            Button settings are per-user per-button. There is a "Button Settings" tab that is used to display the current configuration
            of buttons as well as Update, Reset(update), Delete, Create them. All CRUD operations are implemented.
        </p>
        <p>
            The backend is using Laravel Breeze on a Mariadb server using TailwindCSS. Everything is hosted on my home
            server(Ubuntu with Apache2). There is little custom JS and CSS, however if needed I'll re-do everything to use
            as little frameworks as possible.
        </p>
    </div>
</div>
</body>
</html>
