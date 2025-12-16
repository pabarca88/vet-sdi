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
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center mx-auto mb-2 text-white">
                                <h3 class="text-white">VALIDADOR DE DOCUMENTOS</h3>
                            </div>
                        </div>

                        {{-- <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-8 col-xl-6 text-center mx-auto mb-2 text-white">
                                <p>{{ $mensaje }}</p>
                            </div>
                        </div> --}}

                        @if ($card_informacion)
                            {!! $card_informacion !!}
                        @endif

                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center mx-auto mb-2 text-white"><p>En esta sección podrás acceder a la validación para comprobar autenticidad de nuestros documentos.</p></div>
						</div>

                        <div class="row">
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4 mx-auto text-center">
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_certificado();">Validar Certificado de Documento</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_firma_documento();">Validar Firma del Profesional</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_fecha_documento();">Validar Fecha Elaboración</button>

								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_paciente_documento();">Validar Paciente</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_validar_profesional_documento();">Validar Profesional</button>
								<button type="button" class="btn btn-modal-validar btn-lg btn-block" onclick="abrir_denuncia_documento_falso();">Hacer denuncia de Documento Falso</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

        @include('documento_validacion.modal.certificado')
        @include('documento_validacion.modal.firma')
        @include('documento_validacion.modal.fecha')
        {{-- @include('documento_validacion.modal.estado_documento') --}}
        @include('documento_validacion.modal.paciente')
        @include('documento_validacion.modal.profesional')
        @include('documento_validacion.modal.denuncia_documento_falso')

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
