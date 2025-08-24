@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Order #{{ $order->id }}</h1>
    <div class="text-indigo-600">Status: {{ ucfirst($order->status) }}</div>

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
@endsection
