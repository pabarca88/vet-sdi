<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <!-- <link rel="stylesheet" href="{{ asset('css/pdf.css') }}"> -->
        <style>
            /*Tipografía*/
            @font-face {
                font-family: 'Poppins';
                src:
                local("Poppins"),
                url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
                url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
                url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
                url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
                font-style: bold;
                font-weight: 600;
            }

            @font-face {
                font-family: 'Poppins';
                src:
                local("Poppins"),
                url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
                url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
                url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
                url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
                font-style: regular;
                font-weight: 400;
            }

            h1, h2, h3, h4, h5, h6, span, p, td, th{
                font-family: Poppins, sans-serif;
            }

            h1 {
                text-align: center;
                text-transform: uppercase;
            }

            span {
                text-transform: uppercase;
            }

            /*Tablas*/
            table {
                width: 100%;
            }

            .tabla-receta h3 {
                padding: 5px 5px;
                margin: 0px;
            }
            .tabla-receta table {
                font-size: 1rem;
            }

            .tabla-receta thead {
                background-color: #FAFAFA;
                font-size: 0.7rem;
            }

            .tabla-receta td, th{
                /* padding: 10px 15px; */
                padding: 3px 15px;
            }

            .tabla-receta tbody{
                font-size: 0.7rem;
            }

            .tabla-receta tbody tr:nth-child(odd) {
                background-color: #fff
            }

            .tabla-receta tbody tr:nth-child(even) {
                background-color: #FAFAFA;
            }

            .tabla-receta tr {
                /* padding: 10px; */
                padding: 0px;
            }

            hr {
                border: 1px solid #3C63AD;
                margin-bottom: 0.5rem !important;
                margin-top: 0.5rem !important;
            }

            /*Margin*/
            .mb-5 {
                margin-bottom: 2rem;
            }

            .mt-3 {
                margin-top: 1.2rem;
            }

            /*Padding*/
            .pl-3{
                padding-left: 1.4rem;
            }

            .pr-3{
                padding-right: 1.4rem;
            }

            /*Colors*/
            .text-blue {
                color: #3C63AD;
            }

            .text-gray {
                color: #FAFAFA;
            }

            .text-gray {
                background-color: #FAFAFA;
            }

            /*Contenedores*/
            .contenido-encabezado-uno{
                /* font-size: 0.9rem; */
                /* width: 1000px; */
                height: 124px;
                margin: auto;
                margin-bottom: 0;
            }

            .contenido-encabezado-dos{
                font-size: 0.8rem;
                /* width: 1000px; */
                height: 110px;
                margin: auto;
                padding-right: 1rem;
                padding-left: 1rem;
            }


            .contenido-body {
                margin: auto;
                padding-right: 1rem;
                padding-left: 1rem;
                    /* width: 1000px; */
                /* height: 1000px; */
            }

            .contenido-footer{
                font-size: 0.8rem;
                /* align-item: flex-end; */
                /* width: 1000px; */
                height: 150px;
                /* margin: auto; */
                margin: auto;
            }


            .contenido-infoprof{
                float: right;
                height: auto;
                line-height: 3px;
                font-size: 0.7rem;
                margin-top: 10px;
                padding-top: 5px;
                padding-right: 100px;
                padding-left: 10px;
                width: auto;
                border-left: 4px solid #3366CC;
            }

            .contenido-logo {
                float: left;
                vertical-align: middle;
                width: 150px;
                height: auto;
                padding-top: 28px;
            }

            /*Otros*/

            .logo {
                width: 200px;
                padding-left: 80px;
            }

            img {
                align-items: center;
                width: 18%;
            }

            .centrar {
                text-align: center;
            }

            .text-center {
                text-align: center;
            }

            @page {
                margin: 285px 30px 160px 30px ;
            }

            header {
                position: fixed;
                top: -285px;
                left: 0px;
                right: 0px;
                height: 25085;
            }

            footer {
                position: fixed;
                bottom: -100px;
                left: 0px;
                right: 0px;
                height: 150px;
            }

            .texto-vertical-2 {
                font-size: 0.65em;
                position: fixed;
                writing-mode: vertical-lr;
                transform: rotate(270deg);
                /* right: -320px; */
                right: -355px;
                top: 380px;
                font-family: Poppins;
				width: 100%;
				/* background-color: #FAFAFA; */
            }
            .fecha{
                font-size: 0.9rem;
                text-align: right;
                font-family: Poppins;
            }
            .div-qr{
                border: 4px solid #3366CC;
                border-radius: 10px ;
                width: 90px;
                margin: auto;
                padding: 2px;
            }

        </style>
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        <div class="contenido-body">

            <table class="tabla-receta" style="width:100%">
                {{-- Datos del prestador --}}
                <tr>
                    <td colspan="2">
                        <h3 class="text-blue" style="font-size:15px">Datos del prestador</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Nombre de la Institución (Hospital, Clínica, Consultorio, etc.):</strong> {{ $cuerpo['array']['nombre_institucion_ficha_ges'] }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Dirección:</strong> {{ $cuerpo['array']['direccion_institucion_ficha_ges'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Nombre persona que notifica:</strong> {{ $cuerpo['array_profesional']['nombre'] }}
                    </td>
                    <td>
                        <strong>RUT persona que notifica en representación del Prestador de Salud:</strong> {{ $cuerpo['array_profesional']['rut'] }}
                    </td>
                </tr>

                {{-- Antecedentes del paciente --}}
                <tr>
                    <td colspan="2">
                        <hr/>
                        <h3 class="text-blue" style="font-size:15px">Antecedentes del paciente</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Nombre completo:</strong> {{ $cuerpo['array_paciente']['nombre'] }}
                    </td>
                    <td>
                        <strong>RUT:</strong> {{ $cuerpo['array_paciente']['rut'] }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Dirección:</strong> {{ $cuerpo['array_paciente']['direccion'] }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Teléfono de contacto: </strong><br/>
                        {{ $cuerpo['array_paciente']['telefono_uno'] }}
                    </td>
                    <td>
                        <strong>Correo electrónico (E-mail)</strong><br/>
                        {{ $cuerpo['array_paciente']['email'] }}
                    </td>
                </tr>

                {{-- Información médica --}}
                <tr>
                    <td colspan="2">
                        <hr/>
                        <h3 class="text-blue" style="font-size:15px">Información médica</h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <strong>Confirmación diagnóstica GES (Problema de Salud - Patología)</strong><br/>
                        {{ $cuerpo['array']['nombre_ges'] }}
                    </td>
                </tr>

                {{-- Notificación --}}
                <tr>
                    <td colspan="2">
                        <hr/>
                        <h3 class="text-blue" style="font-size:15px">Notificación</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Fecha:</strong> {{ $cuerpo['array']['fecha_ficha_ges'] }}
                    </td>
                    <td>
                        <strong>Hora:</strong> {{ $cuerpo['array']['hora_ficha_ges'] }}
                    </td>
                </tr>
            </table>
        </div>
    </main>
</html>

