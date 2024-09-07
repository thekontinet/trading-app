<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="text-slate-400">
        @csrf

        <!-- Name -->
        <div>
            <x-mary-input
                label="Name"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                inline
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-mary-input
                label="Email"
                type="email"
                name="email"
                :value="old('email')"
                required
                inline />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-mary-input
                :label="__('Password')"
                type="password"
                name="password"
                :value="old('password')"
                required
                inline/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-mary-input
                :label="__('Confirm Password')"
                type="password"
                name="password_confirmation"
                :value="old('password')"
                required
                inline/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-mary-button type="submit" class="w-full btn-primary">
                {{ __('Create Account') }}
            </x-mary-button>
        </div>
    </form>
    <div class="my-4 text-center">
        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>
</x-guest-layout>
