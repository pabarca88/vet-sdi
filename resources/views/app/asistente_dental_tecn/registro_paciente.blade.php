<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema || Redmedichile</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Redmedichile" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/bifurcador.css') }}?t={{ time() }}">
</head>


<body style="background-image: url({{ asset('images/background_2.jpg') }}); background-position: right bottom;background-size: cover; background-repeat: repeat; background-attachment: fixed;">
    <div class="container-fluid">
        <div class="row" style="margin-top: 7%;">
            <div class="col-md-12 text-center mb-5">
                <img class="wid-100" src="{{ asset('images/logo_pais_vertical.svg') }}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10  mx-auto py-auto">
                <div class="card-deck">
                    <div class="card text-center px-5 my-3 subir card-color" style="cursor: pointer;">
                        <a href="#">
                            <div class="card-body">
                                <img class="wid-85" src="{{ asset('images/iconos/registro_paciente.svg') }}" alt="">
                                <h4 class="card-title text-white mt-3 f-20">Registrar paciente en Medichile</h4>
                            </div>
                        </a>
                    </div>
                    <div class="card text-center py-auto px-5 my-3 subir card-color"  style="cursor: pointer;">
                        <a href="http://farmacronicos.cl/index.php?route=account/medicamento/guest">
                            <div class="card-body">
                                <img class="wid-85" src="{{ asset('images/iconos/medicamentos.svg') }}" alt="">
                                <h4 class="card-title text-white mt-3 f-20">Registrar paciente en Farmacrónicos</h4>
                            </div>
                        <a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-validation/jquery.validate.js') }}"></script>


</body>

</html>
