
@php
    // echo json_encode($cuerpo);
    // die();
@endphp
@if ( $cuerpo['array_licencia'] )

    {{-- RECETA LIBRE --}}
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Licencia</title>
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
        <body>

            @include('PDF.header_licencia')
            @include('PDF.footer_licencia')

            <main>
                {{-- <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $receta->qr->token }}</div> --}}
                <div class="contenido-body" style="page-break-after: auto;">
                    <table class="tabla-receta">
                        {{-- <tr>
                            <th style="text-align: left;">id</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">id_hora_medica</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_hora_medica'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">id_ficha_atencion</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_ficha_atencion'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">id_paciente</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_paciente'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">id_profesional</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_profesional'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">id_lugar_atencion</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_lugar_atencion'] }}</td>
                        </tr> --}}
                        <tr>
                            <th style="text-align: left;">Tipo Enfermedad</th>
                            <td style="text-align: left;">
                                @if ($cuerpo['array_licencia']['enfermedad_comun'] == 1)
                                    Enfermedad común o maternal
                                @elseif($cuerpo['array_licencia']['laboral'] == 1)
                                    Laboral
                                @else
                                    Otra
                                @endif

                            </td>
                        </tr>

                        {{-- <tr>
                            <th style="text-align: left;">Previsión</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['paciente_prevision'] }}</td>
                        </tr> --}}
                        <tr>
                            <td colspan="2"> <hr> </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Previsión</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['paciente_prevision_text'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">RUT</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['rut_paciente'] }}</td>
                        </tr>

                        <tr>
                            <td colspan="2"> <hr> </td>
                        </tr>
                        {{-- <tr>
                            <th style="text-align: left;">empleador_id</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['empleador_id'] }}</td>
                        </tr> --}}

                        <tr>
                            <th style="text-align: left;">Empleador</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['empleador_nombre'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Rut</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['empleador_rut'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Dirección</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['empleador_direccion'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Email</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['empleador_email'] }}</td>
                        </tr>

                        <tr>
                            <td colspan="2"> <hr> </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Tipo Reposo</th>
                            <td style="text-align: left;">
                                @if($cuerpo['array_licencia']['tipo_reposo'] == 1)
                                    Total
                                @elseif($cuerpo['array_licencia']['tipo_reposo'] == 2)
                                    Mañanas
                                @elseif($cuerpo['array_licencia']['tipo_reposo'] == 3)
                                    Tarde
                                @elseif($cuerpo['array_licencia']['tipo_reposo'] == 4)
                                    Otro tipo
                                @else
                                    Otro
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Fecha Inicio</th>
                            <td style="text-align: left;">{{ date('d-m-Y', strtotime($cuerpo['array_licencia']['fecha_inicio']) ) }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Fecha Termino</th>
                            <td style="text-align: left;">{{ date('d-m-Y', strtotime($cuerpo['array_licencia']['fecha_termino']) ) }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Dias </th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['num_dias_reposo'] }} Dias</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Lugar</th>
                            <td style="text-align: left;">
                                @if( $cuerpo['array_licencia']['lugar_reposo'] == 1)
                                    Su Casa
                                @elseif( $cuerpo['array_licencia']['lugar_reposo'] == 2)
                                    Hospitalizado
                                @elseif( $cuerpo['array_licencia']['lugar_reposo'] == 3)
                                    Otro Lugar
                                @else
                                    Otro
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Tipo Licencia</th>
                            <td style="text-align: left;">
                                @if($cuerpo['array_licencia']['tipo_licencia'] == 1)
                                    Tipo 1: enfermedad o accidente común
                                @elseif($cuerpo['array_licencia']['tipo_licencia'] == 2)
                                    Tipo 2: medicina preventiva
                                @elseif($cuerpo['array_licencia']['tipo_licencia'] == 3)
                                    Tipo 3: pre y postnatal
                                @elseif($cuerpo['array_licencia']['tipo_licencia'] == 4)
                                    Tipo 4: enfermedad grave del niño menor del año
                                @elseif($cuerpo['array_licencia']['tipo_licencia'] == 5)
                                    Tipo 5: Patología del Embarazo
                                @else
                                    Otro
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Recuperabilidad laboral</th>
                            <td style="text-align: left;">
                                @if ($cuerpo['array_licencia']['recuperabilidad_laboral'] == 1)
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Inicio trámite de invalidez
                            </th>
                            <td style="text-align: left;">
                                @if ( $cuerpo['array_licencia']['tramite_invalidez'] == 1)
                                    SI
                                @else
                                    NO
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Hipótesis Diagnóstica</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['descripcion_hipotesis'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Diagnóstico CIE-10</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['descripcion_cie'] }}</td>
                        </tr>
                        {{-- <tr>
                            <th style="text-align: left;">id_descripcion_cie</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['id_descripcion_cie'] }}</td>
                        </tr> --}}
                        <tr>
                            <th style="text-align: left;">Otros Antecedentes</th>
                            <td style="text-align: left;">{{ $cuerpo['array_licencia']['otros_ant_desc'] }}</td>
                        </tr>
                        <tr>
                            <th style="text-align: left;">Examen Apoyo</th>
                            <td style="text-align: left;">
                                {{-- {{$cuerpo['array_licencia']['examen_apoyo']}} --}}
                                @if ($cuerpo['array_licencia']['examen_apoyo'])
                                    @php
                                        $array_temp = json_decode($cuerpo['array_licencia']['examen_apoyo']);
                                    @endphp
                                    @foreach ( $array_temp as $detalle)
                                        {{ $detalle->nombre }} - <a href="{{ $detalle->url }}" target="_blank">Ver</a>
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </main>
        </body>
    </html>
@endif




