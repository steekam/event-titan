@props(['minDate', 'defaultDate'])

<input
    {{
        $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm'])
    }}

    type="text"
    x-data="{
        initPicker() {
            flatpickr($el, {
                enableTime: true,
                dateFormat: 'F j, Y H:i',
                altInput: true,
                altFormat: 'F j, Y H:i',
                minDate: '{{ $minDate ?? null }}',
                defaultDate: '{{ $defaultDate ?? null }}',
            })

            // Add wire:ignore to rendered input element
            console.log($el.nextElementSibling)
        }
    }"
    x-init="initPicker"
/>
