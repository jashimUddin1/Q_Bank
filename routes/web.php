<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TastoneController;

Route::get('/', function () {
    return view('index');
});

Route::get('/testone', [TastoneController::class, 'index'])->name('testone');