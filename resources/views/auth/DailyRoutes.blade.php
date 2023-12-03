<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @vite(['resources/css/DailyRoutes.css'])
    @extends('layouts.app')
</head>

<body>
    <div class="container-main">
        <h1>Rutas del día</h1>
        <span id="datetime"></span>
        @if($listRoutes)
            <table>
                <thead>
                    <tr>
                        <th>Ciudad de Origen</th>
                        <th>Ciudad de Destino</th>
                        <th>Cantidad de Asientos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listRoutes as $route)
                        <tr>
                            <td>{{ $route->originCity->name }}</td>
                            <td>{{ $route->destinationCity->name }}</td>
                            <td>{{ $route->totalSeats }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no hay reservas en sistema</p>
        @endif

        <div class="dr-button-container">

            <a class="back-button-home separate" href="{{ route('Home') }}">Volver</a>
            <a class="reload-page-button separate" href="{{ route('DailyRoutes') }}">Recargar</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        // create a function to update the date and time
        function updateDateTime() {
          // create a new `Date` object
          const now = new Date();

          // get the current date and time as a string
          const currentDateTime = now.toLocaleString();

          // update the `textContent` property of the `span` element with the `id` of `datetime`
          document.querySelector('#datetime').textContent = currentDateTime;
        }

        // call the `updateDateTime` function every second
        setInterval(updateDateTime, 1000);
      </script>
</body>

</html>
