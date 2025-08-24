@extends('components.layout')

@section('content')
    <h1 class="text-3xl font-extrabold text-indigo-700 mb-6">My Profile</h1>
    <div class="space-y-2 text-indigo-700">
        <div><span class="font-semibold">Name:</span> {{ auth()->user()->name }}</div>
        <div><span class="font-semibold">Email:</span> {{ auth()->user()->email }}</div>
        <div><span class="font-semibold">Phone:</span> {{ auth()->user()->phone_number }}</div>
        <div><span class="font-semibold">City:</span> {{ auth()->user()->city }}</div>
        <div><span class="font-semibold">Address:</span> {{ auth()->user()->address }}</div>
    </div>
    <div class="mt-6">
        <a href="{{ route('profile.edit') }}" class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Edit Profile</a>
    </div>
@endsection
