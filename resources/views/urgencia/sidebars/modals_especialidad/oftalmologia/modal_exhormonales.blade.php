<div id="modal_exhormonales" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_exhormonales" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_adjuntar_examen">Exámenes Hormonales y antígenos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-3">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Fecha</label>
                                <input type="date" class="form-control form-control-sm" name="" id="">
                                </input>
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
                                <label class="floating-label-activo-sm">Tipo de pruebas</label>
                                <select class="form-control form-control-sm" name="" id="">
                                    <option>Seleccione una opción</option>
                                    <optgroup label = "Hormonas " class = "#"  >  
                                        <option value = "2-1">Hormona Paratiroídea</option> 
                                        <option value = "1-2">Hormonas Esteroídeas suprarenales</option>  
                                        <option value = "1-4">renina sérica</option> 
                                        <option value = "4-1">Testosterona sérica</option> 
                                        <option value = "4-2">Aldosterona</option>
                                       
                                    </optgroup>
                                    <optgroup label = "Antígenos" class = "#">  
                                        <option value = "2-1">Antígenos PSA</option> 
                                        <option value = "2-2">Proteína Nuclear de Matriz 22</option>  
                                        <option value = "2-3">Prueba Inmunocyt(19A211- lDQ10 Y M344-Mucinas</option>
                                        <option value = "2-4">Urovysion FISH</option>
                                        <option value = "2-4">Antígenos PCA 3 mRNA</option> 
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-success btn-sm float-right">
                            <i class="fa fa-plus"></i>Agregar examen</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Nº Orden</th>
                                            <th class="text-center align-middle">Tipo</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>03/12/20</span></td>
                                            <td class="text-center align-middle">7217821</td>
                                            <td class="text-center align-middle">Perfil Hipofisiario</td>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
        </div>
    </div>
</div>

