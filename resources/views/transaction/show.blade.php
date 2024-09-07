<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Transaction Summary') }}
        </h2>
    </x-slot>
    <section class="py-12 max-w-lg mx-auto">
        <x-mary-card>
            <h4 class="text-lg font-semibold py-4 text-center">
                <span class="font-light text-sm block">Amount</span>
                @money($transaction->amount, $transaction->wallet->currency)
            </h4>
            <header class="grid grid-cols-2 gap-4">
                <dl>
                    <dt class="font-semibold">Date</dt>
                    <dd class="text-sm font-light">{{ $transaction->created_at->format('jS M Y') }}</dd>
                </dl>
                <dl class="text-right">
                    <dt class="font-semibold">Status</dt>
                    <dd class="text-sm font-light">
                        @if($transaction->confirmed)
                        <x-mary-badge value="Delivered" class="bg-success"/>
                        @else
                        <x-mary-badge value="Pending" class="bg-warning"/>
                        @endif
                    </dd>
                </dl>

                <dl>
                    <dt class="font-semibold">Account</dt>
                    <dd class="text-sm font-light">{{ $transaction->wallet->name }}</dd>
                </dl>

                <dl class="text-right">
                    <dt class="font-semibold">Email</dt>
                    <dd class="text-sm font-light">{{ $transaction->wallet->holder->email }}</dd>
                </dl>
            </header>

            @if(!$transaction->confirmed)
            <div class="border rounded-lg p-2 max-w-64 mt-8">
                <img class="w-full" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $asset->address }}"/>
                <p class="text-sm font-semibold text-center py-4">Scan or copy wallet address to make payment</p>
            </div>

            <form class="mt-8">
                <x-mary-input :value="$asset->address" readonly>
                    <x-slot:append>
                        <x-mary-button 
                            class="btn-outline btn-primary border-dashed border-s-0 rounded-s-none"
                        >
                            <x-mary-icon name="o-clipboard"/>
                        </x-mary-button>
                    </x-slot:append>
                </x-mary-input>
            </form>

            <ul class="my-8 text-xs list-disc list-inside space-y-4 p-4 bg-amber-100 text-amber-500 rounded">
                <li class="font-bold list-none">Please Note:</li>
                <li>This is a {{ $asset->symbol }} address. Please do not deposit cryptocurrency other than {{ $asset->name }} otherwise, you may lose your deposit</li>
                <li>The minimum topup amount is @money($transaction->amount, $transaction->wallet->currency). Any amount smaller than that will not be credited into your wallet</li>
            </ul>
            @endif
        </x-mary-card>
    </section>


</x-app-layout>
