<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dirección Salud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">

    <link rel="icon" href="{{ asset('images/sdi-icon.png') }}" type="image/x-icon">
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

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">


    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <!--boton azul-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

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

    <!-- Select2 css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!--formulario sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
    {{--  /** agregar css */  --}}

    <style>
        .ui-front {
            position: absolute;
            z-index: 3000;
            overflow: auto;
        }
    </style>

</head>

<body>

    @include('template.direccion_salud.menu')
    @include('template.direccion_salud.header')

    @yield('content')

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

    <!--SELECT 2-->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

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

    {{--  @include('template.templateAutorizacion')  --}}


    <!-- form-advance custom js -->
    {{--  <script src="{{ asset('js/pages/form-advance-custom.js') }}?upd={{ random_int(1111,9999) }}"></script>  --}}

    <!--Apgar-->
    <script src="{{ asset('js/aicalc2.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Botón cards-->
    <script src="{{ asset('js/btn-cards.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Modals Sidebar derecho-->
    <script src="{{ asset('js/modals_sidebar_esp.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!--Tablas y Toggle atención ginecobstetrica-->
    <script src="{{ asset('js/atencion_especialidades.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

    <!-- funciones generales -->
    <script src="{{ asset('js/funciones.js') }}"></script>

    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(document).ready(function () {
            $('#profesionales_ministerio').DataTable({
                responsive: true,
            });
            $('#pacientes_ministerio').DataTable({
                responsive: true,
            });

            $('#directores_hosp_ministerio').DataTable({
                responsive: true,
            });

            $('#directores_cm_ministerio').DataTable({
                responsive: true,
            });

            $('#laboratorios_ministerio').DataTable({
                responsive: true,
            });
        });

    </script>

    @yield('page-script')

</body>
</html>
