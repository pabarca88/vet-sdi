<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Registro De Equipo</title>
</head>

<body>
    <table border="0" width="100%" cellspacing="0" cellpadding="0" bgcolor="#F0F0F0">
        <tbody>
            <tr>
                <td style="background-color: #ffffff;" align="center" valign="top" bgcolor="#ffffff"><br>
                    <table style="width: 100%px; max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                            <tr>
                                <tdstyle="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);">
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <img style="width: 95px; margin-bottom: 20px; margin-top: 20px;" src="https://www.med-sdi.cl/images/logo_pais_vertical.png" alt="Medichile">
                                </td>
                            </tr>
                            <tr>
                                <td style="background-color: #f2f2f2; padding-top: 15px;" align="center">
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; line-height: 20px; color: #424242; text-align: center;">
                                        Sr./Sra {{ $detalle['body']['NOMBRE_CLIENTE'] }}
                                    </p>
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; line-height: 20px; color: #424242; text-align: center;">
                                        Para poder registrar su nuevo equipo debe ingresar <a href="{{ $detalle['body']['URL'] }}" style=" margin-left: 15px; padding: 8px 15px; border: solid 1px; color: #fff; background-color: #1CBEBE; border-color: #1CBEBE; text-decoration: none;border-radius: 6px;">Aquí</a>
                                    </p>
                                    <br>
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; line-height: 20px; color: #424242; text-align: center;">
                                        En caso que el boton no funcione puede hacer click en la siguiente dirección:
                                    </p>
                                    <p style="font-family: Helvetica, Arial, sans-serif; font-size: 17px; line-height: 20px; color: #424242; text-align: center;">
                                        <a href="{{ $detalle['body']['URL'] }}" style="padding: 6px; color: #000; font-weight: bold; background-color: #cbc5c5; text-decoration: none;">{{ $detalle['body']['URL'] }}</a>
                                    </p>
                                </td>
                            </tr>

                            <tr>
                                <td height="10" style="background-color: #f2f2f2;" align="center">
                                    <p style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 14px;">
                                        <a style="color: #424242;" href="#"></a>
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
                                <td style="height: 11px; background-color: rgb(51,102,204); background: -moz-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: -webkit-linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%); background: linear-gradient(81deg, rgba(51,102,204,1) 0%, rgba(28,190,190,1) 100%);"></td>
                            </tr>
                            <td style="text-align: center;" align="center">
                                <table border="0" width="95%" cellspacing="0" cellpadding="0" align="center">
                                    <tbody>
                                        <tr>
                                            <td style="font-family: Helvetica, Arial, sans-serif;" align="center"
                                                valign="top">
                                                <p
                                                    style="text-align: center; color: #999999; font-size: 12px; font-weight: normal; line-height: 20px;">
                                                    Este correo electrónico fue enviado por <a style="color: #000;"
                                                        href="https://www.med-sdi.cl">Salud Digital Integrada</a> <br>
                                                    Salud Digital Integrada <b>Todos los Derechos Reservados. ©2023</b>
                                                </p>
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
