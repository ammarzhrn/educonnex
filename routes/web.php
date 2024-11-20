<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('public.home.index');
})->name('home');

Route::get('aboutus', function () {
    return view('public.about_us.index');
})->name('aboutus');

Route::get('program', function () {
    return view('public.program.index');
})->name('program');

Route::get('content', function () {
    return view('public.program.detail');
})->name('content');

Route::get('artikel', function () {
    return view('public.artikel.index');
})->name('artikel');

Route::get('detailartikel', function () {
    return view('public.artikel.detail');
})->name('detailartikel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('sector', SectorController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('article', ArticleController::class);
    Route::patch('/article/{id}/update-status/{status}', [ArticleController::class, 'updateStatus'])->name('article.updateStatus');
    Route::resource('news', NewsController::class);
    Route::patch('/news/{id}/update-status/{status}', [NewsController::class, 'updateStatus'])->name('news.updateStatus');
});

require __DIR__.'/auth.php';
