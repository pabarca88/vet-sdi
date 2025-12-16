<!---******* Modal Formulario informe médico ********-->
<div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Informe Médico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_informe_medico" action="{{ route('dental.registrar_informe_medico') }}" method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_informe_medico" id="ficha_id_informe_medico"
                        value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                    <input type="hidden" name="paciente_informe_medico" id="paciente_informe_medico"
                        value="{{ $paciente->id }}">

                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm"
                                name="nombre_paciente_informe_medico" id="nombre_paciente_informe_medico"
                                value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" name="rut_paciente_informe_medico"
                                id="rut_paciente_informe_medico" value="{{ $paciente->rut }}">
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
                                value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                            <select id="region_paciente_informe_medico" name="region_paciente_informe_medico"
                                class="form-control form-control-sm">
                                <option value="0">Seleccione una opci&oacute;n </option>
                                @foreach ($regiones as $r)
                                    @if ($r->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id_region)
                                        <option id="{{ $r->id }}" selected> {{ $r->nombre }} </option>
                                    @endif
                                    <option id="{{ $r->id }}"> {{ $r->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Ciudad</label>
                            <select id="region_paciente_informe_medico" name="region_paciente_informe_medico"
                                class="form-control form-control-sm">
                                <option value="0">Seleccione una opci&oacute;n </option>


                                @foreach ($ciudades as $c)
                                    @if ($c->id ==
    $paciente->Direccion()->first()->Ciudad()->first()->id)
                                        <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
                                    @endif
                                    <option id="{{ $c->id }}"> {{ $c->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_informe_medico"
                                id="fecha_informe_medico">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Descripción</label>
                            <textarea type="text" class="form-control form-control-sm" rows="3"
                                name="comentarios_informe_medico" id="comentarios_informe_medico"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="reset_form('form_informe_medico')" class="btn btn-danger"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
