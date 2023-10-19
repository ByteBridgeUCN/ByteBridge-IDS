<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
</head>

<body>
    <div class="container-main">
        <h1>Reservar pasajes</h1>
        <div class="back-button-container">
            <a href="{{ route('Home') }}" class="back-button">Volver</a>
        </div>
    </div>
</body>

</html>
