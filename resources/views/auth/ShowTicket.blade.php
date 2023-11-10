<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turjoy | Boleta </title>
    @vite(['resources/css/ShowTicket.css'])

</head>
<body>


    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="back-button-ticket" href="{{ route('back') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 48 48">
                            <path fill="#ff6b6b" d="M44,24c0,11.045-8.955,20-20,20S4,35.045,4,24S12.955,4,24,4S44,12.955,44,24z"></path>
                            <path fill="#fff" d="M29.656,15.516l2.828,2.828l-14.14,14.14l-2.828-2.828L29.656,15.516z"></path>
                            <path fill="#fff" d="M32.484,29.656l-2.828,2.828l-14.14-14.14l2.828-2.828L32.484,29.656z"></path>
                        </svg>
                    </a>
                    <h5 class="modal-title" id="ticketModalLabel">Detalles de la Reserva</h5>
                <div class="modal-body">
                    @if($ticket && $origin && $destination)
                        <p>Código de reserva: {{ $ticket->ticketCode }}</p>
                        <p>Ciudad de origen: {{ $origin->name }}</p>
                        <p>Ciudad de destino: {{ $destination->name }}</p>
                        <p>Día de la reserva: {{ \Carbon\Carbon::parse($ticket->travelDate)->format('d/m/Y') }}</p>
                        <p>Cantidad de asientos: {{ $ticket->purchasedSeats }}</p>
                        <p>Fecha de la compra: {{ \Carbon\Carbon::parse($ticket->purchaseDate)->format('d/m/Y H:i:s') }}</p>
                        <p>Total: ${{ $ticket->price }}</p>
                    @else
                        <p>Reserva no encontrada</p>
                    @endif
                </div>
                <a class="back-button-menu" href="{{ route('Home') }}">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
