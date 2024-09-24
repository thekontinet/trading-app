<x-page-layout :pages="$pages">
    <!-- Hero -->
    <section class="bg-white dark:bg-gray-900 text-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-6 order-2 lg:order-1 text-center lg:text-left py-24" data-aos="fade-right" data-aos-duration="2000">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-6xl dark:text-white">Trading is better with  {{ config('app.name') }}</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg dark:text-gray-400">Raw spreads. Real time trade signals. Round the clock support.</p>
                <x-mary-button link="{{ route('register') }}" class="btn-primary btn-sm">
                    Get started
                </x-mary-button>
                <x-mary-button link="{{ route('login') }}" class="btn-primary btn-outline btn-sm">
                    Login
                </x-mary-button> 
            </div>
            <div class="lg:mt-0 lg:col-span-5 lg:flex order-1 lg:order-2 relative" data-aos="fade-left" data-aos-duration="3000" data-aos-delay="1000">
                <video class="w-full" src="https://standardmarkets.net/1videos/laptop.mp4" muted autoplay loop></video>
                <div class="absolute inset-0 select-none"></div>
            </div>                
        </div>
    </section>

    <!-- Features -->
    <section class="bg-primary text-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16" data-aos="zoom-in" data-aos-duration="2000">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold">1 Account 200+ Products</h2>
                <p class="sm:text-xl0">Diversify your portfolio with access to over 15,000 products across 7 asset classes. Trade CFDs on Forex, Futures, Indices, Metals, Energies and Shares.</p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0 justify-center">
                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <img src="https://img.icons8.com/?size=100&id=L1-Avn7FpID_&format=png&color=ffffff" alt="crypto">
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Crypto</h3>
                    <p>Trade and Mine Bitcoin and Other Leading Crypto Currencies with Decentralized Finance</p>
                </div>

                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <img src="https://img.icons8.com/?size=100&id=118352&format=png&color=ffffff" alt="crypto">
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Copy Trading</h3>
                    <p>Copy trading allows you to directly copy the positions taken by another trader. You simply copy everything.</p>
                </div>

                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <img src="https://img.icons8.com/?size=100&id=xNjHw8pRCvfs&format=png&color=ffffff" alt="crypto">
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Forex</h3>
                    <p>Trade currency pairs and be able to implement your own trading strategies with minimum slippage</p>
                </div>

                <div>
                    <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <img src="https://img.icons8.com/?size=100&id=117518&format=png&color=ffffff" alt="crypto">
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Stocks</h3>
                    <p>Stocks, also commonly referred to as shares, are issued by a public company and put up for sale.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="bg-white rounded-lg py-12">
        <div class="max-w-7xl mx-auto p-6 grid lg:grid-cols-12 items-center">
            <div class="lg:col-span-5">
                <h1 class="text-3xl font-bold mb-4">Lightning speed execution with<br>razor-thin spreads</h1>
                <p class="text-lg mb-6">You get the best trading conditions :</p>
                <ul class="space-y-2 mb-8">
                    @foreach(['Zero commission', 'Spreads from 0.0 pips', 'Copy Trading Available'] as $item)
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-7 relative">
                <video class="max-w-xl w-full" src="https://standardmarkets.net/1videos/flowchart.mp4" muted autoplay loop></video>
                <div class="absolute inset-4 select-none"></div>
            </div>
        </div>
    </section>

    
    <!-- TradingView Widget BEGIN -->
    <section class="tradingview-widget-container bg-white px-8">
        <div class="tradingview-widget-container__widget max-w-7xl mx-auto"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                {
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500 Index"
                },
                {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100 Cash CFD"
                },
                {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR to USD"
                },
                {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                },
                {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                }
            ],
            "showSymbolLogo": true,
            "isTransparent": false,
            "displayMode": "adaptive",
            "colorTheme": "light",
            "locale": "en"
        }
        </script>
    </section>
    <!-- TradingView Widget END -->

    <section class="p-6 bg-white rounded-lg py-12">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-12 items-center">
            <div class="col-span-7 order-2 md:order-1" data-aos="fade-right" data-aos-duration="2000">
               <img class="max-w-lg w-full" src="https://standardmarkets.net/assets/images/svgs/BBLaptopLight.svg" alt="banner">
            </div>

            <div class="col-span-5 order-1 md:order-2">
                <h1 class="text-3xl font-bold mb-4">Copy Expert Traders</h1>
                <p class="text-lg mb-6">It’s all in the name! Copy trading allows you to directly copy the positions taken by another trader. You decide the amount you wish to invest and simply copy everything they do automatically in real-time – when that trader makes a trade, your account will make that same trade as well.</p>
            </div>
        </div>
    </section>

    <!-- Plans -->
    <section class="bg-primary text-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16" data-aos="zoom-in" data-aos-duration="2000">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold">A Trading Account For Every Trader</h2>
                <p class="sm:text-xl0">We offer a variety of trading accounts to match every trading style across all levels of experience. Whether you’re a scalper or day trader, use EAs or are a discretionary trader, we have you covered.</p>
            </div>

            <div class="flex flex-wrap gap-4 items-center justify-center">
                @foreach (App\Models\Plan::all() as $plan)
                    <div class="max-w-sm">
                        <x-pricing-card :plan="$plan"/>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Support -->
    <section class="bg-white rounded-lg py-12 overflow-hidden">
        <div class="grid lg:grid-cols-12 max-w-7xl mx-auto p-6">
            <div class="col-span-5" data-aos="fade-right" data-aos-duration="2000">
                <h1 class="text-3xl font-bold mb-4">Unrivaled 24/7 Customer Service</h1>
                <p class="text-lg mb-6">Got an issue? We respond under 5 minutes on live chat and solve the problem for you.</p>
                <ul class="space-y-2 mb-8">
                    @foreach(['Contact us anytime, from anywhere', 'One-to-one trading support for all clients'] as $item)
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-span-7 text-right" data-aos="fade-left" data-aos-duration="2000">
                <img src="https://standardmarkets.net/assets/images/site/Headset.webp" alt="support" class="max-w-sm w-full block ml-auto">
            </div>
        </div>
    </section>
</x-page-layout>
