<div id="modal_indicar_examen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_indicar_examen"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Indicar Examen21212</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-row">
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Tipo Examen</label>
                            <select class="form-control form-control-sm" name="tipo_examen" id="tipo_examen">
                                <option value="0">Seleccione</option>


                                @foreach ($tipo_examen as $te)
                                    <option value="{{ $te->id }}">
                                        {{ $te->nombre }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Sub-tipo de Examen</label>
                            <select class="form-control form-control-sm" id="sub_tipo_examen" name="sub_tipo_examen">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Examen</label>
                            <select class="form-control form-control-sm" id="examen" name="examen">

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mt-2">
                        <div class="form-group fill">
                            <label class="floating-label">Prioridad</label>
                            <select class="form-control form-control-sm" id="prioridad" name="prioridad">
                                <option value="0">Seleccione</option>
                                <option value="1">Baja</option>
                                <option value="2">Media</option>
                                <option value="3">Alta</option>
                                <option value="4">Urgente</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="button" id="agregar_examen_tabla" class="btn btn-success btn-sm float-right">
                            <i lass="fa fa-plus"></i>
                            Agregar Examen
                        </button>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <!--**** Al agregar un examen, se debe cargar la tabla *****-->
                        <!--Tabla-->
                        <div class="table-responsive">
                            <p>Elementos en la Tabla:
                            <div id="adicionados"></div>
                            </p>
                            <table id="tabla_examen" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Nombre
                                            Examen</th>
                                        <th class="text-center align-middle">Tipo</th>
                                        <th class="text-center align-middle">Sub-Tipo</th>

                                        <th class="text-center align-middle">Prioridad
                                        </th>
                                        <th class="text-center align-middle">Acción
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!--Cierre Tabla-->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" data-dismiss="modal" class="btn btn-info">
                    Guardar</button>
            </div>
        </div>
    </div>
</div>
