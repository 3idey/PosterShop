@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Checkout</h1>

    <div class="mb-6">
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">Order Summary</h2>
        <ul class="space-y-2">
            @foreach ($cart->items as $item)
                <li class="flex justify-between">
                    <span>{{ $item->poster->title }} × {{ $item->qty }}</span>
                    <span>${{ number_format($item->price * $item->qty, 2) }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 text-right font-bold text-indigo-700">Total: ${{ number_format($cart->total(), 2) }}</div>
    </div>

    <form method="POST" action="{{ route('checkout.store') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        <div>
            <label class="block text-indigo-700">Full Name</label>
            <input name="shipping_name" value="{{ old('shipping_name', auth()->user()->name) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('shipping_name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Phone</label>
            <input name="shipping_phone" value="{{ old('shipping_phone', auth()->user()->phone_number) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('shipping_phone') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">City</label>
            <input name="shipping_city" value="{{ old('shipping_city', auth()->user()->city) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('shipping_city') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Address</label>
            <input name="shipping_address" value="{{ old('shipping_address', auth()->user()->address) }}" class="w-full rounded-lg border border-indigo-200 px-3 py-2" />
            @error('shipping_address') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="md:col-span-2 mt-4">
            <button class="rounded-xl bg-indigo-600 text-white px-6 py-3 hover:bg-indigo-700">Place Order</button>
        </div>
    </form>
@endsection
