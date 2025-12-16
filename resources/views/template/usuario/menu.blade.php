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
							<a href="{{ ROUTE('paciente.perfil') }}" data-toggle="tooltip" title="Mi perfil">
								<i class="feather icon-user"></i>
							</a>
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
			<ul class="nav pcoded-inner-navbar ">
				<li class="nav-item pcoded-menu-caption text-center">
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-home"></i>
						</span>
						<span class="pcoded-mtext text-center">Mi Escritorio vet</span>
					</a>
					<ul class="pcoded-submenu">
						
						<li><a href="{{ ROUTE('paciente.agendar_hora') }}">Reservar Hora Vet</a></li>
						<li><a href="{{ ROUTE('paciente.mis_profesionales') }}">Mis Veterinarios</a></li>
						<li><a href="{{ ROUTE('check_sdi') }}?urla=Inicio&urln=Mi_Ficha_Medica">Ficha Vet Única</a></li>
						<li><a href="{{ ROUTE('paciente.receta') }}">Receta Online</a></li>
						<li><a href="{{ ROUTE('paciente.receta.examen') }}">Exámenes</a></li>
						<li><a href="{{ ROUTE('paciente.receta.examen') }}">Vacunas</a></li>
                        <li><a href="{{ ROUTE('paciente.dependientes.infante.definitiva', ['tipo_dependencia' => '1,2' ]) }}">Mis Mascotas</a></li>
						<li><a href="{{ ROUTE('paciente.mis_controles') }}">Controles de Parámetros</a></li>
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link">
						<span class="pcoded-micon">
							<i class="feather icon-settings"></i>
						</span>
						<span class="pcoded-mtext text-center">Configuraciones</span></a>
					<ul class="pcoded-submenu">
						<li><a href="{{ ROUTE('paciente.perfil') }}">Editar Perfil</a></li>
						{{--  <li><a href="{{ ROUTE('paciente.rompeclave') }}">Rompeclave</a></li>  --}}
						<li><a href="{{ ROUTE('paciente.subcripcion') }}">Pagos y Suscripción</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
