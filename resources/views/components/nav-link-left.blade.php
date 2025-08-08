@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 space-x-2 hover:bg-gray-700 transition bg-gray-700 text-white font-semibold'
            : 'flex items-center px-4 py-2 space-x-2 hover:bg-gray-700 transition ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>