<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Exámenes</title>
</head>

<body style="background-color: #f2f2f2; margin-top: 0px;">
    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">
        <tbody>
            <tr>
                <td style="background-color: #f2f2f2;" align="center" valign="top" >
                    <table style="width: 100%; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tr style="background-color: #fff;">
                            <td style="text-align: center;" >
                                <img style=" margin-bottom: 5px; margin-top: 0px; max-width: 100%;" src="https://med-sdi.cl/images/email/medichile-email.png" alt="Medichile">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding-top: 15px;" align="center">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; line-height: 10px; color: #3366cc; text-align: center; font-weight:600;">Estimado/a Paciente</p>
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; line-height: 10px; color: #3366cc; text-align: center; font-weight:600;">{{ $detalle['body']['nombre_paciente'] }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding-right: 20px; padding-left: 20px;  text-align: justify;">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #424242;  ">Por medio del presente correo se notifica que la Patologia "{{ $detalle['body']['nombre_ges'] }}" es cubierta bajo GES. <br>Toma conocimiento de que tiene derecho a acceder a las "Garantías Explícitas en Salud" GES, siempre que la atención sea otorgada en la "Red de Prestadores" que me corresponde según Fonasa o la Isapre a la que me encuentro adscrito</p>
                            </td>
                        </tr>
                        <tr>
                            <td align="center" style="background-color: #fff; padding-bottom: 20px;">
                                <table style="margin-top:40px;">
                                    <tbody>

                                        <tr>
                                            <td style="background: rgb(98,37,136); background: -moz-linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%); background: -webkit-linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%); background: linear-gradient(108deg, rgba(98,37,136,1) 0%, rgba(160,108,193,1) 100%);  padding: 15px 20px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                <a target="_blank" href="{{ $detalle['body']['archivo_constancia']['url'] }}" style="color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 600;">DESCARGAR CONSTANCIA GES</a>
                                            </td>
                                        </tr>

                                        @if (!empty($detalle['body']['archivo_correo_adjuntos']))
                                            @foreach ( $detalle['body']['archivo_correo_adjuntos'] as $archivo )
                                                <tr>
                                                    <td style="background-color:#fff; padding:5px;">
                                                        {{--  --}}
                                                    </td>
                                                </tr>

                                                <tr style="margin-bottom: 1rempx;">
                                                    <td style=" background: rgb(49,190,190); background: -moz-linear-gradient(108deg, rgba(49,190,190,1) 0%, rgba(25,159,159,1) 100%); background: -webkit-linear-gradient(108deg, rgba(49,190,190,1) 0%, rgba(25,159,159,1) 100%); background: linear-gradient(108deg, rgba(49,190,190,1) 0%, rgba(25,159,159,1) 100%);padding: 15px 20px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                        <a target="_blank" href="{{ $archivo['url'] }}" style="color: #ffffff; text-decoration: none; font-size: 15px; font-weight: 600;">DESCARGAR ARCHIVO: {{ $archivo['nombre'] }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif

                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="margin-top:50px; background-color: #fff;">
                                <img style=" margin-bottom: 5px; margin-top: 50px; max-width: 100%;" src="https://med-sdi.cl/images/email/pie-email.png" alt="Medichile">
                            </td>
                        </tr>
                            <td style="text-align: center; background-color: #fff;" align="center">
                                <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: Helvetica, Arial, sans-serif;" align="center" valign="top">
                                                <p style="text-align: center; color: #999999; font-size: 10px; font-weight: normal; line-height: 15px;">Este correo electrónico fue enviado por <a style="color: #000;" href="https://www.medichile.cl">Salud Digital Integrada</a> <br> Salud Digital Integrada <b>Todos los Derechos Reservados. ©2023</b></p>
                                            </td>
                                            <td width="30"> </td>
                                            <td width="16"> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
