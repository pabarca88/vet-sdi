<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invitación de Registro</title>
</head>

<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br>
                    <table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <td style="text-align: center;">
                                    <img style="width: 95px; margin-bottom: 20px; margin-top: 20px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #f2f2f2; padding: 0px 24px 0px 24px;text-align: center;">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 28px; font-weight: 600; color: #0071bc;">
                                        Profesional {{ strtoupper($detalle['body']['nombre']) }}, usted ha sido invitado por {{ strtoupper($detalle['body']['lugar_atencion']) }}
                                    </p>
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 20px; font-weight: 600; color: #0071bc;">
                                        Registrate en Medichile y disfruta de sus beneficios
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td height="30"> </td>
                            </tr>
                            {{-- <tr>
                                <td style="text-align: center;">
                                    <img style="width: auto; margin-bottom: 20px; margin-top: 20px; margin-left: 15px; margin-right: 15px;" src="https://www.med-sdi.cl/images/email/beneficio_profesional.png" alt="Beneficios">
                                </td>
                            </tr> --}}
                            <tr>
                                <td>
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 15px; font-weight: 600; color: #0071bc;">Información de Convenio:</p>
                                    <table cellspacing="10px" cellpadding="10px">
                                        <tbody>
                                        <tr><th>Institucion</th><td>{{ $detalle['body']['convenio']['Institucion']['nombre'] }}</td></tr>
                                        <tr><th>Lugar Atención</th><td>{{ $detalle['body']['convenio']['LugarAtencion']['nombre'] }}</td></tr>
                                        <tr><th>Tipo de Convenio</th><td>{{ $detalle['body']['convenio']['TipoConvenioInstitucion']['nombre'] }}</td></tr>

                                        @if ($detalle['body']['convenio']['id_tipo_convenio_institucion'] == 1)
                                            {{-- FIJO --}}
                                            <tr><th>Cobro Fijo</th><td>{{ $detalle['body']['convenio']['fijo'] }}</td></tr>
                                        @elseif ($detalle['body']['convenio']['id_tipo_convenio_institucion'] == 2)
                                            {{-- VARIABLE --}}
                                            <tr><th>Porcentaje por Atenciones</th><td>{{ $detalle['body']['convenio']['atencion'] }}</td></tr>
                                            <tr><th>Cobro por Confirmaicon de Agenda</th><td>{{ $detalle['body']['convenio']['confirmacion_agenda'] }}</td></tr>
                                            <tr><th>Cobro por GGCC</th><td>{{ $detalle['body']['convenio']['ggcc'] }}</td></tr>
                                            <tr><th>Cobro arriendo BOX</th><td>{{ $detalle['body']['convenio']['box'] }}</td></tr>
                                        @endif

                                        @if (!empty($detalle['body']['convenio']['observacion']))
                                            <tr><th>observacion</th><td>{{ $detalle['body']['convenio']['observacion'] }}</td></tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td align="center">
                                    <table cellspacing="10px" cellpadding="10px">
                                        <tbody>
                                            <td colspan="2" height="30"></td>
                                            <tr>
                                                <td style="background: rgb(51, 204, 171); background: -moz-linear-gradient(148deg, rgba(51, 204, 171) 0%, rgb(24, 92, 92) 100%); background: -webkit-linear-gradient(148deg, rgba(51, 204, 171) 0%, rgba(24, 92, 92) 100%); background: linear-gradient(148deg, rgba(51, 204, 171) 0%, rgba(24, 92, 92) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                    <a target="_blank" href="{{ route('invitacion.convenio.profesional.confirmacion_rechazo', [ 'inv' => $detalle['body']['invitacion_token'], 'tpi' => '1' ]) }}" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                        Aceptar
                                                    </a>
                                                </td>
                                                <td style="background: rgb(51,102,204); background: -moz-linear-gradient(148deg, rgba(51,102,204,1) 0%, rgba(47,177,177,1) 100%); background: -webkit-linear-gradient(148deg, rgba(51,102,204,1) 0%, rgba(47,177,177,1) 100%); background: linear-gradient(148deg, rgba(51,102,204,1) 0%, rgba(47,177,177,1) 100%); padding: 15px 18px; -webkit-border-radius: 30px; font-family: Helvetica, Arial, sans-serif;" align="center" bgcolor="#289CDC">
                                                    <a target="_blank" href="{{ route('invitacion.convenio.profesional.confirmacion_rechazo', [ 'inv' => $detalle['body']['invitacion_token'], 'tpi' => '2' ]) }}" style="color: #ffffff; text-decoration: none; font-size: 18px; ">
                                                        Rechazar
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" height="10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20"> </td>
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
