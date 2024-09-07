<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="text-slate-400">
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

        <div class="flex items-center justify-end mt-4">
            <x-mary-button type="submit" class="btn-primary">
                {{ __('Email Password Reset Link') }}
            </x-mary-button>
        </div>
    </form>
</x-guest-layout>
