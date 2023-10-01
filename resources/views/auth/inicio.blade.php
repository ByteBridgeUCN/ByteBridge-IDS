<!DOCTYPE html>
<html>

<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #ffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
    </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
</head>

<body>
    <!-- Contenedor principal para el rectángulo, imagen y botones -->
    <div class="container-main">
        <div class="col-md-6 custom-rectangle">
            <!-- Logo -->
            <img src="logoturjoy.png" alt="Logo" style="max-width: 100%;">
            <!-- Botones -->
            <button class="btn btn-primary custom-button">Buscar reservas</button>
            <button class="btn btn-success custom-button">Reservar pasajes</button>
        </div>
    </div>
    <!-- Incluir los archivos JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
