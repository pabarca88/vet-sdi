<div id="modal_vac_fel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_vac_fel" aria-hidden="true">

   <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white text-center">Vacunas y desparasitación de caninos</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#modal_vac_fel').modal('hide');"><span aria-hidden="true">×</span></button>

            </div>

            <div class="modal-body">

                <embed src="{{ asset('documentos/veterinaria/vacuna desp gatos.pdf') }}" type="application/pdf" data-documento="vacuna desp gatos.pdf" data-url="documentos/veterinaria/vacuna desp gatos.pdf" width="100%" height="750px"/>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_vac_fel').modal('hide');">Cerrar</button>

                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('modal_vac_fel');">Enviar al Paciente</button>

            </div>

        </div>

    </div> 

</div>


