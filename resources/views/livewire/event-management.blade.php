<div>
    <x-slot name="header">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
              <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Events
              </h2>
            </div>
            <div class="flex mt-4 md:mt-0 md:ml-4">
                <x-primary-button wire:click="$toggle('showFormModal')">
                    New Event
                    <x-heroicon-o-plus class="w-5 h-5 ml-2 -mr-1"/>
                </x-primary-button>
            </div>
          </div>
    </x-slot>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <p>Events list</p>
            <p>Create and edit form should pop up in modal</p>
        </div>
    </div>

    {{-- Event form modal --}}
    <x-jet-dialog-modal maxWidth="xl" wire:model="showFormModal">
        <x-slot name="title">
            New Event
        </x-slot>

        <x-slot name="content">
            hey there :)
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showFormModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-primary-button class="ml-2" wire:loading.attr="disabled">
                {{ __('Create event') }}
            </x-primary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
