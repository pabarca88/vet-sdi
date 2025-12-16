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

            .tabla-receta table {
                font-size: 1rem;
            }

            .tabla-receta thead {
                background-color: #FAFAFA;
                font-size: 0.7rem;
            }

            .tabla-receta td, th{
                padding: 10px 15px;
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
                padding: 10px;
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
                font-size: 0.75em;
                position: fixed;
                writing-mode: vertical-lr;
                transform: rotate(270deg);
                /* right: -320px; */
                right: -300px;
                top: 400px;
                font-family: Poppins;
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
        @foreach ($cuerpo['detalle_receta'] as $key =>$detalle)
            @if($loop->count == 1)
            <div class="contenido-body" style="page-break-after: auto;">
            @else
                @if ($cuerpo['cantidad_recetas'] == $loop->iteration)
                <div class="contenido-body" style="page-break-after: avoid;">
                @else
                <div class="contenido-body" style="page-break-after: always;">
                @endif
            @endif

            <!--Inicio de información-->
            <h4 class="text-blue">Rp:</h4>
            @if($key != 'ORL_AUDIFONO')
                <table class="tabla-receta">
                    <thead>
                        <tr class="t-gris">
                            <th style="text-align: left;">Medicamento</th>
                            <th style="text-align: left;">Posología</th>
                            <th style="text-align: left;">Tratamiento por:</th>
                            <th style="text-align: left;">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($detalle as $medicamento)

                                {{--
                                nombre_medicamento
                                droga
                                presentacion
                                posologia
                                via_administracion
                                periodo
                                uso_cronico
                                cantidad_compra
                                --}}
                                <tr>
                                    <td style="text-align: left;"><strong>{{ $medicamento['nombre_medicamento'] }}</strong> {{ $medicamento['droga'] }}</td>
                                    <td style="text-align: left;">{{ $medicamento['posologia'] }}</td>
                                    <td style="text-align: left;">{{ $medicamento['periodo'] }}</td>
                                    <td style="text-align: left;">{{ $medicamento['cantidad_compra'] }}</td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            @else
                {{--
                tipo
                od
                especificacion_od
                oi
                especificacion_oi
                bi
                especificacion_bi
                especificacion_general
                --}}
                <table class="tabla-receta">
                    <!-- <thead>
                        <tr class="t-gris">
                            <th style="text-align: left;">Medicamento</th>
                            <th style="text-align: left;">Posología</th>
                            <th style="text-align: left;">Tratamiento por:</th>
                            <th style="text-align: left;">Cantidad</th>
                        </tr>
                    </thead> -->
                    <tbody>
                        @foreach ($detalle as $medicamento)
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>{{ $medicamento['tipo'] }}</strong></td>
                                <td style="text-align: left; width: 80%;"></td>
                            </tr>
                            @if($medicamento['od'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Oído Derecho</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $medicamento['especificacion_od'] }}</td>
                            </tr>
                            @endif

                            @if($medicamento['oi'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Oído izquierdo</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $medicamento['especificacion_oi'] }}</td>
                            </tr>
                            @endif

                            @if($medicamento['bi'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Bilateral</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $medicamento['especificacion_bi'] }}</td>
                            </tr>
                            @endif

                            <tr>
                                <td style="text-align: left;"><strong>Recomendaciones Generales</strong></td>
                                <td style="text-align: left;">{{ $medicamento['especificacion_general'] }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            @endif
            </div>
        @endforeach
    </main>
</html>

