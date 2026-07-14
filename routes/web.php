<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CommentController;

// Halaman publik (tanpa login)
Route::post('/artikel/{article}/komentar', [CommentController::class, 'store'])->name('comments.store');
Route::get('/', [PublicController::class, 'beranda'])->name('beranda');
Route::get('/artikel/{slug}', [PublicController::class, 'detail'])->name('artikel.detail');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
});

require __DIR__ . '/auth.php';
