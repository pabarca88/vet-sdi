<div id="kegel_masc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kegel_masc" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Ejercicios suelo Pélvico Masculino</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/kine/kegel_masc.pdf') }}" type="application/pdf" data-documento="kegel_masc.pdf" data-url="documentos/kine/kegel_masc.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('kegel_masc');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function kegel_m() {
        $('#kegel_masc').modal('show');
    }
</script>
