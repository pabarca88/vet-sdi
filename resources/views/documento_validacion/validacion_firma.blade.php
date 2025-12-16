<!DOCTYPE html>
<html lang="es">
<head>
	@include('documento_validacion.include.head')
</head>
<style type="text/css">
	body {
        background-image: url('{{ asset("images/documento/background_valid.jpg") }}');
        background-repeat: no-repeat;
  		background-size: auto;
	}

	.alin-centro {
        margin-top: 2%;
        margin-bottom: 2%;
    }

    .btn-modal-validar {
        color: #1a49a3;
        border-radius: 10px;
        background-color: #fff;
        text-align: left;
        padding: 10px 30px;
        font-size: 0.9rem;
        font-weight: 600;
    }
</style>
<body>

	@include('documento_validacion.include.header')

	<!--CONTENIDO-->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alin-centro align-content-center">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 text-center mb-4">
								<img src="{{ asset("images/documento/medichile-logo-w.svg") }}" width="150" alt="Medichile">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center mx-auto mb-2 text-white"><h3>VALIDADOR DE FIRMA</h3></div>
                        </div>

                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center mx-auto mb-2 text-white">
                                <p>{{ $mensaje }}</p>
                            </div>
                        </div>

                        @if ($card_informacion)
                            {!! $card_informacion !!}
                        @endif
                        {{-- <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mx-auto mb-2 text-white">

                                <div class="card" style="color: #000;">
                                    <div class="card-head text-center ">
                                        <h5 class="card-title">Validación QR de Documento</h5>
                                    </div>
                                    <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-muted text-center ">Valido</h6>
                                        <p class="card-text text-center ">Información del documento:</p>

                                        <ul style="list-style: none;">
                                            <li style="margin-bottom: 5px;">Tipo: Receta</li>
                                            <li style="margin-bottom: 5px;">Fecha: 12-11-2023</li>
                                            <li style="margin-bottom: 5px;">Paciente: demo demo </li>
                                            <li style="margin-bottom: 5px;">Profesional: j kriman</li>
                                            <li style="margin-bottom: 5px;">Cantidad Item: 1 </li>
                                            <li style="margin-bottom: 5px;"><button type="button" class="btn btn-success btn-sm">Ver Documento</button></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div> --}}

                        {{-- <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center mx-auto mb-2 text-white"><p>En esta sección podrás acceder a la validación para comprobar autenticidad de nuestros documentos.</div>
						</div> --}}
						{{-- <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mx-auto text-center">
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar certificado</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar firma</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar fecha</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar estado de documento</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar nombre de paciente</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block">Validar nombre de profesional</button>
							</div>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--CIERRE CONTENIDO-->

	<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/popper.min.js') }}"></script>
	<script src="{{ asset('js/aos.js') }}"></script>

    <script>

    </script>

</body>
</html>
