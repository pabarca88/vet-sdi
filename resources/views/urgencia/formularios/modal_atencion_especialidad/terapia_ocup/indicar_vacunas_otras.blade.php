<div id="indicar_ot_vacunas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_ot_vacunas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Indicar Otras Vacunas</h5>
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
                                    <option value="AL">ANTI-TIFICA</option>
                                    <option value="LA">HERPES ZOSTER</option>
                                    <option value="AL">INFLUENZA(> DE DOS AÑOS)</option>
                                    <option value="LA">ROTAVIRUS</option>
                                    <option value="AL">COVID</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">OTRA</label>
                            <input type="text" class="form-control form-control-sm" name="obs_vac" id="obs_vac">
                        </div>
                        <div class="col-sm-6 col-md-6">
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
                                
                                <input type="checkbox" class="custom-control-input" name="check1" id="check1" value="1" onchange="showContent_otra()" />
                                <label class="custom-control-label text-primary" for="check1"><strong><u>La Vacuna no está en la lista</u></strong></label>
                            </div>
                          
                        </div>
                        <div class="row" id="content-otra" style="display:none">
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
    function showContent_otra() {
        element = document.getElementById("content-otra");
        check = document.getElementById("check1");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>