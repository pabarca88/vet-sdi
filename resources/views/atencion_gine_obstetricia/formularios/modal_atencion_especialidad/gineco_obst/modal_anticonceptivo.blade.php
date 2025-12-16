<div id="anticonceptivo_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="anticonceptivo_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_ciclo"> Antecedentes métodos anticonceptivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row pt-2 mb-3">
                    <div class="col-md-12">
                        <h6 id="ant_4" onclick="abrir_div('div_anticonceptivo_modal');" class="text-primary" style="cursor: pointer;">Añadir nuevo antecedente <i class="fas fa-plus-circle text-primary"></i></h6>
                    </div>
                </div>
                <div class="row py-2" id="div_anticonceptivo_modal" style="display:none;">
                    <div class="col-md-12">
                        <form>
                            <h5> Hormonales</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="ant_anti_hormonales_fecha" id="ant_anti_hormonales_fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fármaco</label>
                                    <input type="text" class="form-control form-control-sm" name="ant_anti_hormonales_farmaco" id="ant_anti_hormonales_farmaco">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tiempo</label>
                                    <input type="text" class="form-control form-control-sm" name="ant_anti_hormonales_tiempo" id="ant_anti_hormonales_tiempo">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ant_anti_hormonales_comentario" id="ant_anti_hormonales_comentario"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_ant_anticonceptivo('HORMONAL');">Añadir</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="col-md-12">
                        <form>
                            <h5> Mecánicos</h5>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha</label>
                                    <input type="date" class="form-control form-control-sm" name="ant_anti_mecanico_fecha" id="ant_anti_mecanico_fecha">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Tipo</label>
                                    <input type="text" class="form-control form-control-sm" name="ant_anti_mecanico_tipo" id="ant_anti_mecanico_tipo">
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <label class="floating-label-activo-sm">Fecha instalación</label>
                                    <input type="date" class="form-control form-control-sm" name="ant_anti_mecanico_fecha_instalacion" id="ant_anti_mecanico_fecha_instalacion">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                    <label class="floating-label-activo-sm">Comentarios</label>
                                    <textarea type="text" class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ant_anti_mecanico_comentarios" id="ant_anti_mecanico_comentarios"></textarea>
                                </div>
                                <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                    <button type="button" class="btn btn-info btn-sm btn-block" onclick="agregar_ant_anticonceptivo('MECANICO');">Añadir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                 <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-pills mb-3" id="anticonceptivo" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-modal" id="hormonales_tab" data-toggle="pill" href="#hormonales" role="tab" aria-controls="hormonales" aria-selected="false">Hormonales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-modal" id="mecanico_tab" data-toggle="pill" href="#mecanico" role="tab" aria-controls="mecanico" aria-selected="false">Mecánicos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="anticoncep">
                            <!--TAB 1-->
                            <div class="tab-pane fade show active" id="hormonales" role="tabpanel" aria-labelledby="hormonales_tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5>Hormonales</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="anti_modal_hormonal" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Fármaco</th>
                                                        <th class="text-center align-middle">Tiempo</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">anulet</td>
                                                        <td class="text-center align-middle">6 meses</td>
                                                        <td class="text-center align-middle">Control 6 meses</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--TAB 2  -->
                            <div class="tab-pane fade" id="mecanico" role="tabpanel" aria-labelledby="mecanico_tab">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                         <h5>Mecánicos</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="anti_modal_mecanico" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha Registro</th>
                                                        <th class="text-center align-middle">Tipo</th>
                                                        <th class="text-center align-middle">Fecha de Instalación</th>
                                                        <th class="text-center align-middle">Comentarios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">12/05/2021</td>
                                                        <td class="text-center align-middle">DIU</td>
                                                        <td class="text-center align-middle">28/3/2022</td>
                                                        <td class="text-center align-middle">Sangrado leve</td>
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
    function anticonc() {
        $('#anticonceptivo_modal').modal('show');
        ver_ant_anticonceptivo();
    }

    function agregar_ant_anticonceptivo(tipo)
    {
        var id_ficha = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();
        var fecha = '';
        var comentario = '';
        var hormonales_farmaco = '';
        var hormonales_tiempo = '';
        var mecanico_fecha = '';
        var mecanico_tipo = '';
        var mecanico_fecha_instalacion = '';


        if(tipo == 'HORMONAL')
        {
            fecha = $('#ant_anti_hormonales_fecha').val();
            hormonales_farmaco = $('#ant_anti_hormonales_farmaco').val();
            hormonales_tiempo = $('#ant_anti_hormonales_tiempo').val();
            comentario = $('#ant_anti_hormonales_comentario').val();

        }
        else if(tipo == 'MECANICO')
        {
            fecha = $('#ant_anti_mecanico_fecha').val();
            mecanico_tipo = $('#ant_anti_mecanico_tipo').val();
            mecanico_fecha_instalacion = $('#ant_anti_mecanico_fecha_instalacion').val();
            comentario = $('#ant_anti_mecanico_comentarios').val();
        }

        var url = '{{ route("gine.ante.anticonceptivo.registrar") }}';
        var datos = {};
        datos._token = CSRF_TOKEN;
        datos.id_paciente = id_paciente;
        datos.id_profesional = id_profesional;
        datos.id_ficha_atencion = '';
        datos.id_ficha_otros_prof = '';
        datos.id_ficha_gineco_obstetrica = id_ficha;
        datos.tipo = tipo
        datos.fecha = fecha
        datos.elemento = mecanico_tipo
        datos.farmaco = hormonales_farmaco
        datos.tiempo = hormonales_tiempo
        datos.fecha_instalacion = mecanico_fecha_instalacion
        datos.comentarios = comentario

        $.ajax({
            url: url,
            type: 'POST',
            dataType: "json",
            data: datos,
            success: function(data) {
                console.log(data);
                if(data.estado == 1)
                {
                    var mensaje = '';
                    mensaje = 'Registro realizado con exito.\n';

                    swal({
                        title: "Antecedentes métodos anticonceptivos",
                        text: mensaje,
                        icon: "success",
                    });

                    ver_ant_anticonceptivo();
                    limpiar_formulario_ant_anticonceptivo(tipo);
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
                        title: "Antecedentes métodos anticonceptivos",
                        text: data.msj+'\n'+texto_error,
                        icon: "warning",
                    });

                    ver_ant_anticonceptivo();
                }
            }
        });
    }

    function ver_ant_anticonceptivo()
    {

        var id_ficha = $('#id_fc').val();
        var id_paciente = $('#id_paciente_fc').val();
        var id_profesional = $('#id_profesional_fc').val();

        let url = "{{ route('gine.ante.anticonceptivo.ver') }}";
        var datos = {};
        datos.id_ficha_gineco_obstetrica = id_ficha;
        datos.id_paciente = id_paciente;
        datos.id_profesional = id_profesional;

        $.ajax({
            url: url,
            type: 'GET',
            dataType: "json",
            data: datos,
            success: function(data) {
                console.log(data);
                if(data.estado == 1)
                {
                    $('#anti_modal_hormonal tbody').html('');
                    $('#anti_modal_mecanico tbody').html('');

                    $.each(data.registros, function (index, value) {

                        var f_temp = (value.fecha).replace('T',' ').replace('Z','').replace('.000000','');
                        var fecha = new Date(f_temp);
                        fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();

                        if(value.tipo == 'HORMONAL' )
                        {
                            var html_hormonal = '';
                            html_hormonal += '<tr>';
                            html_hormonal += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html_hormonal += '    <td class="text-center align-middle">'+value.farmaco+'</td>';
                            html_hormonal += '    <td class="text-center align-middle">'+value.tiempo+'</td>';
                            html_hormonal += '    <td class="text-center align-middle">'+value.comentarios+'</td>';
                            html_hormonal += '</tr>';
                            $('#anti_modal_hormonal tbody').append(html_hormonal);
                        }

                        if(value.tipo == 'MECANICO' )
                        {
                            var f_temp_2 = (value.fecha_instalacion).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha_2 = new Date(f_temp_2);
                            fecha_2 = fecha_2.getDate()+'-'+(fecha_2.getMonth()+1)+'-'+fecha_2.getFullYear();

                            var html_mecanico = '';
                            html_mecanico += '<tr>';
                            html_mecanico += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html_mecanico += '    <td class="text-center align-middle">'+value.elemento+'</td>';
                            html_mecanico += '    <td class="text-center align-middle">'+fecha_2+'</td>';
                            html_mecanico += '    <td class="text-center align-middle">'+value.comentarios+'</td>';
                            html_mecanico += '</tr>';
                            $('#anti_modal_mecanico tbody').append(html_mecanico);
                        }
                    });
                }
                else
                {
                    console.log(data);
                }
            }
        });
    }

    function limpiar_formulario_ant_anticonceptivo(tipo)
    {
        if(tipo == 'HORMONAL')
        {
            $('#ant_anti_hormonales_fecha').val('');
            $('#ant_anti_hormonales_farmaco').val('');
            $('#ant_anti_hormonales_tiempo').val('');
            $('#ant_anti_hormonales_comentario').val('');
        }
        else if(tipo == 'MECANICO')
        {
            $('#ant_anti_mecanico_fecha').val('');
            $('#ant_anti_mecanico_tipo').val('');
            $('#ant_anti_mecanico_fecha_instalacion').val('');
            $('#ant_anti_mecanico_comentarios').val('');
        }
    }
</script>
