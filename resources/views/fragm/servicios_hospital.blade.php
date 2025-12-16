<div class="row">
    <div class="col-sm-12 col-md-12">
        <button class="btn btn-success btn-sm my-2 float-right" onclick="ag_servicio()"><i class="fas fa-plus"> </i> Crear Servicio</button>
    </div>
    <div class="col-sm-12 col-md-12">
        <table id="tabla_servicios_internos" class="display table table-striped table-xs dt-responsive nowrap" style="width:100%">
            <thead>
                <tr>
                    <th class="text-wrap text-center align-middle">Nombre Servicio</th>
                    <th class="text-wrap text-center align-middle">N° Salas</th>
                    <th class="text-wrap text-center align-middle">Camas Totales</th>
                    <th class="text-wrap text-center align-middle">Jefe Servicio</th>
                    <th class="text-wrap text-center align-middle">Jefe Enfermera</th>
                    <th class="text-wrap text-center align-middle">Activo</th>
                    <th class="text-wrap text-center align-middle">Editar</th>
                </tr>
            </thead>
            <tbody>
                @if(($servicios_internos->count()) > 0)
                    @foreach($servicios_internos as $servicio)
                        <tr>
                            <td class="align-middle text-center">{{ $servicio->nombre_servicio }}</td>
                            <td class="align-middle text-center">{{ $servicio->numero_salas }}</td>
                            <td class="align-middle text-center">{{ $servicio->numero_camas }}</td>
                            <td class="align-middle text-center">{{ $servicio->nombre_responsable }} {{ $servicio->apellido_uno_responsable }} {{ $servicio->apellido_dos_responsable }}</td>
                            <td></td>
                            <td class="align-middle text-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="esp-{{ $servicio->id }}" onchange="checkboxChanged(this)" {{ $servicio->estado == 1 ? 'checked' : ''}}>
                                    <label class="custom-control-label" for="esp-{{ $servicio->id }}"></label>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_servicio_hospital({{ $servicio->id }},{{ $servicio->id_servicio }},{{ $servicio->id_responsable }},{{ $servicio->numero_salas }},{{ $servicio->numero_camas }});"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_servicio_hospital({{ $servicio->id }})"><i class="fas fa-trash"></i></button>

                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabla_servicios_internos').DataTable({
            responsive:'true'
        });
    });
</script>
