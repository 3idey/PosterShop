@extends('components.layout')

@section('content')
    <div class="flex flex-col items-center justify-center text-center py-10 w-full max-w-[1800px] mx-auto min-h-[1200px]">
        <h1 class="text-5xl font-extrabold text-indigo-700 mb-4 tracking-tight drop-shadow-lg">Welcome to PosterShop</h1>
        <p class="text-xl text-indigo-500 mb-8 max-w-2xl">Discover, collect, and share creative posters from artists and
            fans around the world. Your poster gallery starts here!</p>
        <a href="/collections/films"
            class="inline-block bg-gradient-to-r from-indigo-600 to-blue-500 text-white px-8 py-3 rounded-xl shadow-lg hover:scale-105 hover:from-indigo-700 hover:to-blue-600 transition-all text-lg font-semibold mb-12">Browse
            Collections</a>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-10 mt-8 w-full">
            <!-- Example featured posters, replace with dynamic content as needed -->
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-indigo-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-indigo-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Breaking_Bad.jpeg') }}"
                        alt="Breaking Bad Poster" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-indigo-700">Breaking Bad</h2>
                    <p class="text-gray-500 mb-2">Iconic TV Series Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Breaking Bad">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-indigo-500 text-white font-bold shadow hover:bg-indigo-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-blue-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-blue-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/leo_messi.jpeg') }}"
                        alt="Leo Messi Poster" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-blue-700">Leo Messi</h2>
                    <p class="text-gray-500 mb-2">Legendary Sports Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Leo Messi">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-blue-500 text-white font-bold shadow hover:bg-blue-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-pink-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-pink-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Che_Guevara.jpeg') }}"
                        alt="Che Guevara Poster" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-pink-700">Che Guevara</h2>
                    <p class="text-gray-500 mb-2">Classic Icon Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Che Guevara">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-pink-500 text-white font-bold shadow hover:bg-pink-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-green-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-green-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Free_Poster_on_the_Floor_Mockup_1.png') }}"
                        alt="Floor Poster Mockup" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-green-700">Floor Poster</h2>
                    <p class="text-gray-500 mb-2">Creative Mockup Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Floor Poster">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-green-500 text-white font-bold shadow hover:bg-green-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-yellow-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-yellow-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Free_Poster_on_the_Floor_Mockup_2.png') }}"
                        alt="Floor Poster Mockup 2" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-yellow-700">Floor Poster 2</h2>
                    <p class="text-gray-500 mb-2">Creative Mockup Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Floor Poster 2">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-yellow-500 text-white font-bold shadow hover:bg-yellow-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-orange-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-orange-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Free_Poster_on_the_Floor_Mockup_5-Recovered.png') }}"
                        alt="Floor Poster Mockup 5" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-orange-700">Floor Poster 5</h2>
                    <p class="text-gray-500 mb-2">Creative Mockup Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Floor Poster 5">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-orange-500 text-white font-bold shadow hover:bg-orange-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gray-300 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-gray-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/gayar1.jpg') }}"
                        alt="Gayar Poster 1" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-gray-700">Gayar 1</h2>
                    <p class="text-gray-500 mb-2">Artistic Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Gayar 1">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-gray-500 text-white font-bold shadow hover:bg-gray-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gray-400 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-gray-100 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/gayar2.jpg') }}"
                        alt="Gayar Poster 2" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-gray-700">Gayar 2</h2>
                    <p class="text-gray-500 mb-2">Artistic Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Gayar 2">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-gray-500 text-white font-bold shadow hover:bg-gray-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-gray-500 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-gray-200 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/gayar3.png') }}"
                        alt="Gayar Poster 3" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-gray-700">Gayar 3</h2>
                    <p class="text-gray-500 mb-2">Artistic Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Gayar 3">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-gray-500 text-white font-bold shadow hover:bg-gray-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-purple-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-purple-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Free_Poster_on_the_Floor_Mockup_3.png') }}"
                        alt="Floor Poster Mockup 3" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-purple-700">Floor Poster 3</h2>
                    <p class="text-gray-500 mb-2">Creative Mockup Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Floor Poster 3">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-purple-500 text-white font-bold shadow hover:bg-purple-700 transition" />
                    </form>
                </div>
            </div>
            <div
                class="bg-white rounded-3xl shadow-2xl overflow-hidden border-4 border-red-200 hover:shadow-3xl hover:scale-105 transition-all duration-300">
                <div class="aspect-w-3 aspect-h-4 bg-red-50 flex items-center justify-center">
                    <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/Free_Poster_on_the_Floor_Mockup_4-Recovered.png') }}"
                        alt="Floor Poster Mockup 4" class="object-cover w-full h-full rounded-t-3xl"
                        onerror="this.onerror=null;this.src='/images/icon.jpg';">
                </div>
                <div class="p-4 flex flex-col items-center">
                    <h2 class="text-lg font-bold text-red-700">Floor Poster 4</h2>
                    <p class="text-gray-500 mb-2">Creative Mockup Poster</p>
                    <form method="POST" action="{{ route('cart.add') }}" class="w-full">
                        @csrf
                        <input type="hidden" name="poster" value="Floor Poster 4">
                        <x-button name="Add to Cart" type="submit"
                            class="mt-2 w-full bg-red-500 text-white font-bold shadow hover:bg-red-700 transition" />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
