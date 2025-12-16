<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    color: #222;
    background: #fff;
}
h2 {
    color: #007bff;
    margin-bottom: 10px;
}
p {
    margin: 2px 0 6px 0;
    font-size: 14px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-size: 13px;
}
th, td {
    border: 1px solid #bdbdbd;
    padding: 8px 6px;
    text-align: left;
}
th {
    background: #f2f2f2;
    color: #333;
    font-weight: bold;
}
tr:nth-child(even) {
    background: #f9f9f9;
}
tr.total-row td {
    font-weight: bold;
    background: #e3f2fd;
    color: #007bff;
}
.resumen {
    margin-top: 18px;
    font-size: 15px;
    font-weight: bold;
    color: #007bff;
}
</style>

<h2>Presupuesto de Insumos</h2>
<p>Fecha: {{ date('d-m-Y') }}</p>
<p>Hora: {{ date('H:i') }}</p>
<p>Paciente: {{ $ficha->paciente->nombres ?? '' }} {{ $ficha->paciente->apellido_uno }} {{ $ficha->paciente->apellido_dos }}</p>
<p>Profesional: {{ $profesional->nombre ?? '' }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }}</p>
<table>
    <tr>
        <th>Insumo</th>
        <th>Cantidad</th>
        <th>Observaciones</th>
        <th>Precio</th>
        <th>Total</th>
    </tr>
    @php $gran_total = 0; @endphp
    @foreach($insumos as $insumo)
    @if($insumo['presupuesto'] == 1)
    @php $total = $insumo['cantidad'] * $insumo['valor']; $gran_total += $total; @endphp
    <tr>
        <td>{{ $insumo['insumos'] }}</td>
        <td>{{ $insumo['cantidad'] }}</td>
        <td>{{ $insumo['observaciones'] }}</td>
        <td>${{ number_format($insumo['valor'],0,',','.') }}</td>
        <td>${{ number_format($total,0,',','.') }}</td>
    </tr>
    @endif
    @endforeach
    <tr class="total-row">
        <td colspan="4" style="text-align:right;">TOTAL</td>
        <td>${{ number_format($gran_total,0,',','.') }}</td>
    </tr>
</table>
<div class="resumen">
    Este documento es un presupuesto referencial de insumos. Para dudas o detalles, consulte con su profesional tratante.
</div>
