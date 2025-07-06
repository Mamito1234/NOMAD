<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Dark mode script --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const html = document.documentElement;
                const theme = localStorage.getItem("theme");

                if (theme === "dark") {
                    html.classList.add("dark");
                } else {
                    html.classList.remove("dark");
                }
            });

            function toggleDarkMode() {
                const html = document.documentElement;
                const isDark = html.classList.toggle("dark");
                localStorage.setItem("theme", isDark ? "dark" : "light");
            }
        </script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                        {{ $header }}

                        {{-- Theme Toggle Button
                        <button onclick="toggleDarkMode()" class="ml-4 p-2 rounded-full bg-gray-200 dark:bg-gray-700 text-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition" id="theme-toggle">
    🌙
</button>

<script>
    function updateThemeIcon() {
        const html = document.documentElement;
        const button = document.getElementById('theme-toggle');
        if (html.classList.contains('dark')) {
            button.innerHTML = '🌞';
        } else {
            button.innerHTML = '🌙';
        }
    }

    function toggleDarkMode() {
        const html = document.documentElement;
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        localStorage.setItem("theme", isDark ? "dark" : "light");
        updateThemeIcon();
    }

    document.addEventListener("DOMContentLoaded", () => {
        const html = document.documentElement;
        const storedTheme = localStorage.getItem("theme");

        if (storedTheme === "dark") {
            html.classList.add("dark");
        } else {
            html.classList.remove("dark");
        }

        updateThemeIcon();
    });
</script> --}}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
