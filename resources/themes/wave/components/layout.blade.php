@props(['navitems', 'title'])
<!doctype html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Premium HTML5 Template by Indonez">
    <meta name="keywords" content="blockit, uikit3, indonez, handlebars, scss, javascript">
    <meta name="author" content="Indonez">
    <meta name="theme-color" content="#FCB42D">
    <!-- preload assets -->
    <link rel="preload" href="/themes/wave/fonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/wave/fonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/wave/fonts/rubik-v9-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/wave/fonts/rubik-v9-latin-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/wave/fonts/rubik-v9-latin-300.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/themes/wave/css/style.css" as="style">
    <link rel="preload" href="/themes/wave/js/vendors/uikit.min.js" as="script">
    <link rel="preload" href="/themes/wave/js/utilities.min.js" as="script">
    <link rel="preload" href="/themes/wave/js/config-theme.js" as="script">
    <!-- stylesheet -->
    <link rel="stylesheet" href="/themes/wave/css/style.css">
    <!-- uikit -->
    <script src="/themes/wave/js/vendors/uikit.min.js"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="/themes/wave/img/favicon.ico" type="image/x-icon">
    <!-- touch icon -->
    <link rel="apple-touch-icon-precomposed" href="/themes/wave/img/apple-touch-icon.png">
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
    <div class="uk-section uk-padding-remove-vertical in-header-inverse ">
        <nav class="uk-navbar-container uk-navbar-transparent" data-uk-sticky="show-on-up: true; top: 80; animation: uk-animation-fade">
            <div class="uk-container" data-uk-navbar>
                <div class="uk-navbar-left uk-width-expand uk-flex uk-flex-between">
                    <x-application-logo/>
                    <ul class="uk-navbar-nav uk-visible@m">
                        <li><a href="/">Home</a></li>
                        <li>
                            <a href="#">Pages<span data-uk-navbar-parent-icon></span></a>
                            <div class="uk-navbar-dropdown">
                                <ul class="uk-nav uk-navbar-dropdown-nav">
                                    @foreach($navitems as $navitem)
                                        <li><a href="{{$navitem['href']}}">{{$navitem['title']}}</a>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('pages', 'about') }}">About</a></li>
                        <li><a href="{{ route('pages', 'contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="uk-navbar-right uk-width-auto">
                    <div class="uk-navbar-item uk-visible@m">
                        <div class="in-optional-nav">
                            <a href="{{ route('login') }}" class="uk-button uk-button-text"><i class="fas fa-user-circle uk-margin-small-right"></i>Log in</a>
                            <a href="{{ route('register') }}" class="uk-button uk-button-primary uk-button-small uk-border-pill">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-card uk-card-secondary uk-card-small uk-card-body uk-border-rounded">
                        <div class="uk-grid uk-text-small" data-uk-grid>
                            <div class="uk-width-3-4@m uk-visible@m">
                                <p>Investing is a powerful way to grow your finances and build long-term wealth.</p>
                            </div>
                            <div class="uk-width-expand@m uk-text-center uk-text-right@m">
                                <a class="uk-margin-right" href="?livechat"><i class="fas fa-comment-alt uk-margin-small-right"></i>Live Chat</a>
                                @if(env('APP_PHONE'))
                                    <a href="#"><i class="fas fa-phone-alt uk-margin-small-right uk-margin-small-left"></i>{{ env('APP_PHONE') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
<main>
    {{$slot}}
</main>
<!-- footer begin -->
<footer>
    <div class="uk-section uk-section-muted uk-padding-large uk-padding-remove-horizontal uk-margin-medium-top">
        <div class="uk-container">
            <div class="uk-grid-medium" data-uk-grid="">
                <div class="uk-width-expand@m">
                    <div class="footer-logo">
                        <x-application-logo/>
                    </div>
                    <p class="uk-text-large uk-margin-small-top">Your gateway to wealth success.</p>
                </div>
                <div class="uk-width-3-5@m">
                    <div class="uk-child-width-1-3@s uk-child-width-1-3@m" data-uk-grid="">
                        <div>
                            <h4><span>Markets</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="{{ route('pages', 'forex') }}">Forex</a></li>
                                <li><a href="{{ route('pages', 'stocks') }}">Stocks</a></li>
                                <li><a href="{{ route('pages', 'indices') }}">Indices</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Resources</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="{{ route('pages', 'help-centre') }}">Help Centre</a></li>
                            </ul>
                        </div>
                        <div>
                            <h4><span>Quick Access</span></h4>
                            <ul class="uk-list uk-link-text">
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('pages', 'about') }}">About</a></li>
                                <li><a href="{{ route('pages', 'contact') }}">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="uk-section uk-section-secondary uk-padding-remove-vertical">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-3-4@m uk-visible@m">
                    <ul class="uk-subnav uk-subnav-divider">
                        <li><a href="{{ route('pages', 'regulations') }}">Regulations</a></li>
                        <li><a href="{{ route('pages', 'privacy') }}">Privacy</a></li>
                        <li><a href="{{ route('pages', 'public-relations') }}">Public relations</a></li>
                        <li><a href="{{ route('pages', 'careers') }}">Careers</a></li>
                    </ul>
                </div>
                <div class="uk-width-expand@m uk-text-right@m">
                    <p class="copyright-text">© 2020 {{env('APP_NAME')}}. | {{env('APP_FOOTER_NOTE')}}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
<!-- to top begin -->
<a href="#" class="to-top uk-visible@m" data-uk-scroll>
    Top<i class="fas fa-chevron-up" ></i>
</a>
<!-- to top end -->
<!-- javascript -->
<script src="/themes/wave/js/utilities.min.js"></script>
<script src="/themes/wave/js/config-theme.js"></script>
<x-livechat/>
</body>

</html>
