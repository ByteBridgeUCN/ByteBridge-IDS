<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function store(Request $request){

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
}
