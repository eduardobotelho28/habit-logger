<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

//home
Route::get('/', [SiteController::class, 'index'])->name('home');
//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
//login submit
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');

//protected routes
Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [SiteController::class, 'dashboard'])->name('dashboard');

    //logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});