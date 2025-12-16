<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
	<div class="m-header">
        <a class="mobile-menu" id="mobile-collapse"><span></span></a>
        <a href="#!" class="b-brand">
            <img src="{{ asset('/images/logo_pais.png') }}" alt="" class="logo" height="45px">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            @if(isset($mensajes))
                    @if(count($mensajes) > 0)
                        <li>
                            <div class="dropdown drp-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Mensajes" data-placement="button">
                                    <i class="feather icon-mail" style="font-size: 1.2rem!important;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head font-weight-bold f-16 py-2">
                                        Mensajes  <span class="badge badge-danger">{{ count($mensajes) }}</span>
                                    </div>
                                    <ul></ul>
                                    <ul class="pro-body">
                                        @foreach ($mensajes as $mensaje)
                                            @if (isset($mensaje->datos_mensaje))

                                                <li>
                                                    <a href="{{ route('profesional.mensaje', ['id' => $mensaje->id]) }}" class="dropdown-item">
                                                        <div class="media">
                                                            <img class="img-radius img-40" src="{{ asset('images/iconos/usuario_profesional.svg') }}" alt="Foto de perfil" style="width: 50px;">
                                                            <div class="media-body ml-3">
                                                                @if (array_key_exists('titulo', $mensaje->datos_mensaje))
                                                                    <h6 class="pro-title">{{ $mensaje->datos_mensaje['titulo'] }}</h6>
                                                                @else
                                                                    <h6 class="pro-title">Sin titulo</h6>
                                                                @endif
                                                                <p class="pro-date">{{ $mensaje->created_at->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>

                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif
                @endif
                @if (Auth::user())

                    @if (count(Auth::user()->roles()->get()) > 1)
                        <li>
                            <div class="dropdown drp-user">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Cambiar escritorio" data-placement="button" >
                                    <i class="feather icon-refresh-cw" style="font-size: 1.2rem!important;"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-notification">
                                    <div class="pro-head font-weight-bold f-16 py-2">
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
                                        @endif


                                        @if (Auth::user()->hasRole('Asistente') || Auth::user()->hasRole('Admin'))
                                            <li><a href="{{ ROUTE('asistente.home') }}" class="dropdown-item"><i
                                                        class="feather icon-user"></i>Escritorio
                                                    Asistente</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif

                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="feather icon-user" style="font-size: 1.2rem!important;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head font-weight-bold f-16 py-2">
                                    <span>{{  @Auth::user()->name }}</span>
                                </div>
                                {{--  <ul></ul>  --}}
                                <ul class="pro-body">
                                    <li>
                                        <form action="{{ ROUTE('logout') }}" method="post" id="closeSession">
                                            @csrf
                                            <a data-toggle="tooltip" title="Cerrar sesión" class="text-danger font-weight-bold" href="javascript:{}" onclick="document.getElementById('closeSession').submit();">
                                                <i class="feather icon-power"></i> Cerrar sesión
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>

                @endif
        </ul>
    </div>
</header>
