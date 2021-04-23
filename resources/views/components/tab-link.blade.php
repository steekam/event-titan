@props(['target'])

<a
    {{ $attributes->merge(['class' => 'px-1 py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-gray-300 whitespace-nowrap' ]) }}
    href="#{{ $target }}"
    x-bind:class="{'border-indigo-500 text-indigo-600': (active == '{{ $target }}')}"
    @click.prevent="active = '{{ $target }}'"
    >
    {{ $slot }}
</a>
