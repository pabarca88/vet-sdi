@if (isset($id_ficha_atencion) && !empty($id_ficha_atencion))
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
                            {{-- <li><a href="{{ route('profesional.home') }}">Mi Escritorio Profesional</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.home') }}','Mi Escritorio Profesional');">Mi Escritorio Profesional</a></li>
                            {{-- <li><a href="{{ route('profesional.pacientes') }}">Mis pacientes</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.pacientes') }}','Mis pacientes');">Mis pacientes</a></li>
                            {{-- <li><a href="{{ route('profesional.configuracion') }}"> Panel de Configuración</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.configuracion') }}',' Panel de Configuración');"> Panel de Configuración</a></li>
                            {{-- <li><a href="{{ route('profesional.index_receta_online') }}">Receta Online</a></li>      --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.index_receta_online') }}','Receta Online');">Receta Online</a></li>
                            {{-- <li><a href="{{ route('profesional.flujo_caja') }}">Flujo de Caja</a></li> --}}
                            <li><a onclick="menuValidarSalidaFicha('{{ route('profesional.flujo_caja') }}','Flujo de Caja');">Flujo de Caja</a></li>
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
                    <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.mi_perfil') }}">Tutoriales</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@else
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
                     <li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-video"></i></span><span class="pcoded-mtext text-center">Tutoriales</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="https://vimeo.com/1085553533" target="_blank">Funciones Agenda</a></li>
                            <li><a href="https://vimeo.com/1085535164" target="_blank">Receta online</a></li>
                            <li><a href="https://vimeo.com/1085574920" target="_blank">Funciones Ficha de atención</a></li>
                            <li><a href="https://vimeo.com/1085574269" target="_blank">Funciones Mis pacientes</a></li>
                            <li><a href="https://vimeo.com/1085548556" target="_blank">Descarga la App SDI</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif

<div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmLogoutModalLabel">Confirmar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="menu_url_destino" id="menu_url_destino" value="">
                <input type="hidden" name="menu_nombre_destino" id="menu_nombre_destino" value="">
                <p>Esta por salir de la Ficha de Atención, los datos serán eliminados.</p>
                <p>¿Esta seguro que desea continuar?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="feather icon-x"></i>Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="menuContinuar();"><i class="feather icon-check"></i>Continuar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function menuValidarSalidaFicha(url, nombre)
    {
        $('#confirmLogoutModal').modal('show');
        $('#menu_url_destino').val(url);
        $('#menu_nombre_destino').val(nombre);
    }

    function menuContinuar()
    {
        var temp = $('#menu_url_destino').val();
        $('#menu_url_destino').val('');
        $('#menu_nombre_destino').val('');
        window.location.href = temp;
    }
</script>
