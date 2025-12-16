<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
                <div class="main-menu-header">
					<img class="img-radius" src="{{ asset('images/iconos/usuario.svg') }}" alt="Imagen">
					<div class="user-details">
						<div id="more-details">{{ @Auth::user()->name }}<i class="fa fa-caret-down"></i></div>
					</div>
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							{{-- <a href="{{ ROUTE('paciente.dependiente.perfil') }}" data-toggle="tooltip" title="Mi perfil"> --}}
								<i class="feather icon-user"></i>
							{{-- </a> --}}
						</li>
						<li class="list-inline-item">
							<form id="close" action="{{ ROUTE('logout') }}" method="POST">
								@csrf
								<a  href="javascript:{}" onclick="document.getElementById('close').submit();" data-toggle="tooltip" title="Cerrar sesión" class="text-danger" >
									<i class="feather icon-power"></i>
								</a>
							</form>
						</li>
					</ul>
				</div>
			</div>

            <div class="text-center highcharts-strong">Dependiente: {{ $paciente->nombres . ' ' . $paciente->apellido_uno }} </div>

			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
                <li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext text-center">Escritorio Principal</span>
					</a>
					<ul class="pcoded-submenu">
						<li><a href="{{ ROUTE('paciente.home') }}">Escritorio Usuario</a></li>

					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext text-center">Mi Escritorio</span>
					</a>
					<ul class="pcoded-submenu">
						<li><a href="{{ ROUTE('paciente.dependiente.home', [$paciente->id]) }}">Mi Escritorio Paciente</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.agendar_hora', [$paciente->id,'0','0','0']) }}">Reservar Hora Médica</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.mis_profesionales', [$paciente->id]) }}">Mis Veterinarios</a></li>
						<!--<li><a href="{{ ROUTE('paciente.dependiente.mi_ficha', [$paciente->id]) }}">Mi Ficha Médica Única</a></li>-->
						<li><a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">Ficha Veterinaria Única</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.receta', [$paciente->id]) }}">Documentos</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.receta.examen', [$paciente->id]) }}">Exámenes</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.receta.examen', [$paciente->id]) }}">Controles</a></li>
						<li><a href="#">Registro Vacunas</a></li>
						<li><a href="#">Registro Desparasitación</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-settings"></i>
						</span>
						<span class="pcoded-mtext text-center">Configuraciones</span></a>
					<ul class="pcoded-submenu">
						{{-- <li><a href="{{ ROUTE('paciente.dependiente.perfil') }}">Editar Perfil</a></li> --}}
						<li><a href="{{ ROUTE('paciente.dependiente.rompeclave', [$paciente->id]) }}">Rompeclave</a></li>
						<li><a href="{{ ROUTE('paciente.dependiente.subcripcion', [$paciente->id]) }}">Pagos y Suscripción</a></li>
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
