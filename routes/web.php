<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StandRequestController as AdminStandRequestController;
use App\Http\Controllers\Entrepreneur\DashboardController as EntrepreneurDashboardController;
use App\Http\Controllers\Entrepreneur\StandRequestController as EntrepreneurStandRequestController;

Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Routes de connexion (à implémenter)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes protégées par rôle
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Autres routes admin...
});

Route::middleware(['auth', 'role:entrepreneur_approuve'])->prefix('entrepreneur')->group(function () {
    Route::get('/dashboard', [EntrepreneurDashboardController::class, 'index'])->name('entrepreneur.dashboard');
    // Autres routes entrepreneur...
});

// Routes administrateur
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    
    // Gestion des stands
    Route::resource('stands', AdminStandRequestController::class)->only(['index', 'show']);
    Route::post('stands/{stand}/approuver', [AdminStandRequestController::class, 'approuver'])
        ->name('stands.approuver');
    Route::post('stands/{stand}/rejeter', [AdminStandRequestController::class, 'rejeter'])
        ->name('stands.rejeter');
});

// Routes pour les entrepreneurs en attente d'approbation
Route::middleware(['auth', 'role:entrepreneur_en_attente'])->prefix('entrepreneur')->name('entrepreneur.')->group(function () {
    Route::get('/dashboard', [EntrepreneurDashboardController::class, 'enAttente'])->name('dashboard');
    Route::get('/stand/statut', [EntrepreneurStandRequestController::class, 'status'])->name('stand.status');
});

// Routes pour les produits (en français)
Route::middleware(['auth', 'role:entrepreneur_approuve'])->prefix('entrepreneur')->name('entrepreneur.')->group(function () {
    // Suppression de la route products en double
    Route::resource('produits', 'App\Http\Controllers\Entrepreneur\ProductController');
    
    // Tableau de bord
    Route::get('/dashboard', [EntrepreneurDashboardController::class, 'index'])->name('dashboard');
    
    // Gestion des demandes de stand
    Route::prefix('stand')->name('stand.')->group(function () {
        Route::get('/demande', [EntrepreneurStandRequestController::class, 'create'])->name('create');
        Route::post('/demande', [EntrepreneurStandRequestController::class, 'store'])->name('store');
        Route::get('/statut', [EntrepreneurStandRequestController::class, 'status'])->name('status');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
