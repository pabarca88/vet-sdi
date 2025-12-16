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
        <ol>
            <li style="margin-top: 100px;">
                Soy paciente del profesional Dr. {{ $cuerpo['array_profesional']['nombre'] }} a quien otorgé el Consentimiento Informado con fecha {{ date('d-m-Y H:i', strtotime($cuerpo['consentimiento']['fecha_cons'])) }}.
                <ul>
                    <li>Consentimiento: {{ $cuerpo['consentimiento']['nombre'] }}</li>
                    <li>Diagnóstico: {{ $cuerpo['consentimiento']['diagnostico'] }}</li>
                    <li>Cirugía o procedimiento propuesto : {{ $cuerpo['consentimiento']['procedimiento'] }}</li>
                </ul>
            </li>
            <li style="margin-top: 20px;">El cual revoco el día {{ date('d-m-Y', strtotime($cuerpo['consentimiento']['fecha_revocacion'])) }},
                @if(isset($cuerpo['consentimiento']['observacion_rev']))
                    por el motivo {{ $cuerpo['consentimiento']['observacion_rev'] }}
                @endif
            </li>
            <li style="margin-top: 20px;">Al autorizar mediante email o por la app., Me doy por informado y revoco mi consentimiento para el procedimiento enunciado precedentemente.</li>
        </ol>
    </main>
</html>

