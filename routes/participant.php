<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Participant\ShopController;

Route::prefix('participant')->name('participant.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('participant.shop.index');
    });

    Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
    Route::get('shop/{stand}', [ShopController::class, 'show'])->name('shop.show');
    Route::post('shop/{product}/add-to-cart', [ShopController::class, 'addToCart'])->name('shop.addToCart');
    Route::delete('shop/cart/{id}', [ShopController::class, 'removeFromCart'])->name('shop.removeFromCart');
    Route::get('shop/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::post('shop/checkout', [ShopController::class, 'checkout'])->name('shop.checkout');
});
