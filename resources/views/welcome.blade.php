<!DOCTYPE html>
<html>
<html lang="es">
<head>
    <title>Turjoy - ¡Reserva tus viajes ahora mismo!</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <!-- Incluir los archivos CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Estilos personalizados -->
    <style>
        /* Fondo para la barra de navegacion, #0a74da si se quiere el color requierdo en los ERS */
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
            margin-top: 30px; /* Espacio superior entre los botones */
            margin-inline: 50px;
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

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ByteBridge Inc.</a>
            <div class="navbar-text ml-auto">
                <a href="{{ route('login.php') }}" id = "login-link">Log-in</a>
            </div>
        </div>
    </nav>

    <!-- Contenedor principal para el rectángulo, imagen y botones -->
    <div class="container-main">
        <div class="col-md-6 custom-rectangle">
            <!-- Logo -->
            <!-- Establece el directorio en donde esta la imagen a utilizar -->
            <img src="{{ Storage::url('images/logoturjoy.png') }}" alt="Logo" style="max-width: 100%;">
            <!-- Botones -->
            <a href="{{ route('buscarReserva.php') }}" class="btn btn-primary">Buscar reservas</a>
            <a href="{{ route('buscarReserva.php') }}" class="btn btn-success">Reservar pasajes</a>
        </div>
    </div>
    <script>
        document.getElementById('login-link').addEventListener('click', function(event) {
            event.preventDefault(); // Evitar la acción predeterminada del enlace

            // Agregar una animación de deslizamiento hacia arriba antes de redirigir
            document.body.style.transition = 'transform 0.5s ease';
            document.body.style.transform = 'translateX(-100%)';

            // Redirigir al archivo login.php después de la animación
            setTimeout(function() {
                window.location.href = '/login';
            }, 500); // 500 ms es la duración de la animación
        });
    </script>

    <!-- Incluir los archivos JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
