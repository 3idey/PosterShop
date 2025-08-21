@extends('components.layout')

@section('content')
<div class="space-y-6">
  <div class="flex items-center justify-between">
    <h1 class="text-3xl font-extrabold text-indigo-700">Admin • Posters</h1>
    <a href="/" class="text-indigo-600 hover:text-indigo-800">Back to site</a>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($posters as $slug => $p)
      <div class="bg-white rounded-2xl shadow overflow-hidden">
        <img src="{{ \Illuminate\Support\Facades\Vite::asset($p['image']) }}" alt="{{ $p['title'] }}" class="w-full h-48 object-cover">
        <div class="p-4">
          <div class="font-bold text-indigo-700">{{ $p['title'] }}</div>
          <div class="text-indigo-500 text-sm mt-1">Slug: <code>{{ $slug }}</code></div>
          <div class="mt-3 flex gap-2">
            <a href="{{ route('admin.posters.show', $slug) }}" class="text-sm text-indigo-600 hover:text-indigo-800">Manage</a>
            <a href="{{ route('poster.show', $slug) }}" class="text-sm text-gray-600 hover:text-gray-800">View</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>
@endsection

