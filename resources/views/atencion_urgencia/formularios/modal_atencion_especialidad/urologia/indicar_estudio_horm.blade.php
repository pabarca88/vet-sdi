<div id="indicar_examen_uro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_uro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen Hormonal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de estudio Hormonal</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="0">Seleccione</option>
                                    <optgroup label="HORMONAS MASCULINAS">
                                        <option value="144">TESTOSTERONA EN SANGRE</option>
                                        <option value="145">TESTOSTERONA LIBRE EN SANGRE</option>
                                        <option value="146">INDICE ANDROGÉNICO</option>
                                        <option value="???">VIH, anticuerpos y antígenos virales, determ. de H.I.V.</option>
                                        <option value="???">VIH, reacción de polimerasa en cadena (P.C.R.) en líquido cefaloraquídeo</option>
                                    </optgroup>
                                    <optgroup label="HORMONAS FEMENINAS">
                                        <option value="153">ESTRADIOL</option>
                                        <option value="140">PROGESTERONA</option>
                                        <option value="152">17 - HIDROXIPROGESTERONA </option>
                                         <option value="147">TSH</option>
                                         <option value="141">PROLACTINA</option>
                                         <option value="000">HORMONA ANTI - MULLERIANA</option>
                                    </optgroup>
                                    <optgroup label="OTRAS HORMONAS">
                                        <option value="133">FSH</option>
                                        <option value="134">LH</option>
                                        <option value="143">SHBG</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Prioridad</label>
                                <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Nombre Examen</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Prioridad</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>ESTRADIOL</span></td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">en ayunas</td>
                                            <td class="text-center align-middle">
                                                <button href="#!" class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre Tabla-->
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_esp_uro();" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function sol_examen_esp_uro()
    {
        $('#indicar_examen_uro').modal('show');
    }
    function cerrarsol_examen_esp_uro_ven(){
        $('#indicar_examen_uro').modal ('hide');
      }

</script>
