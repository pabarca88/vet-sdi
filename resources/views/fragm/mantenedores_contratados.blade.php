<table id="tab_cont_limpieza_mantencionc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
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
        @foreach($mantenedores_contratados as $mantenedor)
            <tr>
                <td class="align-middle text-center">{{ $mantenedor->nombre }} {{ $mantenedor->primer_apellido }} {{ $mantenedor->segundo_apellido }}<br>{{ $mantenedor->rut }}</td>
                <td class="align-middle text-center">{{ $mantenedor->cargo }}</td>
                <td class="align-middle text-center">{{ $mantenedor->tipo_contrato }}<br>{{ $mantenedor->fecha_ingreso }}</td>
                <td class="align-middle text-center">{{ $mantenedor->telefono }} <br> {{ $mantenedor->email }}</td>
                <td class="align-middle text-center">${{ number_format($mantenedor->remuneracion,0,',','.') }} <br>{{ $mantenedor->horas_trabajadas }} hrs.</td>
                <td class="align-middle text-center">
                    <button class="btn btn-warning btn-sm has-ripple" onclick="dame_mantenedor({{ $mantenedor->id }})" data-toggle="modal" data-target="#editarMantenedor"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_mantenedor({{ $mantenedor->id }})"><i class="fas fa-trash"></i> </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tab_cont_limpieza_mantencionc').DataTable();
    });


</script>
