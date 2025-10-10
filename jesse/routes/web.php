<?php

use App\Http\Controllers\Auth\GitHubAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/github/redirect', [GitHubAuthController::class, 'redirect'])
    ->middleware('guest')
    ->name('oauth.github.redirect');

Route::get('/auth/github/callback', [GitHubAuthController::class, 'callback'])
    ->middleware('guest')
    ->name('oauth.github.callback');

Route::view('/home', 'home')
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::view('/predict', 'predict')
    ->middleware(['auth', 'verified'])
    ->name('predict');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
