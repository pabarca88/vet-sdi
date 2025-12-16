<div id="m_lic_empleador" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="m_lic_empleador" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white text-center">Empleadores informados</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h5 class="#">Empleadores Informados</h5>
                        {{-- mensaje --}}
                        <div class="alert alert-warning" role="alert" style="display:" id="mensaje_empleador">Iniciando Conexión</div>
                    </div>
                </div>
                <div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p >Estimado profesional.<strong style="text-transform:uppercase"> {{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>.</p>
                        <p>S.D.I Le solicita a usted: Confirmar él o los empleadores informados,ya que si la información no es correcta.la licencia no podrá ser tramitada correctamente, impidiendo la evaluación y pago por parte de la entidad pagadora.</p>
                        <p>El trabajador informó a los siguientes empleadores:</p>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8">
                        <div class="form-group ml-2">
                            <label class="form-group ml-3" >EMPRESA DEMO - Rut: 76.156.456.5</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                    	<div class="custom-control custom-switch">
	                        <input type="checkbox" class="custom-control-input" id="empleador_1" checked="checked">
	                        <label class="custom-control-label" for="empleador_1">Seleccionar</label>
	                    </div>
                    </div>
                </div>

                <div class="form-group col-sm-6 col-md-6 col-lg-6 col-xl-6">

                </div>

                <div class="form-row">
					<div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<p>Estimado profesional.<strong style="text-transform:uppercase">{{ $profesional->nombre }} {{ $profesional->apellido_uno }} {{ $profesional->apellido_dos }} </strong>¿VERIFICÓ CON EL PACIENTE?.</p>
					</div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-danger-light btn-sm btn-block">Cancelar</button>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <button type="button" class="btn btn-info btn-sm btn-block">Continuar</button>
                    </div>
                </div>

            </div>
		</div>
	</div>
</div>

