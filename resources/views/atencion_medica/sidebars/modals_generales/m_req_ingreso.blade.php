<div id="modal_ireqingreso" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_ireqingreso" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" >
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Requisitos de Ingreso Hospitalización</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body" style="height:600px" >
                <form >
                    <div class="form-row" style="height:600px">
                        <div class="form-group col-sm-12 col-md-12">
                            <iframe src="{{ asset('documentos/generales/requisitos-ingreso.pdf') }}" width="100%" height="100%">
                            This browser does not support PDFs. Please download the PDF to view it:
                            <a href="{{ asset('documentos/generales/requisitos-ingreso.pdf') }}">Download PDF</a>
                            </iframe>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
        </div>
    </div>
</div>
