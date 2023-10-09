<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LogInController;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\auth\InicioAdminController;
use App\Http\Controllers\auth\GetTravelsController;
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
})->name('inicio')->middleware('guest');

Route::get('iniciarsesion', [LogInController::class, 'view'])->name('iniciarSesion');
Route::post('/iniciarsesion', [LogInController::class, 'auth'])->name('autenticar');

Route::middleware(['auth'])->group(function () {

    Route::get('inicio', [LogInController::class, 'logout'])->name('cerrarSesion');

    Route::get('inicioAdministrador', [InicioAdminController::class, 'vista'])->name('inicioAdministrador');

    Route::get('cargarRutas', [GetTravelsController::class, 'view'])->name('cargarRutas');
    Route::post('/cargarRutas', [GetTravelsController::class, 'importTravels'])->name('cargarRutas.importar');

    Route::get('mostrarRutas', [ShowTravelsController::class, 'view'])->name('mostrarRutas');

});
