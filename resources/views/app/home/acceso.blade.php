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

<body style="background-image: url({{ asset('images/background_2.jpg') }}); background-position: right bottom;background-size: cover; background-repeat: repeat; background-attachment: fixed;">

    {{--  header  --}}
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user "></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <span>{{  @Auth::user()->name }}</span>
                            </div>
                            {{--  <ul></ul>  --}}
                            <ul class="pro-body">
                                <li>
                                    <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                        @csrf
                                        <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger" href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                            <i class="feather icon-power"></i> Cerrar sesión
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    {{--  cierre header  --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-center mb-5">
                        <img class="wid-100" src="{{ asset('images/logo_pais_vertical.png') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mb-3">
                        <h4 class="text-c-blue">Bienvenido/a</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
			{{-- {{ Auth::user()->Roles()->get()}} --}}
                <div class="row">

                    @if (Auth::user()->hasRole('Paciente') )
                        <div class="col-sm-3">
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

                    @if (Auth::user()->hasRole('Profesional') )
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('profesional.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/profesional.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Profesional</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>{{--
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('dental.index') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3" src="{{ asset('images/iconos/cm.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Dental</h5>
                                    </div>
								<a>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('cirugia.index_cirugia_quirurgica') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3" src="{{ asset('images/iconos/cm.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Hospitalización123</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>--}}

                        <div class="col-sm-3">
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

                        <div class="col-sm-3">
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
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="https://urgencias.med-sdi.cl">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Urgencias</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
						{{--
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('profesional.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Oftalmologia</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>--}}
                    @endif

                    @if (Auth::user()->hasRole('AsistenteCaja') )
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('asistentecm.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/asistente.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Asistente centro medico</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
						<div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('asistente_adm.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/asistente.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Asistente Administrativa medico</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>

                    @endif

                    @if (Auth::user()->hasRole('Asistente'))
                        <div class="col-sm-3">
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

                    @if (Auth::user()->hasRole('Institucion') || Auth::user()->hasRole('Adm_Institucion'))
                        <div class="col-sm-3">
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
                    @endif
					{{--
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">

                            <a href="{{ ROUTE('laboratorio.adm_general.home') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Laboratorio Adm General</h5>
                                </div>
							<a>
                        </div>
                    </div>--}}
					<div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('laboratorio.adm_general.home') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Laboratorio Adm sucursal</h5>
                                </div>
							<a>
                        </div>
                    </div>
					<div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Laboratorio profesional</h5>
                                </div>
							<a>
                        </div>
                    </div>
					<div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('lab.exa.asistente.home') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Laboratorio Asistente</h5>
                                </div>
							<a>
                        </div>
                    </div>
					{{--
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="#">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Farmacia(programa)</h5>
                                </div>
							<a>
                        </div>
                    </div>--}}
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                             <a href="{{ ROUTE('app.enfermeria.enfermera_administrativa') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Enfermeria Administrativa</h5>
                                </div>
							<a>
                        </div>
                    </div>
					 <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('app.enfermeria.enfermera_tratante') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Enfermeria Tratante</h5>
                                </div>
							<a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('app.enfermeria.enfermera_tens') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Tens</h5>
                                </div>
							<a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="{{ ROUTE('app.profesional.control_acceso') }}">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Control de acceso</h5>
                                </div>
							<a>
                        </div>
                    </div>
                    {{--<div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="adm_cm.area_bodega">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Bodega(programa)</h5>
                                </div>
                                <a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                            <a href="#">
                                <div class="card-body pb-0 pt-0">
                                    <img class="wid-40 mt-3"
                                        src="{{ asset('images/iconos_ingreso/laboratorio.svg') }}" alt="">
                                    <h5 class="card-title text-white mt-2">Contabilidad</h5>
                                </div>
                                <a>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('Admin') )
                        <div class="col-sm-3">
                            <div class="card text-center my-3 subir card-color" style="cursor: pointer;">
                                <a href="{{ ROUTE('administracion.home') }}">
                                    <div class="card-body pb-0 pt-0">
                                        <img class="wid-40 mt-3"
                                            src="{{ asset('images/iconos_ingreso/administrador.svg') }}" alt="">
                                        <h5 class="card-title text-white mt-2">Administrador</h5>
                                    </div>
                                    <a>
                            </div>
                        </div>
                    @endif--}}

                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
</body>

</html>
