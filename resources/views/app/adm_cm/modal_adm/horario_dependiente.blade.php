<!--datos Horario-->
<div id="horario_dependiente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="horario_dependiente" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Configurar Horario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="tablas_examenes" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link-modal active" id="uno_tab" data-toggle="pill" href="#uno" role="tab" aria-controls="uno" aria-selected="true">Horario de Trabajo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link-modal" id="dos_tab" data-toggle="pill" href="#dos" role="tab" aria-controls="pills-home" aria-selected="true">Configurar Horario</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="pills-tablas-remuneraciones">
                        <!--INFORMACION DE ACCESO-->
                        <div class="tab-pane fade show active" id="uno" role="tabpanel" aria-labelledby="uno_tab">
                            <div class="row haberes collapse show" id="info_funcionario-1">
                                <div class="col-sm-12 col-md-12 mb-3">
                                    <div class="table-responsive">
                                        <table id="info_funcionario" class="display table-bordered table table-striped dt-responsive nowrap table-xs" style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th class="align-middle">Días Laborales</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora Entrada</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora Salida</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora inicio colación</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora término colación</th>
                                                    <th class="align-middle"></th>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--DEBERES-->
                        <div class="tab-pane fade" id="dos" role="tabpanel" aria-labelledby="dos_tab">
                            <div class="row deberes collapse show" id="deberes-1">
                                <div class="col-sm-12 col-md-12 text-center">
                                    <h5 class="text-info">Configurar Horario</h5>
                                    <input type="hidden" name="horario_id_personal" id="horario_id_personal" value="">
                                    <input type="hidden" name="horario_id_personal_us" id="horario_id_personal_us" value="">
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="table-responsive">
                                        <table id="rend-caja-dental"
                                            class="display table-bordered table table-striped dt-responsive nowrap table-xs"
                                            style="width:100%">
                                            <tbody>
                                                <tr>
                                                    <th class="align-middle">Dias Laborales</th>
                                                    <th class="align-middle">
                                                        <select class="js-example-basic-multiple" name="horario_dias_laborales" id="horario_dias_laborales" multiple="multiple">
                                                            <option value="">Seleccione</option>
                                                            <option value="1">Lunes</option>
                                                            <option value="2">Martes</option>
                                                            <option value="3">Miercoles</option>
                                                            <option value="4">Jueves</option>
                                                            <option value="5">Viernes</option>
                                                            <option value="6">Sabado</option>
                                                            <option value="7">Domingo</option>
                                                        </select>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora entrada</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_entrada" name="horario_hora_entrada" aria-describedby="emailHelp" placeholder="Hora Entrada" value="08:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora salida</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_salida" name="horario_hora_salida" aria-describedby="emailHelp" placeholder="Hora Salida" value="19:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora inicio colación</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_entrada_colacion" name="horario_hora_entrada_colacion" aria-describedby="emailHelp" placeholder="Hora inicio colación" value="12:00">
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle">Hora término colación</th>
                                                    <th class="align-middle">
                                                        <input type="time" class="form-control form-control-sm" id="horario_hora_salida_colacion" name="horario_hora_salida_colacion" aria-describedby="emailHelp" placeholder="Hora término colación" value="13:00">
                                                    </th>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info btn-sm mx-auto">Guardar cambios</button>
            </div>

        </div>
    </div>
</div>
