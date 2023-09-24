<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Turjoy - Buscar reserva</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>

<style>

    h1{
        font-size: 30px;
        margin-top: 10px; /* Margen en la parte superior */
        margin-bottom: 10px; /* Margen en la parte inferior */
        margin-left: 0; /* Margen en la parte izquierda */
        margin-right: 0; /* Margen en la parte derecha */
    }

    button.btn-primary{
        margin-top: 10px; /* Margen en la parte superior */
        margin-bottom: 10px; /* Margen en la parte inferior */
        margin-left: 0; /* Margen en la parte izquierda */
        margin-right: 0; /* Margen en la parte derecha */
    }

</style>
<body>

    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div>
            <h1>Reserva de pasajes</h1>

            <form action="{{ route('buscarReserva') }}" method="POST">

                <div class="form-group">
                    <label for="fecha">Fecha del viaje:</label>
                    <input type="date" id="fecha" name="fecha" class="form-control datepicker">
                </div>

                <div class="form-group">
                    <label for="origen">Origen:</label>
                    <select id="origen" name="origen" class="form-control">
                        <!-- Aquí puedes agregar opciones para los lugares de origen -->
                        <option value="origen1">Origen 1</option>
                        <option value="origen2">Origen 2</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="destino">Destino:</label>
                    <select id="destino" name="destino" class="form-control">
                        <!-- Aquí puedes agregar opciones para los lugares de destino -->
                        <option value="destino1">Destino 1</option>
                        <option value="destino2">Destino 2</option>
                        <!-- Agrega más opciones según sea necesario -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="asientos">Cantidad de asientos disponibles:</label>
                    <input type="number" id="asientos" name="asientos" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        </div>
    </div>

    <!-- Agrega los scripts de JavaScript necesarios para el selector de fecha (datepicker) -->
    <script>
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd', // Formato de fecha deseado
                autoclose: true,
                todayHighlight: true
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
