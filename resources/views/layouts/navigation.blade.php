@php
    $navs = [
        'Dashboard' => [
            'link' => route('dashboard'),
            'active' => request()->routeIs('dashboard'),
        ],
        'Deposits' => [
            'link' => route('transactions.index', ['type' => 'deposit']),
            'active' => request()->routeIs('transactions.*') && request()->query('type') === 'deposit',
        ],
        'Withdraws' => [
            'link' => route('transactions.index', ['type' => 'withdraw']),
            'active' => request()->routeIs('transactions.*') && request()->query('type') === 'withdraw',
        ],
        'Transactions' => [
            'link' => route('transactions.index'),
            'active' => request()->routeIs('transactions.*') && request()->query('type') === null,
        ],
    ]
@endphp


<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    @include('layouts.left-drawer')
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    @foreach ($navs as $label => $nav)
                    <x-nav-link :href="$nav['link']" :active="$nav['active']">
                        {{ $label }}
                    </x-nav-link>
                    @endforeach
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <button form="logout-form"><img class="w-8" src="https://img.icons8.com/ios-glyphs/30/shutdown--v1.png" alt="power-off-button"/></button>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <img class="w-8" src="https://img.icons8.com/ios-glyphs/30/shutdown--v1.png" alt="power-off-button"/>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @foreach ($navs as $label => $nav)
            <x-responsive-nav-link :href="$nav['link']" :active="$nav['active']">
                {{ $label }}
            </x-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
