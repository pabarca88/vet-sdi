<!DOCTYPE html>
<html lang="es">

<head>
    <title>SDI</title>
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="SDI" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/style_index.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/bifurcador.css') }}?t={{ time() }}">
</head>

<body
    style="background-image: url({{ asset('images/background_2.jpg') }}); background-position: right bottom;background-size: cover; background-repeat: repeat; background-attachment: fixed;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <img class="wid-90" src="{{ asset('images/logo_pais_vertical.svg') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <h5 class="text-c-blue f-20">Bienvenido</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">

                    @if (Auth::user()->hasRole('Paciente') || Auth::user()->hasRole('Admin'))
                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('paciente.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/paciente.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Paciente</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->hasRole('Profesional') || Auth::user()->hasRole('Admin'))
                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('profesional.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/profesional.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Profesional</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('dental.index') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3" src="{{ asset('images/iconos/cm.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Dental</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('cirugia.index_cirugia_quirurgica') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3" src="{{ asset('images/iconos/cm.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Cirugia General</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Cirugia Obstetrica</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('cirugia.index_cirugia_obstetricia_cesarea') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Cirugia Obstetrica Cesarea</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('profesional.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Oftalmologia</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                    @endif

                    @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('asistente.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/asistente.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Asistente</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                    @endif

                    <div class="col-sm-4">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('adm_cm.home') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/centro_medico.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Centro Médico</h5>
                                </div>
                                <a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="#">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Laboratorio</h5>
                                </div>
                                <a>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Admin') || Auth::user()->hasRole('Admin'))
                        <div class="col-sm-4">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('administrador.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/administrador.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Administrador</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/jquery-validation/jquery.validate.js"></script>
</body>

</html>
