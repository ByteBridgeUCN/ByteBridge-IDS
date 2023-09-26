<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configuración de la página -->
    <title>Iniciar Sesión</title>
    <style>

        body {
            background-color: #0a74d4; /* Color de fondo para todo el cuerpo de la página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Establece la altura de la vista principal al 100% del tamaño de la ventana */
            margin: 0; /* Elimina el margen predeterminado del cuerpo */
        }

        h1 {
            color: #0a74d4; /* Color del encabezado */
            font-family: 'Bebas Neue', sans-serif; /* Fuente del encabezado */
            font-size: 50px;
            margin-top: 20px;
        }

        input {
            width: 460px;
            height: 30px;
            border: solid #333333; /* Borde del campo de entrada */
            border-radius: 15px;
            padding: 10px;
            margin: 30px;
            background-color: #eaeaea; /* Color de fondo del campo de entrada */
        }

        .input-box input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
        }

        button{
            border: solid #333333;
        }

        .container {
            background-color: #f4f4f4; /* Color de fondo del contenedor principal */
            width: 600px;
            height: 670px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra del contenedor */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .inner-box {
            background-color: #0a74d4; /* Color de fondo del contenedor interior */
            width: 560px;
            height: 624px;
            border-radius: 20px;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content {
            background-color: #f4f4f4; /* Color de fondo del contenido principal */
            width: 520px;
            height: 580px;
            border-radius: 20px;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .input-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-button {
            background-color: #2ecc71;
            color: #ffffff;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 30px;
            width: 200px;
            height: 50px;
            text-align: center;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer;
            text-decoration: none;
            display: flex; /* Usar flexbox */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }

        /* Estilos para el botón de mostrar/ocultar contraseña */
        .show-password-button {
            background-color: transparent;
            color: #333333;
            border: none;
            cursor: pointer;
        }

        .button-container {
            display: flex;
            flex-direction: column; /* Apila los elementos verticalmente */
            align-items: center;
            margin-top: 20px; /* Espacio entre los elementos */
        }

        .button-container button,

        .button-container a {
            margin-top: 10px; /* Espacio entre el botón "Ingresar" y el enlace "Volver" */
        }

        .back-button {
            background-color: #ff6b6b;
            color: #ffffff;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 30px;
            width: 195px;
            height: 44px;
            text-align: center;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer;
            text-decoration: none;
            display: flex; /* Usar flexbox */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
            border: 3px solid #333333; /* Agregar el contorno */
        }

    </style>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>
    <div class="container">
        <div class="inner-box">
            <div class="content">
                <h1>Iniciar sesión</h1>
                <form method="POST" action="{{ route('iniciarsesion.almacenar') }}">
                    <div class="input-container">
                        <input type="email" name="email" id="email" placeholder="correo electrónico">
                        @error('email')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                        @enderror
                        <div class="input-container">
                            <input type="password" name="contrasena" id="contrasena" placeholder="contraseña">
                            <button type="button" class="show-password-button" onclick="togglePasswordVisibility()">Mostrar contraseña</button>
                            @error('password')
                                <p class="bg-red-500 text-white my-2 rounded-lg text-lg text-center p-2">{{ $message }}</p>
                            @enderror
                            <div class="button-container">
                                <button type ="submit" class="login-button">Ingresar</button>
                                <a href="{{ route('inicio') }}" class="back-button">Volver</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

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
        // Función para leer el valor del campo de entrada de correo electrónico y contraseña
        function parametrosAdministrador() {
            var correoElectronico = document.getElementById("correo").value;
            var contrasena = document.getElementById("contrasena").value;

        }
    </script>

</body>
</html>
