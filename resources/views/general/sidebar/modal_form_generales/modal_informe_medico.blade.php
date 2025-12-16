<div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Informe Médico</h5>
                <button type="button" class="close text-white"  data-dismiss="modal" aria-label="Close" onclick="$('#modal_inf_medico').modal('hide')"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_informe_medico">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm"
                                name="nombre_paciente_informe_medico" id="nombre_paciente_informe_medico"
                                value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm"
                                name="rut_paciente_informe_medico" id="rut_paciente_informe_medico"
                                value="{{ $paciente->rut }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="number" class="form-control form-control-sm"
                                name="edad_paciente_informe_medico" id="edad_paciente_informe_medico"
                                value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input type="address" class="form-control form-control-sm"
                                name="direccion_paciente_informe_medico" id="direccion_paciente_informe_medico"
								@if($paciente->id_direccion)
									value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}"
								@else
									value=""
								@endif
							>
								
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                            <select id="region_paciente_informe_medico" name="region_paciente_informe_medico"
                                class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($regiones as $r)
									@if($paciente->id_direccion)
										@if($paciente->Direccion())
											@if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
												<option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
											@endif
										@endif
									@endif
                                    <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Ciudad</label>
                            <select id="region_paciente_informe_medico" name="region_paciente_informe_medico"
                                class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($ciudades as $c)
									@if($paciente->id_direccion)
										@if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
											<option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
										@endif
                                    @endif
                                    <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        {{--  <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_informe_medico"
                                id="fecha_informe_medico">
                        </div>  --}}
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-3">
                            <h6 class="text-c-blue mt-3">El Profesional que suscribe informa que</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Descripción</label>
                            <textarea type="text" class="form-control form-control-sm" rows="3" name="comentarios_informe_medico" id="comentarios_informe_medico"></textarea>
                        </div>
                    </div>
                    {{--  <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                        </div>
                    </div>  --}}
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_inf_medico').modal('hide')"><i class="feather icon-x"></i> Cancelar</button>
                <button type="button" onclick="registrar_informe_medico();" class="btn btn-info btn-sm"><i class="feather icon-check"></i> Generar Informe</button>
            </div>
        </div>
    </div>
</div>
