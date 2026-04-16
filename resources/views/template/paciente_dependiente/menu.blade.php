<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
				@php
					$perfilMascota = $mascota ?? $paciente ?? null;
					$idDependienteActivo = $perfilMascota->id ?? $id_dependiente_activo ?? null;
					$nombreMascota = trim(($perfilMascota->nombre ?? $perfilMascota->nombres ?? '') . ' ' . ($perfilMascota->apellido_uno ?? ''));
					$nombreMascota = $nombreMascota !== '' ? $nombreMascota : (@Auth::user()->name ?? 'Mascota');

				$nombreResponsable = @Auth::user()->name ?? 'Sin responsable';
				if (!empty($responsable)) {
					$nombreResponsable = trim(($responsable->nombres ?? '') . ' ' . ($responsable->apellido_uno ?? '') . ' ' . ($responsable->apellido_dos ?? ''));
				}

				$fotoMascota = asset('images/iconos/usuario.svg');
				if (!empty($perfilMascota) && !empty($perfilMascota->foto_perfil)) {
					$fotoMascota = \Illuminate\Support\Str::startsWith($perfilMascota->foto_perfil, ['http://', 'https://', '/'])
						? $perfilMascota->foto_perfil
						: asset('storage/' . $perfilMascota->foto_perfil);
				} elseif (!empty($perfilMascota) && !empty($perfilMascota->sexo)) {
					$fotoMascota = $perfilMascota->sexo === 'M' ? asset('images/iconos/paciente-m.svg') : asset('images/iconos/paciente-f.svg');
				}
			@endphp
			<div class="">
                <div class="main-menu-header">
					<img class="img-radius" src="{{ $fotoMascota }}" alt="Mascota">
					<div class="user-details">
						<div id="more-details">{{ $nombreMascota }}<i class="fa fa-caret-down"></i></div>
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

            <div class="text-center highcharts-strong">Dueño: {{ $nombreResponsable }}</div>

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
						@if ($idDependienteActivo)
							<li><a href="{{ ROUTE('paciente.dependiente.home', [$idDependienteActivo]) }}">Mi Escritorio Paciente</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.agendar_hora', [$idDependienteActivo,'0','0','0']) }}">Reservar Hora Médica</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.mis_profesionales', [$idDependienteActivo]) }}">Mis Veterinarios</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.mi_ficha', [$idDependienteActivo]) }}">Ficha Veterinaria Única</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.receta', [$idDependienteActivo]) }}">Documentos</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.receta.examen', [$idDependienteActivo]) }}">Exámenes</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.receta.examen', [$idDependienteActivo]) }}">Controles</a></li>
							<li><a href="{{ ROUTE('registro_vacunas', ['id_dependiente_activo'=> $idDependienteActivo]) }}">Registro Vacunas</a></li>
							<li><a href="{{ ROUTE('registro_desparasitacion', ['id_dependiente_activo'=> $idDependienteActivo]) }}">Registro Desparasitación</a></li>
						@endif
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
						@if ($idDependienteActivo)
							<li><a href="{{ ROUTE('paciente.dependiente.rompeclave', [$idDependienteActivo]) }}">Rompeclave</a></li>
							<li><a href="{{ ROUTE('paciente.dependiente.subcripcion', [$idDependienteActivo]) }}">Pagos y Suscripción</a></li>
						@endif
					</ul>
				</li>

			</ul>
		</div>
	</div>
</nav>
