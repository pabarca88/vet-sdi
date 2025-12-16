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
        {{-- <p>1. Soy paciente del profesional <strong>Dr.{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.</p> --}}
        {{-- <p>2. Principalmente por motivos personales , es que solicito mi Alta Voluntaria.</p> --}}
        {{-- <p>3. Al autorizar mediante email o por la app.,Me hago responsable de esta solicitud y asumo las consecuencias que ésta implica</p> --}}
        <ol>
            <li style="margin-top: 100px;">
                Soy paciente del profesional Dr. {{ $cuerpo['array_profesional']['nombre'] }}.<br>
                Que me esta trantando por el Diagnostico de: {{ $cuerpo['consentimiento_sol_alta']['diagnostico'] }}. <br>
            </li>
            <li style="margin-top: 20px;">
                Principalmente por motivos personales , es que solicito mi Alta Voluntaria.<br>
                El motivos: {{ $cuerpo['consentimiento_sol_alta']['observaciones_sol_alta'] }}.
            </li>
            <li style="margin-top: 20px;">Al autorizar mediante email o por la app. Me hago responsable de esta solicitud y asumo las consecuencias que ésta implica.</li>
        </ol>
    </main>
</html>

