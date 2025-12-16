<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Consentimiento Enviado</title>
</head>

<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br>
                    <table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                           <!-- <tr>
                                <td style="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                </td>
                            </tr>-->

                            <tr>
                                <td style="background-color: #fff; padding: 0px 24px 0px 24px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 22px; font-weight: 600; color: #0071bc;">Estimado/a Paciente: <br><br>{{ $detalle['body']['nombre_paciente'] }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); padding: 0px 24px 0px 24px; border-radius:20px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 500; color: #ffffff;">Su consentimiento ha sido enviado con éxito</p>
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
                                <td height="20"> </td>
                            </tr>
                            <!-- INFORMACIÓN DE CONSENTIMIENTO -->
                            <tr>
                                <td style="background-color: #fff; padding: 20px 24px 20px 24px; border-radius: 20px; border: 1px solid #e0e0e0; margin-top: 10px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 600; color: #0071bc; margin-bottom: 10px;">INFORMACIÓN DEL CONSENTIMIENTO</p>
                                    <table style="width: 100%; max-width: 400px; margin: 0 auto; font-family: Helvetica, Arial, sans-serif; font-size: 14px; color: #424242;">
                                        <tr>
                                            <td style="font-weight: bold; color: #3366CC; padding: 4px 0;">Nombre:</td>
                                            <td style="padding: 4px 0;">{{ $detalle['body']['consentimiento_nombre'] ?? $detalle['body']['nombre_paciente'] }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; color: #3366CC; padding: 4px 0;">RUT:</td>
                                            <td style="padding: 4px 0;">{{ $detalle['body']['consentimiento_rut'] ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; color: #3366CC; padding: 4px 0;">Fecha/Hora:</td>
                                            <td style="padding: 4px 0;">{{ $detalle['body']['consentimiento_fecha'] ?? ($detalle['body']['fecha'] . ' ' . ($detalle['body']['hora'] ?? '')) }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; color: #3366CC; padding: 4px 0;">IP:</td>
                                            <td style="padding: 4px 0;">{{ $detalle['body']['consentimiento_ip'] ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold; color: #3366CC; padding: 4px 0;">Dispositivo:</td>
                                            <td style="padding: 4px 0;">{{ $detalle['body']['consentimiento_dispositivo'] ?? '-' }}</td>
                                        </tr>
                                    </table>
                                    @if(isset($detalle['body']['texto_consentimiento']) && $detalle['body']['texto_consentimiento'])
                                        <div style="margin-top: 18px; padding: 14px 18px; background: #f3f6ff; border-radius: 12px; border: 1px solid #e0e0e0; color: #222; font-size: 15px; text-align: left;">
                                            {!! $detalle['body']['texto_consentimiento'] !!}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <img style="width: 98px; margin-bottom: 20px; margin-top: 20px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">

                                    <!-- BOTÓN PARA CONFIRMAR CONSENTIMIENTO EN WEB -->
                                    <a href="{{ route('consentimiento.form', [
                                        'token' => $detalle['body']['token'] ?? ''
                                    ]) }}"
                                       style="display:inline-block; background:#3366cc; color:#fff; font-size:16px; font-weight:600; border-radius:6px; padding:10px 24px; text-decoration:none; margin-top:20px;"
                                       target="_blank">
                                       Confirmar Consentimiento
                                    </a>
                                </td>
                            </tr>
                           <!-- <tr>
                                <td inline-block style="text-align: center;">
                                    <img style="width: 50px; margin-bottom: 5px; margin-top: 50px; margin-right: 10px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                    <img style="width: 90px; margin-bottom: 5px; margin-top: 50px;" src="https://www.med-sdi.cl/images/logo.png" alt="Medichile">
                                </td>
                            </tr>-->
                            <tr>
                                <td style="text-align: center;" align="center">
                                    <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                        <tbody>
                                            <tr>
                                                <td style="font-family: Helvetica, Arial, sans-serif;" align="center" valign="top">
                                                    <p style="text-align: center; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">Este correo electrónico fue enviado por <a style="color: #000;" href="https://med-sdi.cl">Salud Digital Integrada</a> <br> <b>Salud Digital Integrada  &copy; <script>document.write(new Date().getFullYear())</script> </b></p>
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
