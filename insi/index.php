<!DOCTYPE html>
<html lang="es">
<head>
	<?php
		require_once('include/head.php');
	?>	
</head>
<body>
	<?php
		//require_once('include/conexion.php');
	?>	
	<?php
		require_once('include/header.php');
	?>


<div class="container">
		<div class="row mt-4">
			<div class="col-md-4 text-center my-1">
				<a href="#" data-toggle="modal" data-target="#modalAgendarHora" class="text-white" style="text-decoration: none;">
					<div class="card bg-naranja border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-solid fa-calendar-days fa-2x mb-2"></i>
							<h5 class="card-title">Agendar Hora</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 text-center my-1">
				<a href="#esp-med" data-ancla="esp-med" class="text-white data-ancla" style="text-decoration: none;">
					<div class="card bg-azul border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-solid fa-stethoscope fa-2x mb-2"></i>
							<h5 class="card-title">Especialidades médicas</h5>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4 text-center my-1">
				<a href="#exam-proc" data-ancla="exam-proc" class="text-white" style="text-decoration: none;">
					<div class="card bg-azul border-0 shadow" style="width: auto;">
						<div class="card-body">
							<i class="fa-sharp fa-solid fa-syringe fa-2x mb-2"></i>
							<h5 class="card-title">Exámenes y procedimientos</h5>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
	
	<!--Especialidades Médicas-->
	<div id="esp-med">
		<div data-aos="fade-up"
			data-aos-easing="linear"
			data-aos-duration="1100">
			<div class="container mt-5 mb-5">
				<div class="row">
					<div class="col-md-12 mt-5 mb-4">
						<h2 class="text-petroleo">Nuestras especialidades médicas</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 text-center">
						<img class="img-fluid" src="assets/images/especialidades-medicas.png">
					</div>
					<div class="col-md-3 text-left mt-4 font-weight-bold text-petroleo">
						<ul>
							<li class="mb-2">Medicina general</li>
							<li class="mb-2">Broncopulmonar</li>
							<li class="mb-2">Cardiología</li>
							<li class="mb-2">Cirugía digestiva</li>
							<li class="mb-2">Gastroenterología</li>
							<li class="mb-2">Ginecología</li>
							<li class="mb-2">Dermatología</li>
							<li class="mb-2">Medicina Homeópata</li>
							<li class="mb-2">Neurología</li>
						</ul>
					</div>
					<div class="col-md-3 text-left mt-4 font-weight-bold text-petroleo">
						<ul>
							<li class="mb-2 especialidad">Oftalmoglogía</li>
							<li class="mb-2 especialidad">Otorrinolaringología</li>
							<li class="mb-2 especialidad">Pediatría</li>
							<li class="mb-2 especialidad">Psicología</li>
							<li class="mb-2 especialidad">Nutricionista</li>
							<li class="mb-2 especialidad">Psiquiatría</li>
							<li class="mb-2">Traumatología</li>
							<li class="mb-2">Urología</li>
							<li class="mb-2">Kinesiología</li>
							<li class="mb-2">Fonoaudiología</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Exámenes y procedimientos-->
	<div id="exam-proc">
		<div data-aos="fade-up"
			data-aos-easing="linear"
			data-aos-duration="1100">
			<div class="container mt-10 mb-8">
				<div class="row">
					<div class="col-md-12 text-petroleo text-center mb-3">
						<h2>Exámenes y procedimientos</h2>
					</div>
				</div>
				<div class="row row-cols-1 row-cols-md-2">
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/ecotomografias.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Imagenología</h5>
										<button type="button" class="btn btn-sm btn-orange" data-toggle="modal" data-target="#m_imagenologia">
										+ Información
										</button>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/endoscopicos.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Procedimientos endoscópicos</h6>
										<button type="button" class="btn btn-sm btn-orange" data-toggle="modal" data-target="#m_endo">
										+ Información
										</button>
									</div>
								</div>
							</div>
							<div class="col mb-4">
								<div class="card shadow border-0 h-100">
									<img src="assets/images/enfermeria.png" class="card-img-top img-fluid" alt="...">
									<div class="card-body text-center">
										<h5 class="card-title text-petroleo">Procedimientos de enfermería</h5>
										<button type="button" class="btn btn-sm btn-orange" data-toggle="modal" data-target="#m_enfermeria">
										+ Información
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Alianzas-->
	<div data-aos="fade-up"
	    data-aos-easing="linear"
	    data-aos-duration="1100">
	    <div class="container mt-10 mb-8 px-4">
	    	<div class="row">
				<div class="col-md-12 text-petroleo text-center mb-3">
					<h3>Alianzas</h3>
				</div>
			</div>
			<div class="row col-md-12 d-flex align-items-center">
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="http://www.cronicos.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/cronicos.svg" width="300" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="http://www.medichile.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/medichile.svg" width="220" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="http://www.farmacronicos.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/farmacronicos.svg" width="350" height="auto" alt="">
					</a>
				</div>
				<div class="col-md-3 mb-2 text-center align-middle">
					<a href="https://www.med-sdi.cl/"target="black">
						<img class="img-fluid" src="assets/images/sdi/logo.svg" width="200" height="auto" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>

	<!--Contacto-->
	<div id="contacto" class="container-fluid bg-azul-corp pt-4">
	<div class="row mx-2">

