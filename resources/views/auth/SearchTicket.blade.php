<!DOCTYPE html>
<html lang="es">

<head>
    <title>Turjoy | Buscar Reservas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite(['resources/css/SearchTicket.css'])
    @extends('layouts.app')
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #333;
    }

    .error-message {
        color: #ff8a80;
    }

    #reservation-form {
        width: 400px;
        margin: 0 auto;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="number"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #008CBA;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #005f7f;
    }
</style>
<body>

</head>
    <body>
        <h1>Reserva de Pasajes en Turjoy</h1>
        <div id="reservation-form">
            <form>
                <label for="travel-date">Fecha de Viaje:</label>
                <input type="date" id="travel-date" name="travel-date" required>

                <label for="origin">Origen:</label>
                <input type="text" id="origin" name="origin" required>

                <label for="destination">Destino:</label>
                <input type="text" id="destination" name="destination" required>

                <label for="seat-count">Cantidad de Asientos:</label>
                <input type="number" id="seat-count" name="seat-count" min="1" required>

                <button type="submit">Reservar</button>
            </form>
            <div class="error-message" id="error-message"></div>
        </div>

    </body>

</html>
