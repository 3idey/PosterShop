@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">{{ $heading }}</h1>

    @if ($posters->isEmpty())
        <div class="text-indigo-600">No posters in this collection yet.</div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posters as $poster)
                <div class="bg-white rounded-2xl border border-indigo-100 overflow-hidden shadow-sm">
                    @if ($poster->image)
                        <x-poster-image :src="$poster->image" :alt="$poster->title" class="w-full h-56 object-cover" />
                    @endif
                    <div class="p-4">
                        <a href="{{ route('poster.show', $poster->slug) }}" class="font-bold text-indigo-700 hover:text-indigo-800">{{ $poster->title }}</a>
                        <div class="text-indigo-500">${{ number_format($poster->price, 2) }}</div>
                        <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
                            @csrf
                            <input type="hidden" name="slug" value="{{ $poster->slug }}">
                            <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Add to cart</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">{{ $posters->links() }}</div>
    @endif
@endsection
