//#region Selecion
const selectOrigin = document.getElementById('origin');
const selectDestination = document.getElementById('destination');
const selectSeat = document.getElementById('purchasedSeats');
const selectTravelDate = document.getElementById('travelDate');

const clearSelectSeat = () => {
    while (selectSeat.firstChild) {
        selectSeat.removeChild(selectSeat.firstChild);
    }
    // Forzar un repintado (Reflow)
    selectSeat.offsetHeight;
}

const clearSelectDestination = () => {
    while (selectDestination.firstChild) {
        selectDestination.removeChild(selectDestination.firstChild);
    }
    // Forzar un repintado (Reflow)
    selectDestination.offsetHeight;
}


const clearSelectTravelDate = () => {

    while (selectTravelDate.firstChild) {
        selectTravelDate.removeChild(selectTravelDate.firstChild);
    }

}

const addOriginsToSelect = (origins, names) => {

    let pos = 0;

    origins.forEach(origin => {
        const option = document.createElement('option');
        option.value = origin;
        option.text = names[pos];
        selectOrigin.appendChild(option);
        pos++;
    });

}

const loadedOrigins = (e) => {

    fetch('/get/origins')
    .then(response => response.json())
    .then(data => {
        // Manipula los datos recibidos aquí
        const origins = data.originIds;
        const nameOrigins = data.originNames;
        addOriginsToSelect(origins, nameOrigins);

    })
    .catch(error => {
        // Maneja los errores aquí
        console.error('Hubo un error:', error);
    });
}

const addSeatingToSelect = (seat, travel) => {

    for (let index = 0; index <= seat; index++) {
        const option = document.createElement('option');
        option.value = index;
        option.text = index;
        selectSeat.appendChild(option);
    }

}

const addDestinationsToSelect = (destinations, names) => {

    // Crear la opcion por defecto
    const option = document.createElement('option');
    option.value = "";
    option.text = "Seleccione un destino";
    option.selected = true;
    selectDestination.appendChild(option);
    let pos = 0;
    destinations.forEach(destination => {
        const option = document.createElement('option');
        option.value = destination;
        option.text = names[pos];
        selectDestination.appendChild(option);
        pos++;
    });

}


const loadedDestinations = (e) => {

    const currentValue = selectOrigin.value;

    if (currentValue) {

        fetch(`/get/destinations/${currentValue}`)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            const destinations = data.destinationIds;
            const nameDestinations = data.destinationNames;
            addDestinationsToSelect(destinations, nameDestinations);
        })
        .catch(error => {
            // Maneja los errores aquí
            console.error('Hubo un error:', error);
        });
        updateReserveButtonStatus();

    }
}

const verifySeating = () => {

    const origin = selectOrigin.value;
    const destination = selectDestination.value;
    const date = selectTravelDate.value;

    if (origin && destination && date) {

        fetch(`/seating/${origin}/${destination}/${date}`)
        .then(response => response.json())
        .then(data => {
            // Manipula los datos recibidos aquí
            addSeatingToSelect(data.purchasedSeats, data.travelId);

        })
        .catch(error => {
            // Maneja los errores aquí
            console.error('Hubo un error:', error);
        });
        updateReserveButtonStatus();

    }
}

selectOrigin.addEventListener('change', () => {

    clearSelectDestination();
    clearSelectSeat();
    updateReserveButtonStatus();

})

selectDestination.addEventListener('change', () => {

    clearSelectSeat();
    updateReserveButtonStatus();

})

selectTravelDate.addEventListener('change', () => {

    clearSelectSeat();

});

selectSeat.addEventListener('change', () => {
    if (selectSeat.value == 0) {
        clearSelectSeat();
    }
});

document.addEventListener('DOMContentLoaded', loadedOrigins)
selectOrigin.addEventListener('change', loadedDestinations)
selectTravelDate.addEventListener('change', verifySeating)
selectSeat.addEventListener('change', verifySeating)
//#endregion

//#region Boton Reserva
function formatDate(inputDate) {

    const date = new Date(inputDate);
    const day = date.getDate();
    const month = date.getMonth() + 1; // Los meses comienzan desde 0
    const year = date.getFullYear(); // Tomando solo los dos últimos dígitos del año

    // Agrega ceros a la izquierda si es necesario
    const formattedDay = (day < 10) ? '0' + day : day;
    const formattedMonth = (month < 10) ? '0' + month : month;
    const formattedYear = (year < 10) ? '0' + year : year;

    return formattedDay + '/' + formattedMonth + '/' + formattedYear;

}

document.addEventListener('DOMContentLoaded', function() {

    const travelDateInput = document.getElementById('travelDate');

    // Deshabilitar la entrada manual en el campo de fecha
    travelDateInput.addEventListener('keydown', function(event) {
        event.preventDefault();
    });

    // Mostrar el calendario al hacer clic en el campo de fecha
    travelDateInput.addEventListener('click', function() {
        this.blur();  // Desenfocar el campo para evitar la entrada manual
    });

});

const updateReserveButtonStatus = () => {

    const reserveButton = document.getElementById('confirmButton');


    // Verifica si tanto selectOrigin, selectDestination, selectTravelDate y selectSeat tienen valores seleccionados
    const isButtonEnabled = selectOrigin.value && selectDestination.value && selectTravelDate.value && selectSeat.value;

    // Actualiza el estado del botón y cambia el color
    reserveButton.disabled = !isButtonEnabled;
    reserveButton.style.backgroundColor = isButtonEnabled ? '#0A74DA' : '#333333';

}
const showTicket = (originSelected, destinationSelected, seatAmountSelected, travelDataSelected, formattedDate, totalPrice) => {

    if (originSelected && destinationSelected && seatAmountSelected && travelDataSelected) {

        // Formatea el precio como moneda en Pesos Chilenos
        const formattedPrice = (totalPrice * parseInt(seatAmountSelected)).toLocaleString('es-CL', {
            style: 'currency',
            currency: 'CLP'
        });

        // Muestra la alerta de confirmación
        Swal.fire({
            title: "Confirmar reserva",
            text: `El total de la reserva entre ${originSelected} y ${destinationSelected} para el día ${formattedDate} es de ${formattedPrice} (${seatAmountSelected} asientos). ¿Desea continuar?`,
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Volver",
            confirmButtonColor: "#2ecc71",
            cancelButtonColor: "#ff8a80",
            confirmButtonText: "Confirmar"
        }).then((result) => {
            // Verifica si el usuario hizo clic en "Confirmar"
            if (result.isConfirmed) {
                // Envía el formulario de manera programática
                document.querySelector('form').submit();
            }
        });

        // Evita que el formulario se envíe automáticamente
        event.preventDefault();
    }
};

// Escucha el clic en el botón
document.getElementById('confirmButton').addEventListener('click', function(event) {
    const originSelected = selectOrigin.options[selectOrigin.selectedIndex].text;
    const destinationSelected = selectDestination.options[selectDestination.selectedIndex].text;;
    const seatAmountSelected = document.getElementById('purchasedSeats').value;
    const travelDataSelected = document.getElementById('travelDate').value;
    const formattedDate = formatDate(travelDataSelected);

    fetch(`/checkBaseRate/${selectOrigin.value}/${selectDestination.value}`)
    .then(response => response.json())
    .then(data => {
        showTicket(originSelected, destinationSelected, seatAmountSelected, travelDataSelected, formattedDate, data.baseRate);
    })
    .catch(error => {
        // Maneja los errores aquí
        console.error('Hubo un error:', error);
    });

    // Previene el comportamiento predeterminado del formulario
    event.preventDefault();

});
//#endregion
