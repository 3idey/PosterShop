@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Order Confirmed</h1>
    <p class="text-indigo-600">Thanks! Your order #{{ $order->id }} has been placed.</p>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-indigo-700 mb-2">Items</h2>
        <ul class="space-y-2">
            @foreach ($order->items as $item)
                <li class="flex justify-between">
                    <span>{{ $item->title_snapshot }} × {{ $item->qty }}</span>
                    <span>${{ number_format($item->price * $item->qty, 2) }}</span>
                </li>
            @endforeach
        </ul>
        <div class="mt-2 text-right font-bold text-indigo-700">Total: ${{ number_format($order->total, 2) }}</div>
    </div>

    <div class="mt-6">
        <a class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700" href="{{ route('orders.index') }}">View Orders</a>
        <a class="ml-2 text-indigo-700 hover:text-indigo-900" href="/">Continue shopping</a>
    </div>
@endsection
