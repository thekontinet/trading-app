<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-bind:data-theme="$store.darkMode.on ? '{{env('APP_THEME') ? 'mythemedark' : 'dark'}}' : '{{env('APP_THEME') ? 'mythemelight' : 'light'}}'">
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
    </head>
    <body class="font-sans antialiased bg-base-100">
        <div class="flex flex-col items-center min-h-screen pt-6  sm:justify-center sm:pt-0">
            <div class="py-4">
                <a href="/">
                    <x-application-logo class="font-bold text-lg py-2 px-4 bg-purple-900 text-slate-300 rounded-md" />
                </a>
            </div>

            <div class="w-full px-6 py-4 mt-6 overflow-hidden shadow-md sm:max-w-md sm:rounded-lg border border-base-300">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
