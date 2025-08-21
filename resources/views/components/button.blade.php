@props(['name', 'href' => null, 'attributes' => [], 'type' => 'submit'])

@php
    $base = 'inline-flex items-center justify-center px-4 py-2 rounded-xl font-semibold shadow-sm transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2';
    $primary = 'bg-indigo-600 text-white hover:bg-indigo-700 focus:ring-indigo-400';
    $secondary = 'bg-white text-indigo-700 border border-indigo-200 hover:bg-indigo-50 focus:ring-indigo-200';
    $danger = 'bg-red-500 text-white hover:bg-red-600 focus:ring-red-300';
@endphp

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => $base.' '.$primary.' text-center']) }}>
        {{ $name }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => $base.' '.$primary]) }}>
        {{ $name }}
    </button>
@endif
