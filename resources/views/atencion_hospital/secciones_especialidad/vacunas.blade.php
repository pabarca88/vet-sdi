<div class="tab-pane fade" id="vac" role="tabpanel" aria-labelledby="vac-tab">
    <div class="row bg-white shadow-sm rounded mx-1 m-1 pt-3">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h6 class="text-c-blue">Vacunas</h6>
            <hr>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="form-row" id="formulario_vac">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-2">
                    <h5 class="text-c-blue">Información del estado de vacunación del menor</h5>
                </div>
                <hr>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label class="floating-label">Estado de vacunación</label>
                    <select class="form-control form-control-sm" id="categoria">
                        <option>Seleccione</option>
                        <optgroup label="Programa Minsal">
                            <option value="AL">Al día</option>
                            <option value="LA">Atrasado</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label class="floating-label">Vacuna correspondiente a edad</label>
                    <select class="form-control form-control-sm" id="categoria">
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
                <div class="form-group col-md-3">
                    <label class="floating-label">Incidentes con la vacuna</label>
                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=8" onblur="this.rows=1;" name="incidentes" id="incidentes"></textarea>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-outline-primary btn-sm btn-block"><i class="feather icon-plus"></i> Añadir</button>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <div class="row">
                <div class="col-md-8 d-inline">
                    <h5 class="text-c-blue pt-3">Estado de Vacunación</h5>
                </div>
                <!--INDICACIONES-->
                <div class="col-md-4 mb-0 float-right d-inline">
                 <div class="btn-group btn-block btn-sm" role="group">
                    <button type="button" class="btn btn-outline-primary btn-block btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="feather icon-file-text"></i> Indicaciones
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" onclick="i_vacunas();"><i class="feather icon-plus"></i> Indicar Vacunas Programa MINSAL</a>
                      <a class="dropdown-item" onclick="i_vacunas_otras();"><i class="feather icon-plus"></i> Indicar Otras Vacunas</a>
                      <a class="dropdown-item" onclick="carnet_vac();"><i class="feather icon-plus"></i> Carnet de vacunas generales</a>
                      <a class="dropdown-item" onclick="inter();"><i class="feather icon-plus"></i> Interconsulta</a>
                      <a class="dropdown-item" onclick="otras_vac();"><i class="feather icon-plus"></i> Carnet de vacunas especiales</a>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <table id="tabla_profesionales_laboratorio" class="display table table-striped dt-responsive nowrap table-xs" style="width:100%"><!--AGREGAR EL ID DE LA TABLA PARA QUE FUNCIONE RESPOMSIVO-->
                        <thead>
                            <tr>
                                <th class="text-center align-middle">EDAD</th>
                                <th class="text-center align-middle">VACUNAS</th>
                                <th class="text-center align-middle">RECIBIDA</th>
                                <th class="text-center align-middle">FECHA</th>
                                <th class="text-center align-middle">INCIDENTES</th>
                                <th class="text-center align-middle">ACCIÓN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle text-center">
                                    <span><strong>RN</strong></span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>BCG</span><br>
                                    <span>Hepatitis B</span>
                                </td>
                                <td class="align-middle text-center">
                                   <span>SI</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>20/12/2021</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span>ERITEMA LOCAL</span>
                                </td>
                                <td class="align-middle text-center">

                                    <button type="button" class="btn btn-outline-info btn-sm">
                                    <i class="feather feather icon-check"></i> Indicar</button><!--SI LA OPCION RECIBIDA ES NO DEBE APARECER BOTON-->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--<div class="form-group col-md-3">
                     <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas();"><i class="fa fa-plus"></i> Indicar Vacunas Programa MINSAL</button>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_vacunas_otras();"><i class="fa fa-plus"></i> Indicar Otras Vacunas</button>
                </div>
                 <div class="form-group col-md-3">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="carnet_vac();"><i class="fa fa-plus"></i> Carnet de vacunas generales</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="inter();"><i class="fa fa-plus"></i> Interconsulta</button>
                </div>
                <div class="form-group col-md-3">
                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="otras_vac();"><i class="fa fa-plus"></i> Carnet de vacunas especiales</button>
                </div>-->
            </div>
            <hr>

        </div>
    </div>
</div>

