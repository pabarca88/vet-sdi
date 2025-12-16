<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Plan de Tratamiento</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            margin: 30px;
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            height: 80px;
        }
        .titulo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 30px;
        }
        .seccion {
            margin-bottom: 20px;
        }
        .seccion h4 {
            margin-bottom: 5px;
            border-bottom: 1px solid #ccc;
        }
        .dato {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo del Centro Médico">
    </div>

    <div class="titulo">Informe de Plan de Tratamiento</div>

    <div class="seccion">
        <h4>Datos del Paciente</h4>
        <div class="dato"><strong>Nombre:</strong> {{ $paciente->nombres }} {{ $paciente->apellido_uno }}</div>
        <div class="dato"><strong>RUT:</strong> {{ $paciente->rut }}</div>
        <div class="dato"><strong>Edad:</strong> {{ $paciente->edad }} años</div>
    </div>

    <div class="seccion">
        <h4>Profesional</h4>
        <div class="dato"><strong>Nombre:</strong> Dr(a). {{ $profesional->nombre }} {{ $profesional->apellido_uno }}</div>
        <div class="dato"><strong>Especialidad:</strong> {{ $profesional->TipoEspecialidad->nombre ?? 'No especificada' }}</div>
    </div>

    <div class="seccion">
        <h4>Detalle del Examen</h4>
        <div class="dato"><strong>Examen:</strong> {{ $nombre_examen }}</div>
        <div class="dato"><strong>Diagnóstico:</strong> {{ $examen->diagnostico }}</div>
        <div class="dato"><strong>Observaciones:</strong> {{ $examen->observaciones }}</div>
        <div class="dato"><strong>Fecha de solicitud:</strong> {{ \Carbon\Carbon::parse($examen->created_at)->format('d-m-Y H:i') }}</div>
    </div>

    <div style="margin-top: 60px; text-align: center;">
        ___________________________<br>
        Firma del Profesional
    </div>
</body>
</html>
