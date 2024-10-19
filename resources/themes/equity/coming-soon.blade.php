<x-equity::layout.main-layout :navitems="$navitems" title="{{$title}}">
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
                    <h4 class="uk-margin-remove">Page Under development</h4>
                    <p>We’re working hard to bring you a new and improved experience! This page is currently under development and will soon feature exciting new content and features to enhance your journey with us. Please check back soon to explore what’s coming next.</p>
                    <p>In the meantime, feel free to browse the rest of our website or contact us for more information.</p>
                    <p>Stay tuned for updates!</p>
                </div>
            </div>
        </div>
    </div>
</x-equity::layout.main-layout>
