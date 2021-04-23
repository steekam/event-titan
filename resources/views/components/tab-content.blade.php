@props(['id'])

<x-container class="py-6"
    x-show="active == '{{ $id }}'" x-cloak>
    {{ $slot }}
</x-container>
