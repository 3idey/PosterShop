@extends('components.layout')

@section('content')
    <div class="flex justify-center items-center min-h-[60vh]">
        <div class="w-full max-w-lg bg-white/90 shadow-2xl rounded-2xl p-10 border border-indigo-100">
            <h1 class="text-4xl font-extrabold mb-8 text-center text-indigo-700 tracking-tight">Create Your Account</h1>
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-base font-medium text-indigo-700">Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('name') }}" placeholder="Your full name">
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-base font-medium text-indigo-700">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('email') }}" placeholder="you@email.com">
                    @error('email')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="phone_number" class="block text-base font-medium text-indigo-700">Phone</label>
                    <input type="tel" name="phone_number" id="phone_number" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('phone_number') }}" placeholder="e.g. 0123456789">
                    @error('phone_number')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="city" class="block text-base font-medium text-indigo-700">City</label>
                    <input type="text" name="city" id="city" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('city') }}" placeholder="Your city">
                    @error('city')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="address" class="block text-base font-medium text-indigo-700">Address</label>
                    <input type="text" name="address" id="address" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('address') }}" placeholder="Street, Building, etc.">
                    @error('address')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-base font-medium text-indigo-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        placeholder="Choose a strong password">
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-base font-medium text-indigo-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        placeholder="Re-enter your password">
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pt-4">
                    <x-button name="Register" type="submit" class="w-full py-3 text-lg font-bold" />
                </div>
            </form>
        </div>
    </div>
@endsection
