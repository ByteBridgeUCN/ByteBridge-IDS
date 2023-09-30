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

Route::get('iniciarsesion', [IniciarSesionController::class, 'vista'])->name('iniciarSesion');
Route::post('/iniciarsesion', [IniciarSesionController::class, 'entrar'])->name('iniciarSesion.entrar');

Route::middleware(['auth'])->group(function () {

    Route::get('inicioAdministrador', [InicioAdminController::class, 'vista'])->name('inicioAdministrador');

    Route::get('cargarRutas', [CargarRutasController::class, 'vista'])->name('cargarRutas');
    Route::post('/cargarRutas', [CargarRutasController::class, 'importarRutas'])->name('cargarRutas.importar');

    Route::get('mostrarRutas', [MostrarRutasController::class, 'vista'])->name('mostrarRutas');
    Route::post('/mostrarRutas', [MostrarRutasController::class, 'mostrarTabla'])->name('mostrarRutas.mostrarTabla');

});

Route::get('/login', function () {
    return view('login');
})->name('login.php');
