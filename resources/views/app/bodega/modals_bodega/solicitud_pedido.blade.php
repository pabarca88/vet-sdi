@if(isset($solicitud))
<div id="modalSolicitudDetalle" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalSolicitudDetalle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Detalle de solicitud</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&#88;</span></button>
            </div>
            <div class="modal-body" id="detalle_pedido_body">

            </div>
            <div class="modal-footer">
                <div>
                    <button class="btn btn-success" onclick="aprobar_solicitud({{ $solicitud->id }})">Solicitar autorizacion</button>
                    <button class="btn btn-danger" onclick="rechazar_solicitud({{ $solicitud->id }})">Rechazar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

