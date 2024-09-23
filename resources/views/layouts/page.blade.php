@props(['pages'])

@php
    $navigations = [
        'home' => [
            'title' => 'Home',
            'href' => '/'
        ]
    ];

    foreach ($pages as $page) {
        $navigations[$page->slug] = [
            'title' => ucfirst($page->title),
            'href' => route('pages', $page),
        ];
    }
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="mytheme">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-roboto w-screen overflow-x-hidden" x-data="{sidebar: false}">
        <!-- Sidebar -->
        <aside x-show="sidebar" @click.outside="sidebar = false" class="fixed inset-y-0 z-50 flex flex-col w-full max-w-64 h-screen px-5 py-8 overflow-y-auto bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700">
            <x-application-logo/>
        
            <div class="flex flex-col justify-between flex-1 mt-6">
                <nav class="flex-1 -mx-3 space-y-3 ">        
                    @foreach ($navigations as $nav)
                        <a class="flex items-center px-3 py-2 text-gray-600 transition-colors duration-300 transform rounded-lg dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-200 hover:text-gray-700" href="{{ $nav['href'] }}">
                            <svg class="w-4 h-4" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z"></path>
                            </svg>
            
                            <span class="mx-2 text-sm font-medium">{{ $nav['title'] }}</span>
                        </a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <!-- Header -->
        <header class="bg-white border-b border-gray-200">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo and Menu Button -->
                    <div class="flex items-center">
                        <button @click="sidebar = !sidebar" class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600 mr-4">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <x-application-logo/>
                    </div>

                    <!-- Navigation Links -->
                    <nav class="hidden md:flex space-x-8">
                        <a href="/" class="text-gray-600 hover:text-gray-800">Home</a>
                        <a href="{{ route('pages', 'about') }}" class="text-gray-600 hover:text-gray-800">About Us</a>
                        <a href="{{ route('pages', 'contact') }}" class="text-gray-600 hover:text-gray-800">Contact Us</a>
                        <a href="{{ route('pages', 'faq') }}" class="text-gray-600 hover:text-gray-800">Faq</a>
                    </nav>

                    <!-- Right Side Icons -->
                    <div class="flex items-center space-x-4">
                        <!-- Dark Mode Toggle -->
                        {{-- <button class="text-gray-500 hover:text-gray-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                        </button> --}}
                        <!-- Language Selector -->
                        {{-- <div class="relative">
                            <button class="flex items-center text-gray-600 hover:text-gray-800 focus:outline-none">
                                <img src="{{ asset('path/to/us-flag.png') }}" alt="US Flag" class="h-4 w-6 mr-1">
                                <span>EN</span>
                            </button>
                        </div> --}}
                    </div>
                </div>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-4">
            <div class="container mx-auto px-4 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="md:flex items-center gap-4 mb-4 md:mb-0">
                        <x-application-logo/>
                        <div class="text-sm text-gray-600 text-left font-medium">
                            <p>{{ config('mail.from.address') }}</p>
                            <p>&copy; {{ config('app.name') }}. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-24">
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Explore</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li><a href="{{ route('pages', 'faq') }}" class="hover:text-blue-500">FAQ</a></li>
                                <li><a href="{{ route('pages', 'about') }}" class="hover:text-blue-500">About</a></li>
                                <li><a href="{{ route('pages', 'contact') }}" class="hover:text-blue-500">Contact</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Services</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li><a href="{{ route('pages', 'copy-trading') }}" class="hover:text-blue-500">Copy Trading</a></li>
                                <li><a href="{{ route('pages', 'forex-trading') }}" class="hover:text-blue-500">Forex Trading</a></li>
                                <li><a href="{{ route('pages', 'crypto-trading') }}" class="hover:text-blue-500">Crypto Trading</a></li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800 mb-2">Resource</h3>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li><a href="{{ route('pages', 'cookie-policy') }}" class="hover:text-blue-500">Cookie Policy</a></li>
                                <li><a href="{{ route('pages', 'provacy-policy') }}" class="hover:text-blue-500">Privacy Policy</a></li>
                                <li><a href="{{ route('pages', 'terms-of-service') }}" class="hover:text-blue-500">Terms Of Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <x-livechat/>
    </body>
</html>
