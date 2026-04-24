<!DOCTYPE html>
<html lang="es">

	<?php
	require_once('include/head.php');
	?>	


<body  style="background-image: url(assets/images/bg-green.png); background-position: center center; background-size: cover; background-repeat: repeat; background-attachment: fixed;">
	
	
	<?php
	require_once('include/header.php');
	?>

	<!--SLIDER-->
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade mt-5" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/images/banner-sdi-1.jpg" class=" w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block" alt="BANNER">
				<img src="assets/images/banner-sdi-2.jpg" class=" w-100 d-block d-sm-block d-md-block d-lg-none " alt="BANNER">
			</div>
		</div>
	</div>

	<div class="container-fluid pt-5 pb-4 bg-azul-oscuro align-item-center">
		<div class="row">
			<div class="col-md-4 text-center mb-4 pt-2">
				<img src="assets/images/agenda-sdi.png" class="img-fluid mb-2 icono-index" alt="ICONO">
				<h2 class="text-white counter" data-target="30000">30.000</h2>
				<p class="text-white">Citas agendadas</p>
			</div>
				<div class="col-md-4 text-center mb-4 pt-2">
				<img src="assets/images/usuario-sdi.png" class="img-fluid mb-2 icono-index" alt="ICONO">
				<h2 class="text-white counter" data-target="10000">10.000</h2>
				<p class="text-white">Usuarios activos</p>
			</div>
				<div class="col-md-4 text-center mb-4 pt-2">
				<img src="assets/images/soporte-sdi.png" class="img-fluid mb-2 icono-index" alt="ICONO">
				<h2 class="text-white" style="font-size: 2.5rem;
	  font-weight: bold">24/7</h2>
				<p class="text-white">Soporte las 24 horas</p>
			</div>
		</div>
	</div>
	<!--Soluciones para-->
	<div id="funcionalidad">
		<div data-aos="fade-up"
			data-aos-easing="linear"
			data-aos-duration="1100">
			<div class="container mt-5">
				<!--<div class="row">
					<div class="col-md-12 text-center">
						<h4>Funcionalidades</h4>
					</div>
				</div>-->
				<!--FMU-->
				<div class="row align-items-center mb-info  section-hover fade-block">
					<div class="col-md-6">
						<!--<h6>Ficha Médica Única</h6>-->
						<h2 class="t-azul-oscuro">Historial vetrinario completo y siempre disponible</h2>
						<p class="text-justify">
						Accede al historial clínico de tu paciente en un solo lugar, con toda su información relevante: antecedentes, controles, tratamientos y evolución a lo largo del tiempo. Esta visión integral es fundamental para brindar una atención veterinaria más precisa y segura, tanto en consultas de rutina como en situaciones de urgencia, permitiendo tomar decisiones informadas, rápidas y oportunas.</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
					<div class="col-md-6 text-center">
						<img class="img-fluid" src="assets/images/fmu.png">
					</div>
				</div>
				<!--RECETA ONLINE -->
				<div class="row align-items-center mb-info section-hover fade-block">
					<div class="col-md-6 text-center order-1 order-sm-1 order-md-0">
						<img class="img-fluid" src="assets/images/ro.png">
					</div>
					<div class="col-md-6">
						<!--<h6>Receta Online</h6>-->
						<h2 class="t-azul-oscuro">Repositorio de documentos clínicos, disponibles 24/7</h2>
						<p class="text-justify">
						Dueños de mascotas y profesionales veterinarios pueden acceder en todo momento al historial y documentos de cada animal desde cualquier dispositivo. Resultados de exámenes, certificados, recetas, informes clínicos y más, todo centralizado para brindar una atención más ágil, segura y conectada en cada consulta.

						</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
				</div>
				<!--FICHAS MEDICAS-->
				<div class="row align-items-center mb-info section-hover fade-block">
					<div class="col-md-6">
						<h2 class="t-azul-oscuro">Fichas clínicas adaptadas a cada especialidad</h2>
						<p class="text-justify">
						Nuestras fichas clínicas veterinarias están diseñadas para adaptarse a las necesidades de cada tipo de mascota y especialidad. Permiten registrar, visualizar y gestionar la información de forma clara, ordenada y segura, facilitando diagnósticos más precisos y una atención de calidad en cada consulta, desde controles rutinarios hasta casos más complejos.

						</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
					<div class="col-md-6 text-center">
						<img class="img-fluid" src="assets/images/atencion-sdi.png">
					</div>
				</div>
				<!--ATENCIÓN A PCTES CRÓNICOS-->
				<div class="row align-items-center mb-info section-hover fade-block">
					<div class="col-md-6 text-center order-1 order-sm-1 order-md-0">
						<img class="img-fluid" src="assets/images/enfermo-cronico.png">
					</div>
					<div class="col-md-6">
						<h2 class="t-azul-oscuro">Atención especializada para mascotas con enfermedades crónicas</h2>
						<p class="text-justify">Ofrecemos un espacio especializado para el seguimiento de mascotas con enfermedades crónicas. Accede a una sección dedicada a controles periódicos, evolución del paciente, recetas, indicaciones y profesionales veterinarios especializados, asegurando un cuidado continuo, ordenado y de calidad para cada etapa de su tratamiento.

						</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
				</div>
				<!--AGENDA-->
				<div class="row align-items-center mb-info section-hover fade-block">
					<div class="col-md-6">
						<h2 class="t-azul-oscuro">Agenda digital inteligente para una gestión veterinaria eficiente</h2>
						<p class="text-justify">
						Nuestra agenda digital veterinaria se integra con el trabajo diario de clínicas, profesionales, asistentes y tutores de mascotas, permitiendo una coordinación fluida en todo momento. Accede fácilmente desde cualquier lugar y dispositivo: computador, tablet o smartphone.

						Optimiza la gestión de consultas veterinarias con programación automatizada, recordatorios por correo o WhatsApp, visualización de disponibilidad en tiempo real y organización por especialidades. Facilita la reserva de horas para cada mascota y reduce ausencias, mejorando la eficiencia de tu clínica o centro veterinario.


						</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
					<div class="col-md-6 text-center">
						<img class="img-fluid" src="assets/images/agenda_sdi_.png">
					</div>
				</div>
				<!--GESTION ADMINISTRATIVA-->
				<div class="row align-items-center mb-info section-hover fade-block">
					<div class="col-md-6 text-center order-1 order-sm-1 order-md-0">
						<img class="img-fluid" src="assets/images/cm.png">
					</div>
					<div class="col-md-6">
						<h2 class="t-azul-oscuro">Gestión Administrativa</h2>
						<p class="text-justify">Optimiza la gestión de tu clínica veterinaria con herramientas integradas para pagos, estadísticas, control de inventario, reportes y mucho más. Todo lo que necesitas para administrar tu centro de forma eficiente, ordenada y sin complicaciones, mejorando tanto la atención de las mascotas como la operación diaria de tu negocio.
						</p>
						<!--<button type="button" class="btn btn-info">CARACTERISTICAS</button>-->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Alianzas-->
    <div class="bg-light-deg">
	    <div class="container pt-8 pb-8 px-4 mt-10">
	    	<div class="row">
				<div class="col-md-12 text-petroleo text-center mb-3">
					<p class="p-22 font-weight-bold">Nuestras alianzas</p>
				</div>
			</div>
			<div data-aos="fade-up"
			    data-aos-easing="linear"
			    data-aos-duration="1100">
					<div class="row align-items-center">
						<div class="col-md-3 mb-2 text-center align-middle">
							<a href="http://www.cronicos.cl/"target="black">
								<img class="img-fluid alianza-logo" src="assets/images/sdi/cronicos.svg"  alt="">
							</a>
						</div>
						<div class="col-md-3 mb-2 text-center align-middle">
							<a href="https://www.med-sdi.cl/sdinicio/"target="black">
								<img class="img-fluid alianza-logo" src="assets/images/sdi/medichile.svg" alt="">
							</a>
						</div>
						<div class="col-md-3 mb-2 text-center align-middle">
							<a href="http://www.farmacronicos.cl/"target="black">
								<img class="img-fluid alianza-logo" src="assets/images/sdi/farmacronicos.svg"  alt="">
							</a>
						</div>
						<div class="col-md-3 mb-2 text-center align-middle">
							<a href="https://www.med-sdi.cl/sdinicio/"target="black">
								<img class="img-fluid alianza-logo" src="assets/images/sdi/logo.svg" alt="">
							</a>
						</div>
					</div>
			</div>
		</div>
	</div>

	<!--CONTACTO-->
	<div id="contacto" style="background-image: url(assets/images/bg-cont.png); background-position: center center; background-size: cover; background-repeat: repeat; background-attachment: fixed;">
		<div class="container pt-8 pb-5">
			<div class="row">
				<div class="col-12 text-center">
			 		<h2 class="t-azul-oscuro mb-4">Contacto</h2>
			 	</div>
			</div>
			 <div class="row bg-white rounded-xl pt-4 glass-card">
			 	 <div class="col-sm-12 col-md-12 col-lg-6 px-5 py-3">
	            	 <h6 class="t-azul-oscuro mb-3">Envíenos su mensaje y un ejecutivo de nuestro equipo le responderá a la brevedad.</h6>
	                <form id="form-contact">
	                	<div class="form-row">
							<div class="form-group col-12">
								<label for="nombre" class="t-azul-oscuro">Nombre y Apellido *</label>
								<input id="nombre" name="nombre" type="text" class="form-control form-control-sm rounded-xl" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-6">
								<label class="t-azul-oscuro" for="email">Correo electrónico *</label>
								<input id="email" name="email" type="email" class="form-control form-control-sm rounded-xl" required>
							</div>
							<div class="form-group col-6">
								<label for="nombre" class="t-azul-oscuro">Teléfono *</label>
								<input id="fono" name="fono" type="text" class="form-control form-control-sm rounded-xl" required>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-12">
								<label for="nombre" class="t-azul-oscuro">Asunto *</label>
								<input id="nombre" name="asunto" type="text" class="form-control form-control-sm rounded-xl" required>
							</div>
							<div class="form-group col-12">
								<label class="t-azul-oscuro" for="comentario">Mensaje *</label>
								<textarea class="form-control form-control-sm rounded-xl" placeholder="Escriba su mensaje" id="comentario" name="comentario" rows="5" required></textarea>
							</div>
							<button type="submit" class="btn btn-azul mb-5 btn-block  rounded-xl" name="button" id="button" value="Enviar" onClick="javascript: if (validar()) {document.cliente.submit();}else{return false;}">ENVIAR MENSAJE</button>
						</div>
					</form>
	            </div>
	            <div class="col-sm-12 col-md-12 col-lg-6 px-5 py-3">
					<div class="media">
					 <img src="assets/images/ubicacion.png" class="mr-3" style="width:3rem;" alt="...">
					  <div class="media-body">
					    <h6 class="mt-0 t-azul-oscuro">Dirección</h6>
					    <p>Las Pimpinelas 765, Concón, Región de Valparaíso.</p>
					  </div>
					</div>

					<div class="media">
					 <img src="assets/images/email.png" class="mr-3" style="width:3rem;" alt="...">
					  <div class="media-body">
					    <h6 class="mt-0 t-azul-oscuro">Correo electrónico</h6>
					    <p>contacto@sdi.cl</p>
					  </div>
					</div>

					<div class="media">
					 <img src="assets/images/telefono.png" class="mr-3 w-30" style="width:3rem;" alt="...">
					  <div class="media-body">
					    <h6 class="mt-0 t-azul-oscuro">Teléfono</h6>
					    <p>+569 9547 4660</p>
					  </div>
					</div>
					<iframe class="mt-3" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.808718081063!2d-71.54673352531734!3d-32.92965167360025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689c2c9420f795d%3A0xf877657f474acdef!2sLas%20Pimpinelas%20765%2C%202510080%20Conc%C3%B3n%2C%20Valpara%C3%ADso!5e0!3m2!1ses!2scl!4v1756266144402!5m2!1ses!2scl" width="100%" height="330" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

				</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-8 mx-auto">
	        		<div id="miAcordeon" class="accordion mt-8 mb-5">
					 <h5 class="mb-3 t-azul-oscuro">Preguntas frecuentes</h5>
					    <!-- Item 1 -->
					    <div class="card">
					      <div class="card-header border-bottom" id="cabecera1">
					        <h2 class="mb-0">
					          <button class="btn btn-acc collapsed" type="button"
					                  data-toggle="collapse" data-target="#colapso1"
					                  aria-expanded="false" aria-controls="colapso1">
					            ¿Cómo inscribirse en SALUD DIGITAL INTEGRADA?
					          </button>
					        </h2>
					      </div>
					      <div id="colapso1" class="collapse" aria-labelledby="cabecera1" data-parent="#miAcordeon">
					        <div class="card-body text-justify">
					         <p>   Ingresa a <a class="t-azul-oscuro font-weight-bold" href="https://www.med-sdi.cl/Ingreso">www.med-sdi.cl</a>  e ingrsar correo electrónico, contraseña y seleccione el tipo de inscripción que requiere (Paciente, Profesionales, Servicios, Instituciones). </p>
					        </div>
					      </div>
					    </div>

					    <!-- Item 2-->
					    <div class="card">
					      <div class="card-header border-bottom" id="cabecera2">
					        <h2 class="mb-0">
					          <button class="btn btn-acc" type="button"
					                  data-toggle="collapse" data-target="#colapso2"
					                  aria-expanded="true" aria-controls="colapso2">
					            ¿Cómo inscribirse en Salud Digital Integrada?
					          </button>
					        </h2>
					      </div>
					      <div id="colapso2" class="collapse" aria-labelledby="cabecera2" data-parent="#miAcordeon">
					        <div class="card-body border-bottom text-justify">
					          Escríbenos a través de nuestra página web <a class="t-azul-oscuro font-weight-bold" href="https://www.med-sdi.cl/Ingreso">www.sdi.cl</a>, completa el formulario de <strong>CONTACTO</strong> y uno de nuestros ejecutivos te responderá lo antes posible.
					        </div>
					      </div>
					    </div>
					</div>
	        	</div>
	        </div>
	    </div>
    </div>
	



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

	<script>
    // Animación de contador
    $(".counter").each(function () {
      var $this = $(this);
      var target = +$this.attr("data-target");
      var count = 0;
      var speed = target / 500; // velocidad

      var interval = setInterval(function () {
        count += Math.ceil(speed);
        if (count >= target) {
          count = target;
          clearInterval(interval);
        }
        $this.text(count.toLocaleString()); // con separador de miles
      }, 30); // refresco cada 30ms
    });
  </script>
	
	
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
document.addEventListener("scroll", function() {
    document.querySelectorAll(".fade-block").forEach(el => {
        const top = el.getBoundingClientRect().top;
        if (top < window.innerHeight - 80) {
            el.classList.add("visible");
        }
    });
});
</script>

<script>
window.addEventListener("scroll", function() {
    const nav = document.querySelector(".navbar");
    nav.classList.toggle("scrolled", window.scrollY > 50);
});
</script>


</body>
</html>