<x-app-layout>
    <x-slot name="pageTitle">{{ $event->title }}</x-slot>

    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $event->title }}
                </h2>
            </div>
            <div class="flex mt-4 md:mt-0 md:ml-4">
                <x-primary-button-link href="{{ route('events.create') }}">
                    Book Ticket
                    <x-heroicon-o-ticket class="w-5 h-5 ml-2 -mr-1" />
                </x-primary-button-link>
            </div>
        </div>
    </x-slot>

    <x-container class="flex items-center justify-center py-6">
        <x-container class="max-w-3xl py-3 mx-auto bg-white rounded-md shadow">
            <div class="flex flex-col space-y-1 sm:space-y-0 sm:flex-row sm:justify-between sm:space-x-3">
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-gray-500 uppercase">
                        <time datetime="{{ $event->start_datetime }}">{{ $event->start_datetime_display }}</time> -
                        <time datetime="{{ $event->end_datetime }}">{{ $event->end_datetime_display }}</time>
                    </p>
                    <p class="text-2xl font-medium text-gray-900">{{ $event->title }}</p>
                    <p class="mt-1 text-sm text-gray-500 uppercase">
                        Hosted by: {{ $event->owner->name }}
                    </p>
                </div>

                @can('manageEvent', $event)
                    <x-event-actions :event="$event" />
                @endcan
            </div>
            <div class="mt-2">
                <p class="text-lg text-gray-700">
                    {{ $event->description }}
                </p>
            </div>
        </x-container>
    </x-container>
</x-app-layout>
