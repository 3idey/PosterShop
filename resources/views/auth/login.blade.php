@extends('components.layout')

@section('content')
    <div class="flex justify-center items-center min-h-[60vh]">
        <div class="w-full max-w-md bg-white/90 shadow-2xl rounded-2xl p-10 border border-indigo-100">
            <h1 class="text-4xl font-extrabold mb-8 text-center text-indigo-700 tracking-tight">Sign In</h1>
            <form method="POST" action="/login" class="space-y-6">
                @csrf
                <div>
                    <label for="login" class="block text-base font-medium text-indigo-700">Email or Phone Number</label>
                    <input type="text" name="login" id="login" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        value="{{ old('login') }}" placeholder="Enter your email or phone">
                    @error('login')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-base font-medium text-indigo-700">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-2 block w-full px-4 py-3 border border-indigo-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-indigo-400 bg-indigo-50 text-indigo-900 placeholder-indigo-400"
                        placeholder="Enter your password">
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="pt-4">
                    <x-button name="Login" type="submit" class="w-full py-3 text-lg font-bold" />
                </div>
            </form>
        </div>
    </div>
@endsection
