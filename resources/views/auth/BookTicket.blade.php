<!DOCTYPE html>
<html>

<head>
    <title>Turjoy | ¡Reserva tus viajes ahora mismo!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    @extends('layouts.app')
    @vite(['resources/css/BookTicket.css'])
</head>

<body>
    <h1>Reserva de pasajes</h1>
    <form id="reservation-form">
        <label for="travel-date">Fecha de viaje:</label>
        <input type="date" id="travel-date" required><br>

        <label for="origin">Origen:</label>
        <input type="text" id="origin" required><br>

        <label for="destination">Destino:</label>
        <input type="text" id="destination" required><br>

        <label for="seat-count">Cantidad de Asientos:</label>
        <input type="number" id="seat-count" required><br>

        <a class="book-ticket-button" id="submit-button">Reservar pasaje</a>
        <a class="back-button" href="{{ route('Home') }}">Volver</a>
    </form>

    <div id="confirmation" style="display: none;">
        <h2>Resumen de la Reserva</h2>
        <p>Fecha de Viaje: <span id="confirm-date"></span></p>
        <p>Origen: <span id="confirm-origin"></span></p>
        <p>Destino: <span id="confirm-destination"></span></p>
        <p>Cantidad de Asientos: <span id="confirm-seats"></span></p>
        <p>Código de Reserva: <span id="confirm-code"></span></p>
        <button type="button" id="print-button">Imprimir Detalle de la Reserva</button>
    </div>

    <div id="print-details" style="display: none;">
        <h2>Detalle de la Reserva</h2>
        <p>Código de Reserva: <span id="print-code"></span></p>
    </div>


    <script>
        const form = document.getElementById("reservation-form");
        const confirmationDiv = document.getElementById("confirmation");
        const printDetailsDiv = document.getElementById("print-details");
        const submitButton = document.getElementById("submit-button");
        const printButton = document.getElementById("print-button");

        submitButton.addEventListener("click", () => {
            const date = document.getElementById("travel-date").value;
            const origin = document.getElementById("origin").value;
            const destination = document.getElementById("destination").value;
            const seatCount = document.getElementById("seat-count").value;
            const code = generateReservationCode();

            if (!date) {
                displayErrorMessage("Debe seleccionar la fecha del viaje antes de realizar la reserva");
                return;
            }

            if (!seatCount) {
                displayErrorMessage("Debe seleccionar la cantidad de asientos antes de realizar la reserva");
                return;
            }

            if (date < getCurrentDate()) {
                displayErrorMessage("El día del viaje no puede ser anterior al día actual");
                return;
            }

            if (!isValidRoute(origin, destination)) {
                displayErrorMessage("No hay rutas disponibles entre las ciudades seleccionadas");
                return;
            }

            if (!hasAvailableSeats(date, origin, destination, seatCount)) {
                displayErrorMessage("No hay servicios disponibles para la ruta seleccionada");
                return;
            }

            resetErrorMessage();

            document.getElementById("confirm-date").textContent = date;
            document.getElementById("confirm-origin").textContent = origin;
            document.getElementById("confirm-destination").textContent = destination;
            document.getElementById("confirm-seats").textContent = seatCount;
            document.getElementById("confirm-code").textContent = code;

            confirmationDiv.style.display = "block";
        });

        printButton.addEventListener("click", () => {
            printDetailsDiv.style display = "block";
        });

        function getCurrentDate() {
            const today = new Date();
            return today.toISOString().split("T")[0];
        }

        function isValidRoute(origin, destination) {
            // Implementar la lógica para verificar si existe una ruta válida.
            // Devolver true si la ruta es válida, de lo contrario, devolver false.
        }

        function hasAvailableSeats(date, origin, destination, seatCount) {
            // Implementar la lógica para verificar si hay asientos disponibles para la fecha, origen y destino especificados.
            // Devolver true si hay asientos disponibles, de lo contrario, devolver false.
        }

        function displayErrorMessage(message) {
            const errorMessage = document.createElement("p");
            errorMessage.textContent = message;
            errorMessage.style.color = "#ff8a80";
            confirmationDiv.appendChild(errorMessage);
        }

        function resetErrorMessage() {
            const errorMessages = confirmationDiv.querySelectorAll("p");
            errorMessages.forEach((element) => {
                confirmationDiv.removeChild(element);
            });
        }

        function generateReservationCode() {
            const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const randomLetters = Array.from({ length: 4 }, () => letters[Math.floor(Math.random() * letters.length)]);
            const randomNumbers = Array.from({ length: 2 }, () => Math.floor(Math.random() * 10));
            return randomLetters.join('') + randomNumbers.join('');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>
