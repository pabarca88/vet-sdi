<!DOCTYPE html>
<html lang="es">

<head>
    @include('atencion_odontologica.include.head_od_periodoncia')
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Links del REG-->
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">
    <!-- select2 selectbonito css -->
        <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">

            <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <!--Estilo periodoncia -->
    {{-- <link rel="stylesheet" href="{{ asset('js/periodoncia/style_period.css') }}"> --}}
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">

    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?t=<?= time() ?>">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>



    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
    {{--  /** agregar css */  --}}
    <!--cara dental-->
    <link rel="stylesheet" href="{{ asset('css/cara_dental.css') }}">

    <style>
        .ui-front {
            position: absolute;
            z-index: 2006;
            overflow: auto;
        }

    </style>
    @yield('css-btn-autorizacion')
    @yield('styles')
</head>
<body>
    @include('atencion_odontologica.generales.eval_periimplante')
    @include('template.header')
    @include('template.menuProfesional')
    @yield('Content')

    <!-- Modal de la vista -->
    @yield('Modals')
    @yield('Modals-med-exa')
    @yield('Modals-med-exa-esp')
    @yield('modal-ficha-general-espc')



    <!-- Modal de la vista fin -->
    <footer>
        {{--  @include('template.include.footer')  --}}
    </footer>
    <!--js periodoncia -->

    <script src="{{ asset('js/periodoncia/pincel_period.js') }}"></script>
    <script src="{{ asset('js/periodoncia/odontograma_period.js') }}"></script>
    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/documentos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

    <script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas-->
    <script src="{{ asset('js/tablas_fmu.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/tablas_control_cronicos.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="{{ asset('js/recetas_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/licencias_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Formularios Modals-->
    <script src="{{ asset('js/modals_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Tooltips-->
    <script src="{{ asset('js/tooltip_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Check-->
    <script src="{{ asset('js/check_atencion_medica.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>
    <!-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> -->

    <!-- mensajes -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

   {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('js/modals_atencion_dental.js') }}"></script>

    {{--  @include('template.templateAutorizacion')  --}}


    <!-- form-advance custom js -->
    {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}

        <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!--Apgar-->
    <script src="{{ asset('js/aicalc2.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Botón cards-->
    <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Modals Sidebar derecho-->
    <script src="{{ asset('js/modals_sidebar_esp.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas y Toggle atención ginecobstetrica-->
    <script src="{{ asset('js/atencion_especialidades.js') }}?upd={{ random_int(1111,9999) }}"></script>
    <script src="{{ asset('js/cara_dental.js') }}?upd={{ random_int(1111,9999) }}"></script>

   <script>
        window.getDiagnosticoDentalUrl = "{{ route('dental.getDiagnosticoDental') }}";
    </script>
    @routes
    <script src="{{asset('js/dental/tratamientos_dental.js')}}"></script>
    <script>
        const GUARDAR_PIEZA_URL = "{{ route('dental.guardar_pieza_periodonto') }}";
    </script>
    <script src="{{ asset('js/periodontograma.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {
            {{--  mensaje de exito al registrar ficha clinica  --}}
             @if(session('mensaje'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('mensaje') }}",
                    icon: "info",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif
            {{--  mensaje de exito al registrar ficha clinica  --}}
            @if(session('success'))
                swal({
                    title: "Registro de Ficha Clínica.",
                    text:"{{ session('success') }}",
                    icon: "success",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                });
            @endif

			{{--  mensaje de erro al registrar ficha clinica  --}}
			@if(session('error'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('error') }}",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif

			{{--  mensaje de warning al registrar ficha clinica  --}}
			@if(session('warning'))
				swal({
					title: "Registro de Ficha Clínica.",
					text:"{{ session('warning') }}",
					icon: "warning",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
			@endif

            $('#table_antecedentes_unificada').DataTable();
        });



        function abrir_modal_clasificacion_colon(){
            $('#m_clasificacion').modal('show');
        }
        function mostrar_modal_ex_rx_cirugia(){
            $('#modal_indicar_examen_rx').modal('show');
        }

         function eliminar_odontograma(id) {
            swal({
                    title: "¿Estás seguro?",
                    text: "Una vez eliminado, no podrás recuperar este odontograma!",
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

                            let table_ = $('#table_piezas_presupuesto_odonto').DataTable();

                            table_.clear().draw();

                            odontograma.forEach(odonto => {
                                if(odonto.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else if(odonto.estado == 1){
                                        var estado = 'TERMINADO';
                                    }else if(odonto.estado == 2){
                                        var estado = 'EN PROCESO';
                                    }else{
                                        var estado = 'CITADO A CONTROL';
                                    }
                                    if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_.row.add([
                                            odonto.pieza,
                                            odonto.diagnostico,
                                            odonto.descripcion,
                                            formatoMoneda(formatoMoneda(odonto.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                            odonto.id + ')"><i class="feather icon-x"> </i> </button>' +
                                            '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                            odonto.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                            estado

                                        ]).draw(false).node(); // Obtener el nodo de la fila
                                    }
                            });

                            let table_period = $('#table_piezas_presupuesto_period').DataTable();
                            table_period.clear().draw();

                            odontograma.forEach(function(odonto) {
                                    if(odonto.estado == 0){
                                        var estado = 'PENDIENTE';
                                    }else if(odonto.estado == 1){
                                        var estado = 'TERMINADO';
                                    }else if(odonto.estado == 2){
                                        var estado = 'EN PROCESO';
                                    }else{
                                        var estado = 'CITADO A CONTROL';
                                    }
                                    if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                        // Agregar una nueva fila a la tabla
                                        let rowNode = table_period.row.add([
                                            '<i class="fas fa-tooth mr-1"></i>' + odonto.pieza,
                                            odonto.diagnostico,
                                            odonto.descripcion,
                                            formatoMoneda(formatoMoneda(odonto.valor)),
                                            '<button type="button" class="btn btn-danger btn-icon" onclick="eliminar_odontograma(' +
                                            odonto.id + ')"><i class="feather icon-x"> </i> </button>' +
                                            '<button type="button" class="btn btn-warning btn-icon" onclick="cambiar_estado_pieza(' +
                                            odonto.id + ')"><i class="feather icon-repeat"> </i> </button>',
                                            estado

                                        ]).draw(false).node(); // Obtener el nodo de la fila
                                    }
                            });

                            $('#table_pagos_reasignar_odontograma tbody').empty();
                            odontograma.forEach(function(odonto) {
                                if (odonto.presupuesto == 1 && odonto.urgencia == 0) {
                                    let fila = `<tr>
                                    <td><input type="checkbox" class="valor-checkbox" data-valor="${odonto.valor}" data-id="${odonto.id}" data-info="odonto"></td>
                                    <td>${odonto.pieza}</td>
                                    <td>${formatoMoneda(odonto.valor)}</td>
                                    <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar_odontograma(${odonto.id})"><i class="feather icon-x"> </i> </button></td>
                                </tr>`;
                                    $('#table_pagos_reasignar_odontograma tbody').append(fila);
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
    <script>
        /** METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */
        function  envio_indicaciones_pdf(id_modal){
            let url = "{{ route('indicacion.medica.registro.envio') }}";
            var id_tipo_documento = 1;
            var id_paciente = $('#id_paciente_fc').val();
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_lugar_atencion = $('#id_lugar_atencion').val();
            var observacion = '';
            // var observacion = $('#observacion').val();
            var documento = '';
            var url_documento = '';
            var cuerpo = '';
            var otro = '';
            var token = CSRF_TOKEN;

            if(id_tipo_documento == 1)
            {
                documento = $('#'+id_modal+' embed').attr('data-documento');
                url_documento = $('#'+id_modal+' embed').attr('data-url');
            }
            else
            {
                // cuerpo = $('#cuerpo').val();
            }
            var datos = {};
            datos._token = token;
            datos.id_tipo_documento = id_tipo_documento;
            datos.id_paciente = id_paciente;
            datos.id_profesional = id_profesional;
            datos.id_ficha_atencion = id_ficha_atencion;
            datos.id_lugar_atencion = id_lugar_atencion;
            datos.observacion = observacion;
            datos.documento = documento;
            datos.url = url_documento;
            datos.cuerpo = cuerpo;
            datos.otro = otro;

            $.ajax({
                url: url,
                type: 'post',
                dataType: "json",
                data: datos,
                success: function(data) {
                    // console.log(data);
                    if(data.estado == 1)
                    {
                        var mensaje = '';
                        mensaje = 'Documento asignado al Paciente para visualizar en su escritorio.\n';
                        if(data.update_correo.estado == 1)
                            mensaje = 'Documento enviado por correo al Paciente.\n';
                        else
                            mensaje = 'Problema al enviar Documento por correo al Paciente.\n';

                        swal({
                            title: "Indicación Enviada al Paciente",
                            text: mensaje,
                            icon: "success",
                        });
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
                            title: "Indicación Enviada al Paciente",
                            text: data.msj+'\n'+texto_error,
                            icon: "warning",
                        });
                    }
                }
            });
        }
        /** FIN METODO PARA ENVIO DE INDICACIONES MEDICAS PDF */

        var formatoMoneda = (valor) => {
            return valor.toLocaleString('es-MX', {
                style: 'currency',
                currency: 'MXN',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        };



        function editarInformacionPaciente(){
            $('#modal_editar_paciente').modal('show');
            $('#info_paciente').css('display', 'none');
            $('#info_paciente-edit').css('display', 'block');
        }

        function cancelarInformacionPaciente(){
            $('#info_paciente').css('display', 'block');
            $('#info_paciente-edit').css('display', 'none');
        }

        function guardarInformacionPaciente(){
            let id_paciente = $('#id_paciente').val();
            let nombres = $('#paciente_nombre_edit').val();
            let apellido_uno = $('#paciente_apellido_uno_edit').val();
            let apellido_dos = $('#paciente_apellido_dos_edit').val();
            let fecha_nac = $('#paciente_fn_edit').val();
            let sexo = $('#paciente_sexo_edit').val();
            let direccion = $('#paciente_dir_edit').val();
            let region = $('#paciente_region_edit').val();
            let comuna = $('#paciente_comuna_edit').val();
            let email = $('#paciente_email_edit').val();
            let telefono = $('#paciente_telefono_edit').val();

            let data = {
                id: id_paciente,
                nombre: nombres,
                apellido_uno: apellido_uno,
                apellido_dos: apellido_dos,
                fecha_nacimiento: fecha_nac,
                sexo: sexo,
                direccion: direccion,
                region: region,
                ciudad: comuna,
                email: email,
                telefono: telefono,
                _token: CSRF_TOKEN
            }

            console.log(data);
            let url = "{{ route('asistente.paciente.modificar') }}";

            $.ajax({

                url: url,
                type: "get",
                data: data,
                })
                .done(function(data) {
                console.log(data);
                if (data.estado == 1)
                {
                    if (data.estado == 1)
                    {
                        let paciente = data.paciente;
                        $('#nombre_completo_paciente').text(paciente.nombres + ' ' + paciente.apellido_uno + ' ' + paciente.apellido_dos);
                        $('#fecha_nac_paciente').text(paciente.fecha_nac);
                        if (paciente.sexo == 'M') {
                            $('#sexo_paciente').text('Masculino');
                        } else {
                            $('#sexo_paciente').text('Femenino');
                        }
                        $('#email_paciente_').text(paciente.email);
                        $('#telefono_paciente').text(paciente.telefono_uno);
                        $('#comuna_region_paciente').html(paciente.ciudad + '<br> ' + paciente.region);

                        // $('.paciente_view_asistente').show();
                        // $('.paciente_edit_asistente').hide();
                        // $('#modificando_paciente_asistente').val(0);

                        swal({
                            title: "Actualización de Paciente",
                            text: "Actualización Exitosa",
                            icon: "success",
                        });
                        cancelarInformacionPaciente();
                    }
                    else
                    {
                        swal({
                            title: "Actualización de Paciente",
                            text: "Falla en Actualización.\nIntente de nuevo.",
                            icon: "error",
                        });
                    }
                }
                else
                {
                    swal({
                        title: "Actualización de Paciente",
                        text: "Falla en Actualización.\nIntente de nuevo.",
                        icon: "error",
                    });
                }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function buscar_ciudad_paciente(id_ciudad = 0) {

            let region = $('#paciente_region_edit').val();
            let url = "{{ route('profesional.buscar_ciudad_region') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        //_token: _token,
                        region: region,
                    },
                })
                .done(function(data) {
                    if (data != null) {
                        data = JSON.parse(data);

                        let ciudades = $('#paciente_comuna_edit');

                        ciudades.find('option').remove();
                        ciudades.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            ciudades.append('<option value="' + v.id + '">' + v.nombre +
                                '</option>');
                        })

                        if (id_ciudad != 0)
                            ciudades.val(id_ciudad);

                    } else {

                        swal({
                            title: "Error",
                            text: "Error al cargar las ciudades",
                            icon: "error",
                            buttons: "Aceptar",
                            DangerMode: true,
                        })
                        // alert('No se pudo Cargar las ciudades');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


        };
    </script>


    @yield('js_inferior')
    @yield('page-script')
    @yield('page-script-ficha-atencion'){{-- ficha_orl.blade --}}
    @yield('js-ficha-general-espc') {{-- seccion js fiche general especialidad --}}
    @yield('page-script-med-exa') {{--  seccion receta y exmaenes --}}
    @yield('page-script-med-exa-esp') {{-- seccion receta y exmaenes especiales --}}
    @yield('js-sidebar') {{-- seccion js side bar --}}
    @yield('js-lic') {{-- seccion js side bar --}}
	@yield('page-script-btn-autorizacion')

</body>

</html>



