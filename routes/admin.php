<?php

use App\Http\Controllers\admin\adopciónController;
use App\Http\Controllers\admin\perdidosController;
use Illuminate\Support\Facades\Route;

Route::resource('adopcion', adopciónController::class)->only('create', 'store', 'index')->names('adopcion');
Route::resource('perdidos', perdidosController::class)->only('create', 'store', 'index')->names('perdido');
