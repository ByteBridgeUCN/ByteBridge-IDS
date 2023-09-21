<!DOCTYPE html>
<html lang="es">
<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Configuración de la página -->
    <title>Iniciar Sesión</title>
    <style>
        /* Estilos CSS */
        body {
            background-color: #0a74d4; /* Color de fondo para todo el cuerpo de la página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Establece la altura de la vista principal al 100% del tamaño de la ventana */
            margin: 0; /* Elimina el margen predeterminado del cuerpo */
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

        h1 {
            color: #0a74d4; /* Color del encabezado */
            font-family: 'Bebas Neue', sans-serif; /* Fuente del encabezado */
            font-size: 50px;
            margin-top: 20px;
        }

        .input-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
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

        .login-button {
            background-color: #2ecc71; /* Color de fondo del botón de inicio de sesión */
            color: #ffffff; /* Color del texto del botón */
            font-family: 'Bebas Neue', sans-serif; /* Fuente del botón */
            font-size: 30px;
            width: 200px;
            height: 50px;
            text-align: center;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
            text-decoration: none; /* Elimina la decoración de texto predeterminada */
        }

        button{
            border: solid #333333;
        }

        /* Estilos para el botón de mostrar/ocultar contraseña */
        .show-password-button {
            background-color: transparent;
            color: #333333;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="inner-box">
            <div class="content">
                <h1>Iniciar sesión</h1>
                @if(session('error'))
                    <div style="color: #ff8a80;">{{ session('error') }}</div>
                @endif
                <div class="input-container">
                    <input type="text" name="email" id="correo" placeholder="correo electrónico">
                    <div class="input-container">
                        <input type="password" name="contrasena" id="contrasena" placeholder="contraseña">
                        <button type="button" class="show-password-button" onclick="togglePasswordVisibility()">Mostrar constraseña</button>
                    </div>
                </div>
                <button class="login-button" onclick="parametrosAdministrador()">Ingresar</button>
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
            var coreoElectronico = document.getElementById("correo");
            var passwordInput = document.getElementById("contrasena");
            window.location.href = "/";
        }

    </script>
    
</body>
</html>
