<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
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

        .btn-reservar {
            background-color: #2ecc71;
            /* Otros estilos, como el color del texto, el padding, etc., si es necesario */
            color: #fff; /* Cambiar el color del texto a blanco para que se vea mejor en el fondo verde */
            padding: 10px 20px;
            border: none; /* Si deseas quitar el borde del botón */
            text-decoration: none; /* Para quitar subrayado si es un enlace */
            border-radius: 5px; /* Agrega bordes redondos */

            transition: all 0.3;
        }

        .btn-buscar-reserva {
            background-color: #0a74da;
            /* Otros estilos, como el color del texto, el padding, etc., si es necesario */
            color: #fff; /* Cambiar el color del texto a blanco para que se vea mejor en el fondo verde */
            padding: 10px 20px;
            border: none; /* Si deseas quitar el borde del botón */
            text-decoration: none; /* Para quitar subrayado si es un enlace */
            border-radius: 5px; /* Agrega bordes redondos */
            transition: all 0.3;
        }
        .btn-reservar:hover{
            transform: translateY(-10px);
        }

        .btn-buscar-reserva:hover{
            transform: translateY(-10px);
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
            <button class="btn-buscar-reserva">Buscar reservas</button>
            <button class="btn-reservar">Reservar pasajes</button>
        </div>
    </div>
    <!-- Incluir los archivos JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
