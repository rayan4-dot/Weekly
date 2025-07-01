@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-base text-red-700 space-y-2 bg-red-100 border border-red-300 rounded-xl px-4 py-2 mt-2']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
