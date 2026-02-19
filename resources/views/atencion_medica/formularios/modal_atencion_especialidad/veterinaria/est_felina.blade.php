<div id="m_est_felina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_est_felina" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">

                <h5 class="modal-title text-white text-center">Recomendaciones generales Esterilización Felinos</h5>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" onclick="$('#m_est_felina').modal('hide');"><span aria-hidden="true">×</span></button>

            </div>

            <div class="modal-body">

                <embed src="{{ asset('documentos/veterinaria/cuidados est. felina.pdf') }}" type="application/pdf" data-documento="cuidados est. felina.pdf" data-url="documentos/veterinaria/cuidados est. felina.pdf" width="100%" height="750px"/>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#m_est_felina').modal('hide');">Cerrar</button>

                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('m_est_felina');">Enviar al Paciente</button>

            </div>

        </div>

    </div>

</div>

