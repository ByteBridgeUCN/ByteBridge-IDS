<!DOCTYPE html>
<html>

    <head>
        <title>Turjoy | Buscar reservas </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        @extends('layouts.app')
        @vite(['resources/css/BookTicket.css'])
    </head>

    <body>
        <div class="container mt-5">
            <h2>Buscar reserva por código de viaje</h2>
            <form method="POST" action="{{ route('SearchTicket.search') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="ticketCode" ></label>
                    <input type="text" class="form-control" id="ticketCode" name="ticketCode" placeholder="Código de la reserva"  maxlength="6" style="text-transform: uppercase;" required >
                    @error('ticketCode')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Buscar Reserva</button>
            </form>
            @if (session('message'))
                <p>{{ session('message') }}</p>
            @endif
            <a class="back-button" href="{{ route('Home') }}">Volver</a>
        </div>
    </body>

    <script>
        $(document).ready(function () {
            @if(isset($ticket))
                $('#ticketModal').modal('show');
            @endif
        });
    </script>

</html>
