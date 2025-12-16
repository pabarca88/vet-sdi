<div id="hormona_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="hormona_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Antecedentes hormonales</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_3" class="text-primary" style="cursor: pointer;" onclick="abrir_div('hormona_modal_div');">Añadir antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="hormona_modal_div" style="display:none;">
                    <div class="col-sm-12 col-md-12">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="hormona_modal_fecha" id="hormona_modal_fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Motivo del examen</label>
                                    <select class="form-control form-control-sm" id="hormona_modal_motivo" name="hormona_modal_motivo">
                                        <option value="" selected>Seleccione...</option>
                                        <option value="Sospecha de transtorno hormonal" >Sospecha de transtorno hormonal</option>
                                        <option value="Infertilidad" >Infertilidad</option>
                                        <option value="Menopausia" >Menopausia</option>
                                        <option value="Alteración del Ciclo" >Alteración del Ciclo</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tipo de examen</label>
                                    <select class="form-control form-control-sm" id="hormona_modal_tipo_examen" name="hormona_modal_tipo_examen">
                                        <option value="" selected>Seleccione</option>
                                        <option value="Perfíl hormonal femenino" >Perfíl hormonal femenino</option>
                                        <option value="FSH" >FSH</option>
                                        <option value="LH" >LH</option>
                                        <option value="Estradiol" >Estradiol</option>
                                        <option value="Prolactina" >Prolactina</option>
                                        <option value="Progesterona" >Progesterona</option>
                                        <option value="Testosterona" >Testosterona</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Resultado</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="hormona_modal_resultado" id="hormona_modal_resultado"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tratamientos o comentarios</label>
                                    <textarea class="form-control caja-texto form-control-sm " rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="hormona_modal_otros_ant" id="hormona_modal_otros_ant"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-xl-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="registro_ant_ex_hormonales();">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="table-responsive">
                            <table id="hormona_modal_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Motivo</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        <th class="text-center align-middle">Resultados</th>
                                        <th class="text-center align-middle">Tratamientos</th>
                                    </tr>
                                </thead>
                                <tbody>

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

    function hormonas() {
        $('#hormona_modal_fecha').val('');
        $('#hormona_modal_motivo').val('');
        $('#hormona_modal_tipo_examen').val('');
        $('#hormona_modal_resultado').val('');
        $('#hormona_modal_otros_ant').val('');
        ver_ant_ex_hormonales();
        $('#hormona_modal').modal('show');
    }


    function registro_ant_ex_hormonales()
    {

        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let _token = CSRF_TOKEN;
        let fecha = $('#hormona_modal_fecha').val();
        let motivo = $('#hormona_modal_motivo').val();
        let tipo_examen = $('#hormona_modal_tipo_examen').val();
        let resultado = $('#hormona_modal_resultado').val();
        let otros_ant = $('#hormona_modal_otros_ant').val();

        let url = "{{ route('gine.obste.ant.ex.hormonas.agregar') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                id_ficha_gineco_obstetrica: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                fecha: fecha,
                motivo: motivo,
                tipo_examen: tipo_examen,
                resultado: resultado,
                otros_ant: otros_ant,
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
                    ver_ant_ex_hormonales();
                    $('#hormona_modal_fecha').val('');
                    $('#hormona_modal_motivo').val('');
                    $('#hormona_modal_tipo_examen').val('');
                    $('#hormona_modal_resultado').val('');
                    $('#hormona_modal_otros_ant').val('');
                }
                else
                {
                    swal({
                        title: "Ingreso de antecedente.",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                    ver_ant_ex_hormonales();
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

    function ver_ant_ex_hormonales()
    {
        let url = "{{ route('gine.obste.ant.ex.hormonas.ver') }}";
        let id_paciente = $('#id_paciente_fc').val();

        $('#hormona_modal_table tbody').html('');

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
                        html += '    <td class="text-center align-middle">'+value.motivo+'</td>';//Motivo //motivo
                        html += '    <td class="text-center align-middle">'+value.tipo_examen+'</td>';//Tipo //tipo_examen
                        html += '    <td class="text-center align-middle">'+value.resultado+'</td>';//Resultados //resultado
                        html += '    <td class="text-center align-middle">'+value.otros_ant+'</td>';//Tratamientos //otros_ant
                        html += '</tr>';
                    });

                }
                else
                {
                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="5">'+data.msj+'</td>';
                    html += '</tr>';
                }

                $('#hormona_modal_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }


</script>
