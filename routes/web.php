<?php

use App\Models\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ShopController;
use App\Http\Controllers\Web\AboutController;
use App\Http\Controllers\Web\ContactController;

Route::name('web.')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/articles/{article}', [HomeController::class, 'showArticle'])->name('article.show');

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
    Route::get('/shop-data', [ShopController::class, 'filteredRows'])->name('shop.data');
    Route::get('/book/{book}', [ShopController::class, 'bookDetails'])->name('book');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->name('web.')->group(function () {
    Route::post('/order-confirmation', [ShopController::class, 'orderConfirmation'])->name('order.confirmation');
});

require __DIR__ . '/auth.php';
