<!--datos Horario-->
<div id="horario_dependiente_manten" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_dependiente_manten" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Configurar Horario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-tabs-aten nav-fill mb-3" id="tablas_examenes" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link-aten active" id="uno_tab_manten" data-toggle="pill" href="#uno_manten" role="tab" aria-controls="uno" aria-selected="true">Horario de Trabajo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-aten" id="dos_tab_manten" data-toggle="pill" href="#dos_manten" role="tab" aria-controls="pills-home" aria-selected="true">Configurar Horario</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="pills-tablas-remuneraciones">
                        <!--HORARIO-->
                        <div class="tab-pane fade show active" id="uno_manten" role="tabpanel" aria-labelledby="uno_tab_manten">
                            <div class="row haberes collapse show" id="info_funcionario_manten-1">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="table-responsive">
                                        <table id="info_funcionario_manten" class="display table-borderless table  dt-responsive nowrap table-xs" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th class="align-middle">Días Laborales</th>
                                                    <td class="align-middle"></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora Entrada</th>
                                                    <td class="align-middle"></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora Salida</th>
                                                    <td class="align-middle"></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora inicio colación</th>
                                                    <td class="align-middle"></td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora término colación</th>
                                                    <td class="align-middle"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CONFIGURAR HORARIO-->
                        <div class="tab-pane fade" id="dos_manten" role="tabpanel" aria-labelledby="dos_tab_manten">
                            <div class="row deberes collapse show" id="deberes-1">
                                <div class="col-sm-12 col-md-12">
                                    <input type="hidden" name="horario_id_personal_manten" id="horario_id_personal_manten" value="">
                                    <input type="hidden" name="horario_id_contrato_dependiente_manten" id="horario_id_contrato_dependiente_manten" value="">
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Días laborales</label>
                                             <select class="js-example-basic-multiple" name="horario_dias_laborales_manten" id="horario_dias_laborales_manten" multiple="multiple">
                                                <option value="">Seleccione</option>
                                                <option value="1">Lunes</option>
                                                <option value="2">Martes</option>
                                                <option value="3">Miércoles</option>
                                                <option value="4">Jueves</option>
                                                <option value="5">Viernes</option>
                                                <option value="6">Sábado</option>
                                                <option value="7">Domingo</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora de entrada</label>
                                            <input type="time" class="form-control form-control-sm" id="horario_hora_entrada_manten" name="horario_hora_entrada_manten" aria-describedby="emailHelp" placeholder="Hora Entrada">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora de salida</label>
                                            <input type="time" class="form-control form-control-sm" id="horario_hora_salida_manten" name="horario_hora_salida_manten" aria-describedby="emailHelp" placeholder="Hora Salida">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora inicio colación</label>
                                              <input type="time" class="form-control form-control-sm" id="horario_hora_entrada_colacion_manten" name="horario_hora_entrada_colacion_manten" aria-describedby="emailHelp" placeholder="Hora inicio colación">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Hora término colación</label>
                                            <input type="time" class="form-control form-control-sm" id="horario_hora_salida_colacion_manten" name="horario_hora_salida_colacion_manten" aria-describedby="emailHelp" placeholder="Hora término colación">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-sm-12 col-md-12">
                                    <div class="table-responsive">
                                        <table id="rend-caja-dental"
                                            class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                                            style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th class="align-middle">Dias Laborales</th>
                                                    <th class="align-middle">
                                                        <select class="js-example-basic-multiple" name="horario_dias_laborales_manten" id="horario_dias_laborales_manten" multiple="multiple">
                                                            <option value="">Seleccione</option>
                                                            <option value="1">Lunes</option>
                                                            <option value="2">Martes</option>
                                                            <option value="3">Miercoles</option>
                                                            <option value="4">Jueves</option>
                                                            <option value="5">Viernes</option>
                                                            <option value="6">Sabado</option>
                                                            <option value="7">Domingo</option>
                                                        </select>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora entrada</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_entrada_manten" name="horario_hora_entrada_manten" aria-describedby="emailHelp" placeholder="Hora Entrada" value="08:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora salida</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_salida_manten" name="horario_hora_salida_manten" aria-describedby="emailHelp" placeholder="Hora Salida" value="19:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora inicio colación</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_entrada_colacion_manten" name="horario_hora_entrada_colacion_manten" aria-describedby="emailHelp" placeholder="Hora inicio colación" value="12:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora término colación</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_salida_colacion_manten" name="horario_hora_salida_colacion_manten" aria-describedby="emailHelp" placeholder="Hora término colación" value="13:00">
                                                    </th>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm" onclick="modificar_horario_manten();"><i class="feather icon-save"></i> Guardar cambios</button>
            </div>
        </div>
    </div>
</div>


