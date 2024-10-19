<x-mary-button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary']) }}>
    {{ $slot }}
</x-mary-button>
