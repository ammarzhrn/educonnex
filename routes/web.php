<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('home');

Route::get('/aboutus', function () {
    return view('about_us.index');
})->name('aboutus');

Route::get('/program', function () {
    return view('program.index');
})->name('program');

Route::get('/artikel', function () {
    return view('artikel.index');
})->name('artikel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('user', UserController::class);
});
require __DIR__.'/auth.php';
