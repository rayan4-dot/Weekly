{{-- resources/views/layouts/app.blade.php --}}
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
    <body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <div class="min-h-screen">
            @include('layouts.navigation')

            {{-- Enhanced Success Message --}}
            @if(session('success'))
                <div class="fixed top-4 right-4 z-50 max-w-md">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 text-white px-6 py-4 rounded-xl shadow-lg border border-emerald-200 backdrop-blur-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="font-medium">{{ session('success') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Enhanced Error Messages --}}
            @if($errors->any())
                <div class="fixed top-4 right-4 z-50 max-w-md">
                    <div class="bg-gradient-to-r from-red-500 to-rose-600 text-white px-6 py-4 rounded-xl shadow-lg border border-red-200 backdrop-blur-sm">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div>
                                @if($errors->count() == 1)
                                    <span class="font-medium">{{ $errors->first() }}</span>
                                @else
                                    <ul class="space-y-1">
                                        @foreach($errors->all() as $error)
                                            <li class="text-sm">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Page Heading --}}
            @isset($header)
                <header class="bg-white/70 backdrop-blur-md shadow-sm border-b border-gray-200/50">
                    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            {{-- Page Content --}}
            <main class="pb-12">
                @yield('content')
            </main>
        </div>
    </body>
</html>