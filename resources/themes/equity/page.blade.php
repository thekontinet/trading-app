<x-equity::layout.main-layout :navitems="$navitems" title="{{$page->title}}">
    <div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><span>{{$title}}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m in-card-10 uk-grid uk-grid-stack" data-uk-grid="">
                <div class="uk-width-1-1 uk-first-column">
                    <h1 class="uk-margin-remove">{{$title}}</h1>
                    <p>{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-equity::layout.main-layout>
