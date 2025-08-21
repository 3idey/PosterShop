@extends('components.layout')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
  <div class="bg-white rounded-2xl shadow overflow-hidden">
    <img src="{{ \Illuminate\Support\Facades\Vite::asset($poster['image']) }}" alt="{{ $poster['title'] }}" class="w-full h-[540px] object-cover">
  </div>
  <div>
    <h1 class="text-4xl font-extrabold text-indigo-700">{{ $poster['title'] }}</h1>
    <div class="mt-3 text-indigo-500">${{ number_format($poster['price'], 2) }}</div>
    <p class="mt-6 text-gray-600 leading-relaxed">{{ $poster['description'] }}</p>
    <form method="POST" action="{{ route('cart.add') }}" class="mt-8 max-w-sm">
      @csrf
      <input type="hidden" name="poster" value="{{ $poster['slug'] }}">
      <x-button name="Add to Cart" type="submit" class="w-full" />
    </form>
  </div>
</div>
@endsection
