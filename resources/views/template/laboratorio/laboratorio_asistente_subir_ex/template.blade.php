<!DOCTYPE html>
<html lang="es">

<head>
    <title>Asistente Laboratorio Examen</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI" />

    <link rel="icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}?t={{ time() }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}">

    <!-- Rating css -->
    {{-- <link rel="stylesheet" href='{{ asset('css/plugins/bars-1to10.css') }}'/> --}}
    <!--boton azul-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <link rel="stylesheet" href='{{ asset('css/boton-flotante.css') }}'/>
    <!--Estilos base-->
    <link rel="stylesheet" href='{{ asset('css/style.css') }}'/>
    <!--Estilos escritorios-->
    <link rel="stylesheet" href='{{ asset('css/escritorios.css') }}'/>
    <!--Estilos formularios sm-->
    <link rel="stylesheet" href='{{ asset('css/formulario_sm.css') }}'/>
    <!-- data tables css -->
    <link rel="stylesheet" href='{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/responsive.bootstrap4.min.css') }}'/>
    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tabs-secciones.css') }}'/>
    <!--Tags-->
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput.css') }}'/>
    <link rel="stylesheet" href='{{ asset('css/plugins/bootstrap-tagsinput-typeahead.css') }}'/>
    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!--Accordion-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/accordion.css') }}'/>
    <!--Card Sidebar-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/card_sidebar.css') }}'/>
    <!--Pills Modals-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/pills_modals.css') }}'/>
    <!--Tab wizard_formularios-->
    <link rel="stylesheet" type="text/css" href='{{ asset('css/tab_wizard_formularios.css') }}'/>
    <!--Bs-Canvas-->
    <link rel="stylesheet" href='{{ asset('css/bs_canvas.css') }}'/>
    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>

    @include('template.laboratorio.laboratorio_asistente_subir_ex.menu')
    @include('template.laboratorio.laboratorio_asistente_subir_ex.header')


    @yield('content')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!-- datatable Js -->
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    {{--  <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>  --}}

    <script src="{{ asset('js/sidebar.js') }}?upd={{ random_int(1111,9999) }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!-- form-advance custom js -->
    {{-- <script src="{{ asset('js/pages/form-advance-custom.js') }}"></script> --}}

    <!--Accordion-->
    <script src="{{ asset('js/accordion.js') }}"></script>

    <!--Sidebars-->
    <script src="{{ asset('js/bs_canvas.js') }}"></script>

    <!--Form wizard-->
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/formularios_wizard.js') }}"></script>

    <!-- datepicker js -->
    <script src="{{ asset('js/plugins/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/pages/ac-datepicker.js') }}"></script>


    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>

    <!--Graficos-->
    <!-- sweet alert Js -->
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    {{-- autocomplete --}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- select2 -->
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

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

        });

	</script>
    @yield('page-script')
</body>

</html>
