<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turjoy | Cargar rutas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @vite('resources/css/LoadRoutes.css')
    @extends('layouts.app')

</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-6 text-center">
                <h1>Cargar Rutas</h1>
                <form class="form" method="POST" action="{{ route('LoadRoutes.import') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Escoge un archivo</label>
                    <input type="file" name="file" class="form-control" />
                    <div class = "load-file-button-container">
                        <button type="submit" class="boton-cargar" >Cargar</button>
                    </div>
                </form>
                <div class="container-boton-volver">
                    <a href="{{ route('AdminHome') }}" class="boton-volver">Volver</a>
                </div>
                @if(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
