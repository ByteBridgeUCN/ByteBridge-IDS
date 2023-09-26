<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\IniciarSesionController;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\auth\InicioAdminController;
use App\Http\Controllers\auth\CargarRutasController;
use App\Http\Controllers\auth\MostrarRutasController;

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

Route::get('iniciarsesion', [IniciarSesionController::class, 'crear'])->name('iniciarsesion');
Route::post('/iniciarsesion', [IniciarSesionController::class, 'almacenar'])->name('iniciarsesion.almacenar');

Route::get('inicioAdministrador', [InicioAdminController::class, 'crear'])->name('inicioAdministrador');

Route::get('cargarRutas', [CargarRutasController::class, 'crear'])->name('cargarRutas');
Route::post('/cargarRutas', [CargarRutasController::class, 'importarRutas'])->name('cargarRutas.importar');

Route::get('mostrarRutas', [MostrarRutasController::class, 'crear'])->name('mostrarRutas');
Route::post('/mostrarRutas', [MostrarRutasController::class, 'mostrarTabla'])->name('mostrarRutas.mostrarTabla');
