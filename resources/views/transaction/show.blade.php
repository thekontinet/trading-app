<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Transaction Summary') }}
        </h2>
    </x-slot>
    <section class="py-2 lg:py-12 max-w-lg mx-auto">
        <x-mary-card>
            <h4 class="text-lg font-semibold py-4 text-center">
                @if($transaction->type === 'deposit')
                    <span class="font-light text-sm block">Amount Deposited</span>
                @else
                    <span class="font-light text-sm block">Amount Withdrawn</span>
                @endif
                @money(abs($transaction->amount), $transaction->wallet->currency)
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

            @if(!$transaction->confirmed && $transaction->type === 'withdraw')
                <p class="text-sm py-8">You transaction has been submitted. Fund will be recieved once transaction validation is complete</p>
            @endif

            @if(!$transaction->confirmed && $transaction->type === 'deposit')
                <div class="border rounded-lg p-2 max-w-64 mt-8">
                    <img class="w-full" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $asset->address }}"/>
                    <p class="text-sm font-semibold text-center py-4">Scan or copy wallet address to make payment</p>
                </div>

                <form class="mt-8"
                      x-data="{copied: false}"
                      x-init="
                        const clipboard = new ClipboardJS($refs.btn, {text: () => $refs.input.value})
                        clipboard.on('success', () => {
                            copied = true
                            setTimeout(() => copied = false, 500)
                        })
                    "
                >
                    <x-mary-input x-ref="input" :value="$asset->address" data-copable="wallet-address-readonly-input" readonly>
                        <x-slot:append>
                            <x-mary-button
                                x-ref="btn"
                                class="btn-outline btn-primary border-dashed border-s-0 rounded-s-none"
                            >
                                <x-mary-icon x-cloak x-show="!copied" name="o-clipboard"/>
                                <x-mary-icon x-cloak x-show="copied" name="o-check-circle"/>
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
