<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        <h3 style="text-align: center">Exámen de Biopsia</h3>
            <table class="tabla-receta" style="margin-top: 10px; border-collapse: collapse; width: 100%;">
                <thead>
                    <tr style="background-color: #FAFAFA; text-align: left;">
                        <th>Fecha</th>
                        <th>N° Orden</th>
                        <th>Zonas</th>
                        <th>Patólogo</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $cuerpo['array_examenes']['fecha'] }}</td>
                        <td>{{ $cuerpo['array_examenes']['id'] }}</td>
                        <td>
                            @php
                                $zonas = [];
                                if ($cuerpo['array_examenes']['zona1']) $zonas[] = $cuerpo['array_examenes']['zona1'];
                                if ($cuerpo['array_examenes']['zona2']) $zonas[] = $cuerpo['array_examenes']['zona2'];
                                if ($cuerpo['array_examenes']['zona3']) $zonas[] = $cuerpo['array_examenes']['zona3'];
                                if ($cuerpo['array_examenes']['zona4']) $zonas[] = $cuerpo['array_examenes']['zona4'];
                            @endphp
                            {{ implode(', ', $zonas) }}
                        </td>
                        <td>{{ $cuerpo['array_examenes']['patologo'] }}</td>
                        <td>{{ $cuerpo['array_examenes']['observaciones'] }}</td>
                    </tr>
                </tbody>
            </table>
    </main>


</html>

