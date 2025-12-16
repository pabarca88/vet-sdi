<table id="tab_cont_asistentes_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th class="text-center align-middle">Nombre / Rut</th>
            <th class="text-center align-middle">Cargo</th>
            <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
            <th class="text-center align-middle">Contacto</th>
            <th class="text-center align-middle">Remuneración Mes</th>
            <th class="text-center align-middle">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($asistentes_contratados as $asistente)
            <tr>
                <td class="align-middle text-center">{{ $asistente->nombre }} {{ $asistente->apellido_paterno }} {{ $asistente->apellido_materno }} <br>{{ $asistente->rut }}</td>
                <td class="align-middle text-center">{{ $asistente->cargo }}</td>
                <td class="align-middle text-center">{{ $asistente->tipo_contrato }}<br>{{ $asistente->fecha_ingreso }}</td>
                <td class="align-middle text-center">{{ $asistente->telefono }} <br> {{ $asistente->email }}</td>
                <td class="align-middle text-center">${{ number_format($asistente->sueldo_bruto,0,',','.') }} <br> {{ $asistente->horas_contratadas }} hrs.</td>
                <td class="align-middle text-center">
                    <button class="btn btn-warning btn-sm has-ripple" onclick="dame_asistente({{ $asistente->id }})" data-toggle="modal" data-target="#editarAsistente"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_asistente({{ $asistente->id }})"><i class="fas fa-trash"></i> </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tab_cont_asistentes_centroc').DataTable();
    });
</script>
