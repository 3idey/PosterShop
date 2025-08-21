@props(['type' => 'info', 'message' => ''])
@php
    $colors = [
        'success' => 'bg-green-50 text-green-700 border-green-200',
        'error' => 'bg-red-50 text-red-700 border-red-200',
        'info' => 'bg-blue-50 text-blue-700 border-blue-200',
        'warning' => 'bg-yellow-50 text-yellow-800 border-yellow-200',
    ];
    $classes = $colors[$type] ?? $colors['info'];
@endphp
<div class="container mx-auto px-4">
    <div class="my-4 border {{ $classes }} rounded-xl px-4 py-3 shadow-sm">
        {{ $message }}
    </div>
</div>
