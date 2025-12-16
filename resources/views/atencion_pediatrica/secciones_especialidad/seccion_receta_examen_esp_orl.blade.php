<!--INDICACIONES ESPECIALIDAD ORL-->
{{-- <div class="row">
    <div class="col-sm-12 col-md-12 text-center">
        <p class="my-0">Completar diagnóstico para activar botones</p>
    </div>
</div> --}}
<div class="row">
    @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
    <div class="col-sm-12 col-md-6 text-center">
        <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
            <button type="button" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1" onclick="i_audif();"><i class="feather icon-plus"></i>Receta de Audífono</button>
            <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-warning btn-sm mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i>Ver PDF</button>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
            <button type="button" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1" onclick="i_examen_esporl();"><i class="feather icon-plus"></i>Examen Especialidad</button>
            <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-warning btn-sm mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i>Ver PDF</button>
        </div>
    </div>
    @else
    <div class="col-sm-12 col-md-6 text-center">
        <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
            <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1" onclick="i_audif();"><i class="feather icon-plus"></i>Receta de Audífono</button>
            <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-warning btn-sm mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i>Ver PDF</button>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
            <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1" onclick="i_examen_esporl();"><i class="feather icon-plus"></i>Examen Especialidad</button>
            <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-warning btn-sm mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i>Ver PDF</button>
        </div>
    </div>
    @endif
</div>

@section('Modals-med-exa-esp')
    @include('atencion_medica.formularios.modal_atencion_especialidad.otorrino.indicar_audifono')
    @include('atencion_medica.formularios.modal_atencion_especialidad.otorrino.indicar_examen_orl')
@endsection

