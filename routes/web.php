<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::resource('/', HomeController::class)->only('index')->names('home');
Route::resource('/nosotros', BrandController::class)->only('index')->names('nosotros');
