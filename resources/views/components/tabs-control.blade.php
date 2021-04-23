@props(['options'])

<div>
    <x-container class="py-3 sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select id="tabs" name="tabs" x-model="active"
            class="block w-full py-2 pl-3 pr-10 text-base border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @foreach ($options as $option)
                <option value="{{ Str::kebab($option) }}">{{ $option }}</option>
            @endforeach
        </select>
    </x-container>

    <div class="hidden sm:block">
        <x-container class="border-b border-gray-200">
            <nav class="flex -mb-px space-x-8" aria-label="Tabs">
                @foreach ($options as $option)
                    <x-tab-link target="{{ Str::kebab($option) }}">
                        {{ $option }}
                    </x-tab-link>
                @endforeach
            </nav>
        </x-container>
    </div>
</div>
