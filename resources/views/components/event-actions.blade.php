@props(['event'])

<div
    {{ $attributes->merge(['class' => 'flex flex-shrink-0 space-x-2 text-sm whitespace-nowrap' ])}}>
    <a href="{{ route('events.edit', $event->id) }}" class="font-medium text-blue-400 transition hover:text-blue-500 hover:underline">
        Edit
    </a>
    {{-- TODO: DeleteEventComponent --}}
    <a href="#" class="font-medium text-blue-400 transition hover:text-blue-500 hover:underline">
        Delete
    </a>
</div>
