<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Turjoy | Cargar rutas</title>

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
    @vite('resources/css/LoadRoutes.css')
    @extends('layouts.app')

</head>
<body>
    <div class="back-button-container">
        <a
            href="{{ route('AdminHome') }}"
            class="back-button"
            data-bs-toggle="tooltip"
            data-bs-placement="right"
            data-bs-title="Volver al menú del administrador"
            >Volver
        </a>
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
                        <button
                            type="submit"
                            class="load-file-button"
                            data-bs-toggle="tooltip"
                            data-bs-placement="bottom"
                            data-bs-title="Subir archivo de las rutas"
                        >

                            <span class = 'text'>Subir</span>
                            <span class = 'icon'>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-upload" width="12" height="12" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" />
                                    <path d="M7 9l5 -5l5 5" />
                                    <path d="M12 4l0 12" />
                                </svg>
                            </span>
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


