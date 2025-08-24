@props(['src', 'alt' => '', 'class' => ''])
@php
    $isResourcePath = is_string($src) && str_starts_with($src, 'resources/');
    $resolved = $isResourcePath ? \Illuminate\Support\Facades\Vite::asset($src) : asset($src);
@endphp
<img src="{{ $resolved }}" alt="{{ $alt }}" class="{{ $class }}">
