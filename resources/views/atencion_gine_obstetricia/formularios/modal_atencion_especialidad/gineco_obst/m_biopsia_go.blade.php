<div id="m_biopsia_go" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_biopsia_go" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Solicitud Examen de Biopsia Gineco-Obstétrica </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <div class="form-control form-control-sm">Biopsia Gineco-Obstétrica</div>
                            <input type="hidden" name="m_biopsia_go_id_tipo_toma" id="m_biopsia_go_id_tipo_toma" value="1">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Sospecha</label>
                            <input type="text" class="form-control form-control-sm" name="m_biopsia_go_sospecha" id="m_biopsia_go_sospecha" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Patólogo o Laboratorio</label>
                            <input type="text" class="form-control form-control-sm" name="m_biopsia_go_patologo_lab" id="m_biopsia_go_patologo_lab" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="m_biopsia_go_prioridad" name="m_biopsia_go_prioridad">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2" selected="">Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-12">
                        Agregar muestra <button type="button" class="btn btn-outline-success btn-xs agregar_muestra" onclick="add_form_biopsia();">+</button>
                    </div>
                    <div class="col-12 lista_muestras_bipsia">
                        <div class="row biopsia_item biopsia_item_1">
                            <div class="col-sm-3">
                                <div class="form-group fill">
                                    <label class="label">Frasco 1</label>
                                    <input type="hidden"  name="m_biopsia_go_id_tipo_embase_1" id="m_biopsia_go_id_tipo_embase_1" value="1"/>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="form-group fill">
                                    <label class="floating-label">Zona 1 de toma de muestra</label>
                                    <input type="text" class="form-control form-control-sm" name="m_biopsia_go_observacion_1" id="m_biopsia_go_observacion_1" value="">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger float-right " onclick="eliminarFila(1)"><i class="fa fa-trash-o"></i></button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="m_biopsia_go_obs_general" id="m_biopsia_go_obs_general"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success btn-sm float-right" onclick="registrar_biopsia();">
                        <i class="fa fa-plus"></i> Agregar examen</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs" id="m_biopsia_go_table">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nº Orden</th>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Patólogo</th>
                                        <th class="text-center align-middle">Sospecha</th>
                                        <th class="text-center align-middle">Prioridad</th>
                                        <th class="text-center align-middle">Observación</th>
                                        <th class="text-center align-middle">Cant. Muestras</th>
                                        <th class="text-center align-middle">Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle"><span>03/12/20</span></td>
                                        <td class="text-center align-middle">7217821</td>
                                        <td class="text-center align-middle">Utero</td>
                                        <td class="text-center align-middle">cuello Uterino</td>
                                        <td class="text-center align-middle">DR LOPEZ</td>
                                        <td class="text-center align-middle">
                                        <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                {{-- <button type="button" class="btn btn-info btn-sm"> Guardar</button> --}}
            </div>
        </div>
    </div>
</div>

