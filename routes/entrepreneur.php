<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Entrepreneur\ProductController;

Route::prefix('entrepreneur')->name('entrepreneur.')->middleware(['auth', 'role:entrepreneur_approuve'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('entrepreneur.products.index');
    });

    Route::resource('products', ProductController::class);
});
