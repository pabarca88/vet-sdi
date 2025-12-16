<div id="modal_odontograma" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_odontograma"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_odontograma">Historia del diente1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="historia_odontograma"
                                class="display table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Diagnóstico</th>
                                        <th class="text-center align-middle">Tratamiento</th>
                                        <th class="text-center align-middle">Caras</th>
                                        <th class="text-center align-middle">Pieza</th>
                                        <th class="text-center align-middle">Responsable de atención</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function info_odontograma() {
        $('#modal_odontograma').modal('show');
        console.log('hola');
    }
</script>
