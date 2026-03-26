<?php

use App\Http\Controllers\Blog\AuthorController;
use App\Http\Controllers\Blog\CategoryController;
use App\Http\Controllers\Blog\PostController;
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
    Route::get('/', [PostController::class, 'index'])->name('posts');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category');
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
    Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('author');
    Route::get('/{slug}', [PostController::class, 'show'])->name('post');
});

// Legal pages
Route::get('/terms', fn () => Inertia::render('legal/Terms'))->name('terms');
Route::get('/privacy', fn () => Inertia::render('legal/Privacy'))->name('privacy');
Route::get('/cookies', fn () => Inertia::render('legal/Cookies'))->name('cookies');

require __DIR__.'/settings.php';
