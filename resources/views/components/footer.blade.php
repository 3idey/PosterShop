<footer class="bg-white/90 border-t border-indigo-100 mt-16">
    <div class="container mx-auto px-6 py-12 flex flex-col gap-8">
        <div class="flex flex-col items-center">
            <div class="flex items-center gap-3">
                <img src="{{ \Illuminate\Support\Facades\Vite::asset('resources/images/fulllogo.png') }}"
                    alt="PosterShop Logo" class="w-10 h-10 rounded-full shadow"
                    onerror="this.onerror=null;this.src='{{ \Illuminate\Support\Facades\Vite::asset('resources/images/icon.jpg') }}';">
                <span class="text-xl font-bold text-indigo-700">PosterShop</span>
            </div>
            <p class="mt-4 text-indigo-500/80 text-center">Discover, collect, and share creative posters from around the
                world.</p>
        </div>
        <div class="flex flex-col items-center">
            <h3 class="font-semibold text-indigo-700 mb-3">Explore</h3>
            <ul class="space-y-2 text-indigo-600 text-center">
                <li><a class="hover:text-indigo-800" href="/">Home</a></li>
                <li><a class="hover:text-indigo-800" href="/about">About</a></li>
                <li><a class="hover:text-indigo-800" href="/collections/films">Films</a></li>
                <li><a class="hover:text-indigo-800" href="/collections/sports">Sports</a></li>
                <li><a class="hover:text-indigo-800" href="/collections/randoms">Randoms</a></li>
            </ul>
        </div>
        <div class="flex flex-col items-center">
            <h3 class="font-semibold text-indigo-700 mb-3">Support</h3>
            <ul class="space-y-2 text-indigo-600 text-center">
                <li><a class="hover:text-indigo-800" href="#">Help Center</a></li>
                <li><a class="hover:text-indigo-800" href="#">Shipping & Returns</a></li>
                <li><a class="hover:text-indigo-800" href="#">Privacy Policy</a></li>
            </ul>
        </div>
        <div class="flex flex-col items-center">
            <h3 class="font-semibold text-indigo-700 mb-3">Newsletter</h3>
            <p class="text-indigo-500/80 text-center">Get updates on new posters and collections.</p>
            <form class="mt-3 flex gap-2 w-full justify-center">
                <input type="email" placeholder="you@example.com"
                    class="flex-1 rounded-xl border border-indigo-200 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400 max-w-[180px]">
                <button type="button"
                    class="rounded-xl bg-indigo-600 text-white px-4 py-2 hover:bg-indigo-700">Subscribe</button>
            </form>
        </div>
    </div>
    <div class="border-t border-indigo-100 py-4 text-center text-indigo-500">
        <p>&copy; {{ date('Y') }} PosterShop. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>

</html>
