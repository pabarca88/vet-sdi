<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hora Cancelada</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f6fb;">

    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="background-color:#f4f6fb;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="padding:30px 15px;">

                    <table border="0" width="100%" cellspacing="0" cellpadding="0"
                        style="max-width:650px; background:#ffffff; border-radius:28px; overflow:hidden; box-shadow:0 8px 30px rgba(0,0,0,0.08);">

                        <!-- TOP BAR -->
                        <tr>
                            <td style="height:8px; background: linear-gradient(90deg, #A06CC1 0%, #0cb9b9 100%);">
                            </td>
                        </tr>

                        <!-- LOGO -->
                        <tr>
                            <td align="center" style="padding:35px 20px 10px 20px;">
                                <img style="width:110px;"
                                    src="{{ asset('images/logo_pais_vertical.png') }}"
                                    alt="VET SDI">
                            </td>
                        </tr>

                        <!-- TITLE -->
                        <tr>
                            <td align="center" style="padding:0px 35px 10px 35px;">

                                <p style="
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-size: 30px;
                                    color:#2f2f2f;
                                    margin:0;
                                    font-weight:700;
                                ">
                                    Hora Cancelada
                                </p>

                                <p style="
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-size:16px;
                                    color:#7a7a7a;
                                    margin-top:12px;
                                    line-height:26px;
                                ">
                                    Hola <b style="color:#A06CC1;">{{ $detalle['body']['nombre_paciente'] }}</b>,
                                    la cita registrada en nuestro sistema fue cancelada exitosamente.
                                </p>

                            </td>
                        </tr>

                        <!-- CANCEL CARD -->
                        <tr>
                            <td style="padding:25px 30px 10px 30px;">

                                <table width="100%" cellspacing="0" cellpadding="0" style="
                                    background: linear-gradient(135deg, #d9534f 0%, #c9302c 100%);
                                    border-radius:22px;
                                ">
                                    <tr>
                                        <td align="center" style="padding:28px 20px;">

                                            <p style="
                                                margin:0;
                                                font-family: Arial, Helvetica, sans-serif;
                                                font-size:24px;
                                                color:#ffffff;
                                                font-weight:700;
                                            ">
                                                Su hora ha sido cancelada exitosamente
                                            </p>

                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!-- DATE HOUR -->
                        <tr>
                            <td style="padding:25px 30px;">

                                <table width="100%" cellspacing="0" cellpadding="0">
                                    <tr>

                                        <!-- FECHA -->
                                        <td width="48%" align="center" style="
                                            background:#f8f5fc;
                                            border-radius:20px;
                                            padding:25px 10px;
                                        ">

                                            <img style="width:45px;"
                                                src="https://www.med-sdi.cl/images/email/calendario_1.png"
                                                alt="Fecha">

                                            <p style="
                                                font-family: Arial, Helvetica, sans-serif;
                                                color:#A06CC1;
                                                font-size:14px;
                                                margin:15px 0 5px 0;
                                                font-weight:600;
                                            ">
                                                FECHA
                                            </p>

                                            <p style="
                                                font-family: Arial, Helvetica, sans-serif;
                                                color:#2f2f2f;
                                                font-size:22px;
                                                margin:0;
                                                font-weight:700;
                                            ">
                                                {{ $detalle['body']['fecha'] }}
                                            </p>

                                        </td>

                                        <td width="4%"></td>

                                        <!-- HORA -->
                                        <td width="48%" align="center" style="
                                            background:#eefcfc;
                                            border-radius:20px;
                                            padding:25px 10px;
                                        ">

                                            <img style="width:45px;"
                                                src="https://www.med-sdi.cl/images/email/reloj_1.png"
                                                alt="Hora">

                                            <p style="
                                                font-family: Arial, Helvetica, sans-serif;
                                                color:#0cb9b9;
                                                font-size:14px;
                                                margin:15px 0 5px 0;
                                                font-weight:600;
                                            ">
                                                HORA
                                            </p>

                                            <p style="
                                                font-family: Arial, Helvetica, sans-serif;
                                                color:#2f2f2f;
                                                font-size:22px;
                                                margin:0;
                                                font-weight:700;
                                            ">
                                                {{ $detalle['body']['hora'] }}
                                            </p>

                                        </td>

                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!-- INFO TITLE -->
                        <tr>
                            <td style="padding:10px 30px 0px 30px;">

                                <p style="
                                    font-family: Arial, Helvetica, sans-serif;
                                    color:#A06CC1;
                                    font-size:22px;
                                    font-weight:700;
                                    margin-bottom:18px;
                                ">
                                    Información de la cita
                                </p>

                            </td>
                        </tr>

                        <!-- INFO CARD -->
                        <tr>
                            <td style="padding:0px 30px 20px 30px;">

                                <table width="100%" cellspacing="0" cellpadding="0" style="
                                    background:#fafafa;
                                    border:1px solid #eeeeee;
                                    border-radius:22px;
                                ">
                                    <tr>
                                        <td style="
                                            padding:30px;
                                            font-family: Arial, Helvetica, sans-serif;
                                            font-size:15px;
                                            color:#555555;
                                            line-height:28px;
                                        ">

                                            @if (isset($detalle['body']['profesional_nombre']))

                                                <b style="color:#A06CC1;">Profesional:</b><br>
                                                {{ $detalle['body']['profesional_nombre'] }}<br><br>

                                                <b style="color:#A06CC1;">Profesión:</b><br>
                                                {{ $detalle['body']['profesional_especialidad'] }}<br><br>

                                                <b style="color:#A06CC1;">Especialidad:</b><br>
                                                {{ $detalle['body']['profesional_tipo_especialidad'] }}<br>

                                                @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))
                                                    <br>
                                                    <b style="color:#A06CC1;">Tipo Especialidad:</b><br>
                                                    {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}<br>
                                                @endif

                                            @endif

                                            <br>

                                            <b style="color:#A06CC1;">Lugar de Atención:</b><br>
                                            {{ $detalle['body']['lugar_atencion'] }}<br><br>

                                            <b style="color:#A06CC1;">Dirección:</b><br>
                                            {{ $detalle['body']['direccion'] }}

                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                        <!-- ALERT -->
                        <tr>
                            <td align="center" style="padding:10px 30px 35px 30px;">

                                <table width="100%" cellspacing="0" cellpadding="0" style="
                                    background:#fff3f3;
                                    border:1px solid #ffcaca;
                                    border-radius:18px;
                                ">
                                    <tr>
                                        <td style="
                                            padding:22px;
                                            text-align:center;
                                            font-family: Arial, Helvetica, sans-serif;
                                            font-size:16px;
                                            color:#b42318;
                                            line-height:28px;
                                            font-weight:600;
                                        ">

                                            Si necesita una nueva atención,
                                            puede volver a agendar una cita desde la plataforma.

                                        </td>
                                    </tr>
                                </table>

                            </td>
                        </tr>

                               <!-- FOOTER -->
                        <tr>
                            <td style="
                                background:#fafafa;
                                border-top:1px solid #eeeeee;
                                padding:30px 20px;
                                text-align:center;
                            ">

                                <p style="
                                    margin:0;
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-size:13px;
                                    color:#999999;
                                    line-height:24px;
                                ">
                                    Este correo fue enviado por
                                    <a href="#"
                                        style="color:#A06CC1; text-decoration:none; font-weight:700;">
                                        VET-SDI
                                    </a>
                                </p>

                                <p style="
                                    margin-top:10px;
                                    font-family: Arial, Helvetica, sans-serif;
                                    font-size:12px;
                                    color:#b0b0b0;
                                ">
                                    VET-SDI &copy;
                                    <script>document.write(new Date().getFullYear())</script>
                                </p>

                            </td>
                        </tr>


                        <!-- BOTTOM BAR -->
                        <tr>
                            <td style="height:8px; background: linear-gradient(90deg, #A06CC1 0%, #0cb9b9 100%);">
                            </td>
                        </tr>

                    </table>

                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>

