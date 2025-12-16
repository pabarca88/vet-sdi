<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Confirmar Hora</title>
</head>

<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br>
                    <table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                           <!-- <tr>
                                <td style="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); ground: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); ground: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                </td>
                            </tr>-->
                            <tr>
                                <td style="text-align: center;">
                                    <img style="width: 98px; margin-bottom: 18px; margin-top: 20px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #fff; padding: 0px 24px 0px 24px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 22px; font-weight: 700; color: #0071bc;">Estimado/a Paciente: <br><br>{{ $detalle['body']['nombre_paciente'] }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 0px 24px 0px 24px; border-radius:20px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight:500; color: #ffffff;">Usted ha realizado una Pre Reserva<br><br> <strong>COMPLETE SUS DATOS PARA ACTIVAR LA RESERVA</strong><br><br>Gracias por su colaboración.
                                </td>
                            </tr>
                            <tr style="align:align-items-center;">
                                <td align="center" style="font-family: Helvetica, Arial, sans-serif; font-size: 1.2rem; color: #3366CC; line-height: 10px;  align-content: center">
                                    <br>
                                    <br>
                                    <span style=" margin-top: 30px;">
                                        <img style="width: 1.8rem;" src="https://www.med-sdi.cl/images/email/calendario_1.png" alt="Día">
                                        <p style="margin-top:5px"><b>{{ $detalle['body']['fecha'] }}</b></p>
                                    </span>
                                    <br>
                                    <br>
                                    <span>
                                        <img style="width: 1.8rem;" src="https://www.med-sdi.cl/images/email/reloj_1.png" alt="Hora">
                                        <p style="margin-top:5px"><b>{{ $detalle['body']['hora'] }}</b></p>
                                    </span>
                                    <br>
                                    <br>
                                    <span>
                                        <img style="width: 1.8rem;" src="https://www.med-sdi.cl/images/email/reloj_1.png" alt="Lugar de atencion">
                                        <p style="margin-top:5px"><b>{{ $detalle['body']['lugar_atencion'] }}</b></p>
                                    </span>
                                    <br>
                                    <br>
                                    <span>
                                        <img style="width: 1.8rem;" src="https://www.med-sdi.cl/images/email/reloj_1.png" alt="Profesional">
                                        <p style="margin-top:5px"><b>Dr. {{ $detalle['body']['profesional_nombre'] }}</b></p>
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table>
                                        <tbody>
                                            <td height="30"> </td>
                                            <tr>
                                                <td>
                                                    <a target="_blank" href="{{ route('paciente.datos.cargar.prereserva',[md5(uniqid()), $detalle['body']['token_paciente'], md5(uniqid()) ]) }}" style="color: #ffffff; text-decoration: none; font-size: 20px; ">
                                                        <div style="background: rgb(98,37,136);
                                                                    background: -moz-linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%);
                                                                    background: -webkit-linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%);
                                                                    background: linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%);  padding: 20px 35px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif; font-weight:600;" align="center" bgcolor="#289CDC">
                                                           COMPLETAR DATOS
                                                        </div>
                                                    </a>
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
                                <td height="20"> </td>
                            </tr>
                            <!--<tr>
                                <td inline-block style="text-align: center;">
                                    <img style="width: 50px; margin-bottom: 5px; margin-top: 50px; margin-right: 10px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                  <img style="width: 90px; margin-bottom: 5px; margin-top: 50px;" src="https://www.med-sdi.cl/images/logo.png" alt="Medichile">
                                </td>
                            </tr>-->
                            <tr>
                                <td style="height: 6px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;" align="center">
                                    <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="font-family: Helvetica, Arial, sans-serif;" align="center" valign="top" width="100%">
                                                    <p style="text-align: center; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">Este correo electrónico fue enviado por <br><a style="color: #000;" href="https://med-sdi.cl">Salud Digital Integrada</a> <br> <b>Salud Digital Integrada  &copy; <script>document.write(new Date().getFullYear())</script> </b></p>
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
