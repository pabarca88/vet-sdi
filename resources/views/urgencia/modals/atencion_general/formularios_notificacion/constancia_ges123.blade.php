<!---******* Modal Formulario Constancia Ges ********-->
<div id="modal_constancia_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_constancia_ges"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Constancia GES (Artículo 24 Ley 19.966)</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="bt-wizard" id="wizard_constancia_ges">
                   {{--  <ul class="nav nav-pills">
                        <li class="tab-wizard-formularios"><a href="#datos_prestador_ges"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Datos del prestador</a></li>
                        <li class="tab-wizard-formularios"><a href="#datos_paciente_ges"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Datos del paciente</a></li>
                        <li class="tab-wizard-formularios"><a href="#informacion_medica_ges"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Información médica</a></li>
                        <li class="tab-wizard-formularios"><a href="#constancia_ges" class="nav-link-wizard rounded-0"
                                data-toggle="tab">Constancia</a></li>
                    </ul>

                    <form id="registrar_constancia_ges" name="registrar_constancia_ges" method="POST"
                        action="">
                        @csrf

                        <input type="hidden" name="ficha_id_constancia_ges" id="ficha_id_constancia_ges"
                            value=" @if ($ficha != null) {{ $ficha->id }} @endif">

                        <input type="hidden" name="paciente_constancia_ges" id="paciente_constancia_ges"
                            value="{{ $paciente->id }}">

                        <input type="hidden" name="lugar_constancia_ges" id="lugar_constancia_ges"
                            value="{{ $lugar_atencion->id }}">
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="datos_prestador_ges">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Datos del Prestador</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Nombre Institución</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_institucion" readonly style="color: black"
                                            id="nombre_institucion" value="{{ $lugar_atencion->nombre }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="address" readonly style="color: black"
                                            class="form-control form-control-sm" name="direccion" id="direccion"
                                            value="{{ $lugar_atencion->Direccion->first()->direccion . ' ' . $lugar_atencion->Direccion->first()->numero_dir }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Nombre del responsable</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_responsable" readonly style="color: black"
                                            id="nombre_responsable"
                                            value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Rut del responsable</label>
                                        <input type="person" readonly style="color: black"
                                            class="form-control form-control-sm" name="rut_responsable"
                                            value="{{ $profesional->rut }}" id="rut_responsable">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="datos_paciente_ges">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Datos del Paciente</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" readonly
                                            style="color: black" name="nombre_paciente" id="nombre_paciente"
                                            value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm" readonly
                                            style="color: black" name="rut_paciente" id="rut_paciente"
                                            value="{{ $paciente->rut }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Previsión</label>
                                        <select id="prevision" name="prevision" class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>

                                            @foreach ($prevision as $prev)
                                                @if ($prev->id == $paciente->Prevision()->first()->id)
                                                    <option value="{{ $prev->id }}" selected>
                                                        {{ $prev->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $prev->id }}">{{ $prev->nombre }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="address" readonly style="color: black"
                                            class="form-control form-control-sm" name="direccion_paciente"
                                            id="direccion_paciente"
                                            value="{{ $paciente->Direccion()->first()->direccion .' ' .$paciente->Direccion()->first()->numero_dir .', ' .$paciente->Direccion()->first()->Ciudad()->first()->nombre .', Región de ' .$paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Correo electrónico</label>
                                        <input type="email" readonly style="color: black"
                                            class="form-control form-control-sm" name="email_paciente"
                                            id="email_paciente" value="{{ $paciente->email }}">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" readonly style="color: black"
                                            class="form-control form-control-sm" name="telefono_paciente"
                                            id="telefono_paciente" value="{{ $paciente->telefono_uno }}">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="informacion_medica_ges">


                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información Médica</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Confirmación diagnóstica GES</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="confirmacion_ges_diagnostica_constancia_ges"
                                            id="confirmacion_ges_diagnostica_constancia_ges">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">¿Confirmación diagnóstica?</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="confirmacion_diagnostica_constancia_ges"
                                            id="confirmacion_diagnostica_constancia_ges">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">¿Paciente con tratamiento?</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="paciente_tratamiento_constancia_ges"
                                            id="paciente_tratamiento_constancia_ges">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Notificación</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_constancia_ges" id="fecha_constancia_ges">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Hora</label>
                                        <input type="time" class="form-control form-control-sm"
                                            name="hora_constancia_ges" id="hora_constancia_ges">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="constancia_ges">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Declaro que con esta <span>fecha</span> y
                                                <span>hora</span>, he tomado conocimiento de que tengo derecho a acceder
                                                a
                                                las "Garantías Explícitas en Salud" GES, siempre que la atención sea
                                                otorgada en la "Red de Prestadores" que me corresponde según Fonasa o la
                                                Isapre a la que me encuentro adscrito/a.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                            PDF</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-between mx-0 btn-page">
                                <div class="col-sm-6 pl-0">
                                    <a href="#!" class="btn btn-success btn-sm button-previous">Anterior</a>
                                </div>
                                <div class="col-sm-6 text-md-right pr-0">
                                    <a href="#!" class="btn btn-success btn-sm button-next">Siguente</a>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">Guardar</button>
                        </div>
                    </form>--}}

                </div>
            </div>

        </div>
    </div>
</div>
