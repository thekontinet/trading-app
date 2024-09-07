<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="text-slate-400">
        @csrf

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

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4 dark:text-slate-500">
            <x-mary-checkbox name='remember' :label="__('Remember me')"/>

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div class="mt-4 ">
            <x-mary-button type="submit" class="w-full mb-4 btn-primary">
                {{ __('Log in') }}
            </x-mary-button>
        </div>
    </form>
    <div class="my-4 text-center">
        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('register') }}">
            {{ __('Create a new account') }}
        </a>
    </div>
</x-guest-layout>
