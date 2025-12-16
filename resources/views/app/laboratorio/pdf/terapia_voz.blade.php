<!-- resources/views/app/laboratorio/pdf/terapia_voz.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Terapia de Voz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            line-height: 1.4;
            color: #333;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #2c5aa0;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c5aa0;
            margin: 0;
            font-size: 24px;
        }

        .header h2 {
            color: #666;
            margin: 5px 0 0 0;
            font-size: 18px;
            font-weight: normal;
        }

        .info-section {
            background-color: #f8f9fa;
            padding: 15px;
            border-left: 4px solid #2c5aa0;
            margin-bottom: 20px;
        }

        .info-section h3 {
            margin-top: 0;
            color: #2c5aa0;
            font-size: 16px;
        }

        .content-section {
            margin-bottom: 25px;
        }

        .content-section h3 {
            background-color: #2c5aa0;
            color: white;
            padding: 10px;
            margin: 0 0 15px 0;
            font-size: 16px;
        }

        .content-box {
            border: 1px solid #ddd;
            padding: 15px;
            min-height: 200px;
            background-color: #fff;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .fecha {
            text-align: right;
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }

        /* Estilos para el contenido HTML del editor */
        .content-box p {
            margin: 10px 0;
        }

        .content-box ul, .content-box ol {
            margin: 10px 0;
            padding-left: 25px;
        }

        .content-box strong {
            font-weight: bold;
        }

        .content-box em {
            font-style: italic;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>INFORME DE TERAPIA DE VOZ</h1>
        <h2>Médico Tratante</h2>
    </div>

    <!-- Fecha de generación -->
    <div class="fecha">
        Fecha de generación: {{ date('d/m/Y H:i') }}
    </div>

    <!-- Información del paciente -->
    <div class="info-section">
        <h3>Información del Examen</h3>
        <p><strong>ID Ficha:</strong> {{ $id_ficha }}</p>
        <p><strong>Fecha:</strong> {{ date('d/m/Y') }}</p>
    </div>

    <!-- Contenido del informe -->
    <div class="content-section">
        <h3>Observaciones y Recomendaciones</h3>
        <div class="content-box">
            {!! $observaciones !!}
        </div>
    </div>

    <!-- Sección de firma (opcional) -->
    <div class="content-section">
        <h3>Profesional Responsable</h3>
        <div class="content-box" style="min-height: 100px;">
            <p>_________________________________</p>
            <p><strong>Firma y Timbre</strong></p>
            <p>Fonoaudiólogo(a)</p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Documento generado automáticamente por el Sistema MediChile</p>
        <p>ID Ficha: {{ $id_ficha }} | Generado el {{ date('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>
