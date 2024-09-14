@props(['trader'])

<x-mary-card class="text-center">
    <div class="h-24 w-24 mx-auto">
        <img class="h-full w-full rounded-full" src="https://ui-avatars.com/api/?name={{ $trader->name }}&background=random"/>
    </div>
    <h4 class="mt-1 font-bold text-lg">{{ $trader->name }}</h4>
    <ul class="text-sm text-left grid grid-cols-2 [&_li:nth-child(even)]:text-right [&_li]:py-3">
        <li class="font-light">
            <abbr title="Return on investment">RIO</abbr>
            <dd class="font-bold">{{ $trader->rio }}%</dd>
        </li>
        <li class="font-light">
            <abbr title="Profit and Loss">PNL</abbr>
            <dd class="font-bold {{ $trader->pnl > 0 ? 'text-green-600' : 'text-red-600' }}">{{ money($trader->pnl, auth()->user()->currency) }}</dd>
        </li>
        <li class="font-light">
            <abbr title="Percentage share for each trade">Share</abbr>
            <dd class="font-bold">{{ $trader->share_percent }}%</dd>
        </li>
        <li class="font-light">
            <abbr title="Percentage share for each trade">Copiers</abbr>
            <dd class="font-bold">{{ $trader->copiers }} / {{ $trader->max_copiers }}</dd>
        </li>
        <li class="font-light">
            <abbr title="Percentage share for each trade">WIns</abbr>
            <dd class="font-bold">{{ $trader->wins }}</dd>
        </li>
        <li class="font-light">
            <abbr title="Percentage share for each trade">Losses</abbr>
            <dd class="font-bold">{{ $trader->losses }}</dd>
        </li>
    </ul>
    @if(!$trader->copiedBy(auth()->user()))
        <form action="{{ route('copy-trades.store') }}" method="post" onsubmit="return confirm('Are you sure of this action ?')" x-data="{copy: @js(old('trader') == $trader->id)}">
            @csrf
            @error('trader')
                @if(old('trader') == $trader->id)
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @endif
            @enderror
            <x-mary-button x-show="!copy" @click="copy=true" type="button" class="btn-primary btn-block">Start Copying</x-mary-button>
            <div x-show="copy">
                <x-mary-input money wire:model="amount" name="amount" hint="min amount {{ money($trader->min_amount, auth()->user()->currency) }}"/>
                <div class="flex items-center gap-2 mt-4">
                        <x-mary-button type="submit" class="btn-primary flex-1" name='trader' wire:model="trader" value="{{ $trader->id }}">Copy</x-mary-button>
                        <x-mary-button @click="copy=false" type="button" class="btn-outline flex-1">Cancel</x-mary-button>
                </div>
            </div>
        </form>        
    @endif
    {{ $slot }}
</x-mary-card>