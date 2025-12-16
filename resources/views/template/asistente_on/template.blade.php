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

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/escritorio_asistente.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/ekko-lightbox.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plugins/lightbox.min.css') }}">
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}">

    @yield('page-styles')
</head>
<body>

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    @include('template.asistente_on.menu')
    @include('template.asistente_on.header')

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

    <script src="{{ asset('js/plugins/dataTables.responsive.min.j') }}s"></script>
    <script src="{{ asset('js/pages/data-responsive-custom.js') }}"></script>
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>
    <script src="{{ asset('js/toggle_asistentes.js') }}"></script>
    {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- rut -->
    <script src="{{ asset('js/rut.js') }}"></script>

    <!-- funciones generales -->
    <script src="{{ asset('js/funciones.js') }}"></script>


    @yield('page-script')
</body>
</html>
