<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Withdraw') }}
        </h2>
    </x-slot>

    <section class="pt-12">
        <x-mary-card class="max-w-lg mx-auto">
            <x-slot name="title">
                Send to
            </x-slot>
            <hr>
            <ul class="divide-y">
                <li class="flex justify-between items-center text-sm font-medium py-4 relative">
                    <span>Bank</span>
                    <img width="24" height="48" src="https://img.icons8.com/pulsar-gradient/48/bank-building.png" alt="bank-building"/>
                    <a class="absolute inset-0" href="{{ route('withdraws.create', ['method' => 'bank']) }}"><span class="sr-only">Bank</span></a>
                </li>
                <li class="flex justify-between items-center text-sm font-medium py-4 relative">
                    <span>Crypto</span>
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 48 48">
                        <path fill="#8097a2" d="M20.466,4.464L15.18,9.75l8.833,8.838l8.818-8.828l-5.296-5.296C26.558,3.488,25.279,3,24,3 C22.721,3,21.442,3.488,20.466,4.464z"></path><path fill="#37474f" d="M15.18,9.75L4.464,20.466C3.488,21.442,3,22.721,3,24c0,1.279,0.488,2.558,1.464,3.534l5.309,5.309 l14.24-14.255L15.18,9.75z"></path><path fill="#1565c0" d="M41.569 18.499L32.831 9.76 24.013 18.588 32.687 27.269z"></path><path fill="#90caf9" d="M43.536,20.466l-1.967-1.967l-8.882,8.77l5.555,5.559l5.293-5.293 c0.968-0.968,1.456-2.234,1.464-3.503C45.008,22.742,44.52,21.45,43.536,20.466z"></path><path fill="#03a9f4" d="M9.773,32.843l10.693,10.693C21.442,44.512,22.721,45,24,45c1.279,0,2.558-0.488,3.534-1.464 l10.708-10.708l-14.23-14.24L9.773,32.843z"></path>
                    </svg>
                    <a class="absolute inset-0" href="{{ route('withdraws.create', ['method' => 'crypto']) }}"><span class="sr-only">Bank</span></a>
                </li>
                <li class="flex justify-between items-center text-sm font-medium py-4 relative">
                    <span>Cashapp</span>
                    <img width="24" height="24" src="https://img.icons8.com/external-tal-revivo-color-tal-revivo/24/external-cashapp-instantly-send-money-between-friends-or-accept-card-payments-for-your-business-logo-color-tal-revivo.png" alt="external-cashapp-instantly-send-money-between-friends-or-accept-card-payments-for-your-business-logo-color-tal-revivo"/>
                    <a class="absolute inset-0" href="{{ route('withdraws.create', ['method' => 'cashapp']) }}"><span class="sr-only">Bank</span></a>
                </li>
            </ul>
        </x-mary-card>
    </section>
</x-app-layout>
