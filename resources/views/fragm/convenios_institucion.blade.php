<table id="tabla_convenios_institucion" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
    <thead>
        <tr>
            <th class="text-wrap text-center align-middle">Convenio</th>
            <th class="text-center align-middle">Tipo</th>
            <th class="text-center align-middle">Fecha Inicial</th>
            <th class="text-center align-middle">Fecha Final</th>
            <th class="text-center align-middle">Productos</th>
            <th class="text-center align-middle">Descuento</th>
            <th class="text-center align-middle">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($convenios_institucion as $convenio)
            <tr>
                <td class="align-middle text-center">{{ $convenio->nombre_convenio_institucion }}</td>
                <td class="align-middle text-center">{{ $convenio->tipo_convenio }}</td>
                <td class="align-middle text-center">{{ $convenio->fecha_inicio_convenio_institucion }}</td>
                <td class="align-middle text-center">{{ $convenio->fecha_fin_convenio_institucion }}</td>
                <td class="align-middle text-center">
                    @foreach($convenio->tipos_productos as $pc)
                        <span>{{ $pc }}</span><br>
                    @endforeach
                </td>
                <td class="align-middle text-center">{{ $convenio->porcentaje_convenio_institucion }}%</td>
                <td class="align-middle text-center">
                    <button class="btn btn-warning btn-sm has-ripple" onclick="dame_convenio({{ $convenio->id }})" data-toggle="modal" data-target="#editarConvenioInstitucion"><i class="fa fa-edit" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-danger btn-sm has-ripple" onclick="eliminar_convenio({{ $convenio->id }})"><i class="fas fa-trash"></i> </button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tabla_convenios_institucion').DataTable();
    });
</script>
