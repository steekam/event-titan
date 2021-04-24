<div class="max-w-4xl rounded-md bg-gray-50" x-data='{ active: "my-events"}'>

    <x-tabs-control :options='["My Events", "Upcoming Events", "Booked Events"]' />

    <div>
        <x-tab-content id="my-events">
            @if($events->isEmpty())
            <x-container class="max-w-lg mx-auto text-center">
                <p class="text-lg font-medium">
                    You don't have any events.
                    <a href="{{ route('events.create') }}"
                        class="text-indigo-500 hover:underline hover:text-indigo-600">Create
                        one now.</a>
                </p>
            </x-container>
            @else
            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    @foreach ($events as $event)
                    <x-event-card :event="$event" />
                    @endforeach
                </ul>
            </div>
            @endif
        </x-tab-content>

        <x-tab-content id="upcoming-events">
            @if($upcoming_events->isEmpty())
            <x-container class="max-w-lg mx-auto text-center">
                <p class="text-lg font-medium">
                    There aren't any upcoming events.
                </p>
            </x-container>
            @else
            <div class="overflow-hidden bg-white shadow sm:rounded-md">
                <ul class="divide-y divide-gray-200">
                    @foreach ($upcoming_events as $event)
                    <x-event-card :event="$event" />
                    @endforeach
                </ul>
            </div>
            @endif
        </x-tab-content>

        <x-tab-content id="booked-events">
            <p>Booked events content</p>
        </x-tab-content>
    </div>
</div>
