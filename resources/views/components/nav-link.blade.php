@props(['active'])

@php
$classes = ($active ?? false)
    ? 'inline-flex items-center px-4 py-2 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold shadow-md transition'
    : 'inline-flex items-center px-4 py-2 rounded-xl text-gray-700 hover:bg-blue-100 hover:text-blue-700 font-bold transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
