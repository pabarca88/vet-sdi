<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Notificación de Devolución de Producto</title>
</head>
<body>
    <h2>Hola {{ $paciente->nombre ?? $paciente->name }},</h2>
    <p>Se ha registrado la devolución de los siguientes productos:</p>
    <ul>
        <li>
            {{ $items->nombre_producto ?? ($items->producto->nombre ?? 'Producto') }} - Cantidad: {{ $items->stock ?? 'N/A' }}
            @if(!empty($items->tiene_garantia) && $items->tiene_garantia)
                <br>
                <strong>Garantía:</strong>
                <ul>
                    <li>Tipo: {{ $items->tipo_garantia ?? 'N/A' }}</li>
                    <li>Valor: ${{ number_format($items->valor_garantia, 0, ',', '.') ?? 'N/A' }}</li>
                </ul>
            @endif
        </li>
    </ul>
    <p>Gracias por realizar la devolución. Si tienes dudas, contáctanos.</p>
    <p>Saludos,<br>Equipo Medichile</p>
</body>
</html>
