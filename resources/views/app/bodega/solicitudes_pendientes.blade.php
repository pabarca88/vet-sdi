@extends('template.adm_cm.template')
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

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tab_solicitudes_bodega" class="display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">N° Solicitud</th>
                                    <th class="text-center align-middle">Fecha</th>
                                    <th class="text-center align-middle">Solicitante</th>
                                    <th class="text-center align-middle">Observaciones</th>
                                    <th class="text-center align-middle">Estado</th>
                                    <th class="text-center align-middle">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($pedidos))
                                @foreach($pedidos as $solicitud)
                                    <tr>
                                        <td class="align-middle text-center">{{ $solicitud->id }}</td>
                                        <td class="align-middle text-center">{{ $solicitud->created_at }}</td>
                                        <td class="align-middle text-center">{{ $solicitud->usuario}}</td>
                                        <td class="align-middle text-center">{{ $solicitud->observacion }}</td>
                                        <td class="align-middle text-center">@if($solicitud->estado == 1) <span class="badge badge-warning">Pendiente</span>@elseif($solicitud->estado == 2) <span class="badge badge-success">Entregado</span> @endif</td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-info btn-sm has-ripple" onclick="ver_solicitud({{ $solicitud->id }})" data-toggle="modal" data-target="#verSolicitud"><i class="fa fa-eye" aria-hidden="true"></i></button>

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
</script>
@endsection
