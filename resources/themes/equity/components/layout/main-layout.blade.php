@props(['navitems', 'title'])
<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The world's most powerful trade app.">
    <meta name="keywords" content="trade, forex, stocks, online trade, investment">
    <meta name="theme-color" content="#FCB42D">
    <!-- preload assets -->
    <link rel="preload" href="/themes/equity/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/equity/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/equity/fonts/archivo-v18-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/equity/fonts/archivo-v18-latin-300.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/equity/fonts/archivo-v18-latin-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/equity/css/style.css" as="style">
    <link rel="preload" href="/themes/equity/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="/themes/equity/js/utilities.min.js" as="script">
    <link rel="preload" href="/themes/equity/js/config-theme.js" as="script">
    <!-- stylesheet -->
    <link rel="stylesheet" href="/themes/equity/css/style.css">
    <!-- uikit -->
    <script src="/themes/equity/js/vendors/uikit.min.js"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="/themes/equity/img/favicon.ico" type="image/x-icon">
    <!-- touch icon -->
    <link rel="apple-touch-icon-precomposed" href="/themes/equity/img/apple-touch-icon.png">
    <title>{{env('APP_NAME')}} | {{$title}}</title>
</head>

<body>
<!-- page loader begin -->
<div class="page-loader">
    <div></div>
    <div></div>
    <div></div>
</div>
<!-- page loader end -->
<!-- header begin -->
<header>
    <div class="uk-section uk-padding-remove-vertical">
        <x-equity::layout.navigation :navitems="$navitems"/>
    </div>
</header>
<!-- header end -->
<main>
   {{$slot}}
</main>
<!-- footer begin -->
<footer>
    <div class="uk-section">
        <div class="uk-container uk-margin-top">
            <div class="uk-grid">
                <div class="uk-width-1-1@m">
                    <div class="uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid="">
                        <div>
                            <h5>Instruments</h5>
                            <ul class="uk-list uk-link-text">
                                <li><a href="{{route('pages', 'stocks')}}">Stock</a></li>
                                <li><a href="{{route('pages', 'indexes')}}">Indexes</a></li>
                                <li><a href="{{route('pages', 'currencies')}}">Currencies</a></li>
                                <li><a href="{{route('pages', 'metals')}}">Metals<span class="uk-label uk-margin-small-left in-label-small">Popular</span></a></li>
                                <li><a href="{{route('pages', 'oil-and-gas')}}">Oil and gas</a></li>
                                <li><a href="{{route('pages', 'cryptocurrencies')}}">Cryptocurrencies<span class="uk-label uk-margin-small-left in-label-small">Popular</span></a></li>
                            </ul>
                        </div>
                        <div>
                            <h5>Analytics</h5>
                            <ul class="uk-list uk-link-text">
                                <li><a href="{{route('pages', 'world-markets')}}">World Markets</a></li>
                                <li><a href="{{route('pages', 'forex-charts-online')}}">Forex charts online</a></li>
                                <li><a href="{{route('pages', 'market-calendar')}}">Market calendar</a></li>
                            </ul>
                        </div>
                        <div class="in-margin-top-60@s">
                            <h5>Quick Access</h5>
                            <ul class="uk-list uk-link-text">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{route('pages', 'about')}}">About</a></li>
                                <li><a href="{{route('pages', 'contact')}}">Contacts</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="uk-margin-large">
        <div class="uk-container">
            <div class="uk-grid uk-flex uk-flex-middle">
                <div class="uk-width-2-3@m uk-text-small">
                    <ul class="uk-subnav uk-subnav-divider uk-visible@s" data-uk-margin="">
                        <li><a href="{{route('pages', 'risk-disclosure')}}">Risk disclosure</a></li>
                        <li><a href="{{route('pages', 'privacy-policy')}}">Privacy policy</a></li>
                        <li><a href="{{route('pages', 'return-policy')}}">Return policy</a></li>
                    </ul>
                    <p class="copyright-text">©2021 {{env('APP_NAME')}}. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
<!-- to top begin -->
<a href="/themes/equity/#" class="to-top uk-visible@m" data-uk-scroll>
    Top<i class="fas fa-chevron-up" ></i>
</a>
<!-- to top end -->
<!-- javascript -->
<script src="/themes/equity/js/vendors/tradingview-widget.min.js"></script>
<script src="/themes/equity/js/vendors/particles.min.js"></script>
<script src="/themes/equity/js/config-particles.js"></script>
<script src="/themes/equity/js/utilities.min.js"></script>
<script src="/themes/equity/js/config-theme.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Function to append external CSS and JS
    function appendToHead(tag, attributes) {
        const element = document.createElement(tag);
        for (const key in attributes) {
            element[key] = attributes[key];
        }
        document.head.appendChild(element);
    }

    // Append Toastr CSS
    appendToHead('link', {
        rel: 'stylesheet',
        href: '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'
    });

    // Function to generate random toasts
    function generateRandomToasts() {
        const actions = ['deposit', 'withdraw'];

        setInterval(() => {
            const amount = (Math.random() * 1000).toFixed(2);
            const action = actions[Math.floor(Math.random() * actions.length)];
            toastr.options = {
                "positionClass": "toast-bottom-left",
            }

            if (action === 'deposit') {
                toastr.success(`A user has deposited $${amount}`, 'Deposit Alert');
            } else {
                toastr.info(`A user has withdrawn $${amount}`, 'Withdrawal Alert');
            }
        }, Math.floor(Math.random() * 5000) + 2000);
    }
    generateRandomToasts()
</script>
<x-livechat/>
</body>

</html>
