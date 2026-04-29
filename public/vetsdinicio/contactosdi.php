<!DOCTYPE html>
<html lang="es">

	<?php
	require_once('include/head.php');
	?>	


<body  style="background-image: url(assets/images/bg-cont.png); background-position: center center; background-size: cover; background-repeat: repeat; background-attachment: fixed;">
	
	
	<?php
	require_once('include/header-dos.php');
	?>
	<!--
	<div id="carouselExampleIndicators" class="carousel slide carousel-fade mt-5" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="assets/images/banner-sdi-1.jpg" class=" w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block" alt="BANNER">
				<img src="assets/images/banner-sdi-2.jpg" class=" w-100 d-block d-sm-block d-md-block d-lg-none " alt="BANNER">
			</div>
		</div>
	</div>-->
	

	<!--CONTACTO-->
	<div class="container-fluid">
		<div class="col-md-12 text-center">
			<h2 class="t-azul-oscuro titulo-anexo mb-5">Contacto</h2>
		</div>
	</div>
	<div class="container mt-n5 mb-5">
		 <div class="row bg-white rounded-xl pt-4">
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
				    <h6 class="mt-0">Dirección</h6>
				    <p>Las Pimpinelas 765, Concón, Región de Valparaíso.</p>
				  </div>
				</div>

				<div class="media">
				 <img src="assets/images/email.png" class="mr-3" style="width:3rem;" alt="...">
				  <div class="media-body">
				    <h6 class="mt-0">Correo electrónico</h6>
				    <p>contacto@sdi.cl</p>
				  </div>
				</div>

				<div class="media">
				 <img src="assets/images/telefono.png" class="mr-3 w-30" style="width:3rem;" alt="...">
				  <div class="media-body">
				    <h6 class="mt-0">Teléfono</h6>
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
	  $(document).ready(function(){
	    $("#boton").click(function(evento){
	      $("html,body").animate({scrollTop:0}, "slow");
	    });
	  });
	</script>
	<script>
	  AOS.init();
	</script>
</body>
</html>