@props(['minDate', 'defaultDate'])

<div wire:ignore>
    <input
        {{
            $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'])
        }}

        type="text"
        x-data
        x-init="
            flatpickr($el, {
                enableTime: true,
                dateFormat: 'F j, Y H:i',
                altInput: true,
                altFormat: 'F j, Y H:i',
                minDate: '{{ $minDate ?? null }}',
                defaultDate: '{{ $defaultDate ?? null }}',
            })
        "
    />
</div>
