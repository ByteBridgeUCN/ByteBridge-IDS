<?php

namespace App\Http\Controllers;
use App\Models\Tramo;
use App\Models\Travel;
use App\Models\Ticket;
use App\Models\City;

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

        $names = City::whereIn('id', $origins)
                    ->orderByRaw("FIELD(id, " . implode(",", $origins->toArray()) . ")")
                    ->pluck('name');

        return response()->json([
            'originIds' => $origins,
            'originNames'=> $names
        ]);
    }

    public function obtainDestinations()
    {
        $destinations = Travel::distinct()->orderBy('destinationId', 'asc')->pluck('destinationId');

        $names = City::whereIn('id', $destinations)
                    ->orderByRaw("FIELD(id, " . implode(",", $destinations->toArray()) . ")")
                    ->pluck('name');

        return response()->json([
            'destinationIds' => $destinations,
            'destinationNames'=> $names,
        ]);
    }

    public function searchDestinations($origin)
    {
        $destinations = Travel::where('originId', $origin)->orderBy('destinationId', 'asc')->pluck('destinationId');
        $names = City::whereIn('id', $destinations)
                    ->orderByRaw("FIELD(id, " . implode(",", $destinations->toArray()) . ")")
                    ->pluck('name');

        return response()->json([
            'destinationIds' => $destinations,
            'destinationNames'=> $names,
        ]);
    }

    public function seatings($origin, $destination, $date)
    {
        // Obtenemos el viaje segun el origen y destino ingresado.
        $travel = Travel::where('originId', $origin)->where('destinationId', $destination)->first();

        if ($travel) {
            $tickets = Ticket::where('travelId', $travel->id)->where('travelDate', $date)->sum('purchasedSeats');

            $seatNow = $travel->totalSeats - $tickets;

            return response()->json(['purchasedSeats' => $seatNow, 'travelId' => $travel]);
        }
    }

    public function checkBaseRate($origin, $destination)
    {
        // Obtenemos el viaje segun el origen y destino ingresado.
        $travelBaseRate = Travel::where('originId', $origin)->where('destinationId', $destination)->first()->baseRate;
        return response()->json(['baseRate' => $travelBaseRate]);
    }

}
