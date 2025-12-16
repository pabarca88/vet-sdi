<div id="m_remuneraciones" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_remuneraciones" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Remuneraciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body">

                <input type="hidden" name="m_remuneraciones_r_mes_liq" id="m_remuneraciones_r_mes_liq" value="">
                <input type="hidden" name="m_remuneraciones_r_ano_liq" id="m_remuneraciones_r_ano_liq" value="">
                <input type="hidden" name="m_remuneraciones_id_contrato_dependiente" id="m_remuneraciones_id_contrato_dependiente" value="">
                <input type="hidden" name="m_remuneraciones_id_empleado" id="m_remuneraciones_id_empleado" value="">
                <input type="hidden" name="m_remuneraciones_tipo_empleado" id="m_remuneraciones_tipo_empleado" value="">

                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Haberes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Descuentos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="tres_tab" data-toggle="pill" href="#tres" role="tab" aria-controls="pills-home" aria-selected="true">Resumen</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="pills-tablas_examenes">
                            <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h5 class="text-c-blue">HABERES</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue"> Haberes imponibles</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Sueldo base</th>
                                                        <th class="align-middle"> <input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_sueldo_base" id="m_remuneraciones_r_sueldo_base" value="0" onchange="calculo_imponibles();" readonly></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Bonos</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_bonos" id="m_remuneraciones_r_bonos" value="0" onchange="calculo_imponibles();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Horas extra</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_horas_extra" id="m_remuneraciones_r_horas_extra" value="0" onchange="calculo_imponibles();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Otros</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_otros_imp" id="m_remuneraciones_r_otros_imp" value="0" onchange="calculo_imponibles();"></th>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-tfoot-primary-claro">
                                                    <tr>
                                                        <th class="align-middle">Total Haberes Imponibles</th>
                                                        <th class="align-middle"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_total_h_imponibles" id="m_remuneraciones_r_total_h_imponibles" value="0" readonly></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue"> Haberes NO Imponibles</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Asignación colación</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_colacion" id="m_remuneraciones_r_colacion" value="0" onchange="calculo_no_imponibles();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Asignación movilización</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_movilizacion" id="m_remuneraciones_r_movilizacion" value="0" onchange="calculo_no_imponibles();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Asignación familiar</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_asignacion_fam" id="m_remuneraciones_r_asignacion_fam" value="0" onchange="calculo_no_imponibles();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Otros</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_otros_noimp" id="m_remuneraciones_r_otros_noimp" value="0" onchange="calculo_no_imponibles();"></th>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="bg-tfoot-primary-claro">
                                                    <tr>
                                                        <th class="align-middle">Total Haberes No Imponibles</th>
                                                        <th class="align-middle"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_total_no_imponibles" id="m_remuneraciones_r_total_no_imponibles" value="0" readonly></th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <div class="alert alert-primary pb-0" role="alert">
                                            <h5 class="f-18 text-c-blue"> Total Haberes</h5><h5 class="f-16 text-c-blue"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_total_haberes" id="m_remuneraciones_r_total_haberes" value="0" readonly></th>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h5 class="text-c-blue">DESCUENTOS</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Descuentos legales</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Cotización AFP </th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_afp" id="m_remuneraciones_r_afp" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Seguro de Cesantia</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_seg_cesantia" id="m_remuneraciones_r_seg_cesantia" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Cotización Voluntatia AFP</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_afp_vol" id="m_remuneraciones_r_afp_vol" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Cotización Salud</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_por_salud" id="m_remuneraciones_r_por_salud" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue"> Descuentos personales</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">Prestamos</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_prestamos" id="m_remuneraciones_r_prestamos" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Anticipos</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_anticipos" id="m_remuneraciones_r_anticipos" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Ahorro voluntario</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_ahorro_vol" id="m_remuneraciones_r_ahorro_vol" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Seguro complementario</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_seguro_complementario" id="m_remuneraciones_r_seguro_complementario" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">Otros</th>
                                                        <th class="align-middle"><input type="number" min="0" step="1" class="form-control form-control-sm" name="m_remuneraciones_r_otros_desc_pers" id="m_remuneraciones_r_otros_desc_pers" value="0" onchange="calculo_descuentos();"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <div class="alert alert-primary pb-0" role="alert">
                                            <h5 class="text-c-blue f-18"> TOTAL DESCUENTOS</h5><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_total_desc" id="m_remuneraciones_r_total_desc" value="0" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tres" role="tabpanel" aria-labelledby="tres_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h5 class="text-c-blue">LIQUIDACIÓN FINAL</h5>
                                        <hr class="mt-0">
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">TOTAL HABERES</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-12 mb-3">
                                        <div class="table-responsive">
                                            <table id="rend-caja-dental" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <tbody>
                                                    <tr>
                                                        <th class="align-middle">TOTAL HABERES</th>
                                                        <th class="align-middle"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_suma_r_total_haberes" id="m_remuneraciones_r_suma_r_total_haberes" value="0" readonly></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">TOTAL DESCUENTOS</th>
                                                        <th class="align-middle"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_suma_r_total_desc" id="m_remuneraciones_r_suma_r_total_desc" value="0" readonly></th>
                                                    </tr>
                                                    <tr>
                                                        <th class="align-middle">VALOR A PAGAR</th>
                                                        <th class="align-middle"><input type="number" class="form-control form-control-sm" name="m_remuneraciones_r_a_pagar" id="m_remuneraciones_r_a_pagar" value="0" readonly></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Borrar datos</button> --}}
                                    <button type="button" class="btn btn-success btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                                    <button type="button" class="btn btn-primary btn-sm" style="color: #3268bf;background-color: #cde0f6;border-color: #cde0f6;" onclick="registrar_liquidacion();"><i class="feather icon-file"></i>Generar PDF de pago</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
		</div>
	</div>
