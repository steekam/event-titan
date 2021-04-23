<div
    class="rounded-md bg-gray-50"
    x-data='{ active: "my-events"}'>

    <x-tabs-control :options='["My Events", "Upcoming Events", "Booked Events"]' />

    {{-- Tabs Content --}}
    <div>
        <x-tab-content id="my-events">
            <p>My events content</p>
        </x-tab-content>

        <x-tab-content id="upcoming-events">
            <p>Upcoming events content</p>
        </x-tab-content>

        <x-tab-content id="booked-events">
            <p>Booked events content</p>
        </x-tab-content>
    </div>
</div>
