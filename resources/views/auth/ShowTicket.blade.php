<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="ticketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ticketModalLabel">Detalles de la Reserva</h5>
                    <a class="back-button" href="{{ route('back') }}">x</a>
                <div class="modal-body">
                    @if($ticket && $origin && $destination)
                        <p>Código de Reserva: {{ $ticket->ticketCode }}</p>
                        <p>Ciudad de Origen: {{ $origin->name }}</p>
                        <p>Ciudad de Destino: {{ $destination->name }}</p>
                        <p>Día de la Reserva: {{ $ticket->travelDate }}</p>
                        <p>Cantidad de Asientos: {{ $ticket->purchasedSeats }}</p>
                        <p>Fecha de la Compra: {{ $ticket->purchaseDate }}</p>
                        <p>Total: {{ $ticket->price }}</p>
                    @else
                        <p>Reserva no encontrada</p>
                    @endif
                </div>
                <a class="back-button" href="{{ route('Home') }}">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
