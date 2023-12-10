<!DOCTYPE html>
<html>

    <head>
        <title>Turjoy | Buscar reservas </title>
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
        @extends('layouts.app')
        @vite(['resources/css/SearchTicket.css'])
    </head>

    <body>
        <div class="container mt-5">
            <h2>Buscar reserva por código de viaje</h2>
            <form method="POST" action="{{ route('SearchTicket.search') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="ticketCode" ></label>
                    <input type="text" class="form-control" id="ticketCode" name="ticketCode" placeholder="Código de la reserva"  maxlength="6" style="text-transform: uppercase;" required >
                    @error('ticketCode')
                        <p>{{ $message }}</p>
                    @enderror

                    @if (session('message'))
                    <p>{{ session('message') }}</p>
                    @endif
                </div>
                <div class="search-ticket-button-container">
                    <button
                        type="submit"
                        class="btn btn-primary"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-title="Buscas reserva"
                        >Buscar
                    </button>

                    <a
                        class="search-back-button"
                        href="{{ Auth::user() ? route('AdminHome') : route('Home') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="bottom"
                        data-bs-title="Volver a la página anterior"
                        >Volver
                    </a>
                </div>
            </form>
        </div>



    </body>

    <script>
        $(document).ready(function () {
            @if(isset($ticket))
                $('#ticketModal').modal('show');
            @endif
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

</html>
