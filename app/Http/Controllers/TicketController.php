<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request){

        // Create ticket
        Ticket::create(
            [
                'travelId' => $request->travelId,
                'userId' => $request->userId,
                'travelDate' => $request->travelDate,
                'purchaseDate' => $request->purchaseDate,
                'purchasedSeats' => $request->purchasedSeats,
                'price' => $request->price
            ]
        );
    }
}
