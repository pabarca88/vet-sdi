<table id="tab_profesionales_cont_centroc" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th class="text-center align-middle">Nombre / Rut</th>
            <th class="text-center align-middle">Cargo</th>
            <th class="text-center align-middle">Tipo de Contrato/Fecha contrato</th>
            <th class="text-center align-middle">Contacto/cuenta</th>
            <th class="text-center align-middle">Remuneración Mes</th>
            <th class="text-center align-middle">Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($profesionales_contratados as $profesional)
            <tr>
                <td class="align-middle text-center">
                    <span><strong>{{ $profesional->nombre }} {{ $profesional->primer_apellido }} {{ $profesional->segundo_apellido }}</strong></span><br>
                    <span>{{ $profesional->rut }}</span>
                </td>
                <td class="align-middle text-center">
                    <span>{{ $profesional->especialidad }}</span><br>
                    <span>{{ $profesional->tipo_especialidad }}</span>
                </td>
                <td class="align-middle text-center">
                    <span>{{ $profesional->tipo_contrato }}</span><br>
                    <span>{{ $profesional->fecha_ingreso }}</span>
                </td>
                <td class="align-middle text-center">
                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto({{ $profesional->id }});" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-home"></i></button>
                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="datoscuenta();" data-toggle="tooltip" data-placement="top" title="Depositar"><i class="fas fa-hand-holding-usd"></i></button>
                </td>
                <td class="align-middle text-center">
                    <span>{{ $profesional->horas_semanales }} horas semanales <br> ${{ number_format($profesional->remuneracion_mes, 0, ",", ".") }}</span>
                </td>
                <td class="align-middle text-center">
                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datosprofesionalc();">
                    <i class="feather icon-edit"></i> Editar</button>
                    <button type="button" class="btn btn-danger btn-sm">
                    <i class="feather icon-x-circle"></i> Desasociar</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tab_profesionales_cont_centroc').DataTable();
    });
</script>
