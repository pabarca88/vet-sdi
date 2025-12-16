<!--INDICACIONES ESPECIALIDAD OFTALMOLOGIA-->
{{-- <div class="row">
    <div class="col-sm-12 col-md-12 text-center">
        <p class="my-0">Completar diagnóstico para activar botones</p>
    </div>
</div> --}}
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="row">
        @if (isset($fichaAtencion) && $fichaAtencion->hipotesis_diagnostico != null)
        <div class="col-sm-12 col-md-6 text-center">
            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                <button type="button" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1" onclick="i_lente();"><i class="feather icon-plus"></i>Receta de lentes</button>
                <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-warning btn-sm mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i>Ver PDF</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                <button type="button" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1" onclick="i_examen_espoft();"><i class="feather icon-plus"></i>Examen Especialidad</button>
                <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-warning btn-sm mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i>Ver PDF</button>
            </div>
        </div>
        @else
        <div class="col-sm-12 col-md-6 text-center">
            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                <button type="button" disabled="disabled" id="btn_agregar_medicamento" class=" btn_agregar_medicamento btn btn-info btn-sm mt-1" onclick="i_lente();"><i class="feather icon-plus"></i>Receta de lentes</button>
                <button type="button" onclick="ver_pdf_receta($('#id_fc').val());" class=" btn_medicamento_pdf btn btn-warning btn-sm mt-1" id="btn_medicamento_pdf"><i class="feather icon-file"></i>Ver PDF</button>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="btn-group btn-group-sm w-100" data-toggle="buttons">
                <button type="button" disabled="disabled" id="btn_agregar_examen" class=" btn_agregar_examen btn btn-info btn-sm mt-1" onclick="i_examen_espoft();"><i class="feather icon-plus"></i>Examen Especialidad</button>
                <button type="button" onclick="ver_pdf_orden_examenes($('#id_fc').val());" class=" btn_examenes_pdf btn btn-warning btn-sm mt-1" id="btn_examenes_pdf"><i class="feather icon-file"></i>Ver PDF</button>
            </div>
        </div>
        @endif
    </div>
</div>
@section('Modals-med-exa-esp')
    @include('atencion_medica.formularios.modal_atencion_especialidad.oftalmologia.indicar_lentes')
    @include('atencion_medica.formularios.modal_atencion_especialidad.oftalmologia.indicar_examen_oft')