<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4  py-4 px-4 bg-contacto border-xl mt-3">
	<div data-aos="fade-right"
		data-aos-duration="1000">
	<h3 class="text-white font-weight-bold  mb-3 ">Contacto</h3>

	<h6 class="mt-3 text-white font-weight-bold">Horario de atención</h6>
	<p class="text-white">Lunes a Viernes 08:00 a 19:00 hrs /
	Sábados 08:00 a 13:00 hrs</p>
	<h6 class="mt-3 text-white font-weight-bold">Teléfono:</h6>
	<p class="text-white">(32) 2188930 - (32) 2188940</p>
	<img class="img-fluid mb-2" src="assets/images/sdi/sellos.png" width="300" height="auto" alt="Sellos">
	</div>
</div>
<div class="col-sm-12 col-md-6 col-lg-8 col-xl-8   ml-0 mt-3">
	<div data-aos="fade-left"
	data-aos-duration="1000">
	<iframe class="bordes-xl" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13377.375335457635!2d-71.4448017!3d-33.0474136!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1e43483d05d5385d!2sCentro%20M%C3%A9dico%20INSI!5e0!3m2!1ses-419!2scl!4v1667515700481!5m2!1ses-419!2scl" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

</div>
</div>

</div>
</div>


<a class="btn-whatsapp" href="https://api.whatsapp.com/send?phone=56985580587" target="_blank">
		<img src="assets/images/btn-wsp.png">
