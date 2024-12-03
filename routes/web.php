<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MortgageController;

// Ваши маршруты
Route::get('/', function () {
    return view('welcome');
});

// Ресурсный маршрут для ипотек
Route::resource('admin/mortgages', MortgageController::class);

Route::get('mortgages', [MortgageController::class, 'index']);
Route::get('mortgages/{id}', [MortgageController::class, 'show']);