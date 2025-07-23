<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exposants', [\App\Http\Controllers\StandController::class, 'index'])->name('stands.index');
Route::get('/exposants/{stand}', [App\Http\Controllers\StandController::class, 'show'])->name('stands.show');
Route::post('/panier/ajouter/{product}', [App\Http\Controllers\PanierController::class, 'ajouter'])->name('panier.ajouter');
Route::get('/panier', [App\Http\Controllers\PanierController::class, 'index'])->name('panier.index');
Route::post('/panier/retirer/{product}', [App\Http\Controllers\PanierController::class, 'retirer'])->name('panier.retirer');
Route::post('/commande', [App\Http\Controllers\CommandeController::class, 'soumettre'])->name('commande.soumettre');
