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
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method = "POST">
                    <h2>Login</h2>

                    <div class="input-box">
                        @csrf
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email" id="email">
                        <label>Correo electrónico</label>
                        @error('email')
                            <p>{{ $message }}</p>
                        @enderror

                    </div>

                    <div class="input-box">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="contrasena" id="contrasena">
                        <label>Contraseña</label>
                        <button type="button" class="boton-mostrar-contrasena" onclick="togglePasswordVisibility()">Mostrar contraseña</button>
                        @error('contrasena')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="button-container">
                        <button type ="submit" class="login-button">Ingresar</button>
                        <a href="{{ route('inicio') }}" class="back-button">Volver</a>
                    </div>

                    <div class="olvidar-contrasena">
                        <label for=""><input type="checkbox">Recuerdame para otra sesion.<a href="#">¿Olvido su contraseña? Haga click aquí.</a></label>
                    </div>
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
