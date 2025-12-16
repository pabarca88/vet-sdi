<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
    </head>

    <main>
        <table cellpadding="1" cellspacing="1" style="width:100%">
            <tbody>
                <tr>
                    <td>
                        <table cellpadding="1" cellspacing="1" style="width:100%">
                            <tbody>
                                <tr>
                                    <td colspan="2">LIQUIDACION DE SUELDO</td>
                                </tr>
                                <tr>
                                    <td>Razon Social: {{ $cuerpo['institucion']['razon_social'] }}</td>
                                    <td>Rut empresa: {{ $cuerpo['institucion']['rut'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr><td><hr/></td></tr>

                <tr>
                    <td>
                    <table cellpadding="1" cellspacing="1" style="width:100%">
                        <tbody>
                            <tr>
                                <td>Rut</td>
                                <td>Trabajador</td>
                                <td>Cargo</td>
                            </tr>
                            <tr>

                                <td>{{ $cuerpo['contrato']['persona']['rut'] }}</td>
                                <td>{{ $cuerpo['contrato']['persona']['nombre'].' '.$cuerpo['contrato']['persona']['apellido_uno'].' '.$cuerpo['contrato']['persona']['apellido_dos'] }}</td>
                                <td>{{ $cuerpo['contrato']['tipo_empleado'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <tr><td><hr/></td></tr>
                <tr>
                    <td>
                        <table cellpadding="1" cellspacing="20" style="width:100%">
                            <tr>
                                <td>HABERES</td>
                                <td>DESCUENTOS</td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td>Sueldo base</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_sueldo_base'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Bonos</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_bonos'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Horas extra</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_horas_extra'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Otros</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_otros_imp'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Total Haberes Imponibles</td>
                                            <td style="text-align: right;font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_h_imponibles'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Asignación colación</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_colacion'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Asignación movilización</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_movilizacion'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Asignación familiar</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_asignacion_fam'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Otros</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_otros_noimp'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">Total Haberes No Imponibles</td>
                                            <td style="text-align: right;font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_no_imponibles'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-weight: bold;">Total Haberes</td>
                                            <td style="text-align: right;font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_haberes'],0,',','.') }}</td>
                                        </tr> --}}
                                    </table>
                                </td>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td>Cotización AFP </td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_afp'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Seguro de Cesantia</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_seg_cesantia'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cotización Voluntatia AFP</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_afp_vol'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cotización Salud</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_por_salud'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prestamos</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_prestamos'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Anticipos</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_anticipos'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ahorro voluntario</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_ahorro_vol'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Seguro complementario</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_seguro_complementario'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Otros</td>
                                            <td style="text-align: right;">{{ number_format($cuerpo['remuneracion']['r_otros_desc_pers'],0,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        {{-- <tr>
                                            <td style="font-weight: bold;">TOTAL DESCUENTOS</td>
                                            <td style="text-align: right; font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_desc'],0,',','.') }}</td>
                                        </tr> --}}

                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td><hr/></td></tr>
                <tr>
                    <td>
                        <table cellpadding="1" cellspacing="20" style="width:100%">
                            <tr>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td style="font-weight: bold;">TOTAL HABERES</td>
                                            <td style="text-align: right;font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_haberes'],0,',','.') }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td style="font-weight: bold;">TOTAL DESCUENTOS</td>
                                            <td style="text-align: right; font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_total_desc'],0,',','.') }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td style="font-weight: bold;">Fecha:</td>
                                            @php $array_mes = ['', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE']; @endphp
                                            <td style="text-align: right;font-weight: bold;">{{ $array_mes[$cuerpo['remuneracion']['r_mes_liq']].'-'.$cuerpo['remuneracion']['r_ano_liq'] }}</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table cellpadding="1" cellspacing="1" style="width:100%">
                                        <tr>
                                            <td style="font-weight: bold;">Pago:</td>
                                            <td style="text-align: right; font-weight: bold;">{{ number_format($cuerpo['remuneracion']['r_a_pagar'],0,',','.') }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

            </tbody>
        </table>

    </main>
</html>

