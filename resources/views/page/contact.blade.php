<x-page-layout :pages="$pages">
    <section class="h-screen py-4 lg:py-12" style="background-color: rgb(224, 244, 255)">
        <x-mary-card class="max-w-6xl mx-auto bg-white border shadow-lg">
            <h2 class="text-4xl text-center font-bold">Contact Us</h2>
            <div class="mt-8 space-y-8">
                <form action="maillto:{{ config('mail.from.address') }}" class="space-y-4">
                    <x-mary-input label="Name" placeholder="Full Name" name="name"/>
                    <x-mary-input label="Subject" placeholder="Subject" name="subject"/>
                    <x-mary-textarea label="Message" placeholder="Message" name="message"/>
                    <x-mary-button class="btn-primary" type="submit">Send</x-mary-button>
                </form>
            </div>
        </x-mary-card>
    </section>
</x-page-layout>