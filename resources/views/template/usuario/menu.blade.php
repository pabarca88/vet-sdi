<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				@php($pacienteMenu = \App\Models\Paciente::where('id_usuario', Auth::id())->first())
				@php($fotoPacienteMenu = !empty($pacienteMenu) && !empty($pacienteMenu->foto_perfil)
					? (\Illuminate\Support\Str::startsWith($pacienteMenu->foto_perfil, ['http://', 'https://', '/']) ? $pacienteMenu->foto_perfil : asset('storage/' . $pacienteMenu->foto_perfil))
					: asset('images/iconos/usuario.svg'))
				<div class="main-menu-header">
					<img class="img-radius" id="patient-menu-image" src="{{ $fotoPacienteMenu }}" alt="Imagen" style="width: 40px; height: 40px; object-fit: cover;">
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
						<li><a href="{{ ROUTE('paciente.agendar_hora') }}">Reservar Hora</a></li>
                        <li><a href="{{ ROUTE('paciente.dependientes.infante.definitiva', ['tipo_dependencia' => '1' ]) }}">Mis Mascotas</a></li>
                        <li><a href="{{ ROUTE('paciente.mascotas.inscripcion_alimentos') }}">Registro de alimentos</a></li>
                        <li><a href="{{ ROUTE('paciente.mascotas.inscripcion_medicamentos') }}">Registro de medicamentos</a></li>
                        <li><a href="{{ ROUTE('paciente.convenios') }}">Mis convenios</a></li>
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
						<li><a href="{{ ROUTE('paciente.mascotas.pagos_suscripcion') }}">Suscripciones y facturacion</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
