<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presupuesto veterinario</title>
</head>
<body>
    <p>Hola {{ $detalle['destinatario']->nombres ?? '' }} {{ $detalle['destinatario']->apellido_uno ?? '' }} {{ $detalle['destinatario']->apellido_dos ?? '' }},</p>

    <p>Adjuntamos el presupuesto veterinario{{ isset($detalle['mascota']) && $detalle['mascota'] ? ' para ' . $detalle['mascota']->nombre : '' }}.</p>

    <p>Profesional: {{ $detalle['profesional']->nombre ?? '' }} {{ $detalle['profesional']->apellido_uno ?? '' }} {{ $detalle['profesional']->apellido_dos ?? '' }}</p>

    <p>Saludos.</p>
</body>
</html>
