<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function (): void {
    Route::get('/', 'login')->name('login');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/pengelolaan', 'pengelolaan')->name('pengelolaan');
    Route::get('/profile', 'profile')->name('profile');
});
