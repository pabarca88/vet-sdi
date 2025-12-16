<!DOCTYPE html>
<html lang="es">

<head>
	@include('auth/include/head')

	<link rel="stylesheet" href="{{ asset('css/form-registro.css') }}">
	<link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}">
</head>

<body>
    <style type="text/css">
        .auth-wrapper {
            background-size: cover;
            background-image: url("{{ asset('images/background_1.jpg') }}");
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .es-invalido {
            border-color: #ff5252;
            padding-right: calc(1.5em + 1.25rem);
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.3125rem) center;
            background-size: calc(0.75em + 0.625rem) calc(0.75em + 0.625rem);
        }

        .error {
            color: red;
        }
    </style>

    <div class="auth-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6 col-md-6 mx-auto py-2">
					<div class="card">

						<div class="card-body text-center p-5">
                            <h4 class="mb-4 f-20">Descarga nuestra aplicación para telefonos Android</h4>
                            <div class="text-center">
                                <a href="{{ asset('app/download/sdipass.apk') }}">
                                    <img src="{{ asset('images/app_descarga/apk.png') }}" alt="logo_apk" class="img-fluid rounded" style="max-width: 160px;">
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-8 d-inline text-center mx-auto mt-5">
                                    <div class="text-center d-inline">
                                        <img src="{{ asset('images/app_descarga/google_play_logo.png') }}" alt="google_play_logo" class="img-fluid d-inline" width="150">
                                    </div>
                                    <div class="text-center d-inline">
                                        <img src="{{ asset('images/app_descarga/app_store_logo.png') }}" alt="app_store_logo" class="img-fluid d-inline" width="150">
                                    </div>
                                </div>
                            </div>
                            <!--<div class="mt-5" style="display: flex; flex-direction: row; flex-wrap: nowrap; justify-content: space-around; align-items: center;">

                                <div class="ml-1 mr-1 ">
                                    <div class="text-center">
                                        <img src="{{ asset('images/app_descarga/google_play_logo.png') }}" alt="google_play_logo" class="img-fluid" width="180">
                                    </div>
                                </div>
                                <div class="ml-1 mr-1">
                                    <div class="text-center">
                                        <img src="{{ asset('images/app_descarga/app_store_logo.png') }}" alt="app_store_logo" class="img-fluid" width="180">
                                    </div>
                                </div>
                            </div>-->
                        </div>
                	</div>
				</div>
                <div class="col-sm-6 col-md-6 mx-auto py-2">
					<div class="card">

						<div class="card-body text-center p-5">
                            <h4 class="mb-4 f-20">Instrucciones de instalación</h4>
                            <div>
                                <ul style="text-align: left">
                                    <li>Desde el computador:
                                        <ol>
                                            <li>Hacer click en "DESCARGAR".</li>
                                            <li>Espere que se complete la descarga.</li>
                                            <li>Debe abrir la carpeta donde se descargo el archivo.</li>
                                            <li>Abra WhatsApp desde el navegador.</li>
                                            <li>Envíe este archivo de WhatsApp a usted mismo o a otra persona.</li>
                                            <li>Ya en el celular descargue la aplicación.</li>
                                            <li>Al hacer click en ella se mostrará un mensaje de advertencia, confirme la apertura de la aplicación.</li>
                                            <li>Iniciara la instalación, confirme con Instalar.</li>
                                            <li>Su aplicación se encuentra lista para iniciar sesión.</li>
                                        </ol>

                                    </li>
                                    <li>
                                        Desde el celular:
                                        <ol>
                                            <li>Hacer click en "DESCARGAR".</li>
                                            <li>Espere que se complete la descarga.</li>
                                            <li>Debe abrir la carpeta donde se descargo el archivo.</li>
                                            <li>Ya en el celular descargue la aplicación.</li>
                                            <li>Al hacer click en ella se mostrará un mensaje de advertencia, confirme la apertura de la aplicación.</li>
                                            <li>Iniciara la instalación, confirme con Instalar.</li>
                                            <li>Su aplicación se encuentra lista para iniciar sesión.</li>
                                        </ol>
                                    </li>
                                </ul>
                            </div>
                        </div>
                	</div>
				</div>
			</div>
		</div>
	</div>
    <!--Cierre de Formulario-->

    @include('auth/include/nocomplatible')

    <!--Cierre de Footer-->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/rut.js') }}"></script>
    <script src="{{ asset('js/plugins/select2.full.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>

    <script src="{{ asset('js/login/registro.js') }}"></script>

    <script>

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
