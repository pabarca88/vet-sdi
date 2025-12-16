@extends('template.laboratorio.laboratorio_profesional.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Solicitudes pendientes</h5>

                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" data-toggle="tooltip" data-placement="top" title="Volver a mi escritorio"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ ROUTE('comercial') }}">Administracion del centro médico</a></li>
                            <li class="breadcrumb-item"><a href="#">Bodegas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-info">
                    <div class="row">
                        <div class="col-md-12 align-botton">
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Solicitudes a bodega</h4>
                            <button class="btn btn-primary btn-sm float-right" onclick="abrir_modal_solicitudes()">Agregar solicitud</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tab_productos_solicitados" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">ID</th>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Responsable</th>
                                    <th class="text-center align-middle">Nombre del producto</th>
                                    <th class="text-center align-middle">Tipo de producto</th>
                                    <th class="text-center align-middle">Cantidad</th>
                                    <th class="text-center align-middle">Observaciones</th>
                                    <th class="text-center align-middle">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($productosSolicitados))
                                    @foreach($productosSolicitados as $producto)
                                        <tr>
                                            <td class="align-middle text-center">{{ $producto->id }}</td>
                                            <td class="align-middle text-center">{{ $producto->fecha }}</td>
                                            <td class="align-middle text-center">
                                                @if(isset($producto->responsable))
                                                    {{ $producto->responsable->name ?? $producto->responsable->nombre ?? 'N/A' }}
                                                @else
                                                    {{ $producto->id_responsable }}
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">{{ $producto->nombre_producto }}</td>
                                            <td class="align-middle text-center">{{ $producto->tipo_producto }}</td>
                                            <td class="align-middle text-center">{{ $producto->cantidad }}</td>
                                            <td class="align-middle text-center">{{ $producto->observaciones }}</td>
                                            <td class="align-middle text-center">
                                                <button class="btn btn-info btn-sm" onclick="ver_solicitud({{ $producto->id }})">Ver detalle</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@include('app.bodega.modals_bodega.solicitud_pedido')
<!-- MODAL nueva solicitud -->
<div id="modalNuevaSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalNuevaSolicitudLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Detalle de solicitud</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body" id="detalle_pedido_body">
                <form id="formNuevaSolicitudProducto">
                    <div class="form-group">
                        <label for="nombre_producto" class="font-weight-bold">Nombre del producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" required placeholder="Ej: Audífono, Cable, etc">
                    </div>
                    <div class="form-group">
                        <label for="tipo_producto" class="font-weight-bold">Tipo de producto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" required placeholder="Ej: Accesorio, Repuesto, etc">
                    </div>
                    <div class="form-group">
                        <label for="cantidad" class="font-weight-bold">Cantidad <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" required placeholder="Cantidad a solicitar">
                    </div>
                    <div class="form-group">
                        <label for="observaciones" class="font-weight-bold">Observaciones</label>
                        <textarea class="form-control" id="observaciones" name="observaciones" rows="2" placeholder="Detalles adicionales"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-success" onclick="solicitar()">Solicitar</button>
                    <button class="btn btn-danger" onclick="cancelar()">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')
<script>
    function ver_solicitud(id) {
        $.ajax({
            url: "{{ route('adm_cm.ver_solicitud') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response) {
                console.log(response);
                // ABRIR MODAL CON LA INFORMACION DE LA SOLICITUD
                $('#modalSolicitudDetalle').modal('show');

                $('#detalle_pedido_body').html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function abrir_modal_solicitudes() {
        $('#modalNuevaSolicitud').modal('show');
    }

    function solicitar() {
        let nombre_producto = $('#nombre_producto').val();
        let tipo_producto = $('#tipo_producto').val();
        let cantidad = $('#cantidad').val();
        let observaciones = $('#observaciones').val();

        if(!nombre_producto || !tipo_producto || !cantidad) {
            swal('Error', 'Por favor, complete todos los campos obligatorios.', 'error');
            return;
        }

        $.ajax({
            url: "{{ route('laboratorio.profesional.solicitar_producto_bodega') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "nombre_producto": nombre_producto,
                "tipo_producto": tipo_producto,
                "cantidad": cantidad,
                "observaciones": observaciones
            },
            success: function(response) {
                return console.log(response);
                alert('Solicitud enviada con éxito.');
                location.reload();
            },
            error: function(error) {
                console.log(error);
                alert('Error al enviar la solicitud. Intente nuevamente.');
            }
        });
    }
</script>
@endsection
