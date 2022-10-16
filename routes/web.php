<?php

use App\Http\Controllers\EgresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/bienvenido');

Route::get('/bienvenido', HomeController::class)->middleware('auth');

Route::resource('/inmuebles', InmuebleController::class)->middleware('auth')->names('inmuebles');

Route::resource('/ingresos', IngresoController::class)->middleware('auth')->names('ingresos');

Route::resource('/egresos', EgresoController::class)->middleware('auth')->names('egresos');

Route::resource('/mantenimientos', MantenimientoController::class)->middleware('auth')->names('mantenimientos');

Route::get('/mantenimientos/{mantenimiento}/aprobar', [MantenimientoController::class, 'aprobar'])->middleware('auth')->name('mantenimientos.aprobar');

Route::resource('/usuarios', UserController::class)->middleware('auth')->middleware('can:crear_usuarios')->names('usuarios');
