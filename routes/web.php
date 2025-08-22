<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;

// Helper to get posters from config
if (!function_exists('all_posters')) {
    function all_posters(): array
    {
        return config('posters', []);
    }
}

Route::get('/', function () {
    return view('home', ['posters' => all_posters()]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');
Route::delete('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Posters - single page
Route::get('/posters/{slug}', function (string $slug) {
    $all = all_posters();
    abort_unless(array_key_exists($slug, $all), 404);
    $poster = $all[$slug];
    $poster['slug'] = $slug;
    return view('poster', ['poster' => $poster]);
})->name('poster.show');

// Cart
Route::get('/cart', function () {
    $all = all_posters();
    $cart = session()->get('cart', []);
    $items = [];
    foreach ($cart as $item) {
        if (isset($all[$item])) {
            $slug = $item;
            $data = $all[$slug];
            $items[] = ['slug' => $slug, 'title' => $data['title'], 'image' => $data['image'], 'price' => $data['price']];
        } else {
            $matchSlug = collect($all)->first(function ($val, $key) use ($item) {
                return strcasecmp($val['title'], $item) === 0 || strcasecmp($key, $item) === 0;
            });
            if ($matchSlug) {
                $slug = array_search($matchSlug, $all, true);
                $items[] = ['slug' => $slug, 'title' => $matchSlug['title'], 'image' => $matchSlug['image'], 'price' => $matchSlug['price']];
            }
        }
    }
    return view('cart', ['items' => $items]);
})->name('cart.show');

Route::post('/cart/add', function (Request $request) {
    $slug = $request->input('poster');
    $all = all_posters();
    if (!array_key_exists($slug, $all)) {
        return redirect()->back()->with('success', 'Item not found');
    }
    $cart = session()->get('cart', []);
    $cart[] = $slug;
    session(['cart' => $cart]);
    return redirect()->back()->with('success', $all[$slug]['title'] . ' added to cart!');
})->name('cart.add');

Route::post('/cart/remove', function (Request $request) {
    $index = (int) $request->input('index');
    $cart = session()->get('cart', []);
    if (isset($cart[$index])) {
        unset($cart[$index]);
        $cart = array_values($cart);
        session(['cart' => $cart]);
    }
    return redirect()->route('cart.show');
})->name('cart.remove');

Route::post('/cart/clear', function () {
    session(['cart' => []]);
    return redirect()->route('cart.show');
})->name('cart.clear');

// Admin pages (basic)
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.posters.index');
    })->name('admin.index');

    Route::get('/posters', function () {
        return view('admin.posters.index', ['posters' => all_posters()]);
    })->name('admin.posters.index');

    Route::get('/posters/{slug}', function (string $slug) {
        $all = all_posters();
        abort_unless(array_key_exists($slug, $all), 404);
        $poster = $all[$slug] + ['slug' => $slug];
        return view('admin.posters.show', ['poster' => $poster]);
    })->name('admin.posters.show');
});

// Poster customization page
Route::get('/posters-customize', function () {
    return view('poster-customize');
})->name('poster.customize');
