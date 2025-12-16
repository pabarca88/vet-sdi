<div id="m_rx_cadera" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_rx_cadera" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Estudio del Cadera</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">

                        <div class="col-sm-8 mt-2">
                             <div class="form-group fill">
                                <label class="floating-label-activo-sm">Tipo del Examen Lab Radiología</label>
                                <select class="form-control form-control-sm" name="trauma_ped_rxpie" id="trauma_ped_rxpie">
                                    <option value="AL">Seleccione</option>
                                    <optgroup label="RX SIMPLE">
                                        <option value="401151">RADIOGRAFIA DE PELVIS, CADERA O COXOFEMORAL DE RN, LACTANTE</option>
                                    </optgroup>
                                    <optgroup label="COMPLEJAS">
                                        <option value="403020">TOMOGRAFIA COMPUTARIZADA DE PELVIS</option>
                                        <option value="404016">RESONANCIA MAGNETICA DE PELVIS</option>
                                        <option value="405011">ECOGRAFIA DE PARTES BLANDAS DE PELVIS</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Lado</label>
                                <select class="form-control form-control-sm" id="prioridad_trau_ped_pie" name="prioridad_trau_ped_pie">
                                    <option value="0">Seleccione</option>
                                    <option value="1">derecho</option>
                                    <option value="2" selected>Ambos</option>
                                    <option value="3">Izquierdo</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3 mt-2">
                            <div class="form-group fill">
                                <label class="floating-label">Prioridad</label>
                                <select class="form-control form-control-sm" id="prioridad_trau_ped_pie" name="prioridad_trau_ped_pie">
                                    <option value="0">Seleccione</option>
                                    <option value="1">Baja</option>
                                    <option value="2" selected>Media</option>
                                    <option value="3">Alta</option>
                                    <option value="4">Urgente</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-9 mt-2">
                            <div class="form-group fill">
                                <label id="" name="" class="floating-label-activo-sm">Observaciones</label>
                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="trau_ped_pie" id="trau_ped_pie"></textarea>
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
                                            <th class="text-center align-middle">Lado</th>
                                            <th class="text-center align-middle">Prioridad</th>
                                            <th class="text-center align-middle">Observaciones</th>
                                            <th class="text-center align-middle">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center align-middle"><span>RESONANCIA MAGNETICA DE PIE</span></td>
                                            <td class="text-center align-middle">derecho</td>
                                            <td class="text-center align-middle">Urgente</td>
                                            <td class="text-center align-middle">Observaciones</td>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">
                Guardar</button>
            </div>
        </div>
    </div>
</div>
