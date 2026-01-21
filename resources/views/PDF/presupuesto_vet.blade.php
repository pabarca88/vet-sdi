<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        @font-face {
            font-family: 'Poppins';
            src:
            local("Poppins"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
            font-style: bold;
            font-weight: 600;
        }

        @font-face {
            font-family: 'Poppins';
            src:
            local("Poppins"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
            font-style: regular;
            font-weight: 400;
        }

        h1, h2, h3, h4, h5, h6, span, p, td, th {
            font-family: Poppins, Arial, Helvetica, sans-serif;
        }

        body {
            font-family: Poppins, Arial, Helvetica, sans-serif;
            color: #222;
            background: #fff;
            font-size: 12px;
        }
        h2 {
            color: #007bff;
            margin-bottom: 8px;
        }
        p {
            margin: 2px 0 6px 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 12px;
            font-size: 12px;
        }
        th, td {
            border: 1px solid #bdbdbd;
            padding: 6px 5px;
            text-align: left;
        }
        th {
            background: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .total-row td {
            font-weight: bold;
            background: #e3f2fd;
            color: #007bff;
        }
        .resumen {
            margin-top: 12px;
            font-size: 12px;
        }
        .contenido-footer {
            margin-top: 20px;
        }
        .div-qr img {
            width: 100%;
        }
    </style>
</head>
<body>
    <h2>Presupuesto Veterinario</h2>
    <p>Fecha: {{ date('d-m-Y') }}</p>
    <p>Hora: {{ date('H:i') }}</p>
    <p>Paciente: {{ $cuerpo['array_paciente']['nombre'] }}</p>
    @if(!empty($cuerpo['mascota']['nombre']))
        <p>Mascota: {{ $cuerpo['mascota']['nombre'] }}</p>
    @endif
    <p>Profesional: {{ $cuerpo['array_profesional']['nombre'] }}</p>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Descripcion</th>
                <th>Valor Unitario</th>
                <th>Cantidad</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            @php $index = 1; @endphp
            @foreach($cuerpo['items'] as $item)
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $item['descripcion'] }}</td>
                    <td>${{ number_format($item['valor_unitario'], 0, ',', '.') }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>${{ number_format($item['valor_total'], 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr class="total-row">
                <td colspan="4" style="text-align:right;">Subtotal</td>
                <td>${{ number_format($cuerpo['totales']['subtotal'], 0, ',', '.') }}</td>
            </tr>
            <tr class="total-row">
                <td colspan="4" style="text-align:right;">IVA (19%)</td>
                <td>${{ number_format($cuerpo['totales']['iva'], 0, ',', '.') }}</td>
            </tr>
            <tr class="total-row">
                <td colspan="4" style="text-align:right;">TOTAL</td>
                <td>${{ number_format($cuerpo['totales']['total'], 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="resumen">
        Este documento es un presupuesto referencial. Para dudas o detalles, consulte con su profesional tratante.
    </div>

    @include('PDF.footer')
</body>
</html>
