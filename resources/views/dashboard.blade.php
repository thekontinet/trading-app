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
            <div class="border border-primary dark:border-indigo-950 bg-cover bg-center text-white text-center" :title="" subtitle="Trading Balance" style="background-image: url('/images/dashboard-wallet-card.png')">
                <div class="bg-[#10032ae0] py-8 px-6">
                    <h2 class="text-2xl">{{ money($user->balance, $user->currency) }}</h2>
                    <h3>Trading Balance</h3>
                    <div class="h-2 w-full bg-white border rounded max-w-lg mx-auto mt-14 mb-2">
                        <div class="bg-indigo-900 rounded h-full" style="width: {{ $user->signal_strength }}%"></div>
                    </div>
                    <h3>Signal Strength</h3>
                </div>
            </div>

            <div class="py-8 grid gap-4 grid-cols-3">
                <x-mary-button class="btn-ghost btn-block btn-square btn-primary flex-col lg:flex-row" icon='o-credit-card' :link="route('deposits.create')">Deposit</x-mary-button>
                <x-mary-button class="btn-ghost btn-block btn-square btn-primary flex-col lg:flex-row" icon='o-user-group' :link="route('copy-trades.index')">Copy Traders</x-mary-button>
                <x-mary-button class="btn-ghost btn-block btn-square btn-primary flex-col lg:flex-row" icon='o-arrows-up-down' :link="route('transfers.create')">Transfer</x-mary-button>
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