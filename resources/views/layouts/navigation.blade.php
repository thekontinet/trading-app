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


<nav x-data="{ open: false }" class="bg-white dark:bg-inherit border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    @include('layouts.left-drawer')
                    <x-application-logo class="block w-auto fill-current text-gray-800 dark:text-gray-200 font-bold text-lg whitespace-nowrap bg-blue-900 text-slate-200 px-4 py-1 rounded-md" />
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

            <!-- Logout and theme toggler -->
            <div class="flex sm:items-center sm:ms-6">
                <button @click="$store.darkMode.toggle()" class="px-4"><x-mary-icon name="o-moon" class="w-6 h-6"/></button>
                <button form="logout-form"><x-mary-icon name="o-power" class="w-6 h-6"/></button>
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
