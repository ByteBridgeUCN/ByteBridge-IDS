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
    <div class="back-button-container">
        <a href="{{ route('AdminHome') }}" class="back-button">Volver</a>
    </div>
    <div class="container">
        <div class="row justify-content-center align-items-center" >
            <div class="col-6 text-center">
                <h1>Cargar Rutas</h1>
                <form class="form" method="POST" action="{{ route('LoadRoutes.import') }}" enctype="multipart/form-data">
                    @csrf
                    <label>Escoge un archivo</label>
                    <input type="file" name="file" class="form-control" />
                    <div class = "load-file-button-volver">
                        <button type="submit" class="load-file-button">
                            <span>Subir</span>
                            <img src="{{asset('ticket.png')}}" height="32" width="32">
                        </button>
                    </div>
                </form>
            </div>
            <div class = "alert-container">
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


