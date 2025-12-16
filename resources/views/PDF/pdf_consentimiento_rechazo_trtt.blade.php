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
                Soy paciente del profesional Dr. {{ $cuerpo['array_profesional']['nombre'] }}.<br>
                Que me esta trantando por el Diagnostico de: {{ $cuerpo['consentimiento']['diagnostico'] }}. <br>
                Indica el tratamiento médico, procedimientos y/o cirugia: {{ $cuerpo['consentimiento']['tratamiento'] }}. <br>
            </li>
            <li style="margin-top: 20px;">
                Principalmente por motivos personales , es que solicito mi Alta Voluntaria.<br>
                El motivos: {{ $cuerpo['consentimiento']['observaciones_rech'] }}.
            </li>
            <li style="margin-top: 20px;">Al autorizar mediante email o por la app. Me hago responsable de esta solicitud y asumo las consecuencias que ésta implica.</li>
        </ol>
    </main>
</html>

