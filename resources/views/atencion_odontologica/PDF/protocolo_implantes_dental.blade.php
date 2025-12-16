<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $titulo }}</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
</head>
@include('PDF.header')
@include('PDF.footer')
<main>
    @if(isset($nombre_cir_nuevo) && $nombre_cir_nuevo != '')
        <p><strong>Cirujano Nuevo:</strong> {{ $nombre_cir_nuevo }}</p>
    @endif
    @if(isset($nombre_tons) && $nombre_tons != '')
        <p><strong>Tons:</strong> {{ $nombre_tons }}</p>
    @endif
    @if(isset($nombre_anest) && $nombre_anest != '')
        <p><strong>Anestesista:</strong> {{ $nombre_anest }}</p>
    @endif
    @if(isset($nombre_ars) && $nombre_ars != '')
        <p><strong>Arsenalera:</strong> {{ $nombre_ars }}</p>
    @endif
    <p><strong>Implantes:</strong> {{ $implantes }}</p>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            @foreach ($insumos_array as $implante)
                <tr>
                    <td>{{ $implante['insumos'] }}</td>
                    <td>{{ $implante['nombre_marca'] }}</td>
                    <td>{{ $implante['cantidad'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Forma del Material:</strong> {{ $forma_mat_impl }}</p>
    <p><strong>Prótesis sobre Implante:</strong> {{ $prot_prot_corona }}</p>
    <p><strong>Detalles de Cirugía:</strong> {{ $det_cir }}</p>
    <p><strong>Material de Toma de Impresión:</strong> {{ $nombre_tons }}</p>
    <p><strong>Piezas Implantadas:</strong></p>
    <div>
        @foreach ($prot_pieza_imp as $pieza)
            <span style="margin-right: 10px;">{{ $pieza }}</span>
        @endforeach
    </div>
</main>
</html>
