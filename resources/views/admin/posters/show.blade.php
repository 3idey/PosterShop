@extends('components.layout')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
  <div class="bg-white rounded-2xl shadow overflow-hidden">
    @if ($poster->image)
<img src="{{ asset($poster->image) }}" alt="{{ $poster->title }}" class="w-full h-[420px] object-cover">
    @endif
  </div>
  <div>
    <h1 class="text-3xl font-extrabold text-indigo-700">Manage: {{ $poster->title }}</h1>
    <div class="mt-2 text-indigo-500">Slug: <code>{{ $poster->slug }}</code></div>
    <div class="mt-4">
      <div class="text-gray-600">Price</div>
      <div class="text-xl font-semibold text-indigo-700">${{ number_format($poster->price, 2) }}</div>
    </div>
    <p class="mt-6 text-gray-600 leading-relaxed">{{ $poster->description }}</p>

    <div class="mt-8 flex items-center gap-3">
      <a href="{{ route('admin.posters.edit', $poster) }}" class="text-indigo-600 hover:text-indigo-800">Edit</a>
      <a href="{{ route('poster.show', $poster->slug) }}" class="text-indigo-600 hover:text-indigo-800">View on site</a>
      <a href="{{ route('admin.posters.index') }}" class="text-gray-600 hover:text-gray-800">Back to list</a>
    </div>
  </div>
</div>
@endsection

