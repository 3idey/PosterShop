<x-header title=".poster" />

<body class="bg-gradient-to-br from-blue-50 via-white to-indigo-100 min-h-screen font-sans">

    <nav class="sticky top-0 z-30 bg-white/90 rounded-b-3xl backdrop-blur shadow-lg border-b border-indigo-100 mt-5">
        <div class="mx-auto w-full max-w-screen-2xl px-6 md:px-10 py-4">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-4">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/fulllogo.png') }}"
                        alt="PosterShop Logo" class="w-14 h-14 rounded-full shadow-lg"
                        onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Vite::asset('resources/images/icon.jpg') }}';">
                    <span class="text-indigo-700 text-3xl font-extrabold tracking-wide">PosterShop</span>
                </div>

                <ul id="nav-menu" class="hidden md:flex gap-10 items-center text-lg font-semibold text-indigo-700">
                    <li><a href="/"
                            class="hover:text-indigo-500 hover:scale-105 transition-all duration-200">Home</a></li>
                    <li class="relative group">
                        <span
                            class="cursor-pointer hover:text-indigo-500 hover:scale-105 transition-all duration-200">Collections</span>
                        <ul
                            class="absolute left-0 mt-2 bg-white shadow-xl rounded-lg py-2 px-4 hidden group-hover:block z-20 min-w-[160px] border border-indigo-100">
                            <li><a href="/collections/films"
                                    class="block py-1 px-3 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Films</a>
                            </li>
                            <li><a href="/collections/sports"
                                    class="block py-1 px-3 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Sports</a>
                            </li>
                            <li><a href="/collections/randoms"
                                    class="block py-1 px-3 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Randoms</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="/about"
                            class="hover:text-indigo-500 hover:scale-105 transition-all duration-200">About</a></li>
                    <li><a href="{{ route('poster.customize') }}"
                            class="block py-1 px-3 hover:bg-indigo-100 hover:text-indigo-700 rounded transition-all duration-200">Custom</a>
                    </li>
                </ul>

                <div class="hidden md:flex items-center gap-3">
                    <a href="{{ route('cart.show') }}"
                        class="relative inline-flex items-center gap-2 text-indigo-700 hover:text-indigo-900">
                        <span class="inline-block">Cart</span>
                        @php($cartCount = count(session('cart', [])))
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-xs">{{ $cartCount }}</span>
                    </a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <x-button name="Logout" type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white rounded-xl" />
                        </form>
                    @else
                        <a href="{{ route('login') }}"><x-button name="Login" type="button" /></a>
                        <a href="{{ route('register') }}"><x-button name="Register" type="button"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl" /></a>
                    @endauth
                </div>

                <button id="nav-toggle"
                    class="md:hidden inline-flex items-center justify-center w-10 h-10 rounded-xl border border-indigo-200 text-indigo-700 hover:bg-indigo-50"
                    aria-label="Toggle navigation" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M3.75 5.25a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75Zm0 6a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75Zm0 6a.75.75 0 0 1 .75-.75h15a.75.75 0 0 1 0 1.5h-15a.75.75 0 0 1-.75-.75Z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div id="mobile-menu" class="md:hidden hidden mt-4">
                <ul class="flex flex-col gap-3 text-indigo-700 text-base">
                    <li><a href="/" class="block py-2 px-3 rounded-lg hover:bg-indigo-50">Home</a></li>
                    <li>
                        <details class="rounded-lg">
                            <summary class="cursor-pointer py-2 px-3 rounded-lg hover:bg-indigo-50">Collections
                            </summary>
                            <ul class="pl-4 py-2">
                                <li><a href="/collections/films"
                                        class="block py-1 px-3 rounded hover:bg-indigo-50">Films</a></li>
                                <li><a href="/collections/sports"
                                        class="block py-1 px-3 rounded hover:bg-indigo-50">Sports</a></li>
                                <li><a href="/collections/randoms"
                                        class="block py-1 px-3 rounded hover:bg-indigo-50">Randoms</a></li>
                            </ul>
                        </details>
                    </li>
                    <li><a href="/about" class="block py-2 px-3 rounded-lg hover:bg-indigo-50">About</a></li>
                </ul>
                <div class="mt-4 flex items-center gap-3">
                    <a href="{{ route('cart.show') }}"
                        class="w-full inline-flex items-center justify-between px-3 py-2 rounded-xl border border-indigo-200 text-indigo-700 hover:bg-indigo-50">
                        <span>Cart</span>
                        @php($cartCount = count(session('cart', [])))
                        <span
                            class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-indigo-600 text-white text-xs">{{ $cartCount }}</span>
                    </a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline w-full">
                            @csrf
                            @method('DELETE')
                            <x-button name="Logout" type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white rounded-xl" />
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="w-full"><x-button name="Login" type="button"
                                class="w-full" /></a>
                        <a href="{{ route('register') }}" class="w-full"><x-button name="Register" type="button"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl" /></a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>


    @if (session('success'))
        <x-alert type="success" :message="session('success')" />
    @endif

    @hasSection('full')
        <main class="w-full px-4 md:px-8 py-8">
            @yield('full')
        </main>
    @else
        <main class="container mx-auto px-4 py-12 flex flex-col items-center">
            <div class="w-full max-w-4xl bg-white/80 shadow-2xl rounded-2xl p-10 border-4 border-transparent bg-clip-padding"
                style="border-image: linear-gradient(135deg, #6366f1 0%, #a5b4fc 100%) 1;">
                @yield('content')
                {{ $slot ?? '' }}
            </div>
        </main>
    @endif

    <x-footer />
