<!DOCTYPE html>
<html lang="es">
<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Configuración de la página -->
    <title>Iniciar Sesión</title>
    <style>
        /* Estilos CSS */
        .logo {
            width: 100px; /* Ancho de la imagen del logo */
            height: auto; /* Altura automática para mantener la proporción */
        }
        body {
            background-color: white; /* Color de fondo para todo el cuerpo de la página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Establece la altura de la vista principal al 100% del tamaño de la ventana */
            margin: 0; /* Elimina el margen predeterminado del cuerpo */
        }

        .container {
            background-color: black; /* Color de fondo del contenedor principal */
            width: 1040px;
            height: 550px;
            border-radius: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra del contenedor */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .content {
            background-color: black; /* Color de fondo del contenido principal */
            width: 1040px;
            height: 480px;
            border-radius: 20px;
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            color: white; /* Color del encabezado */
            font-family: 'Arial', sans-serif; /* Fuente del encabezado */
            font-size: 40px;
            margin-top: 20px;
            margin-right: 700px;
            text-shadow: 1px 1px 2px #fff;
            text-shadow:
                1px 10px 7px #fff, /* Sombra de texto principal (arriba y a la derecha) */

                1px -1px 1px #fff; /* Sombra de reflejo (abajo y a la derecha) */
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
            padding: 10px;
            margin: 30px;
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
            font-family: 'Arial', sans-serif; /* Fuente del botón */
            font-size: 25px;
            width: 200px;
            height: 50px;
            border-radius: 10px;
            margin-top: 20px;
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
            text-decoration: none; /* Elimina la decoración de texto predeterminada */
            display: flex; /* Utilizar el modelo de caja flexible */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */
        }
        .back-button {
            background-color: #333333; /* Color de fondo del botón */
            color: #ffffff; /* Color del texto del botón */
            font-family: 'Arial', sans-serif; /* Fuente del botón */
            font-size: 20px; /* Tamaño del texto del botón */
            width: 260px; /* Ancho del botón */
            height: 50px; /* Altura del botón */

            border-radius: 10px; /* Borde redondeado del botón */
            margin-top: 30px; /* Espacio superior entre el botón y el botón "Ingresar" */
            cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
            text-decoration: none; /* Elimina la decoración de texto predeterminada */

            display: flex; /* Utilizar el modelo de caja flexible */
            justify-content: center; /* Centrar horizontalmente */
            align-items: center; /* Centrar verticalmente */

        }
         /* Estilos para los campos de entrada */
         .input-container {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Alinea los campos de entrada a la izquierda */
        }

        .input-label {
            font-size: 18px;
            color: white;
            margin-bottom: 5px; /* Espacio entre la etiqueta y el campo de entrada */
        }

        .input-field {
            width: 460px;
            height: 30px;
            border: none;
            border-bottom: 1px solid #0a74d4; /* Línea de color azul debajo del campo de entrada */
            margin-bottom: 20px; /* Espacio entre los campos de entrada */
            font-size: 16px; /* Tamaño de fuente del campo de entrada */
            padding: 5px; /* Espacio interno para el campo de entrada */
            background: transparent; /* Fondo transparente */
            outline: none; /* Elimina el borde de enfoque */
            color: #ffff; /* Cambia el color del texto (por ejemplo, negro #333) */
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Iniciar sesión</h1>
        <div class="content">

            <!-- Campos de entrada con etiquetas -->
            <div class="input-container">
                <label class="input-label" for="correo">Correo electrónico:</label>
                <input class="input-field" type="text" id="correo" ">
            </div>

            <div class="input-container">
                <label class="input-label" for="contrasena">Contraseña:</label>
                <input class="input-field" type="password" id="contrasena" ">
            </div>

            <!-- Botones y enlace -->
            <a class="login-button">Ingresar</a>
            <a class="back-button" href="/">Volver a la página principal</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>

