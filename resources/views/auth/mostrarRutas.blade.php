<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tu código de encabezado aquí -->
</head>
<body>
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
                    @foreach ($hoja[0] as $encabezado)
                        <th>{{ $encabezado }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach (array_slice($hoja, 1) as $fila)
                    <tr>
                        @foreach ($fila as $valor)
                            <td>{{ $valor }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>

