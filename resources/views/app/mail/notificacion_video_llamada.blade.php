<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Notificacion de Link de Teleconsulta</title>
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
                                <td style="background: rgb(80,181,130); background: -moz-linear-gradient(148deg, rgba(80,181,130,1) 0%, rgba(0,80,10) 100%); background: -webkit-linear-gradient(148deg, rgba(80,181,130,1) 0%, rgba(0,80,10) 100%); background: linear-gradient(148deg, rgba(80,181,130,1) 0%, rgba(0,80,10) 100%); padding: 0px 24px 0px 24px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 30px; font-weight: 500; color: #ffffff;">Usted tiene una hora de Teleconsulta el dia {{ $detalle['body']['fecha_consulta'] }} a las {{ $detalle['body']['hora_consulta'] }} con el Dr. {{ $detalle['body']['nombre_profesional'] }}
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table>
                                        <tbody>
                                            <td height="30"> </td>
                                            <tr>
                                                <td style="background: rgb(0,147,147); background: -moz-linear-gradient(148deg, rgba(0,147,147,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(148deg, rgba(0,147,147,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(148deg, rgba(0,147,147,1) 0%, rgba(28,190,190,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                    <a target="_blank" href="{{ $detalle['body']['link_meet'] }}" style="color: #ffffff; text-decoration: none; font-size: 18px; ">Ingresar a Consulta</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td height="10"> </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
