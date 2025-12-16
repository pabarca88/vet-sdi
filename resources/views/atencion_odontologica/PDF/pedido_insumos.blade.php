<!-- ESQUEMA PDF DE PEDIDOS DE INSUMOS -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos de Insumos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .contenedor {
            width: 100%;
            border-collapse: collapse;
        }
        .contenedor td, .contenedor th {
            border: 1px solid black;
            padding: 8px;
        }
        .contenedor th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div id="datos_profesional">
        <span id="nombre">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</span><br>
        <span id="nombre_paciente">{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</span>
    </div>
    <div class="titulo">Orden de Pedido de Insumos - Área Dental</div>

    <table class="contenedor">
        <thead>
            <tr>
                <th>Tipo de Artículo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($insumos as $i)
            <tr>
                <td>{{ $i->descripcion }}</td>
                <td>{{ $i->cantidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br>
</body>
</html>
<!-- Fin del esquema PDF de pedidos de insumos -->
