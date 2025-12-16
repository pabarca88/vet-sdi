<div id="modal_aro_glicemia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_aro_glicemia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Control De Patología del Metabolismo de la glucosa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="nav-link-modal" onclick="abrir_div('modal_aro_glicemia_grafico');">Grafica</button>
                    </div>
                </div>
                <div class="row" id="modal_aro_glicemia_grafico" style="display: none;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h5>Evolución Glicemia Peso Tamaño Fetal</h5>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <img src="{{ asset('images\grafico.png') }}" style="width:100%">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_8" onclick="abrir_div('modal_aro_glicemia_div');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="modal_aro_glicemia_div" style="display:none;">
                    <div class="col-md-12">
                        <div class="form-row">
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Peso</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_peso_diabetes" id="modal_aro_glicemia_peso_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Piés</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_pies_diabetes" id="modal_aro_glicemia_pies_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Hg A1c</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_hga1c_diabetes" id="modal_aro_glicemia_hga1c_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Creatina</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_creatina_diabetes" id="modal_aro_glicemia_creatina_diabetes">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Glucosuria</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_glucosuria_diabetes" id="modal_aro_glicemia_glucosuria_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Glicosilada postprandial</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_glicosilada_postprandial_diabetes" id="modal_aro_glicemia_glicosilada_postprandial_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Glicosilada ayuno</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_glicosilada_ayuno_diabetes" id="modal_aro_glicemia_glicosilada_ayuno_diabetes">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label-activo-sm">Tamaño Fetal</label>
                                <input type="text" class="form-control form-control-sm" name="modal_aro_glicemia_tamano_fetal_diabetes" id="modal_aro_glicemia_tamano_fetal_diabetes">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-sm-6 col-md-6">
                                <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_aro_glucosa();">Añadir</button>
                            </div>
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
                                            <table id="modal_aro_glicemia_table" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Nº Control</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Peso</th>
                                                        <th class="text-center align-middle">Piés</th>
                                                        <th class="text-center align-middle">Hg A1c</th>
                                                        <th class="text-center align-middle">Creatina</th>
                                                        <th class="text-center align-middle">Glucosuria</th>
                                                        <th class="text-center align-middle">Glicosilada ayuno</th>
                                                        <th class="text-center align-middle">Glicosilada postprandial</th>
                                                        <th class="text-center align-middle">Tamaño Fetal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">Nº Control</td>
                                                        <td class="text-center align-middle">Fecha</td>
                                                        <td class="text-center align-middle">Peso</td>
                                                        <td class="text-center align-middle">Piés</td>
                                                        <td class="text-center align-middle">Hg A1c</td>
                                                        <td class="text-center align-middle">Creatina</td>
                                                        <td class="text-center align-middle">Glucosuria</td>
                                                        <td class="text-center align-middle">Glicosilada ayuno</td>
                                                        <td class="text-center align-middle">Glicosilada postprandial</td>
                                                        <td class="text-center align-middle">Tamaño Fetal</td>
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
            </div>
        </div>
    </div>
