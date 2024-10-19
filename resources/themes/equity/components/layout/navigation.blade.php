@props(['navitems'])
<nav class="uk-navbar-container {{request()->is('/') ? ' uk-navbar-transparent' : ''}}" data-uk-sticky="show-on-up: true; animation: uk-animation-slide-top;">
    <div class="uk-container" data-uk-navbar>
        <div class="uk-navbar-left">
            <x-equity::app-logo/>
            <ul class="uk-navbar-nav uk-visible@m">
                <li><a href="/">Home</a>
                <li><a href="#">Pages<span data-uk-navbar-parent-icon></span></a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            @foreach($navitems as $navitem)
                                <li><a href="{{$navitem['href']}}">{{$navitem['title']}}</a>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <li><a href="{{route('pages', 'about')}}">About</a>
                <li><a href="{{route('pages', 'contact')}}">Contacts</a>
            </ul>
        </div>
        <div class="uk-navbar-right">
            <div class="uk-navbar-item uk-visible@m in-optional-nav">
                <a href="{{route('login')}}" class="uk-button uk-button-text">Log in<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
                <a href="{{route('register')}}" class="uk-button uk-button-primary">Sign up<i class="fas fa-arrow-circle-right uk-margin-small-left"></i></a>
            </div>
        </div>
    </div>
</nav>
