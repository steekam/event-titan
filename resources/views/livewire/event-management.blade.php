<div>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
            Events
        </h2>
    </x-slot>


    <div class="px-4 py-12">
        <div class="max-w-2xl mx-auto bg-white rounded-md shadow-sm">
            <form wire:submit.prevent="create_event" class="flex flex-col gap-6">
                <div class="grid grid-cols-6 gap-6 px-6 py-4 sm:px-6 lg:px-8">
                    <!-- Title -->
                    <div class="col-span-6">
                        <x-jet-label for="title" value="Title" class="text-base" />
                        <x-jet-input id="title" type="text" class="block w-full mt-1" wire:model.defer="event.title" />
                        <x-jet-input-error for="event.title" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="col-span-6">
                        <x-jet-label for="description" value="Description" class="text-base" />
                        <textarea id="description" name="description" rows="3" wire:model.defer="event.description"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-300 focus:border-indigo-300"></textarea>
                        {{-- <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p> --}}
                        <x-jet-input-error for="event.description" class="mt-2" />
                    </div>

                    <!-- Start Datetime -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="start_datetime" value="Start Datetime" class="text-base" />
                        <x-datetime-input id="start_datetime" class="block w-full mt-1"
                            wire:model.defer="event.start_datetime" />
                        <x-jet-input-error for="event.start_datetime" class="mt-2" />
                    </div>

                    <!-- End Datetime -->
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="end_datetime" value="End Date" class="text-base" />
                        <x-datetime-input id="end_datetime" class="block w-full mt-1"
                            wire:model.defer="event.end_datetime" />
                        <x-jet-input-error for="event.end_datetime" class="mt-2" />
                    </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 text-right shadow bg-gray-50 sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    <x-primary-button type="submit" wire:loading.attr="disabled">
                        Create Event
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>
