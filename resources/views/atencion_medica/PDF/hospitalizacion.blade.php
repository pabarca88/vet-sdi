<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Orden de Hospitalización</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>
<body>
    @include('PDF.header')
    @include('PDF.footer')

    <h2>Datos de Hospitalización</h2>
    <ul>
        <li><strong>Institución:</strong> {{ $array_hospitalizacion['nom_inst'] }}</li>
        <li><strong>Motivo:</strong> {{ $array_hospitalizacion['motivo_hosp'] }}</li>
        <li><strong>Hospitalización en servicio:</strong> {{ $array_hospitalizacion['hosp_enserv'] }}</li>
        <li><strong>Hospitalización en:</strong> {{ $array_hospitalizacion['hospen'] }}</li>
        <li><strong>Servicio:</strong> {{ $array_hospitalizacion['servicio_hosp'] }}</li>
        <li><strong>Clínica / Hospital origen:</strong> {{ $cuerpo['array_lugar_atencion']['nombre'] }}</li>
        <li><strong>Diagnóstico de ingreso:</strong> {{ $array_hospitalizacion['diagn_ingreso'] }}</li>
        <li><strong>¿Preparar para cirugía?:</strong> {{ $array_hospitalizacion['preparar_cirugia'] ? 'Sí' : 'No' }}</li>
        <li><strong>Observaciones:</strong> {{ $array_hospitalizacion['obs_hospitalizar'] }}</li>
        <li><strong>Otros antecedentes:</strong> {{ $array_hospitalizacion['otros_antecedentes'] }}</li>
    </ul>

    <h3 style="margin-top: 30px;">Indicaciones de Ingreso</h3>
    <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>Motivo</strong></td>
            <td style="border: 1px solid #000; padding: 5px;">{{ $array_hospitalizacion['motivo_hosp_indicaciones'] ?? '' }}</td>
        </tr>
        {{-- Medicamentos múltiples --}}
        <tr>
            <td colspan="2" style="border: 1px solid #000; padding: 5px;"><strong>Examenes Indicados</strong></td>
        </tr>
        @if (!empty($array_hospitalizacion['examenes']))
            @foreach ($array_hospitalizacion['examenes'] as $examen)
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        {{ $examen->examen ?? '—' }}
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        {{ $examen->tipo_examen ?? '' }} - {{ $examen->sub_tipo_examen ?? '' }} ({{ $examen->prioridad ?? '' }})
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" style="border: 1px solid #000; padding: 5px;">Sin indicaciones</td>
            </tr>
        @endif


        {{-- Medicamentos múltiples --}}
        <tr>
            <td colspan="2" style="border: 1px solid #000; padding: 5px;"><strong>Medicamentos Indicados</strong></td>
        </tr>
        <tr>
            <th style="border: 1px solid #000; padding: 5px;">Nombre</th>
            <th style="border: 1px solid #000; padding: 5px;">Dosis y Frecuencia</th>
        </tr>
        @if (!empty($array_hospitalizacion['medicamentos']))
            @foreach ($array_hospitalizacion['medicamentos'] as $med)
                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">{{ $med['nombre'] }}</td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        {{ $med['dosis'] }} - {{ $med['frecuencia'] }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2" style="border: 1px solid #000; padding: 5px;">Sin indicaciones</td>
            </tr>
        @endif

        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>Control de Enfermería</strong></td>
            <td style="border: 1px solid #000; padding: 5px;">{{ $array_hospitalizacion['control_enfermeria'] ?? '' }}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 5px;"><strong>Otras Indicaciones</strong></td>
            <td style="border: 1px solid #000; padding: 5px;">{{ $array_hospitalizacion['otras_indicaciones'] ?? '' }}</td>
        </tr>
    </table>

</body>
</html>
