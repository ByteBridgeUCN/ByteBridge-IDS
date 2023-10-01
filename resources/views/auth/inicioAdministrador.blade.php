<!DOCTYPE html>
<html lang="es">

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
    <p> Hola, {{ Auth::user()['nombre'] }}. Bienvenido a Turjoy! </p>
    <div class="button-container">
        <a href="{{ route('cargarRutas') }}" class="btn btn-primary">Cargar rutas</a>
        <a href="{{ route('inicio') }}" class="btn btn-secondary">Buscar reservas</a>
    </div>
</body>

</html>
