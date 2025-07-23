@props(['name', 'href' => null, 'attributes' => [], 'type' => 'submit'])

@if ($href)
    <a href="{{ $href }}"
        {{ $attributes->merge(['class' => 'bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-300 ease-in-out inline-block text-center']) }}>
        {{ $name }}
    </a>
@else
    <button type="{{ $type }}"
        {{ $attributes->merge(['class' => 'bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-300 ease-in-out']) }}>
        {{ $name }}
    </button>
@endif
