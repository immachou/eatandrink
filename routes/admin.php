<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StandController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.stands.index');
    });

    Route::resource('stands', StandController::class);
    Route::post('stands/{user}/approve', [StandController::class, 'approve'])->name('stands.approve');
    Route::delete('stands/{user}/reject', [StandController::class, 'reject'])->name('stands.reject');
});
