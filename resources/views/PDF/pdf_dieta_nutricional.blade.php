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
        <h2 style="text-align:center;">Plan de Dieta Nutricional</h2>
        <table style="width:100%; border-collapse:collapse;">
            <tr>
                <th style="text-align:left;">Dieta para:</th>
                <td>{{ $cuerpo['dieta']->dieta_para ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Desayuno:</th>
                <td>{{ $cuerpo['dieta']->desayuno ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Merienda:</th>
                <td>{{ $cuerpo['dieta']->merienda ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Almuerzo:</th>
                <td>{{ $cuerpo['dieta']->almuerzo ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Media Tarde:</th>
                <td>{{ $cuerpo['dieta']->media_tarde ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Cena:</th>
                <td>{{ $cuerpo['dieta']->cena ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Alimentos Prohibidos:</th>
                <td>{{ $cuerpo['dieta']->alimentos_prohibidos ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Sustitución:</th>
                <td>{{ $cuerpo['dieta']->sustitucion ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Recomendaciones:</th>
                <td>{{ $cuerpo['dieta']->recomendaciones ?? '-' }}</td>
            </tr>
            <tr>
                <th style="text-align:left;">Fecha:</th>
                <td>{{ $cuerpo['dieta']->fecha ?? '-' }}</td>
            </tr>
        </table>
    </main>
</html>

