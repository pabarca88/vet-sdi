<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>{{ $titulo }}</title>
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <div class="texto-vertical-2">Este documento lo puedes validar en www.med-sdi.cl - Cód. Indetificador {{ $cuerpo['array_ficha_atencion']['token'] }}</div>

    @include('PDF.header')
    @include('PDF.footer')

    <main>
        @foreach ($cuerpo['detalle_orden'] as $key =>$detalle)
            @if($loop->count == 1)
            <div class="contenido-body" style="page-break-after: auto;">
            @else
                @if ($cuerpo['cantidad_recetas'] == $loop->iteration)
                <div class="contenido-body" style="page-break-after: avoid;">
                @else
                <div class="contenido-body" style="page-break-after: always;">
                @endif
            @endif

                <!--Inicio de información-->
                <h4 class="text-blue">Ruego practicar los siguientes examenes:</h4>
                {{-- <h5 class="text-blue text-center">{{ $key }}</h5> --}}
                <table class="tabla-receta">
                    <thead>
                        <tr class="t-gris">
                            <th style="text-align: left;">Examen</th>
                            <th style="text-align: left;">Prioridad</th>
                            <th style="text-align: left;">Código:</th>
                        </tr>
                    </thead>
                    <tbody>

                            @foreach ($detalle as $examenes)

                                {{--
                                prioridad
                                examen
                                tipo_examen
                                --}}
                                <tr>
                                    <td>
                                        <strong>{{ $examenes['examen'] }}</strong>
                                        @if(!empty($examenes['otro']))
                                            <br/><span><strong>{{ $examenes['otro'] }}</strong></span>
                                        @endif
                                        @if($examenes['contraste'] == 1)
                                            <br/><span><strong>Con Contraste</strong></span>
                                        @endif
                                    </td>
                                    <td>{{ $examenes['prioridad'] }}</td>
                                    @if(isset($examenes['codigo']) && $examenes['codigo']!= 'NULL' )
                                        <td>Codigo:{{ $examenes['codigo'] }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </main>
</html>

