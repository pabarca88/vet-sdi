

<div id="kegel_fem" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kegel_fem" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Ejercicios suelo Pélvico Femenino</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <embed src="{{ asset('documentos/kine/kegel_fem.pdf') }}" type="application/pdf" data-documento="kegel_fem.pdf" data-url="documentos/kine/kegel_fem.pdf" width="100%" height="750px"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-info btn-sm" onclick="envio_indicaciones_pdf('kegel_fem');">Enviar al Paciente</button>
            </div>
        </div>
    </div>
</div>
<script>
    function kegel_f() {
        $('#kegel_fem').modal('show');
    }
</script>


