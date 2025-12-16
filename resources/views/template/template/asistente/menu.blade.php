<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('images/iconos/usuario_asistente.svg') }}" alt="Profesional">
                    <div class="user-details">
                        <div id="more-details">{{ @Auth::user()->name }}
							<i class="fa fa-caret-down"></i>
						</div>
                    </div>
                </div>
                <div id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ ROUTE('asistente.perfil') }}" data-toggle="tooltip" title="Mi perfil">
                                <i class="feather icon-user"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form id="close" action="{{ ROUTE('logout') }}" method="POST">
                                @csrf
                                <a href="javascript:{}" onclick="document.getElementById('close').submit();"
                                    data-toggle="tooltip" title="Cerrar sesión" class="text-danger">
                                    <i class="feather icon-power"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext text-center">Mi Escritorio</span></a>
                    <ul class="pcoded-submenu">
                        <li>
							<a href="{{ ROUTE('asistente.home') }}">Mi Escritorio</a>
						</li>
                        <li>
							<a href="{{ ROUTE('asistente.buscar_paciente') }}">Buscar pacientes</a>
                        </li>
						{{--<li>
							<a href="{{ ROUTE('asistente.reservar_hora') }}">Reservar Hora Médica</a>
                        </li>--}}
                        <li>
							<a href="{{ ROUTE('asistente.agenda_por_profesional') }}">Agendas Profesionales</a>
						</li>
                        <li>
							<a href="{{ ROUTE('asistente.flujo_caja') }}">Rendir Caja</a>
						</li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link">
                        <span class="pcoded-micon">
							<i class="feather feather icon-menu"></i>
						</span>
						<span class="pcoded-mtext text-center">Otras opciones</span>
					</a>
                    <ul class="pcoded-submenu">
                        <li>
							<a href="{{ ROUTE('asistente.perfil') }}">Editar Perfil</a>
						</li>
                         {{--  SUSCRIPCION Y PAGO
                        <li>
							<a href="{{ ROUTE('asistente.subcripcion') }}">Suscripción y Pagos</a>
						</li>--}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
