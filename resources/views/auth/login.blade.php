<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy | Iniciar Sesión</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/Login.css'])


</head>

<body>


    <div class="container">

        <form method="POST" action="{{ route('Auth') }}" novalidate>
            <h1>Iniciar sesion</h1>
            @csrf
            <div class="email-container">
                <input type="email" name="email" id="email" placeholder="Correo electrónico">
                @error('email')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="password-container">

                <input type="password" name="password" id="contrasena" placeholder="Contraseña">
                @error('password')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            @if (session('message'))
            <p>{{ session('message') }}</p>
            @endif

            <div class="button-container">
                <button type="submit" class="login-button">Ingresar</button>
                <a href="{{ route('Home') }}" class="back-button">Volver</a>
            </div>


        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
