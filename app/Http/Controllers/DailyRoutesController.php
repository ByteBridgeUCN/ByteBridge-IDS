<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Travel;
use App\Models\Ticket;
use Carbon\Carbon;

class DailyRoutesController extends Controller
{
    // Crear función que muestre la vista de inicio de sesión de administrador
    public function view() {

        $fechaActual = now();
        return view('auth.DailyRoutes');

    }

    public function showDailyRoutes(){

        $fechaActual = Carbon::now()->format('Y-m-d');

        $listRoutes = Travel::with('originCity', 'destinationCity')
        ->orderBy('id')
        ->paginate(10);

        foreach($listRoutes as $route){
            $ticket = Ticket::where('travelId', $route->id)->whereDate('purchaseDate', $fechaActual)->first();
            if($ticket){
                $purchasedSeats = $ticket ? $ticket->purchasedSeats : null;
                $route->totalSeats = $route->totalSeats - $purchasedSeats;
            }
        }

        return view('auth.DailyRoutes', compact('listRoutes'));

    }
}
