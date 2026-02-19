<div id="modal_ichip" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="modal_ichip" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white text-center">Recomendaciones generales Post-colocación Chip Identificación</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#modal_ichip').modal('hide');"><span aria-hidden="true">×</span></button>

            </div>

            <div class="modal-body">

                <embed src="{{ asset('documentos/veterinaria/cuidados colocación de chips.pdf') }}" type="application/pdf" data-documento="colocación de chips.pdf" data-url="documentos/veterinaria/cuidados colocación de chips.pdf" width="100%" height="750px"/>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_ichip').modal('hide');">Cerrar</button>

                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('modal_ichip');">Enviar al Paciente</button>

            </div>

        </div>

    </div>

</div>



