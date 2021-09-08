<?php

use App\Http\Controllers\admin\adopciónController;
use Illuminate\Support\Facades\Route;

Route::resource('adopcion', adopciónController::class)->only('create', 'store', 'index')->names('adopcion');
