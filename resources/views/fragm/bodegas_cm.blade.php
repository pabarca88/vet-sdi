<div class="row">
    <div class="col-md-12 mb-3">
    </div>
</div>
<table id="bodegas_tabla" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
        <thead>
            <tr>
                <th class="text-center align-middle">Nombre</th>
                <th class="text-center align-middle">Ubicacion</th>
                <th class="text-center align-middle">Productos</th>
                <th class="text-center align-middle">Productos C/Autorizacion</th>
                <th class="text-center align-middle">Responsable</th>
                <th class="text-center align-middle">acción</th>
            </tr>
        </thead>
    <tbody>
        @if(isset($bodegas))
        @foreach($bodegas as $bodega)
        <tr>
            <td class="align-middle text-center">{{ $bodega->nombre }} {{ $bodega->apellido_uno_responsable }}</td>
            <td class="align-middle text-center">{{ $bodega->direccion }}</td>
            <td class="align-middle text-center"><ul>@foreach($bodega->tipos_productos as $tp) <li>{{ $tp }}</li> @endforeach </ul></td>
            <td class="align-middle text-center"><ul>@foreach($bodega->tipo_productos_autorizacion as $tp) <li>{{ $tp }}</li> @endforeach </ul></td>
            <td class="align-middle text-center"><ul>@foreach($bodega->responsables as $res) <li>{{ $res->nombre }} {{ $res->apellido_uno }} {{ $res->apellido_dos }}</li> @endforeach</ul></td>
            <td class="align-middle text-center">
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="editar_bodega({{ $bodega->id }});"><i class="fas fa-edit"></i></button>
                <button type="button" class="btn btn-outline-danger btn-sm" onclick="eliminar_bodega({{ $bodega->id }})"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#bodegas_tabla').DataTable({
            responsive: true,
        });
    });
</script>
