<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Dashboard') }}
            </h2>

            @if($user->subscription && !$user->subscription->hasExpired())
                <x-mary-button class="btn-outline btn-sm font-medium btn-success"><span class="font-light">Active Plan: </span>{{ $user->subscription->plan->name }}</x-mary-button>
            @else
                <x-mary-button class="btn-sm font-medium btn-primary" :link="route('upgrade.index')">Upgrade</x-mary-button>
            @endif
        </div>
    </x-slot>

    <div class="py-4 lg:py-12">
        <div class="grid gap-4 mx-auto max-w-7xl px-2 lg:px-8">
            <x-mary-card class="border border-primary" :title="money($user->balance, $user->currency)" subtitle="Trading Balance">
                <x-slot:menu>
                    <x-mary-dropdown left>
                        <x-slot:trigger>
                            <x-mary-button icon="o-bolt" label='Actions' class="btn-outline btn-xs" />
                        </x-slot:trigger>
                     
                        <x-mary-menu-item icon="o-arrows-up-down" title="Transfer" link="{{ route('transfers.create') }}"/>
                        <x-mary-menu-item icon="o-credit-card" title="Withdraw" link="{{ route('withdraws.create') }}"/>
                    </x-mary-dropdown>
                </x-slot:menu>

                <x-slot:actions>
                    <div class="w-full">
                        <x-mary-button label="Fund Account" class="btn-primary w-full lg:w-auto" :link="route('deposits.create')" />
                    </div>
                </x-slot:actions>
            </x-mary-card>

            <div class="py-8 grid gap-4 grid-cols-2 lg:grid-cols-4">
                <x-mary-button class="btn-outline btn-block btn-square btn-primary" icon='o-credit-card' :link="route('deposits.create')">Deposit</x-mary-button>
                <x-mary-button class="btn-outline btn-block btn-square btn-primary" icon='o-arrows-up-down' :link="route('transfers.create')">Transfer</x-mary-button>
                <x-mary-button class="btn-outline btn-block btn-square btn-primary" icon='o-user-group' :link="route('copy-trades.index')">Copy Trading</x-mary-button>
                <x-mary-button class="btn-outline btn-block btn-square btn-primary" icon='o-queue-list' :link="route('transactions.index')">Transactions</x-mary-button>
            </div>

            <div class="flex items-center gap-4">
                <x-mary-button class="btn-sm" :link="route('dashboard', ['type' => 'crypto'])">Crypto</x-mary-button>
                <x-mary-button class="btn-sm" :link="route('dashboard', ['type' => 'forex'])">Forex</x-mary-button>
                <x-mary-button class="btn-sm" :link="route('dashboard', ['type' => 'stock'])">Stocks</x-mary-button>
            </div>

            <x-mary-card>
                @foreach ($assets as $asset)
                <x-mary-list-item :item="['name' => 'daniel']" no-separator>
                    <x-slot:avatar>
                        @if($asset->image_url)
                            <x-mary-avatar image="{{ $asset->image_url }}" />
                        @else
                            <div class="w-8 h-8 text-[6px] grid place-items-center bg-slate-200 rounded-full border">{{ $asset->symbol }}</div>
                        @endif
                    </x-slot:avatar>
                    <x-slot:value>
                        {{ $asset->name }}
                    </x-slot:value>
                    <x-slot:sub-value>
                        @if($asset->type === 'crypto')
                            @money($asset->price, $user->currency)
                        @else
                            {{ $asset->symbol }}
                        @endif
                    </x-slot:sub-value>
                    @if($asset->type === 'crypto')
                    <x-slot:actions>
                        <span class="font-semibold">{{ money($asset->wallet->balance, $asset->wallet->currency) }}</span>
                    </x-slot:actions>
                    @else
                    <x-slot:actions>
                        <span class="font-semibold"></span>
                    </x-slot:actions>
                    @endif
                </x-mary-list-item>
                @endforeach
            </x-mary-card>
        </div>
    </div>
</x-app-layout>
