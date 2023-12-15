<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Travel;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use Storage;

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

        $originId = $request->input('origin');


        try{

            $originId = City::where('id', $originId)->first()->id;

        }catch( \Exception $e ){

            return back()->with('message', "no existe la ciudad de origen seleccionada");

        }

        $destinationId = $request->input('destination');

        try{

            $destinationId = City::where('id', $destinationId)->first()->id;

        }catch( \Exception $e ){

            return back()->with('message', "no existe la ciudad de destino seleccionada");

        }


        $travel = Travel::where('originId', $originId)->where('destinationId', $destinationId)->first();

        if(!$travel){

            return back()->with('message', "por el momento no es posible realizar reservas, intente más tarde.");

        }

        $totalTravelsDay = Ticket::where('travelId', $travel->id)->where('travelDate', $request->input('travelDate'))->get();

        if($totalTravelsDay){

            $purchasedSeats = 0;

            foreach($totalTravelsDay as $ticket){

                $purchasedSeats += $ticket->purchasedSeats;

            }

            $availableSeats = $travel->totalSeats - $purchasedSeats;

            if($availableSeats < $request->input('purchasedSeats')){

                return back()->with('message', "debe seleccionar la cantidad de asientos antes de realizar la reserva");

            }

            if ($purchasedSeats == "") {
                return back()->with('message', "debe seleccionar la cantidad de asientos antes de realizar la reserva");

            }
        }

        if(!$request->input('purchasedSeats')){
            return back()->with('message', "deben exister asientos");
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
                'ticketCode' => $ticketCode
            ]
        );

        $origin = City::where('id', $travel->originId)->first();
        $destination = City::where('id', $travel->destinationId)->first();

        // Generate PDF
        $pdf = PDF::loadView('auth.showTicket', compact('ticket', 'origin', 'destination'));
        $pdfPath = 'pdf/' . $ticketCode . '_turjoy.pdf';
        Storage::disk('public')->put($pdfPath, $pdf->output());

        return view('auth.showTicket', compact('ticket', 'origin', 'destination'));

    }

    private function generateTicketCode(){

        $pattern = '/^[A-Z]{4}\d{2}$/';

        do {

            $randomLetters = strtoupper(Str::random(4));
            $randomNumbers = str_pad(rand(10, 99), 2, '0', STR_PAD_LEFT);

            $ticketCode = $randomLetters . $randomNumbers;

            $response = Ticket::where('ticketCode', $ticketCode)->first();

        } while(!preg_match($pattern, $ticketCode));

        return $ticketCode;

    }



    public function filterTicketReport(Request $request) {
        $beginDate = $request->input('beginDate');
        $endDate = $request->input('endDate');

        // Validar que las fechas sean válidas y que endDate sea mayor o igual a beginDate
        if (!$this->validateDate($beginDate) || !$this->validateDate($endDate)) {
            return back()->with('message', 'Las fechas ingresadas no son válidas.');
        }

        else if ($endDate < $beginDate) {
            return back()->with('message', 'la fecha de inicio a consultar no puede ser mayor que la fecha de término de la consulta');
        }

        $beginDateCarbon = \Carbon\Carbon::parse($beginDate)->startOfDay();
        $endDateCarbon = \Carbon\Carbon::parse($endDate)->endOfDay();

        $tickets = Ticket::whereBetween('purchaseDate', [$beginDateCarbon, $endDateCarbon])->orderBy('purchaseDate')->get();

        if (count($tickets) == 0) {
            return back()->with('message', 'no se encontraron reservas dentro del rango seleccionado');
        }

        $listTickets = [];

        foreach ($tickets as $ticket) {
            $travel = Travel::where('id', $ticket->travelId)->first();
            $origin = City::where('id', $travel->originId)->first();
            $destination = City::where('id', $travel->destinationId)->first();

            $listTickets[] = [
                'ticket' => $ticket,
                'origin' => $origin,
                'destination' => $destination
            ];
        }

        return view('auth.ticketReport', compact('listTickets'));
    }

    private function validateDate($date) {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
}
