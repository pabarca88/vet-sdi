<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Sala de recuperación</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <form>
                            <div class="form-row">
                                <h6 class="mb-3">I.- Datos de hospitalización</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Desde</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Hasta</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Total de días</label>
                                    <input type="text" class="form-control form-control-sm" name="dias" id="dias">
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">II.- Dignósticos</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Diagnósticos de ingreso</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="floating-label">Diagnósticos de alta</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Tratamientos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Procedimientos quirúrgicos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Otros procedimientos y/o tratamientos</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=2;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <h6 class="my-3">IV.- Condiciones de herida operatoria</h6>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="floating-label">Herida operatoria</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Fecha de alta: 00/00/0000</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Condición de salud</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Indicaciones</label>
                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="floating-label-activo-sm">Fecha de control</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Lugar</label>
                                    <input type="text" class="form-control form-control-sm" name="lugar" id="lugar">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="floating-label">Profesional</label>
                                    <input type="text" class="form-control form-control-sm" name="profesional"
                                        id="profesional">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-success" onclick="carnet_alta();">Carnet de alta</button>
                        <button type="submit" class="btn btn-info">Guardar epicrisis</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
