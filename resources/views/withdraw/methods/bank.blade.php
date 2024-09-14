<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Bank Withdrawal') }}
        </h2>
    </x-slot>

<section class="py-12">
    <x-mary-card class="max-w-2xl mx-auto">
        <form action="{{ route('withdraws.store') }}" method="POST" class="space-y-4">
            @csrf
            <x-mary-input type="hidden" wire:model='type' name="type" value="bank"/>
            <x-mary-input placeholder="Bank Name" label="Bank Name" wire:model='bank' name="bank" :value="old('bank')"/>
            <x-mary-input placeholder="Account Name" label="Account Name" wire:model='name' name="name" :value="old('name')"/>
            <x-mary-input placeholder="Account Number" label="Account Number" wire:model='number' name="number" :value="old('number')"/>
  
            <div class="pt-8 space-y-4">
                <x-mary-select label="Accounts" :options="$accounts" wire:model='wallet' name="wallet" :selected="old('wallet')"/>
                <x-mary-input placeholder="Amount" label="Amount" wire:model='amount' name="amount" :value="old('amount')"/>
            </div>
            <x-mary-button type="submit" class="btn-primary">Confirm</x-mary-button>
            <x-mary-button class="btn-ghost" :link="route('withdraws.create')">Cancel</x-mary-button>
        </form>
    </x-mary-card>
</section>
</x-app-layout>