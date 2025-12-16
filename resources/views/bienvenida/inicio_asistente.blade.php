@extends('template.bienvenida.bienvenida')

@section('page-styles')
    <style>
        .auth-wrapper{
            background-size: cover;
            background-image: url("{{ asset('images/background_2.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
@endsection

@section('content')
    <!--Container Completo-->

	<div class="auth-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-10 mx-auto py-2 px-5 text-center">
					<h4 class="text-c-blue">SDI, te da la bienvenida</h4>
					<h6>Ahora podrás trabajar con profesionales e instituciones sin importar dónde te encuentres <br>Para ingresar a tu escritorio deberás completar la configuración básica
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="pass();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/pass.png') }}" class="img-fluid wid-50 mb-2" alt="...">
									<h5>Cambiar contraseña</h5>
									<p class="card-text">Te recomendamos modificar la contraseña por motivos de seguridad</p>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-6">
							<a href="#" onclick="modalidad();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/mis_asistentes.svg') }}" class="img-fluid wid-50 mb-2" alt="...">
									<h5>Modalidad de trabajo</h5>
									<p class="card-text">Configura la modalidad en que deseas trabajar</p>
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-12 text-center">
					<button type="button" class="btn btn-primary">Acceder al escritorio</button>
				</div>
			</div>
		</div>
	</div>
    @include("bienvenida.modal.c_pass");
    @include("bienvenida.modal.c_modalidad");
@endsection
