<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-50 via-white to-cyan-50">
            {{-- Decorative background --}}
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute -top-40 -right-32 w-80 h-80 rounded-full bg-gradient-to-br from-blue-400/20 to-indigo-600/20 blur-3xl"></div>
                <div class="absolute -bottom-40 -left-32 w-80 h-80 rounded-full bg-gradient-to-br from-purple-400/20 to-pink-600/20 blur-3xl"></div>
            </div>

            <div class="relative z-10">
                <a href="/" class="block mb-8">
                    <x-application-logo class="w-16 h-16 fill-current text-indigo-600 mx-auto" />
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md px-6 py-8 bg-white/80 backdrop-blur-xl shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>