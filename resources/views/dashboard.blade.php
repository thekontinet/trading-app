<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="grid gap-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

            <x-mary-card :title="money($user->balance, $user->currency)" subtitle="Trading Balance">
                <x-slot:menu>
                    <x-mary-icon name="o-wallet" class="mr-8"/>
                </x-slot:menu>

                <x-slot:actions>
                    <div class="flex items-center w-full gap-4">
                        <x-mary-button label="Fund Account" class="btn-primary" :link="route('deposits.create')" />
                        <x-mary-button label="Withdraw" class="btn-secondary" />
                        <x-mary-button label="Transfer" class="btn-secondary" :link="route('transfers.create')" />
                    </div>
                </x-slot:actions>
            </x-mary-card>

            <x-mary-card>
                @foreach ($assets as $asset)
                <x-mary-list-item :item="['name' => 'daniel']" no-separator>
                    <x-slot:avatar>
                        <x-mary-avatar image="{{ $asset->image_url }}" />
                    </x-slot:avatar>
                    <x-slot:value>
                        {{ $asset->name }}
                    </x-slot:value>
                    <x-slot:sub-value>
                        @money($asset->price, $user->currency)
                    </x-slot:sub-value>
                    <x-slot:actions>
                        <span class="font-semibold">{{ money($asset->wallet->balance, $asset->wallet->currency) }}</span>
                    </x-slot:actions>
                </x-mary-list-item>
                @endforeach
            </x-mary-card>
        </div>
    </div>
</x-app-layout>
