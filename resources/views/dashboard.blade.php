<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-start">
            <div>
                <h2 class="text-xl font-semibold leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </div>
        </div>
    </x-slot>

    <div class="py-4 lg:py-12">
        <div class="grid gap-4 mx-auto max-w-7xl px-2 lg:px-8">
            <div class="dashboard-card">
                <div class="py-4 px-6">
                    <h2 class="text-2xl font-bold">{{ money($user->balance, $user->currency) }}</h2>
                    <h3 class="text-sm">Trading Balance</h3>
                    <div class="h-2 w-full bg-base-300 border rounded max-w-lg mx-auto mt-14 mb-2">
                        <div class="bg-primary rounded h-full" style="width: {{ $user->signal_strength }}%"></div>
                    </div>
                    <h3 class="text-sm">Signal Strength</h3>
                    @if($user->subscription && !$user->subscription->hasExpired())
                        <x-mary-button class="btn-outline btn-xs font-medium btn-success">{{ $user->subscription->plan->name }}</x-mary-button>
                    @endif
                    @if($user->signal_strength != 0)
                        <x-mary-button class="btn-outline btn-xs font-medium btn-success ml-2">Auto Trade</x-mary-button>
                    @endif
                </div>
            </div>

            <div class="py-2 grid gap-4 grid-cols-3 lg:grid-cols-4">
                <x-mary-button
                    class="btn-outline btn-block btn-square btn-primary flex-col lg:flex-row"
                    icon='o-credit-card'
                    :link="route('deposits.create')"
                >Deposit</x-mary-button>

                <x-mary-button
                    class="btn-outline btn-block btn-square btn-primary flex-col lg:flex-row hidden lg:flex"
                    icon='o-wallet'
                    :link="route('withdraws.create')"
                >Withdraw</x-mary-button>

                <x-mary-button
                    class="btn-outline btn-block btn-square btn-primary flex-col lg:flex-row"
                    icon='o-user-group'
                    :link="route('copy-trades.index')"
                >Copy Traders</x-mary-button>

                <x-mary-button
                    class="btn-outline btn-block btn-square btn-primary flex-col lg:flex-row"
                    icon='o-arrows-up-down'
                    :link="route('transfers.create')"
                >Transfer</x-mary-button>
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
