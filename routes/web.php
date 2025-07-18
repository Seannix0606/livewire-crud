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
Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
Route::get('/register', App\Livewire\Auth\Register::class)->name('register');

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {
    // Livewire Product Routes
    Route::get('/products', App\Livewire\Products\Index::class)->name('products.index');
    Route::get('/products/create', App\Livewire\Products\Create::class)->name('products.create');
    Route::get('/products/{product}', App\Livewire\Products\Show::class)->name('products.show');
    Route::get('/products/{product}/edit', App\Livewire\Products\Edit::class)->name('products.edit');
    
    // Livewire Post Routes
    Route::get('/posts', App\Livewire\Posts\Index::class)->name('posts.index');
    Route::get('/posts/create', App\Livewire\Posts\Create::class)->name('posts.create');
    Route::get('/posts/{id}/edit', App\Livewire\Posts\Edit::class)->name('posts.edit');
});

//Route::get('/', fn() => redirect('/posts'));

//Route::get('/posts', [PostSessionController::class, 'index'])->name('posts.index');
//Route::get('/posts/create', [PostSessionController::class, 'create'])->name('posts.create');
//Route::post('/posts', [PostSessionController::class, 'store'])->name('posts.store');
//Route::get('/posts/{id}/edit', [PostSessionController::class, 'edit'])->name('posts.edit');
//Route::put('/posts/{id}', [PostSessionController::class, 'update'])->name('posts.update');
//Route::delete('/posts/{id}', [PostSessionController::class, 'destroy'])->name('posts.destroy');
