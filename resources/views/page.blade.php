<x-page-layout :pages="$pages">
    <section class="min-h-screen py-4 lg:py-12" style="background-color: rgb(224, 244, 255)">
        <x-mary-card class="max-w-6xl mx-auto bg-white border shadow-lg">
            <h2 class="text-4xl text-center font-bold">{{ $page->title }}</h2>
            <div class="mt-8 space-y-8">
                {!! $page->content !!}
            </div>
        </x-mary-card>
    </section>
</x-page-layout>