</a>

	<!--Modals-->
		<!--Radiografías-->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12 text-center">
					        	<h4 class="text-petroleo">Radiografías</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>ss</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Imagenología-->
		<div class="modal fade" id="m_imagenologia" tabindex="-1" aria-labelledby="m_imagenologia" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Imagenología</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Abdominal</li>
					        		<li>Renal</li>
					        		<li>Tiroidea</li>
					        		<li>Cervical o cuello</li>
					        		<li>Partes blandas</li>
					        		<li>Testicular simple</li>
					        		<li>Pelviana femenina</li>
					        		<li>Pelviana masculina</li>
					        		<li>Mamaria</li>
					        		<li>Transvaginal</li>
					        		<li>Obstetrica</li>
					        		<li>Ginecológica</li>
					        		<li>Seguimiento Folicular</li>
					        		<li>Doppler fetal</li>
					        		<li>3D</li><br>
					        		<li><strong>Contacto:</strong> (32) 2188947 / (32) 2921287</li>
					        		<li><strong>Whatsapp:</strong> +569 42498385</li>			        	
					        	</ul>
					        </div>
					    </div>
				  	</div>
				</div>
			</div>
		</div>

		<!--Cardiológicos-->
		<div class="modal fade" id="m_cardio" tabindex="-1" aria-labelledby="m_cardio" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Exámenes cardiológicos</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Holter de presión</li>
					        		<li>Holter de Arritmias</li>
					        		<li>Eco Cardiograma</li>
					        		<li>Eco Cardiograma Doppler</li>
					        		<li>Eco Cardiograma Doppler Color</li>
					        		<li>Test de esfuerzo</li>
					        		<li>E.K.G</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Procedimientos endoscópicos-->
		<div class="modal fade" id="m_endo" tabindex="-1" aria-labelledby="m_endo" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Procedimientos endoscópicos</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Endoscopía digestiva</li>
					        		<li>Rectoscopía</li>
					        		<li>Citoscopía</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>

		<!--Procedimientos de enfermería-->
		<div class="modal fade" id="m_enfermeria" tabindex="-1" aria-labelledby="m_enfermeria" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				  <div class="modal-body">
				      	<div class="row">
				      		<div class="col-md-12">
						      	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						          </button>
				      		</div>
				      	</div>
				  		<div class="row">
				  			<div class="col-md-12">
					        	<h4 class="text-petroleo ml-4">Procedimientos de enfermería</h4>
					        </div>
					    </div>
					    <div class="row">
				  			<div class="col-md-12">
					        	<ul>
					        		<li>Curaciones</li>
					        		<li>Inyecciones</li>
					        		<li>Toma de presión</li>
					        		<li>Uroflujometría</li>
					        	</ul>
					        </div>
					    </div>
				  </div>
				</div>
			</div>
		</div>



	<!-- DATOS DE VITAL IMPORTANCIA -->
	<input type="hidden" name="id_paciente" id="id_paciente" value="0">

	<footer>
		<?php
		require_once('include/footer_es.php');
		?>
	</footer>

	<script src="assets/js/jquery-3.6.0.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/aos.js"></script>
	
	
	<script type="text/javascript">
		$('.carousel').carousel({
		interval: 3000
		})
	</script>
	<script>
	  $(document).ready(function(){
	    $(".ancla").click(function(evento){
	      evento.preventDefault();
	      var codigo = "#" + $(this).data("ancla");
	      $("html,body").animate({scrollTop: $(codigo).offset().top}, 1400);
	    });
	  });
	</script>

	  <script>
		let url = "https://med-sdi.cl/api/buscar_profesionales_cm";
		$.ajax({
			url: url,
			type:'post',
			data:{
				id_centro_medico: 12
			},
			success: function(resp){
				let especialidades = resp;
			
				$('#modal_reserva_id_profesion').empty();
				$('#modal_reserva_id_profesion').append(`<option value="0">Seleccione </option>`);
				especialidades.forEach(e => {
					console.log(e);
					$('#modal_reserva_id_profesion').append(`
						<option value="${e.id}"> ${e.nombre} </option>
					`);
				});
			},
			error: function(error){
				console.log(error.responseText);
			}
		});
	  </script>

	  <script>
		function buscar_tipo_especialidad(value){
			$('#div_resultado_busqueda').html('');
			let id_profesion = value.value;
			console.log(id_profesion);
			let url = "https://med-sdi.cl/api/buscar_especialidades_cm";
			$.ajax({
				url: url,
				type:'post',
				data:{
					id_profesion: id_profesion,
					id_lugar_atencion: 12
				},
				success: function(resp){
					$('#modal_reserva_id_tipo_especialidad').empty();
					console.log(resp);
					let especialidades = resp;
				
					$('#modal_reserva_id_especialidad').empty();
					$('#modal_reserva_id_especialidad').append(`<option value="0">Seleccione </option>`);
					especialidades.forEach(e => {
						console.log(e);
						$('#modal_reserva_id_especialidad').append(`
							<option value="${e.id}"> ${e.nombre} </option>
						`);
					});
				},
				error: function(error){
					console.log(error.responseText);
				}
			});
		}

		function buscar_subtipo_especialidad(value){
			let id_tipo_especialidad = value.value;
			console.log(id_tipo_especialidad);
			let url = "https://med-sdi.cl/api/buscar_sub_especialidades_cm";
			$.ajax({
				url: url,
				type:'post',
				data:{
					id_tipo_especialidad: id_tipo_especialidad,
					id_lugar_atencion: 12
				},
				success: function(resp){
					console.log(resp);
					if(resp.value == 'tipos_especialidades'){
						let especialidades = resp.tipos_especialidades;
				
						$('#modal_reserva_id_tipo_especialidad').empty();
						$('#modal_reserva_id_tipo_especialidad').append(`<option value="0">Seleccione </option>`);
						especialidades.forEach(e => {
							console.log(e);
							$('#modal_reserva_id_tipo_especialidad').append(`
								<option value="${e.id}"> ${e.nombre} </option>
							`);
						});
					}else{
						let profesionales = resp.profesionales;
						$('#div_resultado_busqueda').empty();
						profesionales.forEach(p => {
							console.log(p);
							var html = '';
							html += '<div class="col-sm-12 col-md-4">';
							html += '    <div class="card user-card user-card-1 mt-4">';
							html += '        <div class="card-body pt-0">';
							html += '            <div class="user-about-block text-center">';
							html += '                <div class="row align-items-end">';
							html += '                    <div class="col"><img class="img-radius img-fluid wid-70" src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'"></div>';
							html += '                </div>';
							html += '            </div>';
							html += '            <div class="text-center">';
							html += '                <a href="#!" data-toggle="modal" data-target="#modal-report">';
							html += '                    <span class="badge badge-primary mt-2">';
							
							html += '                    </span>';
							html += '                    <h6 class="mb-1 mt-2">'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'</h6>';
							html += '                </a>';

						

							html += '                <button type="button" class="btn btn-outline-info btn-sm" onclick="f_profesional('+p.id+');"><i class="feather icon-file-plus"></i> Ver ficha</button>';
							html += '                <button type="button" class="btn btn-info btn-sm" onclick="hora_medica('+p.id+');"><i class="feather icon-calendar"></i> Reservar hora</button>';
							html += '            </div>';
							html += '        </div>';
							html += '    </div>';
							html += '</div>';
				
							$('#div_resultado_busqueda').append(html);
						});
					}
					
				},
				error: function(error){
					console.log(error.responseText);
				}
			});
		}

		function buscar_profesionales(){
			let id_profesion = $('#modal_reserva_id_profesion').val();
			let id_especialidad = $('#modal_reserva_id_especialidad').val();
			let id_tipo_especialidad = $('#modal_reserva_id_tipo_especialidad').val();
			let id_lugar_atencion = 12;

			let url = "https://med-sdi.cl/api/buscar_profesionales_cm_todos";

			$.ajax({
				url: url,
				type:'post',
				data:{
					id_profesion: id_profesion,
					id_especialidad: id_especialidad,
					id_tipo_especialidad: id_tipo_especialidad,
					id_lugar_atencion: id_lugar_atencion
				},
				success: function(resp){
				
					console.log(resp);
					let profesionales = resp.profesionales;
					$('#div_resultado_busqueda').empty();
					profesionales.forEach(p => {
						console.log(p);
						var html = '';
						html += '<div class="col-sm-12 col-md-4">';
						html += '  <div class="card shadow-sm border-0 rounded-3 p-3 text-center">';
						html += '    <img src="https://www.med-sdi.cl/images/iconos/usuario_profesional.svg" alt="'+p.nombre+' '+p.apellido_uno+'" class="rounded-circle mx-auto d-block mb-3" style="width: 80px; height: 80px;">';
						html += '    <h6 class="fw-bold">'+p.nombre+' '+p.apellido_uno+' '+p.apellido_dos+'</h6>';
						html += '    <p class="text-muted mb-3">Profesional disponible para atención</p>';
						html += '    <button type="button" class="btn btn-primary btn-sm" onclick="hora_medica('+p.id+');">Aplicar</button>';
						html += '  </div>';
						html += '</div>';

				
						$('#div_resultado_busqueda').append(html);
					});
				},
				error: function(error){
					console.log(error.responseText);
				}
			});
		}

		function buscarPaciente(event){
			// AL INGRESAR EL RUT DEL PACIENTE Y SI SE ENCUENTRA PREGUNTAR SI DESEA CARGAR SU INFORMACION, SI ACEPTA 
			// SE ENVIA UNA CORREO AL PACIENTE ENVIANDOLE UN CODIGO, CON ESE CODIGO SI COINCIDEN SE MUESTRAN LOS DATOS DEL 
			//PACIENTE
			var rut = $('#rut_paciente').val();
			if(rut == ''){
				alert('Debe ingresar un rut');
				return false;
			}
			let url = 'https://med-sdi.cl/api/buscar_paciente';
			$.ajax({
				url: url,
				type: 'GET',
				data: {
					rut: rut
				},
				success: function(response){
					if(response.estado == 'ok'){
						// Mostrar info paciente
    					//$('#info_paciente_detalle').show();
    					$('#form_registro_paciente').hide();

						let paciente = response.paciente;
							console.log(paciente);
							// Mostrar saludo dentro del bloque
						$('#paciente_saludo')
							.removeClass('d-none')
							.addClass('alert-success')
							.html(`¡Hola <strong>${paciente.nombres}</strong>! Tu información se ha cargado correctamente.`);
						// Mostrar datos en la tarjeta
						$('#paciente_nombre').text(paciente.nombres);
						$('#paciente_apellido_uno').text(paciente.apellido_uno);
						$('#paciente_apellido_dos').text(paciente.apellido_dos);
						$('#paciente_rut').text(paciente.rut);
						$('#paciente_email').text(paciente.email);
						$('#paciente_telefono').text(paciente.telefono_uno);
						$('#paciente_nacimiento').text(paciente.fecha_nac);
						$('#paciente_ciudad').text(paciente.ciudad.nombre);
						$('#paciente_direccion').text(paciente.direccion.direccion + ' Nº ' + paciente.direccion.numero_dir);

						$('#id_paciente').val(paciente.id);
						
						//$('#info_paciente_detalle').show();
						
						// El resto de tu lógica para llenar los inputs o medicamentos puede seguir como ya está
						// setTimeout(() => {
						// 	$('#paciente_saludo').fadeOut();
						// }, 4000);
					}else{
						// Mostrar formulario, ocultar info
						$('#info_paciente_detalle').hide();
						$('#form_registro_paciente').show();

						// Prellenar el RUT automáticamente en el formulario de registro
						$('#nuevo_rut').val($('#rut_paciente').val());
					}

				},
				error: function(error){
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Error al buscar paciente',
					});
				}
			});
			
		}

		function hora_medica(id_profesional){
			let id_paciente = $('#id_paciente').val();
			let id_lugar_atencion = 12;

			$('#modal_reserva_hora_id_profesional').val(id_profesional);
	
			let url = 'https://med-sdi.cl/api/horas_medicas_profesional_lugar_atencion';

			$.ajax({
				url: url,
				type: "get",
				data: {
					//_token: _token,
					id_profesional: id_profesional,
					lugar_atencion: id_lugar_atencion,
					id_paciente: id_paciente,
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1)
				{

					if(data.registros.horario_agenda_laboral != '')
					{
						console.log(data);
						let dias = ['','LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
						var dias_activos = data.registros.horario_agenda_laboral.split(',');
						var dias_texto = '';
						var cant = 0;

						$.each(dias_activos, function(index, value)
						{
							if(cant>0)
								dias_texto += ' - '+dias[value];
							else
								dias_texto += dias[value];

							cant++;
						});
						$('#div_resultado_busqueda_hora').removeClass('d-none');
						$('#div_resultado_busqueda_hora_').removeClass('d-none');
						$('#modal_reserva_dias_atencion').html(dias_texto);

						/** calendario */
						$('#modal_reserva_fecha').attr('disabled',false);

						$("#modal_reserva_fecha").flatpickr({
							"disable": [
								function(date) {
									return !dias_activos.includes(String(date.getDay()));
								}
							],
							minDate: "today",
							maxDate: new Date().fp_incr(60), // 14 days from now
							locale: {
								firstDayOfWeek: 1,
								weekdays: {
								shorthand: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
								longhand: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
								},
								months: {
								shorthand: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Оct', 'Nov', 'Dic'],
								longhand: ['Enero', 'Febrero', 'Мarzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
								},
							},
						});
						/** fin calendario */

					}
					else
					{
						$('#modal_reserva_dias_atencion').html('NO INFORMADOS');
						$('#modal_reserva_fecha').attr('disabled',true);
						$('#modal_reserva_fecha_seleccionada').html('');
					}

				} else {
					// alert('No se pudo Cargar las ciudades');
				}

			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError)
			});

		}

		function cargar_horas_disponibles_calendario_profesion(dia)
		{

			let id_profesional = $('#modal_reserva_hora_id_profesional').val();
			let id_lugar_atencion = 12;
			console.log('cargar_horas_disponibles_calendario_profesion');
			console.log(dia);

	
			let url = 'https://med-sdi.cl/api/horas_disponibles_profesional_lugar_atencion';
			$.ajax({
				url: url,
				type: "get",
				data: {
					//_token: _token,
					id_profesional: id_profesional,
					id_lugar_atencion: id_lugar_atencion,
					dia: dia,
				},
			})
			.done(function(data) {
				console.log(data);
				if (data.estado == 1) {
					$('#modal_reserva_fecha_seleccionada').html('Horas disponibles para el dia: '+data.text_fecha);

					$('#modal_reserva_hora_lista_horas').html('');
					$.each(data.registros, function(index, value)
					{
						var hr1 = moment(value.hora,'HH:mm:ss').format('HH:mm');
						var html = '';
						html += '<div class="col-md-2 btn btn-outline-primary btn-sm my-1 mx-1" data-hora="'+value.hora+'" onclick="generar_reserva_cita(\''+value.hora+'\');">';
						html += ''+hr1;
						html += '</div>';

						$('#modal_reserva_hora_lista_horas').append(html);
					});

				} else {
					// alert('No se pudo Cargar las ciudades');
					$('#modal_reserva_hora_lista_horas').html('<span style="font-weight: bold; text-align: center;">"Sin disponibilidad de Horas"</span>');
				}

			})
			.fail(function(jqXHR, ajaxOptions, thrownError) {
				console.log(jqXHR, ajaxOptions, thrownError)
			});

		}

		function formatoRut(rut)
		{
			var valor = rut.value.replace('.','');
			valor = valor.replace(/\-/g,'');

			cuerpo = valor.slice(0,-1);
			dv = valor.slice(-1).toUpperCase();
			rut.value = cuerpo + '-'+ dv

			if(cuerpo.length < 7) { rut.setCustomValidity("RUT Incompleto"); return false;}

			suma = 0;
			multiplo = 2;

			for(i=1;i<=cuerpo.length;i++)
			{
				index = multiplo * valor.charAt(cuerpo.length - i);
				suma = suma + index;
				if(multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }
			}

			dvEsperado = 11 - (suma % 11);
			dv = (dv == 'K')?10:dv;
			dv = (dv == 0)?11:dv;

			if(dvEsperado != dv) { rut.setCustomValidity("RUT Inválido"); return false; }

			rut.setCustomValidity('');
		}
	  </script>


	<script>
	  $(document).ready(function(){
	    $("#boton").click(function(evento){
	      $("html,body").animate({scrollTop:0}, "slow");
	    });
	  });
	</script>
	<script>
	  AOS.init();
	</script>
	<script>
		new DataTable('#example', {
    responsive: true
});
	</script>
</body>
</html>