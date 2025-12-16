<div id="evol_neonatologia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="evol_neonatologia"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div id="" class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Evolución neonatología</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body mb-0">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <h6 class="mb-3 d-inline mr-3">Fecha evaluación: 00/00/0000</h6>
                        <h6 class="mb-3 d-inline">Hora evaluación: 00:00:00 hrs</h6>
                    </div>
                </div>
                <div class="form-row">
                    <h6 class="mb-3">I.- Identificación</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Rut madre</label>
                        <input type="text" class="form-control form-control-sm" name="rut_madre" id="rut_madre"
                            value="{{ $paciente->rut }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Nombre de la madre</label>
                        <input type="text" class="form-control form-control-sm" name="nom_madre" id="nom_madre"
                            value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">N° y datos brazalete</label>
                        <input type="text" class="form-control form-control-sm" name="brazalete" id="brazalete">
                        <span id="validacion_brazalete" style="display:none ; color:red"></span>
                    </div>
                </div>

                <div class="form-row">
                    <h6 class="my-3">II.- Evaluación del recién nacido</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Frecuencia cardiáca</label>
                        <input type="text" class="form-control form-control-sm" name="frecuencia_cardiaca"
                            id="frecuencia_cardiaca">
                        <span id="validacion_frecuencia_cardiaca" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Frecuencia respiratoria</label>
                        <input type="person" class="form-control form-control-sm" name="frecuencia_respiratoria"
                            id="frecuencia_respiratoria">
                        <span id="validacion_frecuencia_respiratoria" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">T° Axilar</label>
                        <input type="text" class="form-control form-control-sm" name="temperatura_axilar"
                            id="temperatura_axilar">
                        <span id="validacion_temperatura_axilar" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">T° Rectal</label>
                        <input type="text" class="form-control form-control-sm" name="temperatura_rectal"
                            id="temperatura_rectal">
                        <span id="validacion_temperatura_rectal" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Peso</label>
                        <input type="text" class="form-control form-control-sm" name="peso" id="peso">
                        <span id="validacion_peso" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-4 col-md-4">
                        <label class="floating-label">Evacuaciones</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="evacuaciones"
                            id="evacuaciones"></textarea>
                        <span id="validacion_evacuaciones" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Movimientos estado de alerta</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="alerta"
                            id="alerta"></textarea>
                        <span id="validacion_alerta" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-sm-6 col-md-6">
                        <label class="floating-label">Piel</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="piel"
                            id="piel"></textarea>
                        <span id="validacion_piel" style="display:none ; color:red"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-6">
                        <label class="floating-label">Cuerpo</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="cuerpo"
                            id="cuerpo"></textarea>
                        <span id="validacion_cuerpo" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group  col-md-6">
                        <label class="floating-label">Cordón</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="cordon"
                            id="cordon"></textarea>
                        <span id="validacion_cordon" style="display:none ; color:red"></span>
                    </div>
                </div>
                <div class="form-row">
                    <h6 class="my-3">III.- Alimentación</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">Succión</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="succion"
                            id="succion"></textarea>
                        <span id="validacion_succion" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Actitud</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="actitud"
                            id="actitud"></textarea>
                        <span id="validacion_actitud" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Otra (describir)</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                            name="otra_alimentacion" id="otra_alimentacion"></textarea>
                        <span id="validacion_otra_alimentacion" style="display:none ; color:red"></span>
                    </div>
                </div>
                <div class="form-row">
                    <h6 class="my-3">IV.- Indicaciones</h6>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="floating-label">A la madre</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                            name="indicacion_madre" id="indicacion_madre"></textarea>
                        <span id="validacion_indicacion_madre" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">A la enfermera</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                            name="indicacion_enfermera" id="indicacion_enfermera"></textarea>
                        <span id="validacion_indicacion_enfermera" style="display:none ; color:red"></span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="floating-label">Otra</label>
                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"
                            name="indicacion_otra" id="indicacion_otra"></textarea>
                        <span id="validacion_indicacion_otra" style="display:none ; color:red"></span>


                    </div>
                </div>


                <div class="modal-footer pt-2 pb-0">
                    <button type="button" onclick="reset_evaluacion_neonatologia();" class="btn btn-danger btn-sm"
                        data-dismiss="modal">Cancelar</button>
                    <button type="button" onclick="alerta_evolucion_neonatologia();" class="btn btn-info btn-sm">
                        Guardar evolución
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
