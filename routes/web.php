<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/services/{slug}', [PageController::class, 'serviceDetail'])->name('services.detail');
Route::get('/problem', [PageController::class, 'problem'])->name('problem');
Route::get('/ai-reality', [PageController::class, 'aiReality'])->name('ai-reality');

Route::get('/lang/{locale}', function ($locale) {
    $supported = ['en', 'pl', 'de'];
    if (in_array($locale, $supported)) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');
