<x-app-layout>
    <x-slot name="pageTitle">{{ $event->title }}</x-slot>

    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            Edit Event
        </h2>
    </x-slot>

    <livewire:event-management :event="$event" />
</x-app-layout>
