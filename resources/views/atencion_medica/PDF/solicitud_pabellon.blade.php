<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Pabellón</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>
<body>
    @include('PDF.header')
    @include('PDF.footer')

    <h2>Datos de la Solicitud de Pabellón</h2>
    <ul>
        <li><strong>Grado de Urgencia:</strong> {{ $array_hospitalizacion['grado_urgencia'] }}</li>
        <li><strong>Hospital:</strong> {{ $array_hospitalizacion['hospital'] }}</li>
        <li><strong>Fecha y Hora de Operación:</strong> {{ \Carbon\Carbon::parse($array_hospitalizacion['fecha_hora_operacion'])->format('d/m/Y H:i') }}</li>
        <li><strong>Operación:</strong> {{ $array_hospitalizacion['operacion'] }}</li>
        <li><strong>Código de Cirugía:</strong> {{ $array_hospitalizacion['codigo_cirugia'] }}</li>
        <li><strong>Tipo de Cirugía:</strong> {{ $array_hospitalizacion['tipo_cirugia'] }}</li>
        <li><strong>Especialidad Principal:</strong> {{ $array_hospitalizacion['especialidad_1'] }}</li>
        <li><strong>Equipamiento Especial:</strong> {{ $array_hospitalizacion['equipamiento_especial'] }}</li>
        <li><strong>Patologías Crónicas:</strong> {{ $array_hospitalizacion['patalogias_cronicas'] }}</li>
        <li><strong>Diagnóstico Preoperatorio:</strong> {{ $array_hospitalizacion['diagnostico_preoperatorio'] }}</li>
        <li><strong>Comentarios:</strong> {{ $array_hospitalizacion['comentarios'] }}</li>
        <li><strong>Otros Antecedentes:</strong> {{ $array_hospitalizacion['otros_antecedentes'] }}</li>
    </ul>

   <h3 style="margin-top: 30px;">Equipo Quirúrgico</h3>
<table style="width: 100%; border-collapse: collapse; font-size: 12px;">
    <tr>
        <th style="border: 1px solid #000; padding: 5px;">Nombre</th>
        <th style="border: 1px solid #000; padding: 5px;">Especialidad</th>
        <th style="border: 1px solid #000; padding: 5px;">Rol</th>
    </tr>
    @if (!empty($array_hospitalizacion['equipo']))
        @foreach ($array_hospitalizacion['equipo'] as $profesional)
            <tr>
                <td style="border: 1px solid #000; padding: 5px;">{{ $profesional['nombre'] }}</td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $profesional['especialidad'] ?? 'No especificada' }}</td>
                <td style="border: 1px solid #000; padding: 5px;">{{ $profesional['rol'] }}</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3" style="border: 1px solid #000; padding: 5px;">No se especificaron profesionales del equipo</td>
        </tr>
    @endif
</table>


</body>
</html>
