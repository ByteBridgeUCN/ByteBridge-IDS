<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy | Administrador: {{ Auth::user()['name'] }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @vite(['resources/css/AdminHome.css'])
    @extends('layouts.app')
</head>

<body>
    <div class="contenedor-administrador">
        <h1> Hola, {{ Auth::user()['name'] }}. ¡Bienvenido a Turjoy!</h1>
        <div class="button-container">
            <a href="{{ route('LoadRoutes') }}" class="boton-cargar-rutas">Cargar rutas</a>
            <a href="#" class="boton-buscar-ruta">Buscar rutas</a>
            <a href="#" class="boton-reporte-reserva" ">Reportes de reserva</a>
        </div>
    </div>



</body>

</html>
