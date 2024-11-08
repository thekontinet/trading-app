<x-equity::layout.main-layout :navitems="$navitems" title="{{$title}}">
    <div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><span>Contact</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m in-card-10 uk-grid uk-grid-stack" data-uk-grid="">
                <div class="uk-width-1-1 uk-first-column">
                    <h1 class="uk-margin-remove">Contact Us</h1>
                    <h4 class="uk-margin-remove">Kindly send us a mail and get a reply with 24 hours</h4>
                    @if(session('mail.success'))
                        <div class="uk-alert uk-alert-success">Your message has been successfully sent. We appreciate your patience as we review and process your request.</div>
                    @endif
                    <form action="{{route('send-mail')}}" method="post" class="uk-margin-top">
                        @csrf
                        <div class="uk-margin-small-top">
                            <label for="name" class="uk-form-label">Name</label>
                            <input type="text" class="uk-input" name="name" id="name">
                            @error('name')<span class="uk-form-danger">{{$message}}</span>@endError
                        </div>
                        <div class="uk-margin-small-top">
                            <label for="email" class="uk-form-label">Email</label>
                            <input type="text" class="uk-input" name="email" id="email">
                            @error('email')<span class="uk-form-danger">{{$message}}</span>@endError
                        </div>
                        <div class="uk-margin-small-top">
                            <label for="message" class="uk-form-label">Message</label>
                            <textarea class="uk-textarea"  name="message" id="message"></textarea>
                            @error('message')<span class="uk-form-danger">{{$message}}</span>@endError
                        </div>
                        <div class="uk-margin-small-top">
                            <button class="uk-button uk-button-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-equity::layout.main-layout>
