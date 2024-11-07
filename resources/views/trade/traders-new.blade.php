<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Top Traders') }}
            </h2>
            <x-mary-button class="btn-primary btn-sm" link="{{ route('copy-trades.index') }}">Back</x-mary-button>
        </div>
    </x-slot>

    <section class="py-4 lg:py-12 max-w-7xl mx-auto lg:px-8">
        <div class="grid gap-4 lg:grid-cols-4">
            @forelse ($traders as $trader)
                <x-trader-card :trader="$trader"/>
            @empty
                <p class="text-center text-sm col-span-full">No trader available</p>
            @endforelse
        </div>

        <div class="py-4">
            {{ $traders->links() }}
        </div>
    </section>
</x-app-layout>
