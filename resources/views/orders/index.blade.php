@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">My Orders</h1>

    @if ($orders->isEmpty())
        <div class="text-indigo-600">You have no orders yet.</div>
    @else
        <div class="space-y-4">
            @foreach ($orders as $order)
                <div class="bg-white rounded-xl border border-indigo-100 p-4 flex items-center justify-between">
                    <div>
                        <div class="font-semibold text-indigo-700">Order #{{ $order->id }}</div>
                        <div class="text-sm text-indigo-500">Status: {{ ucfirst($order->status) }} • Items: {{ $order->items_count }}</div>
                    </div>
                    <div class="font-bold text-indigo-700">${{ number_format($order->total, 2) }}</div>
                    <a href="{{ route('orders.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-800">View</a>
                </div>
            @endforeach
        </div>
        <div class="mt-6">{{ $orders->links() }}</div>
    @endif
@endsection
