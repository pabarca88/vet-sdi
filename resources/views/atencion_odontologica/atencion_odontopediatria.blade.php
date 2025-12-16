@extends('template.dental.template_odonto_ped')
@section('styles')
    <style>
        /* .imagen_rx {
            width: 200px;
            height: 200px;
        } */

        .ui-autocomplete {
            z-index: 9999999 !important;
            position: absolute;
        }
        .imagen-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }
        .imagen-card {
            position: relative;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 8px;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            max-width: 150px;
        }
        .imagen-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            border-color: #007bff;
        }
        .imagen-card img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            border-radius: 4px;
            cursor: pointer;
        }
        .imagen-card .btn-delete {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            background: #dc3545;
            border: 2px solid white;
            color: white;
        }
        .imagen-card .btn-delete:hover {
            background: #c82333;
        }
        .no-imagenes {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            background-color: #f8f9fa;
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
                    <div class="row align-items-center pb-2">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="text-white d-inline f-16 mt-1"><strong>ATENCIÓN ODONTOPEDIATRÍA</strong></h5>
                                <p class="font-italic mt-0 mb-0 text-white">
                                    @php
                                        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                                        $fecha = \Carbon\Carbon::parse(now());
                                        $mes = $meses[($fecha->format('n')) - 1];
                                        $fecha = $fecha->format('d') . ' de ' . $mes . ' de ' . $fecha->format('Y');
                                    @endphp
                                    {{ $fecha }}
                                </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            {{--  <div class="page-header-title">
                                <button type="button" class="btn btn-outline-light btn-sm d-inline float-md-right mr-4 mb-1">Finalizar atención</button>
                            </div>  --}}
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
                                        <a class="nav-link text-reset active" id="atender-tab" data-toggle="tab" href="#atender" role="tab" aria-controls="atender" aria-selected="true">Atender paciente</a>
                                    </li>
                                    {{--  <li class="nav-item">
										@if(!empty(session('lic_token')) && session('lic_estado') == 1)
										<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#licencia" role="tab" aria-controls="licencia" aria-selected="false" onclick="cargar_licencias();">Licencia</a>
										@else
											<a class="nav-link text-reset" id="licencia-tab" data-toggle="tab" href="#" role="tab" aria-controls="licencia" aria-selected="false" onclick="abrir_autorizacion();">Licencia</a>
										@endif
                                    </li>  --}}
                                    {{--  <li class="nav-item">
                                        @if (request('token'))
                                            <a class="nav-link text-reset" id="fmu-tab" data-toggle="tab" href="#fmu" role="tab" aria-controls="fmu" aria-selected="false">FMU</a>
                                        @else
                                            @php
                                                $url_temp = 'Profesional/Paciente/Ficha_consulta?_token='.request('_token').'&id_hora_realizar='.request('id_hora_realizar').'&lugar_atencion_id='.request('lugar_atencion_id').'';
                                            @endphp
                                            <a class="nav-link text-reset" id="fmu-tab" href="{{ ROUTE('check_sdi', ['id_recept' => $paciente->id_usuario,'urla'=> $url_temp,'urln' => $url_temp, 'id_tipo' => 9]) }}">FMU</a>
                                        @endif
                                    </li>  --}}
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="aten-previas-tab" data-toggle="tab" href="#aten-previas" role="tab" aria-controls="aten-previas" aria-selected="false">Historial de consultas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="band_exam_tab" data-toggle="tab" href="#band_exam" role="tab" aria-controls="band_exam" aria-selected="false">Exámenes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-reset" id="hospitalizacion-tab" data-toggle="tab" href="#hospitalizacion" role="tab" aria-controls="Paciente hospitalizado" aria-selected="false">Hospitalización</a>
                                    </li>
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
                            @include('atencion_odontologica.secciones_especialidad.ficha_odontopediatria')
                        </div>
                        <!--Licencia-->
                        <!--Licencia-->
                        {{--  <div class="tab-pane fade show" id="licencia" role="tabpanel" aria-labelledby="licencia-tab">
                            @include('general.secciones_ficha.licencia')
                        </div>  --}}
                        <!--Ficha Médica Única-->
                        {{--  <div class="tab-pane fade show" id="fmu" role="tabpanel" aria-labelledby="fmu-tab">
                            @include('general.secciones_ficha.fmu')
                        </div>  --}}
                        <!--Atenciones previas-->
                        <div class="tab-pane fade show" id="aten-previas" role="tabpanel" aria-labelledby="aten-previas-tab">
                            @include('general.secciones_ficha.atenciones_previas_form')
                        </div>
                         <!--Exámenes-->
                        <div class="tab-pane fade show" id="band_exam" role="tabpanel" aria-labelledby="band_exam_tab">
                            @include('general.secciones_ficha.bandeja_examenes')
                        </div>
                        <!--Hospitalización-->
						<div class="tab-pane fade show" id="hospitalizacion" role="tabpanel" aria-labelledby="hospitalizacion-tab">
                            @include('general.hospitalizacion.hospitalizacion')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDE BAR IMPLANTOLOGIA -->
        @include("atencion_odontologica.modales"){{-- base de botones de sidebar --}}
        @include("atencion_odontologica.include.sidebar_derecho_odonto_ped"){{-- modales y data de sidebar especialidad --}}
        @include('atencion_odontologica.formularios_dentales_tons.pedido_material_trabajo.pedido_insumos_materiales')
        @include('general.secciones_ficha.receta_examen.modal_recetario_sdi')
        @include('atencion_odontologica.modals.odontograma.modal_insumos')
        @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajo')
        {{-- @include('atencion_odontologica.formularios_dentales_tons.laboratorio_dental.m_trabajoM') --}}
                @include('atencion_odontologica.formularios.Antecedentes_dentales.anestesia')
        @include('atencion_odontologica.formularios.Antecedentes_dentales.hemorragias')
        @include('atencion_odontologica.formularios.Antecedentes_dentales.fracturas')


        <!--Modals de especialidad -->
        {{--  @include("../modals_generales/autorizacion_acompa.php");  --}}

        <!--Modals formularios generales-->
        @include("atencion_medica.formularios.modal_atencion_general.modal_indicar_examenes")
        {{-- @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.modal_indicar_medicamentos")
        @include("atencion_medica.formularios.modal_atencion_especialidad.otorrino.m_interconsulta")  --}}

    </div>
@include('app.profesional.modales.boton_flotante_agenda_autorizacion')
<input type="hidden" name="id_examen_oral_rx" id="id_examen_oral_rx" value="">
<input type="hidden" name="id_imagenes_dental" id="id_imagenes_dental" value="">
<input type="hidden" name="id_image_pre" id="id_image_pre" value="">
<input type="hidden" name="id_image_post" id="id_image_post" value="">
@endsection

@section('page-script')
<script>
    $(document).ready(function(){
        $('#paciente_piezas_dentales_ex_odped').select2();
        mostrar_pieza_dental_examen_odontop_();
        $('.prestacion-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "{{ route('dental.getPrestacionesLaboratorio') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $('#valor_trabajo_menor').val(ui.item.valor);
                    $(this).next('input[type="hidden"]').val(ui.item.value);
                    return false;
                }
            });
        });
    });
    
      function dame_correlativo(tipo){
        console.log(tipo);
        $.ajax({
            type: "POST",
            url: "{{ route('profesional.dame_correlativo') }}",
            data: {
                _token: CSRF_TOKEN,
                tip_doc: tipo
            },
            success: function(response) {
                console.log(response);
                if(tipo == 'Orden Trabajo Menor'){
                    $('#nro_orden_trabajo_menor').val(response.fila);
                } else if(tipo == 'Orden Trabajo Mayor'){
                    $('#nro_orden_trabajo_mayor').val(response.fila);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", error);
            }
        });
      }

      function eliminar_odontograma_urg(id) {
        swal({
                title: "¿Estás seguro?",
                text: "Una vez eliminado, no podrás recuperar este odontograma!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                confirmar_eliminar_odontograma_urg(willDelete, id);
            })
    }

    function confirmar_eliminar_odontograma_urg(willDelete, id) {
        if (willDelete) {
            let url = "{{ route('dental.eliminar_odontograma') }}";
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    ids: [id],
                    id_paciente: $('#id_paciente_fc').val(),
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
                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
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

                        let table_ = $('#table_piezas_odonto_urg').DataTable();

                        table_.clear().draw();

                        odontograma.forEach(odonto => {
                            if(pieza.estado == 0){
                                var estado = 'PENDIENTE';
                            }else if(pieza.estado == 1){
                                var estado = 'TERMINADO';
                            }else if(pieza.estado == 2){
                                var estado = 'EN PROCESO';
                            }else{
                                var estado = 'CITADO A CONTROL';
                            }
                            if(odonto.urgencia == 1){
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_.row.add([
                                    odonto.pieza,
                                    odonto.descripcion,
                                    formatoMoneda(odonto.valor),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            }
                            
                        });

                        table_.draw();

                        let table_odped = $('#table_piezas_odonto_urg_ped').DataTable();
                        // Limpiar la tabla antes de agregar nuevas filas
                        table_odped.clear().draw();

                        odontograma.forEach(function(pieza) {
                            if (pieza.urgencia == 1) {
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_odped.row.add([
                                    pieza.pieza,
                                    pieza.descripcion,
                                    formatoMoneda(formatoMoneda(pieza.valor)),
                                    '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma_urg(' +
                                    pieza.id + ')"><i class="feather icon-x"> </i> </button>' +
                                    '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza_urg(' +
                                    pieza.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                    estado

                                ]).draw(false).node(); // Obtener el nodo de la fila
                            }
                        });

                        let table_presup_urg = $('#presup_estado_pago_urg').DataTable();
                        // Limpiar la tabla antes de agregar nuevas filas
                        table_presup_urg.clear().draw();

                        // Recorrer el odontograma y agregar nuevas filas
                        odontograma.forEach(function(odonto) {

                            if (odonto.urgencia == 1) {
                                if(odonto.estado_pago == 'ok'){
                                    var clase = 'bg-success';
                                }else if(odonto.estado_pago == 'incompleto'){
                                    var clase = 'bg-warning';
                                }else{
                                    var clase = 'bg-danger';
                                }

                                if(odonto.estado == 0){
                                    var estado = 'PENDIENTE';
                                }else if(odonto.estado == 1){
                                    var estado = 'TERMINADO';
                                }else if(odonto.estado == 2){
                                    var estado = 'EN PROCESO';
                                }else{
                                    var estado = 'CITADO A CONTROL';
                                }
                                // Agregar una nueva fila a la tabla
                                let rowNode = table_presup_urg.row.add([
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

                        table_presup_urg.draw();

                        $('#table_pagos_reasignar_odontograma tbody').empty();
                        odontograma.forEach(function(odonto) {
                            if (odonto.presupuesto == 1) {
                                let fila = `<tr>
                                <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                <td>${odonto.pieza}</td>
                                <td>${formatoMoneda(odonto.valor)}</td>
                                <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
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
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

    }
    </script>
@endsection


