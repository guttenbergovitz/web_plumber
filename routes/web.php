<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/lang/{locale}', function ($locale) {
    $supported = ['en', 'pl', 'de'];
    if (in_array($locale, $supported)) {
        session(['locale' => $locale]);
        app()->setLocale($locale);
    }
    return redirect()->back();
})->name('lang.switch');
