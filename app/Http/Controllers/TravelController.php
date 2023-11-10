<?php

namespace App\Http\Controllers;
use App\Models\Tramo;
use App\Models\Travel;
use App\Models\Ticket;

use Illuminate\Http\Request;

class TravelController extends Controller {

    public function store(Request $request) {

        // Create travel
        Tramo::create(
            [
                'originId' => $request->originId,
                'destinationId' => $request->destinationId,
                'totalSeats' => $request->totalSeats,
                'baseRate' => $request->baseRate
            ]
        );

    }

    public function obtainOrigins()
    {
        $origins = Travel::distinct()->orderBy('originId', 'asc')->pluck('originId');

        return response()->json([
            'originIds' => $origins,
        ]);
    }

    public function obtainDestinations()
    {
        $destinations = Travel::distinct()->orderBy('destinationId', 'asc')->pluck('destinationId');

        return response()->json([
            'destinationIds' => $destinations,
        ]);
    }

    public function searchDestinations($origin)
    {
        $destinations = Travel::where('originId', $origin)->orderBy('destinationId', 'asc')->pluck('destinationId');

        return response()->json([
            'destinationIds' => $destinations,
        ]);
    }

    public function seatings($origin, $destination, $date)
    {
        // Obtenemos el viaje segun el origen y destino ingresado.
        $travel = Travel::where('originId', $origin)->where('destinationId', $destination)->first();

        if ($travel) {
            $tickets = Ticket::where('travelId', $travel->id)->where('travelDate', $date)->sum('purchasedSeats');

            $seatNow = $travel->seat_quantity - $tickets;

            return response()->json(['purchasedSeats' => $seatNow, 'travelId' => $travel]);
        }
    }

    public function checkTravel(Request $request)
    {
        dd($request);
    }




}