</div>
<script>
    function Aro_glucosa() {
        ver_aro_glucosa();
        $('#modal_aro_glicemia_peso_diabetes').val('');
        $('#modal_aro_glicemia_pies_diabetes').val('');
        $('#modal_aro_glicemia_hga1c_diabetes').val('');
        $('#modal_aro_glicemia_creatina_diabetes').val('');
        $('#modal_aro_glicemia_glucosuria_diabetes').val('');
        $('#modal_aro_glicemia_glicosilada_postprandial_diabetes').val('');
        $('#modal_aro_glicemia_glicosilada_ayuno_diabetes').val('');
        $('#modal_aro_glicemia_tamano_fetal_diabetes').val('');
        $('#modal_aro_glicemia').modal('show');
    }

    function agregar_aro_glucosa()
    {
        let peso_diabetes = $('#modal_aro_glicemia_peso_diabetes').val();
        let pies_diabetes = $('#modal_aro_glicemia_pies_diabetes').val();
        let hga1c_diabetes = $('#modal_aro_glicemia_hga1c_diabetes').val();
        // let colesterol_diabetes = $('#modal_aro_glicemia_colesterol_diabetes').val();
        let creatina_diabetes = $('#modal_aro_glicemia_creatina_diabetes').val();
        let glucosuria_diabetes = $('#modal_aro_glicemia_glucosuria_diabetes').val();
        let glicosilada_postprandial_diabetes = $('#modal_aro_glicemia_glicosilada_postprandial_diabetes').val();
        let glicosilada_ayuno_diabetes = $('#modal_aro_glicemia_glicosilada_ayuno_diabetes').val();
        let tamano_fetal_diabetes = $('#modal_aro_glicemia_tamano_fetal_diabetes').val();
        let hora_medica = $('#hora_medica').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();

        var validar = 0;
        var mensaje ='';

        if( peso_diabetes == '' )
        {
            $('#modal_aro_glicemia_peso_diabetes').focus();
            mensaje += 'Debe ingresar el Peso\n';
            validar = 1;
        }
        if( pies_diabetes == '' )
        {
            $('#modal_aro_glicemia_pies_diabetes').focus();
            mensaje += 'Debe ingresar el Piés\n';
            validar = 1;
        }
        if( hga1c_diabetes == '' )
        {
            $('#modal_aro_glicemia_hga1c_diabetes').focus();
            mensaje += 'Debe ingresar el Hg A1c\n';
            validar = 1;
        }
        // if( colesterol_diabetes == '' )
        // {
        //     $('#modal_aro_glicemia_colesterol_diabetes').focus();
        //     mensaje += 'Debe ingresar el Colesterol\n';
        //     validar = 1;
        // }
        if( glucosuria_diabetes == '' )
        {
            $('#modal_aro_glicemia_glucosuria_diabetes').focus();
            mensaje += 'Debe ingresar el Glucosuria\n';
            validar = 1;
        }
        if( creatina_diabetes == '' )
        {
            $('#modal_aro_glicemia_creatina_diabetes').focus();
            mensaje += 'Debe ingresar el Creatina\n';
            validar = 1;
        }
        if( glicosilada_postprandial_diabetes == '' )
        {
            $('#modal_aro_glicemia_glicosilada_postprandial_diabetes').focus();
            mensaje += 'Debe ingresar el Glicosilada Postprandial\n';
            validar = 1;
        }
        if( glicosilada_ayuno_diabetes == '' )
        {
            $('#modal_aro_glicemia_glicosilada_ayuno_diabetes').focus();
            mensaje += 'Debe ingresar el Glicosilada Ayuno\n';
            validar = 1;
        }
        if( tamano_fetal_diabetes == '' )
        {
            $('#modal_aro_glicemia_tamano_fetal_diabetes').focus();
            mensaje += 'Debe ingresar el Tamaño Fetal\n';
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
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";

            var datos = {};
            datos.hora_medica = hora_medica;
            datos.peso = peso_diabetes;
            datos.pies = pies_diabetes;
            datos.hga1c = hga1c_diabetes;
            // datos.colesterol = colesterol_diabetes;
            datos.glucosuria = glucosuria_diabetes;
            datos.creatina = creatina_diabetes;
            datos.glicosilada_postprandial = glicosilada_postprandial_diabetes;
            datos.glicosilada_ayuno = glicosilada_ayuno_diabetes;
            datos.tamano_fetal = tamano_fetal_diabetes;

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
                            title: "Control De Patología del Metabolismo de la glucosa",
                            text: mensaje,
                            icon: "success",
                        });

                        abrir_div('modal_aro_glicemia_div');
                        $('#modal_aro_glicemia_peso_diabetes').val('');
                        $('#modal_aro_glicemia_pies_diabetes').val('');
                        $('#modal_aro_glicemia_hga1c_diabetes').val('');
                        // $('#modal_aro_glicemia_colesterol_diabetes').val('');
                        $('#modal_aro_glicemia_creatina_diabetes').val('');
                        $('#modal_aro_glicemia_glucosuria_diabetes').val('');
                        $('#modal_aro_glicemia_glicosilada_postprandial_diabetes').val('');
                        $('#modal_aro_glicemia_glicosilada_ayuno_diabetes').val('');
                        $('#modal_aro_glicemia_tamano_fetal_diabetes').val('');
                        ver_aro_glucosa();
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
                            title: "Control De Patología del Metabolismo de la glucosa",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });

                        ver_aro_glucosa();
                    }
                }
            });
        }

    }

    function ver_aro_glucosa()
    {
        let url = "{{ route('ficha_medica.diabetes.getDiabete') }}";
        var id_paciente = $('#id_paciente_fc').val();
        $('#modal_aro_glicemia_table tbody').html('');

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
                //data = JSON.parse(data);
                console.log('----------ver_aro_glucosa-------------');
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
                        html += '   <td class="text-center align-middle">'+(index+1)+'</td>'; //Nº Control
                        html += '   <td class="text-center align-middle">'+fecha+'</td>'; //Fecha
                        html += '   <td class="text-center align-middle">'+((value.peso!=null)?value.peso:'')+'</td>'; //Peso
                        html += '   <td class="text-center align-middle">'+((value.pies!=null)?value.pies:'')+'</td>'; //Piés
                        html += '   <td class="text-center align-middle">'+((value.hga1c!=null)?value.hga1c:'')+'</td>'; //Hg A1c
                        html += '   <td class="text-center align-middle">'+((value.creatina!=null)?value.creatina:'')+'</td>'; //Creatina
                        html += '   <td class="text-center align-middle">'+((value.glucosuria!=null)?value.glucosuria:'')+'</td>'; //Glucosuria
                        html += '   <td class="text-center align-middle">'+((value.glicosilada_ayuno!=null)?value.glicosilada_ayuno:'')+'</td>'; //Glicosilada ayuno
                        html += '   <td class="text-center align-middle">'+((value.glicosilada_postprandial!=null)?value.glicosilada_postprandial:'')+'</td>'; //Glicosilada postprandial
                        html += '   <td class="text-center align-middle">'+((value.tamano_fetal!=null)?value.tamano_fetal:'')+'</td>'; //Tamaño Fetal
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr>';
                    html += '    <td class="text-center align-middle" colspan="8">SIN REGISTROS</td>';
                    html += '</tr>';

                }

                $('#modal_aro_glicemia_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

</script>
