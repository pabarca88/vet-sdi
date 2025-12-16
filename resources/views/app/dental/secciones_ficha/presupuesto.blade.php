<div class="row">
    <div class="col-sm-12">
        <h5 class="text-c-blue mt-4 mb-1 f-16">Detalle de presupuesto Nº</h5>
        <hr>
    </div>
    <hr>
</div>
<div class="row">
    <!--Formulario / Menor de edad-->
    <div class="col-sm-12 mt-3">
        <div class="card">
            <div class="card-header bg-info">
                <h6>Paciente menor de edad</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row mb-1">
                        <div class="col-md-12">
                            <h6>Información del acompañente</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                id="nombre_acompañante">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Nombre y Apellidos</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                id="nombre_acompañante">
                        </div>
                        <div class="form-group col-md-4" id="form_0">
                            <label class="floating-label">Relación</label>
                            <input type="text" class="form-control form-control-sm" name="relacion_acompañante"
                                id="relacion_acompañante">
                        </div>
                    </div>
                    <div class="form-row mb-1">
                        <div class="col-md-12">
                            <h6>Información del responsable del pago</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3" id="form_0">
                            <label class="floating-label">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="responsable_pago"
                                id="responsable_pago">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Nombre y Apellidos</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                id="nombre_acompañante">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Email</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompañante"
                                id="nombre_acompañante">
                        </div>
                        <div class="form-group col-md-3" id="form_0">
                            <button type="button" class="btn btn-success btn-block btn-sm"
                                onclick="respon_pago_dent();"><i class="fa fa-plus"></i> Aceptar Pago</button>
                            <!--genera codigo de aceptación al telefono del responsable del pago-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Formulario / Clinico-->
    <div class="col-sm-12 mt-3">
        <div class="card">
            <div class="card-header bg-info">
                <h6>Clínico</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Pieza</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total prestación</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Boca</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Arcada</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Formulario / Laboratorio-->
    <div class="col-sm-12 mt-3">
        <div class="card">
            <div class="card-header bg-info">
                <h6>Laboratorio</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <h6>Orden de Trabajo N°...</h6>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="prestación" id="prestación">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label">Total Prestación</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Formulario / Valor total-->
    <div class="col-sm-12 mt-3">
        <div class="card">
            <div class="card-header bg-info">
                <h6>Valor Total</h6>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Laboratorio</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total Laboratorio</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Clínico</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Sub-Total</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Descuento</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="   pieza">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total Clínico</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label class="floating-label">Valor final</label>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="floating-label">Total presupuesto</label>
                            <input type="text" class="form-control form-control-sm" name="pieza" id="pieza">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
