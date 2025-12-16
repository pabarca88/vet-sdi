<div id="embarazos_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="embarazos_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes embarazo y puerperio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_6" onclick="abrir_div('embarazos_modal_div');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="embarazos_modal_div" style="display:none;">
                    <form>
                        <div class="col-md-12">
                            <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="embarazos_modal_fecha">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="embarazos_modal_fecha" id="embarazos_modal_fecha">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="embarazos_modal_num_emb">N° de embarazo</label>
                                <input type="number" min="0" class="form-control form-control-sm" name="embarazos_modal_num_emb" id="embarazos_modal_num_emb">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="embarazos_modal_control_emb">Control</label>
                                <input type="text" class="form-control form-control-sm" name="embarazos_modal_control_emb" id="embarazos_modal_control_emb">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm"for="embarazos_modal_tipo_parto" >Tipo de parto</label>
                                <input type="text" class="form-control form-control-sm" name="embarazos_modal_tipo_parto" id="embarazos_modal_tipo_parto">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="embarazos_modal_puerperio">Puerperio</label>
                                <input type="text" class="form-control form-control-sm" name="embarazos_modal_puerperio" id="embarazos_modal_puerperio">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="embarazos_modal_recien_nacido">Recién nacido</label>
                                <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="embarazos_modal_recien_nacido" id="embarazos_modal_recien_nacido"></textarea>
                            </div>
                                <div class="form-group ol-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="floating-label-activo-sm"for="embarazos_modal_tto_complicaciones" >Tratamientos o complicaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="embarazos_modal_tto_complicaciones" id="embarazos_modal_tto_complicaciones"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="registro_ant_emb_puerperio();">Añadir</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table id="embarazos_modal_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">N° de Embarazo</th>
                                        <th class="text-center align-middle">Control</th>
                                        <th class="text-center align-middle">Tipo de Parto</th>
                                        <th class="text-center align-middle">Puerperio</th>
                                        <th class="text-center align-middle">R-N</th>
                                        <th class="text-center align-middle">Tratamientos complicaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">00/00/0000</td>
                                        <td class="text-center align-middle">1</td>
                                        <td class="text-center align-middle">Controlado</td>
                                        <td class="text-center align-middle">Vaginal</td>
                                        <td class="text-center align-middle">Normal</td>
                                        <td class="text-center align-middle">Sano <br>3000 gr</td>
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
    function embarazos() {
        $('#embarazos_modal_fecha').val('');
        $('#embarazos_modal_num_emb').val('');
        $('#embarazos_modal_control_emb').val('');
        $('#embarazos_modal_tipo_parto').val('');
        $('#embarazos_modal_puerperio').val('');
        $('#embarazos_modal_recien_nacido').val('');
        $('#embarazos_modal_tto_complicaciones').val('');
        ver_ant_emb_puerperio();
        $('#embarazos_modal').modal('show');
    }

    function registro_ant_emb_puerperio()
    {

        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let _token = CSRF_TOKEN;
        let fecha = $('#embarazos_modal_fecha').val();
        let num_emb = $('#embarazos_modal_num_emb').val();
        let control_emb = $('#embarazos_modal_control_emb').val();
        let tipo_parto = $('#embarazos_modal_tipo_parto').val();
        let puerperio = $('#embarazos_modal_puerperio').val();
        let recien_nacido = $('#embarazos_modal_recien_nacido').val();
        let tto_complicaciones = $('#embarazos_modal_tto_complicaciones').val();

        let url = "{{ route('gine.obste.ant.parto.puerperio.agregar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                id_ficha_gineco_obstetrica: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                fecha: fecha,
                num_emb: num_emb,
                control_emb: control_emb,
                tipo_parto: tipo_parto,
                puerperio: puerperio,
                recien_nacido: recien_nacido,
                tto_complicaciones: tto_complicaciones,
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
                    ver_ant_emb_puerperio();
                    $('#embarazos_modal_fecha').val('');
                    $('#embarazos_modal_num_emb').val('');
                    $('#embarazos_modal_control_emb').val('');
                    $('#embarazos_modal_tipo_parto').val('');
                    $('#embarazos_modal_puerperio').val('');
                    $('#embarazos_modal_recien_nacido').val('');
                    $('#embarazos_modal_tto_complicaciones').val('');
                }
                else
                {
                    swal({
                        title: "Ingreso de antecedente.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                    ver_ant_emb_puerperio();
                }
            }
            else
            {
                swal({
                    title: "Ingreso de antecedente.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error",
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function ver_ant_emb_puerperio()
    {
        let url = "{{ route('gine.obste.ant.parto.puerperio.ver') }}";
        let id_paciente = $('#id_paciente_fc').val();

        $('#embarazos_modal_table tbody').html('');

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
                        var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        html += '<tr>';
                        html += '    <td class="text-center align-middle">'+fecha+'</td>';//Fecha //fecha
                        html += '    <td class="text-center align-middle">'+value.num_emb+'</td>';//N° de Embarazo //num_emb
                        html += '    <td class="text-center align-middle">'+value.control_emb+'</td>';//Control //control_emb
                        html += '    <td class="text-center align-middle">'+value.tipo_parto+'</td>';//Tipo de Parto //tipo_parto
                        html += '    <td class="text-center align-middle">'+value.puerperio+'</td>';//Puerperio //puerperio
                        html += '    <td class="text-center align-middle">'+value.recien_nacido+'</td>';//R-N //recien_nacido
                        html += '    <td class="text-center align-middle">'+value.tto_complicaciones+'</td>';//Tratamientos complicaciones //tto_complicaciones
                        html += '</tr>';
                    });

                }
                else
                {
                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="7">'+data.msj+'</td>';
                    html += '</tr>';
                }

                $('#embarazos_modal_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }



</script>
