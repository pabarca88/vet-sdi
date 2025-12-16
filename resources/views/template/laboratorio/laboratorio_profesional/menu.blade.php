<nav class="pcoded-navbar menu-light">
	<div class="navbar-wrapper">
		<div class="navbar-content scroll-div">
			<div class="">
				<div class="main-menu-header">
					@if(isset($profesional) && !isset($institucion))
					 <img class="img-radius img-fluid wid-100" id="profile-image"
                                                        src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                                                        alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">{{ $profesional->nombre }} {{ $profesional->apellido_uno }}<i class="fa fa-caret-down"></i></div>
					</div>
					@elseif(isset($institucion) && !isset($profesional))
					<img class="img-radius img-fluid wid-100" id="profile-image"
														src="{{ $institucion->foto_perfil ? asset('storage/' . $institucion->foto_perfil) : asset('images/iconos/institucion_logo.svg') }}"
														alt="Imagen Institución">
					<div class="user-details">
						<div id="more-details">{{ $institucion->nombre }}<i class="fa fa-caret-down"></i></div>
					</div>
					@elseif(isset($profesional))
					<img class="img-radius img-fluid wid-100" id="profile-image"
														src="{{ $profesional->foto_perfil ? asset('storage/' . $profesional->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
														alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">{{ $profesional->nombre }} {{ $profesional->apellido_uno }}<i class="fa fa-caret-down"></i></div>
					</div>
					@elseif(isset($profesional) && isset($institucion))
					<img class="img-radius img-fluid wid-100" id="profile-image"
														 src="{{ $institucion->foto_perfil ? asset('storage/' . $institucion->foto_perfil) : asset('images/iconos/usuario_profesional.svg') }}"
                                                        alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">{{ $institucion->nombre }}<i class="fa fa-caret-down"></i></div>
					</div>
					
					@else
					<img class="img-radius img-fluid wid-100" id="profile-image"
														src="{{ asset('images/iconos/usuario_profesional.svg') }}"
														alt="Imagen Usuario">
					<div class="user-details">
						<div id="more-details">Usuario<i class="fa fa-caret-down"></i></div>
					</div>
					@endif
				</div>
				<div id="nav-user-link">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="perfil_cm.php" data-toggle="tooltip" title="Mi perfil">
								<i class="feather icon-user"></i>
							</a>
						</li>
						<li class="list-inline-item"><a href="cerrar.php" data-toggle="tooltip" title="Cerrar sesión" class="text-danger"><i class="feather icon-power"></i></a></li>
					</ul>
				</div>
			</div>
			<ul class="nav pcoded-inner-navbar ">
				{{-- <li class="nav-item pcoded-menu-caption text-center">
				</li> --}}
				<li class="nav-item pcoded-hasmenu">
					<a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext text-center">Mi Escritorio</span></a>
					<ul class="pcoded-submenu">
						@if(isset($profesional) && !isset($institucion))
						<li>
							<a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}">Mi Escritorio</a>
						</li>
						@elseif(isset($institucion) && !isset($profesional) && $institucion->id_tipo_institucion == 3)
						<li>
							<a href="{{ route('laboratorio.adm_general.home') }}">Mi Escritorio</a>
						</li>
						@elseif(isset($profesional) && isset($institucion))
						<li>
							<a href="{{ route('laboratorio.lab_profesional.escritorio_profesional_laboratorio') }}">Mi Escritorio</a>
						</li>
						@endif
						<li>
							<a href="{{ route('laboratorio.configuracion') }}">Configuración</a>
						</li>
						{{-- <li>
							<a href="sucursales_cm.php">Sucursales Centro Médico</a>
						</li>
						<li>
							<a href="laboratorio_cm.php">Laboratorio Centro Médico</a>
						</li>
						<li>
							<a href="profesionales_cm.php">Personal</a>
						</li>
						<li>
							<a href="asistentes_cm.php">Asistentes</a>
						</li>
						<li>
							<a href="suscripcion_finanzas.php">Finanzas</a>
						</li>
						<li>
							<a href="asistentes_inventarios.php">Inventarios</a>
						</li>
						<li>
							<a href="suscripcion_estadisticas_cm.php">Estadísticas</a>
						</li>
						<li>
							<a href="suscripcion_soporte.php">Soporte</a>
						</li>
						<li>
							<a href="perfil_cm.php">Perfil Centro Médico</a>
						</li>
						<li>
							<a href="perfil_admin.php">Mi Perfil</a>
						</li>
						<li>
							<a href="suscripcion_pago_cm.php">Suscripciones y pagos</a>
						</li> --}}
					</ul>
				</li>
				<li class="nav-item pcoded-hasmenu">
                        <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i  class="feather icon-settings"></i></span><span class="pcoded-mtext text-center">Configuraciones</span></a>
                        <ul class="pcoded-submenu">
                            <li><a href="{{ route('profesional.mi_perfil') }}">Editar Perfil</a></li>
                            <!--<li><a href="suscripcion.php">Pagos y Suscripción</a></li>-->
                        </ul>
                    </li>
				@if(isset($paciente))
				<!-- Información del paciente -->
				 <div id="info_cliente" class="mt-5 p-3" style="color:#1c9693; border: 1px solid  #5ebdba; margin: 12px;padding: 6px; margin-top: 125px; border-radius:15px; background-color:#d2f0f7; width: 200px;">
                        <h6 class="mb-2" style="font-size: 12px; font-weight: bold; color:#137370;"><i class="fas fa-user mr-2 f-14"></i>INFO. DEL PACIENTE</h6>
                        <p style="color:#137370;" class="text-uppercase">{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}</p>
                        <p style="color:#137370;">{{ $paciente->edad }} Años</p>
                        <p style="color:#137370;">{{ $paciente->rut }}</p>
                        <p style="color:#137370;">{{ $paciente->prevision->nombre }}</p>
						<p style="color:#137370;">{{ $paciente->telefono_uno }}</p>
						<p style="color:#137370;">{{ $paciente->email }}</p>
                        {{-- @if(isset($control_peso) && count($control_peso) > 0)
                        <p style="color:#137370;">Obesidad</p>
                        @endif
                        @if (isset($hipertension) && count($hipertension) > 0)
                        <p style="color:#137370;">Hipertensión</p>
                        @endif
                        @if (isset($diabetes) && count($diabetes) > 0)
                        <p style="color:#137370;">Diabetes</p>
                        @endif
                        @if (isset($contro) && count($contro) > 0)
                        <p style="color:#137370;">Insuficiencia renal</p>
                        @endif --}}
                        <hr>
                        @if(isset($antecedentes) && count($antecedentes) > 0)
                        <h6 class="mt-3 mb-2" style="font-size: 12px; font-weight: bold; color:#137370;"><i class="fas fa-heart-broken mr-2 f-14"></i>PATOLOGÍAS CRÓNICAS</h6>

                        <ul id="listado_patologias_paciente">
                            @foreach ($antecedentes as $a)
                                <li>{{ $a->antecedente_data->nombre }}</li>
							
                       
                            @endforeach
                        </ul>
						@else
							<p style="color:#137370;">Sin registros</p><!--DEJAR STA FRASE EN TODOS LOS CAMPOS QUE NO TENGAN INFORMACIÓN REGISTRADA-->
                        @endif
                        <hr>
						<div class="form-row">
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Fecha de examen</label>
								<input type="date" class="form-control form-control-sm" name="fecha_ex" id="fecha_ex" value="{{ date('Y-m-d') }}" readonly>
							</div>
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Examinador</label>
								<input type="text" class="form-control form-control-sm" name="profesional" id="profesional" value="Dr. {{ $profesional->apellido_uno }}" readonly>
							</div>
						</div>
						
                        <h6 class="mb-2" style="font-size: 12px; font-weight: bold; color:#137370;"><i class="fas fa-notes-medical mr-2 f-14"></i>DERIVADO POR</h6>
                        <form>
                        	<h6 class="f-12 mb-1"  style="color:#137370;">Rut del profesional</h6>
                        	<div class="form-group">
								<input type="hidden" name="solicitado_id_profesional" id="solicitado_id_profesional" value="">
							    <input type="text" class="form-control form-control-sm" name="derivado_por_rut" id="derivado_por_rut" value=""
												onblur="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
												onkeyup="cargar_profesional(this,'derivado_por', 'solicitado_id_profesional', 'div_profesional_no_inscrito');"
												oninput="formatoRut(this);"
											>
							 </div>
							 
							<h6 class="f-12 mb-1"  style="color:#137370;">Nombre del profesional</h6>
							<input type="text" class="form-control form-control-sm" style="color:#137370;" name="derivado_por" id="derivado_por" value="" readonly>
							<input type="hidden" name="solicitado_nombre_oct_par" id="solicitado_nombre_oct_par" value="">
							<input type="hidden" name="solicitado_apellido_oct_par" id="solicitado_apellido_oct_par" value="">
							<input type="hidden" name="solicitado_telefono_oct_par" id="solicitado_telefono_oct_par" value="">
							<input type="hidden" name="solicitado_email_oct_par" id="solicitado_email_oct_par" value="">
                        </form>
						<div class="row mt-3" id="div_profesional_no_inscrito" style="display: none;">
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Nombre</label>
								<input type="text" class="form-control form-control-sm"  name="solicitado_nombre" id="solicitado_nombre" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
							</div>
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Apellido</label>
								<input type="text" class="form-control form-control-sm"  name="solicitado_apellido" id="solicitado_apellido" onchange="actualizar_solicitado_por('derivado_por', 'solicitado_nombre', 'solicitado_apellido');">
							</div>
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Telefono</label>
								<input type="text" class="form-control form-control-sm"  name="solicitado_telefono" id="solicitado_telefono" >
							</div>
							<div class="form-group col-12">
								<label class="floating-label-activo-sm">Email</label>
								<input type="text" class="form-control form-control-sm"  name="solicitado_email" id="solicitado_email" >
							</div>
						</div>
						<div class="form-row mt-3">
							<div class="form-group col-12">
								<h6 class="f-12 mb-1"  style="color:#137370;">¿Como se informó el paciente del centro médico?</h6>
								<select class="form-control form-control-sm" name="informacion_centro_medico" id="informacion_centro_medico" onchange="seleccionar_procedencia()">
									<option value="">Seleccione una opción</option>
									<option value="recomendacion">Recomendación de otro paciente</option>
									<option value="redes_sociales">Redes sociales</option>
									<option value="busqueda_web">Búsqueda en internet</option>
									<option value="publicidad">Publicidad</option>
									<option value="profesional_salud">Derivado por profesional de salud</option>
									<option value="otro">Otro</option>
								</select>
							</div>
						</div>
					</div>
					@endif
			</ul>
		</div>
	</div>
</nav>

<script>
	function seleccionar_procedencia(){
		var procedencia = document.getElementById("informacion_centro_medico").value;
		document.getElementById("id_procedencia_paciente").value = procedencia;
	}
</script>
	

