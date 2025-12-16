<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Campaña Promocional</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; color: #333; }
        .container { max-width: 600px; margin: 30px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #eee; padding: 32px; }
        h2 { color: #007bff; margin-bottom: 16px; }
        .mensaje { font-size: 1.1em; margin-bottom: 24px; }
        .footer { font-size: 0.95em; color: #888; margin-top: 32px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>{{ $detalle['body']['asunto'] ?? 'Campaña Promocional' }}</h2>
        <div class="mensaje">
            {!! $detalle['body']['mensaje'] ?? '' !!}
        </div>
        <div class="footer">
            <strong>Remitente:</strong> {{ $detalle['body']['remitente'] ?? '' }}<br>
            <span>Este correo fue enviado automáticamente desde el sistema Medichile.</span>
        </div>
    </div>
</body>
</html>
