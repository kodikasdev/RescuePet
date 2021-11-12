<?php

use App\Http\Controllers\admin\adopcionController;
use App\Http\Controllers\admin\perdidosController;
use App\Http\Livewire\Adopciones\AdopcionesCreate;
use App\Http\Livewire\Adopciones\AdopcionesEdit;
use App\Http\Livewire\Adopciones\AdopcionesIndex;
use App\Http\Livewire\Perdidos\PerdidosCreate;
use App\Http\Livewire\Perdidos\PerdidosEdit;
use App\Http\Livewire\Perdidos\PerdidosIndex;
use Illuminate\Support\Facades\Route;


Route::get('adopcion', AdopcionesIndex::class)->name('adopcion.index');
Route::get('adopcion/create', AdopcionesCreate::class)->name('adopcion.create');
Route::get('adopcion/{mascota}/edit', AdopcionesEdit::class)->name('adopcion.edit');
Route::post('adopcion/{mascota}/files', [adopcionController::class, 'files'])->name('adopcion.files');

Route::get('perdidos', PerdidosIndex::class)->name('perdido.index');
Route::get('perdidos/create', PerdidosCreate::class)->name('perdido.create');
Route::get('perdidos/{mascota}/edit', PerdidosEdit::class)->name('perdido.edit');
Route::post('perdidos/{mascota}/edit', PerdidosEdit::class,)->name('perdido.edit');
Route::post('perdidos/{mascota}/files', [perdidosController::class, 'files'])->name('perdido.files');

