<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Compra de Bono</title>
</head>

<body style="background-color: #f2f2f2; margin-top: 0px;">
    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">
        <tbody>
            <tr>
                <td style="background-color: #f2f2f2;" align="center" valign="top">
                    <table style="width: 100%; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tr style="background-color: #fff;">
                            <td style="text-align: center;">
                                <img style=" margin-bottom: 5px; margin-top: 0px; max-width: 100%;" src="https://www.med-sdi.cl/images/email/medichile-email.png" alt="Medichile">
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding-top: 15px;" align="center">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; line-height: 20px; color: #3366cc; text-align: center; font-weight:600;">
                                    Estimado/a paciente: {{ $detalle['body']['nombre_paciente'] }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #fff; padding-right: 20px; padding-left: 20px;  text-align: justify;">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #424242;">
                                    Se informa que ha realizado la compra de un bono con fecha {{ date('d-m-Y', strtotime($detalle['body']['fecha_atencion'])) }}
                                    <table>
                                        <tr>
                                            <th>Prevision</th>
                                            <td>{{ $detalle['body']['convenio'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Numero</th>
                                            <td>{{ $detalle['body']['numero_bono'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Fecha Atencion</th>
                                            <td>{{ date('d-m-Y', strtotime($detalle['body']['fecha'])) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Valor Atencion</th>
                                            <td>{{ $detalle['body']['valor_atencion'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tipo Bono</th>
                                            <td>{{ $detalle['body']['tipo_bono'] }}</td>
                                        </tr>

                                    </table>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td style="background-color: #fff; padding-right: 20px; padding-left: 20px;  text-align: justify;">
                                <p style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 26px; color: #424242;">
                                    Se adjunta el Bono Comprado
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td style="margin-top:50px; background-color: #fff;">
                                <img style=" margin-bottom: 5px; margin-top: 50px; max-width: 100%;" src="https://www.med-sdi.cl/images/email/pie-email.png" alt="Medichile">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; background-color: #fff;" align="center">
                                <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: Helvetica, Arial, sans-serif;" align="center"
                                                valign="top">
                                                <p style="text-align: center; color: #999999; font-size: 10px; font-weight: normal; line-height: 15px;">
                                                    Este correo electrónico fue enviado por  <a style="color: #000;" href="https://www.medichile.cl">Salud Digital Integrada</a> <br>
                                                    Salud Digital Integrada <b>Todos los Derechos Reservados. ©2023</b>
                                                </p>
                                            </td>
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
