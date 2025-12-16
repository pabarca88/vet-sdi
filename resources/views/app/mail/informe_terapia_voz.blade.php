<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'Tratamiento VPPB' : 'Terapia de Voz' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 24px;
        }
        .content {
            line-height: 1.6;
            color: #333;
        }
        .info-box {
            background-color: #f8f9fa;
            border-left: 4px solid #007bff;
            padding: 15px;
            margin: 20px 0;
        }
        .info-row {
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #007bff;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
        .highlight {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 10px;
            border-radius: 4px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $detalle['body']['tipo_examen'] == 'vppb' ? 'Informe de Tratamiento VPPB' : 'Informe de Terapia de Voz' }}</h1>
            <p>MED-SDI - Sistema de Información</p>
        </div>

        <div class="content">
            <p>Estimado/a <strong>{{ $detalle['body']['nombre_destinatario'] }}</strong>,</p>

            <p>Junto con saludarte, te enviamos el informe de {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'tratamiento VPPB' : 'terapia de voz' }}
            @if($detalle['body']['es_paciente'])
                correspondiente a tu atención médica.
            @else
                correspondiente al paciente <strong>{{ $detalle['body']['nombre_paciente'] }}</strong>.
            @endif
            </p>

            <div class="info-box">
                <div class="info-row">
                    <span class="label">Paciente:</span> {{ $detalle['body']['nombre_paciente'] }}
                </div>
                <div class="info-row">
                    <span class="label">Profesional:</span> {{ $detalle['body']['nombre_profesional'] }}
                </div>
                <div class="info-row">
                    <span class="label">Fecha del informe:</span> {{ $detalle['body']['fecha_informe'] }}
                </div>
                <div class="info-row">
                    <span class="label">Tipo de examen:</span> {{ $detalle['body']['tipo_examen'] == 'vppb' ? 'Tratamiento VPPB' : 'Terapia de Voz' }}
                </div>
                @if(isset($detalle['body']['lugar_atencion']))
                <div class="info-row">
                    <span class="label">Lugar de atención:</span> {{ $detalle['body']['lugar_atencion'] }}
                </div>
                @endif
            </div>

            @if($detalle['body']['total_sesiones'] > 0)
            <div class="highlight">
                <p><strong>Resumen del tratamiento:</strong></p>
                <p>Total de sesiones registradas: <strong>{{ $detalle['body']['total_sesiones'] }}</strong></p>
            </div>
            @endif

            <p>El informe completo se encuentra adjunto a este correo en formato PDF.</p>

            @if($detalle['body']['es_paciente'])
            <p><strong>Importante:</strong> Este documento contiene información médica confidencial. Manténgalo en un lugar seguro y compártalo únicamente con profesionales de la salud autorizados.</p>
            @endif

            <p>Si tienes alguna consulta sobre este informe, no dudes en contactarte con nosotros.</p>

            <p>Saludos cordiales,<br>
            <strong>Equipo MED-SDI</strong></p>
        </div>

        <div class="footer">
            <p>Este es un correo automático, por favor no responder a esta dirección.</p>
            <p>© {{ date('Y') }} MED-SDI - Sistema de Información de Salud</p>
        </div>
    </div>
</body>
</html>