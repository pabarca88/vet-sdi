<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema || Redmedichile</title>
    <!--[if lt IE 11]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">

    <!-- Formularios sm -->
    <link rel="stylesheet" href="{{ asset('css/formulario_sm.css') }}?t={{ time() }}">
</head>
<style type="text/css">
    .auth-wrapper {
        background-size: cover;
        background-image: url('{{ asset('images/background_5.jpg') }}');
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>

<body>

    <div class="auth-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto ">
                    <!--Ingreso a Atención profesional no inscrito-->
                    <div class="card lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="{{ asset('images/iconos/p_no_inscrito.svg') }}" alt=""
                                        class="img-fluid mb-3 wid-60">
                                    <h5 class="text-info">Atención de profesional no registrado</h5>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Este link de Atención para profesional invitado ya fue utilizado.</h3>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Cierre: Ingreso a Atención profesional no inscrito-->
            </div>
        </div>
    </div>

    </div>

    @include('template.include.nocomplatible')

    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
</body>

</html>
