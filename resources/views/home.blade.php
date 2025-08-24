@extends('components.layout')

@section('full')
    <!-- Hero Section -->
    <section class="relative overflow-hidden rounded-3xl">
        <div class="relative bg-gradient-to-r from-indigo-600 via-indigo-500 to-indigo-400 text-white rounded-3xl p-10 md:p-16 shadow-2xl">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight">Discover Posters You'll Love</h1>
                <p class="mt-4 text-indigo-100 text-lg md:text-xl">Browse curated collections of film, sports, and more. Add to cart and checkout in seconds.</p>
                <div class="mt-8 flex items-center gap-4">
                    <a href="#featured" class="inline-flex items-center gap-2 bg-white text-indigo-700 font-semibold px-5 py-3 rounded-xl shadow hover:bg-indigo-50">
                        Explore Featured
                    </a>
                    <a href="{{ route('poster.customize') }}" class="inline-flex items-center gap-2 bg-indigo-800/40 text-white font-semibold px-5 py-3 rounded-xl border border-white/30 hover:bg-indigo-800/60">
                        Customize a Poster
                    </a>
                </div>
            </div>
            <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-indigo-300/30 rounded-full blur-2xl"></div>
            <div class="absolute -right-24 top-0 w-72 h-72 bg-white/20 rounded-full blur-3xl"></div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-2xl p-6 border border-indigo-100 shadow-sm">
            <div class="text-indigo-600 font-bold">Curated Collections</div>
            <p class="mt-2 text-indigo-600/80">Hand-picked posters across films, sports, and more.</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-indigo-100 shadow-sm">
            <div class="text-indigo-600 font-bold">Fast Checkout</div>
            <p class="mt-2 text-indigo-600/80">Add to cart and complete your order in seconds.</p>
        </div>
        <div class="bg-white rounded-2xl p-6 border border-indigo-100 shadow-sm">
            <div class="text-indigo-600 font-bold">Quality Prints</div>
            <p class="mt-2 text-indigo-600/80">Premium-quality prints that make any wall pop.</p>
        </div>
    </section>

    <!-- Featured Posters -->
    <section id="featured" class="mt-12">
        <h2 class="text-2xl font-extrabold text-indigo-700">Featured Posters</h2>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @if(isset($featured) && $featured->count())
                @foreach ($featured as $p)
                    <div class="group bg-white rounded-2xl border border-indigo-100 overflow-hidden shadow-sm hover:shadow-md transition">
                        <a href="{{ route('poster.show', $p->slug) }}" class="block">
                            @if ($p->image)
                                <x-poster-image :src="$p->image" :alt="$p->title" class="w-full h-56 object-cover" />
                            @endif
                        </a>
                        <div class="p-4">
                            <a href="{{ route('poster.show', $p->slug) }}" class="font-bold text-indigo-700 group-hover:text-indigo-800">{{ $p->title }}</a>
                            <div class="text-indigo-500">${{ number_format($p->price, 2) }}</div>
                            <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
                                @csrf
                                <input type="hidden" name="slug" value="{{ $p->slug }}">
                                <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Add to cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                @php
                    $fallback = config('posters');
                @endphp
                @foreach ($fallback as $slug => $p)
                    <div class="group bg-white rounded-2xl border border-indigo-100 overflow-hidden shadow-sm hover:shadow-md transition">
                        <a href="{{ route('poster.show', $slug) }}" class="block">
                            <x-poster-image :src="$p['image']" :alt="$p['title']" class="w-full h-56 object-cover" />
                        </a>
                        <div class="p-4">
                            <a href="{{ route('poster.show', $slug) }}" class="font-bold text-indigo-700 group-hover:text-indigo-800">{{ $p['title'] }}</a>
                            <div class="text-indigo-500">${{ number_format($p['price'], 2) }}</div>
                            <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
                                @csrf
                                <input type="hidden" name="slug" value="{{ $slug }}">
                                <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Add to cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
@endsection
