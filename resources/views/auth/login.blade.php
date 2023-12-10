<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy | Iniciar Sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    @vite(['resources/css/Login.css'])


</head>

<body>

    <div class="container">
        <h1>Iniciar sesión</h1>
        <form method="POST" action="{{ route('Auth') }}" novalidate>
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Correo electrónico</label>
                <input  class="email-input form-control" type="email" name="email" id="email" aria-describedby="emailHelp">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Contraseña</label>
                <input class="password-input form-control" type="password" name="password" id="password">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror


            </div>
            @if (session('message'))
                <p>{{ session('message') }}</p>
            @endif
            <div class="button-container">
                <button
                    type="submit"
                    class="login-button"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Iniciar sesión"
                    >Ingresar
                </button>

                <a
                    href="{{ route('Home') }}"
                    class="back-button"
                    data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-title="Volver a la página principal"
                    >Volver
                </a>
            </div>


        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

</body>
</html>
