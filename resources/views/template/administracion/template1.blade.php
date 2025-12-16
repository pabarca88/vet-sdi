<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema || Redmedichile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}">


    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}">
    <!--Estilos formularios sm-->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
    <!--Estilos Pills sm Info-->
    <link rel="stylesheet" href="{{ asset('css/pills_sm_info.css') }}">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/responsive.bootstrap4.min.css') }}">

    @yield('page-styles')
</head>

<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>

    @include('template.administracion.menu')
    @include('template.administracion.header')

    @yield('content')

    @include('administracion.modales.modal_registrar_administrador')

    <footer>
        @include('template.include.footer')
    </footer>

    <script>
        guardar_permiso(id, nombre) {

            let id_permiso = id;
            if ($('#' + nombre).prop('checked')) {

                $.ajax({
                        url: "{{ route('admin.agregar_permiso') }}",
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            id_permiso: id_permiso
                        },
                    })
                    .done(function(response) {
                        alert('permiso asignado de forma correcta');
                    })
                    .fail(function() {
                        console.log("error");
                    })
            } else {

            }
        };
    </script>
{{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <!-- datatable Js -->
    <script src="{{ asset('js/tablas_administrador.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

</body>

</html>
