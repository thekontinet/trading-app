<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('All Transactions') }}
        </h2>
    </x-slot>

    <section class="py-12 max-w-6xl mx-auto">
        <div class="bg-white p-4 rounded-md">
            @foreach ($transactions  as $transaction)
                <x-mary-list-item :item="$transaction" value="id" :link="route('transactions.show', $transaction)">
                    <x-slot:avatar>
                        <p class="flex flex-col text-sm text-center w-12">
                            <span>{{ $transaction->created_at->format('M') }}</span>
                            <span class="uppercase text-base">{{ $transaction->created_at->format('jS') }}</span>
                            <span>{{ $transaction->created_at->format('Y') }}</span>
                        </p>
                    </x-slot:avatar>
                    <x-slot:value>
                        <p class="flex flex-col text-sm text-center2">
                            <span>{{ $transaction->wallet->name }}</span>
                            @if(!$transaction->confirmed)
                                <span>(Pending)</span>
                            @endif
                        </p>
                    </x-slot:value>
                    <x-slot:actions>
                        <p class="flex flex-col text- text-center">
                            @if($transaction->confirmed)
                                <span class="font-medium text-success">@money($transaction->amount, $transaction->wallet->currency)</span>
                            @else
                                <span class="font-medium text-warning">@money($transaction->amount, $transaction->wallet->currency)</span>
                            @endif
                        </p>
                    </x-slot:actions>
                </x-mary-list-item>
            @endforeach
        </div>
    </section>
</x-app-layout>