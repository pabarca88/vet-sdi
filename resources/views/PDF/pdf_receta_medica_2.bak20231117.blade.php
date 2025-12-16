
{{-- 1	Receta retenida con control de Psicotrópicos --}}
{{-- 2	Receta retenida con control de Estupefacientes --}}
{{-- 3	Receta Cheque --}}
{{-- 4	Receta retenida --}}
{{-- 5	Receta retenida con control de Codeína --}}
{{-- 6	Receta Simple --}}
{{-- 7	Venta Directa --}}
{{-- 8	Magistral --}}

@foreach ($cuerpo['recomendacion'] as $receta )
    @php
        $control_libre = array(0,4,6,7);
        $control_controlado = array(0,1,2,3,5);
        $control_magistral = array(0,8);

        // echo 'id_ receta: ';
        // echo ($receta->id);
        // echo '<br/>id_control: ';
        // echo ($receta->control);
        // echo '<br/>control_libre: ';
        // // echo (array_search($receta->control, $control_libre));
        // echo (in_array($receta->control, $control_libre));
        // echo '<br/>control_controlado:';
        // echo (array_search($receta->control, $control_controlado));
        // echo '<br/>cant_detalle: ';
        // echo (count($receta->detalle));
        // echo '<br/>';
        // echo ('******************<br>');
        // die();
    @endphp

    @if ( in_array($receta->control, $control_libre) )
        {{-- {{ $receta->control }} - libre <br/> --}}

        {{-- RECETA LIBRE --}}
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>{{ $titulo }}</title>
                <style>
                    /*Tipografía*/
                    @font-face {
                        font-family: 'Poppins';
                        src:
                        local("Poppins"),
                        url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
                        url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
                        url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
                        url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
                        font-style: bold;
                        font-weight: 600;
                    }

                    @font-face {
                        font-family: 'Poppins';
                        src:
                        local("Poppins"),
                        url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
                        url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
                        url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
                        url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
                        font-style: regular;
                        font-weight: 400;
                    }

                    h1, h2, h3, h4, h5, h6, span, p, td, th{
                        font-family: Poppins, sans-serif;
                    }

                    h1 {
                        text-align: center;
                        text-transform: uppercase;
                    }

                    span {
                        text-transform: uppercase;
                    }

                    /*Tablas*/
                    table {
                        width: 100%;
                    }

                    .tabla-receta table {
                        font-size: 1rem;
                    }

                    .tabla-receta thead {
                        background-color: #FAFAFA;
                        font-size: 0.7rem;
                    }

                    .tabla-receta td, th{
                        padding: 10px 15px;
                    }

                    .tabla-receta tbody{
                        font-size: 0.7rem;
                    }

                    .tabla-receta tbody tr:nth-child(odd) {
                        background-color: #fff
                    }

                    .tabla-receta tbody tr:nth-child(even) {
                        background-color: #FAFAFA;
                    }

                    .tabla-receta tr {
                        padding: 10px;
                    }

                    hr {
                        border: 1px solid #3C63AD;
                        margin-bottom: 0.5rem !important;
                        margin-top: 0.5rem !important;
                    }

                    /*Margin*/
                    .mb-5 {
                        margin-bottom: 2rem;
                    }

                    .mt-3 {
                        margin-top: 1.2rem;
                    }

                    /*Padding*/
                    .pl-3{
                        padding-left: 1.4rem;
                    }

                    .pr-3{
                        padding-right: 1.4rem;
                    }

                    /*Colors*/
                    .text-blue {
                        color: #3C63AD;
                    }

                    .text-gray {
                        color: #FAFAFA;
                    }

                    .text-gray {
                        background-color: #FAFAFA;
                    }

                    /*Contenedores*/
                    .contenido-encabezado-uno{
                        /* font-size: 0.9rem; */
                        /* width: 1000px; */
                        height: 124px;
                        margin: auto;
                        margin-bottom: 0;
                    }

                    .contenido-encabezado-dos{
                        font-size: 0.8rem;
                        /* width: 1000px; */
                        height: 110px;
                        margin: auto;
                        padding-right: 1rem;
                        padding-left: 1rem;
                    }


                    .contenido-body {
                        margin: auto;
                        padding-right: 1rem;
                        padding-left: 1rem;
                            /* width: 1000px; */
                        /* height: 1000px; */
                    }

                    .contenido-footer{
                        font-size: 0.8rem;
                        /* align-item: flex-end; */
                        /* width: 1000px; */
                        height: 150px;
                        /* margin: auto; */
                        margin: auto;
                    }


                    .contenido-infoprof{
                        float: right;
                        height: auto;
                        line-height: 3px;
                        font-size: 0.7rem;
                        margin-top: 10px;
                        padding-top: 5px;
                        padding-right: 100px;
                        padding-left: 10px;
                        width: auto;
                        border-left: 4px solid #3366CC;
                    }

                    .contenido-logo {
                        float: left;
                        vertical-align: middle;
                        width: 150px;
                        height: auto;
                        padding-top: 28px;
                    }

                    /*Otros*/

                    .logo {
                        width: 200px;
                        padding-left: 80px;
                    }

                    img {
                        align-items: center;
                        width: 18%;
                    }

                    .centrar {
                        text-align: center;
                    }

                    .text-center {
                        text-align: center;
                    }

                    @page {
                        margin: 285px 30px 160px 30px ;
                    }

                    header {
                        position: fixed;
                        top: -285px;
                        left: 0px;
                        right: 0px;
                        height: 25085;
                    }

                    footer {
                        position: fixed;
                        bottom: -100px;
                        left: 0px;
                        right: 0px;
                        height: 150px;
                    }

                    .texto-vertical-2 {
                        font-size: 0.75em;
                        position: fixed;
                        writing-mode: vertical-lr;
                        transform: rotate(270deg);
                        /* right: -320px; */
                        right: -300px;
                        top: 400px;
                        font-family: Poppins;
                    }
                    .fecha{
                        font-size: 0.9rem;
                        text-align: right;
                        font-family: Poppins;
                    }
                    .div-qr{
                        border: 4px solid #3366CC;
                        border-radius: 10px ;
                        width: 90px;
                        margin: auto;
                        padding: 2px;
                    }

                </style>
            </head>
            <body>
                @include('PDF.header_2')
                @include('PDF.footer_2')
                <main>
                    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $receta->qr->token }}</div>
                    <div class="contenido-body" style="page-break-after: auto;">
                        {{-- <h1>* - {{ $receta->id }} - {{ $receta->control }}</h1> --}}
                        <table class="tabla-receta">
                            <thead>
                                <tr class="t-gris">
                                    <th style="text-align: left;">Medicamento</th>
                                    <th style="text-align: left;">Posología</th>
                                    <th style="text-align: left;">Tratamiento por:</th>
                                    <th style="text-align: left;">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receta->detalle as $detalle )
                                    <tr>
                                        {{-- <td style="text-align: left;">{{ $detalle['id_tipo_control'] }}<strong>{{ $detalle['producto'] }}</strong> {{ $detalle['farmaco'] }}</td> --}}
                                        <td style="text-align: left;"><strong>{{ $detalle['producto'] }}</strong> {{ $detalle['farmaco'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['posologia'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['periodo'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['cantidad_compra'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </body>
        </html>

    @elseif ( in_array($receta->control, $control_magistral) )

        {{-- MAGISTRAL NORMAL --}}
        @foreach ($receta->detalle as $detalle )

            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <title>{{ $titulo }}</title>
                    <style>
                        /*Tipografía*/
                        @font-face {
                            font-family: 'Poppins';
                            src:
                            local("Poppins"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
                            font-style: bold;
                            font-weight: 600;
                        }

                        @font-face {
                            font-family: 'Poppins';
                            src:
                            local("Poppins"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
                            font-style: regular;
                            font-weight: 400;
                        }

                        h1, h2, h3, h4, h5, h6, span, p, td, th{
                            font-family: Poppins, sans-serif;
                        }

                        h1 {
                            text-align: center;
                            text-transform: uppercase;
                        }

                        span {
                            text-transform: uppercase;
                        }

                        /*Tablas*/
                        table {
                            width: 100%;
                        }

                        .tabla-receta table {
                            font-size: 1rem;
                        }

                        .tabla-receta thead {
                            background-color: #FAFAFA;
                            font-size: 0.7rem;
                        }

                        .tabla-receta td, th{
                            padding: 10px 15px;
                        }

                        .tabla-receta tbody{
                            font-size: 0.7rem;
                        }

                        .tabla-receta tbody tr:nth-child(odd) {
                            background-color: #fff
                        }

                        .tabla-receta tbody tr:nth-child(even) {
                            background-color: #FAFAFA;
                        }

                        .tabla-receta tr {
                            padding: 10px;
                        }

                        hr {
                            border: 1px solid #3C63AD;
                            margin-bottom: 0.5rem !important;
                            margin-top: 0.5rem !important;
                        }

                        /*Margin*/
                        .mb-5 {
                            margin-bottom: 2rem;
                        }

                        .mt-3 {
                            margin-top: 1.2rem;
                        }

                        /*Padding*/
                        .pl-3{
                            padding-left: 1.4rem;
                        }

                        .pr-3{
                            padding-right: 1.4rem;
                        }

                        /*Colors*/
                        .text-blue {
                            color: #3C63AD;
                        }

                        .text-gray {
                            color: #FAFAFA;
                        }

                        .text-gray {
                            background-color: #FAFAFA;
                        }

                        /*Contenedores*/
                        .contenido-encabezado-uno{
                            /* font-size: 0.9rem; */
                            /* width: 1000px; */
                            height: 124px;
                            margin: auto;
                            margin-bottom: 0;
                        }

                        .contenido-encabezado-dos{
                            font-size: 0.8rem;
                            /* width: 1000px; */
                            height: 110px;
                            margin: auto;
                            padding-right: 1rem;
                            padding-left: 1rem;
                        }


                        .contenido-body {
                            margin: auto;
                            padding-right: 1rem;
                            padding-left: 1rem;
                                /* width: 1000px; */
                            /* height: 1000px; */
                        }

                        .contenido-footer{
                            font-size: 0.8rem;
                            /* align-item: flex-end; */
                            /* width: 1000px; */
                            height: 150px;
                            /* margin: auto; */
                            margin: auto;
                        }


                        .contenido-infoprof{
                            float: right;
                            height: auto;
                            line-height: 3px;
                            font-size: 0.7rem;
                            margin-top: 10px;
                            padding-top: 5px;
                            padding-right: 100px;
                            padding-left: 10px;
                            width: auto;
                            border-left: 4px solid #3366CC;
                        }

                        .contenido-logo {
                            float: left;
                            vertical-align: middle;
                            width: 150px;
                            height: auto;
                            padding-top: 28px;
                        }

                        /*Otros*/

                        .logo {
                            width: 200px;
                            padding-left: 80px;
                        }

                        img {
                            align-items: center;
                            width: 18%;
                        }

                        .centrar {
                            text-align: center;
                        }

                        .text-center {
                            text-align: center;
                        }

                        @page {
                            margin: 285px 30px 160px 30px ;
                        }

                        header {
                            position: fixed;
                            top: -285px;
                            left: 0px;
                            right: 0px;
                            height: 25085;
                        }

                        footer {
                            position: fixed;
                            bottom: -100px;
                            left: 0px;
                            right: 0px;
                            height: 150px;
                        }

                        .texto-vertical-2 {
                            font-size: 0.75em;
                            position: fixed;
                            writing-mode: vertical-lr;
                            transform: rotate(270deg);
                            /* right: -320px; */
                            right: -300px;
                            top: 400px;
                            font-family: Poppins;
                        }
                        .fecha{
                            font-size: 0.9rem;
                            text-align: right;
                            font-family: Poppins;
                        }
                        .div-qr{
                            border: 4px solid #3366CC;
                            border-radius: 10px ;
                            width: 90px;
                            margin: auto;
                            padding: 2px;
                        }

                    </style>
                </head>
                <body>
                    @include('PDF.header_2')
                    @include('PDF.footer_2')
                    <main>
                        <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $receta->qr->token }}</div>
                        <div class="contenido-body" style="page-break-after: auto;">
                            {{-- <h1>** - {{ $receta->id }} - {{ $receta->control }}</h1> --}}
                            <table class="tabla-receta">
                                {{-- MAGISTRAL CON COMPONENTE SIMPLES--}}
                                <thead>
                                    <tr class="t-gris">
                                        <th style="text-align: left;">Compuestos</th>
                                        <th style="text-align: left;">Presentación</th>
                                        <th style="text-align: left;">CSP</th>
                                        <th style="text-align: left;">Posologia</th>
                                        <th style="text-align: left;">Via Adm.</th>
                                        <th style="text-align: left;">Periodo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $json_producto = json_decode($detalle['producto']);

                                        $texto_producto = '';
                                        // $texto_producto .= '<ul>';
                                        foreach ($json_producto as $key => $value)
                                        {
                                            // $texto_producto .='<li><strong>'.$value->nombre.':</strong> '.$value->cantidad.'</li>';
                                            $texto_producto .='<strong>'.$value->nombre.':</strong> '.$value->cantidad.'<br/>';
                                        }
                                        // $texto_producto .= '</ul>';
                                    @endphp
                                    <tr>
                                        <td style="text-align: left;">{!! $texto_producto !!}</td>
                                        <td style="text-align: left;">{{ $detalle['presentacion'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['cantidad_compra'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['posologia'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['via_administracion'] }}</td>
                                        <td style="text-align: left;">{{ $detalle['periodo'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </main>
                </body>
            </html>

        @endforeach

    @else

        {{-- RECETA CONTROLADA --}}
        {{-- {{ $receta->control }} - controlada <br/> --}}
        @foreach ($receta->detalle as $detalle )

            <!DOCTYPE html>
            <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <title>{{ $titulo }}</title>
                    <style>
                        /*Tipografía*/
                        @font-face {
                            font-family: 'Poppins';
                            src:
                            local("Poppins"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
                            url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
                            font-style: bold;
                            font-weight: 600;
                        }

                        @font-face {
                            font-family: 'Poppins';
                            src:
                            local("Poppins"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
                            url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
                            font-style: regular;
                            font-weight: 400;
                        }

                        h1, h2, h3, h4, h5, h6, span, p, td, th{
                            font-family: Poppins, sans-serif;
                        }

                        h1 {
                            text-align: center;
                            text-transform: uppercase;
                        }

                        span {
                            text-transform: uppercase;
                        }

                        /*Tablas*/
                        table {
                            width: 100%;
                        }

                        .tabla-receta table {
                            font-size: 1rem;
                        }

                        .tabla-receta thead {
                            background-color: #FAFAFA;
                            font-size: 0.7rem;
                        }

                        .tabla-receta td, th{
                            padding: 10px 15px;
                        }

                        .tabla-receta tbody{
                            font-size: 0.7rem;
                        }

                        .tabla-receta tbody tr:nth-child(odd) {
                            background-color: #fff
                        }

                        .tabla-receta tbody tr:nth-child(even) {
                            background-color: #FAFAFA;
                        }

                        .tabla-receta tr {
                            padding: 10px;
                        }

                        hr {
                            border: 1px solid #3C63AD;
                            margin-bottom: 0.5rem !important;
                            margin-top: 0.5rem !important;
                        }

                        /*Margin*/
                        .mb-5 {
                            margin-bottom: 2rem;
                        }

                        .mt-3 {
                            margin-top: 1.2rem;
                        }

                        /*Padding*/
                        .pl-3{
                            padding-left: 1.4rem;
                        }

                        .pr-3{
                            padding-right: 1.4rem;
                        }

                        /*Colors*/
                        .text-blue {
                            color: #3C63AD;
                        }

                        .text-gray {
                            color: #FAFAFA;
                        }

                        .text-gray {
                            background-color: #FAFAFA;
                        }

                        /*Contenedores*/
                        .contenido-encabezado-uno{
                            /* font-size: 0.9rem; */
                            /* width: 1000px; */
                            height: 124px;
                            margin: auto;
                            margin-bottom: 0;
                        }

                        .contenido-encabezado-dos{
                            font-size: 0.8rem;
                            /* width: 1000px; */
                            height: 110px;
                            margin: auto;
                            padding-right: 1rem;
                            padding-left: 1rem;
                        }


                        .contenido-body {
                            margin: auto;
                            padding-right: 1rem;
                            padding-left: 1rem;
                                /* width: 1000px; */
                            /* height: 1000px; */
                        }

                        .contenido-footer{
                            font-size: 0.8rem;
                            /* align-item: flex-end; */
                            /* width: 1000px; */
                            height: 150px;
                            /* margin: auto; */
                            margin: auto;
                        }


                        .contenido-infoprof{
                            float: right;
                            height: auto;
                            line-height: 3px;
                            font-size: 0.7rem;
                            margin-top: 10px;
                            padding-top: 5px;
                            padding-right: 100px;
                            padding-left: 10px;
                            width: auto;
                            border-left: 4px solid #3366CC;
                        }

                        .contenido-logo {
                            float: left;
                            vertical-align: middle;
                            width: 150px;
                            height: auto;
                            padding-top: 28px;
                        }

                        /*Otros*/

                        .logo {
                            width: 200px;
                            padding-left: 80px;
                        }

                        img {
                            align-items: center;
                            width: 18%;
                        }

                        .centrar {
                            text-align: center;
                        }

                        .text-center {
                            text-align: center;
                        }

                        @page {
                            margin: 285px 30px 160px 30px ;
                        }

                        header {
                            position: fixed;
                            top: -285px;
                            left: 0px;
                            right: 0px;
                            height: 25085;
                        }

                        footer {
                            position: fixed;
                            bottom: -100px;
                            left: 0px;
                            right: 0px;
                            height: 150px;
                        }

                        .texto-vertical-2 {
                            font-size: 0.75em;
                            position: fixed;
                            writing-mode: vertical-lr;
                            transform: rotate(270deg);
                            /* right: -320px; */
                            right: -300px;
                            top: 400px;
                            font-family: Poppins;
                        }
                        .fecha{
                            font-size: 0.9rem;
                            text-align: right;
                            font-family: Poppins;
                        }
                        .div-qr{
                            border: 4px solid #3366CC;
                            border-radius: 10px ;
                            width: 90px;
                            margin: auto;
                            padding: 2px;
                        }

                    </style>
                </head>
                <body>
                    @include('PDF.header_2')
                    @include('PDF.footer_2')
                    <main>
                        <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $receta->qr->token }}</div>
                        <div class="contenido-body" style="page-break-after: auto;">
                            {{-- <h1>*** - {{ $receta->id }} - {{ $receta->control }} - {{ $detalle['id_tipo_control'] }}</h1> --}}
                            <table class="tabla-receta">
                                @if ($detalle['id_tipo_control'] == 8)
                                    {{-- MAGISTRAL CON COMPONENTE CON CONTROL--}}
                                    <thead>
                                        <tr class="t-gris">
                                            <th style="text-align: left;">Compuestos</th>
                                            <th style="text-align: left;">Presentación</th>
                                            <th style="text-align: left;">CSP</th>
                                            <th style="text-align: left;">Posologia</th>
                                            <th style="text-align: left;">Via Adm.</th>
                                            <th style="text-align: left;">Periodo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $json_producto = json_decode($detalle['producto']);

                                            $texto_producto = '';
                                            // $texto_producto .= '<ul>';
                                            foreach ($json_producto as $key => $value)
                                            {
                                                // $texto_producto .='<li><strong>'.$value->nombre.':</strong> '.$value->cantidad.'</li>';
                                                $texto_producto .='<strong>'.$value->nombre.':</strong> '.$value->cantidad.'<br/>';
                                            }
                                            // $texto_producto .= '</ul>';
                                        @endphp
                                        <tr>
                                            <td style="text-align: left;">{!! $texto_producto !!}</td>
                                            <td style="text-align: left;">{{ $detalle['presentacion'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['cantidad_compra'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['posologia'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['via_administracion'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['periodo'] }}</td>
                                        </tr>
                                    </tbody>
                                @else
                                    {{-- MEDICAMENTO CON CONTROL --}}
                                    <thead>
                                        <tr class="t-gris">
                                            <th style="text-align: left;">Medicamento</th>
                                            <th style="text-align: left;">Posología</th>
                                            <th style="text-align: left;">Tratamiento por:</th>
                                            <th style="text-align: left;">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <td style="text-align: left;">{{ $detalle['id_tipo_control'] }}<strong>{{ $detalle['producto'] }}</strong> {{ $detalle['farmaco'] }}</td> --}}
                                            <td style="text-align: left;"><strong>{{ $detalle['producto'] }}</strong> {{ $detalle['farmaco'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['posologia'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['periodo'] }}</td>
                                            <td style="text-align: left;">{{ $detalle['cantidad_compra'] }}</td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>

                        </div>
                    </main>
                </body>
            </html>

        @endforeach

    @endif


@endforeach


@if ($cuerpo['recetaAudifonos'])

    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>{{ $titulo }}</title>
            <style>
                /*Tipografía*/
                @font-face {
                    font-family: 'Poppins';
                    src:
                    local("Poppins"),
                    url("{{ asset('fonts/Poppins/Poppins-Bold.woff2') }}") format("woff2"),
                    url("{{ asset('fonts/Poppins/Poppins-Bold.woff') }}") format("woff"),
                    url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("truetype"),
                    url("{{ asset('fonts/Poppins/Poppins-Bold.ttf') }}") format("opentype");
                    font-style: bold;
                    font-weight: 600;
                }

                @font-face {
                    font-family: 'Poppins';
                    src:
                    local("Poppins"),
                    url("{{ asset('fonts/Poppins/Poppins-Regular.woff2') }}") format("woff2"),
                    url("{{ asset('fonts/Poppins/Poppins-Regular.woff') }}") format("woff"),
                    url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("truetype"),
                    url("{{ asset('fonts/Poppins/Poppins-Regular.ttf') }}") format("opentype");
                    font-style: regular;
                    font-weight: 400;
                }

                h1, h2, h3, h4, h5, h6, span, p, td, th{
                    font-family: Poppins, sans-serif;
                }

                h1 {
                    text-align: center;
                    text-transform: uppercase;
                }

                span {
                    text-transform: uppercase;
                }

                /*Tablas*/
                table {
                    width: 100%;
                }

                .tabla-receta table {
                    font-size: 1rem;
                }

                .tabla-receta thead {
                    background-color: #FAFAFA;
                    font-size: 0.7rem;
                }

                .tabla-receta td, th{
                    padding: 10px 15px;
                }

                .tabla-receta tbody{
                    font-size: 0.7rem;
                }

                .tabla-receta tbody tr:nth-child(odd) {
                    background-color: #fff
                }

                .tabla-receta tbody tr:nth-child(even) {
                    background-color: #FAFAFA;
                }

                .tabla-receta tr {
                    padding: 10px;
                }

                hr {
                    border: 1px solid #3C63AD;
                    margin-bottom: 0.5rem !important;
                    margin-top: 0.5rem !important;
                }

                /*Margin*/
                .mb-5 {
                    margin-bottom: 2rem;
                }

                .mt-3 {
                    margin-top: 1.2rem;
                }

                /*Padding*/
                .pl-3{
                    padding-left: 1.4rem;
                }

                .pr-3{
                    padding-right: 1.4rem;
                }

                /*Colors*/
                .text-blue {
                    color: #3C63AD;
                }

                .text-gray {
                    color: #FAFAFA;
                }

                .text-gray {
                    background-color: #FAFAFA;
                }

                /*Contenedores*/
                .contenido-encabezado-uno{
                    /* font-size: 0.9rem; */
                    /* width: 1000px; */
                    height: 124px;
                    margin: auto;
                    margin-bottom: 0;
                }

                .contenido-encabezado-dos{
                    font-size: 0.8rem;
                    /* width: 1000px; */
                    height: 110px;
                    margin: auto;
                    padding-right: 1rem;
                    padding-left: 1rem;
                }


                .contenido-body {
                    margin: auto;
                    padding-right: 1rem;
                    padding-left: 1rem;
                        /* width: 1000px; */
                    /* height: 1000px; */
                }

                .contenido-footer{
                    font-size: 0.8rem;
                    /* align-item: flex-end; */
                    /* width: 1000px; */
                    height: 150px;
                    /* margin: auto; */
                    margin: auto;
                }


                .contenido-infoprof{
                    float: right;
                    height: auto;
                    line-height: 3px;
                    font-size: 0.7rem;
                    margin-top: 10px;
                    padding-top: 5px;
                    padding-right: 100px;
                    padding-left: 10px;
                    width: auto;
                    border-left: 4px solid #3366CC;
                }

                .contenido-logo {
                    float: left;
                    vertical-align: middle;
                    width: 150px;
                    height: auto;
                    padding-top: 28px;
                }

                /*Otros*/

                .logo {
                    width: 200px;
                    padding-left: 80px;
                }

                img {
                    align-items: center;
                    width: 18%;
                }

                .centrar {
                    text-align: center;
                }

                .text-center {
                    text-align: center;
                }

                @page {
                    margin: 285px 30px 160px 30px ;
                }

                header {
                    position: fixed;
                    top: -285px;
                    left: 0px;
                    right: 0px;
                    height: 25085;
                }

                footer {
                    position: fixed;
                    bottom: -100px;
                    left: 0px;
                    right: 0px;
                    height: 150px;
                }

                .texto-vertical-2 {
                    font-size: 0.75em;
                    position: fixed;
                    writing-mode: vertical-lr;
                    transform: rotate(270deg);
                    /* right: -320px; */
                    right: -300px;
                    top: 400px;
                    font-family: Poppins;
                }
                .fecha{
                    font-size: 0.9rem;
                    text-align: right;
                    font-family: Poppins;
                }
                .div-qr{
                    border: 4px solid #3366CC;
                    border-radius: 10px ;
                    width: 90px;
                    margin: auto;
                    padding: 2px;
                }

            </style>
        </head>
        <body>
            @include('PDF.header_2')
            @include('PDF.footer_2')
            <main>
                <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $receta->qr->token }}</div>
                <div class="contenido-body" style="page-break-after: auto;">
                    {{-- <h1>* - {{ $receta->id }} - {{ $receta->control }}</h1> --}}
                    <table class="tabla-receta">
                        <!-- <thead>
                            <tr class="t-gris">
                                <th style="text-align: left;">Medicamento</th>
                                <th style="text-align: left;">Posología</th>
                                <th style="text-align: left;">Tratamiento por:</th>
                                <th style="text-align: left;">Cantidad</th>
                            </tr>
                        </thead> -->
                        <tbody>
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>{{ $cuerpo['recetaAudifonos']['tipo'] }}</strong></td>
                                <td style="text-align: left; width: 80%;"></td>
                            </tr>
                            @if($cuerpo['recetaAudifonos']['od'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Oído Derecho</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $cuerpo['recetaAudifonos']['especificacion_od'] }}</td>
                            </tr>
                            @endif

                            @if($cuerpo['recetaAudifonos']['oi'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Oído izquierdo</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $cuerpo['recetaAudifonos']['especificacion_oi'] }}</td>
                            </tr>
                            @endif

                            @if($cuerpo['recetaAudifonos']['bi'])
                            <tr>
                                <td style="text-align: left; width: 20%;"><strong>Bilateral</strong></td>
                                <td style="text-align: left; width: 80%;">{{ $cuerpo['recetaAudifonos']['especificacion_bi'] }}</td>
                            </tr>
                            @endif

                            <tr>
                                <td style="text-align: left;"><strong>Recomendaciones Generales</strong></td>
                                <td style="text-align: left;">{{ $cuerpo['recetaAudifonos']['especificacion_general'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </body>
    </html>

@endif

