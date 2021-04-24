<div class="max-w-4xl rounded-md bg-gray-50" x-data='{ active: "my-events"}'>

    <x-tabs-control :options='["My Events", "Upcoming Events", "Booked Events"]' />

    <div>
        <x-tab-content id="my-events">
            @if($events->isEmpty())
            <x-container class="max-w-lg mx-auto text-center">
                <p class="text-lg font-medium">
                    You don't have any events.
                    <a href="{{ route('events') }}" class="text-indigo-500 hover:underline hover:text-indigo-600">Create
                        one now.</a>
                </p>
            </x-container>
            @else
            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    @foreach ($events as $event)
                    <li
                        class="relative px-4 py-5 bg-white hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                        <div class="flex justify-between space-x-3">
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('events.show', $event->id) }}" class="block focus:outline-none group">
                                    <p class="text-sm font-medium text-gray-900 truncate group-hover:text-indigo-500">{{ $event->title }}</p>
                                    <p class="text-sm text-gray-500 uppercase">
                                        <time datetime="{{ $event->start_datetime }}">{{ $event->start_datetime->format("F j, Y H:i") }}</time> -
                                        <time datetime="{{ $event->end_datetime }}">{{ $event->end_datetime->format("F j, Y H:i") }}</time>
                                    </p>
                                </a>
                            </div>

                            <x-event-actions :event="$event" />
                        </div>
                        <div class="mt-1">
                            <p class="text-sm text-gray-600 line-clamp-2">
                                {{ $event->description }}
                            </p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </x-tab-content>

        <x-tab-content id="upcoming-events">
            <p>Upcoming events content</p>
        </x-tab-content>

        <x-tab-content id="booked-events">
            <p>Booked events content</p>
        </x-tab-content>
    </div>
</div>
