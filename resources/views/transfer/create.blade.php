<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Transfer') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="grid gap-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-mary-form action="{{ route('transfers.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <x-mary-select label="From" :options="$accounts" wire:model='from' name="from"/>
                </div>

                <div>
                    <x-mary-select label="To" :options="$accounts" wire:model='to' name="to"/>
                </div>

                <div>
                    <x-mary-input label="Amount" placeholder="Amount" wire:model='amount' name="amount"/>
                </div>

                <div>
                    <x-mary-button type="submit" class="btn-primary">Proceed</x-mary-button>
                </div>
            </x-mary-form>
        </div>
    </div>
</x-app-layout>
