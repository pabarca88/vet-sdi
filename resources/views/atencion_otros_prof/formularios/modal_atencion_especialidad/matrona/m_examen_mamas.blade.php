<div id="modal_mamas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_mamas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_mamas">Examen Clínico de mamas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-sm-4 mt-2">
                            <div class="form-group fill">

                                <img src="{{ asset('images/gineco_obst/ex.mamas.png') }}" class="img-thumbnail">
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2">
                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama Derecha</option>
                                            <option>Mama Izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Descripción del Examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas" id="des_ex_mamas"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Seleccione lado</label>
                                        <select class="form-control form-control-sm" id="" name="">
                                            <option>Seleccione </option>
                                            <option>Mama Derecha</option>
                                            <option>Mama Izquierda</option>
                                            <option>Ambas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-2">
                                    <div class="form-group fill">
                                        <label class="floating-label-activo-sm">Descripción del Examen</label>
                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamas1" id="des_ex_mamas1"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-2">
                            <div class="form-group">
                                <label id="" name="" class="floating-label-activo-sm">Descripción General del Examen</label>
                                <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="des_ex_mamasgen" id="des_ex_mamasgen"></textarea>
                            </div>
                        </div>

                            <div class="col-sm-12 mt-2">
                                <h6>Solicitar Examen</h6>
                            </div>

                        <hr>

                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Seleccione lado</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione </option>
                                        <option>Mama Derecha</option>
                                        <option>Mama Izquierda</option>
                                        <option>Ambas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Tipo de Examen</label>
                                    <select class="form-control form-control-sm">
                                        <option>Seleccione opción</option>
                                        <option>Mamografía</option>
                                        <option>Mamografía Digital con contraste</option>
                                        <option>Mamografía Tridimensional</option>
                                        <option>Ecografía mamaria</option>
                                        <option>Resonancia Magnética de Mama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Énfasis Cuadrante o Zona</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione</option>
                                        <option>Cola</option>
                                        <option>S. Interno</option>
                                        <option>S. Externo</option>
                                        <option>S. Interno</option>
                                        <option>S. Externo</option>
                                        <option>Areola</option>
                                        <option>Pezón</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12 mt-2">
                                <h6>Sospecha Diagnóstica</h6>
                            </div>

                        <hr>

                            <div class="col-sm-4 mt-2">
                                <div class="form-group">
                                    <label class="floating-label-activo-sm">Sospecha Diagnóstica</label>
                                    <select class="form-control form-control-sm" id="" name="">
                                        <option>Seleccione </option>
                                        <option>Examen de Rutina</option>
                                        <option>Estudio de lesión</option>
                                        <option>Seguimiento de lesión</option>
                                        <option>Otra</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-8 mt-1">
                                <div class="form-group">
                                    <label id="" name="" class="floating-label-activo-sm">Solicitud Especial</label>
                                    <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="sol_ex_mamasgen" id="sol_ex_mamasgen"></textarea>
                                </div>
                            </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info"> Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function ex_mamas() {
        $('#modal_mamas').modal('show');
    }
</script>
