//#region Selecion

const selectOrigin = document.getElementById('origin').value;
const selectDestination = document.getElementById('destination').value;
const selectTravelDate = document.getElementById('travelDate').value;
const selectPurchasedSeats = document.getElementById('purchasedSeats').value;
const total = 1;

const clearSelectSeat = () => {
    while (selectPurchasedSeats.firstChild) {
        selectPurchasedSeats.removeChild(selectPurchasedSeats.firstChild);
    }
}


const clearSelect = () => {
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
}

const addSeatingToSelect = (seat, travel) => {
    clearSelectSeat();

    for (let index = 1; index <= seat; index++) {
        const option = document.createElement('option');
        option.value = index;
        option.text = index;
        selectPurchasedSeats.appendChild(option);
    }
    total.value = travel.base_rate;
}

const verifySeating = () => {
    const origin = selectOrigin.value;
    const destination = selectDestination.value;
    const date = selectPurchasedSeats.value;

    if (origin && destination && date) {
        fetch(`/seating/${origin}/${destination}/${date}`)
            .then(response => response.json())
            .then(data => {
                // Manipula los datos recibidos aquí
                console.log(data.seat);
                addSeatingToSelect(data.seat, data.travel);
                // console.log(data);

            })
            .catch(error => {
                // Maneja los errores aquí
                console.error('Hubo un error:', error);
            });
    }
}

const addDestinationsToSelect = (destinations) => {
    // Limpiar el select
    clearSelect();
    // Crear la opcion por defecto
    const option = document.createElement('option');
    option.value = "";
    option.text = "Seleccione un destino";
    option.selected = true;
    selectDestination.appendChild(option);
    destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination;
        option.text = destination;
        selectDestination.appendChild(option);
    });
}


const loadedDestinations = (e) => {
    const currentValue = selectOrigin.value;
    if (currentValue) {
        // console.log(selectOrigin.value);
        fetch(`/get/destinations/${currentValue}`)
            .then(response => response.json())
            .then(data => {
                // Manipula los datos recibidos aquí
                const destinations = data.destination;
                console.log(destinations);
                addDestinationsToSelect(destinations);
                // console.log(data);
            })
            .catch(error => {
                // Maneja los errores aquí
                console.error('Hubo un error:', error);
            });
    }
}

const addOriginsToSelect = (origins) => {
    origins.forEach(origin => {
        const option = document.createElement('option');
        option.value = origin;
        option.text = origin;
        selectOrigin.appendChild(option);
    });
}

const loadedOrigins = (e) => {
    fetch('/get/origins')
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            const origins = data.origins;
            // console.log(origins);
            addOriginsToSelect(origins);
            // console.log(data);

        })
        .catch(error => {
            // Maneja los errores aquí
            console.error('Hubo un error:', error);
        });
}

document.addEventListener('DOMContentLoaded', loadedOrigins)
selectOrigin.addEventListener('change', loadedDestinations)
selectDestination.addEventListener('change', verifySeating)
selectPurchasedSeats.addEventListener('change', verifySeating)
//#endregion


// Escucha el clic en el botón
document.getElementById('confirmButton').addEventListener('click', function(event) {
    // Previene el comportamiento predeterminado del formulario
    event.preventDefault();

    // Muestra la alerta de confirmación
    Swal.fire({
        title: "Confirmar reserva",
        text: "El total de la reserva entre " + origin + " y " + destination + " para el día " + travelDate + " es de $" + total + " (" + purchasedSeats + " asientos) ¿Desea continuar?",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText:"Volver",
        confirmButtonColor: "#2ecc71",
        cancelButtonColor: "#ff8a80",
        confirmButtonText: "Confirmar"

    }).then((result) => {
        // Verifica si el usuario hizo clic en "Confirmar"
        if (result.isConfirmed) {
            document.querySelector('.container').style.position = 'fixed';
            document.body.style.overflow = 'hidden';
            // Envía el formulario de manera programática
            document.querySelector('form').submit();
        }
    });
});
