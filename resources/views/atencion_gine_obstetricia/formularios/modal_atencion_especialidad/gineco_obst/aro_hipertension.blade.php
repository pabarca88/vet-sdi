<div id="modal_aro_ht" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_aro_ht" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Control De Patología Hipertensiva en el Embarazo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="nav-link-modal" onclick="abrir_div('modal_aro_ht_grafico');">Grafica</button>
                    </div>
                </div>
                <div class="row" id="modal_aro_ht_grafico" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h5>Evolución Pulso y Presión Arterial</h5>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="{{ asset('images\grafico.png') }}" style="width:100%">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_8" onclick="abrir_div('modal_aro_ht_div');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="modal_aro_ht_div" style="display:none;">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm"for="modal_aro_ht_pulso" >Pulso</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_pulso" id="modal_aro_ht_pulso">
                            </div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm" for="modal_aro_ht_sistolica">Sistolica</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_sistolica" id="modal_aro_ht_sistolica">
                            </div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm" for="modal_aro_ht_diastolica">Distolica</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_diastolica" id="modal_aro_ht_diastolica">
                            </div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm" for="modal_aro_ht_ideal">Ideal</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_ideal" id="modal_aro_ht_ideal">
                            </div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm" for="modal_aro_ht_medicamento">Medicamentos</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_medicamento" id="modal_aro_ht_medicamento">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                <label class="floating-label-activo-sm" for="modal_aro_ht_sintomas">Sintomatología</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_ht_sintomas" id="modal_aro_ht_sintomas">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group col-sm-4">
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_aro_hipertension();">Añadir</button>
                        </div>
                    </div>

                </div>
                <hr>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="c_hip">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="ant_prog" role="tabpanel" aria-labelledby="ant_prog_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5> Controles anteriores</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table id="modal_aro_ht_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Control</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Control Pulso</th>
                                                        <th class="text-center align-middle">Presión Sistólica</th>
                                                        <th class="text-center align-middle">Presión Diastólica</th>
                                                        <th class="text-center align-middle">Presión Ideal</th>
                                                        <th class="text-center align-middle">Medicación</th>
                                                        <th class="text-center align-middle">Sintomas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                        <td class="text-center align-middle"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TAB 2  -->

                            <!--TAB 3  -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Aro_hipertension() {
        $('#modal_aro_ht').modal('show');
        $('#modal_aro_ht_pulso').val('');
        $('#modal_aro_ht_sistolica').val('');
        $('#modal_aro_ht_diastolica').val('');
        $('#modal_aro_ht_ideal').val('');
        $('#modal_aro_ht_medicamento').val('');
        $('#modal_aro_ht_sintomas').val('');
        ver_aro_hipertension()
    }

    function agregar_aro_hipertension()
    {
        let pulso = $('#modal_aro_ht_pulso').val();
        let sistolica = $('#modal_aro_ht_sistolica').val();
        let diastolica = $('#modal_aro_ht_diastolica').val();
        let ideal = $('#modal_aro_ht_ideal').val();
        let medicamento = $('#modal_aro_ht_medicamento').val();
        let sintomas = $('#modal_aro_ht_sintomas').val();
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        var validar = 0;
        var mensaje ='';

        if( pulso == '' )
        {
            $('#modal_aro_ht_pulso').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( sistolica == '' )
        {
            $('#modal_aro_ht_sistolica').focus();
            mensaje += 'Debe ingresar el Presión Sistólica.\n';
            validar = 1;
        }
        if( diastolica == '' )
        {
            $('#modal_aro_ht_diastolica').focus();
            mensaje += 'Debe ingresar el Presión Diastólica.\n';
            validar = 1;
        }
        if( ideal == '' )
        {
            $('#modal_aro_ht_ideal').focus();
            mensaje += 'Debe ingresar el Presión Ideal.\n';
            validar = 1;
        }

        if(validar == 1)
        {
            swal({
                title: "Debe ingresar todos los datos requeridos." ,
                text: mensaje,
                icon: "error"
            })
            return false;
        }
        else
        {
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";

            var datos = {};
            datos.hora_medica = hora_medica;
            datos.sistolica = sistolica;
            datos.diastolica = diastolica;
            datos.ideal = ideal;
            datos.pulso = pulso;
            datos.medicamento = medicamento;
            datos.sintomas = sintomas;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: "json",
                data: datos,
                success: function(data) {
                    console.log(data);
                    if (data != 'error')
                    {
                        var mensaje = '';
                        mensaje = 'Registro realizado con exito.\n';

                        swal({
                            title: "Control Hipertensiva en el Embarazo",
                            text: mensaje,
                            icon: "success",
                        });

                        abrir_div('modal_aro_ht_div');
                        $('#modal_aro_ht_pulso').val('');
                        $('#modal_aro_ht_sistolica').val('');
                        $('#modal_aro_ht_diastolica').val('');
                        $('#modal_aro_ht_ideal').val('');
                        $('#modal_aro_ht_medicamento').val('');
                        $('#modal_aro_ht_sintomas').val('');
                        ver_aro_hipertension();
                    }
                    else
                    {
                        var texto_error = '';

                        if(data.estado ==  0)
                        {
                            if('error' in data)
                            {
                                $.each(data.error, function (indexInArray, valueOfElement) {
                                    texto_error += indexInArray+': '+valueOfElement+'\n';
                                });
                            }
                        }
                        swal({
                            title: "Control Hipertensiva en el Embarazo",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });

                        ver_aro_hipertension();
                    }
                }
            });
        }

    }

    function ver_aro_hipertension()
    {
        let url = "{{ route('hipertension.getHipertension') }}";

        var _token = CSRF_TOKEN;
        var id_paciente = $('#id_paciente_fc').val();
        $('#modal_aro_ht_table tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_paciente:id_paciente
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------ver_modal_aro_ht_table-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';
                if(data.estado == 1)
                {

                    $.each(data.registros, function(index, value)
                    {
                        var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();
                        html += '<tr>';
                        html += '   <td class="text-center align-middle">'+(index+1)+'</td>';//Nº Control
                        html += '   <td class="text-center align-middle">'+fecha+'</td>';//Fecha
                        html += '   <td class="text-center align-middle">'+((value.pulso!=null)?value.pulso:'')+'</td>';//Control Pulso
                        html += '   <td class="text-center align-middle">'+value.sistolica+'</td>';//Presión Sistólica
                        html += '   <td class="text-center align-middle">'+value.diastolica+'</td>';//Presión Diastólica
                        html += '   <td class="text-center align-middle">'+value.ideal+'</td>';//Presión Ideal
                        html += '   <td class="text-center align-middle">'+((value.medicamento!=null)?value.medicamento:'')+'</td>';//Medicación
                        html += '   <td class="text-center align-middle">'+((value.sintomas!=null)?value.sintomas:'')+'</td>';//Sintomas
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="8">SIN REGISTROS</td>';
                    html += '</tr>';

                }

                $('#modal_aro_ht_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
