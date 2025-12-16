<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> || Redmedichile</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">


    <!-- Links del REG-->
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}?t={{ time() }}">
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/tabs-secciones.css') }}">


    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}?t={{ time() }}">

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}?t={{ time() }}">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}?t={{ time() }}">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}?t={{ time() }}">

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}?t=<?= time() ?>">

    <!-- fomulario sm -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/formulario_sm.css') }}?t=<?= time() ?>">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}?t={{ time() }}">

    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}?t=<?= time() ?>">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    {{--  /** agregar css */  --}}

    <style>
        .ui-front {
            position: absolute;
            z-index: 2006;
            overflow: auto;
        }

    </style>
</head>

<body>

    @include('template/header')
    @include('template/menuProfesional')
    @yield('Content')

    <!-- Modal de la vista -->
    @yield('Modals')
    @yield('Modals-med-exa')
    <!-- Modal de la vista fin -->

    <footer>
        {{--  @include('template.include.footer')  --}}
    </footer>



    <!-- Required Js -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}"></script>

    <!--Tablas-->
    <script src="{{ asset('js/tablas_fmu.js') }}"></script>
    <script src="{{ asset('js/tabla_atenciones_medicas_previas.js') }}"></script>
    <script src="{{ asset('js/tablas_control_cronicos.js') }}"></script>

    <script src="{{ asset('js/recetas_atencion_medica.js') }}"></script>
    <script src="{{ asset('js/licencias_atencion_medica.js') }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>


    <!--Formularios Modals-->
    <script src="{{ asset('js/modals_atencion_medica.js') }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Tooltips-->
    <script src="{{ asset('js/tooltip_atencion_medica.js') }}"></script>

    <!--Check-->
    <script src="{{ asset('js/check_atencion_medica.js') }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone-amd-module.min.js') }}"></script>

    <!-- mensajes -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>




    {{--  @include('template.templateAutorizacion')  --}}


    <!--Formulario atencion general-->
    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function() {

            /** cardga Select consultas previas del paciente */
            SelectConsultasAnteriores();

            $("#descripcion_cie").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#descripcion_cie').val(ui.item.label); // display the selected text
                    $('#id_descripcion_cie').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#nombre_ges").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('ges.ver') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_ges').val(ui.item.label); // display the selected text
                    $('#id_ges').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            /** autocomplete de medicamentos generales */
            $("#nombre_medicamentocron").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron').val(ui.item.label);
                    $('#id_medicamento_cronico').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_cronicomes');
                    return false;
                }
            });

             /** autocomplete de medicamentos patologia */
             $("#nombre_medicamentocron_patologia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getArticulo') }}",
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            console.log(data.length);
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $('#nombre_medicamentocron_patologia').val(ui.item.label);
                    $('#id_medicamentocron_patologia').val(ui.item.value);
                    getDosis_cronico(ui.item.value, 'dosis_medicamentocron_patologia');
                    return false;
                }
            });

            $('#descripcion_hipotesis').keyup(function(){
                if($.trim(this.value) != ''){
                    $('#btn_agregar_medicamento').removeAttr("disabled");
                    $('#btn_medicamento_pdf').removeAttr("disabled");
                    $('#btn_agregar_examen').removeAttr("disabled");
                    $('#btn_examenes_pdf').removeAttr("disabled");
                }
                else
                {
                    $('#btn_agregar_medicamento').attr('disabled','disabled');
                    $('#btn_medicamento_pdf').attr('disabled','disabled');
                    $('#btn_agregar_examen').attr('disabled','disabled');
                    $('#btn_examenes_pdf').attr('disabled','disabled');
                }
            });


            $('#tabla_certificado_profesional_ro').DataTable({
                responsive: true,
            });

            $('#table_atenciones_profesional').DataTable({
                responsive: true,
                "bPaginate": false,
            });

            $('#tabla_atenciones_previas_receta').DataTable({
                responsive: true,
                "bPaginate": false,
                "searching": false
            });

            $('#confidencial').change(function() {

                if ($('#confidencial').is(':checked')) {

                    $('#confidencial_descripcion').show();
                } else {

                    $('#confidencial_descripcion').hide();
                }

            });

            $('#modal_ges').change(function() {

                if ($('#modal_ges').is(':checked')) {

                    $('#form_ges').modal('show');
                } else {

                    $('#form_ges').modal('hide');
                }
            });

            $('.material-button-toggle').on("click", function() {
                $(this).toggleClass('open');
                $('.option').toggleClass('scale-on');
            });

            $('#hola').on('click', function() {
                $('.sidebar_nc').toggleClass('visible_sidebar');
            });



            //funcion para capturar el diagnostico de ficha de atencion anterior
            $('#id_consulta_control').change(function(e) {
                e.preventDefault();
                let diagnostico = $('#id_consulta_control option:selected').data('diagnostico');
                $('#descripcion_hipotesis').val('Control de Patologia: '+ diagnostico.replace('Control de Patologia: ',''));
                $('#btn_agregar_medicamento').removeAttr("disabled");
                $('#btn_agregar_examen').removeAttr("disabled");
            });

            $('#confidencial').change(function() {

                if ($('#confidencial').is(':checked')) {

                    $('#confidencial_descripcion').show();
                } else {

                    $('#confidencial_descripcion').hide();
                }

            });

            $('#agregar_examen').click(function() {


                var examen = $("#examen option:selected").text();
                var prioridad = $("#prioridad option:selected").text();
                var tipo_examen = $("#tipo_examen option:selected").text();
                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_examen" id="row' + i + '"><td>' + examen +
                    '</td><td>' +
                    tipo_examen +
                    '</td><td>' +
                    prioridad +
                    //esto seria lo que contendria la fila

                    i++;

                $('#tabla_examen tr:first').after(fila);
                $("#adicionados").text(
                    ""
                ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#tabla_examen tr").length;
                $("#adicionados").append(nFilas - 1);
                $("#sub_tipo_examen").empty();
                $("#examen").empty();

            });

            $('#id_medicamento').on('change', function(e) {
                e.preventDefault();
                medicamento = $('#id_medicamento').val();

                $("#presentacion").empty();
                $("#dosis").empty();
                $.ajax({
                        url: '{{ route('listar.presentacion') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            medicamento: medicamento
                        },
                    })
                    .done(function(response) {
                        console.log(response)
                        //$('#presentacion').append(`<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#presentacion').append(`<option value="${response[i].id}">
                                           ${response[i].descripcion_presentacion}
                                      </option>`);
                        }
                    })
                    .fail(function(err) {
                        console.log(err);
                    })

            });

            $('#presentacion').change(function(e) {
                e.preventDefault();
                presentacion = $('#presentacion').val();

                $("#tipo_dosis").empty();
                $.ajax({
                        url: '{{ route('listar.dosis') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            presentacion: presentacion
                        },
                    })
                    .done(function(response) {
                        console.log(response)
                        //$('#dosis').append(`<option value="0">Seleccione... </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#dosis').append(`<option value="${response[i].id}">
                                        ${response[i].nombre_dosis}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            $(document).on("click", "#guardar_ficha", function(e) {
                var rows = [];
                $('#tabla_examen tr').each(function(i, n) {
                    if (i > 0) {
                        rol = {};
                        var data = $(this).find("td");
                        rol["nombre_examen"] = $.trim($(data[0]).text().split("\n")
                            .join(""));
                        rol["prioridad"] = $.trim($(data[3]).text().split("\n")
                            .join(""));
                        rows.push(rol);
                    }
                });
                $('#examenes').val(JSON.stringify(rows));

                var rows1 = [];
                $('#tabla_medicamento tr').each(function(i, n) {
                    if (i > 0) {
                        rol = {};
                        var data = $(this).find("td");
                        rol["medicamento"] = $.trim($(data[0]).text().split("\n")
                            .join(""));
                        rol["presentacion"] = $.trim($(data[1]).text().split("\n")
                            .join(""));
                        rol["dosis"] = $.trim($(data[2]).text().split("\n").join(
                            ""));
                        rol["frecuencia"] = $.trim($(data[3]).text().split("\n")
                            .join(""));
                        rol["periodo"] = $.trim($(data[4]).text().split("\n").join(
                            ""));
                        rol["comentario"] = $.trim($(data[5]).text().split("\n")
                            .join(""));
                        rows1.push(rol);
                    }
                });
                $('#medicamentos').val(JSON.stringify(rows1));
            });

            {{--  $('#agregar_examen_tabla').click(function() {

                var tipo_examen = $("#tipo_examen option:selected").text();
                var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
                var examen = $("#examen option:selected").text();
                var prioridad = $("#prioridad option:selected").text();

                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_examen_tabla" id="row' + i + '"><td>' +
                    tipo_examen + '</td><td>' +
                    sub_tipo_examen + '</td><td>' +
                    examen + '</td><td>' +
                    prioridad + '</td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove1">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#tabla_examen tr:first').after(fila);
                $("#adicionados1").text(
                    ""
                ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#tabla_medicamento tr").length;
                $("#adicionados1").append(nFilas - 1);
                $("#sub_tipo_examen").empty();
                $("#examen").empty();
                //$("#frecuencia").empty();
                //$("#periodo").empty();
                //$("#prioridad").empty();


            });  --}}


            $('#agregar_medicamento').click(function() {
                var medicamento = $("#id_medicamento option:selected").text();
                var presentacion = $("#presentacion option:selected").text();
                var dosis = $("#dosis option:selected").text();
                var frecuencia = $("#frecuencia option:selected").text();
                var periodo = $("#periodo option:selected").text();
                var comentario = $("#comentario").val();
                var i = 1; //contador para asignar id al boton que borrara la fila
                var fila = '<tr class="tr_medicamento" id="row' + i + '"><td>' +
                    medicamento + '</td><td>' +
                    presentacion + '</td><td>' +
                    dosis + '</td><td>' +
                    frecuencia + '</td><td>' +
                    periodo + '</td><td>' +
                    comentario + '</td><td><button type="button" name="remove" id="' + i +
                    '" class="btn btn-danger btn_remove1">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

                i++;

                $('#tabla_medicamento tr:first').after(fila);
                $("#adicionados1").text(
                    ""
                ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#tabla_medicamento tr").length;
                $("#adicionados1").append(nFilas - 1);
                $("#presentacion").empty();
                $("#id_medicamento").val(0);
                $('#via_administracion').val(0);
                $("#dosis").empty();
                //$("#frecuencia").empty();
                //$("#periodo").empty();
                $("#comentario").empty();


            });

        });



        function indicar_examen_ficha() {
            var tipo_examen = $("#tipo_examen option:selected").text();
            var sub_tipo_examen = $("#sub_tipo_examen option:selected").text();
            var examen = $("#examen option:selected").text();
            var prioridad = $("#prioridad option:selected").text();

            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr class="tr_examen_cirugia" id="row' + i + '"><td>' +
                tipo_examen + '</td><td>' +
                sub_tipo_examen + '</td><td>' +
                examen + '</td><td>' +
                prioridad + '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove1">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#tabla_examen_cirugia tr:first').after(fila);
            $("#adicionados1").text(
                ""
            ); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tabla_examen_cirugia tr").length;
            $("#adicionados1").append(nFilas - 1);
            $("#sub_tipo_examen").empty();
            $("#examen").empty();
            //$("#frecuencia").empty();
            //$("#periodo").empty();
            //$("#prioridad").empty();
        }

        function agregar_examenes_ficha() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    // rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["con_contraste"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));
        }

        function indicar_medicamento_ficha() {
            /*
                       if ($('#nro_orden').val() == '') {
                           return;
                       }

                       if ($('#tipo_examen_radiologico').val() == '') {
                           return;
                       }
                       $('#btn_registrar_examen_radiologico').show();
                       */

            //$('id_paciente_examen_radiologico').val();
            let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
            let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();
            let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();
            let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();
            let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();


            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr class="tabla_medicamento_cirugia" id="row' + i + '">' +
                '<td class="text-center align-middle">' +
                nombre_medicamento_ficha_dental +
                '</td>' +
                '<td class="text-center align-middle">' +
                dosis_medicamento_ficha_dental +
                '</td>' +
                '<td class="text-center align-middle">' +
                frecuencia_medicamento_ficha_dental +
                '</td>' +
                '<td class="text-center align-middle">' +
                via_administracion_ficha_dental +
                '</td>' +
                '<td class="text-center align-middle">' +
                periodo_ficha_dental +
                '</td>' +
                '<td class="text-center align-middle">' +
                '<button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#tabla_medicamento_cirugia tr:first').after(fila);

            //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tabla_medicamento_cirugia tr").length;
            $('#nombre_medicamento_ficha_dental').val('');
            $('#dosis_medicamento_ficha_dental').val('');
            $('#frecuencia_medicamento_ficha_dental').val('');
            $('#via_administracion_ficha_dental').val(0);
            $('#periodo_ficha_dental').val(0);
            //$("#adicionados").append(nFilas - 1);
            //$("#sub_tipo_examen").empty();
            //$("#nro_orden").disabled();
        }

        function agregar_medicamentos_ficha() {


            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["id_producto"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["uso_cronico"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["medicamento"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["posologia"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["via_administracion"] = $.trim($(data[5]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[6]).text().split("\n").join(""));
                    rol["compra"] = $.trim($(data[7]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos').val(JSON.stringify(rows1));


        }



        function alerta_registro_examen() {
            swal({
                title: "Ingreso de examen(es) exitoso.",
                text: "Recuerde 'Guardar Ficha Clínica' para finalizar el proceso.",
                icon: "success",
                // buttons: "Aceptar",
                //SuccessMode: true,
            });
            $('#tipo_examen').val(0);

            $('#sub_tipo_examen').html('<option value="0">Seleccione</option>')
            $('#sub_tipo_examen').val(0);

            $('#examen').html('<option value="0">Seleccione</option>')
            $('#examen').val(0);

            $('#prioridad').val(2);
        }


        function getDosis_cronico(id_medicamento, div_dosis) {

            console.log(id_medicamento);

            let url = "{{ route('dental.getDosis') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_medicamento: id_medicamento,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#'+div_dosis);

                        dosis.find('option').remove();
                        dosis.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '" data-id="'+v.id+'" data-cant_comp="'+v.cant_comp+'">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };


        function getCantCompCronica(div_dosis, div_comp) {

            var cant_comp = $('#'+div_dosis+' option:selected').attr('data-cant_comp');
            console.log(cant_comp);

            let url = "{{ route('presentacion.getCantComp') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        cant_comp: cant_comp,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let select_cant_comp = $('#'+div_comp);

                        select_cant_comp.find('option').remove();
                        select_cant_comp.append('<option value="0">Seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            select_cant_comp.append('<option value="' + v.id + '">' + v.cant +'</option>');
                        })
                        select_cant_comp.append('<option value="999">Otra Cantidad</option>');

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function es_cronico() {
            if ($('#enf_cronico').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#cronicos').val('n_C');
                ver_medicamento_cronico();
                $('.medicamento_cronico_div').show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');

                cambiar_enfermedad_cronica();

            }

        }

        function cambiar_enfermedad_cronica() {

            if($('#cronicos').val() != 'n_C')
            {
                var nombre_enfermedad = $("#cronicos option:selected").text();
                $('#titulo_med_patologia').html( ('Medicamentos '+nombre_enfermedad).toUpperCase());
                $('.medicamento_patologia').show();
                $('#btn_registro_med_patologia').attr('onclick','agregar_medicamento_cronico_patologia(\''+$('#cronicos').val()+'\')');
                ver_medicamento_cronico_patologia();

                $('.medicamento_cronico_div').hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');

                switch ($('#cronicos').val()) {
                    case 'cpeso':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').show();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'chipertension':
                        $('#hipertension_div').show();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                        ver_control_hipertension();

                    break;
                    case 'cdiabet':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').show();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;

                    case 'cinsufren':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').show();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'cmtumorales':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').show();
                        $('#creumato').hide();
                        $('#clitemia').hide();
                    break;
                    case 'creumato':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').show();
                        $('#clitemia').hide();
                    break;
                    case 'clitemia':
                        $('#hipertension_div').hide();
                        $('#control_peso_div').hide();
                        $('#diabetes_div').hide();
                        $('#cinsufren').hide();
                        $('#cmtumorales').hide();
                        $('#creumato').hide();
                        $('#clitemia').show();
                    break;

                    default:
                        break;
                }
            }
            else
            {
                $('.medicamento_patologia').hide();
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

                $('#titulo_med_patologia').html( 'Medicamentos' );
            }
        }

        function registrar_control_obesidad() {

            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('ficha_medica.registrar_control_obesidad') }}";
            let hora_medica = $('#hora_medica').val();
            var validar = 0;
            var mensaje ='';

            if( peso == '' )
            {
                $('#registro_peso').focus();
                mensaje += 'Debe ingresar el Peso del Control Actual.\n';
                validar = 1;
            }
            if( variacion == '' )
            {
                $('#registro_peso_variacion').focus();
                mensaje += 'Debe ingresar la Variación.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#registro_peso_ideal').focus();
                mensaje += 'Debe ingresar el Peso Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        variacion: variacion,
                        ideal: ideal,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        {{--  location.reload();  --}}
                        $('#registro_peso').val('');
                        $('#registro_peso_variacion').val('');
                        $('#registro_peso_ideal').val('');
                        ver_control_obesidad();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_hipertension() {

            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('ficha_medica.registrar_hipertension') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            var validar = 0;
            var mensaje ='';

            if( sistolica == '' )
            {
                $('#presion_sistolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Sistólica.\n';
                validar = 1;
            }
            if( diastolica == '' )
            {
                $('#presion_diastolica_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Diastólica.\n';
                validar = 1;
            }
            if( ideal == '' )
            {
                $('#ideal_hipertension').focus();
                mensaje += 'Debe ingresar el Presión Ideal.\n';
                validar = 1;
            }

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {
                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        sistolica: sistolica,
                        diastolica: diastolica,
                        ideal: ideal,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregado control de Presión Arterial correctamente');
                        $('#mensaje').show();
                        {{--  $('#form_enfermedad_cronica').modal('hide');  --}}
                        $('#presion_sistolica_hipertension').val('');
                        $('#presion_diastolica_hipertension').val('');
                        $('#ideal_hipertension').val('');
                        ver_control_hipertension();

                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
            }
        };

        function registrar_diabetes() {

            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('ficha_medica.registrar_diabetes') }}";
            let hora_medica = $('#hora_medica').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        pies: pies,
                        hgac1: hgac1,
                        colesterol: colesterol,
                        creatina: creatina,
                        glicosilada_postprandial: glicosilada_postprandial,
                        glicosinada_ayuno: glicosinada_ayuno,
                        hora_medica: hora_medica
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };





        // function registrar_consulta_medica() {

        //     var rows = [];
        //     $('#tabla_examen tr').each(function(i, n) {
        //         if (i > 0) {
        //             console.log(i);
        //             rol = {};
        //             var data = $(this).find("td");
        //             rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
        //             rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
        //             rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
        //             rol["prioridad"] = $.trim($(data[3]).text().split("\n").join(""));
        //             rows.push(rol);
        //         }
        //     });
        //     $('#examenes').val(JSON.stringify(rows));

        //     var rows1 = [];
        //     $('#tabla_medicamento tr').each(function(i, n) {
        //         if (i > 0) {
        //             rol = {};
        //             var data = $(this).find("td");
        //             rol["medicamento"] = $.trim($(data[0]).text().split("\n").join(""));
        //             rol["presentacion"] = $.trim($(data[1]).text().split("\n").join(""));
        //             rol["dosis"] = $.trim($(data[2]).text().split("\n").join(""));
        //             rol["frecuencia"] = $.trim($(data[3]).text().split("\n").join(""));
        //             rol["periodo"] = $.trim($(data[4]).text().split("\n").join(""));
        //             rol["comentario"] = $.trim($(data[5]).text().split("\n").join(""));
        //             rows1.push(rol);
        //         }
        //     });
        //     $('#medicamentos').val(JSON.stringify(rows1));


        //     /*  let nombre_acopanante = $('#nombre_acompanante').val();
        //       let relacion_acomnante = $('#relacion_acompanante').val();
        //       let descripcion_consulta = $('#descripcion_consulta').val();
        //       let descripcion_antecedentes = $('#descripcion_antecedentes').val();
        //       let descripcion_examen_fisico = $('#descripcion_examen_fisico').val();
        //       let descripcion_hipotesis = $('#descripcion_hipotesis').val();
        //       let descripcion_cie = $('#descripcion_cie').val();
        //       let id_profesional = $('#id_profesional_fc').val();
        //       let id_paciente = $('#id_paciente_fc').val();
        //       let examenes = $('#examenes').val();
        //       let medicamentos = $('#medicamentos').val();
        //       let cronico = $('#enf_cronico').val();
        //       let ges = $('#modal_ges').val();
        //       let confidencial = $('#confidencial').val();
        //       let hora_medica = $('#hora_medica').val();

        //       $.ajax({
        //
        //               type: 'GET',
        //               dataType: 'json',
        //               data: {

        //                   nombre_acopanante: nombre_acopanante,
        //                   relacion_acomnante: relacion_acomnante,
        //                   descripcion_consulta: descripcion_consulta,
        //                   descripcion_antecedentes: descripcion_antecedentes,
        //                   descripcion_examen_fisico: descripcion_examen_fisico,
        //                   descripcion_hipotesis: descripcion_hipotesis,
        //                   descripcion_cie: descripcion_cie,
        //                   examenes: examenes,
        //                   medicamentos: medicamentos,
        //                   id_profesional: id_profesional,
        //                   id_paciente: id_paciente,
        //                   cronico: cronico,
        //                   ges: ges,
        //                   confidencial: confidencial,
        //                   hora_medica: hora_medica,

        //               },
        //           })
        //           .done(function(response) {
        //               console.log(response);

        //               $('#registro_ficha').trigger("reset");
        //               $('#mensaje').text(response[1]);
        //               $('#mensaje').show();

        //           })
        //           .fail(function(e) {
        //               console.log("error");
        //               console.log(e);
        //           })*/
        // };

        /** GES */
        function registrar_ges_ficha() {

            var validar = 0;
            var mensaje ='';
            let nombre_institucion_ficha_ges = $('#nombre_institucion_ficha_ges').val();
            let direccion_institucion_ficha_ges = $('#direccion_institucion_ficha_ges').val();
            let nombre_responsable_ficha_ges = $('#nombre_responsable_ficha_ges').val();
            let rut_responsable_ficha_ges = $('#rut_responsable_ficha_ges').val();
            let confirmacion_diagnostica_ficha_ges = $('#confirmacion_diagnostica_ficha_ges').val();
            let paciente_tratamiento_ficha_ges = $('#paciente_tratamiento_ficha_ges').val();
            let nombre_ges = $('#nombre_ges').val();
            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional').val();
            let id_ficha_atencion = $('#id_fc').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let hora_medica = $('#hora_medica').val();
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();


            {{--  if(nombre_institucion_ficha_ges == '')
            {
                $('#nombre_institucion_ficha_ges').focus();
                validar = 1;

            }
            if(direccion_institucion_ficha_ges == '')
            {
                $('#direccion_institucion_ficha_ges').focus();
                validar = 1;

            }  --}}
            {{--
            if(nombre_responsable_ficha_ges == '')
            {
                $('#nombre_responsable_ficha_ges').focus();
                validar = 1;

            }
            if(rut_responsable_ficha_ges == '')
            {
                $('#rut_responsable_ficha_ges').focus();
                validar = 1;

            }
            --}}
            if(confirmacion_diagnostica_ficha_ges == '')
            {
                $('#confirmacion_diagnostica_ficha_ges').focus();
                mensaje += ' Debe ingresar Confirmación diagnóstica GES.\n' ;
                validar = 1;

            }
            if(paciente_tratamiento_ficha_ges == '')
            {
                $('#paciente_tratamiento_ficha_ges').focus();
                mensaje += ' Debe Confimar si el paciente se encuentra en tratamiento.\n' ;
                validar = 1;

            }
            if(nombre_ges == '')
            {
                $('#nombre_ges').focus();
                mensaje += ' Debe ingresar el Diagnóstico GES.\n' ;
                validar = 1;
            }
            {{--  if(id_paciente == '')
            {
                $('#id_paciente').focus();
                validar = 1;

            }
            if(id_profesional == '')
            {
                $('#id_profesional').focus();
                validar = 1;

            }
            if(id_ficha_atencion == '')
            {
                $('#id_ficha_atencion').focus();
                validar = 1;

            }
            if(id_lugar_atencion == '')
            {
                $('#id_lugar_atencion').focus();
                validar = 1;

            }
            if(hora_medica == '')
            {
                $('#hora_medica').focus();
                validar = 1;

            }  --}}

            if(validar == 1)
            {
                swal({
                    title: "Debe ingresar todos los datos requeridos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
                return false;
            }
            else
            {

                $.ajax({
                    url: "{{ route('ficha_atencion.registrar_diagnostico_ges') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {

                        nombre_institucion_ficha_ges :nombre_institucion_ficha_ges,
                        direccion_institucion_ficha_ges :direccion_institucion_ficha_ges,
                        nombre_responsable_ficha_ges :nombre_responsable_ficha_ges,
                        rut_responsable_ficha_ges :rut_responsable_ficha_ges,
                        confirmacion_diagnostica_ficha_ges :confirmacion_diagnostica_ficha_ges,
                        paciente_tratamiento_ficha_ges :paciente_tratamiento_ficha_ges,
                        nombre_ges :nombre_ges,
                        id_paciente :id_paciente,
                        id_profesional :id_profesional,
                        id_ficha_atencion :id_ficha_atencion,
                        id_lugar_atencion :id_lugar_atencion,
                        hora_medica :hora_medica,
                        codigo_verificacion :codigo_validacion_informe_ges,

                    },
                })
                .done(function(response) {
                    console.log(response);

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha creado Diagnostico GES de forma correcta');
                        $('#mensaje').show();
                        $('#form_ges').modal('hide');


                        swal({
                            title: "Constancia GES (Artículo 24 Ley 19.966).",
                            text: 'Registro Exitoso.',
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }

                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })

            }



        };

        function validar_codigo_ges(){
            let codigo_validacion_informe_ges = $('#codigo_validacion_informe_ges').val();
            if(codigo_validacion_informe_ges!='')
            {
                /** validar con base de datos */
                registrar_ges_ficha();
            }
            else
            {
                swal({
					title: "Constancia GES (Artículo 24 Ley 19.966).",
					text:"Debe ingresar Código de notificación entrago por el Paciente.",
					icon: "error",
					// buttons: "Aceptar",
					//SuccessMode: true,
				});
            }
        }

        /*  function finalizar_atencion() {

                let finaliza = confirm('esta seguro que desea finalizar la consulta ?');

                if (finaliza == 0) {
                    return alert('Ha cancelado el proceso');
                    exit();
                }

                let hora_medica = $('#hora_medica').val();

                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            hora_medica: hora_medica
                        },
                    })
                    .done(function(response) {

                        if (response != '') {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                            $('#mensaje').show();
                            $('#form_enfermedad_cronica').modal('hide');
                            location.reload();
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);
                    })
            };
        */

        function limpiar_modal_medicamentos() {
            $("#presentacion").empty();
            $("#id_medicamento").val(0);
            $('#via_administracion').val(0);
            $("#dosis").empty();
            $("#frecuencia").val(0);
            $("#periodo").val(0);
            $("#comentario").empty();
            $('#tabla_medicamento tbody').empty();
        }



        //funcion para buscar un paciente
        function buscarpaciente() {
            url = '{{ route('buscar_paciente') }}'
            rut = $('#rut_paciente_li').val();
            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        rut: rut
                    },

                })
                .done(function(data) {
                    if (data != '') {
                        $('#paciente').text(data[0].nombre);

                    } else {
                        $('#paciente').text('NO Existe Registro de paciente');
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }


    </script>

    <!--bs canvas-->
    <script type="text/javascript">
        jQuery(document).ready(function($) {



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




        });

        function showContentcr() {
            element = document.getElementById("contentcr");
            check = document.getElementById("checkcr");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>

    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("ficha_medica");
            check = document.getElementById("chk");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }
    </script>

    <script type="text/javascript">


        function agregar_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron').val();
            var id_medicamento = $('#id_medicamentocron').val();
            var cantidad = $('#med_cronicomes option:selected').text()
            var tipo_enfermedad = 'cronico';

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    id_medicamento:id_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron').val('');

                        $('#dosis_cronicomes').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico();


                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function ver_medicamento_cronico()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:'cronico'
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_general" id="medicamento_cronico_general_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="3">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_medicamento_cronico').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico();
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        {{--  MEDICAMENTOS CRONICOS PATOLOGIA  --}}
        function agregar_medicamento_cronico_patologia(tipo)
        {

            let url = "{{ route('medicamento_cronico.registrar') }}";


            var _token = CSRF_TOKEN;
            var id_profesional = $('#id_profesional_fc').val();
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var nombre_medicamento = $('#nombre_medicamentocron_patologia').val();
            var cantidad = $('#med_cronicomes_patologia option:selected').text();
            var tipo_enfermedad = tipo;

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id_profesional:id_profesional,
                    id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    nombre_medicamento:nombre_medicamento,
                    cantidad:cantidad,
                    tipo_enfermedad:tipo_enfermedad,
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Registrado con exito.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        $('#nombre_medicamentocron_patologia').val('');
                        $('#id_medicamentocron_patologia').val('');

                        $('#dosis_medicamentocron_patologia').html('<option value="0">Seleccione</option>');
                        $('#med_cronicomes_patologia').html('<option value="0">Seleccione</option>');

                        ver_medicamento_cronico_patologia()
                    }
                    else{

                        swal({
                            title: "Problema al Registrar Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function ver_medicamento_cronico_patologia()
        {

            let url = "{{ route('medicamento_cronico.getRegsitros') }}";


            var _token = CSRF_TOKEN;
            var id_ficha_atencion = $('#id_fc').val();
            var id_paciente = $('#id_paciente_fc').val();
            var tipo_enfermedad = $('#cronicos').val();
            $('#tabla_med_patologia').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    // id_ficha_atencion:id_ficha_atencion,
                    id_paciente:id_paciente,
                    tipo_enfermedad:tipo_enfermedad
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '        <th class="text-center align-middle">Nombre Medicamento</th>';
                    html += '        <th class="text-center align-middle">Cantidad Mensual</th>';
                    html += '        <th class="text-center align-middle">Acción</th>';
                    html += '        <th class="text-center align-middle">Check</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            html += '<tr>';
                            html += '    <td class="align-left align-middle">'+value.nombre_medicamento+'</td>';
                            html += '    <td class="text-center align-middle">'+value.cantidad+'</td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <button type="button" class="btn btn-danger btn-sm" onclick="eliminar_med_cronico_patologia(\''+value.id+'\');"><i class="feather icon-x"></i></button>';
                            html += '    </td>';
                            html += '    <td class="text-center align-middle">';
                            html += '        <input type="checkbox" name="medicamento_cronico_patologia" id="medicamento_cronico_patologia_'+value.id+'">';
                            html += '    </td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="4">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#tabla_med_patologia').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function eliminar_med_cronico_patologia(id)
        {
            let url = "{{ route('medicamento_cronico.deleteRegsitro') }}";


            var _token = CSRF_TOKEN;
            var id =id;
            var tipo_enfermedad = $('#cronicos').val();

            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: _token,
                    id:id
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('-----------------------');
                    console.log(data);
                    console.log('-----------------------');
                    if(data.estado == 1)
                    {
                        swal({
                            title: "Medicamento Cronico.",
                            text: "Medicamento Eliminado.",
                            icon: "success",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        });
                        ver_medicamento_cronico_patologia(tipo_enfermedad);
                    }
                    else{

                        swal({
                            title: "Problema al Eliminar Registro de Medicamento Cronico.",
                            icon: "warning",
                            // buttons: "Aceptar",
                            //SuccessMode: true,
                        })
                    }
                }
                else{

                    swal({
                        title: "Problema al Eliminar Registro de Medicamento Cronico.",
                        icon: "warning",
                        // buttons: "Aceptar",
                        //SuccessMode: true,
                    })
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }


        {{--  mostrar div   --}}
        function mostrar_div(div)
        {
            if ($('.'+div).is(':visible')) {
                $('.'+div).hide();
                $('#senal_med_cronico').addClass('fa-angle-down');
                $('#senal_med_cronico').removeClass('fa-angle-up');
            } else {
                $('.'+div).show();
                $('#senal_med_cronico').removeClass('fa-angle-down');
                $('#senal_med_cronico').addClass('fa-angle-up');
            }
        }


        {{--  CRONICO VER CONTROL DE HIPERTENSION  --}}
        function ver_control_hipertension()
        {

            let url = "{{ route('hipertension.getHipertension') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        {{--  CRONICO VER CONTROL DE OBESIDAD  --}}
        function ver_control_obesidad()
        {

            let url = "{{ route('control_obesidad.getControlObesidad') }}";


            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_obesidad').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '    <th class="text-center align-middle">Nº Control</th>';
                    html += '    <th class="text-center align-middle">Fecha</th>';
                    html += '    <th class="text-center align-middle">Peso</th>';
                    html += '    <th class="text-center align-middle">Variación</th>';
                    html += '    <th class="text-center align-middle">Peso Ideal</th>';
                    html += '    <!-- <th class="text-center align-middle">Acción</th>-->';
                    html += '</tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();


                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.peso+'</td>';
                            html += '    <td class="text-center align-middle">'+value.variacion+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '    <!--<td class="text-center align-middle"><button href="#!" class="btn btn-danger btn-sm"><i class="feather icon-x"></i> Eliminar</button></td>-->';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_obesidad').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }


        function SelectConsultasAnteriores() {

            let id_paciente = $('#id_paciente_fc').val();
            let id_profesional = $('#id_profesional_fc').val();

            let url = "{{ route('ficha_clinica.get_fichas') }}";
            let select = $('#id_consulta_control');
            $.ajax({

                    url: url,
                    type: "get",
                    data: {
                        id_paciente: id_paciente,
                        id_profesional: id_profesional,
                    },
                })
                .done(function(datos) {
                    console.log(datos);

                    if (datos.estado == 1)
                    {
                        let data = datos.registros
                        select.find('option').remove();
                        select.append('<option value="0">Seleccione</option>');
                        if(data.length>0)
                        {
                            $(data).each(function(i, v) { // indice, valor
                                var f_temp = (v.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                                var fecha = new Date(f_temp);
                                fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear();
                                select.append('<option value="' + v.id + '" data-diagnostico="'+v.hipotesis_diagnostico+'">' + fecha + '</option>');
                            })
                        }
                        else
                        {
                            let data = datos.registros
                            select.find('option').remove();
                            select.append('<option value="0">Seleccione</option>');
                        }
                    } else {
                        select.find('option').remove();
                        select.append('<option value="0">Seleccione</option>');
                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }

        function ver_control_hipertension()
        {

            let url = "{{ route('hipertension.getHipertension') }}";

            var _token = CSRF_TOKEN;
            var id_paciente = $('#id_paciente_fc').val();
            $('#control_hipertension').html('');

            $.ajax({

                url: url,
                type: "GET",
                data: {
                    _token: _token,
                    id_paciente:id_paciente
                },
            })
            .done(function(data)
            {

                if (data !== 'null')
                {
                    //data = JSON.parse(data);
                    console.log('----------ver_control_hipertension-------------');
                    console.log(data);
                    console.log('-----------------------');
                    var html = '';
                    html += '<thead>';
                    html += '    <tr>';
                    html += '         <th class="text-center align-middle">Nº Control</th>';
                    html += '         <th class="text-center align-middle">Fecha</th>';
                    html += '         <th class="text-center align-middle">Presión Sistólica</th>';
                    html += '         <th class="text-center align-middle">Presión Diastólica</th>';
                    html += '         <th class="text-center align-middle">Presión Ideal</th>';
                    html += '    </tr>';
                    html += '</thead>';
                    html += '<tbody>';
                    if(data.estado == 1)
                    {

                        $.each(data.registros, function(index, value)
                        {
                            var f_temp = (value.created_at).replace('T',' ').replace('Z','').replace('.000000','');
                            var fecha = new Date(f_temp);
                            fecha = fecha.getDate()+'-'+(fecha.getMonth()+1)+'-'+fecha.getFullYear()+' '+fecha.getHours()+':'+fecha.getMinutes();

                            html += '<tr>';
                            html += '    <td class="text-center align-middle">'+value.id+'</td>';
                            html += '    <td class="text-center align-middle">'+fecha+'</td>';
                            html += '    <td class="text-center align-middle">'+value.sistolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.diastolica+'</td>';
                            html += '    <td class="text-center align-middle">'+value.ideal+'</td>';
                            html += '</tr>';
                        });

                    }
                    else
                    {

                        html += '<tr>';
                        html += '    <td class="text-center align-middle" colspan="5">SIN REGISTROS</td>';
                        html += '</tr>';

                    }
                    html += '</tbody>';
                    $('#control_hipertension').html(html);
                }
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }








    function cargar_certificado_reposo() {
        let url = "{{ route('certificado_reposo.ver') }}";
        let id_ficha_atencion = $('#id_fc').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_ficha_atencion: id_ficha_atencion,
                },
            })
            .done(function(response) {

                if (response != '') {

                    if (response['estado'] == '1') {
                        $('#fecha_inicio_certificado').val(response['registros'][0]['fecha_inicio']);
                        $('#fecha_termino_certificado').val(response['registros'][0]['fecha_termino']);
                        $('#hipotesis_certificado').val(response['registros'][0]['hipotesis']);
                        $('#comentarios_certificado').val(response['registros'][0]['comentarios']);
                    } else {
                        $('#fecha_inicio_certificado').val('');
                        $('#fecha_termino_certificado').val('');
                        $('#hipotesis_certificado').val('');
                        $('#comentarios_certificado').val('');
                        $('#hipotesis_certificado').val($('#descripcion_hipotesis').val());
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    }

    function cargar_informe_medico() {
        let url = "{{ route('informe_medico.ver') }}";
        let id_ficha_atencion = $('#id_fc').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_ficha_atencion: id_ficha_atencion,
                },
            })
            .done(function(response) {

                if (response != '') {

                    if (response['estado'] == '1') {
                        $('#comentarios_informe_medico').val(response['registros'][0]['informe_medico']);
                    } else {
                        $('#comentarios_informe_medico').val('');
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    }

    function cargar_uso_personal() {
        let url = "{{ route('uso_personal.ver') }}";
        let id_ficha_atencion = $('#id_fc').val();

        $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id_ficha_atencion: id_ficha_atencion,
                },
            })
            .done(function(response) {

                if (response != '') {

                    if (response['estado'] == '1') {
                        $('#uso_personal_dirigido_a').val(response['registros'][0]['dirigido']);
                        $('#uso_personal_cargo').val(response['registros'][0]['cargo']);
                        $('#uso_personal_mensaje').val(response['registros'][0]['mensaje']);
                    } else {
                        $('#uso_personal_dirigido_a').val('');
                        $('#uso_personal_cargo').val('');
                        $('#uso_personal_mensaje').val('');
                    }
                }
            })
            .fail(function(e) {
                console.log("error");
                console.log(e);
            })
    }

    /** FORMATEO DE RUT */
    function formatoRut(rut)
    {
        var valor = rut.value.replace('.','');
        valor = valor.replace('-','');
        cuerpo = valor.slice(0,-1);
        dv = valor.slice(-1).toUpperCase();
        rut.value = cuerpo + '-'+ dv

        if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

        suma = 0;
        multiplo = 2;

        for(i=1;i<=cuerpo.length;i++)
        {
            index = multiplo * valor.charAt(cuerpo.length - i);
            suma = suma + index;
            if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
        }

        dvEsperado = 11 - (suma % 11);
        dv = (dv == 'K')?10:dv;
        dv = (dv == 0)?11:dv;

        if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

        rut.setCustomValidity('');
    }

    {{--  ESPECIALIDADES Y SUB_ESPECIALIDAD  --}}
    function buscar_tipo_especialidad()
    {

        let tipo_especialidad_registro = $('#especialidad');
        tipo_especialidad_registro.find('option').remove();

        let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#profesion').val();
        let url = "{{ route('home.buscar_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                let especialidades = $('#especialidad');

                especialidades.find('option').remove();
                especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })
                }
                else
                {
                    especialidades.append('<option value="0">No Aplica</option>');
                    especialidades.val(0);

                    let sub_especialidades = $('#sub_tipo_especialidad');
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }


            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });

    }

    function buscar_sub_tipo_especialidad()
    {
        let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
        sub_tipo_especialidad_registro.find('option').remove();

        let especialidad = $('#especialidad').val();
        let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                especialidad: especialidad,
            },
        })
        .done(function(data) {
            if (data != null) {
                data = JSON.parse(data);
                console.log(data);
                console.log(data.length);
                let sub_especialidades = $('#sub_tipo_especialidad');

                sub_especialidades.find('option').remove();
                sub_especialidades.append('<option value="">Seleccione</option>');
                if(data.length > 0)
                {
                    $(data).each(function(i, v) { // indice, valor
                        sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                    })
                }
                else
                {
                    sub_especialidades.append('<option value="0">No Aplica</option>');
                    sub_especialidades.val(0);
                }


            } else {
                alert('No se pudo Cargar los tipos de especialidad');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }

    function buscar_profesional()
    {
        let profesional_inter = $('#profesional_inter');
        profesional_inter.find('option').remove();

        let profesion = $('#profesion').val();
        let especialidad = $('#especialidad').val();
        let sub_tipo_especialidad = $('#sub_tipo_especialidad').val();
        let url = "{{ route('profesional.buscar') }}";
        $.ajax({
            url: url,
            type: "get",
            data: {
                //_token: _token,
                id_especialidad: profesion,
                id_tipo_especialidad: especialidad,
                id_sub_tipo_especialidad: sub_tipo_especialidad,
            },
        })
        .done(function(data) {
            if (data.estado = 1) {

                console.log(data);
                console.log(data.registros.length);


                profesional_inter.find('option').remove();
                profesional_inter.append('<option value="">Seleccione</option>');
                if(data.registros.length > 0)
                {
                    $(data.registros).each(function(i, v) { // indice, valor
                        profesional_inter.append('<option value="' + v.id + '">' + v.nombre + ' ' + v.apellido_uno + ' ' + v.apellido_dos + '</option>');
                    })
                    profesional_inter.append('<option value="OTRO">Otro</option>');
                }
                else
                {
                    profesional_inter.append('<option value="0">Sin Especialista</option>');
                    profesional_inter.append('<option value="OTRO">Otro</option>');
                    profesional_inter.val(0);
                }

                $('#profesional_inter').change(function(){
                    var id_actual  = $('#profesional_inter option:selected').val();
                    var text_actual  = $('#profesional_inter option:selected').text();
                    if(id_actual == 'OTRO'){
                        $('.nombre_profesional_inter').show();
                        $('#nombre_profesional_inter').val('Ingrese nombre del profesional');
                    }
                    else
                    {
                        $('.nombre_profesional_inter').hide();
                        $('#nombre_profesional_inter').val(text_actual);
                    }

                });

            } else {
                console.log('No se encontro profesional');
            }

        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
            console.log(jqXHR, ajaxOptions, thrownError)
        });
    }
    </script>
   
    @yield('js_inferior')
    @yield('page-script')
    @yield('page-script-med-exa')
    @yield('js-sidebar') {{-- seccion js side bar --}}
</body>

</html>
