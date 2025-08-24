@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">Edit Profile</h1>
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        <div>
            <label class="block text-indigo-700">Name</label>
            <input name="name" class="w-full rounded-lg border border-indigo-200 px-3 py-2" value="{{ old('name', auth()->user()->name) }}">
            @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Email</label>
            <input type="email" name="email" class="w-full rounded-lg border border-indigo-200 px-3 py-2" value="{{ old('email', auth()->user()->email) }}">
            @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Phone</label>
            <input name="phone_number" class="w-full rounded-lg border border-indigo-200 px-3 py-2" value="{{ old('phone_number', auth()->user()->phone_number) }}">
            @error('phone_number') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">City</label>
            <input name="city" class="w-full rounded-lg border border-indigo-200 px-3 py-2" value="{{ old('city', auth()->user()->city) }}">
            @error('city') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="block text-indigo-700">Address</label>
            <input name="address" class="w-full rounded-lg border border-indigo-200 px-3 py-2" value="{{ old('address', auth()->user()->address) }}">
            @error('address') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
        </div>
        <div class="pt-2">
            <button class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Save</button>
        </div>
    </form>
@endsection
