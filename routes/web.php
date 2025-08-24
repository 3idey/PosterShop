<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Models\Poster;

// Home with featured posters
Route::get('/', function () {
    $featured = Poster::query()->latest()->take(6)->get();
    return view('home', compact('featured'));
})->name('home');

// About page
Route::view('/about', 'about')->name('about');

// Auth routes
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::delete('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Profile routes (require auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Cart routes (DB-backed)
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

use App\Http\Controllers\PostersController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Admin\PostersAdminController;

// Posters
Route::get('/posters', [PostersController::class, 'index'])->name('posters.index');
Route::get('/posters/{poster:slug}', [PostersController::class, 'show'])->name('poster.show');

// Collections
Route::get('/collections/{category}', [PostersController::class, 'collection'])->name('collections.show');

// Poster customize placeholder so existing link works
Route::get('/custom', function () {
    return view('poster.customize');
})->name('poster.customize');

// Checkout & Orders
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
});

// Admin posters CRUD (guarded by admin gate)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'can:manage-posters'])->group(function () {
    Route::get('/posters', [PostersAdminController::class, 'index'])->name('posters.index');
    Route::get('/posters/create', [PostersAdminController::class, 'create'])->name('posters.create');
    Route::post('/posters', [PostersAdminController::class, 'store'])->name('posters.store');
    Route::get('/posters/{poster}/edit', [PostersAdminController::class, 'edit'])->name('posters.edit');
    Route::put('/posters/{poster}', [PostersAdminController::class, 'update'])->name('posters.update');
    Route::delete('/posters/{poster}', [PostersAdminController::class, 'destroy'])->name('posters.destroy');
});
