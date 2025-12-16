<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema || Redmedichile</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />

    <link rel="stylesheet" href="{{ asset('css/boton-flotante.css') }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorios.css') }}">

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min') }}.css">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min') }}.css">
    <link rel="stylesheet" href="{{ asset('css/card_estilo.css') }}">
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone.min.css') }}">

    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}">

    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/card_sidebar.css') }}">

    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pills_modals.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-sm-info.css') }}">

    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tab_wizard_formularios.css') }}">

    <!--Bs-Canvas-->
    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">

    <!-- Otros estilos de atencion medica -->
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}">
    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/cara_dental.css') }}">

{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>


    <style>
        .ui-front {
            position: absolute;
            z-index: 2006;
            overflow: auto;
        }

    </style>


</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    @include('template.dental.menu_dental')
    @include('template.dental.header')

    @yield('content')

    <footer>
        @include('template.include.footer')
    </footer>

    @include('template.include.nocomplatible')
    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}"></script>

    <!--Tablas-->
    <script src="{{ asset('js/tablas-atencion-medica.js') }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>

    <!--Modals de atención-->
    <script src="{{ asset('js/modals_atencion_medica.js') }}"></script>
    <script src="{{ asset('js/modals_atencion_dental.js') }}"></script>
    <script src="{{ asset('js/modals_cirugia.js') }}"></script>


    <!--Check de atención-->
    <script src="{{ asset('js/check_atencion_medica.js') }}"></script>
    <script src="{{ asset('js/check_atencion_dental.js') }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>

    <!--Tooltips-->
    <script src="{{ asset('js/tooltip_atencion_medica.js') }}"></script>

    <!--Recetas-->
    <script src="{{ asset('js/recetas_atencion_medica.js') }}"></script>

    <!--Cara Dental-->
    <script src="{{ asset('js/cara_dental.js') }}"></script>

    <!--Validate-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <script type="text/javascript">
        function acepta_presupuesto() {
            $('#acepta_presupuesto_odonto').modal('show');
        }
    </script>

    @yield('page-script')

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $('#tipo_examen').change(function(e) {
                e.preventDefault();
                tipo_examen = $('#tipo_examen').val();

                $("#sub_tipo_examen").empty();
                $("#examen").empty();
                $.ajax({
                        url: '{{ route('dental.get_sub_tipo_examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            tipo_examen: tipo_examen
                        },
                    })
                    .done(function(response) {

                        $('#sub_tipo_examen').append(`<option value="">
                                        seleccione...
                                    </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#sub_tipo_examen').append(`<option value="${response[i].cod_examen}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });

            $('#sub_tipo_examen').change(function(e) {
                e.preventDefault();
                sub_tipo_examen = $('#sub_tipo_examen').val();
                $.ajax({
                        url: '{{ route('dental.get_examen') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            sub_tipo_examen: sub_tipo_examen
                        },
                    })
                    .done(function(response) {
                        $('#examen').append(`<option value="">
                                        seleccione..
                                    </option>`);
                        for (var i = 0; i < response.length; i++) {
                            $('#examen').append(`<option value="${response[i].id}">
                                        ${response[i].nombre_examen}
                                    </option>`);
                        }
                    })
                    .fail(function() {
                        console.log("error");
                    })

            });


            $('#agregar_examen_tabla').click(function() {

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


            });


            $("#nombre_medicamento_ficha_dental").autocomplete({
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
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    // Set selection
                    $('#nombre_medicamento_ficha_dental').val(ui.item
                        .label); // display the selected text
                    $('#id_medicamento_ficha_dental').val(ui.item.value); // save selected id to input
                    return false;
                }
            });

            $("#cie10_ficha_dental_endodoncia").autocomplete({
                source: function(request, response) {
                    // Fetch data
                    $.ajax({
                        url: "{{ route('dental.getCie10_1') }}",
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
                    $('#cie10_ficha_dental_endodoncia').val(ui.item.label); // display the selected text
                    $('#cie10_ficha_dental_endodoncia').val(ui.item.id); // save selected id to input
                    return false;
                }
            });

            // $("#cie_10_eno").autocomplete({
            //     source: function(request, response) {
            //         // Fetch data
            //         $.ajax({
            //             url: "{{ route('dental.getCie10') }}",
            //             type: 'post',
            //             dataType: "json",
            //             data: {
            //                 _token: CSRF_TOKEN,
            //                 search: request.term
            //             },
            //             success: function(data) {
            //                 response(data);
            //             }
            //         });
            //     },
            //     select: function(event, ui) {
            //         // Set selection
            //         $('#cie_10_eno').val(ui.item
            //             .label); // display the selected text
            //         $('#id_cie_10_eno').val(ui.item.id); // save selected id to input
            //         return false;
            //     }
            // });

            $("#form_evolucion_neonatologia").validate({
                rules: {
                    //primer modal//
                    brazalete: {
                        required: true,
                        minlength: 3
                    },
                    // confirmacion_diagnostica_constancia_ges: {

                    //     required: true,
                    //     minlength: 9
                    // },
                    // paciente_tratamiento_constancia_ges: {
                    //     required: true,
                    //     minlength: 9
                    // },
                    // fecha_constancia_ges: {

                    //     required: true,
                    // },
                    // hora_constancia_ges: {

                    //     required: true,
                    // },


                },
                messages: {
                    //primer modal//
                    brazalete: {
                        required: "Ingrese un codigo de brazalete",

                    },
                    // confirmacion_diagnostica_constancia_ges: {
                    //     required: "Ingrese una confirmación de diagnostico",
                    // },
                    // paciente_tratamiento_constancia_ges: {
                    //     required: "Ingrese un tratamiento",
                    // },
                    // fecha_constancia_ges: {
                    //     required: "Ingrese una fecha",
                    // },
                    // hora_constancia_ges: {
                    //     required: "Ingrese una hora",
                    // },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#registrar_constancia_ges").validate({
                rules: {
                    //primer modal//
                    confirmacion_ges_diagnostica_constancia_ges: {
                        required: true,
                        minlength: 9
                    },
                    confirmacion_diagnostica_constancia_ges: {

                        required: true,
                        minlength: 9
                    },
                    paciente_tratamiento_constancia_ges: {
                        required: true,
                        minlength: 9
                    },
                    fecha_constancia_ges: {

                        required: true,
                    },
                    hora_constancia_ges: {

                        required: true,
                    },


                },
                messages: {
                    //primer modal//
                    confirmacion_ges_diagnostica_constancia_ges: {
                        required: "Ingrese un diagnostico ges",

                    },
                    confirmacion_diagnostica_constancia_ges: {
                        required: "Ingrese una confirmación de diagnostico",
                    },
                    paciente_tratamiento_constancia_ges: {
                        required: "Ingrese un tratamiento",
                    },
                    fecha_constancia_ges: {
                        required: "Ingrese una fecha",
                    },
                    hora_constancia_ges: {
                        required: "Ingrese una hora",
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_declaracion_eno").validate({
                rules: {
                    //primer modal//
                    nombre_establecimiento: {
                        required: true,
                        minlength: 9
                    },
                    codigo_establecimiento: {

                        required: true,
                        minlength: 2
                    },
                    nombre_oficina_provincial: {
                        required: true,
                        minlength: 5
                    },
                    codigo_oficina_provincial: {

                        required: true,
                    },
                    numero_ficha_control: {

                        required: true,
                    },

                    nacionalidad_paciente_eno: {
                        required: true,
                        minlength: 9
                    },
                    cod_nacionalidad_paciente_eno: {

                        required: true,
                        minlength: 2
                    },
                    ocupacion_paciente_eno: {
                        required: true,
                        minlength: 5
                    },
                    ocupacion_condicion_eno: {

                        required: true,
                    },
                    ocupacion_categoria_eno: {

                        required: true,
                    },

                    /* pueblo_originario_eno: {
                         required: true,

                     },*/
                    diagnostico_confirmado_eno: {

                        required: true,
                        minlength: 2
                    },
                    cie_10_eno: {
                        required: true,
                        minlength: 5
                    },
                    fecha_primeros_sintomas_eno: {

                        required: true,
                    },
                    pais_contagio_eno: {

                        required: true,
                    },
                    vacunacion_eno: {

                        required: true,
                        minlength: 1
                    },
                    fecha_ultima_dosis_eno: {
                        required: true,
                        minlength: 5
                    },
                    numero_ultima_dosis_eno: {

                        required: true,
                    },
                    fecha_eno: {

                        required: true,
                    },
                    hora_eno: {

                        required: true,
                    },


                },
                messages: {
                    //primer modal//
                    nombre_establecimiento: {
                        required: "ingrese el nombre del establecimiento",

                    },
                    codigo_establecimiento: {
                        required: "Ingrese un código",
                    },
                    nombre_oficina_provincial: {
                        required: "Ingrese el nombre de la oficina",
                    },
                    codigo_oficina_provincial: {
                        required: "Ingrese un código",
                    },
                    numero_ficha_control: {
                        required: "Ingrese un numero de ficha o control",
                    },
                    nacionalidad_paciente_eno: {
                        required: "Ingrese una nacionalidad",

                    },
                    cod_nacionalidad_paciente_eno: {
                        required: "Ingrese un código ",
                    },
                    pueblo_originario_eno: {
                        required: "Seleccione una opción",
                    },
                    ocupacion_paciente_eno: {
                        required: "Ingrese la ocupación del paciente",
                    },
                    ocupacion_condicion_eno: {
                        required: "Seleccione la condición actual",
                    },
                    ocupacion_categoria_eno: {
                        required: "Seleccione una Categoría",
                    },
                    diagnostico_confirmado_eno: {
                        required: "Ingrese una diagnostico de confirmación",

                    },
                    cie_10_eno: {
                        required: "Ingrese un diagnostico cie-10",
                    },
                    fecha_primeros_sintomas_eno: {
                        required: "Ingrese cuales fueron los primeros sintomas",
                    },
                    pais_contagio_eno: {
                        required: "Seleccione una opción",
                    },

                    vacunacion_eno: {
                        required: "Ingrese un esquema de vacunadción",

                    },
                    fecha_ultima_dosis_eno: {
                        required: "Ingrese la fecha de la última dosis",
                    },
                    numero_ultima_dosis_eno: {
                        required: "Ingrese la número de la última dosis",
                    },

                    fecha_eno: {
                        required: "Ingrese una fecha",
                    },
                    hora_eno: {
                        required: "Ingrese una hora",
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_certificado_reposo").validate({
                rules: {
                    //primer modal//
                    fecha_inicio_certificado: {
                        required: true,
                    },
                    fecha_termino_certificado: {

                        required: true,

                    },
                    hipotesis_certificado: {
                        required: true,
                        minlength: 9
                    },


                },
                messages: {
                    //primer modal//
                    fecha_inicio_certificado: {
                        required: "Ingrese una fecha de inicio",

                    },
                    fecha_termino_certificado: {
                        required: "Ingrese una fecha de termino",
                    },
                    hipotesis_certificado: {
                        required: "Ingrese una hipotesis",
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#inter-especialidad").validate({
                rules: {
                    //primer modal//
                    nombre_especialista_interconsulta: {
                        required: true,
                        minlength: 3
                    },
                    hipotesis_interconsulta: {

                        required: true,
                        minlength: 10

                    },
                    comentarios_interconsulta: {
                        required: true,
                        minlength: 10
                    },


                },
                messages: {
                    //primer modal//
                    nombre_especialista_interconsulta: {
                        required: "Ingrese el nombre del especialista",

                    },
                    hipotesis_interconsulta: {
                        required: "Ingrese una hipotesis diagnostica",
                    },
                    comentarios_interconsulta: {
                        required: "Ingrese un comentario",
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_informe_medico").validate({
                rules: {
                    //primer modal//
                    fecha_informe_medico: {
                        required: true,
                    },
                    comentarios_informe_medico: {

                        required: true,

                    },

                },
                messages: {
                    //primer modal//
                    fecha_informe_medico: {
                        required: "Ingrese una fecha para el informe",

                    },
                    comentarios_informe_medico: {
                        required: "Ingrese un comentario",
                    },



                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_antecedente_fractura").validate({
                rules: {
                    //primer modal//
                    procedimiento_fractura_ficha_atencion: {
                        required: true,
                        minlength: 3
                    },
                    lugar_fractura_ficha_atencion: {

                        required: true,
                        minlength: 3
                    },
                    rut_fractura_ficha_atencion: {
                        required: true,
                        minlength: 9
                    },
                    tratamiento_fractura_ficha_atencion: {
                        required: true,
                        minlength: 3
                    }

                },
                messages: {
                    //primer modal//
                    procedimiento_fractura_ficha_atencion: {
                        required: "Ingrese un procedimiento",
                        minlength: "ingrese al tres un caracteres"
                    },
                    lugar_fractura_ficha_atencion: {
                        required: "Seleccione un lugar de atención",
                        minlength: "Por favor ingrese una selección valida"
                    },
                    rut_fractura_ficha_atencion: {
                        required: "Ingrese el rut del responsable",
                        minlength: "ingrese al menos tres caracteres"
                    },
                    tratamiento_fractura_ficha_atencion: {
                        required: "Ingrese un tratamiento",
                        minlength: "ingrese al menos tres caracteres"
                    },

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_antecedente_hemorragia").validate({
                rules: {
                    //primer modal//
                    procedimiento_hemorragia_ficha_atencion: {
                        required: true,
                        minlength: 3
                    },
                    lugar_hemorragia_ficha_atencion: {

                        required: true,
                        minlength: 3
                    },
                    rut_hemorragia_ficha_atencion: {
                        required: true,
                        minlength: 9
                    },
                    tratamiento_hemorragia_ficha_atencion: {
                        required: true,
                        minlength: 3
                    }

                },
                messages: {
                    //primer modal//
                    procedimiento_hemorragia_ficha_atencion: {
                        required: "Ingrese un procedimiento",
                        minlength: "ingrese al tres un caracteres"
                    },
                    lugar_hemorragia_ficha_atencion: {
                        required: "Seleccione un lugar de atención",
                        minlength: "Por favor ingrese una selección valida"
                    },
                    rut_hemorragia_ficha_atencion: {
                        required: "Ingrese el rut del responsable",
                        minlength: "ingrese al menos tres caracteres"
                    },
                    tratamiento_hemorragia_ficha_atencion: {
                        required: "Ingrese un tratamiento",
                        minlength: "ingrese al menos tres caracteres"
                    },

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_antecedente_anestesia").validate({
                rules: {
                    //primer modal//
                    procedimiento_anestesia_ficha_atencion: {
                        required: true,
                        minlength: 3
                    },
                    lugar_anestesia_ficha_atencion: {

                        required: true,
                        minlength: 3
                    },
                    rut_anestesia_ficha_atencion: {
                        required: true,
                        minlength: 9
                    },
                    tratamiento_anestesia_ficha_atencion: {
                        required: true,
                        minlength: 3
                    }

                },
                messages: {
                    //primer modal//
                    procedimiento_anestesia_ficha_atencion: {
                        required: "Ingrese un procedimiento",
                        minlength: "ingrese al tres un caracteres"
                    },
                    lugar_anestesia_ficha_atencion: {
                        required: "Seleccione un lugar de atención",
                        minlength: "Por favor ingrese una selección valida"
                    },
                    rut_anestesia_ficha_atencion: {
                        required: "Ingrese el rut del responsable",
                        minlength: "ingrese al menos tres caracteres"
                    },
                    tratamiento_anestesia_ficha_atencion: {
                        required: "Ingrese un tratamiento",
                        minlength: "ingrese al menos tres caracteres"
                    },

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },

            });

            $("#form_biopsia").validate({
                rules: {
                    //primer modal//
                    laboraorio_patologia: {
                        required: true,
                        minlength: 3
                    },
                    diagnostico_pre: {

                        required: true,
                        minlength: 3
                    },
                    diagnostico_post: {
                        required: true,
                        minlength: 3
                    },
                    organo_localizacion: {
                        required: true,
                        minlength: 3
                    },
                    enfermedades_asociadas: {

                        required: true,
                        minlength: 3
                    },


                },
                messages: {
                    //primer modal//
                    laboraorio_patologia: {
                        required: "Ingrese in laboratorio",
                        minlength: "ingrese al tres un caracteres"
                    },
                    diagnostico_pre: {
                        required: "Seleccione un diagnostico pre",
                        minlength: "Por favor ingrese una selección valida"
                    },
                    diagnostico_post: {
                        required: "Ingrese un diagnostico post",
                        minlength: "ingrese al menos tres caracteres"
                    },
                    organo_localizacion: {
                        required: "Ingrese un organo o localización",
                        minlength: "ingrese al menos tres caracteres"
                    },
                    enfermedades_asociadas: {
                        required: "Seleccione un tipo de orden",
                        minlength: "ingrese al menos tres caracteres"
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });

            $("#form_orden_trabajo_menor").validate({
                rules: {
                    //primer modal//
                    nro_orden_trabajo_menor: {
                        required: true,
                        minlength: 3
                    },
                    clinica_doctor: {

                        required: true,
                        minlength: 3
                    },
                    rut_profesional: {

                        required: true,
                        minlength: 3
                    },
                    guia: {
                        required: true,
                        minlength: 3
                    },
                    color: {
                        required: true,
                        minlength: 3
                    },
                    urgencia: {

                        required: true,
                        minlength: 3
                    },
                    material: {
                        required: true,
                        minlength: 3
                    },
                    trabajo_realizar: {
                        required: true,
                        minlength: 3
                    },


                },
                messages: {
                    //primer modal//
                    nro_orden_trabajo_menor: {
                        required: "Ingrese un número de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    clinica_doctor: {
                        required: "Ingrese una clinica o un doctor",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    rut_profesional: {
                        required: "Ingrese un diagnostico post",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    guia: {
                        required: "Ingrese un organo o localización",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    color: {
                        required: "Seleccione un tipo de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    urgencia: {
                        required: "Ingrese un diagnostico post",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    material: {
                        required: "Ingrese un organo o localización",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    trabajo_realizar: {
                        required: "Seleccione un tipo de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },


                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });

            $("#form_orden_trabajo_mayor").validate({
                rules: {
                    //primer modal//
                    nro_orden_trabajo_mayor: {
                        required: true,
                        minlength: 3
                    },
                    clinica_doctor_trabajo_mayor: {

                        required: true,
                        minlength: 3
                    },
                    rut_profesional_trabajo_mayor: {

                        required: true,
                        minlength: 3
                    },
                    guia_trabajo_mayor: {
                        required: true,
                        minlength: 3
                    },
                    color_trabajo_mayor: {
                        required: true,
                        minlength: 3
                    },
                    urgencia_trabajo_mayor: {

                        required: true,
                        minlength: 3
                    },
                    material_trabajo_mayor: {
                        required: true,
                        minlength: 3
                    },
                    trabajo_realizar_trabajo_mayor: {
                        required: true,
                        minlength: 3
                    },


                },
                messages: {
                    //primer modal//
                    nro_orden_trabajo_mayor: {
                        required: "Ingrese un número de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    clinica_doctor_trabajo_mayor: {
                        required: "Ingrese una clinica o un doctor",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    rut_profesional_trabajo_mayor: {
                        required: "Ingrese un diagnostico post",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    guia_trabajo_mayor: {
                        required: "Ingrese un organo o localización",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    color_trabajo_mayor: {
                        required: "Seleccione un tipo de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    urgencia_trabajo_mayor: {
                        required: "Ingrese un diagnostico post",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    material_trabajo_mayor: {
                        required: "Ingrese un organo o localización",
                        minlength: "ingrese minimo 3 caracteres"
                    },
                    trabajo_realizar_trabajo_mayor: {
                        required: "Seleccione un tipo de orden",
                        minlength: "ingrese minimo 3 caracteres"
                    },

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });

            $("#form_radiologico_validacion").validate({
                rules: {
                    //primer modal//
                    nro_orden: {
                        required: true,
                        minlength: 3
                    },
                    tipo_examen_radiologico: {

                        required: true,
                        minlength: 1
                    },

                },
                messages: {
                    //primer modal//
                    nro_orden: {
                        required: "Ingrese un NUmero de orden",
                        minlength: "ingrese al tres un caracteres"
                    },
                    tipo_examen_radiologico: {
                        required: "Seleccione un tipo de examen Radiologico",
                        minlength: "Por favor ingrese una selección valida"
                    },



                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass(
                        "es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });

        });

        /* Biopsia */

        function modal_biopsia() {
            $('#modal_examenbiopsia_cirugia').modal('show');
        }

        function modal_interconsulta() {
            $('#modal_interconsulta').modal('show');
        }

        function alerta_registro_medicamento() {
            alert("ingreso de medicamento(s) exitoso, favor terminar el registro.");
            $('#nombre_medicamento_ficha_dental').val('');
            $('#dosis_medicamento_ficha_dental').val('');
            $('#frecuencia_medicamento_ficha_dental').val('');
            $('#via_administracion_ficha_dental').val('0');
            $('#periodo_ficha_dental').val('0');

        }

        function modal_evolucion_neonatologia() {
            $('#evol_neonatologia').modal('show');
        }

        function alerta_evolucion_neonatologia() {

            contador = 0;
            if ($('#brazalete').val() == "") {

                $('#brazalete').addClass("es-invalido");
                // $('#brazalete').focus();
                $('#validacion_brazalete').show();
                // $('#validacion_brazalete').background("red");
                $('#validacion_brazalete').html("Debe ingresar un brazalete");
                contador = contador + 1;
            } else {
                $('#brazalete').removeClass("es-invalido");
            }

            if ($('#frecuencia_cardiaca').val() == "") {

                $('#frecuencia_cardiaca').addClass("es-invalido");
                // $('#brazalete').focus();
                $('#validacion_frecuencia_cardiaca').show();
                // $('#validacion_brazalete').background("red");
                $('#validacion_frecuencia_cardiaca').html("Debe ingresar una frecuencia cardiaca");
                contador = contador + 1;
            } else {
                $('#frecuencia_cardiaca').removeClass("es-invalido");
            }

            if ($('#frecuencia_respiratoria').val() == "") {

                $('#frecuencia_respiratoria').addClass("es-invalido");
                $('#validacion_frecuencia_respiratoria').show();
                $('#validacion_frecuencia_respiratoria').html("Debe ingresar una frecuencia respiratoria");
                contador = contador + 1;

            } else {

                $('#frecuencia_respiratoria').removeClass("es-invalido");
            }

            if ($('#temperatura_axilar').val() == "") {

                $('#temperatura_axilar').addClass("es-invalido");
                $('#validacion_temperatura_axilar').show();
                $('#validacion_temperatura_axilar').html("Debe ingresar una temperatura axilar");
                contador = contador + 1;
            } else {
                $('#temperatura_axilar').removeClass("es-invalido");
            }

            if ($('#temperatura_rectal').val() == "") {

                $('#temperatura_rectal').addClass("es-invalido");
                $('#validacion_temperatura_rectal').show();
                $('#validacion_temperatura_rectal').html("Debe ingresar una temperatura rectal");
                contador = contador + 1;
            } else {
                $('#temperatura_rectal').removeClass("es-invalido");
            }

            if ($('#peso').val() == "") {

                $('#peso').addClass("es-invalido");
                $('#validacion_peso').show();
                $('#validacion_peso').html("Debe ingresar un peso");
                contador = contador + 1;
            } else {
                $('#peso').removeClass("es-invalido");
            }

            if ($('#evacuaciones').val() == "") {

                $('#evacuaciones').addClass("es-invalido");
                $('#validacion_evacuaciones').show();
                $('#validacion_evacuaciones').html("Debe ingresar una evacuaciones");
                contador = contador + 1;
            } else {
                $('#evacuaciones').removeClass("es-invalido");
            }

            if ($('#alerta').val() == "") {

                $('#alerta').addClass("es-invalido");
                $('#validacion_alerta').show();
                $('#validacion_alerta').html("Debe ingresar una alerta");
                contador = contador + 1;
            } else {
                $('#alerta').removeClass("es-invalido");
            }

            if ($('#piel').val() == "") {

                $('#piel').addClass("es-invalido");
                $('#validacion_piel').show();
                $('#validacion_piel').html("Debe ingresar una piel");
                contador = contador + 1;

            } else {
                $('#piel').removeClass("es-invalido");
            }

            if ($('#cuerpo').val() == "") {

                $('#cuerpo').addClass("es-invalido");
                $('#validacion_cuerpo').show();
                $('#validacion_cuerpo').html("Debe ingresar un cuerpo");
                contador = contador + 1;
            } else {
                $('#cuerpo').removeClass("es-invalido");
            }

            if ($('#cordon').val() == "") {

                $('#cordon').addClass("es-invalido");
                $('#validacion_cordon').show();
                $('#validacion_cordon').html("Debe ingresar un cordon");
                contador = contador + 1;

            } else {
                $('#cordon').removeClass("es-invalido");
            }
            if ($('#succion').val() == "") {

                $('#succion').addClass("es-invalido");
                $('#validacion_succion').show();
                $('#validacion_succion').html("Debe ingresar una succion");
                contador = contador + 1;
            } else {

                $('#succion').removeClass("es-invalido");
            }

            if ($('#actitud').val() == "") {

                $('#actitud').addClass("es-invalido");
                $('#validacion_actitud').show();
                $('#validacion_actitud').html("Debe ingresar una actitud");
                contador = contador + 1;
            } else {
                $('#actitud').removeClass("es-invalido");
            }

            // if ($('#otra_alimentacion').val() == "") {

            //     $('#otra_alimentacion').addClass("es-invalido");
            //     $('#validacion_otra_alimentacion').show();
            //     $('#validacion_otra_alimentacion').html("Debe ingresar un");
            //     contador = contador + 1;
            // } else {
            //     $('#otra_alimentacion').removeClass("es-invalido");
            // }

            if ($('#indicacion_madre').val() == "") {

                $('#indicacion_madre').addClass("es-invalido");
                $('#validacion_indicacion_madre').show();
                $('#validacion_indicacion_madre').html("Debe ingresar una indicacion de la madre");
                contador = contador + 1;

            } else {
                $('#indicacion_madre').removeClass("es-invalido");
            }

            if ($('#indicacion_enfermera').val() == "") {

                $('#indicacion_enfermera').addClass("es-invalido");
                $('#validacion_indicacion_enfermera').show();
                $('#validacion_indicacion_enfermera').html("Debe ingresar una indicacion de la enfermera");
                contador = contador + 1;
            } else {
                $('#indicacion_enfermera').removeClass("es-invalido");
            }

            // if ($('#indicacion_otra').val() == "") {

            //     $('#indicacion_otra').addClass("es-invalido");
            //     $('#validacion_indicacion_otra').show();
            //     $('#validacion_indicacion_otra').html("Debe ingresar una indicacion otra");
            //     contador = contador + 1;
            // } else {
            //     $('#indicacion_otra').removeClass("es-invalido");
            // }

            if (contador > 0) {
                return false;
            } else {
                alert("El registro se completara cuando se registre una evolución");
                var rows = [];

                rol = {};


                rol["brazalete"] = $.trim($('#brazalete').val());
                rol["temperatura_rectal"] = $.trim($('#temperatura_rectal').val());
                rol["peso"] = $.trim($('#peso').val());
                rol["evacuaciones"] = $.trim($('#evacuaciones').val());
                rol["alerta"] = $.trim($('#alerta').val());
                rol["piel"] = $.trim($('#piel').val());
                rol["cuerpo"] = $.trim($('#cuerpo').val());
                rol["cordon"] = $.trim($('#cordon').val());
                rol["succion"] = $.trim($('#succion').val());
                rol["actitud"] = $.trim($('#actitud').val());
                rol["otra_alimentacion"] = $.trim($('#otra_alimentacion').val());
                rol["indicacion_madre"] = $.trim($('#indicacion_madre').val());
                rol["indicacion_enfermera"] = $.trim($('#indicacion_enfermera').val());
                rol["indicacion_otra"] = $.trim($('#indicacion_otra').val());
                rol["frecuencia_respiratoria"] = $.trim($('#frecuencia_respiratoria').val());
                rol["frecuencia_cardiaca"] = $.trim($('#frecuencia_cardiaca').val());
                rol["temperatura_axilar"] = $.trim($('#temperatura_axilar').val());


                rows.push(rol);
                $('#evolucion_neonatologia').val(JSON.stringify(rows));
                $('#evol_neonatologia').modal(
                    'hide');

            }
        }

        function reset_evaluacion_neonatologia() {

            $('#brazalete').val("");
            $('#temperatura_rectal').val("");
            $('#peso').val("");
            $('#evacuaciones').val("");
            $('#alerta').val("");
            $('#piel').val("");
            $('#cuerpo').val("");
            $('#cordon').val("");
            $('#succion').val("");
            $('#actitud').val("");
            $('#otra_alimentacion').val("");
            $('#indicacion_madre').val("");
            $('#indicacion_enfermera').val("");
            $('#indicacion_otra').val("");
            $('#frecuencia_respiratoria').val("");
            $('#frecuencia_cardiaca').val("");
            $('#temperatura_axilar').val("");


            $('#brazalete').removeClass("es-invalido");
            $('#temperatura_rectal').removeClass("es-invalido");
            $('#peso').removeClass("es-invalido");
            $('#evacuaciones').removeClass("es-invalido");
            $('#alerta').removeClass("es-invalido");
            $('#piel').removeClass("es-invalido");
            $('#cuerpo').removeClass("es-invalido");
            $('#cordon').removeClass("es-invalido");
            $('#succion').removeClass("es-invalido");
            $('#actitud').removeClass("es-invalido");
            $('#otra_alimentacion').removeClass("es-invalido");
            $('#indicacion_madre').removeClass("es-invalido");
            $('#indicacion_enfermera').removeClass("es-invalido");
            $('#indicacion_otra').removeClass("es-invalido");
            $('#frecuencia_respiratoria').removeClass("es-invalido");
            $('#frecuencia_cardiaca').removeClass("es-invalido");
            $('#temperatura_axilar').removeClass("es-invalido");


            $('#validacion_brazalete').hide();
            $('#validacion_temperatura_rectal').hide();
            $('#validacion_peso').hide();
            $('#validacion_evacuaciones').hide();
            $('#validacion_alerta').hide();
            $('#validacion_piel').hide();
            $('#validacion_cuerpo').hide();
            $('#validacion_cordon').hide();
            $('#validacion_succion').hide();
            $('#validacion_actitud').hide();
            $('#validacion_otra_alimentacion').hide();
            $('#validacion_indicacion_madre').hide();
            $('#validacion_indicacion_enfermera').hide();
            $('#validacion_indicacion_otra').hide();
            $('#validacion_brazalete').hide();
            $('#validacion_frecuencia_cardiaca').hide();
            $('#validacion_frecuencia_respiratoria').hide();
            $('#validacion_temperatura_axilar').hide();
        }

        function indicar_interconsulta_cirugia() {
            var nombre_especialista_interconsulta = $("#nombre_especialista_interconsulta").val();
            var hipotesis_interconsulta = $("#hipotesis_interconsulta").val();
            var comentarios_interconsulta = $("#comentarios_interconsulta").val();

            if (comentarios_interconsulta.length < 10) {
                return;
            }

            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr class="tr_interconsulta" id="row' + i + '"><td>' +
                nombre_especialista_interconsulta + '</td><td>' +
                hipotesis_interconsulta + '</td><td>' +
                comentarios_interconsulta + '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove1">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#tabla_interconsulta tr:first').after(fila);
            $("#adicionados1").text(
                ""
            );

            //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tabla_interconsulta tr").length;
            $("#adicionados1").append(nFilas - 1);
            $("#nombre_especialista_interconsulta").val("");
            $("#hipotesis_interconsulta").val("");
            $("#comentarios_interconsulta").val("");

        }

        function alerta_registro_interconsulta() {
            alert("El registro se completara cuando se registre una evolución");
        }

        function agregar_interconsulta_cirugia() {
            var rows = [];
            $('#tabla_interconsulta tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_especialista_interconsulta"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["hipotesis_interconsulta"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["comentarios_interconsulta"] = $.trim($(data[2]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#interconsultas_cirugia').val(JSON.stringify(rows));
        }

        function mostrar_modal_examen_cirguria() {

            $("#indicar_examenes").modal("show");

        }

        function indicar_examen_cirugia() {
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

        function agregar_examenes_cirugia() {
            var rows = [];
            $('#tabla_examen_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes_cirugia').val(JSON.stringify(rows));
        }

        function indicar_medicamento_cirugia() {
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
                nombre_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                dosis_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                frecuencia_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                via_administracion_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                periodo_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                '<button id="' + i +
                '</td><td><button type="button" name="remove" id="' + i +
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

        function agregar_medicamentos_cirugia() {


            var rows1 = [];
            $('#tabla_medicamento_cirugia tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["medicamento"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["dosis"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["frecuencia"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["comentario"] = $.trim($(data[5]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });

            $('#medicamentos_cirugia').val(JSON.stringify(rows1));
            alert($('#medicamentos_cirugia').val());

        }


        //Cirugia Obstetrica

        function abrir_toogle_indicaciones() {

            $('#induc_1').toggle();
        }


        function m_ev_neo() {
            $('#neonatologia').modal('show');
        }

        /* Carnet recien nacido */
        function m_rc() {
            $('#carne_rn_modal').modal('show');
        }


        //Cirugia
        /* Carnet de alta*/
        function carnet_alta() {
            $('#carnet_alta_modal').modal('show');
        };

        function cargar_datos_lugar_atencion() {

            let lugar_atencion = $('#lugar_atencion_pabellon_quirurgico option:selected').val();

            let url = "{{ route('cirugia.cargar_lugar_atencion') }}";
            $.ajax({

                    url: url,
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        lugar_atencion: lugar_atencion,


                    },
                })
                .done(function(data) {
                    console.log(data)


                    if (data != null) {

                        data = JSON.parse(data);


                        $('#email_quirurgico').val(data.email);
                        $('#telefono_quirurgico').val(data.telefono);
                        $('#codigo_quirurgico').val(data.id);




                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        }
        //Fin Cirugia


        //Dental

        /* Antecedentes dentales*/
        function anestesia_local_dental() {

            $('#procedimiento_anestesia_ficha_atencion').val('');
            $('#lugar_anestesia_ficha_atencion').val('');
            $('#rut_anestesia_ficha_atencion').val('');
            $('#tratamiento_anestesia_ficha_atencion').val('');
            $('#form_antecedente_anestesia').trigger("reset");

            //$('#modal_anestesia').modal('show');
            $('#anestesia_local_modal').modal('show');
        }

        function hemorragia_dental() {

            $('#form_antecedente_hemorragia').trigger("reset");
            $('#procedimiento_hemorragia_ficha_atencion').val('');
            $('#lugar_hemorragia_ficha_atencion').val('');
            $('#rut_hemorragia_ficha_atencion').val('');
            $('#tratamiento_hemorragia_ficha_atencion').val('');
            $('#hemorragias_modal').modal('show');
        }

        function fractura_dental() {

            $('#form_antecedente_fractura').trigger("reset");
            $('#procedimiento_fractura_ficha_atencion').val('');
            $('#lugar_fractura_ficha_atencion').val('');
            $('#rut_fractura_ficha_atencion').val('');
            $('#tratamiento_fractura_ficha_atencion').val('');
            $('#fracturas_modal').modal('show');
        }


        function anestesia_local() {
            $('#anestesia_local_modal').modal('show');
        }

        function hemorragias() {
            $('#hemorragias_modal').modal('show');
        }

        function fracturas() {
            $('#fracturas_modal').modal('show');
        }

        function registrar_tratamiento_maxilar_superior_infantil() {

            alert($('#terminado_infantil_maxilar_superior').prop('checked'));
            let id_paciente = $('#id_paciente_maxilar_superior').val();
            let procedimiento = $('#procedimiento_infantil_maxilar_superior').val();
            let comentario = $('#comentarios_infantil_maxilar_superior').val();
            let termiando = 0;
            if ($('#terminado_infantil_maxilar_superior').prop('checked') == true) {
                terminado = 1;

            }

            let agendar = 0;
            if ($('#agendar_hora_infantil_maxilar_superior').prop('checked') == true) {
                agendar = 1;
                let url = "{{ route('profesional.mi_agenda') }}";

                //$(location).prop('href', {{ route('profesional.mi_agenda') }});
            }

            let url = "{{ route('dental_infantil.registrar_maxilar_superior_infantil') }}";

            $.ajax({

                    url: url,
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        id_paciente: id_paciente,
                        procedimiento: procedimiento,
                        comentario: comentario,
                        termiando: termiando

                    },
                })
                .done(function(data) {

                    if (data == 'exito') {
                        if (agendar == 1) {
                            window.location.href = url;
                        }
                    }

                    /*  $('.tr_historia_odontograma').empty();

                                        if (data != null) {

                                            data = JSON.parse(data);
                                            for (let index = 0; index < data.length; index++) {
                                                let fecha = data[index].created_at;
                                                let diagnostico = data[index].diagnostico;
                                                let tratamiento = data[index].tratamiento;
                                                let pieza = data[index].pieza;
                                                let caras = data[index].caras;

                                                var i; //contador para asignar id al boton que borrara la fila
                                                var fila = '<tr class="tr_historia_odontograma" id="row' + i + 1 + '">' +
                                                    '<td class="text-center align-middle">' +
                                                    fecha + '</td>' +
                                                    '<td class="text-center align-middle">' +
                                                    diagnostico + '</td>' +
                                                    '<td class="text-center align-middle">' +
                                                    tratamiento + '</td>' +
                                                    '<td class="text-center align-middle">' +
                                                    caras + '</td>' +
                                                    '<td class="text-center align-middle">' +
                                                    pieza + '</td> </tr>'; //esto seria lo que contendria la fila

                                                i++;

                                                $('#historia_odontograma tr:first').after(fila);

                                                //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                                                var nFilas = $("#historia_odontograma tr").length;
                                                //$("#adicionados").append(nFilas - 1);
                                                //$("#sub_tipo_examen").empty();
                                                //$("#nro_orden").disabled();

                                            }



                                    } */
                    else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }

        function info_odontograma(valor) {

            let pieza = valor;
            let id_paciente = $('#paciente_odontograma').val();
            // alert(id_paciente);

            let url_1 = "{{ route('dental_infantil.listar_odontograma_infantil') }}";

            $.ajax({

                    url: url_1,
                    type: "get",
                    data: {

                        pieza: pieza,
                        id_paciente: id_paciente


                    },
                })
                .done(function(data) {

                    $('.tr_historia_odontograma').empty();

                    if (data != null) {

                        data = JSON.parse(data);
                        for (let index = 0; index < data.length; index++) {
                            let fecha = data[index].created_at;
                            let diagnostico = data[index].diagnostico;
                            let tratamiento = data[index].tratamiento;
                            let pieza = data[index].pieza;
                            let caras = data[index].caras;

                            var i; //contador para asignar id al boton que borrara la fila
                            var fila = '<tr class="tr_historia_odontograma" id="row' + i + 1 + '">' +
                                '<td class="text-center align-middle">' +
                                fecha + '</td>' +
                                '<td class="text-center align-middle">' +
                                diagnostico + '</td>' +
                                '<td class="text-center align-middle">' +
                                tratamiento + '</td>' +
                                '<td class="text-center align-middle">' +
                                caras + '</td>' +
                                '<td class="text-center align-middle">' +
                                pieza + '</td> </tr>'; //esto seria lo que contendria la fila

                            i++;

                            $('#historia_odontograma tr:first').after(fila);

                            //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                            var nFilas = $("#historia_odontograma tr").length;
                            //$("#adicionados").append(nFilas - 1);
                            //$("#sub_tipo_examen").empty();
                            //$("#nro_orden").disabled();

                        }



                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });


            $('#modal_odontograma').modal('show');
        }

        function es_ges() {
            if ($('#ges_ficha_dental').prop('checked')) {
                $('#form_ges_dental').modal('show');

            }

        }

        function ges_seleccionado() {
            let ges_selec = $('#nombre_ges').val();
            console.log(ges_selec);
            if (ges_selec > 0) {
                $('#nombre_ges_dental_selec').text($('#nombre_ges option:selected').text());
                $('#ges_botn_eliminar').show();
            }

        }

        function limpiar_ges_seleccionado() {

            $('#nombre_ges_dental_selec').text('');
            $('#ges_botn_eliminar').hide();
            $('#ges_ficha_dental').prop('checked', false);

        }

        function quitar_ges_seleccionado() {
            $('#nombre_ges_dental_selec').text('');
            $('#ges_botn_eliminar').hide();
        }

        function agregar_control_endodoncia() {

            let fecha = $('#fecha_control_endodoncia').val();
            let nro_pieza = $('#nro_pieza_control_endodoncia').val();
            let resp_calor = $('#respuesta_calor_control_endodoncia').val();
            let resp_frio = $('#respuesta_frio_control_endodoncia').val();
            let electrico = $('#electrico_control_endodoncia').val();
            let percucion = $('#percucion_control_endodoncia').val();
            let exploracion = $('#exploracion_control_endodoncia').val();
            let cavitaria = $('#cavitaria_control_endodoncia').val();
            let id_paciente = $('#paciente_control_endodoncia').val();

            let url = "{{ route('dental.registrar_control_endodoncia') }}";
            $.ajax({

                    url: url,
                    type: "post",
                    data: {
                        _token: CSRF_TOKEN,
                        nro_pieza: nro_pieza,
                        resp_calor: resp_calor,
                        resp_frio: resp_frio,
                        fecha: fecha,
                        electrico: electrico,
                        percucion: percucion,
                        exploracion: exploracion,
                        cavitaria: cavitaria,
                        id_paciente: id_paciente,

                    },
                })
                .done(function(data) {
                    console.log(data)


                    if (data != null) {

                        data = JSON.parse(data);

                        let fecha_ce = data.fecha;
                        let nro_pieza_ce = data.nro_pieza;
                        let resp_calor_ce = data.respuesta_calor;
                        let resp_frio_ce = data.respuesta_frio;
                        let electrico_ce = data.electrico;
                        let percucion_ce = data.percucion;
                        let exploracion_ce = data.exploracion;
                        let cavitaria_ce = data.cavitaria;


                        var i; //contador para asignar id al boton que borrara la fila
                        var fila = '<tr class="tr_control_endodoncia" id="row' + i + 1 + '">' +
                            '<td class="text-center align-middle">' +
                            fecha_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            nro_pieza_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            resp_calor_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            resp_frio_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            electrico_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            electrico_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            electrico_ce + '</td>' +
                            '<td class="text-center align-middle">' +
                            electrico_ce + '</td></tr>'; //esto seria lo que contendria la fila

                        i++;

                        $('#tabla_control_endodoncia tr:first').after(fila);

                        //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                        var nFilas = $("#tabla_control_endodoncia tr").length;
                        //$("#adicionados").append(nFilas - 1);
                        //$("#sub_tipo_examen").empty();
                        //$("#nro_orden").disabled();

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
        }



        function ficha_endodoncia() {
            let tipo_dolor = "";
            if ($('#espontaneo_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#provocado_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#pulsatil_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#ocacional_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#constante_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#leve_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#moderado_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#intenso_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#localizado_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1|';
            } else {
                tipo_dolor = tipo_dolor + '0|';
            }
            if ($('#referido_ficha_endodoncia').prop('checked')) {
                tipo_dolor = tipo_dolor + '1';
            } else {
                tipo_dolor = tipo_dolor + '0';
            }

            $('#tipo_dolor_ficha_endodoncia').val(tipo_dolor);

            let provoca_dolor = "";
            if ($('#calor_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#frio_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#actividad_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#masticacion_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#dolor_otro_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#palpacion_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#decubito_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#diurno_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1|';
            } else {
                provoca_dolor = provoca_dolor + '0|';
            }
            if ($('#nocturno_ficha_endodoncia').prop('checked')) {
                provoca_dolor = provoca_dolor + '1';
            } else {
                provoca_dolor = provoca_dolor + '0';
            }

            $('#provoca_dolor_ficha_endodoncia').val(provoca_dolor);

            let examen_extra_oral = "";

            if ($('#extra_aum_vol_ficha_endodoncia').prop('checked')) {
                examen_extra_oral = examen_extra_oral + '1|';
            } else {
                examen_extra_oral = examen_extra_oral + '0|';
            }
            if ($('#extra_fist_ficha_endodoncia').prop('checked')) {
                examen_extra_oral = examen_extra_oral + '1|';
            } else {
                examen_extra_oral = examen_extra_oral + '0|';
            }
            if ($('#extra_adeno_ficha_endodoncia').prop('checked')) {
                examen_extra_oral = examen_extra_oral + '1';
            } else {
                examen_extra_oral = examen_extra_oral + '0';
            }

            $('#examen_extra_oral_ficha_endodoncia').val(examen_extra_oral);

        }

        function check_menos_una_semana() {

            //tiempo_evolucion
            if ($('#menos_semana_ficha_endodoncia').prop('checked')) {
                $('#hidden_tiempo_evolucion_ficha_endodoncia').val(0);
                if ($('#mas_semana_ficha_endodoncia').prop('checked') || $('#efecto_analgesico_ficha_endodoncia').prop(
                        'checked')) {
                    $("#mas_semana_ficha_endodoncia").prop("checked", false);
                    $("#efecto_analgesico_ficha_endodoncia").prop("checked", false);
                }
            }

        }

        function check_mas_una_semana() {

            //tiempo_evolucion
            if ($('#mas_semana_ficha_endodoncia').prop('checked')) {
                $('#hidden_tiempo_evolucion_ficha_endodoncia').val(1);
                if ($('#menos_semana_ficha_endodoncia').prop('checked') || $('#efecto_analgesico_ficha_endodoncia')
                    .prop(
                        'checked')) {
                    $("#menos_semana_ficha_endodoncia").prop("checked", false);
                    $("#efecto_analgesico_ficha_endodoncia").prop("checked", false);
                }
            }

        }

        function check_efecto_analgesico() {

            //tiempo_evolucion
            if ($('#efecto_analgesico_ficha_endodoncia').prop('checked')) {
                $('#hidden_tiempo_evolucion_ficha_endodoncia').val(2);
                if ($('#mas_semana_ficha_endodoncia').prop('checked') || $('#menos_semana_ficha_endodoncia').prop(
                        'checked')) {
                    $("#mas_semana_ficha_endodoncia").prop("checked", false);
                    $("#menos_semana_ficha_endodoncia").prop("checked", false);
                }
            }

        }

        function registrar_consulta_medica() {

            var rows = [];
            $('#tabla_examen tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes').val(JSON.stringify(rows));

            var rows1 = [];
            $('#tabla_medicamento tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["medicamento"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["dosis"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["frecuencia"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["comentario"] = $.trim($(data[5]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });
            $('#medicamentos').val(JSON.stringify(rows1));

        };

        function reset_form(tipo) {

            let form = tipo;
            $("label.error").hide();
            $(".error").removeClass("error");
            $('#' + form).validate().resetForm();
            //$('#form_certificado_reposo')[0].reset();
            //$("#fecha_inicio_certificado").trigger('reset');
            //("#fecha_termino_certificado").trigger('reset');


        };

        /* function imprimir_certificado_reposo() {

             let fecha_inicio_certificado = $('#fecha_inicio_certificado').val();
             let fecha_termino_certificado = $('#fecha_termino_certificado').val();
             let hipotesis_certificado = $('#hipotesis_certificado').val();
             let comentarios_certificado = $('#comentarios_certificado').val();
             let id_paciente = $('#paciente_certificado_reposo').val();

             $.ajax({
                     url: url,
                     type: "get",
                     data: {

                         fecha_inicio_certificado: fecha_inicio_certificado,
                         fecha_termino_certificado: fecha_termino_certificado,
                         hipotesis_certificado: hipotesis_certificado,
                         comentarios_certificado: comentarios_certificado,
                         id_paciente: id_paciente,

                     },
                 })
                 .done(function(data) {



                 })
                 .fail(function(jqXHR, ajaxOptions, thrownError) {
                     console.log(jqXHR, ajaxOptions, thrownError)
                 });
         };
        */

        function getDosis() {

            let id_medicamento = $('#id_medicamento_ficha_dental').val();
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
                        let dosis = $('#dosis_medicamento_ficha_dental');

                        dosis.find('option').remove();
                        dosis.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.dosis + '">' + v.present +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function getFrecuencia() {

            let id_dosis = $('#dosis_medicamento_ficha_dental').val();
            //console.log(dosis);

            let url = "{{ route('dental.getFrecuencia') }}";
            $.ajax({

                    url: url,
                    type: "get",
                    data: {

                        id_dosis: id_dosis,

                    },
                })
                .done(function(data) {
                    console.log(data)

                    if (data != null) {

                        data = JSON.parse(data);
                        console.log(data)
                        let dosis = $('#frecuencia_medicamento_ficha_dental');

                        dosis.find('option').remove();
                        dosis.append('<option value="0">seleccione</option>');
                        $(data).each(function(i, v) { // indice, valor
                            dosis.append('<option value="' + v.id + '">' + v.indic +
                                '</option>');
                        })

                    } else {



                    }

                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

        };

        function indicar_medicamento_fd() {

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
            var fila = '<tr class="tr_indicar_medicamento_fd" id="row' + i + '">' +
                '<td class="text-center align-middle">' +
                nombre_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                dosis_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                frecuencia_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                via_administracion_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                periodo_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                '<button id="' + i +
                '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#tabla_indicar_medicamento_fd tr:first').after(fila);

            //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tr_indicar_medicamento_fd tr").length;
            //$("#adicionados").append(nFilas - 1);
            //$("#sub_tipo_examen").empty();
            //$("#nro_orden").disabled();

        };

        function es_cronico() {
            if ($('#cronico_ficha_dental').prop('checked')) {
                $('#form_enfermedad_cronica').modal('show');
                $('#hipertension_div').hide();
                $('#control_peso_div').hide();
                $('#diabetes_div').hide();

            }

        };

        function cambiar_enfermedad_cronica() {
            switch ($('#cronicos').val()) {
                case 'cpeso':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').show();
                    $('#diabetes_div').hide();
                    break;
                case 'chipertension':
                    $('#hipertension_div').show();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').hide();

                    break;
                case 'cdiabet':
                    $('#hipertension_div').hide();
                    $('#control_peso_div').hide();
                    $('#diabetes_div').show();

                    break;

                default:
                    break;
            }
        };

        function registrar_control_obesidad_dental() {



            let peso = $('#registro_peso').val();
            let variacion = $('#registro_peso_variacion').val();
            let ideal = $('#registro_peso_ideal').val();
            let url = "{{ route('dental.registrar_control_obesidad') }}";
            let paciente_atencion_dental = $('#paciente_atencion_dental').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        peso: peso,
                        variacion: variacion,
                        ideal: ideal,
                        paciente_atencion_dental: paciente_atencion_dental
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de obesidad correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        $('#tr_obesidad').show();
                        //location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function registrar_hipertension() {



            let sistolica = $('#presion_sistolica_hipertension').val();
            let diastolica = $('#presion_diastolica_hipertension').val();
            let ideal = $('#ideal_hipertension').val();
            let url = "{{ route('dental.registrar_hipertension') }}";
            let paciente_atencion_dental = $('#paciente_atencion_dental').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        sistolica: sistolica,
                        diastolica: diastolica,
                        ideal: ideal,
                        paciente_atencion_dental: paciente_atencion_dental
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de hipertensión correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        $('#tr_hipertesion').show();
                        //location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function registrar_diabetes() {


            let peso = $('#peso_diabetes').val();
            let pies = $('#pies_diabetes').val();
            let hgac1 = $('#hga1c_diabetes').val();
            let colesterol = $('#colesterol_diabetes').val();
            let creatina = $('#creatina_diabetes').val();
            let glicosilada_postprandial = $('#glicosilada_postprandial_diabetes').val();
            let glicosinada_ayuno = $('#glicosilada_ayuno_diabetes').val();
            let url = "{{ route('dental.registrar_diabetes') }}";
            let paciente_atencion_dental = $('#paciente_atencion_dental').val();

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
                        paciente_atencion_dental: paciente_atencion_dental
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        //$('#form_control_obesidad').trigger("reset");
                        $('#mensaje').text('Se ha agregago control de diabetes correctamente');
                        $('#mensaje').show();
                        $('#form_enfermedad_cronica').modal('hide');
                        $('#tr_diabetes').show();
                        //   location.reload();
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function validar() {
            $('#form_radiologico_validacion').validate({
                rules: {
                    //primer modal//
                    nro_orden: {
                        required: true,
                        minlength: 3
                    }


                },
                messages: {
                    //primer modal//
                    nro_orden: {
                        required: "Ingrese in laboratorio",
                        minlength: "ingrese al tres un caracteres"
                    }

                },
                highlight: function(element) {
                    var $el = $(element);
                    var $parent = $el.parents(".form-group");

                    $el.addClass("es-invalido");

                    // Select2 and Tagsinput
                    if ($el.hasClass("select2-hidden-accessible") || $el.attr("data-role") ===
                        "tagsinput") {
                        $el.parent().addClass("es-invalido");
                        return;
                    }
                },
                unhighlight: function(element) {
                    $(element).parents(".form-group").find(".es-invalido").removeClass("es-invalido");
                },
                submitHandler: function(form) {
                    console.log("AJAX");
                }
            });
        };

        function agregar_examen_radiologico() {

            if ($('#nro_orden').val() == '') {
                return;
            }

            if ($('#tipo_examen_radiologico').val() == '') {
                return;
            }

            $('#btn_registrar_examen_radiologico').show();

            //$('id_paciente_examen_radiologico').val();
            let nro_orden = $('#nro_orden').val();
            let tipo_examen_radiologico = $('#tipo_examen_radiologico option:selected').text();

            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr class="tr_examen_radiologico" id="row' + i + '">' +
                '<td class="text-center align-middle">' +
                '<span>01/03/22</span></td>' +
                '<td class="text-center align-middle">' +
                nro_orden + '</td>' +
                '<td class="text-center align-middle">' +
                tipo_examen_radiologico + '</td>' +
                '<td class="text-center align-middle">' +
                '<button id="' + i +
                '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#examen_radiologico tr:first').after(fila);

            //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tr_examen_radiologico tr").length;
            //$("#adicionados").append(nFilas - 1);
            //$("#sub_tipo_examen").empty();
            //$("#nro_orden").disabled();

        };

        function registrar_examen_radiologico() {


            var rows = [];
            $('#examen_radiologico tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");

                    rol["fecha_examen"] = $.trim($(data[0]).text().split("\n")
                        .join(""));
                    rol["nro_orden"] = $.trim($(data[1]).text().split("\n")
                        .join(""));
                    rol["examen_radiologico"] = $.trim($(data[2]).text().split("\n")
                        .join(""));
                    rows.push(rol);
                }
            });
            $('#radiologicos').val(JSON.stringify(rows));
            if ($('#radiologicos').val() == null) {
                return;
            }
            /*  let radiologicos = $('#radiologicos').val(JSON.stringify(rows));
                        let id_paciente = $('#paciente_radiologico').val();
                        let url = "{{ route('dental.registrar_examen_radiologico') }}";
            */

            /*  $.ajax({
                      url: url,
                      type: "get",
                      dataTexamenes_radiologicosype: 'json',
                      data: {
                          radiologicos: radiologicos,
                          id_paciente: id_paciente
                      },

                  })
                  .done(function(data) {
                      if (data == 'exito') {
                          alert('exito');

                      } else {
                          alert('exito')
                      }
                  })
                  .fail(function(jqXHR, ajaxOptions, thrownError) {
                      console.log(jqXHR, ajaxOptions, thrownError)
                  });*/

        };

        function indicar_medicamentos_cirugia() {

            $('#indicar_medicamentos_cirugia').modal('show');
        }

        function agregar_medicamento_cirugia(tipo) {

            if (tipo == 0) {

            }

            let nombre_medicamento_ficha_dental = $('#nombre_medicamento_ficha_dental').val();
            let dosis_medicamento_ficha_dental = $('#dosis_medicamento_ficha_dental option:selected').text();
            let frecuencia_medicamento_ficha_dental = $('#frecuencia_medicamento_ficha_dental option:selected').text();
            let via_administracion_ficha_dental = $('#via_administracion_ficha_dental option:selected').text();
            let periodo_ficha_dental = $('#periodo_ficha_dental option:selected').text();


            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr class="tr_indicar_medicamento_fd" id="row' + i + '">' +
                '<td class="text-center align-middle">' +
                nombre_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                dosis_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                frecuencia_medicamento_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                via_administracion_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                periodo_ficha_dental + '</td>' +
                '<td class="text-center align-middle">' +
                '<button id="' + i +
                '</td><td><button type="button" name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#tabla_indicar_medicamento_fd tr:first').after(fila);

            //$("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tr_indicar_medicamento_fd tr").length;
            //$("#adicionados").append(nFilas - 1);
            //$("#sub_tipo_examen").empty();
            //$("#nro_orden").disabled();

        }

        function registrar_cirugia_dental() {

            var rows = [];
            $('#tabla_examen tr').each(function(i, n) {
                if (i > 0) {
                    console.log(i);
                    rol = {};
                    var data = $(this).find("td");
                    rol["nombre_examen"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["tipo"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["subtipo"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["prioridad"] = $.trim($(data[3]).text().split("\n").join(""));
                    rows.push(rol);
                }
            });
            $('#examenes_cirugia_dental').val(JSON.stringify(rows));

            var rows1 = [];
            $('#tabla_medicamento tr').each(function(i, n) {
                if (i > 0) {
                    rol = {};
                    var data = $(this).find("td");
                    rol["medicamento"] = $.trim($(data[0]).text().split("\n").join(""));
                    rol["presentacion"] = $.trim($(data[1]).text().split("\n").join(""));
                    rol["dosis"] = $.trim($(data[2]).text().split("\n").join(""));
                    rol["frecuencia"] = $.trim($(data[3]).text().split("\n").join(""));
                    rol["periodo"] = $.trim($(data[4]).text().split("\n").join(""));
                    rol["comentario"] = $.trim($(data[5]).text().split("\n").join(""));
                    rows1.push(rol);
                }
            });
            $('#medicamentos_recuperacion_cirugia_dental').val(JSON.stringify(rows1));

        };
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
    </script>
</body>

</html>
