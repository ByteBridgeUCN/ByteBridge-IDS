<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/ShowRoutes.css'])
    <style>
       h2{
            text-align: center;
       }
    </style>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    >
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

</head>
<body>

    <a
        href="{{ route('AdminHome') }}"
        class="back-button"
        data-bs-toggle="tooltip"
        data-bs-placement="bottom"
        data-bs-title="Volver al menú del administrador"
        >Volver
    </a>

    <h1>Rutas procesadas</h1>
    <h2>Cantidad de rutas procesadas: {{count($sheet)}}</h2>
    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    @if (isset($sheet) && count($sheet) > 0)
        <div class="table-routes">
            <table>
                <thead>
                    <tr>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Cantidad de Asientos</th>
                        <th>Tarifa Base</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $originsAndDestinations = array(); // Un array para almacenar origenes y destinos ya procesados
                    foreach ($sheet as $row) {
                        $repeatedTravel = false;
                        // Verifica si el origen y destino ya existen en filas anteriores
                        if (in_array([$row['origen'] . $row['destino']], $originsAndDestinations)) {
                            $repeatedTravel = true;
                        }
                        else {
                            $originsAndDestinations[] = [$row['origen'] . $row['destino']];
                        }

                        echo '<tr>';

                        foreach (['origen', 'destino', 'cantidad_asientos', 'tarifa_base'] as $key) {
                            $value = $row[$key];
                            // Verifica si el valor es vacio o si es un numero o si es un origen igual a destino o si no es un numero o si es menor a 0
                            if (empty($row['origen']) || empty($row['destino']) || empty($row['cantidad_asientos']) || empty($row['tarifa_base']) ||
                            is_numeric($row['origen']) || is_numeric($row['destino']) ||
                            $row['origen'] === $row['destino'] || !is_numeric($row['cantidad_asientos']) || !is_numeric($row['tarifa_base']) ||
                            (int)$row['cantidad_asientos'] < 0 || (int)$row['tarifa_base'] < 0) {
                                echo '<td class="error-row">' . $value . '</td>';
                            }
                            elseif ($repeatedTravel) {
                                echo '<td class="repeated-row">' . $value . '</td>';
                            }
                            else {
                                echo '<td class="valid-row">' . $value . '</td>';
                            }
                        }
                        echo '</tr>';
                    }
                    ?>

                </tbody>
            </table>

        </div>

    @endif

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous">
    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous">
    </script>

</body>
</html>

