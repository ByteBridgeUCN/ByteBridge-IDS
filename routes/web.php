<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LogInController;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\auth\AdminHomeController;
use App\Http\Controllers\auth\GetTravelsController;
use App\Http\Controllers\auth\ShowRoutesController;
use App\Http\Controllers\auth\SearchTicketController;
use App\Http\Controllers\TicketController;


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
    return view('auth.Home');
})->name('Home')->middleware('guest');

Route::get('Login', [LogInController::class, 'view'])->name('Login');
Route::post('/Login', [LogInController::class, 'auth'])->name('Auth');

Route::get('BookTicket', [TicketController::class, 'view'])->name('BookTicket');

Route::get('SearchTicket', [SearchTicketController::class, 'view'])->name('SearchTicket');


Route::middleware(['auth'])->group(function () {

    Route::get('Home', [LogInController::class, 'logout'])->name('Logout');

    Route::get('AdminHome', [AdminHomeController::class, 'view'])->name('AdminHome');

    Route::get('LoadRoutes', [GetTravelsController::class, 'view'])->name('LoadRoutes');
    Route::post('/LoadRoutes', [GetTravelsController::class, 'importTravels'])->name('LoadRoutes.import');

    Route::get('ShowRoutes', [ShowTravelsController::class, 'view'])->name('ShowRoutes');

});