</div>
<script>
    function generar_pago(tipo_empleado, id_empleado, id_contrato_dependiente, ano, mes) {


        $('#m_remuneraciones_id_contrato_dependiente').val(id_contrato_dependiente);
        $('#m_remuneraciones_id_empleado').val(id_empleado);
        $('#m_remuneraciones_tipo_empleado').val(tipo_empleado);
        $('#m_remuneraciones_r_mes_liq').val(mes);
        $('#m_remuneraciones_r_ano_liq').val(ano);

        console.log(id_contrato_dependiente);

        let url = "{{  route('adm_cm.contrato.dependiente.ver') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                id : id_contrato_dependiente,
                tipo_empleado: tipo_empleado
            },
        })
        .done(function(resp) {
            console.log(resp)

            if (resp != null)
            {
                if(resp.estado == 1)
                {

                    // nombres
                    // rut
                    $('#m_remuneraciones_r_sueldo_base').val(parseInt(resp.registro.monto_imponible));

                    if(resp.registro.colacion == 1)
                        $('#m_remuneraciones_r_colacion').val(parseInt(resp.registro.colacion_porcentaje));
                    else
                        $('#m_remuneraciones_r_colacion').val(0);

                    if(resp.registro.locomocion == 1)
                        $('#m_remuneraciones_r_movilizacion').val(parseInt(resp.registro.locomocion_porcentaje));
                    else
                        $('#m_remuneraciones_r_movilizacion').val(0);

                    if(resp.registro.asignacion_familiar == 1)
                        $('#m_remuneraciones_r_asignacion_fam').val(parseInt(resp.registro.asignacion_familiar_cantidad));
                    else
                        $('#m_remuneraciones_r_asignacion_fam').val(0);

                    calculo_imponibles();
                    calculo_no_imponibles();
                    calculo_descuentos();
                    // $('#m_remuneraciones_r_otros_noimp').val();
                    // $('#m_remuneraciones_r_otros_noimp').val(0);


                    // caja_compensacion
                    // caja_compensacion_porcentaje
                    $('#m_remuneraciones').modal('show');
                }
                else
                {
                    var mensaje = '';
                    if(resp.error)
                    {
                        $.each(resp.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Carga Informacion de Contrato del Empleado",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                var mensaje = '';
                if(resp.error)
                {
                    $.each(resp.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Carga Informacion de Contrato del Empleado",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function registrar_liquidacion()
    {
        var id_contrato_dependiente = $('#m_remuneraciones_id_contrato_dependiente').val();
        var id_empleado = $('#m_remuneraciones_id_empleado').val();
        var tipo_empleado = $('#m_remuneraciones_tipo_empleado').val();
        var r_mes_liq = $('#m_remuneraciones_r_mes_liq').val();
        var r_ano_liq = $('#m_remuneraciones_r_ano_liq').val();
        var r_sueldo_base = $('#m_remuneraciones_r_sueldo_base').val();
        var r_bonos = $('#m_remuneraciones_r_bonos').val();
        var r_horas_extra = $('#m_remuneraciones_r_horas_extra').val();
        var r_otros_imp = $('#m_remuneraciones_r_otros_imp').val();
        var r_total_h_imponibles = $('#m_remuneraciones_r_total_h_imponibles').val();
        var r_colacion = $('#m_remuneraciones_r_colacion').val();
        var r_movilizacion = $('#m_remuneraciones_r_movilizacion').val();
        var r_asignacion_fam = $('#m_remuneraciones_r_asignacion_fam').val();
        var r_otros_noimp = $('#m_remuneraciones_r_otros_noimp').val();
        var r_total_no_imponibles = $('#m_remuneraciones_r_total_no_imponibles').val();
        var r_total_haberes = $('#m_remuneraciones_r_total_haberes').val();
        var r_afp = $('#m_remuneraciones_r_afp').val();
        var r_seg_cesantia = $('#m_remuneraciones_r_seg_cesantia').val();
        var r_afp_vol = $('#m_remuneraciones_r_afp_vol').val();
        var r_por_salud = $('#m_remuneraciones_r_por_salud').val();
        var r_prestamos = $('#m_remuneraciones_r_prestamos').val();
        var r_anticipos = $('#m_remuneraciones_r_anticipos').val();
        var r_ahorro_vol = $('#m_remuneraciones_r_ahorro_vol').val();
        var r_seguro_complementario = $('#m_remuneraciones_r_seguro_complementario').val();
        var r_otros_desc_pers = $('#m_remuneraciones_r_otros_desc_pers').val();
        var r_total_desc = $('#m_remuneraciones_r_total_desc').val();
        var r_suma_r_total_haberes = $('#m_remuneraciones_r_suma_r_total_haberes').val();
        var r_suma_r_total_desc = $('#m_remuneraciones_r_suma_r_total_desc').val();
        var r_a_pagar = $('#m_remuneraciones_r_a_pagar').val();
        var _token = CSRF_TOKEN;

        if(tipo_empleado == "PROFESIONAL"){
            var url = "{{ route('adm_cm.remuneracion.registrar_profesional') }}";
        }else{
            var url = "{{ route('adm_cm.remuneracion.registrar') }}";
        }


        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token : _token,
                id_contrato_dependiente : id_contrato_dependiente,
                id_empleado : id_empleado,
                r_mes_liq : r_mes_liq,
                r_ano_liq : r_ano_liq,
                r_sueldo_base : r_sueldo_base,
                r_bonos : r_bonos,
                r_horas_extra : r_horas_extra,
                r_otros_imp : r_otros_imp,
                r_total_h_imponibles : r_total_h_imponibles,
                r_colacion : r_colacion,
                r_movilizacion : r_movilizacion,
                r_asignacion_fam : r_asignacion_fam,
                r_otros_noimp : r_otros_noimp,
                r_total_no_imponibles : r_total_no_imponibles,
                r_total_haberes : r_total_haberes,
                r_afp : r_afp,
                r_seg_cesantia : r_seg_cesantia,
                r_afp_vol : r_afp_vol,
                r_por_salud : r_por_salud,
                r_prestamos : r_prestamos,
                r_anticipos : r_anticipos,
                r_ahorro_vol : r_ahorro_vol,
                r_seguro_complementario : r_seguro_complementario,
                r_otros_desc_pers : r_otros_desc_pers,
                r_total_desc : r_total_desc,
                r_suma_r_total_haberes : r_suma_r_total_haberes,
                r_suma_r_total_desc : r_suma_r_total_desc,
                r_a_pagar : r_a_pagar,
            },
        })
        .done(function(resp) {
            console.log(resp)

            if (resp != null)
            {
                if(resp.estado == 1)
                {

                    Fancybox.show([{
                        src: resp.pdf.pdf.pdf_url,
                        type: "iframe",
                        preload: false,
                    }]);

                    $('#m_remuneraciones').modal('hide');

                    swal({
                        title: "Registro Liquidación",
                        text: 'Registro guardado con exito',
                        icon: "success",
                        buttons: "Aceptar",
                    });
                }
                else
                {
                    var mensaje = '';
                    if(resp.error)
                    {
                        $.each(resp.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro Liquidación",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }

            }
            else
            {
                var mensaje = '';
                if(resp.error)
                {
                    $.each(resp.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'Intente nuevamente.';
                }

                swal({
                    title: "Registro Liquidación",
                    text: mensaje,
                    icon: "error",
                    buttons: "Aceptar",
                    DangerMode: true,
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function calculo_imponibles()
    {
        var sueldo_base = $('#m_remuneraciones_r_sueldo_base').val();
        var bonos = $('#m_remuneraciones_r_bonos').val();
        var horas_extra = $('#m_remuneraciones_r_horas_extra').val();
        var otros_imp = $('#m_remuneraciones_r_otros_imp').val();
        var total_h_imponibles = $('#m_remuneraciones_r_total_h_imponibles').val();

        total_h_imponibles = parseInt(sueldo_base) + parseInt(bonos) + parseInt(horas_extra) + parseInt(otros_imp);

        $('#m_remuneraciones_r_total_h_imponibles').val(total_h_imponibles);

        $('#m_remuneraciones_r_total_haberes').val(parseInt($('#m_remuneraciones_r_total_h_imponibles').val()) + parseInt($('#m_remuneraciones_r_total_no_imponibles').val()));
        calculo_pago();
    }

    function calculo_no_imponibles()
    {
        var colacion = $('#m_remuneraciones_r_colacion').val();
        var movilizacion = $('#m_remuneraciones_r_movilizacion').val();
        var asignacion_fam = $('#m_remuneraciones_r_asignacion_fam').val();
        var otros_noimp = $('#m_remuneraciones_r_otros_noimp').val();
        var total_no_imponibles = $('#m_remuneraciones_r_total_no_imponibles').val();

        total_no_imponibles = parseInt(colacion) + parseInt(movilizacion) + parseInt(asignacion_fam) + parseInt(otros_noimp);
        $('#m_remuneraciones_r_total_no_imponibles').val(total_no_imponibles);

        $('#m_remuneraciones_r_total_haberes').val(parseInt($('#m_remuneraciones_r_total_h_imponibles').val()) + parseInt($('#m_remuneraciones_r_total_no_imponibles').val()));
        calculo_pago();
    }

    function calculo_descuentos()
    {
        var afp = $('#m_remuneraciones_r_afp').val();
        var seg_cesantia = $('#m_remuneraciones_r_seg_cesantia').val();
        var afp_vol = $('#m_remuneraciones_r_afp_vol').val();
        var por_salud = $('#m_remuneraciones_r_por_salud').val();
        var prestamos = $('#m_remuneraciones_r_prestamos').val();
        var anticipos = $('#m_remuneraciones_r_anticipos').val();
        var ahorro_vol = $('#m_remuneraciones_r_ahorro_vol').val();
        var seguro_complementario = $('#m_remuneraciones_r_seguro_complementario').val();
        var otros_desc_pers = $('#m_remuneraciones_r_otros_desc_pers').val();
        var total_desc = $('#m_remuneraciones_r_total_desc').val();

        total_desc = parseInt(afp) + parseInt(seg_cesantia) + parseInt(afp_vol) + parseInt(por_salud) + parseInt(prestamos) + parseInt(anticipos) + parseInt(ahorro_vol) + parseInt(seguro_complementario) + parseInt(otros_desc_pers);
        $('#m_remuneraciones_r_total_desc').val(total_desc);
        calculo_pago();
    }

    function calculo_pago()
    {
        var total_h_imponibles = $('#m_remuneraciones_r_total_h_imponibles').val();
        var total_no_imponibles = $('#m_remuneraciones_r_total_no_imponibles').val();
        var total_desc = $('#m_remuneraciones_r_total_desc').val();

        $('#m_remuneraciones_r_suma_r_total_haberes').val(parseInt(total_h_imponibles) + parseInt(total_no_imponibles));
        $('#m_remuneraciones_r_suma_r_total_desc').val(total_desc);
        $('#m_remuneraciones_r_a_pagar').val((parseInt(total_h_imponibles) + parseInt(total_no_imponibles)) - parseInt(total_desc));
    }

</script>
