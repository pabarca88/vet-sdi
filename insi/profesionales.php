<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- <base href="https://insi.med-sdi.cl/"> -->
	<base href="https://med-sdi.cl/insi">

	<title>Centro Médico Insi</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!-- Estilos -->
	<link href="css/main.css" rel="stylesheet" type="text/css">

	<link href="css/aos.css" rel="stylesheet" type="text/css">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/7066bc9f2e.js" crossorigin="anonymous"></script>
</head>

<body>
	<header>
		<!--Menú 1-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="https://med-sdi.cl/insi/">
				<img src="https://med-sdi.cl/insi/img/insi-logo.png" width="130" height="auto" alt="INSI">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
					<li class="nav-item mx-2">
						<a class="btn btn-orange" href="profesionales.php" role="button">Buscar profesionales</a>
					</li>
				</ul>
			</div>
		</nav>

		<!--Slider-->
		<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="https://med-sdi.cl/insi/img/banner-profesionales.png" class="d-block w-100" alt="banner insi">
				</div>
			</div>
		</div>
	</header>
	<div class="container mt-4 mb-2">
		<div class="row">
			<div class="col-md-12 text-petroleo text-center mb-2">
				<h4>Buscar profesional</h4>
				<input type="hidden" name="id_institucion" id="id_institucion" value="5">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 text-petroleo mb-2 mx-auto">
				<form>
					<div class="form-row">
						<div class="form-group col-md-3">
							<select class="form-control" id="id_especialidad" onchange="carga_tipo_especialidad();">
								<option value="">Seleccionar</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<select class="form-control" id="id_tipo_especialidad" onchange="carga_sub_tipo_especialidad();">
								<option value="">Seleccionar</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<select class="form-control" id="id_sub_tipo_especialidad">
								<option value="">Seleccionar</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<button type="button" class="btn btn-azul btn-block" onclick="buscarProfesional();">Buscar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="container mt-2 mb-5">
		<div class="row" id="lista_profesionales">
			<!-- lista de profesionales -->
			<div>
				<h4>Realize la busqueda de los Profesionales.</h4>
			</div>
		</div>
	</div>

	<!--Footer-->
	<div class="container-fluid bg-azul-corp pt-2">
		<div class="row">
			<div class="col-md-4  text-center py-2" style="color: #B7B7B7;">
				<p>Siguenos
				<p>
					<a href="#" style="color: #B7B7B7;">
						<i class="fab fa-facebook-f fa-2x mr-2"></i>
					</a>
					<a href="#" style="color: #B7B7B7;">
						<i class="fab fa-instagram fa-2x"></i>
					</a>
			</div>
			<div class="col-md-4 col-md-4 offset-md-4 text-petroleo text-center">
				<img class="img-fluid mb-2" src="https://med-sdi.cl/insi/img/sdi/sellos.png" width="250" alt="Sellos">
			</div>
		</div>
	</div>

	<div class="container-fluid bg-footer">
		<div class="row">
			<div class="col-md-12 text-center py-2 align-middle">
				<span class="align-middle copyright" style="font-size: 12px; color:#B7B7B7;">© 2021 <b>INSI</b> Todos los derechos reservados</span>
			</div>
		</div>
	</div>

	<!--Btn wsp-->
	<a class="btn-whatsapp" href="https://api.whatsapp.com/send?phone=56985580587" target="_blank">
		<img src="https://med-sdi.cl/insi/img/btn-wsp.png">
	</a>


	<script src="https://med-sdi.cl/insi/js/jquery-3.6.0.min.js"></script>
	<script src="https://med-sdi.cl/insi/js/bootstrap.min.js"></script>
	<script src="https://med-sdi.cl/insi/js/popper.min.js"></script>
	<script src="https://med-sdi.cl/insi/js/carousel.js"></script>
	<script src="https://med-sdi.cl/insi/js/aos.js"></script>
	<script src="https://med-sdi.cl/insi/js/api.js"></script>
	<script src="https://med-sdi.cl/insi/js/profesionales.js"></script>

</body>

</html>