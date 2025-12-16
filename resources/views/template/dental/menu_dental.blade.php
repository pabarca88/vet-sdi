<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div">
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('images/iconos/usuario_profesional.svg') }}"
                        alt="Profesional">
                    <div class="user-details">
                        <div id="more-details">Jaime Kriman Astorga <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="perfil.php" data-toggle="tooltip" title="Mi perfil">
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
                        <li><a href="#">Escritorio dental Medichile</a></li>
                        <li><a href="{{ route('profesional.mi_perfil') }}">Mi Perfil</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-activity"></i></span><span
                            class="pcoded-mtext text-center">Especialidades</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="FC_ODONTOPEDIATRIA.php">Odontopediatria</a></li>
                        <li><a href="{{ route('dental.index_endodoncia') }}">Endodoncia</a></li>
                        <li><a href="{{ route('dental.index_dental_infantil') }}">Infantil</a></li>
                        <li><a href="{{ route('dental.index') }}">Adulto</a></li>
                        <li><a href="{{ route('dental.index_cirugia_dental') }}">Cirugia Dental</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-activity"></i></span><span
                            class="pcoded-mtext text-center">Pabellon</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="FC_ODONTOPEDIATRIA.php">Solicitar Pabellon</a></li>
                        <li><a href="{{ route('dental.index_endodoncia') }}">Ingreso Paciente</a></li>
                        <li><a href="{{ route('dental.index_dental_infantil') }}">Paciente Hospitalizado</a></li>

                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-menu"></i></span><span class="pcoded-mtext text-center">Otras
                            Opciones</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ ROUTE('profesional.lugares_atencion') }}">Configuración de <br>Mis Lugares de
                                Atención</a></li>
                        <li><a href="suscripcionmedichile.php">Renovar Suscripción</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
