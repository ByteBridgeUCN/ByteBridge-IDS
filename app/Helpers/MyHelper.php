<?php

function crearMensaje(){
    $mensaje = [
        'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión.',
        'password.required' => 'Debe ingresar su contraseña para iniciar sesión.',
    ];

    return $mensaje;
}
