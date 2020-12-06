<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <x-jet-action-section>
                    <x-slot name="title">
                        {{ __('Site Info') }}
                    </x-slot>
                    <x-slot name="description">
                        {{ __('Here you can set your information of site.') }}
                    </x-slot>
                    <x-slot name="content">
                        @livewire('site-settings')
                    </x-slot>
                </x-jet-action-section>
            </div>
        </div>
</x-app-layout>
