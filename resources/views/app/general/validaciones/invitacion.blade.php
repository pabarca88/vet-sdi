<!DOCTYPE html>
<html lang="es">

<head>
    <title>SDI</title>
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
    <meta name="author" content="SDI" />

    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}">


</head>

<body>
    <nav class="navbar navbar-light bg-light fixed-top">
  <a class="mx-auto d-block" href="#">
         <img class="wid-100" src="{{ asset('images/logo_pais_vertical.png') }}" alt="">
  </a>
</nav>
    <div class="auth-wrapper" style="background-color: #F4F4F4!important;">

    <div class="container-fluid">
        <div class="row">
            <!--<div class="col-md-12 text-center mb-4">
                <img class="wid-90" src="{{ asset('images/logo_pais_vertical.png') }}" alt="">
            </div>-->
            <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10 mx-auto">
                <div class="card" >
                    <div class="card-body text-center">
                        <img class="wid-90 mb-3" src="{{ asset('images/iconos/verificado.png') }}" alt="">
                        <h4>{!!$mensaje !!}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/ripple.js"></script>
    <script src="../assets/js/pcoded.min.js"></script>
    <script src="../assets/js/jquery-validation/jquery.validate.js"></script>
</body>

</html>
