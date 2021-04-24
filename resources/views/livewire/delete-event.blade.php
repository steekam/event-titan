<div>
    <a href="#"
        wire:click.prevent="$toggle('confirmingEventDeletion')"
        class="font-medium text-blue-400 transition hover:text-blue-500 hover:underline">
        Delete
    </a>

    <!-- Delete Event Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingEventDeletion">
        <x-slot name="title">
            Delete Event
        </x-slot>

        <x-slot name="content">
            <p class="text-gray-600 whitespace-normal">
                Are you sure you want to delete <span class="font-semibold text-gray-800">{{ $event->title }}</span>? Once deleted, it cannot be reverted.
            </p>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingEventDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteEvent" wire:loading.attr="disabled">
                {{ __('Delete Event') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

