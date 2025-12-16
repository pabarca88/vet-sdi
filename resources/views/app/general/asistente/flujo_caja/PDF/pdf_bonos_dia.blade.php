<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bonos Vendidos por Convenio</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; margin: 20px; }
        .header { text-align: center; font-weight: bold; margin-bottom: 10px; }
        .subheader { margin-top: 10px; margin-bottom: 10px; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; font-size: 11px; }
        th, td { border: 1px solid #000; padding: 4px; text-align: center; }
        th:nth-child(1), td:nth-child(1),
        th:nth-child(2), td:nth-child(2),
        th:nth-child(3), td:nth-child(3) {
            text-align: center;
        }
        .totales td { font-weight: bold; }
        .align-left { text-align: left; }
    </style>
</head>
<body>
    <div style="text-align: left; margin-bottom: 10px;">
        <img src="{{ public_path('images/logo_.png') }}" alt="Logo" height="60">
    </div>
    <div class="header">
        BONOS VENDIDOS POR CONVENIO
    </div>

    <div class="subheader">
        <table>
            <tr>
                <td class="align-left"><strong>IMED</strong></td>
                <td colspan="3" class="align-left"><strong>FECHA:</strong> {{ \Carbon\Carbon::parse($fecha_rendicion)->format('d-m-Y') }}</td>
                <td><strong>PAGINA:</strong> 1</td>
            </tr>
            <tr>
                <td class="align-left"><strong>Fondo:</strong> Fondo Nacional de Salud</td>
                <td colspan="3" class="align-left"><strong>Lugar Atención:</strong> {{ $lugar_atencion->nombre }}</td>
                <td><strong>Prestador:</strong>@if(isset($profesional_agenda)) <br>Dr. {{ $profesional_agenda->nombre }} {{ $profesional_agenda->apellido_uno }} @endif</td>
            </tr>
        </table>
    </div>

    <div class="subheader">
        <strong>PERIODO:</strong> DESDE {{ \Carbon\Carbon::parse($fecha_rendicion)->format('d-m-Y') }} HASTA {{ \Carbon\Carbon::parse($fecha_rendicion)->format('d-m-Y') }}
    </div>

    <table>
        <thead>
            <th colspan="6">BONOS VENDIDOS EN EL PERÍODO</th>
            <tr>
                <th>FOLIO BONO</th>
                <th>RUT BENEFICIARIO</th>
                <th>FECHA EMISIÓN</th>
                <th>VALOR COPAGO</th>
                <th>BONIFICACIONES</th>
                <th>VALOR TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sum_copago = 0;
                $sum_bonif = 0;
                $sum_total = 0;
            @endphp

            @foreach ($bonos as $bono)
            @if($bono->id_clase_bono != 6)
                @php
                    $copago = $bono->valor_atencion;
                    $bonificacion = $bono->bonificacion; // valor estimado o sacado de la base si tienes uno real
                    $valor_total = $copago + $bonificacion;

                    $sum_copago += $copago;
                    $sum_bonif += $bonificacion;
                    $sum_total += $valor_total;
                @endphp
                <tr>
                    <td>{{ $bono->folio ?? $bono->id }}</td>
                    <td>{{ $bono->paciente->rut ?? '---' }}</td>
                    <td>{{ \Carbon\Carbon::parse($bono->fecha_atencion)->format('d-m-Y') }}</td>
                    <td>{{ number_format($copago, 0, ',', '.') }}</td>
                    <td>{{ number_format($bonificacion, 0, ',', '.') }}</td>
                    <td>{{ number_format($valor_total, 0, ',', '.') }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
        <tfoot class="totales">
            <tr>
                <td colspan="3">TOTAL PRESTADOR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">TOTAL LUGAR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">TOTAL FINANCIADOR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    <table>
        <thead>
            <th colspan="6">ATENCIÓN PARTICULAR EN EL PERÍODO</th>
            <tr>
                <th>FOLIO BONO</th>
                <th>RUT BENEFICIARIO</th>
                <th>FECHA EMISIÓN</th>
                <th>VALOR COPAGO</th>
                <th>BONIFICACIONES</th>
                <th>VALOR TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @php
                $sum_copago = 0;
                $sum_bonif = 0;
                $sum_total = 0;
            @endphp

            @foreach ($bonos as $bono)
            @if($bono->id_clase_bono == 6)
                @php
                    $copago = $bono->valor_atencion;
                    $bonificacion = $bono->bonificacion; // valor estimado o sacado de la base si tienes uno real
                    $valor_total = $copago + $bonificacion;

                    $sum_copago += $copago;
                    $sum_bonif += $bonificacion;
                    $sum_total += $valor_total;
                @endphp
                <tr>
                    <td>BOLETA</td>
                    <td>{{ $bono->paciente->rut ?? '---' }}</td>
                    <td>{{ \Carbon\Carbon::parse($bono->fecha_atencion)->format('d-m-Y') }}</td>
                    <td>{{ number_format($copago, 0, ',', '.') }}</td>
                    <td>{{ number_format($bonificacion, 0, ',', '.') }}</td>
                    <td>{{ number_format($valor_total, 0, ',', '.') }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
        <tfoot class="totales">
            <tr>
                <td colspan="3">TOTAL PRESTADOR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">TOTAL LUGAR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <td colspan="3">TOTAL FINANCIADOR</td>
                <td>{{ number_format($sum_copago, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_bonif, 0, ',', '.') }}</td>
                <td>{{ number_format($sum_total, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
    @if(isset($profesional_agenda))
    <br><br><br>
    <div style="width: 100%; text-align: center; margin-top: 40px;">
        <div style="width: 40%; float: left; text-align: center;">
            ___________________________<br>
            Firma Asistente<br>
            {{ $asistente->nombres }} {{ $asistente->apellido_uno }}
        </div>
        <div style="width: 40%; float: right; text-align: center;">
            ___________________________<br>
            Firma Profesional<br>
            @if($profesional_agenda)
                {{ $profesional_agenda->nombre }} {{ $profesional_agenda->apellido_uno }}
            @endif
        </div>
    </div>
    <div style="clear: both;"></div>
    @else
    <br><br><br>
    <div style="width: 100%; text-align: center; margin-top: 40px;">
        <div style="width: 40%; float: left; text-align: center;">
            ___________________________<br>
            Firma Asistente<br>
            {{ $asistente->nombres }} {{ $asistente->apellido_uno }}
        </div>
    @endif
</body>
</html>
