@extends('components.layout')

@section('content')
<div class="space-y-6">
  <h1 class="text-3xl font-extrabold text-indigo-700">Your Cart</h1>
  @if (count($items) === 0)
    <div class="text-indigo-500">Your cart is empty.</div>
  @else
    <div class="bg-white rounded-2xl shadow p-4 sm:p-6">
      <ul class="divide-y divide-indigo-100">
        @foreach ($items as $i => $item)
          <li class="py-4 flex items-center gap-4">
            <img src="{{ \Illuminate\Support\Facades\Vite::asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-20 h-20 object-cover rounded-lg">
            <div class="flex-1">
              <a href="{{ route('poster.show', ['slug' => $item['slug']]) }}" class="text-lg font-semibold text-indigo-700 hover:text-indigo-800">{{ $item['title'] }}</a>
              <div class="text-indigo-500">${{ number_format($item['price'], 2) }}</div>
            </div>
            <form method="POST" action="{{ route('cart.remove') }}">
              @csrf
              <input type="hidden" name="index" value="{{ $i }}">
              <x-button name="Remove" type="submit" class="bg-red-500 hover:bg-red-600 text-white" />
            </form>
          </li>
        @endforeach
      </ul>
      <div class="mt-6 flex items-center justify-between">
        <div class="text-xl font-bold text-indigo-700">
          Total: ${{ number_format(collect($items)->sum('price'), 2) }}
        </div>
        <form method="POST" action="{{ route('cart.clear') }}">
          @csrf
          <x-button name="Clear Cart" type="submit" class="bg-red-500 hover:bg-red-600 text-white" />
        </form>
      </div>
    </div>
  @endif
  <div>
    <a href="/" class="text-indigo-600 hover:text-indigo-800">Continue browsing</a>
  </div>
</div>
@endsection
