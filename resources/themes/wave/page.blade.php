<x-wave::layout :navitems="$navitems" title="{{$page->title}}">
    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m in-card-10 uk-grid uk-grid-stack" data-uk-grid="">
                <div class="uk-width-1-1 uk-first-column">
                    <h1 class="uk-margin-remove"><span class="in-highlight">{{$title}}</span></h1>
                    <p>{!! $page->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-wave::layout>
