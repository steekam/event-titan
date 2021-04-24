@props(['event'])

<li
    class="relative px-4 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
    <div class="flex justify-between space-x-3">
        <div class="flex-1 min-w-0">
            <a href="{{ route('events.show', $event->id) }}" class="block focus:outline-none group">
                <p class="text-sm font-medium text-gray-900 truncate group-hover:text-indigo-500">{{ $event->title }}
                </p>
                <p class="text-sm text-gray-500 uppercase">
                    <time datetime="{{ $event->start_datetime }}">{{ $event->start_datetime_display }}</time> -
                    <time datetime="{{ $event->end_datetime }}">{{ $event->end_datetime_display }}</time>
                </p>
            </a>
        </div>

        @can('manageEvent', $event)
        <x-event-actions :event="$event" />
        @endcan
    </div>
    <div class="mt-1">
        <p class="text-sm text-gray-600 line-clamp-3">
            {{ $event->description }}
        </p>
    </div>
</li>
