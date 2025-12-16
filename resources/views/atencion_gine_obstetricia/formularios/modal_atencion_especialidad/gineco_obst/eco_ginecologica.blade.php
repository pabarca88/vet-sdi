<div id="ecogine_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="ecogine_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="eco_gine"> Ecografía ginecológica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-row">
                            <div class="col-sm-12 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="ecogine_modal_eco_sol">Ecografía ginecológica</label>
                                    <div class="form-control form-control-sm" id="ecogine_modal_nombre_real">ECOGRAFIA GINECOLOGICA, PELVIANA FEMENINA U OBSTETRICA CON ESTUDIO FETAL </div>
                                    <input type="hidden" name="ecogine_modal_eco_sol" id="ecogine_modal_eco_sol" value="486">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm" for="ecogine_modal_sosp_clinica">Sospecha clínica</label>
                                    <input type="text" class="form-control form-control-sm" name="ecogine_modal_sosp_clinica" id="ecogine_modal_sosp_clinica">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group fill">
                                    <label class="floating-label" for="ecogine_modal_urgencia">Prioridad</label>
                                    <select class="form-control form-control-sm" id="ecogine_modal_urgencia" name="ecogine_modal_urgencia">
                                        <option value="1">Baja</option>
                                        <option value="2" selected>Media</option>
                                        <option value="3">Alta</option>
                                        <option value="4">Urgente</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="ecogine_modal_obs_sol_eco" id="ecogine_modal_obs_sol_eco"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="button" onclick="indicar_examen_sol_eco();" id="ecogine_modal_agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                                    <i lass="fa fa-plus"></i> Agregar Examen
                                </button>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                                <!--Tabla-->
                                <div class="table-responsive">
                                    <table id="ecogine_modal_table" class="table table-bordered table-xs">
                                        <thead>
                                            <tr>
                                                <th class="text-center align-middle" style="display:none;">id</th>
                                                <th class="text-center align-middle" style="display:none;">Nombre Real</th>
                                                <th class="text-center align-middle" style="display:none;">Nombre especialidad</th>
                                                <th class="text-center align-middle">Nombre Examen</th>
                                                <th class="text-center align-middle" style="display:none;">Lado</th>
                                                <th class="text-center align-middle">Tipo</th>
                                                <th class="text-center align-middle">Prioridad</th>
                                                <th class="text-center align-middle" style="display:none;">Con Contraste</th>
                                                <th class="text-center align-middle">Sospecha</th>
                                                <th class="text-center align-middle">Observación</th>
                                                <th class="text-center align-middle">Acción</th>
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

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="registro_examen_sol_eco();">Guardar</button>
            </div>

        </div>
    </div>
</div>

<script>
    function eco_gine() {
        $('#ecogine_modal').modal('show');
        ver_examenes_sol_eco();
    }

    function indicar_examen_sol_eco()
    {
        var id_examenes = $('#ecogine_modal_eco_sol').val();
        var real_examenes = $('#ecogine_modal_nombre_real').html();

        var examen = $('#ecogine_modal_nombre_real').html();

        var sospecha = $('#ecogine_modal_sosp_clinica').val();

        var prioridad = $('#ecogine_modal_urgencia').val();
        var txt_prioridad = $('#ecogine_modal_urgencia option:selected').text();

        var observacion = $('#ecogine_modal_obs_sol_eco').val();

        var valido = 1;
        var mensaje = '';

        if( id_examenes=='')
        {
            valido = 0;
            mensaje += 'Debe seleccionar un examen\n';
        }
        else
        {
            var encontrado = 0;
            $("#ecogine_modal_table .tr_examen_sol_eco").find('td:hidden:first').each(function (index, element) {
                if(parseInt(id_examenes) == parseInt($(element).html()))
                    encontrado = 1;
            });

            if(encontrado == 1)
            {
                valido = 0;
                mensaje += 'El examen ya se encuentra agregado.\n';
            }
        }

        if( sospecha=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar una sospecha\n';
        }


        if( prioridad=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar urgencia\n';
        }


        if(valido == 1)
        {
            $('.examenes_sin_registros').remove();
            var i = $('#ecogine_modal_table tr').length; //contador para asignar id al boton que borrara la fila
            var fila = '';

            var id_reg = '';
            id_reg = id_examenes;
            fila += '<tr class="tr_examen_sol_eco" id="row' + i + '">';
            fila += '    <td class="text-center align-middle" style="display:none;">'+id_reg+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">'+real_examenes+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">Ecografía ginecológica</td>';
            fila += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+real_examenes+'<br><span style="font-size:8px">Ecografía ginecológica</span></td>';
            fila += '    <td class="text-center align-middle"style="display:none;">N/A</td>';
            fila += '    <td class="text-center align-middle">Ginecobstetra</td>';
            fila += '    <td class="text-center align-middle">'+txt_prioridad+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
            fila += '    <td class="text-center align-middle">'+sospecha+'</td>';
            fila += '    <td class="text-center align-middle">'+observacion+'</td>';
            fila += '    <td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_sol_eco(\'row' + i + '\');">Quitar</div></td>';
            fila += '</tr>';

            $('#ecogine_modal_table tbody').append(fila);

            $('#ecogine_modal_sosp_clinica').val('');
            $('#ecogine_modal_urgencia').val('2');
            $('#ecogine_modal_obs_sol_eco').val('');
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

    function eliminar_examen_sol_eco(id_row)
    {
        $('#ecogine_modal_table [id='+id_row+']').remove();
    }


    function registro_examen_sol_eco()
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
        $('#ecogine_modal_table tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["id_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["nombre_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                rol["lado"] = $.trim($(data[4]).text().split("\n").join(""));
                rol["nombre_examen_especialidad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[5]).text().split("\n").join(""));
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
                    ver_examenes_sol_eco();
                }
                else
                {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                    ver_examenes_sol_eco();
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

    function ver_examenes_sol_eco()
    {

        let url = "{{ route('examenes.ver_examenes') }}";
        var _token = CSRF_TOKEN;
        var id_ficha = $('#id_fc').val();
        $('#ecogine_modal_table tbody').html('');

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
                console.log('----------ecogine_modal-------------');
                console.log('----------ver_examenes_sol_eco-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';

                if(data.estado == 1)
                {
                    let prioridad = ['', 'Baja', 'Media','Alta','Urgente'];
                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr class="tr_examen_sol_eco" id="row' + index + '">';

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
                        html += '    <td class="text-center align-middle"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_sol_eco(\'row' + index + '\');">Quitar</div></td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="11">'+data.msj+'</td>';
                    html += '</tr>';

                }

                $('#ecogine_modal_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }


</script>
