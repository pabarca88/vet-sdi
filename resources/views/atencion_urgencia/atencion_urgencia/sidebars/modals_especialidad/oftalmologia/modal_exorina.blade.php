<div id="m_exorina" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_exorina" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">Estudio en orina</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-3">
                            <div class="form-group fill font-weight-bolder">
                                <script>
                                    var meses = new Array ("01","02","03","04","05","06","07","08","09","10","11","12");
                                    var f=new Date();
                                    document.write( f.getDate() + "/" + meses[f.getMonth()] + "/" + f.getFullYear());
                                </script>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label">Nº de orden</label>
                                <input type="number" type="text" class="form-control form-control-sm" name="n_orden" id="n_orden">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo de estudio</label>
                                <select class="form-control form-control-sm" name="tpo_estudioets" id="tpo_estudioets">
                                    <option>Seleccione una opción</option> 
                                    <option value = "1-3">Cultivo antibiograma y recto colonias</option>
                                    <option value = "1-4">Ex en orina completo</option>
                                    <option value = "1-3">Cualitativo de Cisteína</option>
                                    <option value = "1-4">pruebas de composición de cálculos</option>
                                    <option value = "4-2">Niveles de 17-cetoesteroides urinarios</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Diagnóstico clínico</label>
                                <input type="text" class="form-control form-control-sm" name="dg_clinico" id="dg_clinico">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group fill">
                                <label class="floating-label">Se desea explorar</label>
                                <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="exploracionets" id="exploracionets"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 mb-3">
                            <div class="form-group fill">
                                <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar examen</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12">
                            <!--**** Al agregar una imagen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Diagnóstico</th>
                                            <th class="text-center align-middle">Exploración</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/22</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">Cultivo</td>
                                            <td class="text-center align-middle"><span>Sospecha Diagóstica</span></td>
                                            <td class="text-center align-middle">flora</td>
                                            <td class="text-center align-middle">
                                            <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--Cierre Tabla-->
                            </div>
                        </div>
                    </div>
                </form>
            </div> <!--AGREGAR  SALUDA ATTE, FIRMA DIGITAL DEL DR, CODIGO QR Y COD VERIFICACION SDI-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

