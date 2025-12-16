<div id="cta_banco_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="info_academica" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info">
				<h5 class="modal-title text-white mt-1">Datos Bancarios</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrar_cta_banco_m();"><span aria-hidden="true">×</span></button>
                @if (isset($asistente))
                    @php
                        $persona = $asistente;
                    @endphp
                @elseif(isset($profesional))
                    @php
                        $persona = $profesional;
                    @endphp
                @endif
                <input type="hidden" class="form-control" id="liquidacion_email" value="{{ $persona->email }}">
			</div>
			<div class="modal-body">
				<div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Rut</label>
                        <input type="text" class="form-control" placeholder="rut" name="liquidacion_rut" id="liquidacion_rut" value="{{ $persona->rut }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Titular</label>
                        <input type="text" class="form-control" placeholder="Nombre" name="liquidacion_nombre" id="liquidacion_nombre" value="{{ mb_strtoupper($persona->nombre.' '.$persona->apellido_uno.' '.$persona->apellido_dos) }}">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Banco</label>
                        <select name="liquidacion_banco" id="liquidacion_banco" class="form-control control-sm">
                            <option value="">Seleccione</option>
                            @foreach ( $bancos as $banco)
                                <option value="{{ $banco->id }}">{{ $banco->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Cuenta</label>
                        <input type="text" class="form-control" placeholder="Cuenta Numero" id="liquidacion_cuenta" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo">Tipo Cuenta</label>
                        <select name="liquidacion_tipo_cuenta" id="liquidacion_tipo_cuenta" class="form-control control-sm">
                            <option value="">Seleccione</option>
                            <option value="Corriente">Corriente</option>
                            <option value="Ahorro">Ahorro</option>
                            <option value="Vista">Vista</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="col-sm-4 col-form-label font-weight-bolder ml-0">Principal</label>
                            <div class="col-sm-8 switch switch-success d-inline ">
                                <input type="checkbox" id="liquidacion_principal" name="liquidacion_principal" value="">
                                <label for="liquidacion_principal" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex justify-content-end">
                        <button type="button" class="btn btn-sm btn-danger-light-c mr-2" data-dismiss="modal" onclick="cerrar_cta_banco_m();"><i class="feather icon-x"></i> Cancelar</button>
                        <button type="button" class="btn btn-sm btn-info-light-c" onclick="agregar_registro_liquidacion();"><i class="feather icon-plus"></i> Añadir</button>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

