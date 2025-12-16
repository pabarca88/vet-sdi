@extends('template.adm_cm.template')
@section('content')
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">

            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10 font-weight-bold">Controles de Almacenamiento</h5>

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
                            <h4 class="text-white f-20 d-inline ml-4 mt-3">Controles de almacenamiento</h4>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tab_solicitudes_bodega" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">Fecha Ingreso</th>
                                    <th class="text-center align-middle">Imagen</th>

                                    <th class="text-center align-middle">Codigo Interno</th>
                                    <th class="text-center align-middle">Producto</th>
                                    <th class="text-center align-middle">Stock</th>
                                    <th class="text-center align-middle">Descripcion</th>
                                    <th class="text-center align-middle">Tipo Almacenamiento</th>
                                    <th class="text-center align-middle">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($productos))
                                @foreach($productos as $p)
                                    <tr>
                                        <td class="align-middle text-center">{{ $p->created_at }}</td>
                                        <td><img src="{{ $p->image_path }}" alt="foto" style="width: 100px;"></td>

                                        <td class="align-middle text-center">{{ $p->codigo_interno }}</td>
                                        <td class="align-middle text-center">{{ $p->nombre }}</td>
                                        <td class="align-middle text-center">{{ $p->stock_actual }}</td>
                                        <td class="align-middle text-center">{{ $p->descripcion }}</td>
                                        <td class="align-middle text-center">{{ $p->tipo_almacenamiento }}</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-info btn-sm has-ripple" onclick="ver_producto_almacenado({{ $p->id }})" data-toggle="modal" data-target="#verSolicitud"><i class="fa fa-eye" aria-hidden="true"></i></button>

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
@endsection

@section('js-profesionales')
<script>
    function ver_producto_almacenado(id){
        $.ajax({
            url: "{{ ROUTE('bodegas.ver_producto_almacenado') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(response){
                console.log(response);
                $('#verSolicitud').modal('show');
                $('#detalle_pedido_body').html(response);
            },
            error: function(error){
                console.log(error);
            }
        });
    }
</script>
@endsection

@section('modales')
<!-- MODAL VER PRODUCTO ALMACENADO -->
<div id="verSolicitud" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="verSolicitud" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Detalle de producto almacenado</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body" id="detalle_pedido_body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
