<div id="indicar_examen_uro_ven" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_examen_uro_ven" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen Enf Venéreas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de Examen </label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="SIFILIS">
                                        <option value="246">VDRL</option>
                                        <option value="245">TREPONEMA PALLIDUM FTA - ABS, MHA-TP </option>
                                    </optgroup>
                                    <optgroup label="VIH">
                                        <option value="???">VIH, anticuerpos y antígenos virales, determ. de H.I.V.</option>
                                        <option value="???">VIH, reacción de polimerasa en cadena (P.C.R.) en líquido cefaloraquídeo</option>
                                    </optgroup>
                                    <optgroup label="Flujo">
                                        <option value="229">Cultivo Corriente</option>
                                        <option value="235">Cultivo y Antibiograma Neisseria Gonorrohoeae</option>
                                        <option value="235">CHLAMYDIA TRACHOMATIS Y NEISSERIA GONORRHOEAE DETECCION</option>
                                        <option value="271">INMUNOFLUORESCENCIA INDIRECTA</option>
                                         <option value="359">FLUJO VAGINAL</option>
                                         <option value="359">FLUJO SECRECION URETRAL</option>
                                         <option value="359">Técnicas de Amplificación de Ácidos Nucleicos (TAAN)</option>
                                    </optgroup>
                                    <optgroup label="HEPATITIS-B">
                                        <option value="281">VIRUS HEPATITIS B, ANTICUERPO DEL ANTIGENO</option>
                                        <option value="282">VIRUS HEPATITIS B, ANTICORE TOTAL DEL (ANTI HBC TOTAL) </option>
                                        <option value="283">VIRUS HEPATITIS B, ANTIGENO E DEL (HBEAG)</option>
                                        <option value="284">VIRUS HEPATITIS B, ANTIGENO DE SUPERFICIE (HBSAG) </option>
                                        <option value="285">VIRUS HEPATITIS B, ANTICORE IGM DEL (ANTI HBC IGM)  </option>
                                    </optgroup>
                                    <optgroup label="HEPATITIS-C">
                                        <option value="286">VIRUS HEPATITIS C, ANTICUERPOS DE (ANTI HCV) </option>
                                    </optgroup>
                                    <optgroup label="PAPILOMAS">
                                        <option value="???">Virus Papiloma Humano por PCR </option>
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
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>Hemograma y vhs</span></td>
                                            <td class="text-center align-middle">Sangre</td>
                                            <td class="text-center align-middle">Urgente</td>
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
                <button type="button" class="btn btn-danger btn-sm" onclick="cerrarsol_examen_esp_uro_ven();" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>

    function sol_examen_esp_uro_ven()
    {
        $('#indicar_examen_uro_ven').modal('show');
    }
    function cerrarsol_examen_esp_uro_ven(){
        $('#indicar_examen_uro_ven').modal ('hide');
      }

</script>
