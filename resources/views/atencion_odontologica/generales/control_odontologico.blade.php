@php $counter = 1000; @endphp

<div class="row">
    <div class="col-9">
        <ul class="nav nav-tabs-aten nav-fill" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link-aten text-reset active" id="pieza-individual-tab" data-toggle="pill" href="#pieza-individual" role="tab" aria-controls="pieza-individual" aria-selected="true">Pieza Individual</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link-aten text-reset" id="grupo-piezas-tab" onclick="$('#n_pieza_evol_g1000').select2();" data-toggle="pill" href="#grupo-piezas" role="tab" aria-controls="grupo-piezas" aria-selected="false">Grupo de Piezas</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            
            <!-- TAB PIEZA INDIVIDUAL -->
            <div class="tab-pane fade show active" id="pieza-individual" role="tabpanel" aria-labelledby="pieza-individual-tab">
                <div class="card-informacion">
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div class="form-group col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <select name="n_pieza_evol{{ $counter }}" id="n_pieza_evol{{ $counter }}" class="form-control form-control-sm" onchange="dame_tratamientos_pieza_gral(this.value, {{ $counter }},'pieza')">
                                        <option value="">Seleccione</option>
                                        @foreach($odontograma as $odont)
                                            @if($odont->urgencia == 0)
                                            <option value="{{ $odont->pieza }}">{{ $odont->pieza }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <select name="proc_evol{{ $counter }}" id="proc_evol{{ $counter }}" onchange="dame_estado_prestacion(this.value, {{ $counter }})" class="form-control form-control-sm">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Evolución</label>
                                    <textarea class="form-control form-control-sm" name="evolucion_evol{{ $counter }}" id="evolucion_evol{{ $counter }}" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-1">
                                <button type="button" id="btn_cambiar_estado_{{ $counter }}" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_evolucion({{ $counter }})" disabled><i class="feather icon-repeat"> </i> </button>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="badge badge-warning" style="font-size: 15px;" id="estado_prestacion{{ $counter }}"></div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-icon btn-outline-success" onclick="guardar_evolucion_tto_gral({{ $counter }})"><i class="feather icon-save"></i></button>
                    </div>
                </div>
            </div>

            <!-- TAB GRUPO DE PIEZAS -->
            <div class="tab-pane fade" id="grupo-piezas" role="tabpanel" aria-labelledby="grupo-piezas-tab">
                <div class="card-informacion">
                    <div class="card-body">
                        <div class="form-row align-items-center">
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Piezas</label>
                                    <select name="n_pieza_evol_g{{ $counter }}" id="n_pieza_evol_g{{ $counter }}" class="form-control form-control-sm" multiple="multiple" onchange="dame_tratamientos_pieza_gral(this.value, {{ $counter }},'grupo')">
                                        @foreach($odontograma as $odont)
                                            @if($odont->urgencia == 0)
                                            <option value="{{ $odont->pieza }}">{{ $odont->pieza }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Procedimiento</label>
                                    <select name="proc_od_gral_grupo{{ $counter }}" id="proc_od_gral_grupo{{ $counter }}" class="form-control form-control-sm">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Observaciones</label>
                                    <input type="text" name="obs_od_gral_grupo{{ $counter }}" id="obs_od_gral_grupo{{ $counter }}" class="form-control form-control-sm" />
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Evoluciones</label>
                                    <input type="text" name="evoluciones_od_gral_grupo{{ $counter }}" id="evoluciones_od_gral_grupo{{ $counter }}" class="form-control form-control-sm" />
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-sm btn-outline-success" onclick="guardar_evolucion_tto_gral_grupo({{ $counter }})"><i class="feather icon-save"></i> Prestación terminada</button>
                    </div>
                </div>
            </div>

            <div id="contenedor_evoluciones_od_gral"></div>
        </div>
    </div>
    <div class="col-3">
        <div class="row">
            <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card-informacion" style="border: 1px solid #6c9bd5;">
                    <div class="card-top text-center">
                        <h5 class="text-c-blue">
                            PRÓXIMO
                            CONTROL
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                <h5 class="text-c-blue">
                                    <i class="fas fa-calendar"></i>
                                    Fecha:
                                </h5>
                                <h5 class="font-weight-bold">
                                    <span id="proxima_fecha_atencion_od_gral"></span>
                                </h5>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-center">
                                <h5 class="text-c-blue">
                                    <i class="fas fa-clock"></i>
                                    Horario:
                                </h5>
                                <p id="proxima_hora_atencion_od_gral"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-primary btn-block" onclick="hora_medica_pedir({{ $profesional->id }}, {{ $id_lugar_atencion }})">
                    <i class="feather icon-calendar"></i>
                    Agendar hora</button>
            </div>
        </div>

    </div>
</div>


<script>
    function guardar_pieza_dental_tto_gral(counter){
        // Aquí puedes agregar la lógica para guardar la pieza dental
        console.log("Guardando pieza dental:", counter);
        let pieza = $('#n_pieza_ex_pp' + counter).val();
        let procedimiento = $('#proc_od_gral' + counter).val();
        let respCalor = $('#sel_endo_resp_calor' + counter).val();
        let respFrio = $('#sel_endo_resp_frio' + counter).val();
        let respElect = $('#sel_endo_resp_elect' + counter).val();
        let respPerc = $('#sel_endo_resp_perc' + counter).val();
        let respExpl = $('#sel_endo_resp_expl' + counter).val();
        let respCavitaria = $('#sel_endo_cavitaria' + counter).val();

        let valido = 1;
        let mensaje = "";

        if(pieza == ""){
            mensaje += "Debe seleccionar una pieza dental. <br>";
            valido = 0;
        }
        if(procedimiento == "" || procedimiento == "0"){
            mensaje += "Debe seleccionar un procedimiento. <br>";
            valido = 0;
        }
        if(respCalor == ""){
            mensaje += "Debe seleccionar la respuesta al calor. <br>";
            valido = 0;
        }
        if(respFrio == ""){
            mensaje += "Debe seleccionar la respuesta al frío. <br>";
            valido = 0;
        }
        if(respElect == ""){
            mensaje += "Debe seleccionar la respuesta eléctrica. <br>";
            valido = 0;
        }
        if(respPerc == ""){
            mensaje += "Debe seleccionar la respuesta a la percusión. <br>";
            valido = 0;
        }
        if(respExpl == ""){
            mensaje += "Debe seleccionar la respuesta a la exploración. <br>";
            valido = 0;
        }
        if(respCavitaria == ""){
            mensaje += "Debe seleccionar la respuesta a la cavitaria. <br>";
            valido = 0;
        }

        if(valido == 0){
            swal({
                title:'Error',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: mensaje
                    }
                },
                icon: "error",
            });
            return false;
        } else {
            // Aquí puedes agregar la lógica para guardar la pieza dental
            console.log("Guardando pieza dental:", counter);
            let url = "{{ route('profesional.adm_dental.guardar_pieza_dental_tto_gral') }}";
            let data = {
                pieza: pieza,
                procedimiento: procedimiento,
                respCalor: respCalor,
                respFrio: respFrio,
                respElect: respElect,
                respPerc: respPerc,
                respExpl: respExpl,
                respCavitaria: respCavitaria,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            };

            $.ajax({
                url: url,
                type:'post',
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Guardando pieza dental...',
                        text: 'Por favor, espere.',
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        content: {
                            element: "div",
                            attributes: {
                                innerHTML: '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'
                            }
                        }
                    });
                },
                success: function(response) {
                    swal.close();
                    console.log(response);
                    if (response.mensaje == 'OK') {
                        swal({
                            title: 'Éxito',
                            text: 'La pieza dental se guardó correctamente.',
                            icon: 'success',
                        });
                        let odontograma = response.odontograma;
                        let table = $('#presup_estado_pago').DataTable();

                        // Limpiar la tabla antes de agregar nuevas filas
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else{
                                    var estado = 'TERMINADO';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.descripcion,
                                    odonto.pieza,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    '<div class="circle '+clase+'"></div>',
                                    estado, // Columna vacía

                                ]).draw(false).node(); // Obtener el nodo de la fila

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }
                        });
                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"> </i> </button></td>
                                </tr>`;
                                $('#table_pagos_reasignar_odontograma tbody').append(fila);
                            }
                        });
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Ocurrió un error al guardar la pieza dental.',
                            icon: 'error',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la pieza dental.',
                        icon: 'error',
                    });
                }
            });
        }
    }

    function guardar_evolucion_tto_gral(counter){
        let pieza = $('#n_pieza_evol' + counter).val();
        let evolucion = $('#evolucion_evol' + counter).val();
        let obs = $('#obs_evol' + counter).val();
        let proc = $('#proc_evol' + counter).val();

        let valido = 1;
        let mensaje = "";

        if(!pieza){
            valido = 0;
            mensaje += " - Pieza\n";
        }
        if(!evolucion){
            valido = 0;
            mensaje += " - Evolución\n";
        }
        // if(!obs){
        //     valido = 0;
        //     mensaje += " - Observaciones\n";
        // }
        if(!proc || proc == 0){
            valido = 0;
            mensaje += " - Procedimiento\n";
        }

        if(valido == 1){
            // Guardar evolución
            let data = {
                pieza: pieza,
                evolucion: evolucion,
                obs: obs,
                proc: proc,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            }

            let url = "{{ route('dental.guardar_evolucion_od_gral') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Cargando',
                        text: 'Por favor espere...',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    console.log(response);
                    if (response.estado == 'ok') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución guardada correctamente.',
                            icon: 'success',
                        });
                        dame_evoluciones_od_gral();
                        limpiar_evolucion();
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Ocurrió un error al guardar la evolución.',
                            icon: 'error',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la evolución.',
                        icon: 'error',
                    });
                }
            });

        }else{
            swal({
                title: 'Advertencia',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: "Debe completar los siguientes campos:<br>" + mensaje
                    }
                },
                icon: 'warning',
            });
        }
    }

    function limpiar_evolucion(){
        $('#n_pieza_evol1000').val(0);
        $('#proc_evol1000').val(0);
        $('#evolucion_evol1000').val("");
        $('#btn_cambiar_estado_1000').prop('disabled', false);
        $('#estado_prestacion1000').html('');
    }

    function guardar_evolucion_tto_gral_grupo(counter){
        let piezas = $('#n_pieza_evol_g' + counter).val();
        let id_procedimiento = $('#proc_od_gral_grupo' + counter).val();
        let obs = $('#obs_od_gral_grupo' + counter).val();
        let evolucion = $('#evoluciones_od_gral_grupo' + counter).val();

        let valido = 1;
        let mensaje = "";

        if(!piezas){
            valido = 0;
            mensaje += " - Piezas\n";
        }

        if(!id_procedimiento){
            valido = 0;
            mensaje += " - Procedimiento\n";
        }

        if(valido == 1){
            // Guardar evolución
            let data = {
                piezas: piezas,
                evolucion: evolucion,
                obs: obs,
                proc: id_procedimiento,
                id_ficha_atencion: $('#id_fc').val(),
                id_paciente: $('#id_paciente').val(),
                id_profesional: $('#id_profesional_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                id_presupuesto: $('#id_presupuesto').val(),
                _token: CSRF_TOKEN
            }

            let url = "{{ route('dental.guardar_evolucion_od_gral') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                beforeSend: function(){
                    swal({
                        title: 'Cargando',
                        text: 'Por favor espere...',
                        icon: 'info',
                        buttons: false,
                        closeOnClickOutside: false
                    });
                },
                success: function(response) {
                    console.log(response);
                    if (response.estado == 'ok') {
                        swal({
                            title: 'Éxito',
                            text: 'Evolución guardada correctamente.',
                            icon: 'success',
                        });
                        dame_evoluciones_od_gral();
                    } else {
                        swal({
                            title: 'Error',
                            text: 'Ocurrió un error al guardar la evolución.',
                            icon: 'error',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al guardar la evolución.',
                        icon: 'error',
                    });
                }
            });

        }else{
            swal({
                title: 'Advertencia',
                content:{
                    element: "div",
                    attributes: {
                        innerHTML: "Debe completar los siguientes campos:<br>" + mensaje
                    }
                },
                icon: 'warning',
            });
        }
    }

    function dame_tratamientos_pieza_gral(pieza, counter, tipo){
        let id_paciente = $('#id_paciente').val();
        let id_ficha_atencion = $('#id_fc').val();
        if(pieza){
            $.ajax({
                url: "{{ route('dental.dame_tratamientos_pieza_gral') }}",
                type: 'POST',
                data: {
                    n_pieza: pieza,
                    id_paciente: id_paciente,
                    id_ficha_atencion: id_ficha_atencion,
                    _token: CSRF_TOKEN
                },
                success: function(response) {
                    console.log(response);
                    if(response.error){
                        swal({
                            title: "Error",
                            text: response.error,
                            icon: "error",
                            button: "Aceptar",
                        });
                        return false;
                    }
                    if(tipo == 'grupo'){
                        $('#proc_od_gral_grupo' + counter).val(0);
                        $('#proc_od_gral_grupo' + counter).empty();
                        $('#proc_od_gral_grupo' + counter).append('<option value="0">Seleccione</option>');
                        $.each(response.tratamientos, function(index, value) {
                            if(value.urgencia == 0){
                                $('#proc_od_gral_grupo' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                            }
                        });
                    } else {
                        $('#proc_evol' + counter).val(0);
                        $('#proc_evol' + counter).empty();
                        $('#proc_evol' + counter).append('<option value="0">Seleccione</option>');
                        $.each(response.tratamientos, function(index, value) {
                            if(value.urgencia == 0){
                                $('#proc_evol' + counter).append('<option value="' + value.id + '">' + value.tratamiento + '</option>');
                            }
                                
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close();
                    swal({
                        title: 'Error',
                        text: 'Ocurrió un error al obtener los procedimientos.',
                        icon: 'error',
                    });
                }

                
            });
        }
    }

    function dame_estado_prestacion(id_proc, counter) {
        $.ajax({
            url: "{{ route('dental.dame_estado_prestacion') }}",
            type: 'POST',
            data: {
                id_procedimiento: id_proc,
                _token: CSRF_TOKEN
            },
            success: function(response) {
                console.log(response);
                if (response.error) {
                    // swal({
                    //     title: "Error",
                    //     text: response.error,
                    //     icon: "error",
                    //     button: "Aceptar",
                    // });
                    $('#estado_prestacion' + counter).html('');
                    $('#btn_cambiar_estado_' + counter).prop('disabled', true);
                    return false;
                }
                // Actualizar el estado de la prestación en el formulario
                $('#estado_prestacion' + counter).html(response.estado);
                $('#btn_cambiar_estado_' + counter).prop('disabled', false);
            },
            error: function(xhr, status, error) {
                swal.close();
                swal({
                    title: 'Error',
                    text: 'Ocurrió un error al obtener el estado de la prestación.',
                    icon: 'error',
                });
            }
        });
    }
</script>
