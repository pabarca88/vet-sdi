<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sdi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

    <!-- Styles -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_profesional.css') }}">

    <!-- select2 selectbonito css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formularios.css') }}">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">

    <!-- fileupload-custom css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dropzone/dropzone.css') }}?t={{ time() }}">
    <!-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5.9.3/dist/dropzone.css" type="text/css" /> -->

    <link rel="stylesheet" href="{{ asset('css/bs_canvas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilos_atencion_medica.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> --}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!--boton azul-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/nav_azul_sm.css') }}?t={{ time() }}">

    <!--Estilo tab secciones -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/tabs-secciones.css') }}">

    <!-- flatpickr -->
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

    {{-- summernote --}}
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.min.css') }}">

    @yield('page-style')

    <style>
        .select2-container--open{
            z-index: 9999999 !important;
        }
        .diagnostico_activo{
            background: #fff !important;
        }
        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
        }

        /* kill the scrollbars and allow natural height */
        .fc-scroller,
        .fc-day-grid-container,
        /* these divs might be assigned height, which we need to cleared */
        .fc-time-grid-container {
            /* */
            overflow-x: hidden;
            overflow-y: auto !important;
            height: auto !important;
        }

        /* kill the horizontal border/padding used to compensate for scrollbars */
        .fc-row {
            border: 0 !important;
            margin: 0 !important;
        }

        .fc .fc-timegrid-slot {
            height: 3.5em;
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

    @include('template.laboratorio.laboratorio_asistente.menu')
    @include('template.laboratorio.laboratorio_asistente.header')


    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>


    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script> --}}
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- fancy box -->
    <link rel="stylesheet" href="{{ asset('css/fancybox/fancybox.css') }}" />
    <script src="{{ asset('css/fancybox/fancybox.umd.js') }}"></script>

    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- momnent -->
    <script src="{{ asset('js/moment.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <!--full calendar 5-->
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/main.js') }}'></script>
    <script src='{{ asset('js/fullcalendar-5.10.1/lib/locales/es.js') }}'></script>

    <script src="https://unpkg.com/popper.js/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>

    {{-- autocomplete --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

    <!-- funciones generales -->
    <script src="{{ asset('js/funciones.js') }}"></script>

    <!-- flatpickr -->
    <script src="{{ asset('js/flatpickr/flatpickr.min.js') }}"></script>

    <!-- file-upload Js -->
    <script src="{{ asset('js/plugins/dropzone/dropzone.js') }}"></script>


	<script src="{{ asset('js/jQuery-Mask-Plugin-master/jquery.mask.js') }}"></script>

    {{-- summernote --}}
	<script src="{{ asset('summernote/summernote-lite.min.js') }}"></script>


    <script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

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

        function cuenta_corriente() {
            $('#dat_bancarios').modal('show');
        }
        function rol_profesional_cm() {
            $('#rol_permisos_profesional_cm').modal('show');
        }
        function horario_profesional_cm() {
            $('#horario_usuario').modal('show');
        }
        function convenio_profesional_cm() {
            $('#convenio_usuario').modal('show');
        }

    </script>
    @yield('page-script')
</body>

</html>
