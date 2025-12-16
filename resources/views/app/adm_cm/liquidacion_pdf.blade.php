<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }

    .title{
        text-align: center;
        margin-bottom: 10px;
    }

    #logo{
        text-align: center;
    }
    #logo img{
        width: 200px;
        margin-bottom: 10px;
    }
    .parent {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(4, 1fr);
        grid-column-gap: 10px;
        grid-row-gap: 0px;
    }
    table{
        width: 100%;
    }

    table thead{
        background: #eee;
    }

    table tr:last-child {
        background-color: #eee;
    }
</style>
<body>
    <div id="logo">
        <img src="{{ asset('images/logo_.png') }}" alt="logo">
    </div>

    <h2 class="title">Liquidación de sueldo al trabajador</h2>
    <div class="parent">
        <p><strong> Nombre de Empresa: </strong>{{ $liquidacion->nombre_institucion }} <strong>Rut Empresa: </strong>{{ $liquidacion->rut_institucion }}</p>
        <p><strong> Direccion: </strong>{{ $liquidacion->direccion_institucion }} <strong>Telefono: </strong>{{ $liquidacion->telefono_institucion }}</p>
        <p><strong> Ciudad: </strong>{{ $liquidacion->ciudad_institucion }}</p>
    </div>

    <div class="parent">
        <p><strong> Nombre de Trabajador:</strong> {{ $liquidacion->nombre }} {{ $liquidacion->apellido_uno }} {{ $liquidacion->apellido_dos }}</p>
        <p><strong> Direccion: </strong>{{ $liquidacion->direccion_profesional }} <strong>Telefono: </strong>{{ $liquidacion->telefono_uno }}</p>
        <p><strong> Ciudad: </strong>{{ $liquidacion->ciudad_profesional }}</p>
    </div>

    <table>
        <thead>
            <th scope="col">Deberes</th>
            <th scope="col">Descuentos</th>
        </thead>
        <tbody>
            <tr>
                <td><strong>Sueldo Base</strong> : ${{ number_format($liquidacion->monto_imponible,0,',','.') }}</td>
                <td><strong>AFP</strong>: {{ $liquidacion->descuentos }} % {{ number_format(($liquidacion->monto_imponible * $liquidacion->descuentos) / 100) }}</td>
            </tr>
            <tr>
                <td><strong>Gratificación legal</strong> : </td>
                <td><strong>Seg. censantía</strong>: </td>
            </tr>
            <tr>
                <td><strong>Bonos Producción</strong> : </td>
                <td><strong>Fonasa o Isapre</strong> : </td>
            </tr>
            <tr>
                <td><strong></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td><strong>Total Imponible</strong> : $ {{ number_format($liquidacion->monto_imponible,0,',','.') }}</td>
                <td><strong>Total Descuentos</strong> : $ {{ number_format(($liquidacion->monto_imponible * $liquidacion->descuentos) / 100) }} </td>
            </tr>
            <tr>
                <td><strong></strong></td>
                <td><strong></strong></td>
            </tr>
            <tr>
                <td>Asignación familiar : $0</td>
                <td>Cuota Préstamo : </td>
            </tr>
            <tr>
                <td>Locomoción : $30.000</td>
                <td>Desc. de terceros : </td>
            </tr>
            <tr>
                <td>Colación : $30.000</td>
                <td>Otros dctos. : </td>
            </tr>
            <tr>
                <td><strong>Total : ${{ number_format($liquidacion->monto_imponible,0,',','.') }}</strong> </td>
                <td><strong>Total Dctos : $ {{ number_format(($liquidacion->monto_imponible * $liquidacion->descuentos) / 100) }}</strong> </td>
            </tr>
        </tbody>
    </table>

    <h4 class="title">Impuesto único</h4>
    <table>
        <thead>

        </thead>
        <tbody>
            <tr>
                <td>Dcto. Previsional : </td>
            </tr>
            <tr>
                <td>Impuesto a Pagar : </td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td>Base Imponible : {{ number_format($liquidacion->monto_imponible,0,',','.') }}</td>
            </tr>
            <tr>
                <td>Impuesto a Pagar : </td>
            </tr>
        </tbody>
    </table>
    <div class="parent">

        <p><strong>Sueldo líquido</strong> : ${{ number_format($liquidacion->monto_imponible,0,',','.') }} </p>
        <p><strong>Anticipos :</strong>  $0</p>
        <p><strong>Líquido a Pagar</strong> : ${{ number_format($liquidacion->monto_imponible,0,',','.') }}</p>
    </div>
    <div class="parent" style="text-align: center;">
        <p>________________________</p>
        <p>Firma del Trabajador</p>
    </div>
</body>

</html>