@endsection
@section('page-script-med-exa-esp')
    {{--  SCRIPT MEDICAMENTOS EXAMENES ESPECIALIDAD ORL --}}
    <script>
        $(document).ready(function() {

        });


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


        function indicar_examen_oft()
        {
            let tipo_ex_lab_oft = $('#tipo_ex_lab_oft').val();
            let tipo_ex_lab_oft_multi_examen = $('#tipo_ex_lab_oft option:selected').attr('data-multicodigo');
            let tipo_ex_lab_oft_nombre = $('#tipo_ex_lab_oft option:selected').text();
            let tipo_ex_lab_oft_nombre_real = $('#real_tipo_ex_lab_oft').html();
            let otro_examen_examen_oft = $('#otro_examen_examen_oft').val();

            let tipo_ex_rx_oft = $('#tipo_ex_rx_oft').val();
            let tipo_ex_rx_oft_multi_examen = $('#tipo_ex_rx_oft option:selected').attr('data-multicodigo');
            let tipo_ex_rx_oft_nombre = $('#tipo_ex_rx_oft option:selected').text();
            let tipo_ex_rx_oft_nombre_real = $('#real_tipo_ex_rx_oft').html();
            // let tipo_ex_rx_oft_contraste = $('#tipo_ex_rx_oft option:selected').attr('data-contraste');
            let tipo_ex_rx_oft_contraste = $('#imagenologia_con_contraste_ex_rx_oft').prop('checked');
            let otro_examen_examen_rx_oft = $('#otro_examen_examen_rx_oft').val();

            let lado_ex_lab_oft = $("#lado_ex_lab_oft option:selected").text();
            let lado_ex_rx_oft = $("#lado_ex_rx_oft option:selected").text();
            // let imagenologia_con_contraste_ex_rx_oft = $('#imagenologia_con_contraste_ex_rx_oft').prop('checked');

            let examen_esp_oft_prioridad = $('#examen_esp_oft_prioridad option:selected').text();

            let examen_esp_oft_examen = $('#examen_esp_oft_examen').val();

            var valido  = 1;
            var mensaje = '';



            if(tipo_ex_lab_oft=='' && tipo_ex_rx_oft==''){
                valido = 0;
                mensaje = 'Debe seleccionar al menos un examen\n';
            }

            if(valido == 1)
            {

                $('.examenes_sin_registros').remove();

                var i = $('#tabla_examen_esp_oft tr').length; //contador para asignar id al boton que borrara la fila

                if(tipo_ex_lab_oft != '' && tipo_ex_lab_oft != 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_oft" id="row' + i + '">';

                    var id_tipo_ex_lab_oft ='';
                    if(tipo_ex_lab_oft_multi_examen == '')
                        id_tipo_ex_lab_oft = tipo_ex_lab_oft;
                    else
                        id_tipo_ex_lab_oft = tipo_ex_lab_oft_multi_examen;
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + id_tipo_ex_lab_oft + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + tipo_ex_lab_oft_nombre_real + '</td>';


                    fila +=     '<td class="text-center align-middle text-wrap">' + tipo_ex_lab_oft_nombre + '</td>';
                    if(lado_ex_lab_oft == 'Seleccione')
                        fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                    else
                        fila +=     '<td class="text-center align-middle text-wrap">' + lado_ex_lab_oft + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Oftalmológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_oft_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_oft tr:first').after(fila);
                }
                else if(otro_examen_examen_oft !='' && tipo_ex_lab_oft == 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_oft" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap">' + otro_examen_examen_oft + '</td>';
                    if(lado_ex_lab_oft == 'Seleccione')
                        fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                    else
                        fila +=     '<td class="text-center align-middle text-wrap">' + lado_ex_lab_oft + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Oftalmológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_oft_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_oft tr:first').after(fila);
                }

                if(tipo_ex_rx_oft != '' && tipo_ex_rx_oft != 'otro')
                {
                    var fila = '';
                        fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
                        var id_tipo_ex_rx_oft ='';
                        if(tipo_ex_rx_oft_multi_examen == '')
                            id_tipo_ex_rx_oft = tipo_ex_rx_oft;
                        else
                            id_tipo_ex_rx_oft = tipo_ex_rx_oft_multi_examen;
                        fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + id_tipo_ex_rx_oft + '</td>';
                        fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + tipo_ex_rx_oft_nombre_real + '</td>';

                        fila +=     '<td class="text-center align-middle text-wrap">' + tipo_ex_rx_oft_nombre + '</td>';
                        if(lado_ex_rx_oft == 'Seleccione')
                            fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                        else
                            fila +=     '<td class="text-center align-middle text-wrap">' + lado_ex_rx_oft + '</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">Oftalmológico</td>';
                        fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_oft_prioridad + '</td>';
                        var text_con_contraste = 'Sin Contraste';
                        if(tipo_ex_rx_oft_contraste == true)
                            text_con_contraste = 'Con Contraste';
                        fila +=     '<td class="text-center align-middle text-wrap">' + text_con_contraste + '</td>';
                        fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft(\'row' + i + '\');">Quitar</div></td>';
                        fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_oft tr:first').after(fila);

                    if(tipo_ex_rx_oft_contraste == true)
                    {
                        $('#tabla_examen_esp_oft tr').each(function(key, value)
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
                            fila +=     '<td class="text-center align-middle text-wrap" style="display:none">78</td>';
                            fila +=     '<td class="text-center align-middle text-wrap" style="display:none">CREATININA EN SANGRE</td>';
                            fila +=     '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
                            fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                            fila +=     '<td class="text-center align-middle text-wrap">SANGRE</td>';
                            fila +=     '<td class="text-center align-middle text-wrap">Media</td>';
                            fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                            fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft_contraste(\'row' + i + '\');creatinina=1;">Quitar</div></td>';
                            fila += '</tr>';
                            $('#tabla_examen_esp_oft tr:first').after(fila);
                            i++;
                            creatinina = 1;
                        }
                    }


                }
                else if(otro_examen_examen_rx_oft !='' && tipo_ex_lab_oft == 'otro')
                {
                    var fila = '';
                    fila += '<tr class="tr_examen_esp_oft" id="row' + i + '">';
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">0</td>';
                    fila +=     '<td class="text-center align-middle text-wrap" style="display:none">' + otro_examen_examen_rx_oft + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + otro_examen_examen_rx_oft + '</td>';
                    if(lado_ex_rx_oft == 'Seleccione')
                        fila +=     '<td class="text-center align-middle text-wrap"> </td>';
                    else
                        fila +=     '<td class="text-center align-middle text-wrap">' + lado_ex_rx_oft + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">Oftalmológico</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">' + examen_esp_oft_prioridad + '</td>';
                    fila +=     '<td class="text-center align-middle text-wrap">N/C</td>';
                    fila +=     '<td class="text-center align-middle"><div name="remove" id="' + i +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft(\'row' + i + '\');">Quitar</div></td>';
                    fila += '</tr>';

                    i++;
                    $('#tabla_examen_esp_oft tr:first').after(fila);
                }

                $('#tipo_ex_lab_oft').val('');
                $('#otro_examen_examen_oft').val('');
                $('#tipo_ex_rx_oft').val('');
                $('#otro_examen_examen_rx_oft').val('');
                $('#examen_esp_oft_examen').val('');
                $('#examen_esp_oft_prioridad').val('2');
                $('#lado_ex_rx_oft').val('0');
                $('#lado_ex_lab_oft').val('0');
                $('#imagenologia_con_contraste_ex_rx_oft').prop('checked', false);
                $('#mensaje_imagenologia_con_contraste_ex_rx_oft').hide();

                mostrar_otros('tipo_ex_lab_oft','div_otros_examen_oft','otro');
                mostrar_otros('tipo_ex_rx_oft','div_otros_examen_rx_oft','otro');
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

        function eliminar_examen_oft(id_row){
            $('#tabla_examen_esp_oft [id='+id_row+']').remove();
        }

        function eliminar_examen_oft_contraste(id_row)
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
                    $('#tabla_examen_esp_oft [id='+id_row+']').remove();
                    creatinina = 0;
                }
            });
        }

        function registro_examen_ficha_oft() {
            var rows1 = [];
            $('#tabla_examen_esp_oft tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["nombre_examen"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["lado"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["nombre_examen_especialidad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[4]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[6]).text().split("\n").join(""));

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
                            $('#indicar_examen_oft').modal('hide');
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
                                $('#indicar_examen_oft').modal('hide');
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
            $('#tabla_examen_esp_oft').html('');

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
                    html += '        <th class="text-center align-middle" style="display:none">id</th>';
                    html += '        <th class="text-center align-middle" style="display:none">Nombre Real</th>';
                    html += '        <th class="text-center align-middle">Nombre Examen</th>';
                    html += '        <th class="text-center align-middle">Lado</th>';
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

                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.id_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.examen+'</td>';
                                var nombre = '';
                                if(value.examen_especialidad == '' || value.examen_especialidad == null)
                                    nombre = value.examen;
                                else
                                    nombre = value.examen_especialidad;
                                html += '    <td class="text-center align-middle text-wrap">'+nombre+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.otro+'</td>';

                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft_contraste(\'row' + index + '\');">Quitar</div></td>';
                                html += '</tr>';
                            }
                            else
                            {

                                html += '<tr class="tr_examen_cirugia" id="row' + index + '">';

                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.id_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap" style="display:none">'+value.examen+'</td>';
                                var nombre = '';
                                if(value.examen_especialidad == '' || value.examen_especialidad == null)
                                    nombre = value.examen;
                                else
                                    nombre = value.examen_especialidad;
                                html += '    <td class="text-center align-middle text-wrap">'+nombre+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.otro+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+value.tipo_examen+'</td>';
                                html += '    <td class="text-center align-middle text-wrap">'+prioridad[value.id_prioridad]+'</td>';
                                var text_con_contraste = 'N/C';
                                if(value.con_contraste == 1)
                                    text_con_contraste = 'Con Contraste';
                                html += '    <td class="text-center align-middle text-wrap">'+text_con_contraste+'</td>';
                                html += '    <td class="text-center align-middle text-wrap"><div name="remove" id="' + index +'" class="btn btn-danger btn_remove" onclick="eliminar_examen_oft(\'row' + index + '\');">Quitar</div></td>';
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
                    $('#tabla_examen_esp_oft').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function buscar_examen_real(input_otigen,label_destino)
        {
            let valor = $('#'+input_otigen).val();
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

    </script>
@endsection
