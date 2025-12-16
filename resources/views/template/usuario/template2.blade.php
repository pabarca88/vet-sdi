<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema || Redmedichile</title>
    
    <!-- Styles -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?t={{ time() }}" />
    <link rel="stylesheet" href="{{ asset('/css/ficha_medica_unica.css') }}?t={{ time() }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/plugins/responsive.bootstrap4.min.css') }}"/>
    
    <style type="text/css">
        .auth-wrapper{
            background-size: cover;
            background-image: url(../assets/images/background_4.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .bs-example{
        margin: 20px;
    }
    .accordion .fa{
        margin-right: 0.5rem;
      	font-size: 24px;
      	font-weight: bold;
        position: relative;
    	top: 2px;
    }
    </style>
    @yield('page-styles')
    
</head>
<body>
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill">
            </div>
        </div>
    </div>
    
    
    @yield('content')   

    

    @include('template.include.nocomplatible')
    <!-- Scripts -->
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/ripple.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>
    <!--<script src="../assets/js/menu-setting.min.js"></script>-->
    <script src="{{ asset('js/plugins/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-basic-custom.js') }}"></script>

    @yield('page-script')  
    <script>
        $(document).ready(function(){
            // Add down arrow icon for collapse element which is open by default
            $(".collapse.show").each(function(){
                $(this).prev(".card-header").find(".fa").addClass("fa-angle-down").removeClass("fa-angle-right");
            });
            
            // Toggle right and down arrow icon on show hide of collapse element
            $(".collapse").on('show.bs.collapse', function(){
                $(this).prev(".card-header").find(".fa").removeClass("fa-angle-right").addClass("fa-angle-down");
            }).on('hide.bs.collapse', function(){
                $(this).prev(".card-header").find(".fa").removeClass("fa-angle-down").addClass("fa-angle-right");
            });
        });
    </script>
</body>
</html>