<div id="modal_interkine" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interkine" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Interconsulta </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input type="text" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input type="person" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input type="number" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <label class="floating-label-activo-sm">Dirección</label>
                        <input type="address" class="form-control form-control-sm" name="" id="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Región</label>
                        <select id="region_comuna" name="region_comuna" class="form-control form-control-sm">
                        <option>Región de Valparaíso</option> 
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label class="floating-label-activo-sm">Comuna</label>
                        <select id="region_comuna" name="region_comuna" class="form-control form-control-sm">
                        <option>Viña del mar</option> 
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="inter-kine" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="inter-esp-tab" data-toggle="tab" href="#inter-esp" role="tab" aria-controls="inter-esp" aria-selected="true">Interconsulta especialidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="res-inter-tab" data-toggle="tab" href="#res-inter" role="tab" aria-controls="res-inter" aria-selected="false">Responder interconsulta</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="inter-kine">
                            <!--INTERCONSULTA ESPECIALIDAD-->
                            <div class="tab-pane fade show active" id="inter-esp" role="tabpanel" aria-labelledby="inter-esp-tab">
                                <form>
                                     <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Nombre especialidad o especialista</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="floating-label-activo-sm">Se desea saber</label>
                                            <textarea type="text" class="form-control form-control-sm" rows="2" name="" id=""></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-12 text-center mb-2">
                                            <button type="button" class="btn btn-sm btn-outline-primary">Ver documento en PDF</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--RESPONDER INTERCONSULTA-->
                            <div class="tab-pane fade show" id="res-inter" role="tabpanel" aria-labelledby="res-inter-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Diagnóstico</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Tratamiento</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Comentario</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="com_inf_fono" id="com_inf_fono"></textarea>
                                        </div>
                                        <div class="form-group col-sm-2 col-md-3 col-lg-3 col-xl-3">
                                            <label class="floating-label-activo-sm">Fecha</label>
                                            <input type="date" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-5 col-md-9 col-lg-9 col-xl-9">
                                            <label class="floating-label-activo-sm">Nombre del profesional</label>
                                            <input type="text" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Email</label>
                                            <input type="email" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-3">
                                            <label class="floating-label-activo-sm">Fecha de control</label>
                                            <input type="date" class="form-control form-control-sm" name="" id="">
                                        </div>
                                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                                            <button type="button" class="btn btn-sm btn-outline-primary btn-block">Ver documento en PDF</button>
                                        </div>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
                <button type="button" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar</button>
            </div>
        </div>	
	</div>
</div>

	