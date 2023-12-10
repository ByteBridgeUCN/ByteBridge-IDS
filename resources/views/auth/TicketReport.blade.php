<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Report</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>


    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
    @vite(['resources/css/TicketReport.css'])
</head>

<body>
    <h1>Reporte de Reservas</h1>

    <div class="back-button-container">
        <a
            href="{{ route('AdminHome') }}"
            class="back-button"
            data-bs-toggle="tooltip"
            data-bs-placement="right"
            data-bs-title="Ir al menú de administrador"
            >Volver
        </a>
    </div>
    <div class = "date-container">
        <div>
            <form id="dateFilterForm" action="{{ route('FilterTicketReport') }}" method="post">
                @csrf
                <label for="beginDate">Fecha de Inicio:</label>
                <br>
                <input type="date" id="beginDate" name="beginDate" class="flatpickr" placeholder="Seleccionar fecha">
                <br>
                <label for="endDate">Fecha de Fin:</label>
                <br>
                <input type="date" id="endDate" name="endDate" class="flatpickr" placeholder="Seleccionar fecha">
                <br>
                <button
                    type="submit"
                    data-bs-toggle="tooltip"
                    data-bs-placement="right"
                    data-bs-title="Filtrar datos"
                    >Filtrar
                </button>
            </form>
            <button
                id="limpiarFiltrosBtn"
                style="margin-top: 10px"
                data-bs-toggle="tooltip"
                data-bs-placement="right"
                data-bs-title="Refrescar fechas seleccionadas"
                >Refrescar
            </button>
        </div>
        <div class = "table-container">
            @if ($listTickets)
                <table>
                    <thead>
                        <tr>
                            <th>Código de Reserva</th>
                            <th>Fecha de Reserva</th>
                            <th>Día de Reserva</th>
                            <th>Ciudad de Origen</th>
                            <th>Ciudad de Destino</th>
                            <th>Cantidad de Asientos</th>
                            <th>Valor Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listTickets as $pos)
                            <tr>
                                <td>{{ $pos['ticket']->ticketCode }}</td>
                                <td>{{ \Carbon\Carbon::parse($pos['ticket']->purchaseDate)->locale('es_ES')->formatLocalized('%d/%m/%Y') }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($pos['ticket']->purchaseDate)->locale('es_ES')->isoFormat('dddd') }}
                                </td>
                                <td>{{ $pos['origin']->name }}</td>
                                <td>{{ $pos['destination']->name }}</td>
                                <td>{{ $pos['ticket']->purchasedSeats }}</td>
                                <td>${{ number_format($pos['ticket']->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="warning-display">
                <p>no hay reservas en sistema</p>
            </div>

            @endif
        </div>
    </div>
    <div class="error-message">
        @if (session('message'))
            <p>{{ session('message') }}</p>
        @endif
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
<script>
    document.getElementById('limpiarFiltrosBtn').addEventListener('click', function() {
        window.location.href = "{{ route('TicketReport') }}";
    });
</script>

</html>
