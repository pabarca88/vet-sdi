<div id="modal_evaluacion_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_evaluacion_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_evaluacion_mamas">Examen clínico de mamas Solicitud Examen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- seccion examen clinico --}}
                <div class="form-row">
                    <div class="col-sm-12 col-md-4 mt-2">
                        <div class="form-group fill">
                            <img src="{{ asset('images/gineco_obst/ex.mamas.png') }}" style="width:80%">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 mt-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_lado_1">Seleccione lado</label>
                                    <select class="form-control form-control-sm" id="modal_evaluacion_mamas_lado_1" name="modal_evaluacion_mamas_lado_1" onchange="validar_evaluacion();">
                                        <option value="0">Seleccione </option>
                                        <option value="1">Mama derecha</option>
                                        <option value="2">Mama izquierda</option>
                                        <option value="3" selected>Ambas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_des_ex_mamas_1">Descripción del examen</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_evaluacion_mamas_des_ex_mamas_1" id="modal_evaluacion_mamas_des_ex_mamas_1"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_lado_2">Seleccione lado</label>
                                    <select class="form-control form-control-sm" id="modal_evaluacion_mamas_lado_2" name="modal_evaluacion_mamas_lado_2" disabled>
                                        <option value="0">Seleccione </option>
                                        <option value="1">Mama derecha</option>
                                        <option value="2">mama izquierda</option>
                                        {{-- <option value="3">Ambas</option> --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_des_ex_mamas_2">Descripción del examen</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_evaluacion_mamas_des_ex_mamas_2" id="modal_evaluacion_mamas_des_ex_mamas_2" disabled></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_des_ex_mamasgen">Descripción general del examen</label>
                            <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_evaluacion_mamas_des_ex_mamasgen" id="modal_evaluacion_mamas_des_ex_mamasgen"></textarea>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn btn-info btn-sm" onclick="registrar_examen_clinico_mama();">Guardar Examen Clínico</button>
                    </div>
                </div> --}}
                {{-- seccion solicitud examen --}}
                <div class="form-row">
                    <hr class="w-100">
                    <div class="col-sm-12 col-md-12 mt-2 mb-3">
                        <h6>Solicitar examen</h6>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_sol_ex_lado">Seleccione lado</label>
                        <select class="form-control form-control-sm" id="modal_evaluacion_mamas_sol_ex_lado" name="modal_evaluacion_mamas_sol_ex_lado" onchange="cargar_estudios();">
                            <option value="">Seleccione </option>
                            <option value="Mama derecha">Mama derecha</option>
                            <option value="Mama izquierda">Mama izquierda</option>
                            <option value="Ambas">Ambas</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_sol_ex_tipo">Tipo de examen</label>
                        <select class="form-control form-control-sm" id="modal_evaluacion_mamas_sol_ex_tipo" name="modal_evaluacion_mamas_sol_ex_tipo">
                            <option value="0">Seleccione</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_enf_cuadrante">Énfasis cuadrante o zona</label>
                        <select class="form-control form-control-sm" id="modal_evaluacion_mamas_enf_cuadrante" name="modal_evaluacion_mamas_enf_cuadrante">
                            <option value="">Seleccione </option>
                            <option value="Cola">Cola</option>
                            <option value="S. Interno">S. Interno</option>
                            <option value="S. Externo">S. Externo</option>
                            <option value="S. Interno">S. Interno</option>
                            <option value="S. Externo">S. Externo</option>
                            <option value="Areola">Areola</option>
                            <option value="Pezón">Pezón</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_sosp_dg">Sospecha diagnóstica</label>
                        <select class="form-control form-control-sm" id="modal_evaluacion_mamas_sosp_dg" name="modal_evaluacion_mamas_sosp_dg">
                            <option value="">Seleccione </option>
                            <option value="Examen de Rutina">Examen de Rutina</option>
                            <option value="Estudio de lesión">Estudio de lesión</option>
                            <option value="Seguimiento de lesión">Seguimiento de lesión</option>
                            {{-- <option value="Otra">Otra</option> --}}
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm" for="modal_evaluacion_mamas_sol_ex_mamas_esp">Solicitud especial</label>
                        <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_evaluacion_mamas_sol_ex_mamas_esp" id="modal_evaluacion_mamas_sol_ex_mamas_esp"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <button type="button" class="btn_agregar_examen btn btn-info btn-sm" disabled="disabled" onclick="indicar_examen_sol_exam_mama();">Guardar solicitud Examen</button>
                    </div>
                </div>
                <div class="form-row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="modal_evaluacion_mamas_table" class="table table-bordered table-xs">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="display:none;">id</th>
                                        <th class="text-center align-middle" style="display:none;">Nombre Real</th>
                                        <th class="text-center align-middle" style="display:none;">Nombre especialidad</th>
                                        <th class="text-center align-middle">Nombre Examen</th>
                                        <th class="text-center align-middle">Lado</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        <th class="text-center align-middle">Prioridad</th>
                                        <th class="text-center align-middle" style="display:none;">Con Contraste</th>
                                        <th class="text-center align-middle">Sospecha</th>
                                        <th class="text-center align-middle">Énfasis</th>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                {{-- <button type="button" class="btn btn-info btn-sm" onclick="registrar_examen_clinico_mama();">Guardar Examen Clínico</button> --}}
                <button type="button" class="btn btn-info btn-sm" onclick="registrar_examen_clinico_mama();">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function ex_mamas()
    {
        ver_examenes_sol_exam_mama();
        cargar_examen_clinico_mama();
        $('#modal_evaluacion_mamas').modal('show');
    }

    function cargar_estudios()
    {
        // <option value="1">Mamografía</option>
        // <option value="2">Mamografía Digital</option>
        // <option value="4">Ecografía mamaria</option>
        // <option value="5">Resonancia Magnética de Mama</option>

        $('#modal_evaluacion_mamas_sol_ex_tipo').html('');
        $('#modal_evaluacion_mamas_sol_ex_tipo').append('<option value="0">Seleccione</option>');
        var lado = $('#modal_evaluacion_mamas_sol_ex_lado').val();
        let examenes_mamas = [
            // unilateral
            [
                {id:368, nombre:'Mamografía', nombre_real:'MAMOGRAFIA UNILATERAL'},
                {id:370, nombre:'Mamografía Proyección Comp. Axi.', nombre_real:'MAMOGRAFIA PROYECCION COMPLEMENTARIA AXILAR'},
                {id:736, nombre:'Mamografía Digital', nombre_real:'MAMOGRAFIA UNILATERAL DIGITAL 3D CON TOMOSINTESIS'},
            ],
            // bilateral
            [
                {id:367, nombre:'Mamografía', nombre_real:'MAMOGRAFIA BILATERAL'},
                {id:369, nombre:'Mamografía Digital', nombre_real:'MAMOGRAFIA BILATERAL DIGITAL 3D CON TOMOSINTESIS'},
                {id:358, nombre:'Ecografía mamaria', nombre_real:'ECOGRAFIA MAMARIA BILATERAL C/ DOPPLER'},
                {id:359, nombre:'Resonancia Magnética de Mama', nombre_real:'RESONANCIA MAGNETICA DE MAMA (BILATERAL)'},
            ]
        ];


        // unilateral
        if(lado == 'Mama derecha' || lado == 'Mama izquierda')
        {
            {{-- (`id`, `cod_examen`, `nombre_examen`)  --}}
            {{-- (368, 368, 'MAMOGRAFIA UNILATERAL'), --}}
            {{-- (370, 370, 'MAMOGRAFIA PROYECCION COMPLEMENTARIA AXILAR'), --}}
            {{-- (736, 736, 'MAMOGRAFIA UNILATERAL DIGITAL 3D CON TOMOSINTESIS'); --}}
            $.each(examenes_mamas[0], function (indexInArray, value)
            {
               $('#modal_evaluacion_mamas_sol_ex_tipo').append('<option value="'+value.id+'" data-nombre_real="'+value.nombre_real+'">'+value.nombre+'</option>');
            });

        }
        // bilateral
        else if(lado == 'Ambas')
        {
            {{-- (`id`, `cod_examen`, `nombre_examen`)  --}}
            {{-- (367, 367, 'MAMOGRAFIA BILATERAL'), --}}
            {{-- (369, 369, 'MAMOGRAFIA BILATERAL DIGITAL 3D CON TOMOSINTESIS'), --}}
            {{-- (492, 358, 'ECOGRAFIA MAMARIA BILATERAL C/ DOPPLER'); --}}
            {{-- (531, 359, 'RESONANCIA MAGNETICA DE MAMA (BILATERAL) '); --}}
            $.each(examenes_mamas[1], function (indexInArray, value)
            {
               $('#modal_evaluacion_mamas_sol_ex_tipo').append('<option value="'+value.id+'" data-nombre_real="'+value.nombre_real+'">'+value.nombre+'</option>');
            });
        }
        else
        {
            //
        }
    }

    function validar_evaluacion()
    {
        var lado_1 = $('#modal_evaluacion_mamas_lado_1');
        // var des_ex_mamas_1 = $('#modal_evaluacion_mamas_des_ex_mamas_1');
        var lado_2 = $('#modal_evaluacion_mamas_lado_2');
        var des_ex_mamas_2 = $('#modal_evaluacion_mamas_des_ex_mamas_2');

        if(lado_1.val() == 3)
        {
            lado_2.attr('disabled',true);
            des_ex_mamas_2.attr('disabled',true);
        }
        else if(lado_1.val() == 1 || lado_1.val() == 2)
        {
            lado_2.attr('disabled',false);
            des_ex_mamas_2.attr('disabled',false);
        }
    }

    function registrar_examen_clinico_mama()
    {
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();
        let id_lugar_atencion = $('#id_lugar_atencion').val();
        var _token = CSRF_TOKEN;

        let lado_1 = $('#modal_evaluacion_mamas_lado_1').val();
        let des_ex_mamas_1 = $('#modal_evaluacion_mamas_des_ex_mamas_1').val();
        let lado_2 = $('#modal_evaluacion_mamas_lado_2').val();
        let des_ex_mamas_2 = $('#modal_evaluacion_mamas_des_ex_mamas_2').val();
        let des_ex_mamasgen = $('#modal_evaluacion_mamas_des_ex_mamasgen').val();

        let url = '{{ route("gine.obste.mamas.exam.clini.agregar") }}';
        $.ajax({
            url: url,
            type: "post",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_atencion,
                id_paciente:id_paciente,
                id_profesional:id_profesional,
                lado_1:lado_1,
                des_ex_mamas_1:des_ex_mamas_1,
                lado_2:lado_2,
                des_ex_mamas_2:des_ex_mamas_2,
                des_ex_mamasgen:des_ex_mamasgen,
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
                        title: "Ingreso de examen Clinico de mamas.",
                        text: 'Registro con Exito.',
                        icon: "success"
                    });
                    registro_examen_sol_exam_mama();
                    $('#modal_evaluacion_mamas').modal('hide');
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
                        title: "Ingreso de examen Clinico de mamas.",
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
                    title: "Ingreso de examen Clinico de mamas.",
                    text: 'Sin Retorno de Registro, Intente nuevamente.',
                    icon: "error"
                });
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function cargar_examen_clinico_mama()
    {
        let id_ficha_atencion = $('#id_fc').val();
        let id_paciente = $('#id_paciente_fc').val();
        let id_profesional = $('#id_profesional_fc').val();

        let url = '{{ route("gine.obste.mamas.exam.clini.ver") }}';
        $.ajax({
            url: url,
            type: "get",
            data: {
                id_ficha_gineco_obstetrica:id_ficha_atencion,
                id_paciente:id_paciente,
                id_profesional:id_profesional,
            },
        })
        .done(function(data) {
            console.log(data)

            if (data != null)
            {
                if(data.estado == '1')
                {
                    $('#modal_evaluacion_mamas_lado_1').val(data.registro.lado_1);
                    $('#modal_evaluacion_mamas_des_ex_mamas_1').val(data.registro.des_ex_mamas_1);
                    $('#modal_evaluacion_mamas_lado_2').val(data.registro.lado_2);
                    $('#modal_evaluacion_mamas_des_ex_mamas_2').val(data.registro.des_ex_mamas_2);
                    $('#modal_evaluacion_mamas_des_ex_mamasgen').val(data.registro.des_ex_mamasgen);

                    validar_evaluacion();
                }
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    /** registro de orden solicitud de examan*/
    function indicar_examen_sol_exam_mama()
    {

        var otro = $('#modal_evaluacion_mamas_sol_ex_lado').val();

        var id_examenes = $('#modal_evaluacion_mamas_sol_ex_tipo').val();
        var real_examenes = $('#modal_evaluacion_mamas_sol_ex_tipo option:selected').attr('data-nombre_real');
        var examen = $('#modal_evaluacion_mamas_sol_ex_tipo option:selected').html();

        var urgencia = 2;
        var txt_urgencia = 'Media';

        var prioridad = $('#modal_evaluacion_mamas_enf_cuadrante').val();

        var sospecha = $('#modal_evaluacion_mamas_sosp_dg').val();

        var observacion = $('#modal_evaluacion_mamas_sol_ex_mamas_esp').val();

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
            $("#modal_evaluacion_mamas_table .tr_examen_sol_exam_mama").find('td:hidden:first').each(function (index, element) {
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


        if( otro=='' )
        {
            valido = 0;
            mensaje += 'Debe seleccionar lado\n';
        }


        if(valido == 1)
        {
            $('.examenes_sin_registros').remove();
            var i = $('#modal_evaluacion_mamas_table tr').length; //contador para asignar id al boton que borrara la fila
            var fila = '';

            var id_reg = '';
            id_reg = id_examenes;
            fila += '<tr class="tr_examen_sol_exam_mama" id="row' + i + '">';
            fila += '    <td class="text-center align-middle" style="display:none;">'+id_reg+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">'+real_examenes+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">'+examen+'</td>';
            fila += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+real_examenes+'<br><span style="font-size:8px">'+examen+'</span></td>';
            fila += '    <td class="text-center align-middle">'+otro+'</td>';
            fila += '    <td class="text-center align-middle">Ginecobstetra</td>';
            fila += '    <td class="text-center align-middle">'+txt_urgencia+'</td>';
            fila += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
            fila += '    <td class="text-center align-middle">'+sospecha+'</td>';
            fila += '    <td class="text-center align-middle">'+prioridad+'</td>';
            fila += '    <td class="text-center align-middle">'+observacion+'</td>';
            fila += '    <td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_sol_exam_mama(\'row' + i + '\');">Quitar</div></td>';
            fila += '</tr>';

            $('#modal_evaluacion_mamas_table tbody').append(fila);

            $('#modal_evaluacion_mamas_sol_ex_lado').val('');
            $('#modal_evaluacion_mamas_sol_ex_tipo').val('');
            $('#modal_evaluacion_mamas_enf_cuadrante').val('');
            $('#modal_evaluacion_mamas_sosp_dg').val('');
            $('#modal_evaluacion_mamas_sol_ex_mamas_esp').val('');

            cargar_estudios();

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

    function eliminar_examen_sol_exam_mama(id_row)
    {
        $('#modal_evaluacion_mamas_table [id='+id_row+']').remove();
    }

    function registro_examen_sol_exam_mama()
    {
        // ID -> 0
        // NOMBRE REAL -> 1
        // NOMBRE ESPECIALIDAD -> 2
        // NOMBRE EXAMEN -> 3
        // LADO -> 4
        // TIPO -> 5
        // PRIORIDAD -> 6
        // CON CONTRASTE -> 7
        // SOSPECHA -> 8
        // ÉNFASIS -> 9
        // OBSERVACIÓN -> 10
        var rows1 = [];
        $('#modal_evaluacion_mamas_table tr').each(function(i, n) {
            if (i > 0) {
                rol = {};
                var data = $(this).find("td");
                rol["id_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                rol["nombre_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                rol["nombre_examen_especialidad"] = $.trim($(data[2]).text().split("\n").join(""));
                rol["lado"] = $.trim($(data[4]).text().split("\n").join(""));
                rol["tipo"] = $.trim($(data[5]).text().split("\n").join(""));
                rol["prioridad"] = $.trim($(data[6]).text().split("\n").join(""));
                rol["con_contraste"] = $.trim($(data[7]).text().split("\n").join(""));
                rol["sospecha"] = $.trim($(data[8]).text().split("\n").join(""));
                rol["enfasis"] = $.trim($(data[9]).text().split("\n").join(""));
                rol["observacion"] = $.trim($(data[10]).text().split("\n").join(""));

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
                    ver_examenes_sol_exam_mama();
                }
                else
                {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: 'Falla en el registro, Intente nuevamente.',
                        icon: "warning",
                    });
                    ver_examenes_sol_exam_mama();
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

    function ver_examenes_sol_exam_mama()
    {

        let url = "{{ route('examenes.ver_examenes') }}";
        var _token = CSRF_TOKEN;
        var id_ficha = $('#id_fc').val();
        $('#modal_evaluacion_mamas_table tbody').html('');

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
                console.log('----------modal_evaluacion_mamas-------------');
                console.log('----------ver_examenes_sol_exam_mama-------------');
                console.log(data);
                console.log('-----------------------');
                var html = '';

                if(data.estado == 1)
                {
                    let prioridad = ['', 'Baja', 'Media','Alta','Urgente'];
                    $.each(data.registros, function(index, value)
                    {
                        html += '<tr class="tr_examen_sol_exam_mama" id="row' + index + '">';

                        // ID -> 0
                        html += '    <td class="text-center align-middle" style="display:none">'+value.id_examen+'</td>';
                        // NOMBRE REAL -> 1
                        html += '    <td class="text-center align-middle" style="display:none">'+value.examen+'</td>';

                        // NOMBRE ESPECIALIDAD -> 2
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

                        // NOMBRE EXAMEN -> 3
                        html += '    <td class="text-center align-middle" style="text-wrap: pretty;">'+value.examen+'<br><span style="font-size:8px">'+nombre+'</span></td>';

                        // LADO -> 4
                        html += '    <td class="text-center align-middle">'+value.otro+'</td>';
                        // TIPO -> 5
                        html += '    <td class="text-center align-middle">'+value.tipo_examen+'</td>';
                        // PRIORIDAD -> 6
                        html += '    <td class="text-center align-middle">'+prioridad[value.id_prioridad]+'</td>';
                        // CON CONTRASTE -> 7
                        html += '    <td class="text-center align-middle" style="display:none;">N/A</td>';
                        // SOSPECHA -> 8
                        html += '    <td class="text-center align-middle">'+value.sospecha+'</td>';
                        // ÉNFASIS -> 9
                        html += '    <td class="text-center align-middle">'+value.prioridad+'</td>';
                        // OBSERVACIÓN -> 10
                        html += '    <td class="text-center align-middle">'+value.observacion+'</td>';
                        html += '    <td class="text-center align-middle"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_sol_exam_mama(\'row' + index + '\');">Quitar</div></td>';
                        html += '</tr>';
                    });

                }
                else
                {

                    html += '<tr class="examenes_sin_registros">';
                    html += '    <td class="text-center align-middle " colspan="11">'+data.msj+'</td>';
                    html += '</tr>';

                }

                $('#modal_evaluacion_mamas_table tbody').html(html);
            }
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

</script>
