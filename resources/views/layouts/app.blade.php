<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand">ByteBridge Inc.</a>
            <div class="navbar-text ml-auto">
                @auth
                    <a href="{{ route('cerrarSesion') }}">Cerrar sesión</a>
                @endauth

                @guest
                    <a href="{{ route('iniciarSesion') }}">Iniciar Sesión</a>
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
