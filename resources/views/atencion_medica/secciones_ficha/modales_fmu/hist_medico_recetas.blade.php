<div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="id_ficha_receta"
                    style="font-size: 1.3rem; color: #3366CC;"> </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#m_cons_receta').modal('hide'); ">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="tabla_atenciones_previas_receta" class="display table table-striped table-hover dt-responsive nowrap pb-4"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Medicamento</th>
                                <th class="text-center align-middle">Presentacion</th>
                                <th class="text-center align-middle">Posología</th>
                                <th class="text-center align-middle">Vía</th>
                                <th class="text-center align-middle">Periodo</th>
                                <th class="text-center align-middle">Uso Crónico</th>
                                <th class="text-center align-middle">Cantidad</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_cons_receta').modal('hide'); ">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
