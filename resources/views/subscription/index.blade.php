<x-app-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Choose a Plan</h2>
                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Explore our range of investment plans tailored to meet your financial objectives.</p>
            </div>
            @error('error')
            <x-mary-alert class="max-w-sm mx-auto my-4 alert-error">
                {{ $message }}
            </x-mary-alert>
            @enderror
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                @foreach ($plans as $plan)
                    <!-- Pricing Card -->
                    <x-pricing-card :plan="$plan"/>
                @endforeach
            </div>
        </div>
      </section>
</x-app-layout>