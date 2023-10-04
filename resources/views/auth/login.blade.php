<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy | Log-in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    @vite(['resources/css/login.css'])

    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>
    <div class="container">
        <div class="inner-box">
            <div class="content">
                <h1>Iniciar sesión</h1>
                <form method = "POST" action = "{{ route('autenticar') }}" novalidate>
                    @csrf
                    <div class="input-container">
                        <input type="email" name="email" id="email" placeholder="correo electrónico">
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror
                        <input type="password" name="password" id="contrasena" placeholder="contraseña">
                        <button type="button" class="show-password-button" onclick="togglePasswordVisibility()">Mostrar contraseña</button>
                        @error('password')
                            <p>{{ $message }}</p>
                        @enderror
                        @if (session('message'))
                            <p>{{ session('message') }}</p>

                        @endif
                        <button type ="submit" class="login-button">Ingresar</button>
                        <a href="{{ route('inicio') }}" class="back-button">Volver</a>
                </form>
            </div>
        </div>
    </section>



    <script>
        // Función para alternar la visibilidad de la contraseña
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("contrasena");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>
