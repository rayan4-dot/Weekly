@props(['active'])

@php
$classes = ($active ?? false)
    ? 'block w-full ps-4 pe-5 py-3 rounded-xl bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold shadow-md transition'
    : 'block w-full ps-4 pe-5 py-3 rounded-xl text-gray-700 hover:bg-blue-100 hover:text-blue-700 font-bold transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
