<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Seguimiento Cotización</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; color: #333; }
        .container { background: #fff; padding: 30px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0 2px 8px rgba(0,0,0,0.05); }
        .header { background: #007bff; color: #fff; padding: 15px; border-radius: 8px 8px 0 0; }
        .footer { margin-top: 30px; font-size: 13px; color: #888; }
        .observaciones { background: #e9ecef; padding: 15px; border-radius: 6px; margin: 20px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Seguimiento de Cotización N° {{ $cotizacion->numero }}</h2>
        </div>
        <p>Estimado/a {{ $cotizacion->cliente_nombre }},</p>
        <p>Le enviamos el siguiente mensaje de seguimiento respecto a su cotización realizada el {{ \Carbon\Carbon::parse($cotizacion->fecha)->format('d/m/Y') }}:</p>
        <div class="observaciones">
            <strong>Observaciones del seguimiento:</strong><br>
            {!! nl2br(e($observaciones)) !!}
        </div>
        <p>Si tiene dudas o requiere más información, no dude en responder este correo.</p>
        <div class="footer">
            <p>Atentamente,<br>Equipo de Cotizaciones<br>{{ config('app.name') }}</p>
        </div>
    </div>
</body>
</html>
