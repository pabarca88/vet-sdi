<table id="asistentes_personal" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
    <thead>
        <tr>
            <th class="text-center align-middle">Nombre / Rut</th>
            <th class="text-center align-middle">Tipo</th>
            <th class="text-center align-middle">Sucursales</th>
            <th class="text-center align-middle">Contacto</th>
            <th class="text-center align-middle">Datos</th>
            <th class="text-center align-middle">Rol y permisos</th>
            <th class="text-center align-middle">Acción</th>
        </tr>
    </thead>
    <tbody>
        @if($lista_asistente)
            @foreach ( $lista_asistente as $asistente)
            <tr>
                <td class="align-middle text-center">
                    <span><strong>{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}</strong></span><br>
                    <span>{{ $asistente->rut }}</span>
                </td>
                <td class="align-middle text-center">
                    <span><strong>{{ $asistente->asistente_tipo->nombre }}</strong></span>
                </td>
                <td class="align-middle text-center">
                    {{ $asistente->direccion()->first()->direccion }} #{{ $asistente->direccion()->first()->numero_dir }}, {{ $asistente->direccion()->first()->ciudad()->first()->nombre }}
                </td>
                <td class="align-middle text-center">
                    <!--Botón Modal-->
                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="contacto('asistente publico',{{ $asistente->id }});" data-toggle="tooltip" data-placement="top" title="Contacto"><i class="fab fa-contao"></i></button>
                </td>
                <td class="align-middle text-center">
                    <!--Botón Modal-->
                    <button type="button" class="btn btn-info btn-sm btn-icon" onclick="datos_depositos('asistente publico',{{ $asistente->id_usuario }});" data-toggle="tooltip" data-placement="top" title="Cta.Corriente"><i class="fab fa-creative-commons-nc"></i></button>
                    <!--Botón Modal-->
                    <button type="button" class="btn btn-success btn-sm btn-icon" onclick="horario_profesional_cm('{{ $asistente->asistente_tipo->nombre }}',{{ $asistente->id }}, {{ $institucion->id_lugar_atencion }});" data-toggle="tooltip" data-placement="top" title="Horario y Días de atención"><i class="fas fa-hourglass-half"></i></button>
                </td>
                <td class="align-middle text-center">
                    <!--Botón Modal-->
                    <button type="button" class="btn btn-warning btn-sm btn-icon" onclick="roles_permisos({{ $asistente->asistente_tipo->id }}, {{ $asistente->id_usuario }}, '{{ $asistente->roles }}');" data-toggle="tooltip" data-placement="top" title="Ver"><i class="feather icon-settings"></i></button>
                </td>
                <td class="align-middle text-center">
                    <button type="button" class="btn btn-success btn-sm" onclick="editar_datos_asistente({{ $asistente->id }});"><i class="feather icon-edit"></i> Editar</button>
                    @if($asistente->contrato !== null)
                    <button type="button" class="btn btn-danger btn-sm" onclick="modal_desactivar_asistente({{ $asistente->id}}, {{ $asistente->contrato->id }}, '{{ $asistente->nombres.' '.$asistente->apellido_uno.' '.$asistente->apellido_dos }}');"><i class="feather icon-x-circle"></i> Desasociar</button>
                    @endif
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#asistentes_personal').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
            },
            "order": [
                [0, "asc"]
            ]
        });
    });
</script>
