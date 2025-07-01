@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-bold text-base text-blue-700 mb-1']) }}>
    {{ $value ?? $slot }}
</label>
