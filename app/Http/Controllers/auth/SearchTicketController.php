<?php

namespace App\Http\Controllers\auth;

use App\Models\Ticket;
use App\Models\Travel;
use App\Models\City;
use App\Helpers\MyHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchTicketController extends Controller {

    public function view() {

        return view('auth.SearchTicket');

    }

    public function search(Request $request) {

        $message = makeMessage();
        $this->validate($request, [
            'ticketCode' => ['required']
        ],$message);
        $ticketCode = $request->input('ticketCode');
        $ticket = Ticket::where('ticketCode', $ticketCode)->first();

        if (!$ticket) {

            return back()->with('message', "la reserva $ticketCode no existe en sistema");

        }

        $travel = Travel::where('id', $ticket->travelId)->first();
        $origin = City::where('id', $travel->originId)->first();
        $destination = City::where('id', $travel->destinationId)->first();
        return view('auth.showTicket', compact('ticket', 'origin', 'destination'));
    }

}
