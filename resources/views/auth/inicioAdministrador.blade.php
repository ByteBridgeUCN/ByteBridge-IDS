<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #ffffff;
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
    <h1> Hola, {{ Auth::user()['nombre'] }}. Bienvenido a Turjoy!</h1>
    <div class="button-container">
        <a href="{{ route('cargarRutas') }}" class="btn btn-secondary" style="background-color: #0a74d4; color: #fff;">Cargar rutas</a>
        <a href="#" class="btn btn-secondary" style="background-color: #333333; color: #fff;">Buscar rutas</a>
        <a href="#" class="btn btn-secondary" style="background-color: #2ecc71; color: #fff;">Reportes de reserva</a>
    </div>
</body>

</html>
