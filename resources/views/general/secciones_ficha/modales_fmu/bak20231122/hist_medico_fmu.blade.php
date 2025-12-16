<div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_consultaantLabel" style="font-size: 1.3rem; color: #3366CC;" onclick="$('#m_consultaant').modal('hide'); ">Datos de Consulta de: </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class=" form-group row">
                        <h5 class="text-c-blue mt-5 mb-4" style="font-size: 1.1rem;">
                            Datos Generales
                        </h5>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Motivo de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_motivo"></h6>
                                </span>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Examen Físico: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_examen_fisico"></h6>
                                </span>
                            </div>
                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Antecedentes de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_antecedentes"></h6>
                                </span>
                            </div>

                        </div>

                        <div class="row col-md-12">
                            <div class="row col-md-5">
                                <label for="ExFísico">
                                    <h5><b>Diagnostico de Consulta: </b></h5>
                                </label>
                            </div>
                            <div class="row col-md-7">
                                <span>
                                    <h6 id="label_diagnostico"></h6>
                                </span>
                            </div>

                        </div>

                    </div>

                    <div class=" form-group row">

                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="$('#m_consultaant').modal('hide'); ">Cerrar</button>
                </div>

            </div>
        </div>
    </div>
</div>
