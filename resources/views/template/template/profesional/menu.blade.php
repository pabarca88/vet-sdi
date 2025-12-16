<nav class="pcoded-navbar menu-light navbar-collapsed">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('images/iconos/usuario_profesional.svg') }}"
                        alt="Profesional">
                    <div class="user-details">
                        <div id="more-details">{{ @Auth::user()->name }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ route('profesional.mi_perfil') }}" data-toggle="tooltip" title="Mi perfil">
                                <i class="feather icon-user"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                @csrf
                                <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger"
                                    href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                    <i class="feather icon-power"></i>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption text-center">
                    <!--<label>Menú</label>-->
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi
                            Escritorio</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('profesional.home') }}">Mi Escritorio Profesional</a></li>
                        <li><a href="{{ route('profesional.pacientes') }}">Mis pacientes</a></li>
                        <li><a href="{{ route('profesional.configuracion') }}"> Panel de Configuración</a></li>
                        <li><a href="{{ route('profesional.index_receta_online') }}">Receta Online</a></li>     
                        <li><a href="{{ route('profesional.flujo_caja') }}">Flujo de Caja</a></li>
                        <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>     
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('profesional.mi_perfil') }}">Editar Perfil</a></li>
                         <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
