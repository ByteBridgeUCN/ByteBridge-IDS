<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\auth\LogInController;
use App\Http\Controllers\auth\InicioController;
use App\Http\Controllers\auth\AdminHomeController;
use App\Http\Controllers\auth\GetTravelsController;
use App\Http\Controllers\auth\ShowRoutesController;
use App\Http\Controllers\auth\SearchTicketController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TravelController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DailyRoutesController;

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

Route::get('/', function () { return view('auth.Home'); })->name('Home')->middleware('guest');

Route::get('Controller', [Controller::class, 'redirectToPreviousView'])->name('back');

Route::get('Login', [LogInController::class, 'view'])->name('Login');
Route::post('/Login', [LogInController::class, 'auth'])->name('Auth');

Route::get('BookTicket', [TicketController::class, 'view'])->name('BookTicket');
Route::post('/BookTicket', [TicketController::class, 'bookTicket'])->name('BookTicket.bookTicket');


Route::get('SearchTicket', [SearchTicketController::class, 'view'])->name('SearchTicket');
Route::post('/SearchTicket', [SearchTicketController::class, 'search'])->name('SearchTicket.search');

Route::get('/get/origins', [TravelController::class, 'obtainOrigins']);
Route::get('/get/destinations/{origin}', [TravelController::class, 'searchDestinations']);
Route::get('/seating/{origin}/{destination}/{date}', [TravelController::class, 'seatings']);
Route::get('/checkBaseRate/{origin}/{destination}', [TravelController::class, 'checkBaseRate']);
Route::get('BookTicket', [TravelController::class, 'routesExists'])->name('BookTicket');

Route::get('DailyRoutes', [DailyRoutesController::class, 'view'])->name('DailyRoutes');
Route::get('DailyRoutes', [DailyRoutesController::class, 'showDailyRoutes'])->name('DailyRoutes');


Route::middleware(['auth'])->group(function () {

    Route::get('Home', [LogInController::class, 'logout'])->name('Logout');

    Route::get('AdminHome', [AdminHomeController::class, 'view'])->name('AdminHome');

    Route::get('LoadRoutes', [GetTravelsController::class, 'view'])->name('LoadRoutes');
    Route::post('/LoadRoutes', [GetTravelsController::class, 'importTravels'])->name('LoadRoutes.import');

    Route::get('ShowRoutes', [ShowTravelsController::class, 'view'])->name('ShowRoutes');

    Route::get('TicketReport', [TicketController::class, 'ticketReport'])->name('TicketReport');

    Route::post('TicketReport', [TicketController::class, 'filterTicketReport'])->name('FilterTicketReport');
});
