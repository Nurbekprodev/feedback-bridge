@props([
    'type' => 'primary'
])

@php
    $base = 'px-4 py-2 rounded-xl text-sm font-medium transition';

    $styles = match($type) {
        'primary' => 'bg-black text-white hover:bg-gray-800',
        'secondary' => 'bg-gray-100 text-gray-800 hover:bg-gray-200',
        'danger' => 'bg-red-500 text-white hover:bg-red-600',
        default => 'bg-black text-white'
    };
@endphp

<button {{ $attributes->merge(['class' => "$base $styles"]) }}>
    {{ $slot }}
</button>