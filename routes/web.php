<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoroscopeController;

Route::get('/', function () {
    return view('welcome');
});

// Указываем маршрутизацию для всех методов RESTful контроллера - HoroscopeController
Route::resource('/horoscope', HoroscopeController::class);