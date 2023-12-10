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
                        <p>Total: ${{ number_format($ticket->price, 0, ',', '.') }}</p>
                    @else
                        <p>Reserva no encontrada</p>
                    @endif
                </div>
                <a
                    class="back-button-menu" href="{{ Auth::user() ? route('AdminHome') : route('Home') }}"
                    class="back-button"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Volver al menú del administrador"
                    >Volver
                </a>

                <a
                    class="print-button" href="{{ Auth::user() ? route('AdminHome') : route('Home') }}"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Volver al menú del administrador"
                    >Guardar boleta
                </a>

            </div>
        </div>
    </div>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous">
    </script>
</body>
</html>
