<div id="m_sol_ex_mat" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_sol_ex_mat" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="m_sol_ex_mat_titulo">SOLICITUD EXAMENES ESPECIALES</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body">
                <form>
                    {{-- <div class="form-row"> --}}
                        {{-- <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                            <div class="form-group">
                                <script>
                                    var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                                    var f=new Date();
                                    document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                                </script>
                            </div>
                        </div> --}}
                        {{--  <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
                            </div>
                        </div>  --}}
                        {{-- <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm" for="num_orden">Nº de Orden</label>
                                <input type="number" name="num_orden" id="num_orden" type="text" class="form-control form-control-sm">
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="m_sol_ex_mat_ex_flujo">Examen a Solicitar</label>
                                <select class="form-control form-control-sm" name="m_sol_ex_mat_ex_flujo" id="m_sol_ex_mat_ex_flujo" onchange="buscar_examen_real('m_sol_ex_mat_ex_flujo','real_m_sol_ex_mat_ex_flujo');">
                                    <option value="351" data-multicodigo="">Examen de flujo vaginal</option>
                                    <option value="248" data-multicodigo="">Examen de flujo Clamideas</option>
                                    <option value="" data-multicodigo="221|236">Cultivo y antibiograma Secreciones</option>
                                </select>
                                <label id="real_m_sol_ex_mat_ex_flujo" class="f-10 highcharts-strong" data-id=""></label>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="m_sol_ex_mat_sosp_clin">Sospecha Clínica</label>
                                <select class="form-control form-control-sm" name="m_sol_ex_mat_sosp_clin" id="m_sol_ex_mat_sosp_clin">
                                    <option value="Examen de rutina">Examen de rutina</option>
                                    <option value="Infección Vaginal">Infección Vaginal</option>
                                    <option value="Papilomatosis">Papilomatosis</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm" for="m_sol_ex_mat_urgencia">Urgencia</label>
                                <select class="form-control form-control-sm" name="m_sol_ex_mat_urgencia" id="m_sol_ex_mat_urgencia">
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm"  for="m_sol_ex_mat_obs_ex_espec">Observaciones</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="m_sol_ex_mat_obs_ex_espec" id="m_sol_ex_mat_obs_ex_espec"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right" onclick="indicar_examen_gine_sol_flujo();"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm" id="m_sol_ex_mat_table">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle" style="display:none;">id</th>
                                            <th class="text-center align-middle" style="display:none;">Nombre Real</th>
                                            <th class="text-center align-middle" style="display:none;">Nombre especialidad</th>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle"style="display:none;">Lado</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Prioridad</th>
                                            <th class="text-center align-middle" style="display:none;">Con Contraste</th>
                                            <th class="text-center align-middle">Sospecha</th>
                                            <th class="text-center align-middle">Observación</th>
                                            <th class="text-center align-middle">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td class="text-center align-middle text-wrap" style="display:none">12</td>
                                            <td class="text-center align-middle text-wrap">-</td>
                                            <td class="text-center align-middle text-wrap">-</td>
                                            <td class="text-center align-middle text-wrap">-</td>
                                            <td class="text-center align-middle text-wrap">-</td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info" onclick="registro_examen_ficha_espc();">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function gine_sol_examenes_flujo()
    {
        buscar_examen_real('m_sol_ex_mat_ex_flujo','real_m_sol_ex_mat_ex_flujo');
        // ver_examenes_ficha_medica();
        ver_examenes_ficha_medica_esp();
        $('#m_sol_ex_mat').modal('show');

    }

    function indicar_examen_gine_sol_flujo()
    {
        var id_examenes = $('#m_sol_ex_mat_ex_flujo').val();
        var real_examenes = $('#real_m_sol_ex_mat_ex_flujo').html();
        var examen = $('#m_sol_ex_mat_ex_flujo option:selected').text();
        let examen_multi = $('#m_sol_ex_mat_ex_flujo option:selected').attr('data-multicodigo');

        var sopecha = $('#m_sol_ex_mat_sosp_clin').val();
        var txt_sopecha = $('#m_sol_ex_mat_sosp_clin option:selected').text();

        var prioridad = $('#m_sol_ex_mat_urgencia').val();
        var txt_prioridad = $('#m_sol_ex_mat_urgencia option:selected').text();

        var observacion = $('#m_sol_ex_mat_obs_ex_espec').val();

        var _token = CSRF_TOKEN;
        var valido = 1;
        var mensaje = '';

        if( id_examenes=='' && examen_multi=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar un examen\n';
        }
        else
        {
            if(id_examenes!='')
            {

                $("#m_sol_ex_mat_table .tr_examen_flujo").find('td:hidden:first').each(function (index, element) {
                    if(parseInt(id_examenes) == parseInt($(element).html()))
                        encontrado = 1;
                });
            }
            else
            {
                var array_id_temp = examen_multi.split('|');
                var encontrado = 0;
                $.each(array_id_temp, function (index, value)
                {
                    $("#m_sol_ex_mat_table .tr_examen_flujo").find('td:hidden:first').each(function (index, element) {
                        if(parseInt(value) == parseInt($(element).html()))
                            encontrado = 1;
                    });
                });
            }

            if(encontrado == 1)
            {
                valido = 0;
                mensaje += 'Alguno de los examenes ya se encuentra agregado.\n';
            }
        }

        if( sopecha=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar una sopecha\n';
        }

        if( prioridad=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar urgencia\n';
        }

        if(valido == 1)
        {
            $('.examenes_sin_registros').remove();
            var i = $('#m_sol_ex_mat_table tr').length; //contador para asignar id al boton que borrara la fila
            var fila = '';

            var id_reg = '';
            if(examen_multi!='')
            {
                var array_id_temp = examen_multi.split('|');
                var array_real_temp = real_examenes.split('|');

                $.each(array_id_temp, function (index, value)
                {
                    fila += '<tr class="tr_examen_flujo" id="row' + i + '">';
                    fila += '    <td class="text-center align-middle" style="display:none;">'+value+'</td>';
                    fila += '    <td class="text-center align-middle" style="display:none;">'+array_real_temp[index]+'</td>';
                    fila += '    <td class="text-center align-middle" style="display:none;">'+examen+'</td>';
                    fila += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+array_real_temp[index]+'<br><span style="font-size:8px">'+examen+'</span></td>';
                    fila += '    <td class="text-center align-middle"style="display:none;">N/A</td>';
                    fila += '    <td class="text-center align-middle">Ginecobstetra</td>';
                    fila += '    <td class="text-center align-middle">'+txt_prioridad+'</td>';
                    fila += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
                    fila += '    <td class="text-center align-middle">'+txt_sopecha+'</td>';
                    fila += '    <td class="text-center align-middle">'+observacion+'</td>';
                    fila += '    <td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_flujo(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';
                });
            }
            else
            {
                id_reg = id_examenes;
                fila += '<tr class="tr_examen_flujo" id="row' + i + '">';
                fila += '    <td class="text-center align-middle" style="display:none;">'+id_reg+'</td>';
                fila += '    <td class="text-center align-middle" style="display:none;">'+real_examenes+'</td>';
                fila += '    <td class="text-center align-middle" style="display:none;">'+examen+'</td>';
                fila += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+real_examenes+'<br><span style="font-size:8px">'+examen+'</span></td>';
                fila += '    <td class="text-center align-middle"style="display:none;">N/A</td>';
                fila += '    <td class="text-center align-middle">Ginecobstetra</td>';
                fila += '    <td class="text-center align-middle">'+txt_prioridad+'</td>';
                fila += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
                fila += '    <td class="text-center align-middle">'+txt_sopecha+'</td>';
                fila += '    <td class="text-center align-middle">'+observacion+'</td>';
                fila += '    <td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_flujo(\'row' + i + '\');">Quitar</div></td>';
                fila += '</tr>';

            }


            i++;
            $('#m_sol_ex_mat_table tbody').append(fila);

            $('#m_sol_ex_mat_ex_flujo').val(351);
            $('#real_m_sol_ex_mat_ex_flujo').html('');
            $('#m_sol_ex_mat_sosp_clin').val('Examen de rutina');
            $('#m_sol_ex_mat_urgencia').val(2);
            $('#m_sol_ex_mat_obs_ex_espec').val('');
        }
        else
        {
            swal({
                title: "Ingreso de examen(es).",
                text:mensaje,
                icon: "error",
            });
        }
    }

    function eliminar_examen_flujo(id_row)
    {
        $('#m_sol_ex_mat_table [id='+id_row+']').remove();
    }

    function buscar_examen_real(input_otigen,label_destino)
    {
        let valor = $('#'+input_otigen).val();
        let examen_multi =  $('#'+input_otigen+' option:selected').attr('data-multicodigo');
        if(valor == '')
        {
            var array_temp = examen_multi.split('|');
            $('#'+label_destino).html('');
            $('#'+label_destino).attr('data-id','');

            $('#'+label_destino).attr('data-id',examen_multi);

            var nombre_temp = '';

            $.each(array_temp, function (index, value)
            {
                let url = "{{ route('examenes_medico.ver_examen') }}";
                var _token = CSRF_TOKEN;
                $.ajax({
                    async: false,
                    url: url,
                    type: "GET",
                    data: {
                        id:value
                    },
                })
                .done(function(data)
                {
                    if (data !== 'null')
                    {
                        console.log(data);
                        var text_temp = '';
                        if(index == 0)
                            text_temp = ''+data.nombre_examen.trim();
                        else
                            text_temp = ' | '+data.nombre_examen.trim();

                        $('#'+label_destino).append(text_temp);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            });
        }
        else
        {
            $('#'+label_destino).html('');
            $('#'+label_destino).attr('data-id','');
            let url = "{{ route('examenes_medico.ver_examen') }}";
            var _token = CSRF_TOKEN;
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    id:valor
                },
            })
            .done(function(data)
            {
                if (data !== 'null')
                {
                    console.log(data);
                    $('#'+label_destino).html(data.nombre_examen);
                    $('#'+label_destino).attr('data-id',data.cod_examen);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }
    }

    function registro_examen_ficha_espc ()
    {
        // id<0 -> 351
        // Nombre Real<1 -> FLUJO VAGINAL O SECRECION URETRAL
        // Nombre especialidad <2 ->Examen de flujo vaginal
        // Nombre Examen<3 -> FLUJO VAGINAL O SECRECION URETRAL<br><span style="font-size:8px">Examen de flujo vaginal</span>
        // Lado<4 -> N/A
        // Tipo<5 -> Ginecobstetra
        // Prioridad<6 -> Alta
        // Con Contraste<7 -> N/A
        // Sospecha<8 -> Infección Vaginal
        // Observación<9 -> SDASDASD
        var rows1 = [];
        $('#m_sol_ex_mat_table tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["id_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["nombre_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                rol["lado"] = $.trim($(data[4]).text().split("\n").join(""));
                rol["nombre_examen_especialidad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[5]).text().split("\n").join(""));
                // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["prioridad"] = $.trim($(data[6]).text().split("\n").join(""));
                rol["con_contraste"] = $.trim($(data[7]).text().split("\n").join(""));
                rol["sospecha"] = $.trim($(data[8]).text().split("\n").join(""));
                rol["observacion"] = $.trim($(data[9]).text().split("\n").join(""));

                rows1.push(rol);
            }
        });

        // $('#examenes_esp').val(JSON.stringify(rows1));

        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let tipo_ficha = 1;
        var _token = CSRF_TOKEN;

        let url = "{{ route('examenes.registro_examenes') }}";
        $.ajax({
            url: url,
            type: "post",
            data: {
                _token: _token,
                examenes: JSON.stringify(rows1),
                id_ficha_gineco_obstetrica: id_ficha_atencion,
                id_profesional: id_profesional,
                id_paciente: id_paciente,
                tipo_ficha: tipo_ficha,
            },
        })
        .done(function(data) {
            console.log(data)
            if (data != null)
            {
                console.log(data)
                if(data.estado == '1'){
                    swal({
                        title: "Ingreso de examen(es).",
                        text: 'Examenes registrados con Exito.',
                        icon: "success",
                    });
                }
                else
                {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
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

    function ver_examenes_ficha_medica_esp()
    {

        let url = "{{ route('examenes.ver_examenes') }}";


        var _token = CSRF_TOKEN;
        var id_ficha = $('#id_fc').val();
        $('#m_sol_ex_mat_table tbody').html('');

        $.ajax({

            url: url,
            type: "GET",
            data: {
                _token: _token,
                id_ficha_gineco_obstetrica:id_ficha
            },
        })
        .done(function(data)
        {

            if (data !== 'null')
            {
                //data = JSON.parse(data);
                console.log('----------sol_examenes_flujo-------------');
                console.log('----------ver_examenes_ficha_medica_esp-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';

                if(data.estado == 1)
                {
                    let prioridad = ['', 'Baja', 'Media','Alta','Urgente'];
                    $.each(data.registros, function(index, value)
                    {

                        html += '<tr class="tr_examen_flujo" id="row' + index + '">';

                        html += '    <td class="text-center align-middle" style="display:none">'+value.id_examen+'</td>';
                        html += '    <td class="text-center align-middle" style="display:none">'+value.examen+'</td>';
                        var nombre = '';
                        if(value.examen_especialidad == '' || value.examen_especialidad == null)
                        {
                            nombre = '';
                        }
                        else
                        {
                            if(value.examen_especialidad == value.examen)
                            {
                                nombre = '';
                            }
                            else
                            {
                                nombre = value.examen_especialidad;
                            }
                        }
                        html += '    <td class="text-center align-middle" style="display:none">'+nombre+'</td>';
                        html += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+value.examen+'<br><span style="font-size:8px">'+nombre+'</span></td>';
                        html += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
                        html += '    <td class="text-center align-middle">'+value.tipo_examen+'</td>';
                        html += '    <td class="text-center align-middle">'+prioridad[value.id_prioridad]+'</td>';
                        html += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
                        html += '    <td class="text-center align-middle">'+value.sospecha+'</td>';
                        html += '    <td class="text-center align-middle">'+value.observacion+'</td>';
                        html += '    <td class="text-center align-middle"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_flujo(\'row' + index + '\');">Quitar</div></td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="11">'+data.msj+'</td>';
                    html += '</tr>';

                }

                $('#m_sol_ex_mat_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }
</script>
