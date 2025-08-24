@extends('components.layout')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-3xl font-extrabold text-indigo-700">Admin • Posters</h1>
    <div class="flex items-center gap-3">
      <a href="{{ route('admin.posters.create') }}" class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">New Poster</a>
      <a href="/" class="text-indigo-600 hover:text-indigo-800">Back to site</a>
  </div>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posters as $poster)
      <div class="bg-white rounded-2xl shadow overflow-hidden">
        @if ($poster->image)
            <x-poster-image :src="$poster->image" :alt="$poster->title" class="w-full h-48 object-cover" />
        @endif
        <div class="p-4">
          <div class="font-bold text-indigo-700">{{ $poster->title }}</div>
          <div class="text-indigo-500 text-sm mt-1">Slug: <code>{{ $poster->slug }}</code></div>
          <div class="text-indigo-500 text-sm mt-1">Price: ${{ number_format($poster->price, 2) }}</div>
          <div class="mt-3 flex gap-2">
            <a href="{{ route('admin.posters.edit', $poster) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
            <a href="{{ route('poster.show', $poster->slug) }}" class="text-sm text-gray-600 hover:text-gray-800">View</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

  <div class="mt-6">{{ $posters->links() }}</div>
</div>
@endsection

