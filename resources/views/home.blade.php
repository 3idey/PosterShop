@extends('components.layout')

@section('full')
    <div class="flex flex-col items-center justify-center text-center py-10 w-full mx-auto">
        <h1 class="text-5xl font-extrabold text-indigo-700 mb-4 tracking-tight drop-shadow-lg">Welcome to PosterShop</h1>
        <p class="text-xl text-indigo-500 mb-8 max-w-2xl">Discover, collect, and share creative posters from artists and
            fans around the world. Your poster gallery starts here!</p>
        <a href="/collections/films"
            class="inline-block bg-gradient-to-r from-indigo-600 to-blue-500 text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:from-indigo-700 hover:to-blue-600 transition-all text-lg font-semibold mb-12">Browse
            Collections</a>

        <div class="grid w-full gap-6 sm:gap-8 mt-8 grid-cols-[repeat(auto-fill,minmax(220px,1fr))] sm:grid-cols-[repeat(auto-fill,minmax(260px,1fr))] xl:grid-cols-[repeat(auto-fill,minmax(280px,1fr))]">
            @foreach (($posters ?? config('posters')) as $slug => $p)
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-indigo-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                    <a href="{{ route('poster.show', ['slug' => $slug]) }}" class="block">
                        <div class="h-80 bg-gray-50 flex items-center justify-center overflow-hidden">
                            <img src="{{ \Illuminate\Support\Facades\Vite::asset($p['image']) }}" alt="{{ $p['title'] }}" class="object-cover w-full h-full rounded-t-3xl">
                        </div>
                    </a>
                    <div class="p-4 flex flex-col items-center">
                        <h2 class="text-lg font-bold text-indigo-700">{{ $p['title'] }}</h2>
                        @if (!empty($p['description']))
                            <p class="text-gray-500 mb-2 line-clamp-2">{{ $p['description'] }}</p>
                        @endif
                        <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                            @csrf
                            <input type="hidden" name="poster" value="{{ $slug }}">
                            <x-button name="Add to Cart" type="submit" class="mt-2 w-full" />
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
@endsection
