<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\IniciarSesionController;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\auth\InicioAdminController;
use App\Http\Controllers\auth\CargarRutasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.inicio');
})->name('inicio');

Route::get('iniciarsesion', [IniciarSesionController::class, 'create'])->name('iniciarsesion');

Route::post('/iniciarsesion', [IniciarSesionController::class, 'store'])->name('iniciarsesion.store');

Route::get('inicioAdministrador', [InicioAdminController::class, 'create'])->name('inicioAdministrador');

Route::get('cargarRutas', [CargarRutasController::class, 'create'])->name('cargarRutas');

Route::post('/cargarRutas', [CargarRutasController::class, 'importarRutas'])->name('cargarRutas.import');
