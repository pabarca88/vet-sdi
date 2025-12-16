<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Funcional del 8° Par</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.2;
            color: #000;
        }

        /* Estilo para campos de dirección de nistagmo con símbolos Unicode */
        .nistagmo-direction {
            font-family: "Arial Unicode MS", "Segoe UI Symbol", "DejaVu Sans", "Noto Sans Symbols", Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            line-height: 1.4;
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
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            border: 1px solid #000;
            padding: 8px;
        }

        .patient-info div {
            flex: 1;
        }

        .section {
            margin-bottom: 20px;
            border: 1px solid #000;
            padding: 10px;
        }

        .section-title {
            font-weight: bold;
            font-size: 12px;
            background-color: #f0f0f0;
            padding: 3px 6px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
        }

        .two-column {
            display: flex;
            gap: 15px;
        }

        .column {
            flex: 1;
        }

        .form-group {
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            min-width: 150px;
            font-weight: normal;
        }

        .form-group .value {
            flex: 1;
            border-bottom: 1px solid #000;
            min-height: 18px;
            padding: 2px 4px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 5px;
        }

        .checkbox-item {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            display: inline-block;
            text-align: center;
            line-height: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
            font-size: 9px;
        }

        .table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .text-area {
            border: 1px solid #000;
            min-height: 60px;
            padding: 5px;
            width: 100%;
        }

        .signature-section {
            margin-top: 30px;
            text-align: center;
        }

        .signature-line {
            border-top: 1px solid #000;
            width: 200px;
            margin: 20px auto 5px;
        }

        .small-text {
            font-size: 9px;
        }

        .center {
            text-align: center;
        }

        .nistagmo-table {
            font-size: 8px;
        }

        .nistagmo-table th,
        .nistagmo-table td {
            padding: 2px;
            min-width: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <h1>EXAMEN FUNCIONAL DEL 8° PAR</h1>
        </div>

        <!-- PATIENT INFO -->
        <div class="patient-info">
            <div>
                <strong>Nombre:</strong> {{ $paciente->nombres ?? '' }} {{ $paciente->apellido_uno ?? '' }}
            </div>
            <div>
                <strong>Edad:</strong> {{ $paciente->edad ?? '' }}
            </div>
            <div>
                <strong>Fecha: {{ $fecha_examen ?? date('d-m-Y') }}</strong>
            </div>
        </div>

        <div class="patient-info">
            <div>
                <strong>Enviado por:</strong> {{ $derivado_por ?? '' }}
            </div>
            <div>
                <strong>RUT:</strong> {{ $paciente->rut ?? '' }}
            </div>
        </div>

        <div class="two-column">
            <!-- COLUMNA IZQUIERDA -->
            <div class="column">


                <!-- EXAMEN OTONEUROLÓGICO -->
                <div class="section">
                    <div class="section-title">EXAMEN OTONEUROLÓGICO</div>

                    <!-- I. PARES CRANEANOS -->
                    <div style="margin-bottom: 15px;">
                        <strong>I. PARES CRANEANOS</strong>
                        <div class="text-area">{{ $otros_pares_craneanos ?? '' }}</div>

                    </div>
                    <!-- II. EQUILIBRIO -->
                    <div style="margin-bottom: 15px;">
                        <strong>II. EQUILIBRIO</strong>
                        <div style="margin-left: 15px;">
                            <div><strong>Equilibrio estático</strong></div>
                            <div class="form-group">
                                <label>• Prueba de Romberg</label>
                                <div class="value">{{ $romberg ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>• Romberg sensibilizado</label>
                                <div class="value">{{ $romberg_sens ?? '' }}</div>
                            </div>

                            <div style="margin-top: 10px;"><strong>Equilibrio dinámico</strong></div>
                            <div class="form-group">
                                <label>• Marcha con ojos abiertos</label>
                                <div class="value">{{ $marcha_ojo_ab ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>• Marcha con ojos hacia adelante</label>
                                <div class="value">{{ $marcha_adelante ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>• Marcha goga hacia atrás</label>
                                <div class="value">{{ $marcha_atras ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>• Marcha sobre una línea</label>
                                <div class="value">{{ $marcha_linea ?? '' }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- III. CEREBELO -->
                    <div style="margin-bottom: 15px;">
                        <strong>III. CEREBELO</strong>
                        <div class="form-group">
                            <label>• Temblor intencional</label>
                            <div class="value">{{ $temblor ?? '' }}</div>
                        </div>
                        <div class="form-group">
                            <label>• Prueba de coordinación</label>
                            <div class="value">{{ $coordinacion ?? '' }}</div>
                        </div>
                        <div class="form-group">
                            <label>• Dismetría</label>
                            <div class="value">{{ $dismetria ?? '' }}</div>
                        </div>
                        <div class="form-group">
                            <label>• Disdiadoco</label>
                            <div class="value">{{ $disdiadoco ?? '' }}</div>
                        </div>
                        <div class="form-group">
                            <label>• Discinergia</label>
                            <div class="value">{{ $discinergia ?? '' }}</div>
                        </div>
                        <div class="form-group">
                            <label>• Tono muscular</label>
                            <div class="value">{{ $tono_muscular ?? '' }}</div>
                        </div>
                    </div>

                    <!-- IV. NISTAGMO ESPONTÁNEO -->
                    <div>
                        <strong>IV. NISTAGMO ESPONTÁNEO</strong>
                        <div class="text-area">{{ $nistagmo_espontaneo ?? '' }}</div>

                        <div style="margin-top: 10px;">
                            <div class="form-group">
                                <label>• Mov oculares voluntarios y de persecución</label>
                                <div class="value">{{ $mov_oculares ?? '' }}</div>
                            </div>
                            <div class="form-group">
                                <label>• Dismetría ocular</label>
                                <div class="value">{{ $dismetria_ocular ?? '' }}</div>
                            </div>
                        </div>

                        <div style="margin-top: 10px;">
                            <strong>Head impulse test:</strong> {{ $head_impulse_test ?? '' }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- COLUMNA DERECHA -->
            <div class="column">
                <!-- V. NISTAGMO PROVOCADO -->
                <div class="section">
                    <div class="section-title">V. NISTAGMO PROVOCADO</div>

                    <div style="margin-bottom: 15px;">
                        <strong>Nistagmo posicional</strong>
                        <table class="table nistagmo-table">
                            <thead>
                                <tr>
                                    <th>POSICIÓN</th>
                                    <th>DIRECCIÓN</th>
                                    <th>LATENCIA</th>
                                    <th>PAROXÍSTICO</th>
                                    <th>FATIGABLE</th>
                                    <th>DURACIÓN</th>
                                    <th>VÉRTIGO</th>
                                    <th>NÁUSEAS</th>
                                    <th>VÓMITO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EaS</td>
                                    <td class="nistagmo-direction">{{ $eas_direccion ?? '' }}</td>
                                    <td>{{ $eas_latencia ?? '' }}</td>
                                    <td>{{ $eas_paroxistico ?? '' }}</td>
                                    <td>{{ $eas_fatigable ?? '' }}</td>
                                    <td>{{ $eas_duracion ?? '' }}</td>
                                    <td>{{ $eas_vertigo ?? '' }}</td>
                                    <td>{{ $eas_nauseas ?? '' }}</td>
                                    <td>{{ $eas_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>SaD</td>
                                    <td class="nistagmo-direction">{{ $sad_direccion ?? '' }}</td>
                                    <td>{{ $sad_latencia ?? '' }}</td>
                                    <td>{{ $sad_paroxistico ?? '' }}</td>
                                    <td>{{ $sad_fatigable ?? '' }}</td>
                                    <td>{{ $sad_duracion ?? '' }}</td>
                                    <td>{{ $sad_vertigo ?? '' }}</td>
                                    <td>{{ $sad_nauseas ?? '' }}</td>
                                    <td>{{ $sad_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>DaS</td>
                                    <td class="nistagmo-direction">{{ $das_direccion ?? '' }}</td>
                                    <td>{{ $das_latencia ?? '' }}</td>
                                    <td>{{ $das_paroxistico ?? '' }}</td>
                                    <td>{{ $das_fatigable ?? '' }}</td>
                                    <td>{{ $das_duracion ?? '' }}</td>
                                    <td>{{ $das_vertigo ?? '' }}</td>
                                    <td>{{ $das_nauseas ?? '' }}</td>
                                    <td>{{ $das_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>SaL</td>
                                    <td class="nistagmo-direction">{{ $sal_direccion ?? '' }}</td>
                                    <td>{{ $sal_latencia ?? '' }}</td>
                                    <td>{{ $sal_paroxistico ?? '' }}</td>
                                    <td>{{ $sal_fatigable ?? '' }}</td>
                                    <td>{{ $sal_duracion ?? '' }}</td>
                                    <td>{{ $sal_vertigo ?? '' }}</td>
                                    <td>{{ $sal_nauseas ?? '' }}</td>
                                    <td>{{ $sal_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>LaS</td>
                                    <td class="nistagmo-direction">{{ $las_direccion ?? '' }}</td>
                                    <td>{{ $las_latencia ?? '' }}</td>
                                    <td>{{ $las_paroxistico ?? '' }}</td>
                                    <td>{{ $las_fatigable ?? '' }}</td>
                                    <td>{{ $las_duracion ?? '' }}</td>
                                    <td>{{ $las_vertigo ?? '' }}</td>
                                    <td>{{ $las_nauseas ?? '' }}</td>
                                    <td>{{ $las_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>SaE</td>
                                    <td class="nistagmo-direction">{{ $sae_direccion ?? '' }}</td>
                                    <td>{{ $sae_latencia ?? '' }}</td>
                                    <td>{{ $sae_paroxistico ?? '' }}</td>
                                    <td>{{ $sae_fatigable ?? '' }}</td>
                                    <td>{{ $sae_duracion ?? '' }}</td>
                                    <td>{{ $sae_vertigo ?? '' }}</td>
                                    <td>{{ $sae_nauseas ?? '' }}</td>
                                    <td>{{ $sae_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>EaCC</td>
                                    <td class="nistagmo-direction">{{ $eacc_direccion ?? '' }}</td>
                                    <td>{{ $eacc_latencia ?? '' }}</td>
                                    <td>{{ $eacc_paroxistico ?? '' }}</td>
                                    <td>{{ $eacc_fatigable ?? '' }}</td>
                                    <td>{{ $eacc_duracion ?? '' }}</td>
                                    <td>{{ $eacc_vertigo ?? '' }}</td>
                                    <td>{{ $eacc_nauseas ?? '' }}</td>
                                    <td>{{ $eacc_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>CCaE</td>
                                    <td class="nistagmo-direction">{{ $ccae_direccion ?? '' }}</td>
                                    <td>{{ $ccae_latencia ?? '' }}</td>
                                    <td>{{ $ccae_paroxistico ?? '' }}</td>
                                    <td>{{ $ccae_fatigable ?? '' }}</td>
                                    <td>{{ $ccae_duracion ?? '' }}</td>
                                    <td>{{ $ccae_vertigo ?? '' }}</td>
                                    <td>{{ $ccae_nauseas ?? '' }}</td>
                                    <td>{{ $ccae_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>EaCCd</td>
                                    <td class="nistagmo-direction">{{ $eaccd_direccion ?? '' }}</td>
                                    <td>{{ $eaccd_latencia ?? '' }}</td>
                                    <td>{{ $eaccd_paroxistico ?? '' }}</td>
                                    <td>{{ $eaccd_fatigable ?? '' }}</td>
                                    <td>{{ $eaccd_duracion ?? '' }}</td>
                                    <td>{{ $eaccd_vertigo ?? '' }}</td>
                                    <td>{{ $eaccd_nauseas ?? '' }}</td>
                                    <td>{{ $eaccd_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>CCdaE</td>
                                    <td class="nistagmo-direction">{{ $ccdae_direccion ?? '' }}</td>
                                    <td>{{ $ccdae_latencia ?? '' }}</td>
                                    <td>{{ $ccdae_paroxistico ?? '' }}</td>
                                    <td>{{ $ccdae_fatigable ?? '' }}</td>
                                    <td>{{ $ccdae_duracion ?? '' }}</td>
                                    <td>{{ $ccdae_vertigo ?? '' }}</td>
                                    <td>{{ $ccdae_nauseas ?? '' }}</td>
                                    <td>{{ $ccdae_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>EaCCi</td>
                                    <td class="nistagmo-direction">{{ $eacci_direccion ?? '' }}</td>
                                    <td>{{ $eacci_latencia ?? '' }}</td>
                                    <td>{{ $eacci_paroxistico ?? '' }}</td>
                                    <td>{{ $eacci_fatigable ?? '' }}</td>
                                    <td>{{ $eacci_duracion ?? '' }}</td>
                                    <td>{{ $eacci_vertigo ?? '' }}</td>
                                    <td>{{ $eacci_nauseas ?? '' }}</td>
                                    <td>{{ $eacci_vomito ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>CCiaE</td>
                                    <td class="nistagmo-direction">{{ $cciae_direccion ?? '' }}</td>
                                    <td>{{ $cciae_latencia ?? '' }}</td>
                                    <td>{{ $cciae_paroxistico ?? '' }}</td>
                                    <td>{{ $cciae_fatigable ?? '' }}</td>
                                    <td>{{ $cciae_duracion ?? '' }}</td>
                                    <td>{{ $cciae_vertigo ?? '' }}</td>
                                    <td>{{ $cciae_nauseas ?? '' }}</td>
                                    <td>{{ $cciae_vomito ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="margin-bottom: 15px;">
                        <strong>Prueba Calórica</strong>
                        <table class="table nistagmo-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>DURACIÓN</th>
                                    <th>FRECUENCIA</th>
                                    <th>AMPLITUD</th>
                                    <th>VÉRTIGO</th>
                                    <th>NÁUSEAS</th>
                                    <th>VÓMITO</th>
                                    <th>VCL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: #e3f2fd;"><strong>OI a 30°C</strong></td>
                                    <td>{{ $io30_duracion ?? '' }}</td>
                                    <td>{{ $io30_frecuencia ?? '' }}</td>
                                    <td>{{ $io30_amplitud ?? '' }}</td>
                                    <td>{{ $io30_vertigo ?? '' }}</td>
                                    <td>{{ $io30_nauseas ?? '' }}</td>
                                    <td>{{ $io30_vomito ?? '' }}</td>
                                    <td>{{ $io30_vcl ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffebee;"><strong>OD a 30°C</strong></td>
                                    <td>{{ $od30_duracion ?? '' }}</td>
                                    <td>{{ $od30_frecuencia ?? '' }}</td>
                                    <td>{{ $od30_amplitud ?? '' }}</td>
                                    <td>{{ $od30_vertigo ?? '' }}</td>
                                    <td>{{ $od30_nauseas ?? '' }}</td>
                                    <td>{{ $od30_vomito ?? '' }}</td>
                                    <td>{{ $od30_vcl ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #e3f2fd;"><strong>OI a 44°C</strong></td>
                                    <td>{{ $io44_duracion ?? '' }}</td>
                                    <td>{{ $io44_frecuencia ?? '' }}</td>
                                    <td>{{ $io44_amplitud ?? '' }}</td>
                                    <td>{{ $io44_vertigo ?? '' }}</td>
                                    <td>{{ $io44_nauseas ?? '' }}</td>
                                    <td>{{ $io44_vomito ?? '' }}</td>
                                    <td>{{ $io44_vcl ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffebee;"><strong>OD a 44°C</strong></td>
                                    <td>{{ $od44_duracion ?? '' }}</td>
                                    <td>{{ $od44_frecuencia ?? '' }}</td>
                                    <td>{{ $od44_amplitud ?? '' }}</td>
                                    <td>{{ $od44_vertigo ?? '' }}</td>
                                    <td>{{ $od44_nauseas ?? '' }}</td>
                                    <td>{{ $od44_vomito ?? '' }}</td>
                                    <td>{{ $od44_vcl ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #e3f2fd;"><strong>OI a 18°C</strong></td>
                                    <td>{{ $oi18_duracion ?? '' }}</td>
                                    <td>{{ $oi18_frecuencia ?? '' }}</td>
                                    <td>{{ $oi18_amplitud ?? '' }}</td>
                                    <td>{{ $oi18_vertigo ?? '' }}</td>
                                    <td>{{ $oi18_nauseas ?? '' }}</td>
                                    <td>{{ $oi18_vomito ?? '' }}</td>
                                    <td>{{ $oi18_vcl ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffebee;"><strong>OD a 18°C</strong></td>
                                    <td>{{ $od18_duracion ?? '' }}</td>
                                    <td>{{ $od18_frecuencia ?? '' }}</td>
                                    <td>{{ $od18_amplitud ?? '' }}</td>
                                    <td>{{ $od18_vertigo ?? '' }}</td>
                                    <td>{{ $od18_nauseas ?? '' }}</td>
                                    <td>{{ $od18_vomito ?? '' }}</td>
                                    <td>{{ $od18_vcl ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- CONCLUSIONES Y OBSERVACIONES -->
                <div class="section">
                    <div class="section-title">CONCLUSIONES Y OBSERVACIONES</div>
                    <div class="text-area">{{ $conclusiones ?? $concluciones_examen ?? '' }}</div>
                </div>
            </div>
        </div>

        <!-- SIGNATURE SECTION -->
        <div class="signature-section">
            <div class="signature-line"></div>
            <div><strong>{{ $profesional->nombres ?? '' }} {{ $profesional->apellidos ?? '' }}</strong></div>
            <div>RUT: {{ $profesional->rut ?? '' }}</div>
            <div>{{ $profesional->especialidad->nombre ?? 'FONOAUDIÓLOGO' }}</div>
            <div class="small-text">FONOAUDIÓLOGO</div>
        </div>
    </div>
</body>
</html>
