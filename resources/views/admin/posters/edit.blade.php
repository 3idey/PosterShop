@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Edit Poster</h1>
    <form method="POST" action="{{ route('admin.posters.update', $poster) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-indigo-700">Title</label>
            <input name="title" value="{{ old('title', $poster->title) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Slug</label>
            <input name="slug" value="{{ old('slug', $poster->slug) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('slug') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $poster->price) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('price') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Category</label>
            <select name="category" class="w-full rounded-lg border border-indigo-200 px-3 py-2">
                @foreach (['films','sports','randoms'] as $cat)
                    <option value="{{ $cat }}" @selected(old('category', $poster->category) === $cat)>{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
            @error('category') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Description</label>
            <textarea name="description" class="w-full rounded-lg border border-indigo-200 px-3 py-2">{{ old('description', $poster->description) }}</textarea>
            @error('description') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Image</label>
            @if ($poster->image)
                <x-poster-image :src="$poster->image" :alt="$poster->title" class="w-32 h-32 object-cover rounded mb-2" />
            @endif
            <input type="file" name="image" class="w-full" />
            @error('image') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="flex gap-2">
            <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Update</button>
            <form method="POST" action="{{ route('admin.posters.destroy', $poster) }}" onsubmit="return confirm('Delete this poster?')">
                @csrf
                @method('DELETE')
                <button class="rounded-xl bg-red-500 text-white px-4 py-2 hover:bg-red-600">Delete</button>
            </form>
        </div>
    </form>
@endsection
