<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('home');
});
Route::get('/questions', function () {
    return view('questions');
})->name('questions');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/category/{id}', [NewsController::class, 'category'])->name('news.category');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
