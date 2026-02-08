<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestoneController;
use App\Http\Controllers\Ajax\FilterController;

Route::get('/', function () {
    return view('index');
});

Route::get('/testone', [TestoneController::class, 'index'])->name('testone');


/*|-------------------------------------------------------------
| AJAX Routes (Class -> Subject -> Chapter -> Lesson)
|-------------------------------------------------------------|*/
Route::prefix('ajax')->name('ajax.')->group(function () {
    Route::get('/subjects', [FilterController::class, 'subjects'])->name('subjects');
    Route::get('/chapters', [FilterController::class, 'chapters'])->name('chapters');
    Route::get('/lessons',  [FilterController::class, 'lessons'])->name('lessons');
});