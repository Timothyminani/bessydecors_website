<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/home', [ProductController::class, 'ShowHome']);
Route::get('/about', fn () => Inertia::render('About'));
Route::get('/contact', fn () => Inertia::render('Contact'));

Route::get('/allProducts', [ProductController::class, 'ShowProducts']);
Route::get('/products/{id}', [ProductController::class, 'ShowSingleProduct']);

Route::get('/blog', [BlogController::class, 'publicIndex'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');


/*
|--------------------------------------------------------------------------
| Admin Auth Routes (no middleware here)
|--------------------------------------------------------------------------
*/

Route::get('/admin/register', [AdminAuthController::class, 'showRegister']);
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::get('/admin/login', [AdminAuthController::class, 'showLogin']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| User Auth Routes (optional / for later)
|--------------------------------------------------------------------------
*/

Route::get('/register', [UserAuthController::class, 'showRegister']);
Route::post('/register', [UserAuthController::class, 'register']);

Route::get('/login', [UserAuthController::class, 'showLogin']);
Route::post('/login', [UserAuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| Protected Admin Routes (with middleware)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['admin']) // your custom middleware
    ->group(function () {

    Route::get('/dashboard', fn () => Inertia::render('Admin/Dashboard'))
        ->name('admin.dashboard');

    Route::get('/users', fn () => Inertia::render('Admin/Users'))
        ->name('admin.users');

    // Product management
    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::post('/products/store', [ProductController::class, 'store'])
        ->name('products.store');

    Route::post('/products/{product}/update', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{product}', [ProductController::class, 'destroy'])
        ->name('products.destroy');

    // Blog management
    Route::get('/blog', [BlogController::class, 'index'])
        ->name('admin.blog');

    Route::post('/blogs', [BlogController::class, 'store'])
        ->name('admin.blog.store');

    Route::put('/blogs/{id}', [BlogController::class, 'update']);
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy']);
});
