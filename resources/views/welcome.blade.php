<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

=======
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        /* Fondo para la barra de neavegacion, #0a74da si se quiere el color requierdo en los ERS */
        .navbar {
            background-color: #0a74d4;
        }
        /* Color del texto en la barra de navegacion */
        .navbar-dark .navbar-text {
            color: #fff;
        }
        /* Ajustar el margen superior para la imagen */
        .custom-image {
            margin-top: 0; /* Elimina el margen superior para que la imagen esté justo debajo de la barra */
            padding: 0; /* Elimina el relleno */
        }

        /* Estilos para el rectangulo */
        .custom-rectangle {
            /*background-color: rgba(10, 116, 218, 0.4);  Color azul con 40% de transparencia */
            padding: 20px; /* Espacio interno para contenido */
            padding-left: 200px;
            padding-right: 200px;
            text-align: center;
            color: #fff; /* Color del texto dentro del rectangulo */
            margin-top: 0; /* Elimina el margen superior */
        }

        /* Estilos para los botones */
        .custom-button {
            margin-top: 20px; /* Espacio superior entre los botones */
        }

        /* Estilos para el contenedor principal */
        .container-main {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative;
            background-image: ;
            background-size: cover;
            background-position: center;
        }

        /* Estilos para el título con sombreado */
        .navbar-brand {
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Establece el reflejo con sombra */
        }

        /* Estilos para el enlace "Log-in" */
        .navbar-text a {
            text-decoration: none; /* Elimina el subrayado */
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); /* Establece el reflejo con sombra */
        }
    </style>
</head>
<body>
    <!-- Barra de navegación transparente -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ByteBridge Inc.</a>
            <div class="navbar-text ml-auto">
                <a href="{{ route('login.php') }}">Log-in</a>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal para el rectángulo, imagen y botones -->
    <div class="container-main">
        <div class="col-md-6 custom-rectangle">
            <!-- Logo -->
            <img src="{{ asset('logoturjoy.png') }}" alt="Logo" style="max-width: 100%;">
            <!-- Botones -->
            <button class="btn btn-primary custom-button">Buscar reservas</button>
            <button class="btn btn-success custom-button">Reservar pasajes</button>
        </div>
    </div>

    <!-- Incluir los archivos JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
=========
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

>>>>>>>>> Temporary merge branch 2
</body>
</html>
