<!--Modals Formularios Enfermedades crónicas y GES-->
<!--******* Modal: GES *******-->
<div id="form_ges_dental" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges_dental"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Ges</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Ges</label>
                            <select class="form-control form-control-sm" id="nombre_ges" name="nombre_ges"
                                onchange="ges_seleccionado();">

                                <option value="0">Seleccione una opción</option>
                                <option value="1">Urgencia odontológica ambulatoria</option>
                                <option value="2">Salud oral integral del adulto de 60 años</option>
                                <option value="3">Salud oral integral de la embarazada</option>
                                <option value="4">Salud oral integral para niños y niñas de 6 años</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="bt-wizard" id="wizard_constancia_ges_2">
                            <ul class="nav nav-pills">
                                <li class="tab-wizard-formularios"><a href="#datos_prestador_ges_2"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Datos del prestador</a>
                                </li>
                                <li class="tab-wizard-formularios"><a href="#datos_paciente_ges_2"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Datos del paciente</a>
                                </li>
                                <li class="tab-wizard-formularios"><a href="#informacion_medica_ges_2"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Información médica</a>
                                </li>
                                <li class="tab-wizard-formularios"><a href="#constancia_ges_2"
                                        class="nav-link-wizard rounded-0" data-toggle="tab">Constancia</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane pt-4 active show" id="datos_prestador_ges_2">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <h6 class="text-c-blue">Datos del Prestador</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Nombre: </strong></label>
                                                <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span>

                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="direccion_institucion_ficha_ges"
                                                    id="direccion_institucion_ficha_ges">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Nombre del responsable</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_responsable_ficha_ges"
                                                    id="nombre_responsable_ficha_ges">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Rut del responsable</label>
                                                <input type="person" class="form-control form-control-sm"
                                                    name="rut_responsable_ficha_ges" id="rut_responsable_ficha_ges">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane pt-4" id="datos_paciente_ges_2">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <h6 class="text-c-blue">Datos del Paciente</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Nombre</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_paciente_ficha_ges" id="nombre_paciente_ficha_ges"
                                                    value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Rut</label>
                                                <input type="person" class="form-control form-control-sm"
                                                    name="rut_paciente_ficha_ges" id="rut_paciente_ficha_ges"
                                                    value="{{ $paciente->rut }}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Previsión</label>
                                                <select id="prevision_ficha_ges" name="prevision_ficha_ges"
                                                    class="form-control form-control-sm">
                                                    <option value="0">Selecione una opción</option>
                                                    @foreach ($prevision as $previ)
                                                        <option id="{{ $previ->id }}"> {{ $previ->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Dirección</label>
                                                <input type="address" class="form-control form-control-sm"
                                                    name="direccion_paciente" id="direccion_paciente"
                                                    value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Correo electrónico</label>
                                                <input type="email" class="form-control form-control-sm"
                                                    name="email_paciente" value="{{ $paciente->email }}"
                                                    id="email_paciente">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Teléfono</label>
                                                <input type="tel" class="form-control form-control-sm"
                                                    name="telefono_paciente" value="{{ $paciente->telefono_uno }}"
                                                    id="telefono_paciente">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane pt-4" id="informacion_medica_ges_2">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <h6 class="text-c-blue">Información Médica</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Confirmación diagnóstica
                                                    GES</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="confirmacion_diagnostica_ficha_ges"
                                                    id="confirmacion_diagnostica_ficha_ges">
                                            </div>

                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">¿Paciente con
                                                    tratamiento?</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="paciente_tratamiento_ficha_ges"
                                                    id="paciente_tratamiento_ficha_ges">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <h6 class="text-c-blue">Notificación</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Fecha</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    name="fecha_ficha_ges" id="fecha_ficha_ges">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Hora</label>
                                                <input type="time" class="form-control form-control-sm"
                                                    name="hora_ficha_ges" id="hora_ficha_ges">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane pt-4" id="constancia_ges_2">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <h6 class="text-c-blue mb-2 text-center">Constancia</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Declaro que con esta <span>fecha</span> y
                                                    <span>hora</span>, he tomado conocimiento de que tengo derecho a
                                                    acceder a las "Garantías Explícitas en Salud" GES, siempre que la
                                                    atención sea otorgada en la "Red de Prestadores" que me corresponde
                                                    según Fonasa o la Isapre a la que me encuentro adscrito/a.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver
                                                documento en PDF</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4"
                                                onclick="registrar_ges_ficha();">Guardar</button>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="limpiar_ges_seleccionado();"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
