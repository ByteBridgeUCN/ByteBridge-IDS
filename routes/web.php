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
    return view('welcome');
});
