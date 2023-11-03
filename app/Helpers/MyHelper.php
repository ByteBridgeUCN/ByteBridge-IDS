<?php

function makeMessage(){

    $message = [

        'email.required' => 'debe ingresar su correo electrónico para iniciar sesión.',
        'password.required' => 'debe ingresar su contraseña para iniciar sesión.',
        'email.email' => 'debe ingresar un correo electrónico válido.',
        'ticketCode.required' => 'debe ingresar el código de la reserva',
        'travelDate.required' => 'debe seleccionar la fecha del viaje antes de realizar la reserva',
        'purchasedSeats.required' => 'debe seleccionar la cantidad de asientos antes de realizar la reserva'

    ];

    return $message;

}
