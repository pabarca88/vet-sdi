<!DOCTYPE html>
<html>
<head>
    <title>Reporte Anual - {{ $anio }}</title>
    <style>
        /* Agrega estilos personalizados para el PDF aquí */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte Anual - {{ $anio }}</h1>
    @if($comprasAnuales->count() > 0)
    <h4>Compras</h4>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Código Interno</th>
                <th>Marca</th>
                <th>Cantidad</th>
                <th>P.U.</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($comprasAnuales as $detalle)
                <tr>
                    <td>{{ $detalle->producto }}</td>
                    <td>{{ $detalle->codigo_interno }}</td>
                    <td>{{ $detalle->marca }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>$ {{ number_format($detalle->precio_compra,0,',','.') }}</td>
                    <td>$ {{ number_format(($detalle->precio_compra * $detalle->cantidad),0,',','.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if($salidasAnuales->count() > 0)
    <h4>Salidas</h4>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Código Interno</th>
                <th>Cantidad</th>
                <th>Tipo de Producto</th>
                <th>Unidad de Medida</th>
                <th>Marca</th>
                <th>Receptor</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salidasAnuales as $detalle)
                <tr>
                    <td>{{ $detalle->producto }}</td>
                    <td>{{ $detalle->codigo_interno }}</td>
                    <td>{{ $detalle->cantidad_entregada }}</td>
                    <td>{{ $detalle->tipo_producto }}</td>
                    <td>{{ $detalle->unidad_medida }}</td>
                    <td>{{ $detalle->marca }}</td>
                    <td>{{ $detalle->usuario }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>
</html>
