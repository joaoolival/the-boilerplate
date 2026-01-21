<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [App\Http\Controllers\Blog\PostController::class, 'index'])->name('posts');
    Route::get('/categories', [App\Http\Controllers\Blog\CategoryController::class, 'index'])->name('categories');
    Route::get('/category/{slug}', [App\Http\Controllers\Blog\CategoryController::class, 'show'])->name('category');
    Route::get('/authors', [App\Http\Controllers\Blog\AuthorController::class, 'index'])->name('authors');
    Route::get('/author/{slug}', [App\Http\Controllers\Blog\AuthorController::class, 'show'])->name('author');
    Route::get('/{slug}', [App\Http\Controllers\Blog\PostController::class, 'show'])->name('post');
});

// Legal pages
Route::get('/terms', fn () => Inertia::render('legal/Terms'))->name('terms');
Route::get('/privacy', fn () => Inertia::render('legal/Privacy'))->name('privacy');
Route::get('/cookies', fn () => Inertia::render('legal/Cookies'))->name('cookies');

require __DIR__.'/settings.php';
