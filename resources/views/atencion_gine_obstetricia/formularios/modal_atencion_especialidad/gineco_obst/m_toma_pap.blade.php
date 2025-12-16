<div id="m_toma_pap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_toma_pap" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Toma de PAP</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <div class="form-control form-control-sm">PAP</div>
                            <input type="hidden" name="m_toma_pap_id_tipo_toma" id="m_toma_pap_id_tipo_toma" value="2">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Sospecha</label>
                            <input type="text" class="form-control form-control-sm" name="m_toma_pap_sospecha" id="m_toma_pap_sospecha" value="">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group fill">
                            <label class="floating-label">Patólogo o Laboratorio</label>
                            <input type="text" class="form-control form-control-sm" name="m_toma_pap_patologo_lab" id="m_toma_pap_patologo_lab" value="">
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="m_toma_pap_prioridad" name="m_toma_pap_prioridad">
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
                    {{-- <div class="col-12">
                        Agregar muestra <button type="button" class="btn btn-outline-success btn-xs agregar_muestra" onclick="add_form_toma_pap();">+</button>
                    </div> --}}
                    <div class="col-12 lista_muestras_toma_pap">
                        <div class="row toma_pap_item toma_pap_item_1">
                            <div class="col-sm-4">
                                <div class="form-group fill">
                                    <label class="label">Lamina 1</label>
                                    <input type="hidden"  name="m_toma_pap_id_tipo_embase_1" id="m_toma_pap_id_tipo_embase_1" value="1"/>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group fill">
                                    <label class="floating-label">Zona 1 de toma de muestra</label>
                                    <input type="text" class="form-control form-control-sm" name="m_toma_pap_observacion_1" id="m_toma_pap_observacion_1" value="">
                                </div>
                            </div>
                            {{-- <div class="col-sm-2">
                                <button type="button" class="btn btn-danger float-right " onclick="eliminarFilaTomaPap(1)"><i class="fa fa-trash-o"></i></button>
                            </div> --}}
                        </div>
                    </div>

                </div>

                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group fill">
                            <label class="floating-label">Observaciones</label>
                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="m_toma_pap_obs_general" id="m_toma_pap_obs_general"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-success btn-sm float-right" onclick="registrar_toma_pap();">
                        <i class="fa fa-plus"></i> Agregar examen</button>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-xs" id="m_toma_pap_table">
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
                                    {{--  --}}
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
    function toma_pap() {
        $('#m_toma_pap').modal('show');
        ver_toma_pap();
        limpiar_form_toma_pap();
    }

    function add_form_toma_pap()
    {
        var cant = $('.toma_pap_item').length + 1;
        var html = '';
        html += '<div class="row toma_pap_item toma_pap_item_'+cant+'">';
        html += '    <div class="col-sm-3">';
        html += '        <div class="form-group fill">';
        html += '            <label class="label">Frasco '+cant+'</label>';
        html += '            <input type="hidden"  name="m_toma_pap_id_tipo_embase_'+cant+'" id="m_toma_pap_id_tipo_embase_'+cant+'" value="1"/>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-7">';
        html += '        <div class="form-group fill">';
        html += '            <label class="floating-label">Zona '+cant+' de toma de muestra</label>';
        html += '            <input type="text" class="form-control form-control-sm" name="m_toma_pap_observacion_'+cant+'" id="m_toma_pap_observacion_'+cant+'" value="">';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-2">';
        html += '        <button type="button" class="btn btn-danger float-right " onclick="eliminarFilaTomaPap('+cant+')"><i class="fa fa-trash-o"></i></button>';
        html += '    </div>';
        html += '</div>';


        $('.lista_muestras_toma_pap').append(html);

    }

    function eliminarFilaTomaPap(id)
    {
        $('.toma_pap_item_'+id).remove();
    }

    function registrar_toma_pap()
    {
        var id_tipo_toma = $('#m_toma_pap_id_tipo_toma').val();
        var id_ficha_atencion = '';
        var id_ficha_otros_prof = '';
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var patologo_lab = $('#m_toma_pap_patologo_lab').val();
        var sospecha = $('#m_toma_pap_sospecha').val();
        var prioridad = $('#m_toma_pap_prioridad').val();
        var observacion = $('#m_toma_pap_obs_general').val();
        var detalle = [];
        var valido = 1;
        var mensaje = '';
        $.each($('.toma_pap_item'), function (indexInArray, valueOfElement) {
            if( $(valueOfElement).find('#m_toma_pap_observacion_'+(indexInArray+1)).val() != '' )
            {
                detalle[indexInArray] = {
                    id_tipo_embase : $(valueOfElement).find('#m_toma_pap_id_tipo_embase_'+(indexInArray+1)).val(),
                    observacion : $(valueOfElement).find('#m_toma_pap_observacion_'+(indexInArray+1)).val()
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
                        title: "Registro de Toma PAP.",
                        text: "Toma PAP registrada con exito",
                        icon: "success",
                    });
                    limpiar_form_toma_pap();
                    ver_toma_pap();
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
                        title: "Registro de Toma PAP",
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
                title: "Registro de Toma PAP",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function limpiar_form_toma_pap()
    {

        $('#m_toma_pap_patologo_lab').val('');
        $('#m_toma_pap_sospecha').val('');
        $('#m_toma_pap_prioridad').val(2);
        $('#m_toma_pap_obs_general').val('');
        $('.lista_muestras_toma_pap').html('');

        var cant = 1;
        var html = '';
        html += '<div class="row toma_pap_item toma_pap_item_'+cant+'">';
        html += '    <div class="col-sm-4">';
        html += '        <div class="form-group fill">';
        html += '            <label class="label">Lamina '+cant+'</label>';
        html += '            <input type="hidden"  name="m_toma_pap_id_tipo_embase_'+cant+'" id="m_toma_pap_id_tipo_embase_'+cant+'" value="2"/>';
        html += '        </div>';
        html += '    </div>';
        html += '    <div class="col-sm-8">';
        html += '        <div class="form-group fill">';
        html += '            <label class="floating-label">Zona '+cant+' de toma de muestra</label>';
        html += '            <input type="text" class="form-control form-control-sm" name="m_toma_pap_observacion_'+cant+'" id="m_toma_pap_observacion_'+cant+'" value="">';
        html += '        </div>';
        html += '    </div>';
        // html += '    <div class="col-sm-2">';
        // html += '        <button type="button" class="btn btn-danger float-right " onclick="eliminarFilaTomaPap('+cant+')"><i class="fa fa-trash-o"></i></button>';
        // html += '    </div>';
        html += '</div>';

        $('.lista_muestras_toma_pap').html(html);

    }

    function ver_toma_pap()
    {

        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        $('#m_toma_pap_table tbody').html('');

        url = "{{ route('ficha_atencion.toma.muestra.ver') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                id_paciente:id_paciente,
                id_tipo_toma:2
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
                    html += '    <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_toma_pap('+value.id+');" ><i class="feather icon-x"></i></button></td>';
                    html += '</tr>';
                });

                $('#m_toma_pap_table tbody').html(html);
            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function eliminar_toma_pap(id)
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
                ver_toma_pap();
                swal({
                    title: "Eliminar Toma PAP.",
                    text:"Toma PAP Eliminada",
                    icon: "success",
                });
            }
            else
            {
                ver_toma_pap();
                swal({
                    title: "Eliminar Toma PAP.",
                    text:"Eliminacion de Toma PAP con problema.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
