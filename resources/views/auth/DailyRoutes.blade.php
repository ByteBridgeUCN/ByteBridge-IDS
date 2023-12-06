<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @vite(['resources/css/DailyRoutes.css'])
    @extends('layouts.app')
</head>

<body>
    <div class="container-main">
        <h1>Rutas del día</h1>
        <span id="datetime"></span>
        @if($listRoutes->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Ciudad de Origen</th>
                        <th>Ciudad de Destino</th>
                        <th>Cantidad de Asientos</th>
                        <th>Precio por asiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listRoutes as $route)
                        <tr>
                            <td>{{ $route->originCity->name }}</td>
                            <td>{{ $route->destinationCity->name }}</td>
                            <td>{{ $route->totalSeats }}</td>
                            <td>{{ $route->baseRate }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="custom-pagination">
                <ul class="pagination">
                    {{-- Botón "Anterior" --}}
                    @if ($listRoutes->onFirstPage())
                        <li class="page-item disabled"><span class="page-link">Anterior</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $listRoutes->previousPageUrl() }}">Anterior</a></li>
                    @endif

                    {{-- Botón "Siguiente" --}}
                    @if ($listRoutes->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $listRoutes->nextPageUrl() }}">Siguiente</a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
                    @endif
                </ul>
            </div>

        @else
            <p>No existen rutas por el momento. Vuelva a intentarlo más tarde</p>
        @endif

        <div class="dr-button-container">
            <a class="back-button-home separate" href="{{ route('Home') }}">Volver</a>
            <a class="reload-page-button separate" href="{{ route('DailyRoutes') }}">Recargar</a>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

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
