<x-page-layout :pages="$pages">
    @php
        $faqs = App\Models\Page::query()->where('category', App\Enums\Category::FAQ)->get()
    @endphp
    <section class="h-screen py-4 lg:py-12 bg-[rgb(224, 244, 255)] dark:bg-slate-900">
        <x-mary-card class="max-w-6xl mx-auto shadow-lg">
            <h2 class="text-4xl text-center font-bold">Faq</h2>
            <div class="mt-8 space-y-8">
                @foreach ($faqs as $key => $faq)
                    <div class="collapse collapse-arrow bg-base-200">
                        <input id="{{ $faq->slug }}" type="radio" name="accordion" {{ $key == 0 ? 'checked' : '' }} />
                        <label for="{{ $faq->slug }}" class="collapse-title text-xl font-medium">{{ $faq->title }}</label>
                        <div class="collapse-content">
                            <p>{!! $faq->content !!}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </x-mary-card>
    </section>
</x-page-layout>
