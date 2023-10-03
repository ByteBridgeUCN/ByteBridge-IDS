<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        .corner-button {
            background-color: #ffff;
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 10px;
        }

    </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @extends('layouts.app')
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-6 text-center">
                <h1>Cargar Rutas</h1>
                <form class="form" method="POST" action="{{ route('cargarRutas.importar') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Escoge un archivo</label>
                    <input type="file" name="archivo" class="form-control" />
                    <div>
                        <button type="submit" class="btn btn-secondary" style="background-color: #2ecc71; color: #fff;" >Cargar</button>
                    </div>
                </form>
                <div class="corner-button">
                    <a href="{{ route('inicioAdministrador') }}" class="btn btn-secondary" style="background-color: #ff6b6b; color: #fff;">Volver</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
