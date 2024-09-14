<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Cashapp Withdrawal') }}
        </h2>
    </x-slot>

<section class="py-12">
    <x-mary-card class="max-w-2xl mx-auto">
        <form action="{{ route('withdraws.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-mary-input type="hidden" wire:model='type' name="type" value="cashapp"/>
            <x-mary-select label="Accounts" :options="$accounts" wire:model='wallet' name="wallet" :selected="old('wallet')"/>
            <x-mary-input placeholder="Cashapp Tag" label="Tag" wire:model='tag' name="tag" :value="old('tag')"/>
            <x-mary-input placeholder="Amount" label="Amount" wire:model='amount' name="amount" :value="old('amount')"/>
  
            <x-mary-button type="submit" class="btn-primary">Confirm</x-mary-button>
            <x-mary-button class="btn-ghost" :link="route('withdraws.create')">Cancel</x-mary-button>
        </form>
    </x-mary-card>
</section>
</x-app-layout>