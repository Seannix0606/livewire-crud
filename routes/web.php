<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;

// Redirect root to products if authenticated, otherwise to login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('products.index');
    }
    return redirect()->route('login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Registration Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    // Livewire Product Routes
    Route::get('/products', App\Livewire\Products\Index::class)->name('products.index');
    Route::get('/products/create', App\Livewire\Products\Create::class)->name('products.create');
    Route::get('/products/{product}', App\Livewire\Products\Show::class)->name('products.show');
    Route::get('/products/{product}/edit', App\Livewire\Products\Edit::class)->name('products.edit');
});

//Route::get('/', fn() => redirect('/posts'));

//Route::get('/posts', [PostSessionController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostSessionController::class, 'create'])->name('posts.create');
//Route::post('/posts', [PostSessionController::class, 'store'])->name('posts.store');
//Route::get('/posts/{id}/edit', [PostSessionController::class, 'edit'])->name('posts.edit');
//Route::put('/posts/{id}', [PostSessionController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{id}', [PostSessionController::class, 'destroy'])->name('posts.destroy');
