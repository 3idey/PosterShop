<x-header title=".poster" />

<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen font-sans">

    <nav class="sticky top-0 z-30 bg-white/90 rounded-b-3xl backdrop-blur shadow-lg border-b border-indigo-100 mt-5">
        <div class="container mx-auto px-12 py-5 flex items-center min-h-[80px] mt-2">
            <div class="flex items-center gap-5">
                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/fulllogo.png') }}"
                    alt="PosterShop Logo" class="w-16 h-16 rounded-full shadow-lg"
                    onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Vite::asset('resources/images/icon.jpg') }}';">
                <span class="text-indigo-700 text-3xl font-extrabold tracking-wide">PosterShop</span>
            </div>
            <ul class="flex gap-12 items-center text-xl font-semibold text-indigo-700 flex-1 justify-center">
                <li><a href="/" class="hover:text-indigo-500 hover:scale-105 transition-all duration-200">Home</a>
                </li>
                <li class="relative group ">
                    <span
                        class="cursor-pointer hover:text-indigo-500 hover:scale-105 transition-all duration-200">Collections</span>
                    <ul
                        class="absolute left-0 mt-2 bg-white shadow-xl rounded-lg py-2 px-4 hidden group-hover:block z-20 min-w-[140px] border border-indigo-100">
                        <li><a href="/collections/films"
                                class="block py-1 px-2 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Films</a>
                        </li>
                        <li><a href="/collections/sports"
                                class="block py-1 px-2 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Sports</a>
                        </li>
                        <li><a href="/collections/randoms"
                                class="block py-1 px-2 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Randoms</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/contact" class="hover:text-indigo-500 hover:scale-105 transition-all duration-200">Contact
                        us</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto flex items-center py-4">
        <div class="flex items-center gap-4">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-button name="Logout" type="submit"
                        class="ml-2 bg-gradient-to-r from-red-500 to-red-500 text-white font-bold shadow-md hover:from-red-600 hover:to-blue-600 hover:scale-105" />
                </form>
            @else
                <a href="{{ route('login') }}"><x-button name="Login" type="button" class="ml-2" /></a>
                <a href="{{ route('register') }}">
                    <x-button name="Register" type="button"
                        class="ml-4 bg-gradient-to-r from-indigo-500 to-blue-500 text-white font-bold shadow-md hover:from-indigo-600 hover:to-blue-600" />
                </a>
            @endauth
        </div>
        <div class="flex-1"></div>
    </div>
    <main class="container mx-auto px-4 py-12 flex flex-col items-center">
        <div class="w-full max-w-4xl bg-white/80 shadow-2xl rounded-2xl p-10 border-4 border-transparent bg-clip-padding"
            style="border-image: linear-gradient(135deg, #6366f1 0%, #a5b4fc 100%) 1;">
            @yield('content')
        </div>
    </main>

</body>
<x-footer />
