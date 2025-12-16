<header>
		<!--Menú 1-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="index.html">
			    <img src="assets/images/insi-logo.png" width="130" height="auto" alt="INSI">
			  </a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item mx-2 active">
						<a class="nav-link ancla" href="#esp-med" data-ancla="esp-med">Especialidades médicas</a>
					</li>
					<li class="nav-item mx-2">
						<a class="nav-link ancla" href="#exam-proc" data-ancla="exam-proc">Exámenes y procedimientos</a>
					</li><!--
					<li class="nav-item mx-2">
						<a class="nav-link ancla" href="#contacto" data-ancla="contacto">Contacto</a>
					</li>-->
					<li class="nav-item mx-2">
						<a class="btn btn-orange" href="#" role="button" data-toggle="modal" data-target="#modalAgendarHora"><i class="fa-solid fa-calendar-days"></i> AGENDAR HORA</a>
					</li>
				</ul>
			</div>
		</nav>

		<!--Slider-->
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="assets/images/banner-insi.png" class="d-block w-100" alt="banner insi">
				</div>
			</div>
		</div>
</header>
<!-- Modal -->
<div class="modal fade" id="modalAgendarHora" tabindex="-1" role="dialog" aria-labelledby="modalAgendarHoraLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<div class="modal-header bg-naranja text-white">
			<h5 class="modal-title" id="modalAgendarHoraLabel">Agendar Hora</h5>
			<button type="button" class="close text-white" data-dismiss="modal" aria-label="Cerrar">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
      	<div class="modal-body">
			<input type="hidden" name="modal_reserva_hora_id_profesional" id="modal_reserva_hora_id_profesional" value="">
			<input type="hidden" name="modal_reserva_hora_tipo_agenda" id="modal_reserva_hora_tipo_agenda" value="1">
			<div class="row border p-2">
				<div class="form-group col-md-12 mb-2 mt-0">
					<label for="rut_paciente" class="floating-label-activo-sm">Rut Paciente</label>
					<div class="d-flex">
						<input type="text" name="rut_paciente" id="rut_paciente"
							class="form-control form-control-sm flex-grow-1 me-2"
							oninput="formatoRut(this)" onblur="buscarPaciente(this)">
						<button type="button" class="btn btn-outline-success btn-sm" onclick="buscarPaciente()">B</button>
					</div>
				</div>
			</div>

			<div class="row mt-3" >
				<div class="col-12">
				<div id="paciente_saludo" class="alert alert-success d-none"></div> <!-- Saludo aquí -->
					<div class="card" id="info_paciente_detalle" style="display: none;">
						<div class="card-header bg-naranja text-white">
							Información del Paciente
						</div>
						<div class="card-body">
							
						
							<p><strong>Nombre:</strong> <span id="paciente_nombre"></span></p>
							<p><strong>Apellido Paterno:</strong> <span id="paciente_apellido_uno"></span></p>
							<p><strong>Apellido Materno:</strong> <span id="paciente_apellido_dos"></span></p>
							<p><strong>RUT:</strong> <span id="paciente_rut"></span></p>
							<p><strong>Correo:</strong> <span id="paciente_email"></span></p>
							<p><strong>Teléfono:</strong> <span id="paciente_telefono"></span></p>
							<p><strong>Fecha Nacimiento:</strong> <span id="paciente_nacimiento"></span></p>
							<p><strong>Ciudad:</strong> <span id="paciente_ciudad"></span></p>
							<p><strong>Dirección:</strong> <span id="paciente_direccion"></span></p>
							
							
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3" id="form_registro_paciente" style="display: none;">
				<div class="col-12">
					<div class="card border-success">
						<div class="card-header bg-success text-white">
							Registrar Nuevo Paciente
						</div>
						<div class="card-body">
							<div class="row g-3">
								<div class="col-md-6">
									<label for="nuevo_nombre" class="form-label">Nombres</label>
									<input type="text" class="form-control" id="nuevo_nombre" name="nuevo_nombre">
								</div>
								<div class="col-md-6">
									<label for="nuevo_apellido_uno" class="form-label">Apellido Paterno</label>
									<input type="text" class="form-control" id="nuevo_apellido_uno" name="nuevo_apellido_uno">
								</div>
								<div class="col-md-6">
									<label for="nuevo_apellido_dos" class="form-label">Apellido Materno</label>
									<input type="text" class="form-control" id="nuevo_apellido_dos" name="nuevo_apellido_dos">
								</div>
								<div class="col-md-6">
									<label for="nuevo_email" class="form-label">Correo Electrónico</label>
									<input type="email" class="form-control" id="nuevo_email" name="nuevo_email">
								</div>
								<div class="col-md-6">
									<label for="nuevo_telefono" class="form-label">Teléfono</label>
									<input type="text" class="form-control" id="nuevo_telefono" name="nuevo_telefono">
								</div>
								<div class="col-md-6">
									<label for="nuevo_fecha_nac" class="form-label">Fecha de Nacimiento</label>
									<input type="date" class="form-control" id="nuevo_fecha_nac" name="nuevo_fecha_nac">
								</div>
								<div class="col-md-12">
									<label for="nuevo_direccion" class="form-label">Dirección</label>
									<input type="text" class="form-control" id="nuevo_direccion" name="nuevo_direccion">
								</div>
								<div class="col-md-6">
									<label for="nuevo_ciudad" class="form-label">Ciudad</label>
									<input type="text" class="form-control" id="nuevo_ciudad" name="nuevo_ciudad">
								</div>
								<div class="col-md-6">
									<label for="nuevo_rut" class="form-label">RUT</label>
									<input type="text" class="form-control" id="nuevo_rut" name="nuevo_rut">
								</div>
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-success" onclick="registrarNuevoPaciente()">Registrar Paciente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

			<div class="row">
				<div class="col-md-4">
					
					<div class="form-row">
						<div class="form-group col-md-12 mb-2 mt-0">
							<label class="floating-label-active-sm mb-0">Profesión</label>
							<select class="form-control form-control-sm" id="modal_reserva_id_profesion" name="modal_reserva_id_profesion" onchange="buscar_tipo_especialidad(this);">
								<option value="">Seleccione</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-row">
						<div class="form-group col-md-12 mb-2 mt-0">
							<label class="floating-label-active-sm mb-0">Especialidad</label>
							<select class="form-control form-control-sm" id="modal_reserva_id_especialidad" name="modal_reserva_id_especialidad" onchange="buscar_subtipo_especialidad(this)" >
								<option value="">Seleccione</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-row">
						<div class="form-group col-md-12 mb-2 mt-0">
							<label class="floating-label-active-sm mb-0">Tipo especialidad</label>
							<select class="form-control form-control-sm" id="modal_reserva_id_tipo_especialidad" name="modal_reserva_id_tipo_especialidad" onchange="buscar_profesionales()" >
								<option value="">Seleccione</option>
							</select>
						</div>
					</div>
				</div>

				<!-- <div class="col-md-6">
					<div class="form-row">
						<div class="form-group col-md-12 mb-2 mt-0">
							<label class="floating-label-active-sm mb-0">Profesionales</label>
							<select class="form-control form-control-sm" id="modal_reserva_id_profesional" name="modal_reserva_id_profesional" onchange="carga_agenda_profesional();">
								<option value="">Seleccione</option>
							</select>
						</div>
					</div>
				</div> -->
				<div class="col-md-12">
					<div class="row" id="div_resultado_busqueda">
						
					</div>
				</div>

				<div class="col-md-12 d-none" id="div_resultado_busqueda_hora">
					<div class="form-row">
						<div class="form-group col-md-12 mb-2 mt-0">
							<label class="floating-label-active-sm mb-0">Seleccione una fecha</label>
							<!-- <input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  disabled="disabled"/>  -->
							<input class="form-control form-control-sm" type="date" name="modal_reserva_fecha" onchange="cargar_horas_disponibles_calendario_profesion(this.value);" id="modal_reserva_fecha" min=<?php $hoy=date('Y-m-d'); echo $hoy; ?> max=<?php $max=date("Y-m-d",strtotime($hoy."+ 60 days")); echo $max; ?>  />
						</div>
					</div>
				</div>
				<div class="col-md-12 mt-4 d-none" id="div_resultado_busqueda_hora_">
					<div class="row">
						<div class="col-md-12 text-center">
							<h6 class="text-petroleo" id="modal_reserva_fecha_seleccionada"></h6>
						</div>
						<div class="col-md-12 mx-auto" >
							<div class="row" id="modal_reserva_hora_lista_horas">
								 <!-- <div class="col-md-2 btn btn-outline-primary btn-sm btn-block">
									8:00
								</div>  -->
							</div>
						</div>
					</div>
				</div>
                <div class="col-md-6">
                    <label class="mt-4">El Profesional atiende los dias <span id="modal_reserva_dias_atencion" class="hljs-strong"></span></label>
                        <div class="form-row">
                        <div class="form-group col-md-12 mb-2 mt-0">
                        </div>
                    </div> 
                </div>
			</div>
			<hr>
			<div class="row d-none">
				<div class="col-md-12 text-center">
					{{--  <button type="button" class="btn btn-info"><i class="feather icon-check-circle"></i>
						Reservar hora</button>  --}}
					<label class="label">Seleccione  Lugar de Atención, Día en el calendario y haga click en la Hora Disponible.</label>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-primary">Guardar</button>
		</div>
    </div>
  </div>
</div>
