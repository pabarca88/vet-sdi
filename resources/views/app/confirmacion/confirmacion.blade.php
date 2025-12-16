<!DOCTYPE html>
<html lang="es">
<head>
	@include('app.autorizacion.include.head')
</head>
<body>
	@include('app.autorizacion.include.header')

	<!--CONTENIDO-->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow border-0 pb-4 pt-3  alin-centro align-content-center">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-center mb-4">
								<img src="{{ asset('images/logo_pais_vertical.png') }}" width="80" alt="Medichile">
							</div>
						</div>
                        @if($paciente)
						<div class="row">
							<div class="col-md-6 text-center mx-auto mb-2 t-azul"><h5>Sr./Sra. {{ $paciente }}</h5></div>
						</div>
                        @endif
						<div class="row mt-2">
                            <div class="col-md-6 text-center mx-auto mb-2 t-azul"><h2>{{ $mensaje }}</h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--CIERRE CONTENIDO-->

	<script src="{{ asset('js/query-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/aos.js') }}"></script>


</body>
</html>
