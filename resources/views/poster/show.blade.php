@extends('components.layout')

@section('content')
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <x-poster-image :src="$poster['image']" :alt="$poster['title']" class="w-full h-[420px] object-cover" />
        </div>
        <div>
            <h1 class="text-3xl font-extrabold text-indigo-700">{{ $poster['title'] }}</h1>
            <div class="mt-2 text-indigo-500">Slug: <code>{{ $poster['slug'] }}</code></div>
            <div class="mt-4">
                <div class="text-gray-600">Price</div>
                <div class="text-xl font-semibold text-indigo-700">${{ number_format($poster['price'], 2) }}</div>
            </div>
            <p class="mt-6 text-gray-600 leading-relaxed">{{ $poster['description'] }}</p>

            <form method="POST" action="{{ route('cart.add') }}" class="mt-6 flex items-center gap-3">
                @csrf
                <input type="hidden" name="slug" value="{{ $poster['slug'] }}">
                <input type="number" name="qty" value="1" min="1" class="w-24 rounded-lg border border-indigo-200 px-3 py-2">
                <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Add to cart</button>
            </form>
        </div>
    </div>
@endsection
