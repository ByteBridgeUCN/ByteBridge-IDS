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
            <img src="logoturjoy.png" alt="Logo" style="max-width: 100%;">

            <button class="btn-buscar-reserva">Buscar reservas</button>
            <button class="btn-reservar">Reservar pasajes</button>
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
