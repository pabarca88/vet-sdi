<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notificación de Préstamo de Productos</title>
</head>
<body>
    <h2>Hola {{ $paciente->nombre ?? $paciente->name }},</h2>
    <p>Se ha registrado un préstamo de productos a tu nombre. Detalle:</p>
    <ul>
        @foreach($items as $item)
            <li>
                {{ $item->nombre_producto ?? ($item->producto->nombre ?? 'Producto') }} - Cantidad: {{ $item->cantidad }}
            </li>
        @endforeach
    </ul>
    <p>Por favor, comunícate con nosotros si tienes dudas o necesitas devolver algún producto.</p>
    <p>Saludos,<br>Equipo Medichile</p>
</body>
</html>
