<table class="table">
    <tbody>
        <tr>
            <td class="alin-center">Fecha Rendicion</td>
            <td class="alin-center">{{ $rendicion->fecha_rendicion }}</td>
        </tr>
        <tr>
            <td class="alin-center">Nombre Completo</td>
            <td class="alin-center">{{ $rendicion->nombres }} {{ $rendicion->apellido_uno }}</td>
        </tr>
        <tr>
            <td class="alin-center">Total Documentos</td>
            <td class="alin-center">{{ $rendicion->total_documentos }}</td>
        </tr>
        <tr>
            <td class="alin-center">Total Bonos</td>
            <td class="alin-center">{{ $rendicion->total_bono }}</td>
        </tr>
        <tr>
            <td class="alin-center">Total Efectivo</td>
            <td class="alin-center">${{ number_format($rendicion->total_efectivo,0,',','.') }}</td>
        </tr>
        <tr>
            <td class="alin-center">Total Otros</td>
            <td class="alin-center">{{ $rendicion->total_otros }}</td>
        </tr>
        <tr>
            <td class="alin-center">Estado</td>
            <td class="alin-center">{{ $rendicion->rendicion == 0 ? 'Rendido' : '' }}</td>
        </tr>
        <tr>
            <td class="alin-center">Observacion</td>
            <td class="alin-center">{{ $rendicion->observacion }}</td>
        </tr>
    </tbody>
</table>
