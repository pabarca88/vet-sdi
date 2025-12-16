@extends('template.dental.template_od_impl')
@section('styles')
    <style>
        .imagen_rx {
            width: 200px;
            height: 200px;
        }

        .ui-autocomplete {
            z-index: 9999999 !important;
            position: absolute;
        }
    </style>
@endsection

@section('Content')
    <!--Container Completo-->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!--Header-->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1 float-left"><strong>ATENCIÓN IMPLANTOLOGÍA</strong>
                                </h5>
                                <h6 class="font-weight-bold mt-0 mb-0 text-white float-md-right">
                                    @php
                                        $meses = [
                                            'Enero',
                                            'Febrero',
                                            'Marzo',
                                            'Abril',
                                            'Mayo',
                                            'Junio',
                                            'Julio',
                                            'Agosto',
                                            'Septiembre',
                                            'Octubre',
                                            'Noviembre',
                                            'Diciembre',
                                        ];
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[$fecha->format('n') - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Cierre: Header-->
            <!-- TAB ATENCIÓN -->
            <div class="user-profile user-card pt-0">
                <div class="card-body py-0">
                    <div class="user-about-block m-0">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs profile-tabs nav-fill mt-2" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab"
                                            href="#atender" role="tab" aria-controls="atender"
                                            aria-selected="true">Atender paciente</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        @if (!empty(session('lic_token')) && session('lic_estado') == 1)
                                            <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab"
                                                href="#licencia" role="tab" aria-controls="licencia"
                                                aria-selected="false" onclick="cargar_licencias();">Licencia</a>
                                        @else
                                            <a class="nav-link text-reset" id="licencia-tab" data-toggle="tab"
                                                href="#" role="tab" aria-controls="licencia" aria-selected="false"
                                                onclick="abrir_autorizacion();">Licencia</a>
                                        @endif
                                    </li>
                                    <li class="nav-item">
                                        @if (request('token'))
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu"
                                                role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            @php
                                                $url_temp =
                                                    'Profesional/Paciente/Ficha_consulta?_token=' .
                                                    request('_token') .
                                                    '&id_hora_realizar=' .
                                                    request('id_hora_realizar') .
                                                    '&lugar_atencion_id=' .
                                                    request('lugar_atencion_id') .
                                                    '';
                                            @endphp
                                            <a class="nav-link text-reset" id="fmu-tab"
                                                href="{{ ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario, 'urla' => $url_temp, 'urln' => $url_temp, 'id_tipo' => 9]) }}">FMU</a>
                                        @endif
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab"
                                            href="#aten-previas" role="tab" aria-controls="aten-previas"
                                            aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam_tab" data-toggle="tab"
                                            href="#band_exam" role="tab" aria-controls="band_exam"
                                            aria-selected="false">Exámenes</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab"
                                            href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado"
                                            aria-selected="false">Hospitalización</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab general-->
            <!--Contenido de tab-->
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-od_impl">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            @include('atencion_odontologica.secciones_especialidad.ficha_implantologia')
                        </div>
                        <!--Licencia-->
                        {{-- <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            @include('general.secciones_ficha.licencia')
                        </div>
                        <!--Ficha Médica Única-->
                        <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('general.secciones_ficha.fmu')
                        </div> --}}
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel"
                            aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
                        <!--Exámenes-->
                        <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                            @include('general.secciones_ficha.bandeja_examenes')
                        </div>
                        <!--Hospitalización-->
                        <div class="tab-pane fade show" id="hospitalizacion" role="tabpanel"
                            aria-labelledby="hospitalizacion-tab">
                            @include('general.hospitalizacion.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR IMPLANTOLOGIA -->
        @include('atencion_odontologica.modales'){{-- base de botones de sidebar --}}
        @include('atencion_odontologica.include.sidebar_derecho_odonto_impl'){{-- modales y data de sidebar especialidad --}}

        <!-- RECETARIO -->
         @include('general.secciones_ficha.receta_examen.modal_recetario_sdi')
         {{-- @include('general.secciones_ficha.seccion_receta_examen_comunes') --}}

        <!--Modals de especialidad -->
        @include('atencion_odontologica.formularios.Antecedentes_dentales.anestesia')
        @include('atencion_odontologica.formularios.Antecedentes_dentales.hemorragias')
        @include('atencion_odontologica.formularios.Antecedentes_dentales.fracturas')
        @include('atencion_odontologica.include.modales.imagenes_paciente_dental')
        @include('atencion_odontologica.include.modales.imagen_paciente_dental')
        @include('atencion_odontologica.generales.includes.modales.recomendaciones_generales_implan')
        @include('atencion_odontologica.generales.includes.modales.recomendaciones_especiales_implan')

        @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajoM')
        @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajo')
        @include('atencion_odontologica.formularios_dentales_tons.pedido_material_trabajo.pedido_insumos_materiales')

        @include('general.hospitalizacion.modals.in_solic_pabellon')

    </div>
    @include('app.profesional.modales.boton_flotante_agenda_autorizacion')
    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
    <input type="hidden" name="id_examen_oral_rx" id="id_examen_oral_rx" value="">
    <input type="hidden" name="id_imagenes_dental" id="id_imagenes_dental" value="">
@endsection

@section('js_inferior')
    <script>
        
        $(document).ready(function() {
            // swal({
            //     icon: 'info',
            //     title: 'En Construcción',
            //     text: 'Esta página se encuentra en desarrollo.',
            //     confirmButtonText: 'Aceptar'
            // });
            $('#table_atenciones_previas_trabajos').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
            $('#tabla_antecedentes_paciente').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
            $('#table_insumos_tto').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
            $('#presup_estado_pago').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
                }
            });
            $('#presup_estado_pago_gral').DataTable();
            $('#presup_insumos_pago').DataTable();
            $('#table_odontograma').DataTable();
            $('#table_pagos_presupuesto').DataTable();
            $('#table_insumos_preimplante').DataTable();
            // declarar una variable integer random entre el 10 y el 20
            var random = Math.floor(Math.random() * (20 - 10 + 1)) + 10;
            mostrar_nueva_pieza_dental(random);
            mostrar_nueva_pieza_ex_radio(random);
            mostrar_nuevas_imagenes_dent(random);
            mostrar_pieza_dental_examen(random);
            
            $('#numero_pieza_tto_impl1000').select2();
            
        });


        function cargar_a_presupuesto(id, tipo = null, elemento = null) {
            let url = "{{ ROUTE('dental.cargar_tratamiento_presupuesto') }}";
            let data = {
                id: id,
                tipo: tipo,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (tipo == null) {
                        if (resp.status == 1) {
                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: resp.mensaje
                            });
                            let odontograma = resp.odontograma_paciente;
                            let html = '';
                            odontograma.forEach(function(odonto) {
                                html += '<tr>';
                                html += '<td>' + odonto.fecha + '</td>';
                                html += '<td>' + odonto.tratamiento + '</td>';
                                html += '<td>' + odonto.caras + '</td>';
                                html += '<td>' + odonto.pieza + '</td>';
                                html += '<td>' + odonto.diagnostico + '</td>';
                                html += '<td>' + formatoMoneda(formatoMoneda(odonto.valor)) + '</td>';
                                // html += '<td>';
                                // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                                // if(odonto.presupuesto == 0){
                                //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                                // }else{
                                //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                                // }

                                // html += '</td>';
                                // Checkbox para seleccionar el odontograma
                                html += '<td>';
                                html += '<div class="form-check">';
                                html += '<input class="form-check-input" type="checkbox" value="' +
                                    odonto.id + '" '
                                html += odonto.presupuesto == 1 ? 'checked ' : '';
                                html += 'onchange="togglePresupuesto(' + odonto.id +
                                    ', this.checked)">';
                                html += '<label class="form-check-label"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '<td>';
                                html += '<div class="form-check">';
                                html +=
                                    '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                    odonto.id + '" ';
                                html += 'id="seleccionCheck' + odonto.id + '" ';
                                html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                                html += '<label class="form-check-label" for="seleccionCheck' + odonto
                                    .id + '"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '</tr>';
                            });

                            $('#table_odontograma tbody').html(html);
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-md-2 d-flex justify-content-center">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="fas fa-trash"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor))} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                            </td>
                                        </tr>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            // guardamos el total en un input hidden
                            $('#total_presupuesto_dental').val(total_general);
                            let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {

                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }

                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });

                        } else {
                            swal({
                                icon: 'error',
                                title: 'info',
                                text: resp.mensaje
                            });
                        }
                    } else {
                        swal({
                            icon: 'success',
                            title: 'Info',
                            text: 'Examen cargado a presupuesto con éxito.'
                        });

                        if(elemento){
                              // Cambiar clase
                                $(elemento).removeClass('btn-primary btn-sm btn-icon has-ripple')
                                        .addClass('btn-danger btn-icon');

                                // Cambiar contenido (ícono)
                                $(elemento).html('<i class="feather icon-x"></i>');

                                // Cambiar función onclick al vuelo
                                $(elemento).attr('onclick', `sacar_de_presupuesto(${id}, 'gral', this)`);
                        }

                        let valores_boca_general = resp.valores[0];
                        let valores_odontograma = resp.valores[1];
                        let valores_insumos = resp.valores[2];
                        let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                        $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                        $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                        $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                        $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                        $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                        $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                        $('#subtotal_clinico').val(formatoMoneda(total_general));
                        $('#total_clinico').val(formatoMoneda(total_general));
                        let todos = resp.todos;

                        let table = $('#presup_estado_pago_gral').DataTable();

                        // Limpiar la tabla antes de agregar nuevas filas
                        table.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        todos.forEach(function(odonto) {

                            if (odonto.presupuesto == 1) {
                                if (odonto.estado_pago == 'ok') {
                                    var clase = 'bg-success';
                                } else if (odonto.estado_pago == 'intermedio') {
                                    var clase = 'bg-warning';
                                } else {
                                    var clase = 'bg-danger';
                                }
                                if (odonto.estado == 0) {
                                    var estado = 'TERMINADO';
                                } else {
                                    var estado = 'PENDIENTE';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table.row.add([
                                    odonto.localizacion,
                                    odonto.diagnostico_tratamiento,
                                    formatoMoneda(formatoMoneda(odonto.valor)),
                                    0,
                                    formatoMoneda(odonto.valor),
                                    ' <div class="circle ' + clase + '"></div>',
                                    estado
                                ]).draw(false).node();

                                // Agregar clases a la fila
                                $(rowNode).addClass('text-center align-middle status-circle');
                            }

                        });

                        $('#contenedor_todos').empty();
                        todos.forEach(t => {
                            if (t.presupuesto == 1) {
                                $('#contenedor_todos').append(`
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-6 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-md-4 fill">
                                                            <label class="floating-label-activo-sm">Total
                                                                prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                        </div>
                                                        <div class="form-group col-md-1 fill">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>`
                                );
                            }
                        });
                        $('#table_pagos_reasignar_grupos tbody').empty();
                            todos.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.diagnostico_tratamiento}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_diagnostico(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_grupos tbody').append(fila);
                                }
                            });
                }

                    $('#tratamiento_presupuesto tbody').empty();
                    let presupuesto = resp.presupuesto;
                    console.log(presupuesto);
                    $('#tratamiento_presupuesto tbody').append(`
                        <tr>
                            <td class="text-center align-middle">${presupuesto.fecha}</td>
                            <td class="text-center align-middle">${presupuesto.id}</td>
                            <td class="text-center align-middle">${presupuesto.aprobado}</td>
                            <td class="text-center align-middle">Sector I</td>
                            <td class="text-center align-middle">${presupuesto.boca}</td>

                            <td class="text-center align-middle">
                                <div class="form-group col-md-4">
                                    <div class="switch switch-success d-inline m-r-2">
                                        <input type="checkbox" id="info_finalizado" checked="">
                                        <label for="info_finalizado" class="cr"></label>
                                    </div>
                                    <label>Realizado?</label>
                                </div>
                            </td>
                            <td class="text-center align-middle">
                            ${presupuesto.fecha}
                            </td>
                            <td class="text-center align-middle">
                                <button type="button" class="btn btn-info btn-sm" onclick="presupuesto()" ;="">
                                    <i class="fa fa-plus"></i> Trabajar en pieza
                                </button>
                            </td>
                        </tr>
                    `);

                },
                error: function(error) {
                    console.log(error.responseText);
                }
            });
        }

        function sacar_de_presupuesto(id, tipo = null, elemento = null) {
            let url = "{{ ROUTE('dental.sacar_tratamiento_presupuesto') }}";
            let data = {
                id: id,
                tipo: tipo,
                _token: "{{ csrf_token() }}"
            }
            console.log(data);
            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (tipo == null) {
                        if (resp.status == 1) {
                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: resp.mensaje
                            });
                            let odontograma = resp.odontograma_paciente;
                            let html = '';
                            odontograma.forEach(function(odonto) {
                                html += '<tr>';
                                html += '<td>' + odonto.fecha + '</td>';
                                html += '<td>' + odonto.tratamiento + '</td>';
                                html += '<td>' + odonto.caras + '</td>';
                                html += '<td>' + odonto.pieza + '</td>';
                                html += '<td>' + odonto.diagnostico + '</td>';
                                html += '<td>' + formatoMoneda(formatoMoneda(odonto.valor)) + '</td>';
                                // html += '<td>';
                                // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                                // if(odonto.presupuesto == 0){
                                //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                                // }else{
                                //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                                // }

                                // html += '</td>';
                                // Checkbox para seleccionar el odontograma
                                html += '<td>';
                                html += '<div class="form-check">';
                                html += '<input class="form-check-input" type="checkbox" value="' +
                                    odonto.id + '" '
                                html += odonto.presupuesto == 1 ? 'checked ' : '';
                                html += 'onchange="togglePresupuesto(' + odonto.id +
                                    ', this.checked)">';
                                html += '<label class="form-check-label"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '<td>';
                                html += '<div class="form-check">';
                                html +=
                                    '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                    odonto.id + '" ';
                                html += 'id="seleccionCheck' + odonto.id + '" ';
                                html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                                html += '<label class="form-check-label" for="seleccionCheck' + odonto
                                    .id + '"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '</tr>';
                            });

                            $('#table_odontograma tbody').html(html);
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            $('#numero_pieza_post_impl2000').empty();
                             $('#numero_pieza_tto_impl1000').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(formatoMoneda(odonto.valor)) } </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Cargar</button>
                                            </td>
                                        </tr>
                                    `);
                                    $('#numero_pieza_post_impl2000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                    $('#numero_pieza_tto_impl1000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                }
                            });
                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            $('#total_presupuesto_dental').val(total_general);
                            // Limpiar la tabla antes de agregar nuevas filas
                            let table = $('#presup_estado_pago').DataTable();
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
                                        estado, // Columna vacía

                                    ]).draw(false).node(); // Obtener el nodo de la fila

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }
                            });
                        } else {
                            swal({
                                icon: 'error',
                                title: 'info',
                                text: resp.mensaje
                            });
                        }
                    } else {
                        if (resp.status == 1) {

                            swal({
                                icon: 'success',
                                title: 'Info',
                                text: 'Examen retirado con éxito.'
                            });

                            if(elemento){
                                $(elemento).removeClass('btn-danger btn-icon').addClass('btn-primary btn-sm btn-icon has-ripple');
                                $(elemento).html('<i class="fas fa-save"></i>');
                                $(elemento).attr('onclick', `cargar_a_presupuesto(${id}, '${tipo}', this)`);
                            }

                            let valores_boca_general = resp.valores[0];
                            let valores_odontograma = resp.valores[1];
                            let valores_insumos = resp.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(total_general));
                            $('#total_clinico').val(formatoMoneda(total_general));
                            let todos = resp.todos;

                            let table = $('#presup_estado_pago_gral').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            todos.forEach(function(odonto) {

                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'intermedio') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'TERMINADO';
                                    } else {
                                        var estado = 'PENDIENTE';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.localizacion,
                                        odonto.diagnostico_tratamiento,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(odonto.valor),
                                        ' <div class="circle ' + clase + '"></div>',
                                        estado
                                    ]).draw(false).node();

                                    // Agregar clases a la fila
                                    $(rowNode).addClass('text-center align-middle status-circle');
                                }

                            });
                            $('#contenedor_todos').empty();
                            todos.forEach(t => {
                                if (t.presupuesto == 1 && t.urgencia == 0) {
                                    $('#contenedor_todos').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="card-informacion">
                                                    <div class="card-body pb-0">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label-activo-sm">${t.localizacion}</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-6 fill">
                                                                <label class="floating-label-activo-sm">Prestación</label>
                                                                <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${t.diagnostico_tratamiento}">
                                                            </div>
                                                            <div class="form-group col-md-4 fill">
                                                                <label class="floating-label-activo-sm">Sub-Total</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                            </div>
                                                            <div class="form-group col-sm-12 col-md-3">
                                                                <label class="floating-label-activo-sm">Descuento</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                            </div>
                                                            <div class="form-group col-md-4 fill">
                                                                <label class="floating-label-activo-sm">Total
                                                                    prestación</label>
                                                                <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(t.valor)}">
                                                            </div>
                                                            <div class="form-group col-md-1 fill">
                                                                <button type="button" class="btn btn-danger btn-icon" onclick="sacar_de_presupuesto(${t.id},'gral')"><i class="feather icon-x"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>`
                                    );
                                }
                            });

                            $('#table_pagos_reasignar_grupos tbody').empty();
                            todos.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_diagnostico(${odonto.id},'gral')"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_grupos tbody').append(fila);
                                }
                            });
                    }

                }

            },
            error: function(error){
                console.log(error.responseText);
            }
            });
        }

        function eliminar_odontograma(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "La pieza sera eliminada del presupuesto.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    confirmar_eliminar_odontograma(willDelete, id);
                })
        }

        function confirmar_eliminar_odontograma(willDelete, id) {
            if (willDelete) {
                let url = "{{ route('dental.eliminar_odontograma') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        ids: [id],
                        id_paciente: $('#id_paciente').val(),
                        id_ficha_atencion: $('#id_fc').val(),
                        id_lugar_atencion: $('#id_lugar_atencion').val(),
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            swal({
                                title: 'Odontograma',
                                text: response.mensaje,
                                icon: 'success'
                            });

                            let odontograma = response.odontograma_paciente;
                            odontograma_global = odontograma;
                            let html = '';
                            odontograma.forEach(function(odonto) {
                                html += '<tr>';
                                html += '<td>' + odonto.fecha + '</td>';
                                html += '<td>' + odonto.tratamiento + '</td>';
                                html += '<td>' + odonto.caras + '</td>';
                                html += '<td>' + odonto.pieza + '</td>';
                                html += '<td>' + odonto.diagnostico + '</td>';
                                html += '<td>' + formatoMoneda(odonto.valor) + '</td>';
                                // html += '<td>';
                                // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                                // if(odonto.presupuesto == 0){
                                //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                                // }else{
                                //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                                // }
                                // html += '</td>';
                                // Checkbox para seleccionar el odontograma
                                html += '<td>';
                                html += '<div class="form-check">';
                                html += '<input class="form-check-input" type="checkbox" value="' +
                                    odonto.id + '" '
                                html += odonto.presupuesto == 1 ? 'checked ' : '';
                                html += 'onchange="togglePresupuesto(' + odonto.id + ',this.checked)">';
                                html += '<label class="form-check-label"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '<td>';
                                html += '<div class="form-check">';
                                html +=
                                    '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                    odonto.id + '" ';
                                html += 'id="seleccionCheck' + odonto.id + '" ';
                                html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                                html += '<label class="form-check-label" for="seleccionCheck' + odonto
                                    .id + '"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '</tr>';
                            });

                            $('#table_odontograma tbody').html(html);
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            // id que representa el select de piezas post implante
                            $('#numero_pieza_post_impl2000').empty();
                            // id que representa el select de piezas pre implante
                            $('#numero_pieza_tto_impl1000').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(odonto.valor)} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                    $('#numero_pieza_post_impl2000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                    $('#numero_pieza_tto_impl1000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                }
                            });
                            let valores_boca_general = response.valores[0];
                            let valores_odontograma = response.valores[1];
                            let valores_insumos = response.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_presupuesto_dental').val(total_general);
                            $('#total_presupuesto').val(formatoMoneda(total_general));
                            $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                                valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                                total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));
                            $('#odon_adults').empty();
                            $('#odon_adults').append(response.odontograma_paciente_vista);

                            let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                            table_odon_gral.clear().draw();

                            odontograma.forEach(function(pieza) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odon_gral.row.add([
                                    pieza.pieza,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            });

                            let table_impl = $('#table_piezas_presupuesto_odonto_impl').DataTable();
                            table_impl.clear().draw();

                            odontograma.forEach(function(pieza) {
                                if(pieza.impl_rehab != 1){
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_impl.row.add([
                                        pieza.pieza,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                                
                            });

                            let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
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
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_odontograma tbody').append(fila);
                                }
                            });
                            let count = $('#random_preimpl').val();
                            let count_post_impl = $('#random_postimpl').val();
                            $('#numero_pieza_tto_impl' + count).empty();
                            $('#numero_pieza_post_impl' + count).empty();
                            odontograma.forEach(o => {
                                if (o.presupuesto == 1) {
                                    $('#numero_pieza_tto_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                    $('#numero_pieza_post_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                }

                            });
                             // Obtener piezas únicas
                            const piezasUnicas = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelect = $('#paciente_piezas_dentales_ex_impl');
                            piezasSelect.val(piezasUnicas).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas.forEach(pieza => {
                                $(`.pieza_implantologia[data-pieza_impl="${pieza}"]`).addClass('seleccionada');
                            });
                            // 🔁 Ahora recorrer el array de piezas únicas y llenar los select
                            piezasUnicas.forEach(function(pieza) {
                                $('#numero_pieza_post_impl2000').append(`<option value="${pieza}">${pieza}</option>`);
                                $('#numero_pieza_tto_impl1000').append(`<option value="${pieza}">${pieza}</option>`);
                                $('#numero_pieza_post_impl1000').append(`<option value="${pieza}">${pieza}</option>`);
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelect.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza_implantologia').each(function () {
                                    const piezaNumero = $(this).data('data-pieza_impl').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });

                             // Obtener piezas únicas
                            const piezasUnicas_od_gral = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelectOdGral = $('#paciente_piezas_dentales_ex');
                            piezasSelectOdGral.val(piezasUnicas_od_gral).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas_od_gral.forEach(pieza => {
                                $(`.pieza[data-pieza="${pieza}"]`).addClass('seleccionada');
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelectOdGral.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza').each(function () {
                                    const piezaNumero = $(this).data('pieza').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                swal("Operación cancelada");
            }

        }

        function eliminar_odontograma_rehab(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "La pieza sera eliminada del presupuesto.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    confirmar_eliminar_odontograma_rehab(willDelete, id);
                })
        }

        function confirmar_eliminar_odontograma_rehab(willDelete, id) {
            if (willDelete) {
                let url = "{{ route('dental.eliminar_odontograma') }}";
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        ids: [id],
                        id_paciente: $('#id_paciente').val(),
                        id_ficha_atencion: $('#id_fc').val(),
                        id_lugar_atencion: $('#id_lugar_atencion').val(),
                        rehab: 1,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            swal({
                                title: 'Odontograma',
                                text: response.mensaje,
                                icon: 'success'
                            });

                            let odontograma = response.odontograma_paciente;
                            odontograma_global = odontograma;
                            let html = '';
                            odontograma.forEach(function(odonto) {
                                html += '<tr>';
                                html += '<td>' + odonto.fecha + '</td>';
                                html += '<td>' + odonto.tratamiento + '</td>';
                                html += '<td>' + odonto.caras + '</td>';
                                html += '<td>' + odonto.pieza + '</td>';
                                html += '<td>' + odonto.diagnostico + '</td>';
                                html += '<td>' + formatoMoneda(odonto.valor) + '</td>';
                                // html += '<td>';
                                // html += '<button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma('+odonto.id+')"><i class="feather icon-x"></i>Eliminar</button>';
                                // if(odonto.presupuesto == 0){
                                //     html += '<button type="button" class="btn btn-primary btn-sm" onclick="cargar_a_presupuesto('+odonto.id+')"><i class="fas fa-save"></i>Cargar a presupuesto</button>';
                                // }else{
                                //     html += '<button type="button" class="btn btn-danger btn-sm" onclick="sacar_de_presupuesto('+odonto.id+')"><i class="feather icon-x"></i>Sacar de presupuesto</button>';
                                // }
                                // html += '</td>';
                                // Checkbox para seleccionar el odontograma
                                html += '<td>';
                                html += '<div class="form-check">';
                                html += '<input class="form-check-input" type="checkbox" value="' +
                                    odonto.id + '" '
                                html += odonto.presupuesto == 1 ? 'checked ' : '';
                                html += 'onchange="togglePresupuesto(' + odonto.id + ',this.checked)">';
                                html += '<label class="form-check-label"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '<td>';
                                html += '<div class="form-check">';
                                html +=
                                    '<input class="form-check-input checkbox-seleccion" type="checkbox" value="' +
                                    odonto.id + '" ';
                                html += 'id="seleccionCheck' + odonto.id + '" ';
                                html += 'onchange="toggleSeleccion(' + odonto.id + ', this.checked)">';
                                html += '<label class="form-check-label" for="seleccionCheck' + odonto
                                    .id + '"></label>';
                                html += '</div>';
                                html += '</td>';
                                html += '</tr>';
                            });

                            $('#table_odontograma tbody').html(html);
                            $('#contenedor_piezas_dentales_presupuesto').empty();
                            $('#table_trabajos_presupuesto tbody').empty();
                            // id que representa el select de piezas post implante
                            $('#numero_pieza_post_impl2000').empty();
                            // id que representa el select de piezas pre implante
                            $('#numero_pieza_tto_impl1000').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    $('#contenedor_piezas_dentales_presupuesto').append(`
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="card-informacion">
                                                <div class="card-body pb-0">
                                                    <div class="form-row">
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-1 col-xl-1 fill">
                                                            <label class="floating-label-activo-sm">Pieza</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${odonto.pieza}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-9 col-lg-4 col-xl-4 fill">
                                                            <label class="floating-label-activo-sm">Prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación" value="${odonto.descripcion}">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Sub-Total</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-3 col-lg-2 col-xl-2">
                                                            <label class="floating-label-activo-sm">Descuento</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-4 col-lg-2 col-xl-2 fill">
                                                            <label class="floating-label-activo-sm">Total prestación</label>
                                                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza" value="${formatoMoneda(formatoMoneda(odonto.valor))}" >
                                                        </div>
                                                        <div class="form-group col-sm-12 col-md-1 col-lg-1 col-xl-1 d-flex">
                                                            <button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `);
                                    $('#table_trabajos_presupuesto tbody').append(`
                                        <tr>
                                            <td>${odonto.fecha}</td>
                                            <td>${odonto.diagnostico} </td>
                                            <td>${odonto.caras} </td>
                                            <td>${odonto.pieza} </td>
                                            <td>${odonto.tratamiento} </td>
                                            <td>${formatoMoneda(odonto.valor)} </td>
                                            <td> </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm" onclick="atender_procedimiento(${odonto.id},'${odonto.tratamiento}',${odonto.pieza})"><i class="fas fa-check"></i>Atender</button>
                                            </td>
                                        </tr>
                                    `);
                                    $('#numero_pieza_post_impl2000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                    $('#numero_pieza_tto_impl1000').append(`
                                        <option value="${odonto.pieza}">${odonto.pieza}</option>
                                    `);
                                }
                            });
                            let valores_boca_general = response.valores[0];
                            let valores_odontograma = response.valores[1];
                            let valores_insumos = response.valores[2];
                            let total_general = valores_boca_general + valores_odontograma + valores_insumos;
                            $('#valores_examenes_presupuesto').html(formatoMoneda(valores_boca_general));
                            $('#valores_examenes_presupuesto_conf').html(formatoMoneda(valores_boca_general));
                            $('#valores_piezas_presupuesto').html(formatoMoneda(valores_odontograma));
                            $('#valores_piezas_presupuesto_conf').html(formatoMoneda(valores_odontograma));
                            $('#valores_total_final_presupuesto').html(formatoMoneda(total_general));
                            $('#valores_total_final_presupuesto_conf').html(formatoMoneda(total_general));
                            $('#subtotal_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_clinico').val(formatoMoneda(valores_odontograma));
                            $('#total_presupuesto_dental').val(total_general);
                            $('#total_presupuesto').val(formatoMoneda(total_general));
                            $('#monto_total').html(formatoMoneda(valores_insumos) + ' + ' + formatoMoneda(
                                valores_odontograma + valores_boca_general) + ' = ' + formatoMoneda(
                                total_general));
                            $('#monto_adeudado').html(formatoMoneda(total_general - valores_insumos));
                            $('#odon_adults').empty();
                            $('#odon_adults').append(response.odontograma_paciente_vista);

                            let table_odon_gral = $('#table_piezas_presupuesto_odonto').DataTable();
                            table_odon_gral.clear().draw();

                            odontograma.forEach(function(pieza) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odon_gral.row.add([
                                    pieza.pieza,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            });

                            let table_impl = $('#table_piezas_presupuesto_odonto_impl_rehab').DataTable();
                            table_impl.clear().draw();

                            odontograma.forEach(function(pieza) {
                                if(pieza.impl_rehab == 1){
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table_impl.row.add([
                                        pieza.pieza,
                                        pieza.diagnostico,
                                        pieza.descripcion,
                                        formatoMoneda(formatoMoneda(pieza.valor)),
                                        '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_rehab(' +
                                        pieza.id + ')"><i class="feather icon-x"> </i> </button>'

                                    ]).draw(false).node(); // Obtener el nodo de la fila
                                }
                            });

                            let table = $('#presup_estado_pago').DataTable();

                            // Limpiar la tabla antes de agregar nuevas filas
                            table.clear().draw();

                            // Recorrer el odontograma y agregar nuevas filas
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1) {
                                    if (odonto.estado_pago == 'ok') {
                                        var clase = 'bg-success';
                                    } else if (odonto.estado_pago == 'incompleto') {
                                        var clase = 'bg-warning';
                                    } else {
                                        var clase = 'bg-danger';
                                    }
                                    if (odonto.estado == 0) {
                                        var estado = 'PENDIENTE';
                                    } else {
                                        var estado = 'TERMINADO';
                                    }
                                    // Agregar una nueva fila a la tabla
                                    let rowNode = table.row.add([
                                        odonto.descripcion,
                                        odonto.pieza,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        0,
                                        formatoMoneda(formatoMoneda(odonto.valor)),
                                        '<div class="circle ' + clase + '"></div>',
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
                                    <td><button type="button" class="btn btn-danger" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_odontograma tbody').append(fila);
                                }
                            });
                            let count = $('#random_preimpl').val();
                            let count_post_impl = $('#random_postimpl').val();
                            $('#numero_pieza_tto_impl' + count).empty();
                            $('#numero_pieza_post_impl' + count).empty();
                            odontograma.forEach(o => {
                                if (o.presupuesto == 1) {
                                    $('#numero_pieza_tto_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                    $('#numero_pieza_post_impl' + count).append(`
                                    <option value="${o.pieza}">${o.pieza} </option>
                                `);
                                }

                            });
                             // Obtener piezas únicas
                            const piezasUnicas = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelect = $('#paciente_piezas_dentales_ex_impl');
                            piezasSelect.val(piezasUnicas).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas.forEach(pieza => {
                                $(`.pieza_implantologia[data-pieza_impl="${pieza}"]`).addClass('seleccionada');
                            });
                            // 🔁 Ahora recorrer el array de piezas únicas y llenar los select
                            piezasUnicas.forEach(function(pieza) {
                                $('#numero_pieza_post_impl2000').append(`<option value="${pieza}">${pieza}</option>`);
                                $('#numero_pieza_tto_impl1000').append(`<option value="${pieza}">${pieza}</option>`);
                                $('#numero_pieza_post_impl1000').append(`<option value="${pieza}">${pieza}</option>`);
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelect.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza_implantologia').each(function () {
                                    const piezaNumero = $(this).data('data-pieza_impl').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });

                             // Obtener piezas únicas
                            const piezasUnicas_od_gral = [...new Set(odontograma.map(item => item.pieza))];

                            // Seleccionar el <select> y actualizar sus valores
                            const piezasSelectOdGral = $('#paciente_piezas_dentales_ex');
                            piezasSelectOdGral.val(piezasUnicas_od_gral).trigger('change');

                            // Marcar visualmente las piezas en el odontograma
                            piezasUnicas_od_gral.forEach(pieza => {
                                $(`.pieza[data-pieza="${pieza}"]`).addClass('seleccionada');
                            });
                            // Escuchar cambios en el Select2 para actualizar el odontograma visual
                            piezasSelectOdGral.on('change', function () {
                                const piezasSeleccionadas = $(this).val() || [];

                                // Recorre todas las piezas visuales
                                $('.pieza').each(function () {
                                    const piezaNumero = $(this).data('pieza').toString();

                                    if (piezasSeleccionadas.includes(piezaNumero)) {
                                        $(this).addClass('seleccionada');
                                    } else {
                                        $(this).removeClass('seleccionada');
                                    }
                                });
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            } else {
                swal("Operación cancelada");
            }

        }

        function $('#id_paciente').val() {
            return $('#id_paciente_fc').val();
        }

        function eliminar_pieza_dental_pieza(id, tipo) {
            swal({
                    title: 'Advertencia',
                    text: '¿Está seguro de eliminar esta pieza?',
                    icon: 'warning',
                    buttons: ['Cancelar', 'Aceptar'],
                    dangerMode: true
                })
                .then((aceptar) => {
                    if (aceptar) {
                        confirmar_eliminar_pieza_dental_pieza(id, tipo);
                    } else {
                        Swal.fire('Cancelado', 'La pieza no fue eliminada :(', 'error');
                    }
                });
        }

        function confirmar_eliminar_pieza_dental_pieza(id, tipo) {
            let url = "{{ ROUTE('profesional.eliminar_pieza_dental_pieza') }}";
            let data = {
                _token: CSRF_TOKEN,
                id_paciente: $('#id_paciente').val(),
                id: id,
                id_ficha_atencion: $('#id_fc').val(),
                id_lugar_atencion: $('#id_lugar_atencion').val(),
                tipo: tipo
            }

            $.ajax({
                type: 'post',
                url: url,
                data: data,
                success: function(resp) {
                    console.log(resp);
                    if (resp.mensaje == 'OK') {
                        let examenes = resp.examenes;
                        if (tipo == 'gral') {
                            $('#contenedor_pieza_dental_endo_gral').empty();
                            $('#contenedor_pieza_dental_endo_gral').append(resp.v);

                            $('#planificacion_examenes_gral').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_gral').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else if (tipo == 'endo') {
                            $('#contenedor_pieza_dental_endo').empty();
                            $('#contenedor_pieza_dental_endo').append(resp.v);
                            $('#planificacion_examenes_endo').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_endo').append(`
                            <div class="form-row">
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Pieza N°</label>
                                        <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                            <option selected="" value="1">Uniradicular</option>
                                            <option value="2">Biradicular</option>
                                            <option value="2">Triradicular</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                        <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                        <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Convenio</label>
                                        <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                            <option selected="" value="1">Convenio</option>
                                            <option value="2">Sin Convenio</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        `);
                            });
                        } else {
                            $('#contenedor_pieza_dental_odontop_examen').empty();
                            $('#contenedor_pieza_dental_odontop_examen').append(resp.v);
                            $('#planificacion_examenes_odontop').empty();
                            examenes.forEach(examen => {
                                $('#planificacion_examenes_odontop').append(`
                        <div class="form-row">
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Pieza N°</label>
                                    <input type="text" class="form-control form-control-sm" value="${examen.numero_pieza}">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <select name="piel_tegumnto" data-titulo="Ex_cuello" data-seccion="Cuello" id="piel_tegumnto" class="form-control form-control-sm" onchange="evaluar_para_carga_detalle('piel_tegumnto','div_piel_tegumnto','obs_piel_tegumnto',2);">
                                        <option selected="" value="1">Uniradicular</option>
                                        <option value="2">Biradicular</option>
                                        <option value="2">Triradicular</option>
                                    </select>
                                </div>
                                <div class="form-group" id="div_piel_tegumnto" style="display:none;">
                                    <label class="floating-label-activo-sm">Tipo de Tratamiento</label>
                                    <textarea class="form-control form-control-sm" data-titulo="Ex_cuello" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="obs_piel_tegumnto" id="obs_piel_tegumnto"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="form-group fill">
                                    <label class="floating-label-activo-sm">Convenio</label>
                                    <select name="adenopatias" data-titulo="Ex_cuello" data-seccion="Cuello" id="adenopatias" class="form-control form-control-sm">
                                        <option selected="" value="1">Convenio</option>
                                        <option value="2">Sin Convenio</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        `);
                            });
                        }
                        swal({
                            title: 'Exito',
                            text: 'Se ha eliminado con éxito',
                            icon: 'success'
                        });

                        $('#contenedor_examenes_grupos_dentales').empty();
                        $('#contenedor_examenes_grupos_dentales').append(resp.vista_presupuestos);
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }
    </script>
@endsection
