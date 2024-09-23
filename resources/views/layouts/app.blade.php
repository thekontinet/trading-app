<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css'])
    </head>
    <body class="font-sans antialiased hidden"  x-bind:data-theme="$store.darkMode.on ? 'dark' : 'light'">
        <div class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                {{-- <header class="bg-white shadow dark:bg-gray-800">
                    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header> --}}
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <footer class="h-24 lg:hidden">
                <div class="fixed bottom-0 min-h-24 bg-base-200 z-40 inset-x-0">
                    @include('layouts.bottom-nav')
                </div>
            </footer>
        </div>
        @vite(['resources/js/app.js'])
        <x-livechat/>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/robsontenorio/mary@0.44.2/libs/currency/currency.js"></script>
    </body>
</html>
