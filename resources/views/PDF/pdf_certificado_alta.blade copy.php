    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>ORDEN PDF</title>
        <style>
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            span,
            p,
            td,
            th {
                font-family: arial;
            }

            h1 {
                text-align: center;
                text-transform: uppercase;
            }

            img {
                align-items: center;
                width: 18%;
            }

            table,
            th,
            td {
                border: 0px solid black;
                text-align: left;
                margin-right: 10px;
                margin-left: 10px;
            }

            table {
                width: 80%;
            }

            hr {
                border: 1px solid #3366CC;
            }

            #titulo-azul {
                color: #3366CC;
                text-align: center;
            }

            .contenido {
                font-size: 15px;
                color: #3F3E3E;
            }

            #centro {
                text-align: center;
            }

        </style>
    </head>

    <body>
        <div class="contenido">
            <table style="width: 100%">
                <tr>
                    <td style="width:25%">
                        <img style="width: 100%;" class="logo" src="{{ asset('images/pdf/sdi-logo.svg') }}">

                    </td>
                    <td style="width:25%">

                        <img style="width: 100%;" src="{{ asset('images/logo_instituciones/logo_insi.jpg') }}">
                    </td>

                    <td style="width:50%">
                        Vicuña Mackenna 864, Quilpué<br/>
                        Teléfono: (32) 218 8930<br/>
                        Solicitar Hora vía Whatsapp: (+56) 9 8558 0587<br/>
                    </td>
                </tr>
            </table>



            <hr>
            <table>
                <tr>
                    <td><strong>Paciente:</strong></td>
                    <td>{{ $cuerpo['array_paciente']['nombre'] }}</td>
                    <td><strong>Fecha:</strong></td>
                    <td>{{ $cuerpo['array_ficha_atencion']['created_at'] }}</td>
                </tr>
                <tr>
                    <td><strong>Rut:</strong></td>
                    <td>{{ $cuerpo['array_paciente']['rut'] }}</td>
                    <td><strong>Direccion:</strong></td>
                    <td>{{ $cuerpo['array_paciente']['direccion'] }}</td>
                </tr>
                <tr>
                    <td><strong>Edad:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($cuerpo['array_paciente']['fecha_nac'])->diff(\Carbon\Carbon::now())->format('%y') }}</td>
                </tr>
            </table>
            <hr>
            <!--Inicio de información-->
            <p>
            <h2 id="titulo-azul">{{ $titulo }}</h2>

                {{--  informe_medico
                fecha_informe_medico  --}}
                <p>Fecha Informe Medico: {{ $cuerpo['detalle_informe_medico']['fecha_informe_medico'] }}</p>
                <p>El Profesional que suscribe informa que: <br/> {{ $cuerpo['detalle_informe_medico']['informe_medico'] }}</p>
            <br>


            </p>
            <!--Cierre: Inicio de información-->
            <hr>
            <p>
            <table style="width: 100%;">
                <tr>
                    <td style="width:50%">
                        <table style="width: 100%;">
                            <tr>
                                <td><strong>{{ $cuerpo['array_profesional']['nombre'] }}</strong></td>
                            </tr>
                            <tr>
                                <td><strong>Rut:</strong> {{ $cuerpo['array_profesional']['rut'] }}</td>
                            </tr>
                            <tr>
                                <td>{{ $cuerpo['array_profesional']['especialidad'] }}</td>
                            </tr>
                            <tr>
                                {{--  <td style="word-wrap: break-word;">{{ $cuerpo['array_profesional']['token'] }}</td>  --}}
                                <td style="word-wrap: break-word;"><strong>Firmado digitalmente por el profesional:</strong><br/>asdf56!4fasd.ddsf5as4dfrtTRWer#ty654fgsdfg#</td>
                            </tr>
                        </table>
                    </td>
                    <td style="width:50%">
                        <table style="width: 100%;">
                            <tr>
                                <td style="word-wrap: break-word;"><strong>Código SDI autentificación</strong></td>
                            </tr>
                            <tr>
                                {{--  <td style="word-wrap: break-word;"><strong>{{ $cuerpo['array_ficha_atencion']['token'] }}</strong></td>  --}}
                                <td style="word-wrap: break-word;"><strong>as#dfASDF.%asdfew584f4afeffr&e.</strong></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            </p>
            <hr>
        </div>
    </body>

    </html>
