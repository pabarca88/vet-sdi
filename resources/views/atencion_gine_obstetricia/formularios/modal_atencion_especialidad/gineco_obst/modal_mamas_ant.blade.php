<div id="mamas_ant_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mamas_ant_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes mamas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_3" class="text-primary" style="cursor: pointer;" onclick="abrir_div('formulario_mamas_ant_modal');">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_mamas_ant_modal" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="mamas_ant_modal_fecha">Fecha</label>
                                    <input type="date" max="{{ date('Y-m-d') }}" class="form-control form-control-sm" name="mamas_ant_modal_fecha" id="mamas_ant_modal_fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="mamas_ant_modal_tipo_examen">Tipo de examen</label>
                                    <input type="text" class="form-control form-control-sm" name="mamas_ant_modal_tipo_examen" id="mamas_ant_modal_tipo_examen">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="mamas_ant_modal_resultado">Resultado</label>
                                    <input type="text" class="form-control form-control-sm" name="mamas_ant_modal_resultado" id="mamas_ant_modal_resultado">
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm" for="mamas_ant_modal_indic">Indicaciones</label>
                                    <input type="text" class="form-control form-control-sm" name="mamas_ant_modal_indic" id="mamas_ant_modal_indic">
                                </div>
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm" for="mamas_ant_modal_tto_complicaciones">Tratamientos o complicaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="mamas_ant_modal_tto_complicaciones" id="mamas_ant_modal_tto_complicaciones"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_mamas_antecedentes();">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="mamas_ant_modal_hemorragias_dental" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Tipo de Examen</th>
                                        <th class="text-center align-middle">Resultado</th>
                                        <th class="text-center align-middle">Indicaciones</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones - otros</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">Mamografía</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Control Anual</td>
                                        <td class="text-center align-middle">No</td>
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
    function mamas_antecedentes()
    {
        ver_mamas_antecedentes();
        $('#mamas_ant_modal').modal('show');
    }

    function agregar_mamas_antecedentes()
    {
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        var _token = CSRF_TOKEN;

        let fecha = $('#mamas_ant_modal_fecha').val();
        let tipo_examen = $('#mamas_ant_modal_tipo_examen').val();
        let resultado = $('#mamas_ant_modal_resultado').val();
        let indic = $('#mamas_ant_modal_indic').val();
        let tto_complicaciones = $('#mamas_ant_modal_tto_complicaciones').val();
        var _token = CSRF_TOKEN;

        let url = '{{ route("gine.obste.antesedente.mamas.agregar") }}';
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_atencion,
                // id_lugar_atencion:id_lugar_atencion,
                id_paciente:id_paciente,
                id_profesional:id_profesional,
                fecha:fecha,
                tipo_examen:tipo_examen,
                resultado:resultado,
                indic:indic,
                tto_complicaciones:tto_complicaciones,
                _token:_token,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == '1')
                {
                    swal({
                        title: "Ingreso de antecedente de mamas.",
                        text: 'Antecedente registrado con Exito.',
                        icon: "success"
                    });
                    $('#mamas_ant_modal').modal('hide');
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
                        mensaje += 'Falla en el registro, Intente nuevamente.';
                    }

                    swal({
                        title: "Ingreso de antecedente de mamas.",
                        text: mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        DangerMode: true,
                    });
                }
            }
            else
            {
                swal({
                    title: "Ingreso de antecedente de mamas.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error"
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_mamas_antecedentes()
    {
        let id_paciente = $('#id_paciente_fc').val();

        $('#mamas_ant_modal_hemorragias_dental tbody').html('');

        let url = '{{ route("gine.obste.antesedente.mamas.ver") }}';
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_paciente : id_paciente,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == '1')
                {
                    $('#mamas_ant_modal_hemorragias_dental tbody').html('');
                    $.each(data.registros, function (index, value)
                    {
                        var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html = '';
                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.tipo_examen+'</td>';
                        html += '    <td class="text-center align-middle">'+value.resultado+'</td>';
                        html += '    <td class="text-center align-middle">'+value.indic+'</td>';
                        html += '    <td class="text-center align-middle">'+value.tto_complicaciones+'</td>';
                        html += '</tr>';

                        $('#mamas_ant_modal_hemorragias_dental tbody').append(html);

                    });
                }
                else
                {
                    $('#mamas_ant_modal_hemorragias_dental tbody').html('<tr><td colspan="5">Sin registros</td></tr>');
                }
            }
            else
            {
                $('#mamas_ant_modal_hemorragias_dental tbody').html('<tr><td colspan="5">Sin registros</td></tr>');
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
</script>
