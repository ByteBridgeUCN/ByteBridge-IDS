<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Travel;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller {

    public function view(){

        return view('auth.BookTicket');

    }

    public function bookTicket(Request $request) {

        $message = makeMessage();
        $this->validate($request, [
            'origin' => ['required'],
            'destination' => ['required'],
            'travelDate' => ['required'],
            'purchasedSeats' => ['required', 'numeric'],
        ],$message);

        $originName = $request->input('origin');

        try{

            $originId = City::where('name', $originName)->first()->id;

        }catch( \Exception $e ){

            return back()->with('message', "no existe la ciudad de origen seleccionada");

        }

        $destinationName = $request->input('destination');

        try{

            $destinationId = City::where('name', $destinationName)->first()->id;

        }catch( \Exception $e ){

            return back()->with('message', "no existe la ciudad de destino seleccionada");

        }

        $travel = Travel::where('originId', $originId)->where('destinationId', $destinationId)->first();

        if(!$travel){

            return back()->with('message', "no hay rutas disponibles entre las ciudades seleccionadas");

        }

        $totalTravelsDay = Ticket::where('travelId', $travel->id)->where('travelDate', $request->input('travelDate'))->get();

        if($totalTravelsDay){

            $purchasedSeats = 0;

            foreach($totalTravelsDay as $ticket){

                $purchasedSeats += $ticket->purchasedSeats;

            }

            $availableSeats = $travel->totalSeats - $purchasedSeats;

            if($availableSeats < $request->input('purchasedSeats')){

                return back()->with('message', "no hay servicios disponibles para la ruta seleccionada");

            }

        }

        $price = $travel->baseRate * $request->input('purchasedSeats');

        $ticketCode = $this->generateTicketCode();

        while(Ticket::where('ticketCode', $ticketCode)->first()){

            $ticketCode = $this->generateTicketCode();

        }

        $ticket = Ticket::create(
            [
                'travelId' => $travel->id,
                'userId' => $request->userId,
                'travelDate' => $request->input('travelDate'),
                'purchaseDate' => now(),
                'purchasedSeats' => $request->input('purchasedSeats'),
                'price' => $price,
                'ticketCode' => $this->generateTicketCode()
            ]
        );

        $origin = City::where('id', $travel->originId)->first();
        $destination = City::where('id', $travel->destinationId)->first();

        return view('auth.showTicket', compact('ticket', 'origin', 'destination'));

        //Alexis: Agrege el return view para obtener los datos pero no estoy seguro si
        //se hace en esta funcion o se debe de crear otra funcion
        //@PabloRobledo
        return view('auth.BookTicket', compact('ticket', 'origin', 'destination'));

    }

    private function generateTicketCode(){
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomLetters = '';
        $randomNumbers = '';

        for ($i = 0; $i < 4; $i++) {
            $randomLetters .= $letters[rand(0, strlen($letters) - 1)];
        }

        for ($i = 0; $i < 2; $i++) {
            $randomNumbers .= rand(0, 9);
        }

        $ticketCode = $randomLetters . $randomNumbers;

        return $ticketCode;
    }

}
