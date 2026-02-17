<?php

use App\Http\Controllers\Auth\GitHubAuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PredictController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/auth/github/redirect', [GitHubAuthController::class, 'redirect'])
    ->middleware('guest')
    ->name('oauth.github.redirect');

Route::get('/auth/github/callback', [GitHubAuthController::class, 'callback'])
    ->middleware('guest')
    ->name('oauth.github.callback');

Route::view('/home', 'home')
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/predict', [PredictController::class, 'index'])->name('predict');
    Route::post('/predict', [PredictController::class, 'store'])->name('predict.store');
});

require __DIR__.'/auth.php';
