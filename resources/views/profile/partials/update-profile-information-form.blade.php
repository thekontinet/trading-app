<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <div class="inline-flex flex-col items-center" x-data="{imageUrl: @js($user->image_path), changed: false, file: null, uploading: false, status: null}">
                <label for="upload-input">
                    @if($user->image_path)
                        <img class="w-24 h-24 rounded-full object-cover border-2 border-primary" x-bind:src="imageUrl" alt="profile image" />
                    @else
                        <span class="w-24 h-24 flex justify-center items-center rounded-full object-cover border-2 border-primary">
                            <x-mary-icon name="o-camera" />
                        </span>
                    @endif
                </label>
                <input type="file" name="image" id="upload-input" class="hidden" 
                       @change="file = $event.target.files[0]; imageUrl = URL.createObjectURL(file); changed = true" 
                       x-ref="fileInput"/>
                <x-mary-button x-bind:disable="status" class="btn btn-sm mt-2" x-show="changed" 
                               @click="let formData = new FormData(); 
                                        status = 'Uploading...'
                                        formData.append('image', file); 
                                        window.axios.post('/profile/image/upload', formData, {
                                            headers: {'Content-Type': 'multipart/form-data'}
                                        }).then(() => {status = 'completed ✔'; setTimeout(() => {status=null; changed = false; $refs.fileInput.value = ''}, 2000) })">
                    <span x-show="!status">Save</span>
                    <span x-show="status" x-text="status">Uploading...</span>
                </x-mary-button>
            </div>
        </div>

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
