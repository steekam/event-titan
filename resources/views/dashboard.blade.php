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

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <h1 class="text-2xl font-semibold">This space will should have some basic stats or overview.</h1>
        </div>
    </div>
</x-app-layout>
