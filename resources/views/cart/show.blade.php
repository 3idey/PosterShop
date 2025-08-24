@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Your Cart</h1>

    @if ($cart->items->isEmpty())
        <div class="text-indigo-600">Your cart is empty.</div>
    @else
        <div class="space-y-4">
            @foreach ($cart->items as $item)
                <div class="flex items-center justify-between bg-white rounded-xl border border-indigo-100 p-4">
                    <div class="flex items-center gap-4">
                        @if ($item->poster && $item->poster->image)
                            <x-poster-image :src="$item->poster->image" :alt="$item->poster->title" class="w-16 h-16 object-cover rounded-lg" />
                        @endif
                        <div>
                            <div class="font-semibold text-indigo-700">{{ $item->poster->title }}</div>
                            <div class="text-sm text-indigo-500">${{ number_format($item->price, 2) }}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <form method="POST" action="{{ route('cart.update') }}" class="flex items-center gap-2">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="poster_id" value="{{ $item->poster_id }}">
                            <input type="number" name="qty" value="{{ $item->qty }}" min="1" class="w-20 rounded-lg border border-indigo-200 px-2 py-1">
                            <button class="rounded-lg bg-indigo-600 text-white px-3 py-1 hover:bg-indigo-700">Update</button>
                        </form>
                        <form method="POST" action="{{ route('cart.remove') }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="poster_id" value="{{ $item->poster_id }}">
                            <button class="rounded-lg bg-red-500 text-white px-3 py-1 hover:bg-red-600">Remove</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex items-center justify-between">
            <div class="text-xl font-bold text-indigo-700">Total: ${{ number_format($total, 2) }}</div>
            <div class="flex items-center gap-3">
                <form method="POST" action="{{ route('cart.clear') }}">
                    @csrf
                    @method('DELETE')
                    <button class="rounded-xl bg-gray-200 text-gray-700 px-4 py-2 hover:bg-gray-300">Clear Cart</button>
                </form>
                <a href="{{ route('checkout.show') }}" class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Checkout</a>
            </div>
        </div>
    @endif
@endsection
