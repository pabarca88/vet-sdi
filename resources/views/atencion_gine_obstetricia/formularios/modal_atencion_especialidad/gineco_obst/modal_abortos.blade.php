<div id="abortos_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="abortos_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes Abortos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_6" onclick="abrir_div('abortos_modal_formulario_6');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="abortos_modal_formulario_6" style="display:none;">
                    <div class="col-md-12">
                        <div class="form-row">
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="abortos_modal_fecha_abort">Fecha Aborto</label>
                            <input type="date" class="form-control form-control-sm" name="abortos_modal_fecha_abort" id="abortos_modal_fecha_abort">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="abortos_modal_num_emb">N° de embarazo</label>
                            <input type="text" class="form-control form-control-sm" name="abortos_modal_num_emb" id="abortos_modal_num_emb">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="abortos_modal_causa">Causa</label>
                            <input type="text" class="form-control form-control-sm" name="abortos_modal_causa" id="abortos_modal_causa">
                        </div>
                        <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label class="floating-label-activo-sm" for="abortos_modal_tipo_aborto">Tipo de Aborto</label>
                            <input type="text" class="form-control form-control-sm" name="abortos_modal_tipo_aborto" id="abortos_modal_tipo_aborto">
                        </div>
                            <div class="form-group ol-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="abortos_modal_obs_tto_complic">Tratamientos o complicaciones</label>
                                <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="abortos_modal_obs_tto_complic" id="abortos_modal_obs_tto_complic"></textarea>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <button type="button" class="btn btn-info btn-sm btn-block" onclick="registro_ant_aborto();">Añadir</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table id="abortos_modal_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">N° de Aborto</th>
                                        <th class="text-center align-middle">Causa</th>
                                        <th class="text-center align-middle">Tipo de Aborto</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">violación</td>
                                        <td class="text-center align-middle">Profesional</td>
                                        <td class="text-center align-middle">ninguno</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Abortos_ant() {
        ver_ant_aborto();
        limpiar_ant_aborto();
        $('#abortos_modal').modal('show');
    }

    function registro_ant_aborto()
    {
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let _token = CSRF_TOKEN;
        let fecha_abort = $('#abortos_modal_fecha_abort').val();
        let num_emb = $('#abortos_modal_num_emb').val();
        let causa = $('#abortos_modal_causa').val();
        let tipo_aborto = $('#abortos_modal_tipo_aborto').val();
        let obs_tto_complic = $('#abortos_modal_obs_tto_complic').val();

        let url = "{{ route('gine.obste.ant.aborto.agregar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                id_ficha_gineco_obstetrica: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                fecha_abort: fecha_abort,
                num_emb: num_emb,
                causa: causa,
                tipo_aborto: tipo_aborto,
                obs_tto_complic: obs_tto_complic,
            },
        })
        .done(function(data) {
            console.log(data)
            if (data != null)
            {
                console.log(data)
                if(data.estado == '1'){
                    swal({
                        title: "Ingreso de antecedente.",
                        text: 'Examenes registrados con Exito.',
                        icon: "success",
                    });
                    ver_ant_aborto();
                    limpiar_ant_aborto();
                }
                else
                {
                    swal({
                        title: "Ingreso de antecedente.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                    ver_ant_aborto();
                }
            }
            else
            {
                swal({
                    title: "Ingreso de examen(es).",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_ant_aborto()
    {
        let url = "{{ route('gine.obste.ant.aborto.ver') }}";
        let id_paciente = $('#id_paciente_fc').val();

        $('#abortos_modal_table tbody').html('');

        $.ajax({
            url: url,
            type: "GET",
            data: {
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {
            if (data !== 'null')
            {
                var html = '';
                console.log(data);
                if(data.estado == 1)
                {
                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.fecha_abort).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.num_emb+'</td>';
                        html += '    <td class="text-center align-middle">'+value.causa+'</td>';
                        html += '    <td class="text-center align-middle">'+value.tipo_aborto+'</td>';
                        html += '    <td class="text-center align-middle">'+value.obs_tto_complic+'</td>';
                        html += '</tr>';
                    });

                }
                else
                {
                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="5">'+data.msj+'</td>';
                    html += '</tr>';
                }

                $('#abortos_modal_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function limpiar_ant_aborto()
    {
        $('#abortos_modal_fecha_abort').val('');
        $('#abortos_modal_num_emb').val('');
        $('#abortos_modal_causa').val('');
        $('#abortos_modal_tipo_aborto').val('');
        $('#abortos_modal_obs_tto_complic').val('');
    }

</script>
