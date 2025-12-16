<div id="ciclo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ciclo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Antecedentes ciclo menstrual</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_1" class="text-primary" style="cursor: pointer;" onclick="abrir_div('formulario_1')">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="formulario_1" style="display:none;">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h5> Menarquia</h5>
                        <div class="form-row">
                            {{-- <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="ciclo_modal_fecha_actual" >Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="ciclo_modal_fecha_actual" id="ciclo_modal_fecha_actual">
                            </div> --}}
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm"for="ciclo_modal_edad_menarquia" >Edad</label>
                                <input type="text" class="form-control form-control-sm" name="ciclo_modal_edad_menarquia" id="ciclo_modal_edad_menarquia" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->age }}">
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="ciclo_modal_gr_tunner">Grado de Tunner</label>
                                {{-- <input type="text" class="form-control form-control-sm" name="ciclo_modal_gr_tunner" id="ciclo_modal_gr_tunner"> --}}
                                <select class="form-control form-control-sm" name="ciclo_modal_gr_tunner" id="ciclo_modal_gr_tunner">
                                    <option value="I" data-edad_biologica="Menor de 10 Años 6 Meses">I - Edad Bio.: Menor de 10 Años 6 Meses</option>
                                    <option value="II" data-edad_biologica="10 Años 6 Meses">II - Edad Bio.: 10 Años 6 Meses</option>
                                    <option value="III" data-edad_biologica="11 Años">III - Edad Bio.: 11 Años</option>
                                    <option value="IV" data-edad_biologica="12 Años (sin Menarquia)">IV - Edad Bio.: 12 Años (sin Menarquia)</option>
                                    <option value="V" data-edad_biologica="12 años y 8 meses o mayor">V - Edad Bio.: 12 años y 8 meses o mayor</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <label class="floating-label-activo-sm" for="ciclo_modal_fecha_comienzo">Fecha de comienzo</label>
                                <input type="date" class="form-control form-control-sm" name="ciclo_modal_fecha_comienzo" id="ciclo_modal_fecha_comienzo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="floating-label-activo-sm" for="ciclo_modal_comentarios_menarquia">Comentarios</label>
                                <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ciclo_modal_comentarios_menarquia" id="ciclo_modal_comentarios_menarquia"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h5> Ciclo Menstrual</h5>
                        <div class="form-row">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="ciclo_modal_fur">FUR</label>
                                <input type="date" class="form-control form-control-sm" name="ciclo_modal_fur" id="ciclo_modal_fur">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="ciclo_modal_tipo_ciclo">Tipo</label>
                                {{-- <input type="text" class="form-control form-control-sm" name="ciclo_modal_tipo_ciclo" id="ciclo_modal_tipo_ciclo"> --}}
                                <select class="form-control form-control-sm" name="ciclo_modal_tipo_ciclo" id="ciclo_modal_tipo_ciclo">
                                    <option value="Regular">Regular</option>
                                    <option value="Irregular">Irregular</option>
                                    <option value="Ausente">Ausente</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="ciclo_modal_frecuencia_ciclo">Frecuencia</label>
                                <input type="text" class="form-control form-control-sm" name="ciclo_modal_frecuencia_ciclo" id="ciclo_modal_frecuencia_ciclo">
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <label class="floating-label-activo-sm" for="ciclo_modal_sintomas_ciclo">Síntomas asociados</label>
                                <input type="text" class="form-control form-control-sm" name="ciclo_modal_sintomas_ciclo" id="ciclo_modal_sintomas_ciclo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <label class="floating-label-activo-sm" for="ciclo_modal_comentarios_ciclo">Comentarios</label>
                                <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ciclo_modal_comentarios_ciclo" id="ciclo_modal_comentarios_ciclo"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group col-sm-4">
                            <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_ex_ciclo();">Añadir</button>
                        </div>
                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="ciclo_menstrual" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal" id="ciclo_modal_menarquia_tab" data-toggle="pill" href="#ciclo_modal_menarquia" role="tab" aria-controls="ciclo_modal_menarquia" aria-selected="false">Menarquia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="ciclo_modal_ciclo_m_tab" data-toggle="pill" href="#ciclo_modal_ciclo_m" role="tab" aria-controls="ciclo_modal_ciclo_m" aria-selected="false">Ciclo</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="tab-content" id="c_menstrual">

                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="ciclo_modal_menarquia" role="tabpanel" aria-labelledby="ciclo_modal_menarquia_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5> Menarquia</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="ciclo_modal_table_menarquia" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Edad</th>
                                                        <th class="text-center align-middle">G de tunner</th>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">12 Años</td>
                                                        <td class="text-center align-middle">gIII</td>
                                                        <td class="text-center align-middle">12/05/2000</td>
                                                        <td class="text-center align-middle">Evolución Normal</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--TAB 2  -->
                            <div class="tab-pane fade" id="ciclo_modal_ciclo_m" role="tabpanel" aria-labelledby="ciclo_modal_ciclo_m_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <h5> Ciclo</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive">
                                            <table id="ciclo_modal_table_cliclo" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">FUR</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Frecuencia</th>
                                                        <th class="text-center align-middle">Sintomas Asociados</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">Irregular</td>
                                                        <td class="text-center align-middle">28/3</td>
                                                        <td class="text-center align-middle">Cefalea Irritabilidad</td>
                                                        <td class="text-center align-middle">Se inicia tratamiento</td>
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
    function ex_ciclo() {
        limpiar_formulario_ex_ciclo();
        ver_ex_ciclo();
        $('#ciclo_modal').modal('show');
    }

    function limpiar_formulario_ex_ciclo()
    {
        // $('#ciclo_modal_edad_menarquia').val();
        $('#ciclo_modal_gr_tunner').val('I');
        $('#ciclo_modal_fecha_comienzo').val('');
        $('#ciclo_modal_comentarios_menarquia').val('');
        $('#ciclo_modal_fur').val('');
        $('#ciclo_modal_tipo_ciclo').val('Regular');
        $('#ciclo_modal_frecuencia_ciclo').val('');
        $('#ciclo_modal_sintomas_ciclo').val('');
        $('#ciclo_modal_comentarios_ciclo').val('');

    }

    function agregar_ex_ciclo()
    {
        var id_ficha = $('#id_fc').val();
        var id_lugar_atencion = $('#id_lugar_atencion').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        // menarquia
        // var fecha_actual = $('#ciclo_modal_fecha_actual').val();
        var edad_menarquia = $('#ciclo_modal_edad_menarquia').val();
        var gr_tunner = $('#ciclo_modal_gr_tunner').val();
        var fecha_comienzo = $('#ciclo_modal_fecha_comienzo').val();
        var comentarios_menarquia = $('#ciclo_modal_comentarios_menarquia').val();

        // ciclo
        var fur = $('#ciclo_modal_fur').val();
        var tipo_ciclo = $('#ciclo_modal_tipo_ciclo').val();
        var frecuencia_ciclo = $('#ciclo_modal_frecuencia_ciclo').val();
        var sintomas_ciclo = $('#ciclo_modal_sintomas_ciclo').val();
        var comentarios_ciclo = $('#ciclo_modal_comentarios_ciclo').val();

        let url = "{{ route('gine.obste.examen.ciclo.menstrual.registrar') }}";
        var datos = {};
        datos._token = CSRF_TOKEN;
        datos.id_ficha_gineco_obstetrica = id_ficha;
        // datos.id_ficha_gine =
        datos.id_lugar_atencion = id_lugar_atencion;
        datos.id_paciente = id_paciente;
        datos.id_profesional = id_profesional;
        datos.edad_menarquia = edad_menarquia
        datos.gr_tunner = gr_tunner
        datos.fecha_comienzo = fecha_comienzo
        datos.comentarios_menarquia = comentarios_menarquia
        datos.fur = fur
        datos.tipo_ciclo = tipo_ciclo
        datos.frecuencia_ciclo = frecuencia_ciclo
        datos.sintomas_ciclo = sintomas_ciclo
        datos.comentarios_ciclo = comentarios_ciclo

        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: datos,
            success: function(data) {
                // console.log(data);
                if(data.estado == 1)
                {
                    var mensaje = '';
                    mensaje = 'registro realizado con exito.\n';

                    swal({
                        title: "Antecedentes ciclo menstrual",
                        text: mensaje,
                        icon: "success",
                    });

                    ver_ex_ciclo();
                    limpiar_formulario_ex_ciclo();
                    abrir_div('formulario_1');
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
                        title: "Antecedentes ciclo menstrual",
                        text: data.msj+'\n'+texto_error,
                        icon: "warning",
                    });

                    ver_ex_ciclo();
                }
            }
        });
    }


    function ver_ex_ciclo()
    {
        var id_ficha = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();

        let url = "{{ route('gine.obste.examen.ciclo.menstrual.ver') }}";
        var datos = {};
        datos.id_ficha_gineco_obstetrica = id_ficha;
        datos.id_paciente = id_paciente;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: "json",
            data: datos,
            success: function(data) {
                // console.log(data);
                if(data.estado == 1)
                {

                    $('#ciclo_modal_table_menarquia tbody').html('');
                    $('#ciclo_modal_table_cliclo tbody').html('');

                    $.each(data.registros, function (index, value) {

                        var f_temp = (value.fecha_actual).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                        if(value.fecha_comienzo != null && value.fecha_comienzo != '')
                        {
                            var html_menarquia = '';
                            html_menarquia += '<tr>';
                            html_menarquia += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html_menarquia += '    <td class="text-center align-middle">'+value.edad_menarquia+'</td>';
                            html_menarquia += '    <td class="text-center align-middle">'+value.gr_tunner+'</td>';
                            html_menarquia += '    <td class="text-center align-middle">'+value.fecha_comienzo+'</td>';
                            html_menarquia += '    <td class="text-center align-middle">'+value.comentarios_menarquia+'</td>';
                            html_menarquia += '</tr>';
                            $('#ciclo_modal_table_menarquia tbody').append(html_menarquia);
                        }

                        if(value.fur != null && value.fur != '')
                        {
                            var html_ciclo = '';
                            html_ciclo += '<tr>';
                            html_ciclo += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html_ciclo += '    <td class="text-center align-middle">'+value.fur+'</td>';
                            html_ciclo += '    <td class="text-center align-middle">'+value.tipo_ciclo+'</td>';
                            html_ciclo += '    <td class="text-center align-middle">'+value.frecuencia_ciclo+'</td>';
                            html_ciclo += '    <td class="text-center align-middle">'+value.sintomas_ciclo+'</td>';
                            html_ciclo += '    <td class="text-center align-middle">'+value.comentarios_ciclo+'</td>';
                            html_ciclo += '</tr>';
                            $('#ciclo_modal_table_cliclo tbody').append(html_ciclo);
                        }
                    });
                }
                else
                {
                    console.log(data);
                    // var texto_error = '';

                    // if(data.estado ==  0)
                    // {
                    //     if('error' in data)
                    //     {
                    //         $.each(data.error, function (indexInArray, valueOfElement) {
                    //             texto_error += indexInArray+': '+valueOfElement+'\n';
                    //         });
                    //     }
                    // }
                    // swal({
                    //     title: "Antecedentes ciclo menstrual",
                    //     text: data.msj+'\n'+texto_error,
                    //     icon: "warning",
                    // });
                }
            }
        });
    }



</script>
