<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/community', 'pages.community')->name('community');
Route::view('/niveau-zero', 'pages.niveau-zero')->name('niveau-zero');
Route::view('/fondations', 'pages.fondations')->name('fondations');
Route::view('/immersion', 'pages.immersion')->name('immersion');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


require __DIR__.'/settings.php';
