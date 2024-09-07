<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}" class="text-slate-400">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="mt-4">
            <x-mary-input
                label="Email"
                type="email"
                name="email"
                :value="old('email', $request->email)"
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

        <div class="flex items-center justify-end mt-4">
            <x-primary-button type="submit" class="btn-primary">
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
