<div id="indicar_examenes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"  data-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen</h5>
                <button type="button" class="close" aria-label="Close"  onclick="cerrarModalExamenesFicha();">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo Examen</label>

                            <select class="form-control form-control-sm" name="tipo_examen_d" id="tipo_examen_d">
                                <option value="0">Seleccione</option>
                                @foreach ($examenMedico as $exa)
                                    <option value="{{ $exa->cod_examen }}">
                                        {{ $exa->nombre_examen }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Sub-tipo de Examen</label>

                            <select class="form-control form-control-sm" name="sub_tipo_examen_d" id="sub_tipo_examen_d">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Examen</label>
                            <select class="form-control form-control-sm" name="examen_d" id="examen_d">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Lado</label>
                            <select class="form-control form-control-sm" id="lado_d" name="lado_d">
                                <option value="0" selected>Seleccione</option>
                                <option value="Derecho">Derecho</option>
                                <option value="Izquierdo">Izquierdo</option>
                                <option value="Bilateral">Bilateral</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad_d" name="prioridad_d">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2" selected>Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-sm-12 mt-3">
                        <div class="form-group mb-1">
                            <label><strong>Con Contraste</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="imagenologia_con_contraste_d" disabled='disabled' >
                                <label for="imagenologia_con_contraste_d" class="cr"></label>
                            </div>
                            <div class="alert-primary" id="mensaje_imagenologia_con_contraste_d" style="display:none;">Acaba de seleccionar Imagen con Constraste, El examen de Creatinina fue adjuntado correctamente.</div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" onclick="indicar_examen_cirugia_d();" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i> Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <table id="tabla_examen_cirugia_d" class="table table-bordered table-sm tabla_examenes_ficha">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha y Hora</th>
                                        <th class="text-center align-middle">Nombre Examen</th>
                                        <th class="text-center align-middle">Lado</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        {{--  <th class="text-center align-middle">Sub-Tipo</th>  --}}
                                        <th class="text-center align-middle">Prioridad</th>
                                        <th class="text-center align-middle">Con Contraste</th>
                                        <th class="text-center align-middle">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($examenes_solicitados))
                                        @foreach($examenes_solicitados as $examen)
                                            <tr>
                                                <td class="text-center align-middle">{{ $examen->fecha }} {{ $examen->hora }} <br> {{ $examen->responsable }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->examen }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->lado }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->tipo_examen }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->prioridad }}</td>
                                                <td class="text-center align-middle">{{ $examen->datos_examen->imagenologia_con_contraste ? $examen->datos_examen->imagenologia_con_contraste_d : 'N/C' }}</td>
                                                <td class="text-center align-middle">
                                                    <div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia_d({{ $examen->id }});"><i class="fas fa-trash"></i></div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                {{--  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>  --}}
                {{--  <button type="button" data-dismiss="modal" class="btn btn-info">Guardar</button>  --}}
                {{--  <button type="button" onclick="alerta_registro_examen();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>  --}}
                <button type="button" onclick="registro_examen_ficha();" data-dismiss="modal" class="btn btn-info">Generar Orden de Examen</button>
            </div>
        </div>
    </div>
</div>

<script>
    function indicar_examen_cirugia_d() {

        var tipo_examen = $("#tipo_examen_d option:selected").text();
        var id_tipo_examen = $("#tipo_examen_d").val();
        var sub_tipo_examen = $("#sub_tipo_examen_d option:selected").text();
        var id_sub_tipo_examen = $("#sub_tipo_examen_d").val();
        var examen = $("#examen_d option:selected").text();
        var id_examen = $("#examen_d").val();
        var prioridad = $("#prioridad_d option:selected").text();
        var lado = $("#lado_d option:selected").text();
        var id_paciente = $('#id_paciente').val();
        var id_ficha_atencion = $('#id_fc').val();

        var imagenologia_con_contraste_d = 'N/C';
        if($('#imagenologia_con_contraste_d').is(':checked'))
            imagenologia_con_contraste_d = 'Con Contraste';

        var valido = 0;
        var mensaje = '';

        if ($.trim(tipo_examen) == '' || $.trim(tipo_examen) == 'Seleccione...' || $.trim(tipo_examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Tipo Examen\n';
        }
        if( $.trim(sub_tipo_examen) == '' || $.trim(sub_tipo_examen) == 'Seleccione...' || $.trim(sub_tipo_examen) == 'Seleccione' ){
            valido = 1;
            mensaje += ' Debe seleccionar Sub Tipo Examen\n';
        }
        if ($.trim(examen) == '' || $.trim(examen) == 'Seleccione...' || $.trim(examen) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Examen\n';
        }
        if ($.trim(prioridad) == '' || $.trim(prioridad) == 'Seleccione...' || $.trim(prioridad) == 'Seleccione') {
            valido = 1;
            mensaje += ' Debe seleccionar Prioridad\n';
        }


        if (valido == 0) {
            let data = {
                tipo_examen: tipo_examen,
                id_tipo_examen: id_tipo_examen,
                sub_tipo_examen: sub_tipo_examen,
                id_sub_tipo_examen: id_sub_tipo_examen,
                examen: examen,
                id_examen: id_examen,
                prioridad: prioridad,
                lado: lado,
                id_paciente: id_paciente,
                id_ficha_atencion: id_ficha_atencion,
                imagenologia_con_contraste_d: imagenologia_con_contraste_d,
                _token: "{{ csrf_token() }}"
            }

            var url = "{{ route('examen.indicar_examen_cirugia') }}";
            $.ajax({
                    url: url,
                    type: "post",
                    data: data,
                    dataType: "json",
                })
                .done(function(data) {
                    console.log(data);
                    if (data.estado == 'success') {
                        let examenes = data.examenes;
                        // Obtén la instancia de DataTables
                        var table = $('#tabla_examen_cirugia_d').DataTable();

                        // Limpia los datos de la tabla
                        table.clear();

                        // Agrega las nuevas filas
                        examenes.forEach(function(resp) {
                            let examen = resp.datos_examen;
                            table.row.add([
                                `${resp.fecha} ${resp.hora} <br> ${resp.responsable}`,
                                examen.examen,
                                examen.lado,
                                examen.tipo_examen,
                                examen.prioridad,
                                examen.imagenologia_con_contraste_d ? $examen.imagenologia_con_contraste_d : 'N/C',
                                `<div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia_d(${resp.id});"><i class="fas fa-trash"></i></div>`
                            ]).draw(false); // Redibuja la tabla sin reiniciar la paginación
                        });
                    } else {
                        swal({
                            title: "Ingreso de examen(es).",
                            text: data.mensaje,
                            icon: "error",
                            buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }else{
            swal({
                title: "Ingreso de examen(es).",
                text: mensaje,
                icon: "error",
                buttons: "Aceptar",
                //SuccessMode: true,
            });
        }

        // $('.examenes_sin_registros').remove();


        // if ($('#imagenologia_con_contraste_d').prop('checked')) {
        //     $('#tabla_examen_cirugia tr').each(function(key, value) {
        //         $(value).find('td').each(function(key_td, value_td) {
        //             if (key_td == 0) {
        //                 if ($(value_td).text() == 'CREATININA EN SANGRE') {
        //                     creatinina = 1;
        //                 }
        //             }
        //         });
        //     });
        //     if (creatinina == 0) {
        //         fila = '';
        //         fila += '<tr class="tr_examen_cirugia" id="row' + i + '">';
        //         fila += '<td class="text-center align-middle text-wrap">CREATININA EN SANGRE</td>';
        //         fila += '<td class="text-center align-middle text-wrap">SANGRE</td>';
        //         //fila =     '<td>' + sub_tipo_examen + '</td>';
        //         fila += '<td class="text-center align-middle text-wrap">Media</td>';
        //         fila += '<td class="text-center align-middle text-wrap">N/C</td>';
        //         fila += '<td class="text-center align-middle"><div name="remove" id="' + i +
        //             '" class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_contraste(\'row' + i +
        //             '\');"><i class="fas fa-trash"></i></div></td>';
        //         fila += '</tr>';
        //         $('#tabla_examen_cirugia tr:first').after(fila);
        //         i++;
        //         creatinina = 1;
        //     }
        // }




        $("#tipo_examen_d").val('');
        $("#sub_tipo_examen_d").val('');
        $("#examen_d").val('');
        $("#prioridad_d").val(2);
        $('#imagenologia_con_contraste_d').prop('checked', false);
        $('#mensaje_imagenologia_con_contraste_d').hide();
        $("#lado_d").val(0);
    }

    function eliminar_examen_cirugia_d(id){
        swal({
            title: "Eliminar Examen.",
            text: 'Al "Aceptar" Elimina el examen.\n',
            icon: "warning",
            buttons: ["Cancelar", 'Aceptar'],
        }).then((result) => {
            if (result == true) {
                eliminar_examen_cirugia_ajax_d(id);
            } else {
                console.log('regresar');
            }
        })


    }

    function eliminar_examen_cirugia_ajax_d(id){
        var url = "{{ route('examen.eliminar_examen_cirugia') }}";
        var id_paciente = $('#id_paciente').val();
        var id_ficha_atencion = $('#id_fc').val();
        $.ajax({
                url: url,
                type: "post",
                data: {
                    id: id,
                    id_paciente: id_paciente,
                    id_ficha_atencion: id_ficha_atencion,
                    _token: "{{ csrf_token() }}"
                },
                dataType: "json",
            })
            .done(function(data) {
                console.log(data);
                if (data.estado == 'success') {
                    let examenes = data.examenes;
                    var table = $('#tabla_examen_cirugia_d').DataTable();


                    // Limpia los datos de la tabla
                    table.clear().draw();
                    console.log(examenes.length);
                    // Agrega las nuevas filas
                    examenes.forEach(function(resp) {
                        let examen = resp.datos_examen;
                        table.row.add([
                            `${resp.fecha} ${resp.hora} <br> ${resp.responsable}`,
                            examen.examen,
                            examen.lado,
                            examen.tipo_examen,
                            examen.prioridad,
                            examen.imagenologia_con_contraste_d ? examen.imagenologia_con_contraste_d : 'N/C',
                            `<div class="btn btn-danger btn_remove btn-sm" onclick="eliminar_examen_cirugia_d(${resp.id});"><i class="fas fa-trash"></i></div>`
                        ]).draw(false); // Redibuja la tabla sin reiniciar la paginación
                    });
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "success",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                } else {
                    swal({
                        title: "Ingreso de examen(es).",
                        text: data.mensaje,
                        icon: "error",
                        buttons: "Aceptar",
                        //SuccessMode: true,
                    });
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
    }
</script>
