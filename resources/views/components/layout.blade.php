<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav
            class="w-64 bg-gray-900 text-white flex flex-col items-center py-8 space-y-6 fixed left-0 top-0 h-full shadow-lg">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 px-4">
                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/fulllogo.png') }}" alt="logo"
                    class="w-40 h-40 object-cover  hover:scale-115 transition-transform duration-300 ease-in-out">
            </a>

            <!-- Navigation Links -->
            <ul class="w-full px-6 space-y-4 mt-1">
                <li><x-sidelink link="/">Home</x-sidelink></li>
                <li><x-sidelink link="#">Posters</x-sidelink></li>
                <li><x-sidelink link="#">Contact</x-sidelink></li>
                <li><x-sidelink link="/about">About</x-sidelink></li>

            </ul>
        </nav>

        {{ $slot ?? '' }}


    </div>
</body>
