<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación VPPB - Vértigo Posicional Paroxístico Benigno</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            color: #000;
        }

        .container {
            width: 100%;
            max-width: 18cm;
            margin: 0 auto;
            padding: 15px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .header h1 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .header h2 {
            font-size: 14px;
            font-weight: normal;
            color: #34495e;
            margin-bottom: 5px;
        }

        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            border: 2px solid #2c3e50;
            padding: 12px;
            background-color: #f8f9fa;
        }

        .patient-info div {
            flex: 1;
        }

        .patient-info strong {
            color: #2c3e50;
        }

        .section {
            margin-bottom: 20px;
            border: 1px solid #34495e;
            border-radius: 5px;
            overflow: hidden;
        }

        .section-title {
            font-weight: bold;
            font-size: 13px;
            background-color: #34495e;
            color: white;
            padding: 8px 12px;
            margin: 0;
        }

        .section-content {
            padding: 15px;
        }

        .form-group {
            margin-bottom: 12px;
            display: flex;
            align-items: flex-start;
        }

        .form-group label {
            min-width: 140px;
            font-weight: bold;
            color: #2c3e50;
            margin-right: 10px;
        }

        .form-group .value {
            flex: 1;
            padding: 4px 8px;
            border-bottom: 1px solid #bdc3c7;
            min-height: 20px;
        }

        .two-column {
            display: flex;
            gap: 20px;
        }

        .column {
            flex: 1;
        }

        .test-result {
            background-color: #ecf0f1;
            border: 1px solid #bdc3c7;
            border-radius: 3px;
            padding: 8px;
            margin-bottom: 10px;
        }

        .test-result .test-name {
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .observations-box {
            border: 2px solid #34495e;
            border-radius: 5px;
            padding: 15px;
            min-height: 120px;
            background-color: #f8f9fa;
        }

        .treatment-box {
            border: 2px solid #27ae60;
            border-radius: 5px;
            padding: 15px;
            min-height: 100px;
            background-color: #f1f8e9;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #7f8c8d;
            border-top: 1px solid #bdc3c7;
            padding-top: 10px;
        }

        .signature-section {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            width: 200px;
            text-align: center;
            border-top: 1px solid #000;
            padding-top: 5px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>EVALUACIÓN VPPB</h1>
            <h2>Vértigo Posicional Paroxístico Benigno</h2>
            <p><strong>Centro Médico:</strong> {{ $lugar_atencion->nombre ?? 'N/A' }}</p>
        </div>

        <!-- Información del Paciente -->
        <div class="patient-info">
            <div>
                <strong>Paciente:</strong> {{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }}<br>
                <strong>RUT:</strong> {{ $paciente->rut ?? 'N/A' }}<br>
                <strong>Edad:</strong> {{ \Carbon\Carbon::parse($paciente->fecha_nac)->age ?? 'N/A' }}
            </div>
            <div>
                <strong>Fecha Examen:</strong> {{ $fecha_examen ?? date('d-m-Y') }}<br>
                <strong>Profesional:</strong> {{ $profesional->nombres ?? '' }} {{ $profesional->apellidos ?? '' }}<br>
                <strong>Especialidad:</strong> {{ $profesional->especialidad->nombre ?? 'N/A' }}
            </div>
            <div>
                <strong>Ficha N°:</strong> {{ $ficha_atencion->id ?? 'N/A' }}<br>
                <strong>Derivado por:</strong> {{ $derivado_por ?? 'N/A' }}
            </div>
        </div>

        <!-- Anamnesis -->
        <div class="section">
            <div class="section-title">ANAMNESIS</div>
            <div class="section-content">
                <div class="form-group">
                    <label>Motivo de consulta:</label>
                    <div class="value">{{ $motivo_consulta ?? '' }}</div>
                </div>
                <div class="form-group">
                    <label>Historia actual:</label>
                    <div class="value">{{ $historia_actual ?? '' }}</div>
                </div>
                <div class="form-group">
                    <label>Síntomas asociados:</label>
                    <div class="value">{{ $sintomas_asociados ?? '' }}</div>
                </div>
            </div>
        </div>

        <!-- Evaluación Clínica -->
        <div class="section">
            <div class="section-title">EVALUACIÓN CLÍNICA VPPB</div>
            <div class="section-content">
                <div class="two-column">
                    <div class="column">
                        <!-- Maniobras Diagnósticas -->
                        <h4 style="color: #2c3e50; margin-bottom: 10px;">Maniobras Diagnósticas</h4>

                        <div class="test-result">
                            <div class="test-name">Maniobra de Dix-Hallpike (Derecha)</div>
                            <div class="form-group">
                                <label>Resultado:</label>
                                <div class="value">{{ $dix_hallpike_derecha ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>Nistagmo:</label>
                                <div class="value">{{ $nistagmo_dix_derecha ?? '' }}</div>
                            </div>
                        </div>

                        <div class="test-result">
                            <div class="test-name">Maniobra de Dix-Hallpike (Izquierda)</div>
                            <div class="form-group">
                                <label>Resultado:</label>
                                <div class="value">{{ $dix_hallpike_izquierda ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>Nistagmo:</label>
                                <div class="value">{{ $nistagmo_dix_izquierda ?? '' }}</div>
                            </div>
                        </div>

                        <div class="test-result">
                            <div class="test-name">Maniobra de McClure (Roll Test)</div>
                            <div class="form-group">
                                <label>Resultado:</label>
                                <div class="value">{{ $mcclure_test ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>Nistagmo:</label>
                                <div class="value">{{ $nistagmo_mcclure ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="column">
                        <!-- Otros Hallazgos -->
                        <h4 style="color: #2c3e50; margin-bottom: 10px;">Otros Hallazgos</h4>

                        <div class="form-group">
                            <label>Head Impulse Test:</label>
                            <div class="value">{{ $head_impulse ?? '' }}</div>
                        </div>

                        <div class="form-group">
                            <label>Nistagmo espontáneo:</label>
                            <div class="value">{{ $nistagmo_espontaneo ?? '' }}</div>
                        </div>

                        <div class="form-group">
                            <label>Prueba de Romberg:</label>
                            <div class="value">{{ $romberg ?? '' }}</div>
                        </div>

                        <div class="form-group">
                            <label>Marcha:</label>
                            <div class="value">{{ $marcha ?? '' }}</div>
                        </div>

                        <div class="form-group">
                            <label>Coordinación:</label>
                            <div class="value">{{ $coordinacion ?? '' }}</div>
                        </div>

                        <div class="form-group">
                            <label>Función cerebelar:</label>
                            <div class="value">{{ $funcion_cerebelar ?? '' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Diagnóstico -->
        <div class="section">
            <div class="section-title">DIAGNÓSTICO</div>
            <div class="section-content">
                <div class="form-group">
                    <label>Tipo de VPPB:</label>
                    <div class="value">{{ $tipo_vppb ?? '' }}</div>
                </div>
                <div class="form-group">
                    <label>Canal afectado:</label>
                    <div class="value">{{ $canal_afectado ?? '' }}</div>
                </div>
                <div class="form-group">
                    <label>Lateralidad:</label>
                    <div class="value">{{ $lateralidad ?? '' }}</div>
                </div>
            </div>
        </div>

        <!-- Tratamiento -->
        <div class="section">
            <div class="section-title">PLAN DE TRATAMIENTO</div>
            <div class="section-content">
                <div class="form-group">
                    <label>Tipo de tratamiento:</label>
                </div>
                <div class="treatment-box">
                    {{ $tipo_tratamiento ?? 'No especificado' }}
                </div>
            </div>
        </div>

        <!-- Observaciones -->
        <div class="section">
            <div class="section-title">OBSERVACIONES Y RECOMENDACIONES</div>
            <div class="section-content">
                <div class="observations-box">
                    {{ $observaciones ?? 'Sin observaciones adicionales' }}
                </div>
            </div>
        </div>

        <!-- Seguimiento -->
        <div class="section">
            <div class="section-title">SEGUIMIENTO</div>
            <div class="section-content">
                <div class="form-group">
                    <label>Próximo control:</label>
                    <div class="value">{{ $proximo_control ?? '' }}</div>
                </div>
                <div class="form-group">
                    <label>Indicaciones:</label>
                    <div class="value">{{ $indicaciones_seguimiento ?? '' }}</div>
                </div>
            </div>
        </div>

        <!-- Firmas -->
        <div class="signature-section">
            <div class="signature-box">
                <strong>{{ $profesional->nombres ?? '' }} {{ $profesional->apellidos ?? '' }}</strong><br>
                {{ $profesional->especialidad->nombre ?? '' }}<br>
                Reg. Prof.: {{ $profesional->registro_profesional ?? 'N/A' }}
            </div>
            <div class="signature-box">
                Fecha: {{ $fecha_examen ?? date('d-m-Y') }}
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Sistema de Gestión Médica - Examen VPPB</p>
            <p>Documento generado el {{ date('d/m/Y H:i') }}</p>
        </div>
    </div>
</body>
</html>
