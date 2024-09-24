<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="text-slate-400 grid grid-cols-2 space-y-6 gap-x-4">
        @csrf

        <div>
            <x-mary-select
                label="Account Type"
                name="account_type"
                wire:model="account_type"
                :value="old('account_type')"
                :options="$accountTypes"
                required
                autofocus />
            <x-input-error :messages="$errors->get('account_type')" class="mt-2" />
        </div>

        <div>
            <x-mary-select
                label="Currency"
                name="currency"
                wire:model="currency"
                :value="old('currency')"
                :options="$currencies"
                required />
            <x-input-error :messages="$errors->get('currency')" class="mt-2" />
        </div>

        <div class="col-span-full">
            <x-mary-select
                label="Country"
                name="country"
                wire:model="country"
                :value="old('country')"
                :options="$countries"
                required />
            <x-input-error :messages="$errors->get('country')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-full">
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
        <div class="col-span-full">
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
        <div>
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
        <div>
            <x-mary-input
                :label="__('Confirm Password')"
                type="password"
                name="password_confirmation"
                :value="old('password')"
                required
                inline/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="col-span-full">
            <x-mary-checkbox name='agree' wire:model="agree">
                <x-slot name="label">
                    <a href="{{ route('pages', 'terms-of-service') }}">Agree to our terms of service</a>
                </x-slot>
            </x-mary-checkbox>
        </div>

        <div class="col-span-full">
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
