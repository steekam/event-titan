<x-app-layout>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Dashboard
                </h2>
            </div>
            <div class="flex mt-4 md:mt-0 md:ml-4">
                <x-primary-button-link href="{{ route('events') }}">
                    New Event
                    <x-heroicon-o-plus class="w-5 h-5 ml-2 -mr-1" />
                </x-primary-button-link>
            </div>
        </div>
    </x-slot>

    <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if(session()->has("success"))
            <x-success-alert class="w-full mb-4 sm:max-w-3xl">
                {{ session("success") }}
            </x-success-alert>
        @endif

        @livewire('event-lists')
    </div>
</x-app-layout>
