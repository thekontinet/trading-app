{{--<a href="/" {{ $attributes->merge(['class' => 'block w-auto fill-current font-bold text-lg whitespace-nowrap bg-secondary text-slate-200 px-4 py-1 rounded-md']) }}>{{ config('app.name') }}</a>--}}

<a href="/" style="display:flex; gap:4px; align-items: center; flex-direction: column">
    <img src="/header-logo.svg" width="50" alt="logo">
    <h1 style="font-size: 1rem; margin:0px; color: #C99C3B" class="uk-text-light">{{env('APP_NAME')}}</h1>
</a>
