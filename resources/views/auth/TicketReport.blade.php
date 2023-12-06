<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
    @vite(['resources/css/TicketReport.css'])
</head>
<body>
    <h1>Reporte de Reservas</h1>
    
    <div class="back-button-container">
        <a href="{{ route('AdminHome') }}" class="back-button">Volver</a>
    </div>
    <div class = "date-container">
        <form id="dateFilterForm">
            <label for="beginDate">Fecha de Inicio:</label>
            <br>
            <input type="date" id="beginDate" name="beginDate" class="flatpickr" placeholder="Seleccionar fecha">
            
            <br>

            <label for="endDate">Fecha de Fin:</label>
            <br>
            <input type="date" id="endDate" name="endDate" class="flatpickr" placeholder="Seleccionar fecha">

            <br>
            
            <button type="button" onclick="filterTickets()">Filtrar</button> 
        </form>

        <div class = "table-container">
        @if($listTickets)
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
                    @foreach($listTickets as $pos)
                        <tr>
                            <td>{{ $pos['ticket']->ticketCode }}</td>
                            <td>{{ \Carbon\Carbon::parse($pos['ticket']->purchaseDate)->locale('es_ES')->formatLocalized('%d/%m/%Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pos['ticket']->purchaseDate)->locale('es_ES')->isoFormat('dddd') }}</td>
                            <td>{{ $pos['origin']->name }}</td>
                            <td>{{ $pos['destination']->name }}</td>
                            <td>{{ $pos['ticket']->purchasedSeats }}</td>
                            <td>${{ number_format($pos['ticket']->price, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no hay reservas en sistema</p>
        @endif
    </div>
    </div>
    
    
</body>
</html>