@section('page-script-med-exa-esp')
    {{--  SCRIPT MEDICAMENTOS EXAMENES ESPECIALIDAD ORL --}}
    <script>
        $(document).ready(function() {
            {{--  desactivar checbox si es bilateral  --}}
            $('#modal_audifono_bi').change(function(){
                if($('#modal_audifono_bi').is(':checked'))
                {
                    {{--  console.log('cambio bilateral');  --}}
                    $( "#modal_audifono_od" ).prop( "checked", false );
                    $( "#modal_audifono_oi" ).prop( "checked", false );

                    $('#div_modal_audifono_especificacion_od').hide();
                    $('#modal_audifono_especificacion_od').val('');

                    $('#div_modal_audifono_especificacion_oi').hide();
                    $('#modal_audifono_especificacion_oi').val('');

                    $('#div_modal_audifono_especificacion_bi').show();
                }
                else
                {
                    $('#div_modal_audifono_especificacion_bi').hide();
                    $('#modal_audifono_especificacion_bi').val('');
                }
            });

            $('#modal_audifono_od').change(function(){
                if($('#modal_audifono_od').is(':checked'))
                {
                    $('#div_modal_audifono_especificacion_od').show();
                    $('#modal_audifono_especificacion_od').val('');

                    $( "#modal_audifono_bi" ).prop( "checked", false );
                    $('#div_modal_audifono_especificacion_bi').hide();
                    $('#modal_audifono_especificacion_bi').val('');
                }
                else
                {
                    $('#div_modal_audifono_especificacion_od').hide();
                    $('#modal_audifono_especificacion_od').val('');
                }
            });

            $('#modal_audifono_oi').change(function(){
                if($('#modal_audifono_oi').is(':checked'))
                {
                    $('#div_modal_audifono_especificacion_oi').show();
                    $('#modal_audifono_especificacion_oi').val('');

                    $( "#modal_audifono_bi" ).prop( "checked", false );
                    $('#div_modal_audifono_especificacion_bi').hide();
                    $('#modal_audifono_especificacion_bi').val('');
                }
                else
                {
                    $('#div_modal_audifono_especificacion_oi').hide();
                    $('#modal_audifono_especificacion_oi').val('');
                }
            });

        });

        function registrar_audifono()
        {
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();
            let tipo = $('#modal_audifono_tipo').val();

            var od = 0;
            if($('#modal_audifono_od').is(':checked'))
                od = 1;
            let especificacion_od = $('#modal_audifono_especificacion_od').val();

            var oi = 0;
            if($('#modal_audifono_oi').is(':checked'))
                oi = 1;
            let especificacion_oi = $('#modal_audifono_especificacion_oi').val();

            var bi = 0;
            if($('#modal_audifono_bi').is(':checked'))
                bi = 1;
            let especificacion_bi = $('#modal_audifono_especificacion_bi').val();

            let especificacion_general = $('#modal_audifono_especificacion_general').val();

            var _token = CSRF_TOKEN;

            var mensaje = '';
            var valido = 1;
            if( od == 0 && oi == 0 && bi == 0 )
            {
                mensaje = 'Debe seleccionar al menos una opción\n';
                valido = 0
            }

            if(valido == 1)
            {
                let url = "{{ route('profesional.registrar_audifono') }}";
                $.ajax({

                        url: url,
                        type: "post",
                        data: {
                            _token: _token,
                            id_ficha_atencion: id_ficha_atencion,
                            id_paciente: id_paciente,
                            id_profesional: id_profesional,
                            tipo: tipo,
                            od: od,
                            especificacion_od: especificacion_od,
                            oi: oi,
                            especificacion_oi: especificacion_oi,
                            bi: bi,
                            especificacion_bi: especificacion_bi,
                            especificacion_general: especificacion_general,
                        },
                    })
                    .done(function(data) {
                        {{--  console.log(data)  --}}

                        if (data != null)
                        {
                            console.log(data)

                            if(data.estado == '1'){
                                $('#indicar_audif').modal('hide');
                                swal({
                                    title: "Receta Audífono",
                                    text: 'Registrados con Exito.',
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                            }
                            else
                            {
                                swal({
                                    title: "Receta Audífono",
                                    text: 'Falla en el registro, Intente nuevamente.',
                                    icon: "warning",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                            }
                        }
                        else
                        {
                            swal({
                                title: "Ingreso de examen(es).",
                                text: 'Sin Retorno de Registro, Intente nuevamente.',
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                        }
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        console.log(jqXHR, ajaxOptions, thrownError)
                    });
            }
            else
            {
                swal({
                    title: "Receta Audífono.",
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
                return false;
            }
        }

        function cargar_receta_audifono()
        {
            let id_ficha_atencion = $('#id_fc').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();

            let url = "{{ route('profesional.ver_audifono') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion: id_ficha_atencion,
                        id_paciente: id_paciente,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(data) {
                    {{--  console.log(data)  --}}

                    if (data != null)
                    {
                        {{--  console.log(data)  --}}

                        if(data.estado == '1'){

                            $('#modal_audifono_tipo').val(data.registros.tipo);

                            if(data.registros.od == 1)
                                $("#modal_audifono_od" ).prop( "checked", true );
                            if($('#modal_audifono_od').is(':checked')) $('#div_modal_audifono_especificacion_od').show();
                            else $('#div_modal_audifono_especificacion_od').hide();
                            $('#modal_audifono_especificacion_od').val(data.registros.especificacion_od);

                            if(data.registros.oi == 1)
                                $("#modal_audifono_oi" ).prop( "checked", true );
                            if($('#modal_audifono_oi').is(':checked')) $('#div_modal_audifono_especificacion_oi').show();
                            else $('#div_modal_audifono_especificacion_oi').hide();
                            $('#modal_audifono_especificacion_oi').val(data.registros.especificacion_oi);

                            if(data.registros.bi == 1)
                                $("#modal_audifono_bi" ).prop( "checked", true );
                            if($('#modal_audifono_bi').is(':checked'))
                            {
                                $('#div_modal_audifono_especificacion_od').hide();
                                $('#modal_audifono_especificacion_od').val('');

                                $('#div_modal_audifono_especificacion_oi').hide();
                                $('#modal_audifono_especificacion_oi').val('');

                                $('#div_modal_audifono_especificacion_bi').show();
                            }
                            else
                            {
                                $('#div_modal_audifono_especificacion_bi').hide();
                            }
                            $('#modal_audifono_especificacion_bi').val(data.registros.especificacion_bi);

                            $('#modal_audifono_especificacion_general').val(data.registros.especificacion_general);


                        }

                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function mostrar_otros(select, div, valor_cambio)
        {
            let seleccion = $('#'+select);
            let div_mostrar = $('#'+div);
            if(seleccion.val() == valor_cambio)
            {
                div_mostrar.show();
            }
            else
            {
                div_mostrar.hide();
            }
        }


        function indicar_examen_orl()
        {
            let tipo_ex_lab_orl = $('#tipo_ex_lab_orl').val();
            let tipo_ex_lab_orl_nombre = $('#tipo_ex_lab_orl option:selected').text();
            let otro_examen_examen_orl = $('#otro_examen_examen_orl').val();

            let tipo_ex_rx_orl = $('#tipo_ex_rx_orl').val();
            let tipo_ex_rx_orl_nombre = $('#tipo_ex_rx_orl option:selected').text();
            let tipo_ex_rx_orl_contraste = $('#tipo_ex_rx_orl option:selected').attr('data-contraste');
            let otro_examen_examen_rx_orl = $('#otro_examen_examen_rx_orl').val();

            let examen_esp_orl_prioridad = $('#examen_esp_orl_prioridad option:selected').text();

            let examen_esp_orl_examen = $('#examen_esp_orl_examen').val();

            var valido  = 1;
            var mensaje = '';

            if(tipo_ex_lab_orl=='' && tipo_ex_rx_orl==''){
                valido = 0;
                mensaje = 'Debe seleccionar al menos un examen\n';
            }

            if(valido == 1)
            {

                $('.examenes_sin_registros').remove();

                var i = $('#tabla_examen_esp_orl tr').length; //contador para asignar id al boton que borrara la fila

                if(tipo_ex_lab_orl != '' && tipo_ex_lab_orl != 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_orl" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap">' + tipo_ex_lab_orl_nombre + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Otorrinolarinolaringológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_orl_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_orl tr:first').after(fila);
                }
                else if(otro_examen_examen_orl !='' && tipo_ex_lab_orl == 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_orl" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap">' + otro_examen_examen_orl + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Otorrinolarinolaringológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_orl_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_orl tr:first').after(fila);
                }

                if(tipo_ex_rx_orl != '' && tipo_ex_rx_orl != 'otro')
                {
                    var fila = '';
                        fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                        fila +=     '<td class="text-center align-middle text-wrap">' + tipo_ex_rx_orl_nombre + '</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">Otorrinolarinolaringológico</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_orl_prioridad + '</td>';
                        var text_con_contraste = 'Sin Contraste';
                        if(tipo_ex_rx_orl_contraste == 1)
                            text_con_contraste = 'Con Contraste';
                        fila +=     '<td class="text-center align-middle text-wrap">' + text_con_contraste + '</td>';
                        fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl(\'row' + i + '\');">Quitar</div></td>';
                        fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_orl tr:first').after(fila);


                    $('#tabla_examen_esp_orl tr').each(function(key, value)
                    {
                        $(value).find('td').each(function(key_td, value_td)
                        {
                            if(key_td == 0)
                            {
                                if($(value_td).text() == 'CREATININA EN SANGRE')
                                {
                                    creatinina = 1;
                                }
                            }
                        });
                    });

                    if(creatinina == 0)
                    {
                        fila = '';
                        fila += '<tr class="tr_examen_cirugia CREATININA" id="row' + i + '">';
                        fila +=     '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">SANGRE</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">Media</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                        fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl_contraste(\'row' + i + '\');creatinina=1;">Quitar</div></td>';
                        fila += '</tr>';
                        $('#tabla_examen_esp_orl tr:first').after(fila);
                        i++;
                        creatinina = 1;
                    }
                }
                else if(otro_examen_examen_rx_orl !='' && tipo_ex_lab_orl == 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_orl" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap">' + otro_examen_examen_rx_orl + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Otorrinolarinolaringológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_orl_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_orl tr:first').after(fila);
                }

                $('#tipo_ex_lab_orl').val('');
                $('#otro_examen_examen_orl').val('');
                $('#tipo_ex_rx_orl').val('');
                $('#otro_examen_examen_rx_orl').val('');
                $('#examen_esp_orl_examen').val('');
                $('#examen_esp_orl_prioridad').val('2');

                mostrar_otros('tipo_ex_lab_orl','div_otros_examen_orl','otro');
                mostrar_otros('tipo_ex_rx_orl','div_otros_examen_rx_orl','otro');
            }
            else
            {
                swal({
                    title: "Ingreso de examen(es).",
                    text:mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            }


        }

        function eliminar_examen_orl(id_row){
            $('#tabla_examen_esp_orl [id='+id_row+']').remove();
        }

        function eliminar_examen_orl_contraste(id_row)
        {
            swal({
                title: "Eliminar Examen relacionado con contraste.",
                text: 'Al "Aceptar" Elimina el examen relacionado con contraste.\n',
                icon: "warning",
                buttons: ["Aceptar", 'Cancelar'],
            }).then((result) => {
                if (result == true)
                {
                    console.log('regresar');
                }
                else
                {
                    $('#tabla_examen_esp_orl [id='+id_row+']').remove();
                    creatinina = 0;
                }
            });
        }

        function registro_examen_ficha_orl() {
            var rows1 = [];
            $('#tabla_examen_esp_orl tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#examenes_esp').val(JSON.stringify(rows1));

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
                        id_ficha_atencion: id_ficha_atencion,
                        id_profesional: id_profesional,
                        id_paciente: id_paciente,
                        tipo_ficha: tipo_ficha,
                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        {{--  data = JSON.parse(data);  --}}
                        console.log(data)

                        if(data.falla == '0'){
                            swal({
                                title: "Ingreso de examen(es).",
                                text: 'Examenes registrados con Exito.',
                                icon: "success",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            });
                            $('#indicar_examen_orl').modal('hide');
                        }
                        else
                        {
                            if(data.estado == '1')
                            {
                                swal({
                                    title: "Ingreso de examen(es).",
                                    text: 'Examenes Actualizados con Exito.',
                                    icon: "success",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                                $('#indicar_examen_orl').modal('hide');
                            }
                            else
                            {
                                swal({
                                    title: "Ingreso de examen(es).",
                                    text: 'Falla en el registro, Intente nuevamente.',
                                    icon: "warning",
                                    // buttons: "Aceptar",
                                    //SuccessMode: true,
                                });
                            }
                        }



                    } else {

                        swal({
                            title: "Ingreso de examen(es).",
                            text: 'Sin Retorno de Registro, Intente nuevamente.',
                            icon: "error",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
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
            $('#tabla_examen_esp_orl').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_ficha_atencion:id_ficha
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_examenes_ficha_medica-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';

                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Examen</th>';
                    html += '        <th class="text-center align-middle">Tipo</th>';
                    {{--  html += '        <th class="text-center align-middle">Sub-Tipo</th>';  --}}
                    html += '        <th class="text-center align-middle">Prioridad</th>';
                    html += '        <th class="text-center align-middle">Con Contraste</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';

                    if(data.estado == 1)
                    {
                        let prioridad = ['', 'Baja', 'Media','Alta','Urgente'];
                        $.each(data.registros, function(index, value)
                        {

                            if(value.examen == 'CREATININA EN SANGRE')
                            {
                                html += '<tr class="tr_examen_cirugia" id="row' + index + '">';
                                html += '    <td class="text-center align-middle text-wrap">'+value.examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl_contraste(\'row' + index + '\');">Quitar</div></td>';
                                html += '</tr>';
                            }
                            else
                            {

                                html += '<tr class="tr_examen_cirugia" id="row' + index + '">';
                                html += '    <td class="text-center align-middle text-wrap">'+value.examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_orl(\'row' + index + '\');">Quitar</div></td>';
                                html += '</tr>';
                            }
                        });

                    }
                    else
                    {

                        html += '<tr class="examenes_sin_registros">';
                        html += '    <td class="text-center align-middle " colspan="5">'+data.msj+'</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_examen_esp_orl').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

    </script>
@endsection
