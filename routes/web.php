<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//home
Route::get('/', [SiteController::class, 'index'])->name('home');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');

//login submit
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.submit');