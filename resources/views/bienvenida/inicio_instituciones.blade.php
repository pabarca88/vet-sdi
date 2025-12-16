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
					<h6>Ahora tendrás mejor gestión de tu institución y muchos beneficios. <br>Para ingresar al escritorio deberás completar la configuración básica
				</div>
				<div class="col-sm-12 mx-auto py-2 px-4">
					<div class="card-deck">
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="lugar();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/lugar.svg') }}" class="img-fluid wid-50 mb-2" alt="lugar">
									<h5>Mi lugar de atención</h5>
									<p class="card-text">Configura el lugar de atención matriz</p>
								</div>
							</div>
							</a>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-4">
							<a href="#" onclick="horario();">
							<div class="card">
								<div class="card-body text-center">
									<img src="{{ asset('images/iconos/horario.png') }}" class="img-fluid wid-60" alt="horario">
									<h5>Horario de atención</h5>
									<p class="card-text">Configura el horario del lugar de atención matriz</p>
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
    @include("bienvenida.modal.c_lugar_inst");
    @include("bienvenida.modal.c_horario_inst");
@endsection
