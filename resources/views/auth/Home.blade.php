<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    @vite('resources/css/Home.css')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
</head>

<body>
    <div class="container-main">
        <div class="col-md-6 custom-rectangle">
            <img src="logoturjoy.png" alt="Logo" style="max-width:100%;">

            <a href={{ route('SearchTicket') }} class="btn-search-reservation">Buscar reservas</a>
            <a href="{{ route('BookTicket') }}" class="btn-reservation">Reservar pasajes</a>
        </div>
    </div>
    <script>
        window.addEventListener("load", function () {
            document.body.classList.add("loaded");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
