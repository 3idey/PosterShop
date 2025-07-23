<x-header title="Login" />
<x-layout>

    <div class=" mr-10 container mx-auto mt-10 p-6 mb-15 bg-white shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-4 text-center">Login</h1>
        <form method="POST" action="/login" class="space-y-6">
            @csrf
            <div>
                <label for="login" class="block text-sm font-medium text-gray-700">Email or Phone Number</label>
                <input type="text" name="login" id="login" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    value="{{ old('login') }}">
                @error('login')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <x-button name="Login" type="submit" />
        </form>
    </div>

</x-layout>
<x-footer />
