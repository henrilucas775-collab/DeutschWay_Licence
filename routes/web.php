<?php

use App\Livewire\ParcoursChapitres;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/community', 'pages.community')->name('community');
Route::view('/niveau-zero', 'pages.niveau-zero')->name('niveau-zero');
Route::view('/fondations', 'pages.fondations')->name('fondations');
Route::view('/immersion', 'pages.immersion')->name('immersion');

Route::middleware(['auth'])->group(function () {
    Route::view('dashboard', 'app.dashboard')->name('dashboard');
    Route::view('lab/apprendre', 'app.apprendre')->name('lab.apprendre');
    Route::get('lab/apprendre/{chapitre}', function ($chapitre) {
        return view('app.apprendre', ['chapitreSlug' => $chapitre]);
    })->name('lab.apprendre.show');
    Route::get('lab/cours', function () {
        return view('app.cours', [
            'parcoursList' => ParcoursChapitres::catalog(),
        ]);
    })->name('lab.cours');
    Route::get('lab/cours/{slug}', ParcoursChapitres::class)->name('lab.cours.chapitres');
    Route::view('lab/explorer', 'app.explorer')->name('lab.explorer');
    Route::view('lab/progression', 'app.progression')->name('lab.progression');
    
    // Évaluation de Prononciation
    Route::post('api/pronunciation/evaluate', [\App\Http\Controllers\PronunciationController::class, 'evaluate'])->name('pronunciation.evaluate');
});

require __DIR__.'/settings.php';