<script>
     /** Modals Horariossss */
    function horario_mantencion_cm(tipo, id_profesional, id_lugar_atencion)
    {
        $('#info_funcionario_manten tbody').html('');
        let url = "{{ route('adm_cm.empleado_mantencion_horario_lugar_atencion') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_empleado : id_profesional,
                tipo_empleado : tipo.toUpperCase(),
                id_lugar_atencion: id_lugar_atencion,
                estado: 2,
            },
        })
        .done(function(data) {
            if (data.estado == 1)
            {

                $.each(data.registros, function(key, value)
                {
                    let id = value.id;
                    let id_empleado = value.id_empleado;
                    var hora_ingreso = value.hora_ingreso;
                    var hora_salida = value.hora_salida;
                    var hora_inicio_colacion = value.hora_inicio_colacion;
                    var hora_termino_colacion = value.hora_termino_colacion;
                    let dia = '';
                    dias = value.dias_laborales.split(',');
                    for (let i = 0; i < dias.length; i++)
                    {
                        if (dias[i] == 1) {
                            dia += 'Lunes '
                        } else if (dias[i] == 2) {
                            dia += 'Martes '
                        } else if (dias[i] == 3) {
                            dia += 'Miércoles '
                        } else if (dias[i] == 4) {
                            dia += 'Jueves '
                        } else if (dias[i] == 5) {
                            dia += 'Viernes '
                        } else if (dias[i] == 6) {
                            dia += 'Sábado '
                        } else if (dias[i] == 7) {
                            dia += 'Domingo '
                        }
                    }

                    var fila = '';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Días laborales</th>';
                    fila +='    <td class="align-middle">' + dia + '</td>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora entrada</th>';
                    fila +='    <td class="align-middle">' + hora_ingreso + '</td>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora salida</th>';
                    fila +='    <td class="align-middle">' + hora_salida + '</td>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora inicio colación</th>';
                    fila +='    <td class="align-middle">' + hora_inicio_colacion + '</td>';
                    fila +='</tr>';
                    fila +='<tr>';
                    fila +='    <th class="align-middle">Hora término colación</th>';
                    fila +='    <td class="align-middle">' + hora_termino_colacion + '</td>';
                    fila +='</tr>';

                    $('#horario_id_contrato_dependiente_manten').val(id);
                    $('#horario_id_personal_manten').val(id_empleado);

                    $('#horario_dias_laborales_manten').val(dias).select2();
                    $('#horario_hora_entrada_manten').val(hora_ingreso);
                    $('#horario_hora_salida_manten').val(hora_salida);
                    $('#horario_hora_entrada_colacion_manten').val(hora_inicio_colacion);
                    $('#horario_hora_salida_colacion_manten').val(hora_termino_colacion);

                    $('#info_funcionario_manten tbody').append(fila);
                });

                $('#horario_dependiente_manten').modal('show');

            }
            else
            {
                swal({
                    title: "El usuario no registra datos de horario.",
                    icon: "error",
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function modificar_horario_manten()
    {
        var id_contrato_dependiente = $('#horario_id_contrato_dependiente_manten').val();
        var id_personal = $('#horario_id_personal_manten').val();
        var dias_laborales = $('#horario_dias_laborales_manten').val();
        var hora_entrada = $('#horario_hora_entrada_manten').val();
        var hora_salida = $('#horario_hora_salida_manten').val();
        var hora_entrada_colacion = $('#horario_hora_entrada_colacion_manten').val();
        var hora_salida_colacion = $('#horario_hora_salida_colacion_manten').val();
        let _token = CSRF_TOKEN;

        let url = "{{ route('adm_cm.personal.horario.editar') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: _token,
                id:id_contrato_dependiente,
                id_empleado:id_personal,
                dias_laborales:dias_laborales,
                hora_ingreso:hora_entrada,
                hora_salida:hora_salida,
                hora_inicio_colacion:hora_entrada_colacion,
                hora_termino_colacion:hora_salida_colacion,
            },
        })
        .done(function(data) {
            console.log(data);
            if (data.estado == 1)
            {
                $('#horario_dependiente').modal('hide');
                swal({
                    title: "Horario de Personal",
                    text: "Horario modificado con éxito",
                    icon: "success",
                    buttons: "Aceptar"
                });

                $('#horario_id_contrato_dependiente_manten').val('');
                $('#horario_id_personal_manten').val('');
                $('#horario_dias_laborales_manten').val('');
                $('#horario_hora_entrada_manten').val('');
                $('#horario_hora_salida_manten').val('');
                $('#horario_hora_entrada_colacion_manten').val('');
                $('#horario_hora_salida_colacion_manten').val('');
            }
            else
            {

                var mensaje = '';
                if(data.error)
                {
                    $.each(data.error, function (indexInArray, valueOfElement)
                    {
                        mensaje += valueOfElement+'\n';
                    });
                }
                else
                {
                    mensaje += 'No se encontró horario solicitado';
                }
                swal({
                    title: "Horario de Personal",
                    text: mensaje,
                    icon: "error",
                    buttons: "Cerrar"
                });
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
