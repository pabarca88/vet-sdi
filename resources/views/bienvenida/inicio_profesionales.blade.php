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
					<h6>Ahora tendrás mejor gestión de tus pacientes y más beneficios. <br>Para ingresar a tu escritorio deberás completar la configuración básica
				</div>
				<div class="col-sm-12 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="lugar();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/lugar.svg') }}" class="img-fluid wid-50 mb-2" alt="...">
									<h5>Mi lugar de atención</h5>
									<p class="card-text">Registra tu primer lugar de atención</p>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="perfil();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/academico.png') }}" class="img-fluid wid-60" alt="...">
									<h5>Perfil académico</h5>
									<p class="card-text">Completa tus datos profesionales</p>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 text-center">
							<button type="button" class="btn btn-primary">Acceder al escritorio</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    @include("bienvenida.modal.c_lugar_prof");
    @include("bienvenida.modal.c_asistente_prof");
    @include("bienvenida.modal.c_perfil_prof");
@endsection
