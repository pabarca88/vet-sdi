<div id="m_cons_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_examenLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="id_ficha_examen" style="font-size: 1.3rem; color: #3366CC;"> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_examen').modal('hide'); ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="table_atecion_previa_tabla_examen_paciente" class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Prioridad</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </form>
                <!--fin autollenado-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_examen').modal('hide'); ">Cerrar</button>
            </div>
        </div>
    </div>
</div>
