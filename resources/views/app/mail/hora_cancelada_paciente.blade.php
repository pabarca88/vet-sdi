<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Hora Cancelada</title>
</head>

<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br>
                    <table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);"></td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <img style="width: 95px; margin-bottom: 20px; margin-top: 20px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #fff; padding: 0px 24px 0px 24px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 22px; font-weight: 600; color: #0071bc;">Estimado/a Paciente: <br><br>{{ $detalle['body']['nombre_paciente'] }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background: rgb(212,106,106); background: -moz-linear-gradient(148deg, rgba(212,106,106,1) 0%, rgba(208,0,0,1) 100%); background: -webkit-linear-gradient(148deg, rgba(212,106,106,1) 0%, rgba(208,0,0,1) 100%); background: linear-gradient(148deg, rgba(212,106,106,1) 0%, rgba(208,0,0,1) 100%); padding: 0px 24px 0px 24px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 500; color: #ffffff;">Su hora médica ha sido Concelada con Exito!
                                </td>
                            </tr>
                            <tr>
                                <td align="center" style="font-family: Helvetica, Arial, sans-serif; font-size: 1.2rem; color: #3366CC; line-height: 10px;">
                                    <span style="display: inline-block; margin-top: 30px;">
                                        <img style="width: 2.5rem;" src="https://www.med-sdi.cl/images/email/calendario_1.png" alt="Día">
                                        <p style="margin-top:5px"><b>{{ $detalle['body']['fecha'] }}</b></p>
                                    </span>
                                    <br>
                                    <span style="display: inline-block; margin-top: 30px;">
                                        <img style="width: 2.5rem;" src="https://www.med-sdi.cl/images/email/reloj_1.png" alt="Hora">
                                        <p style="margin-top:5px"><b>{{ $detalle['body']['hora'] }}</b></p>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #f2f2f2; padding: 0px 11px 0px 0px; margin-bottom: 20px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; line-height: 25px; text-align: left; color: #424242; margin-left: 20px;">
                                        @if (isset($detalle['body']['profesional_nombre']))
                                            <b>Profesional:</b> {{ $detalle['body']['profesional_nombre'] }}<br>
                                            <b>Profesión:</b> {{ $detalle['body']['profesional_especialidad'] }} <br>
                                            <b>Especialidad:</b> {{ $detalle['body']['profesional_tipo_especialidad'] }} <br>
                                            @if(isset($detalle['body']['profesional_sub_tipo_especialidad']))
                                                <b>Tipo Especialidad:</b> {{ $detalle['body']['profesional_sub_tipo_especialidad'] }}<br>
                                            @endif
                                        @endif
                                        <b>Lugar de Atención:</b> {{ $detalle['body']['lugar_atencion'] }}<br>
                                        <b>Dirección:</b> {{ $detalle['body']['direccion'] }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td inline-block style="text-align: center;">
                                    <img style="width: 50px; margin-bottom: 5px; margin-top: 50px; margin-right: 10px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                    <img style="width: 90px; margin-bottom: 5px; margin-top: 50px;" src="https://www.med-sdi.cl/images/logo.png" alt="Medichile">
                                </td>
                            </tr>
                            <tr>
                                <td style="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" align="center">
                                    <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="font-family: Helvetica, Arial, sans-serif;" align="center" valign="top">
                                                    <p style="text-align: center; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">Este correo electrónico fue enviado por <a style="color: #000;" href="https://www.medichile.cl">Salud Digital Integrada</a> <br> Salud Digital Integrada <b>Todos los Derechos Reservados. ©2023</b></p>
                                                </td>
                                                <td width="30"> </td>
                                                <td width="16"> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
