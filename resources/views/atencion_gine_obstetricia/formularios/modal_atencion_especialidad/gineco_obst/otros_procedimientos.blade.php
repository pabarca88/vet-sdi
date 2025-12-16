<div id="m_otros_proce" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_otros_proce" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Otros Procedimientos Gineco-Obstetricia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_4" onclick="abrir_div('div_m_otros_proce');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="div_m_otros_proce" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm" for="m_otros_proce_procedimiento">Nombre Procedimiento</label>
                                    <input type="text" class="form-control form-control-sm" name="m_otros_proce_procedimiento" id="m_otros_proce_procedimiento"/>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="floating-label-activo-sm" for="m_otros_proce_desc_procedimiento">Descripción Procedimiento</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="m_otros_proce_desc_procedimiento" id="m_otros_proce_desc_procedimiento"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_otro_proc();">Añadir Procedimiento</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <hr>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="media-body">
                                        <h5 class="mb-0">Procedimientos</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="m_otros_proce_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle">Fecha Registro</th>
                                                <th class="text-center align-middle">Procedimiento</th>
                                                <th class="text-center align-middle">Descripción</th>
                                                <th class="text-center align-middle">Acción</th>
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
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function otros_proc() {
        $('#m_otros_proce').modal('show');
        ver_otro_proc();
        limpiar_form_otros_proc();
    }

    function agregar_otro_proc()
    {
        var id_ficha_atencion = '';
        var id_ficha_otros_prof = '';
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var procedimiento = $('#m_otros_proce_procedimiento').val();
        var desc_procedimiento = $('#m_otros_proce_desc_procedimiento').val();
        var valido = 1;
        var mensaje = '';

        if( procedimiento == '')
        {
            mensaje += 'Procedimiento campo requerido.\n';
            valido = 0;
        }
        if( desc_procedimiento == '')
        {
            mensaje += 'Descripción campo requerido.\n';
            valido = 0;
        }

        if(valido == 1)
        {
            url = "{{ route('gine.otros.procedimiento.registrar') }}";
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _token:CSRF_TOKEN,
                    id_ficha_atencion:id_ficha_atencion,
                    id_ficha_otros_prof:id_ficha_otros_prof,
                    id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                    id_paciente:id_paciente,
                    id_profesional:id_profesional,
                    procedimiento:procedimiento,
                    desc_procedimiento:desc_procedimiento,
                },
            })
            .done(function(data)
            {
                if(data.estado == 1)
                {
                    swal({
                        title: "Registro de Otro Procedimiento.",
                        text: "Otro Procedimiento registrada con exito",
                        icon: "success",
                    });
                    limpiar_form_otros_proc();
                    ver_otro_proc();
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
                        title: "Registro de Otro Procedimiento",
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
                title: "Registro de Otro Procedimiento",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                DangerMode: true,
            });
        }
    }

    function ver_otro_proc()
    {
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        $('#m_otros_proce_table tbody').html('');

        url = "{{ route('gine.otros.procedimiento.ver') }}";
        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_gineco_obstetrica,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {
            if(data.estado == 1)
            {
                $.each(data.registros, function (key, value)
                {
                    var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                    var fecha = new Date(f_temp);
                    fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();
                    var html = '';
                    html += '<tr>';
                    html += '    <td class="text-center align-middle">'+fecha+'</td>';
                    html += '    <td class="text-center align-middle">'+value.procedimiento+'</td>';
                    html += '    <td class="text-center align-middle">'+( (value.desc_procedimiento==null)?'':value.desc_procedimiento )+'</td>';
                    html += '    <td class="text-center align-middle"><button type="button" class="btn btn-danger btn-sm btn-icon" onclick="eliminar_otro_proc('+value.id+');" ><i class="feather icon-x"></i></button></td>';
                    html += '</tr>';
                    $('#m_otros_proce_table tbody').append(html);
                });

            }
            else
            {

            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function limpiar_form_otros_proc()
    {
        $('#m_otros_proce_procedimiento').val('');
        $('#m_otros_proce_desc_procedimiento').val('');
    }

    function eliminar_otro_proc(id)
    {
        //
        var id_ficha_gineco_obstetrica = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();

        url = "{{ route('gine.otros.procedimiento.eliminar') }}";
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
                ver_otro_proc();
                swal({
                    title: "Eliminar Otro Prcedimiento.",
                    text: "Otro Prcedimiento Eliminado.",
                    icon: "success",
                });
            }
            else
            {
                ver_otro_proc();
                swal({
                    title: "Eliminar Otro Prcedimiento.",
                    text: "Eliminacion de Otro Prcedimiento con problema.",
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
