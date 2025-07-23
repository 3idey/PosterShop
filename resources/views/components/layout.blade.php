<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <nav
            class="w-64 bg-gray-900 text-white flex flex-col items-center py-8 space-y-6 fixed left-0 top-0 h-full shadow-lg">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3">
                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/logo.png') }}" alt="logo"
                    class="w-14 h-14 object-contain rounded-full hover:scale-105 transition-transform duration-300 ease-in-out">
                <span class="text-lg font-bold">.poster</span>
            </a>

            <!-- Navigation Links -->
            <ul class="w-full px-6 space-y-4 mt-10">
                <li><x-link link="/">Home</x-link></li>
                <li><x-link link="#">Posters</x-link></li>
                <li><x-link link="#">Contact</x-link></li>
                <li><x-link link="/about">About</x-link></li>
            </ul>
        </nav>

        {{ $slot ?? '' }}


    </div>
</body>
