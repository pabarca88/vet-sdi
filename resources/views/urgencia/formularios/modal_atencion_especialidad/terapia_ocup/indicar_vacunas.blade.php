<div id="indicar_vacunas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_vacunas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar Vacunas Programa MINSAL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-12 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label-activo-sm">Vacuna</label>
                                <select class="form-control form-control-sm" id="vac_minsal" name="vac_minsal">
                                    <option>Seleccione</option>
                                    <optgroup label="Recién Nacido">
                                        <option value="AL">BCG</option>
                                        <option value="LA">Hepatitis B</option>
                                    </optgroup>
                                    <optgroup label="2° mes , 4° mes , 6° mes">
                                        <option value="AL">Hexavalente</option>
                                        <option value="LA">Neumocócica Conjugada (prematuros)</option>
                                    </optgroup>
                                    <optgroup label="12 meses">
                                        <option value="AL">Tres Vírica 1ª Dosis</option>
                                        <option value="LA">Meningocócica Conjugada</option>
                                        <option value="LA">Neumocócica Conjugada</option>
                                    </optgroup>
                                    <optgroup label="18 meses">
                                        <option value="AL">Hexavalente</option>
                                        <option value="LA">Hepatitis A</option>
                                        <option value="LA">Varícela 1ª Dosis</option>
                                        <option value="LA">Fiebre Amarilla(Isla de Pascua)</option>
                                    </optgroup>
                                    <optgroup label="Pre-escolar">
                                        <option value="AL">Tres Vírica 2ª Dosis</option>
                                        <option value="LA">Varícela 2ª Dosis</option>
                                    </optgroup>
                                    <optgroup label="Escolar">
                                        <option value="AL">1º Básico dTp (acelular)</option>
                                        <option value="AL">4º Básico VPH 1ª Dosis</option>
                                        <option value="AL">5º Básico VPH 2ª Dosis</option>
                                        <option value="AL">8º Básico dTp (acelular)</option>
                                    </optgroup>          
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Observaciones</label>
                            <input type="text" class="form-control form-control-sm" name="obs_vac" id="obs_vac">
                        </div>
                         <div class="col-sm-12 col-md-12">
                            
                        </div>
                        <br>
                        <div class="col-sm-12 col-md-12">
                            <button type="button" class="btn btn-success btn-sm float-right"><i class="fa fa-plus"></i> Agregar Vacuna</button>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <!--**** Al agregar un medicamento, se debe cargar la tabla *****-->
                            <!--Tabla-->
                            <div class="table-responsive">
                                <table class="table table-bordered table-xs">
                                    <thead>
                                        <tr>
                                            <th class="text-center align-middle">Fecha</th>
                                            <th class="text-center align-middle">Vacuna</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle">12/05/2022</td>
                                            <td class="text-center align-middle"><span>Tres virica</span><br><span></span></td>
                                            <td class="text-center align-middle">observar alérgia</td>
                                            <td class="text-center align-middle">
                                                <button class="btn btn-danger btn-sm btn-icon"><i class="feather icon-x"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Cierre: Tabla-->
                        </div>
                        <div class="col-sm-12 mt-3 mb-2">
                            <div class="custom-control custom-switch">
                                
                                <input type="checkbox" class="custom-control-input" name="check" id="check" value="1" onchange="javascript:showContent()" />
                                <label class="custom-control-label text-primary" for="check"><strong><u>La Vacuna no está en la lista</u></strong></label>
                            </div>
                          
                        </div>
                        <div class="row" id="content" style="display:none">
                            <div class="col-sm-12 col-md-12">
                                <p>Ayudanos a mejorar nuestro módulo de Vacunas ingresando el nombre de la Vacuna faltante</p>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <input class="form-control form-control-sm" type="text" placeholder="Vacuna faltante">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>