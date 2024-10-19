<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Trades') }}
            </h2>
            <x-mary-button class="btn-primary btn-sm" link="{{ route('copy-trades.index', ['new' => true]) }}">Copy a trader</x-mary-button>
        </div>
    </x-slot>

    <section class="py-4 lg:py-12 max-w-7xl mx-auto lg:px-8">
        <div style="height: 600px">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container" style="height:100%;width:100%">
                <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%; border-radius: 24px"></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                    {
                        "autosize": true,
                        "symbol": "BYBIT:BTCUSDT.P",
                        "interval": "D",
                        "timezone": "Etc/UTC",
                        "theme": "dark",
                        "style": "1",
                        "locale": "en",
                        "allow_symbol_change": true,
                        "calendar": false,
                        "support_host": "https://www.tradingview.com"
                    }
                </script>
            </div>
            <!-- TradingView Widget END -->
        </div>
        <div class="grid gap-4 lg:grid-cols-4">
            @forelse ($copies as $copy)
            <x-trader-card :trader="$copy->trader">
                <ul class="text-sm text-left grid grid-cols-2 [&_li:nth-child(even)]:text-right [&_li]:py-3">
                    <li class="font-light">
                        <abbr title="Return on investment">Amount</abbr>
                        <dd class="font-bold">{{ money($copy->amount, $user->currency) }}</dd>
                    </li>
                    <li class="font-light">
                        <abbr title="Profit and Loss">Profit</abbr>
                        <dd class="font-bold">{{ money($copy->profit, $user->currency) }}</dd>
                    </li>
                </ul>
                <form action="{{ route('copy-trades.destroy', $copy) }}" method="post">
                    @method('delete')
                    @csrf
                    <x-mary-button type="submit" class="btn-outline btn-block">Stop Copying</x-mary-button>
                </form>
            </x-trader-card>
            @empty
            <p class="text-center text-sm col-span-full">No trades available</p>
            @endforelse
        </div>
    </section>
</x-app-layout>
