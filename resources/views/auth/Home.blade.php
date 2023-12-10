<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    @vite(['resources/css/Home.css'])
    @extends('layouts.app')
</head>

<body>
    <div class="container-main">
        <div class="col-md-6 custom-rectangle">
            <img src="logoturjoy.png" alt="Logo" style="max-width:100%;">

            <div class="home-button-container">
                <a
                    href={{ route('SearchTicket') }}
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Ir a Buscar reservas"
                    class="btn-search-reservation"
                    >Buscar reservas
                </a>
                <a
                    href="{{ route('DailyRoutes') }}"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Ir a Rutas del día"
                    class="btn-dialy-routes"
                    >Rutas del día
                </a>
                <a
                    href="{{ route('BookTicket') }}"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Ir a Reservar pasajes"
                    class="btn-reservation"
                    >Reservar pasajes
                </a>


            </div>

        </div>
    </div>

    <script>
        window.addEventListener("load", function () {
            document.body.classList.add("loaded");
        });
    </script>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous">
    </script>

</body>

</html>
