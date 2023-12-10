<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/css/estilos.css', 'resources/js/app.js'])
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand">Turjoy</a>
            <div class="navbar-text">
                @auth
                    <a
                        href="{{ route('Logout') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="botton"
                        data-bs-title="Cerrar sesión actual"
                        >Cerrar sesión
                    </a>
                @endauth

                @guest
                    <a
                        href="{{ route('Login') }}"
                        data-bs-toggle="tooltip"
                        data-bs-placement="botton"
                        data-bs-title="Ir a Iniciar sesión"
                        >Iniciar sesión
                    </a>
                @endguest
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>


</body>

</html>
