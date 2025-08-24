@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Create Poster</h1>
    <form method="POST" action="{{ route('admin.posters.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-indigo-700">Title</label>
            <input name="title" value="{{ old('title') }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('title') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Slug (optional)</label>
            <input name="slug" value="{{ old('slug') }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('slug') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', 0) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('price') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Category</label>
            <select name="category" class="w-full rounded-lg border border-indigo-200 px-3 py-2">
                <option value="films">Films</option>
                <option value="sports">Sports</option>
                <option value="randoms">Randoms</option>
            </select>
            @error('category') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Description</label>
            <textarea name="description" class="w-full rounded-lg border border-indigo-200 px-3 py-2">{{ old('description') }}</textarea>
            @error('description') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Image</label>
            <input type="file" name="image" class="w-full" />
            @error('image') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Create</button>
        </div>
    </form>
@endsection
