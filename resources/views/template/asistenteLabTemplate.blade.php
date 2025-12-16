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

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('css/escritorio_laboratorio.css') }}?t={{ time() }}"/>
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}"/>

</head>
<body>
    <div id="app" style="margin: 0; padding: 0;">

    </div>

    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Atención</h1>
            <p>Estás usando una versión desactualizada de Internet Explorer. Por favor<br>actualize su navegador a alguno de estos navegadores.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/es-CL/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.opera.com/es/download">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.microsoft.com/es-es/edge">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>¡Disculpe las molestias!</p>
        </div>
    <![endif]-->

    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/vendor-all.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.bundle.min.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('js/datatables.min.js') }}" ></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>
    {{-- autocomplete
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>--}}
    <script src="{{ asset('js/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <!--<script src="../assets/js/menu-setting.min.js"></script>-->
    <!-- <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>-->
    <script src="{{ asset('/js/esc_asis_lab.js') }}"></script>
    @if (Auth::check())
        <script>window.code= {!! json_encode($code); !!};</script>
    @else
        <script>window.code = null;</script>
    @endif

</body>
</html>
