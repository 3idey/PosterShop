<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav
            class="w-64 bg-gray-900 text-white flex flex-col items-center py-8 space-y-6 fixed left-0 top-0 h-full shadow-lg">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 px-4 mb-6 ">
                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/whitelogo.png') }}" alt="logo"
                    class="w-55 h-55 object-cover  hover:scale-115 transition-transform duration-300 ease-in-out">
            </a>

            <!-- Navigation Links -->
            <ul class="w-full px-6 space-y-4 mb-6">
                <li><x-sidelink link="/">Home</x-sidelink></li>
                <li><x-sidelink link="#">Posters</x-sidelink></li>
                <li><x-sidelink link="#">Contact</x-sidelink></li>
                <li><x-sidelink link="/about">About</x-sidelink></li>

            </ul>
            <!-- Bottom user section -->
            <div class="mt-auto w-full px-4 pb-6">
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition-colors duration-300 ease-in-out">
                            Logout
                        </button>
                    </form>
                @else
                    <div class="ml-4 flex space-between space-x-6">
                        <x-button name="Login" href="/login" />
                        <x-button name="Register" href="/register" />
                    </div>
                @endauth
            </div>

        </nav>

        {{ $slot ?? '' }}


    </div>
</body>
