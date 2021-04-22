<a
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-xs uppercase font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500'
        ]) }} >

    {{ $slot }}
</a>