<script>
    function sol_biopsia_go()
    {
        $('#m_biopsia_go').modal('show');
        ver_biopsias();
        limpiar_form_bipsia();
    }

    function add_form_biopsia()
    {
        var cant = $('.biopsia_item').length + 1;
        var html = '';
        html += '<div class="row biopsia_item biopsia_item_'+cant+'">';
        html += '    <div class="col-sm-3">';
        html += '        <div class="form-group fill">';
        html += '            <label class="label">Frasco '+cant+'</label>';
        html += '            <input type="hidden"  name="m_biopsia_go_id_tipo_embase_'+cant+'" id="m_biopsia_go_id_tipo_embase_'+cant+'" value="1"/>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-7">';
        html += '        <div class="form-group fill">';
        html += '            <label class="floating-label">Zona '+cant+' de toma de muestra</label>';
        html += '            <input type="text" class="form-control form-control-sm" name="m_biopsia_go_observacion_'+cant+'" id="m_biopsia_go_observacion_'+cant+'" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-2">';
        html += '        <button type="button" class="btn btn-danger float-right " onclick="eliminarFila('+cant+')"><i class="fa fa-trash-o"></i></button>';
        html += '    </div>';
        html += '</div>';


        $('.lista_muestras_bipsia').append(html);

    }

    function eliminarFila(id)
    {
        $('.biopsia_item_'+id).remove();
    }

    function registrar_biopsia()
    {
        var id_tipo_toma = $('#m_biopsia_go_id_tipo_toma').val();
        var id_ficha_atencion = '';
        var id_ficha_otros_prof = '';
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var patologo_lab = $('#m_biopsia_go_patologo_lab').val();
        var sospecha = $('#m_biopsia_go_sospecha').val();
        var prioridad = $('#m_biopsia_go_prioridad').val();
        var observacion = $('#m_biopsia_go_obs_general').val();
        var detalle = [];
        var valido = 1;
        var mensaje = '';
        $.each($('.biopsia_item'), function (indexInArray, valueOfElement) {
            if( $(valueOfElement).find('#m_biopsia_go_observacion_'+(indexInArray+1)).val() != '' )
            {
                detalle[indexInArray] = {
                    id_tipo_embase : $(valueOfElement).find('#m_biopsia_go_id_tipo_embase_'+(indexInArray+1)).val(),
                    observacion : $(valueOfElement).find('#m_biopsia_go_observacion_'+(indexInArray+1)).val()
                }
            }
        });

        if( patologo_lab == '')
        {
            mensaje += 'Patólogo o Laboratorio requerido.\n';
            valido = 0;
        }
        if( sospecha == '')
        {
            mensaje += 'Sospecha campo requerido.\n';
            valido = 0;
        }
        if( prioridad == '')
        {
            mensaje += 'Prioridad campo requerido.\n';
            valido = 0;
        }
        if(detalle.length == 0)
        {
            mensaje += 'Debe agregar al menos una Muestra.\n';
            valido = 0;
        }

        if(valido == 1)
        {
            url = "{{ route('ficha_atencion.toma.muestra.registrar') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token:CSRF_TOKEN,
                    id_tipo_toma:id_tipo_toma,
                    id_ficha_atencion:id_ficha_atencion,
                    id_ficha_otros_prof:id_ficha_otros_prof,
                    id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    id_lugar_atencion:id_lugar_atencion,
                    patologo_lab:patologo_lab,
                    sospecha:sospecha,
                    prioridad:prioridad,
                    observacion:observacion,
                    detalle:detalle,
                },
            })
            .done(function(data)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de Biopsia.",
                        text: "Biopsia registrada con exito",
                        icon: "success",
                    });
                    limpiar_form_bipsia();
                    ver_biopsias();
                }
                else
                {
                    var mensaje = '';
                    if(data.error)
                    {
                        $.each(data.error, function (indexInArray, valueOfElement)
                        {
                            mensaje += indexInArray+': '+valueOfElement+'\n';
                        });
                    }
                    else
                    {
                        mensaje += 'Intente nuevamente.';
                    }

                    swal({
                        title: "Registro de Biopsia",
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
        else
        {
            swal({
                title: "Registro de Biopsia",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function limpiar_form_bipsia()
    {

        $('#m_biopsia_go_patologo_lab').val('');
        $('#m_biopsia_go_sospecha').val('');
        $('#m_biopsia_go_prioridad').val(2);
        $('#m_biopsia_go_obs_general').val('');
        $('.lista_muestras_bipsia').html('');

        var cant = 1;
        var html = '';
        html += '<div class="row biopsia_item biopsia_item_'+cant+'">';
        html += '    <div class="col-sm-3">';
        html += '        <div class="form-group fill">';
        html += '            <label class="label">Frasco '+cant+'</label>';
        html += '            <input type="hidden"  name="m_biopsia_go_id_tipo_embase_'+cant+'" id="m_biopsia_go_id_tipo_embase_'+cant+'" value="1"/>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-7">';
        html += '        <div class="form-group fill">';
        html += '            <label class="floating-label">Zona '+cant+' de toma de muestra</label>';
        html += '            <input type="text" class="form-control form-control-sm" name="m_biopsia_go_observacion_'+cant+'" id="m_biopsia_go_observacion_'+cant+'" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-2">';
        html += '        <button type="button" class="btn btn-danger float-right " onclick="eliminarFila('+cant+')"><i class="fa fa-trash-o"></i></button>';
        html += '    </div>';
        html += '</div>';

        $('.lista_muestras_bipsia').html(html);

    }

    function ver_biopsias()
    {

        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        $('#m_biopsia_go_table tbody').html('');

        url = "{{ route('ficha_atencion.toma.muestra.ver') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                id_paciente:id_paciente,
                id_tipo_toma:1
            },
        })
        .done(function(data)
        {
            if(data.estado == 1)
            {
                var html = '';
                var tex_urgencia = ['','Baja', 'Media', 'Alta', 'Urgente'];


                $.each(data.registro, function (key, value)
                {
                    var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                    var fecha = new Date(f_temp);
                    fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                    html += '<tr>';
                    html += '    <td class="text-center align-middle">'+value.id+'</td>';
                    html += '    <td class="text-center align-middle">'+fecha+'</td>';
                    html += '    <td class="text-center align-middle">'+value.patologo_lab+'</td>';
                    html += '    <td class="text-center align-middle">'+value.sospecha+'</td>';
                    html += '    <td class="text-center align-middle">'+tex_urgencia[value.prioridad]+'</td>';
                    html += '    <td class="text-center align-middle">'+( (value.observacion==null)?'':value.observacion)+'</td>';
                    html += '    <td class="text-center align-middle">'+value.toma_muestra_detalle_cantidad+'</td>';
                    html += '    <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_toma_biopsia('+value.id+');" ><i class="feather icon-x"></i></button></td>';
                    html += '</tr>';
                });

                $('#m_biopsia_go_table tbody').html(html);
            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_toma_biopsia(id)
    {
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();

        url = "{{ route('ficha_atencion.toma.muestra.eliminar') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token:CSRF_TOKEN,
                id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                id_paciente:id_paciente,
                id:id
            },
        })
        .done(function(data)
        {
            console.log(data);

            if(data.estado == 1)
            {
                ver_biopsias();
                swal({
                    title: "Eliminar Biopsia.",
                    text:"Biopsia Eliminada",
                    icon: "success",
                });
            }
            else
            {
                ver_biopsias();
                swal({
                    title: "Eliminar Biopsia.",
                    text:"Eliminacion de Biopsia con problema.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
