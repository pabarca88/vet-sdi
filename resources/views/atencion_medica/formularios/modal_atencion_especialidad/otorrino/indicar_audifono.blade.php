<div id="indicar_audif" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indicar_audif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1">Receta Audífonos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
			<div class="modal-body">
				<form>
					<div class="form- row">
						<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-1">
							<h6 class="label" type="label">Tipo de Audífono</h6>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 mb-1">
							<select class="form-control form-control-sm" tabindex="-1" aria-hidden="true" id="modal_audifono_tipo">
                                <option value="">Seleccione</option>
                                <option value="1">Intracanal</option>
                                <option value="2">Retroauricular</option>
                                <option value="3">Audigafas</option>
                                <option value="4">Implante</option>
                                <option value="5">Otro Tipo</option>
							</select>
						</div>
					</div>
					<hr class="mt-2">
					<div class="form-row">
						<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="modal_audifono_od">
								<label class="form-check-label font-weight-bold" for="modal_audifono_od">Oído Derecho</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
							<div class="form-group" id = "div_modal_audifono_especificacion_od" style="display:none;">
								<label class="floating-label-activo-sm">Especificaciones para OD</label>
								<input type="text" class="form-control form-control-sm" id="modal_audifono_especificacion_od" >
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="modal_audifono_oi">
								<label class="form-check-label font-weight-bold" for="modal_audifono_oi">Oído Izquierdo</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
							<div class="form-group" id = "div_modal_audifono_especificacion_oi" style="display:none;">
								<label class="floating-label-activo-sm">Especificaciones para OI</label>
								<input type="text" class="form-control form-control-sm" id="modal_audifono_especificacion_oi" >
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="modal_audifono_bi">
								<label class="form-check-label font-weight-bold" for="modal_audifono_bi">Bilateral</label>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
							<div class="form-group" id = "div_modal_audifono_especificacion_bi" style="display:none;">
								<label class="floating-label-activo-sm">Especificaciones para Bilateral</label>
								<input type="text" class="form-control form-control-sm" id="modal_audifono_especificacion_bi" >
							</div>
						</div>
					</div>
					<hr class="mt-1">
					<div class="form-row">
						<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<label class="floating-label-activo-sm">Especificaciones generales</label>
							<textarea id="modal_audifono_especificacion_general" name="modal_audifono_especificacion_general"class="form-control form-control-sm" rows="2"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-danger-light-c" data-dismiss="modal"><i class="feather icon-x"></i> Cerrar</button>
				<button type="button" class="btn btn-sm btn-info-light-c" onclick="registrar_audifono();"><i class="feather icon-save"></i> Guardar</button>
			</div>
		</div>
	</div>
</div>
