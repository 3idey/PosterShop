<body class="bg-gray-50 text-black-500 font-sans antialiased">
    <nav class="bg-gray-900 text-white px-6 py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <div class="abslute left-0 ">
                <a href="/">
                    <img src={{ \Illuminate\Support\Facades\Vite::asset('resources/images/whiteimage.jpg') }}
                        alt="logo"
                        class="w-20 h-20 object-contain rounded-full mr-22 hover:scale-120 transition-transform duration-300 ease-in-out">
                </a>
            </div>
            <ul class="flex space-x-6 absolute left-1/2 transform -translate-x-1/2">
                <li><x-link link="/">Home</x-link></li>
                <li><x-link link="#">Posters</x-link></li>
                <li><x-link link="#">Contact</x-link></li>
                <li><x-link link="/about">About</x-link></li>


            </ul>
            <div class="w-16 h-16 flex items-center justify-between space-x-6">
                <x-link link="/login"><x-button name="Login" /></x-link>
                <x-link link="/register"><x-button name="Register" /></x-link>
            </div>
        </div>
    </nav>
</body>
