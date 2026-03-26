<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\RegisterController;
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

    //create habit
    Route::get('/dashboards/habits/create', [HabitController::class, 'create'])->name('habit.create');

    //create habit submit
    Route::post('/dashboard/habits/create', [HabitController::class, 'store'])->name('habit.submit');

    //delete habit  
    Route::delete('/dashboard/habits/delete/{habit}', [HabitController::class, 'destroy'])->name('habit.destroy');

    //edit habit
    Route::get('/dashboard/habits/edit/{habit}', [HabitController::class, 'edit'])->name('habit.edit');

    //edit habit submit
    Route::put('/dashboard/habits/update/{habit}', [HabitController::class, 'update'])->name('habit.update');

    //settings view
    Route::get('/dashboard/habits/settings', [HabitController::class, 'settings'])->name('habit.settings');

    //toggle habit as marked
    Route::post('/dashboard/habits/{habit}/toggle', [HabitController::class, 'toggle'])->name('habit.toggle');

    //history view
    Route::get('/dashboard/habits/history', [HabitController::class, 'history'])->name('habit.history');

});

// register
Route::get('/cadastro', [RegisterController::class, 'index'])->name('cadastro');
//register submit
Route::post('/cadastro', [RegisterController::class, 'store'])->name('cadastro.submit');