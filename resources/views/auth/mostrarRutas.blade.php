<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #0a74d4;
            color: #fff;
        }

        .error-fila {
            background-color: #ff8a80;
        }

        .correcto-fila {
            background-color: #a8e6cf;
        }

        .repetido-fila {
            background-color: #e4e6a8;
        }

        tr:nth-child(even) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>

    <a href="{{ route('inicioAdministrador') }}" class="btn btn-secondary" style="background-color: #0a74d4; color: #fff;">Volver</a>

    <h1>Mostrar tabla de las rutas</h1>

    @if (isset($error))
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endif

    @if (isset($hoja) && count($hoja) > 0)
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
                $origenesYDestinos = array(); // Un array para almacenar origenes y destinos ya procesados
                foreach ($hoja as $fila) {
                    $tramoRepetido = false;
                    // Verifica si el origen y destino ya existen en filas anteriores
                    if (in_array([$fila['origen'] . $fila['destino']], $origenesYDestinos)) {
                        $tramoRepetido = true;
                    }
                    else {
                        $origenesYDestinos[] = [$fila['origen'] . $fila['destino']];
                    }

                    echo '<tr>';

                    foreach (['origen', 'destino', 'cantidad_asientos', 'tarifa_base'] as $clave) {
                        $valor = $fila[$clave];
                        if(!empty($valor) || $fila['origen'] || $fila['destino'] || $fila['cantidad_asientos'] || $fila['tarifa_base']){
                            if (empty($fila['origen'] || $fila['destino'] || $fila['cantidad_asientos'] || $fila['tarifa_base']) ||
                            is_numeric($fila['origen']) || is_numeric($fila['destino']) ||
                            $fila['origen'] === $fila['destino'] || !is_numeric($fila['cantidad_asientos']) || !is_numeric($fila['tarifa_base']) ||
                            (int)$fila['cantidad_asientos'] < 0 || (int)$fila['tarifa_base'] < 0) {
                                echo '<td class="error-fila">' . $valor . '</td>';
                            }
                            elseif ($tramoRepetido) {
                                echo '<td class="repetido-fila">' . $valor . '</td>';
                            }
                            else {
                                echo '<td class="correcto-fila">' . $valor . '</td>';
                            }
                        }
                    }
                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
    @endif

</body>
</html>

