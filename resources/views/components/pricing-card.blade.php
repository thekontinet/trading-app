@props(['plan'])

<div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white shadow-lg">
    <h3 class="mb-4 text-2xl font-semibold">{{ $plan->name }}</h3>
    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">{{ $plan->description }}</p>
    <div class="flex justify-center items-baseline my-8">
        <span class="mr-2 text-3xl font-extrabold">{{ money($plan->price) }}</span>
        <span class="text-gray-500 dark:text-gray-400">/{{ $plan->interval }}</span>
    </div>
    <!-- List -->
    <ul role="list" class="mb-8 space-y-4 text-center">
        @foreach ($plan->features as $feature)
        <li class="flex justify-center items-center">
            <span>{{ $feature }}</span>
        </li>
        @endforeach
    </ul>
    <form action="{{ route('upgrade.store') }}" method="post" class="mt-4">
        @csrf
        <x-mary-button type="submit" name="plan_id" value="{{ $plan->id }}" class="btn-outline btn-primary w-full">Get Started</x-mary-button>
    </form>
</div>