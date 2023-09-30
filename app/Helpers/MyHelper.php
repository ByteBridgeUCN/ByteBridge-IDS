<?php

function crearMensaje(){
    $mensaje = [
        'email.required' => 'debe ingresar su correo electrónico para iniciar sesión',
        'contrasena.required' => 'debe ingresar su contraseña para iniciar sesión',
    ];

    return $mensaje;
}
