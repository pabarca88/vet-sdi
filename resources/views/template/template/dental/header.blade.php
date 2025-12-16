<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse"><span></span></a>
        <a href="#" class="b-brand">
            <img src="{{ asset('images/logo_pais.png') }}" alt="" class="logo" height="40px">
        </a>
        <a href="#" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cambiar escritorio"
                        data-placement="button">
                        <i class="feather icon-refresh-cw fa-2x"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Cambiar escritorio</span>
                        </div>
                        <ul></ul>
                        <ul class="pro-body">
                            @if (Auth::user()->hasRole('Paciente') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('paciente.home') }}" class="dropdown-item">
                                        <i class="feather icon-user"></i>
                                        Escritorio paciente
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasRole('Profesional') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('profesional.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio profesional
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ ROUTE('dental.index') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio Dental
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('asistente.home') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Escritorio Asistente
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasRole('Admin'))
                                <li>
                                    <a href="{{ ROUTE('acceso') }}" class="dropdown-item"><i
                                            class="feather icon-user"></i>
                                        Accesos Escritorios
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user fa-2x"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <span>Nombre y Apellido</span>
                        </div>
                        <ul></ul>
                        <ul class="pro-body">
                            <li><a href="{{ route('profesional.mi_perfil') }}" class="dropdown-item"><i
                                        class="feather icon-user"></i> Mi
                                    perfil</a></li>
                            <li style="display:none"><a href="#" class="dropdown-item"><i class="far fa-envelope"></i>
                                    Mis
                                    Mensajes</a></li>
                            <li><a href="" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="feather icon-lock"></i>
                                    Cerrar
                                    sesión</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
