<!--***************MODALS*******************-->

<!--Modals Formularios generales-->

<!---******* Modal Formulario certificado de reposo ********-->
<div id="modal_certificado_reposo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_certificado_reposo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Certificado de reposo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_certificado_reposo">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->nombres }} {{ $paciente->apellido_uno }} {{ $paciente->apellido_dos }}" name="" id="" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}" name="" id="" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="number" class="form-control form-control-sm" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}" name="" id="" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 mb-1 mt-2">
                            <p class="text-c-blue">El Profesional que suscribe certifica que este paciente debe permanecer en reposo</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Desde</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_certificado"
                                id="fecha_inicio_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hasta</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_termino_certificado"
                                id="fecha_termino_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="hipotesis_certificado"
                                id="hipotesis_certificado"></textarea>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_certificado"
                                id="comentarios_certificado"></textarea>
                        </div>
                    </div>
                    {{--  <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="button" class="btn btn-sm btn-primary"> <a
                                    href="{{ route('print') }}">PDF</a></button>
                        </div>
                    </div>  --}}
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="registrar_cetificado_reposo();" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!---******* Modal Formulario de interconsulta ********-->
<div id="modal_interconsulta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <label class="form-control form-control-sm" name="nombre_paciente_interconsulta" id="nombre_paciente_interconsulta">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <label class="form-control form-control-sm"  name="rut_paciente_interconsulta" id="rut_paciente_interconsulta">{{ $paciente->rut }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <label class="form-control form-control-sm" name="edad_paciente_interconsulta" id="edad_paciente_interconsulta" >{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</label>
                    </div>

                </div>

                {{--  PESTAÑA DE SOLICITUD  --}}
                <div>
                    <form id="inter-especialidad">
                        <div class="form-row">
                            {{--  CARGA DE INTERCONSULT  --}}
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Profesion</label>
                                <select class="form-control form-control-sm" id="profesion" name="profesion" onchange="buscar_tipo_especialidad();buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    @if (isset($especialidad))
                                        @foreach ($especialidad as $esp)
                                            @if($esp->id != 8 && $esp->id != 10 && $esp->id != 11 && $esp->id != 12 )
                                            <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Especialidad</label>
                                <select class="form-control form-control-sm" id="especialidad" name="especialidad" onchange="buscar_sub_tipo_especialidad();buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Tipo Especialidad</label>
                                <select class="form-control form-control-sm" id="sub_tipo_especialidad" name="sub_tipo_especialidad" onchange="buscar_profesional();">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-6">
                                <label class="floating-label">Profesional</label>
                                <select class="form-control form-control-sm" id="profesional_inter" name="profesional_inter">
                                    <option selected value="0">Seleccione</option>
                                    <option>-</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-6 nombre_profesional_inter" style="display: none;">
                                <label class="floating-label-activo-sm">Profesional Nombre</label>
                                <input type="text" class="form-control form-control-sm" name="nombre_profesional_inter" id="nombre_profesional_inter">
                            </div>

                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                <input type="text" class="form-control form-control-sm" name="hipotesis_interconsulta" id="hipotesis_interconsulta">
                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label class="floating-label-activo-sm">Se desea saber</label>
                                <textarea type="text" class="form-control form-control-sm" rows="2" name="comentarios_interconsulta" id="comentarios_interconsulta"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer pt-2 pb-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" onclick="registrar_interconsulta();" class="btn btn-info">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!---******* Modal Formulario de responder interconsulta ********-->
<div id="modal_interconsulta_respuesta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta_respuesta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Respuesta Interconsulta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <label class="form-control form-control-sm" name="nombre_paciente_interconsulta" id="nombre_paciente_interconsulta">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <label class="form-control form-control-sm"  name="rut_paciente_interconsulta" id="rut_paciente_interconsulta">{{ $paciente->rut }}</label>
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <label class="form-control form-control-sm" name="edad_paciente_interconsulta" id="edad_paciente_interconsulta" >{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}</label>
                    </div>

                </div>

                <ul class="nav nav-pills mt-3 mb-4" id="pills-tab-interconsulta" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-modal active" id="pills-tab-inter-especialidad" data-toggle="pill" href="#pills-inter-especialidad" role="tab" aria-controls="pills-home" aria-selected="true">Interconsulta Especialidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modal" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-interconsulta">

                    {{--  PESTAÑA DE SOLICITUD  --}}
                    <div class="tab-pane fade show active" id="pills-inter-especialidad" role="tabpanel"
                        aria-labelledby="pills-tab-inter-especialidad">
                        <form id="inter-especialidad">
                            <div class="form-row">
                                {{--  VER INFORMAMCION DE INTERCONSULTA  --}}
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Hipótesis diagnóstica</label>
                                    @if(isset($interconsulta) )
                                        <label class="form-control form-control-sm">{{ $interconsulta->hipotesis }}</label>
                                    @else
                                        <label class="form-control form-control-sm"></label>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Se desea saber</label>
                                    @if(isset($interconsulta) )
                                        <label class="form-control form-control-sm" >{{ $interconsulta->comentarios }}</label>
                                    @else
                                        <label class="form-control form-control-sm" ></label>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                @if(!isset($interconsulta) )
                                <button type="button" onclick="registrar_interconsulta();" class="btn btn-info">Guardar</button>
                                @endif
                            </div>
                        </form>
                    </div>

                    {{--  PESTAÑA RESPUESTA  --}}
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form id="inter-especialidad">
                            @if(isset($interconsulta) )
                                <input type="hidden" name="inter_id" id="inter_id" value="{{ $interconsulta->id }}">
                            @else
                                <input type="hidden" name="inter_id" id="inter_id" value="0">
                            @endif
                            <div class="form-row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Diagnóstico</label>
                                    @if(isset($interconsulta) )
                                    <input type="text" class="form-control form-control-sm" name="inter_resp_diagnostico" id="inter_resp_diagnostico" value="{{ $interconsulta->diagnostico_resp }}">
                                    @else
                                    <input type="text" class="form-control form-control-sm" name="inter_resp_diagnostico" id="inter_resp_diagnostico" value="">
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Tratamiento</label>
                                    @if(isset($interconsulta) )
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="inter_resp_tratamiento" id="inter_resp_tratamiento">{{ $interconsulta->tratamiento_resp }}</textarea>
                                    @else
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="inter_resp_tratamiento" id="inter_resp_tratamiento"></textarea>
                                    @endif

                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Comentario y examenes</label>
                                    @if(isset($interconsulta) )
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="inter_resp_comentario" id="inter_resp_comentario">{{ $interconsulta->comentario_examen_resp }}</textarea>
                                    @else
                                    <textarea type="text" class="form-control form-control-sm" rows="2" name="inter_resp_comentario" id="inter_resp_comentario"></textarea>
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    @if(isset($interconsulta) )
                                        @if($interconsulta->citado_control_resp == 1)
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox"  id="requiere_control" name="requiere_control" value="" checked>
                                            <label for="requiere_control" class="cr"></label>
                                        </div>
                                        <label>Requiere control</label>
                                        @else
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox"  id="requiere_control" name="requiere_control" value="">
                                            <label for="requiere_control" class="cr"></label>
                                        </div>
                                        <label>Requiere control</label>
                                        @endif
                                    @else
                                        <div class="switch switch-success d-inline m-r-10">
                                            <input type="checkbox"  id="requiere_control" name="requiere_control" value="">
                                            <label for="requiere_control" class="cr"></label>
                                        </div>
                                        <label>Requiere control</label>
                                    @endif
                                </div>
                                {{--  <div class="col-sm-12 col-md-12 text-center mb-2">
                                    <button type="button" class="btn btn-sm btn-primary">Ver documento en PDF</button>
                                </div>  --}}
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-info" onclick="enviar_respuesta_interconsulta();">Enviar Respuesta</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Formulario informe médico ********-->
<div id="modal_inf_medico" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_inf_medico"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Informe Médico</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
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
                                value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Regi&oacute;n</label>
                            <select id="region_paciente_informe_medico" name="region_paciente_informe_medico"
                                class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                @foreach ($regiones as $r)
                                    @if ($r->id == $paciente->Direccion()->first()->Ciudad()->first()->id_region)
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
                                <option value="0">Seleccione</option>
                                @foreach ($ciudades as $c)
                                    @if ($c->id == $paciente->Direccion()->first()->Ciudad()->first()->id)
                                        <option id="{{ $c->id }}" selected> {{ $c->nombre }} </option>
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
                        <div class="form-group col-sm-12 col-md-12">
                            <p class="text-c-blue mb-0 mt-3">El Profesional que suscribe informa que</p>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="registrar_informe_medico();" class="btn btn-info">Generar Informe</button>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Formulario uso personal ********-->
<div id="modal_uso_personal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_uso_personal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-backdrop="static" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Uso Personal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_uso_personal">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Dirigido a</label>
                            <input type="text" class="form-control form-control-sm" name="uso_personal_dirigido_a" id="uso_personal_dirigido_a">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Cargo</label>
                            <input type="person" class="form-control form-control-sm" name="uso_personal_cargo" id="uso_personal_cargo">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Mensaje</label>
                            <textarea type="text" class="form-control form-control-sm" rows="12" name="uso_personal_mensaje" id="uso_personal_mensaje"></textarea>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="registrar_uso_personal();" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Formulario enfermedades de declaración obligatoria ********-->
<div id="modal_enfermedades_declaracion_obligatoria" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_enfermedades_declaracion_obligatoria" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Enfermedades de declaración obligatoria E.N.O</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form id="form_declaracion_eno" method="POST" action="{{ route('dental.registrar_declaracion_eno') }}">

                @csrf
                <input type="hidden" name="ficha_id_declaracion_eno" id="ficha_id_declaracion_eno"
                    value=" @if ($fichaAtencion != null) {{ $fichaAtencion->id }} @endif">

                <input type="hidden" name="paciente_declaracion_eno" id="paciente_declaracion_eno"
                    value="{{ $paciente->id }}">

                <input type="hidden" name="lugar_declaracion_eno" id="lugar_declaracion_eno"
                    value="{{ $lugar_atencion->id }}">

                <div class="modal-body">
                    <div class="bt-wizard" id="enfermedades_declaracion_obligatoria">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_establecimiento_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del
                                    establecimiento</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_paciente_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificación del paciente</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#ident_clinica_paciente_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Información clínica del
                                    paciente</a></li>
                            <li class="tab-wizard-formularios"><a href="#notificacion_eno"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Notificación</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_establecimiento_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del establecimiento</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nombre del establecimiento
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_establecimiento" id="nombre_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Código del establecimiento
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="codigo_establecimiento" id="codigo_establecimiento">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nombre de oficina provincial
                                        </label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_oficina_provincial" id="nombre_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Código de oficina provincial
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="codigo_oficina_provincial" id="codigo_oficina_provincial">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">
                                            Nº de ficha clínica o código de control
                                        </label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_ficha_control" id="numero_ficha_control">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_paciente_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Identificación del Paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_paciente_eno" id="rut_paciente_eno"
                                            value="{{ $paciente->rut }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre completo</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_eno" id="nombre_paciente_eno"
                                            value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Sexo</label>
                                        <input type="text" class="form-control form-control-sm" name="sexo_paciente_eno"
                                            id="sexo_paciente_eno"
                                            value="@if ($paciente->sexo == 'M') Masculino @else Femenino @endif">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nacimiento</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="nacimiento_paciente_eno" id="nacimiento_paciente_eno"
                                            value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="address" class="form-control form-control-sm"
                                            name="direccion_paciente_eno" id="direccion_paciente_eno"
                                            value="{{ $paciente->Direccion()->first()->direccion .' ' .$paciente->Direccion()->first()->numero_dir .', ' .$paciente->Direccion()->first()->Ciudad()->first()->nombre .', Región de ' .$paciente->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre }}">

                                    </div>
                                    <div class="form-group col-sm-6 col-md-6" style="display: none">
                                        <label class="floating-label-activo-sm">Región / Comuna</label>
                                        <select id="" name="" class="form-control form-control-sm">
                                            <option selected value="0">Seleccione una opción </option>
                                            <optgroup label="Región de Valparaíso">
                                                <option value="1">Viña del Mar</option>
                                                <option value="2">Valparaíso</option>
                                                <option value="3">San Felipe</option>
                                                <option value="3">etc...</option>
                                            </optgroup>
                                            <optgroup label="Región Metropolitana">
                                                <option value="10">Santiago</option>
                                                <option value="11">Maipú</option>
                                                <option value="12">etc...</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Correo electrónico</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_paciente_eno" id="email_paciente_eno"
                                            value="{{ $paciente->email }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_paciente_eno" id="telefono_paciente_eno"
                                            value="{{ $paciente->telefono_uno }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nacionalidad</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nacionalidad_paciente_eno" id="nacionalidad_paciente_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Código de nacionalidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cod_nacionalidad_paciente_eno" id="cod_nacionalidad_paciente_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Seleccione pueblo
                                            originario</label>
                                        <select class="form-control form-control-sm" id="pueblo_originario_eno"
                                            name="pueblo_originario_eno">
                                            <option value="">Selecione una opción</option>
                                            <option value="1">Ninguna</option>
                                            <option value="2">Atacameño</option>
                                            <option value="3">Aimara</option>
                                            <option value="5">Colla</option>
                                            <option value="6">etc..</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Ocupación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="ocupacion_paciente_eno" id="ocupacion_paciente_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Condición</label>
                                        <select class="form-control form-control-sm" id="ocupacion_condicion_eno"
                                            name="ocupacion_condicion_eno">
                                            <option value="">Seleccione condición</option>
                                            <option value="1">Inactivo/a</option>
                                            <option value="2">Activo/a</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Categoría</label>
                                        <select class="form-control form-control-sm" id="ocupacion_categoria_eno"
                                            name="ocupacion_categoria_eno">
                                            <option value="">Seleccione categoría</option>
                                            <option value="1">Patrón / Empresario</option>
                                            <option value="2">Empleado</option>
                                            <option value="3">Obrero</option>
                                            <option value="4">Trabajador Independiente</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_clinica_paciente_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información clínica del paciente</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnósico Confirmado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_confirmado_eno" id="diagnostico_confirmado_eno">
                                    </div>

                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">CIE-10</label>
                                        <input type="text" class="form-control form-control-sm" name="cie_10_eno"
                                            id="cie_10_eno">
                                        <input type="hidden" class="form-control form-control-sm" name="id_cie_10_eno"
                                            id="id_cie_10_eno">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Primeros síntomas</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primeros_sintomas_eno" id="fecha_primeros_sintomas_eno">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">País de contagio</label>
                                        <select class="form-control form-control-sm" id="pais_contagio_eno"
                                            name="pais_contagio_eno">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Chile</option>
                                            <option value="2">Extranjero</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">País</label>
                                        <input type="text" class="form-control form-control-sm" name="pais_eno"
                                            id="pais_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Antecedentes de Vacunación</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Vacunación</label>
                                        <select class="form-control form-control-sm" id="vacunacion_eno"
                                            name="vacunacion_eno">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Ignorado</option>
                                            <option value="4">No corresponde</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Fecha última dosis</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ultima_dosis_eno" id="fecha_ultima_dosis_eno">
                                    </div>
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label class="floating-label-activo-sm">Nº última dosis</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_ultima_dosis_eno" id="numero_ultima_dosis_eno">
                                    </div>
                                </div>
                                <div class="form-row mt-0 pt-0">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <p class="mb-0 pb-0">Completar solo si la declaración corresponde a
                                            TBC</p>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Solo para
                                            TBC(NUEVO-RECAIDA)</label>
                                        <input type="text" class="form-control form-control-sm" name="nuevo_tbc_eno"
                                            id="nuevo_tbc_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">RECAIDAS</label>
                                        <input type="text" class="form-control form-control-sm" name="recaidas_tbc_eno"
                                            id="recaidas_tbc_eno">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="notificacion_eno">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Información del profesional que notifica</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional_eno" id="rut_profesional_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombres y Apellidos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_apellidos_eno" id="nombre_apellidos_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional_eno" id="telefono_profesional_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Correo Electrónico</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="correo_profesional_eno" id="correo_profesional_eno">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <h6 class="text-c-blue">Notificación</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_eno"
                                            id="fecha_eno">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Hora</label>
                                        <input type="time" class="form-control form-control-sm" name="hora_eno"
                                            id="hora_eno">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-c-blue text-center mt-3">Instructivo boletín notificación de
                                            enfermedades de declaración obligatoria (boletín E.N.O)</h5>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <ol class="px-2">
                                                <li value="1">
                                                    <p>Los Items <strong>Nombre;
                                                            Establecimiento</strong>;<strong>Oficina
                                                            Provincial</strong>;<strong>Codigos
                                                            Asignados</strong>;<strong>Seremi</strong>;<strong>Nacionalidad</strong>;<strong>Pueblo
                                                            originario declarado</strong>;<strong> Comuna de
                                                            residencia</strong>, etc. <a href="https://deis.minsal.cl"
                                                            class="link-negro"> Los puede consultar acá. </a></p>
                                                </li>
                                                <li>
                                                    <p>Para el(la) enfermo(a) que presente 2 o más afecciones de
                                                        declaración obligatoria, éstas deberán ser registradas en <span
                                                            class="auto-style1"><strong>FORMULARIOS
                                                                SEPARADOS</strong></span> para cada una. Sólo en caso de
                                                        Tuberculosis se registrará en la 2da. línea otro diagnóstico
                                                        relacionado con esta afección.</p>
                                                </li>
                                            </ol>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="reset_form('form_declaracion_eno')" class="btn btn-danger"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!---******* Modal Formulario Reembolso gastos médicos ********-->
<div id="modal_reembolso_medico" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_reembolso_medico" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Reembolso de gastos médicos</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>

            <form id="form_gastos_medicos" method="POST" action="{{ route('dental.registrar_gastos') }}">
                @csrf

                <input type="hidden" name="ficha_id_gastos" id="ficha_id_gastos"
                    value=" @if ($fichaAtencion != null) {{ $fichaAtencion->id }} @endif">

                <input type="hidden" name="paciente_gastos" id="paciente_gastos" value="{{ $paciente->id }}">

                <input type="hidden" name="lugar_gastos" id="lugar_gastos" value="{{ $lugar_atencion->id }}">

                <div class="modal-body">
                    <div class="bt-wizard" id="reembolso_gastos_medicos">
                        <ul class="nav nav-pills">
                            <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                    carga</a></li>
                            <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                            <li class="tab-wizard-formularios"><a href="#ant_reembolso"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a>
                            </li>
                            <li class="tab-wizard-formularios"><a href="#informe_medico"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                            <li class="tab-wizard-formularios"><a href="#info_personal_tratante"
                                    class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane pt-4 active show" id="ident_asegurado_carga">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Aseguradora</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aseguradora_gastos_medicos" id="aseguradora_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº Poliza</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="num_poliza_gastos_medicos" id="num_poliza_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Empresa asociada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="empresa_asociada_gastos_medicos" id="empresa_asociada_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre Asegurado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_asegurado_gastos_medicos" id="nombre_asegurado_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut asegurado</label>
                                        <input type="person" class="form-control form-control-sm"
                                            type="rut_asegurado_gastos_medicos" name="rut_asegurado_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Previsión</label>
                                        <select id="prevision_gastos_medicos" name="prevision_gastos_medicos"
                                            class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>
                                            @foreach ($prevision as $prev)
                                                <option value="{{ $prev->id }}">{{ $prev->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_asegurado_gastos_medicos"
                                            id="nombre_paciente_asegurado_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_carga_gastos_medicos" id="tipo_carga_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="edad_gastos_medicos" id="edad_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="numero_carga_gastos_medicos" id="numero_carga_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ident_causa_solicitud">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Causa de la solicitud</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Causa</label>
                                        <select class="form-control form-control-sm" id="causa_gastos_medicos"
                                            name="causa_gastos_medicos">
                                            <option value="">Seleccione</option>
                                            <option value="1">Accidente</option>
                                            <option value="2">Continuidad de tratamiento</option>
                                            <option value="3">Enfermedad</option>
                                            <option value="4">Embarazo</option>
                                            <option value="5">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Especifique otro</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="especifique_otro_gastos_medicos"
                                            name="especifique_otro_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="diagnostico_causa_gastos_medicos"
                                            name="diagnostico_causa_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Continuidad de tratamiento?</label>
                                        <select class="form-control form-control-sm" id="continuidad_gastos_medicos"
                                            name="continuidad_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            type="fecha_accidente_gastos_medicos" name="fecha_accidente_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar del accidente</label>
                                        <select class="form-control form-control-sm " id="tipo_accidente_gastos_medicos"
                                            name="tipo_accidente_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Vía Pública</option>
                                            <option value="2">Hogar</option>
                                            <option value="3">Trayecto al trabajo</option>
                                            <option value="4">Trayecto al hogar</option>
                                            <option value="5">Trabajo</option>
                                            <option value="6">Tránsito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Por este medio certifico que los datos aportados son verdaderos y
                                                autorizo al médico tratante hospitales o cualquier otra institución
                                                de
                                                salud , para que suministre la información requerida de mi persona o
                                                beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127
                                                del
                                                código Sanitario declaro también conocer y autorizar a que todos los
                                                antecedentes en esta solicitud de reembolso serán del conocimiento
                                                de
                                                las diferentes personas que participan en la evaluación, liquidación
                                                y
                                                traslado de la misma , por lo que libero a la compañía aseguradora
                                                de
                                                toda responsabilidad en el manejo de la misma. En el caso de
                                                requerir
                                                confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                salud con el rotulo de confidencial. Recuerde que en el caso de
                                                accidente del tránsito, <strong>deberá presentar la liquidación del
                                                    seguro obligatorio de accidentes personales.</strong></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="ant_reembolso">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de prestación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_prestación_gastos_medicos" id="fecha_prestación_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Bonos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="bonos_gastos_medicos" id="bonos_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Total de documentos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="total_documentos_gastos_medicos" id="total_documentos_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Boletas</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="boletas_gastos_medicos" id="boletas_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Recetas</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="recetas_gastos_medicos" id="recetas_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diferencia reclamada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diferencia_reclamada_gastos_medicos"
                                            id="diferencia_reclamada_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="otros_gastos_medicos" id="otros_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de reclamos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_reclamos_gastos_medicos" id="numero_reclamos_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ingreso_gastos_medicos" id="fecha_ingreso_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="otros1_gastos_medicos" id="otros1_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Reclamo anterior</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="reclamo_anterior_gastos_medicos" id="reclamo_anterior_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Autorización del usuario</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="autorizacion_usuario_gastos_medicos"
                                            id="autorizacion_usuario_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="informe_medico">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Informe médico tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de inicio de
                                            enfermedad</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_inicio_enfermedad_gastos_medicos"
                                            id="fecha_inicio_enfermedad_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha primera consulta
                                            médica</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primera_consulta_gastos_medicos"
                                            id="fecha_primera_consulta_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de consulta</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_consulta_gastos_medicos" id="fecha_consulta_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_gastos_medicos" id="nombre_paciente_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="edad_paciente_gastos_medicos" id="edad_paciente_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="direccion_paciente" id="direccion_paciente">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_gastos_medicos" id="diagnostico_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Control?</label>
                                        <select class="form-control form-control-sm" id="control_gastos_medicos"
                                            name="control_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Embarazo?</label>
                                        <select class="form-control form-control-sm" id="embarazo_gastos_medicos"
                                            name="embarazo_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de semanas</label>
                                        <select class="form-control form-control-sm" id="num_semanas_gastos_medicos"
                                            name="num_semanas_gastos_medicos">
                                            <option>Seleccione una opción</option>

                                            @for ($i = 0; $i < 52; $i++)
                                                <option value="{{ $i + 1 }}">{{ $i + 1 }}</option>
                                            @endfor

                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fur</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_fur_gastos_medicos" id="fecha_fur_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Complicación en el
                                            embarazo?</label>
                                        <select class="form-control form-control-sm"
                                            id="complicacion_embarazo_gastos_medicos"
                                            name="complicacion_embarazo_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Accidente?</label>
                                        <select class="form-control form-control-sm" id="accidente_gastos_medicos"
                                            name="accidente_gastos_medicos">
                                            <option value="">Seleccione una opción</option>
                                            <option value="1">Si</option>
                                            <option value="2">No</option>
                                            <option value="3">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_accidente1_gastos_medicos" id="fecha_accidente1_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_accidente1_gastos_medicos" id="tipo_accidente1_gastos_medicos">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="lugar_accidente_gastos_medicos" id="lugar_accidente_gastos_medicos">
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane pt-4" id="info_personal_tratante">

                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Profesional tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional" id="rut_profesional"
                                            value="{{ $profesional->rut }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_profesional" id="nombre_profesional"
                                            value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional" id="telefono_profesional"
                                            value="{{ $profesional->telefono_uno }}">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_profesional" id="email_profesional"
                                            value="{{ $profesional->email }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Fecha del informe</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_informe_gastos_medicos" id="fecha_informe_gastos_medicos">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver
                                            documento en
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="reset_form('form_gastos_medicos')" class="btn btn-danger"
                        data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!---******* Modal Formulario Reembolso gastos dentales ********-->
{{--  <div id="modal_reembolso_dental" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_reembolso_dental" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Reembolso de gastos dentales</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="bt-wizard" id="reembolso_gastos_dentales">
                    <ul class="nav nav-pills">
                        <li class="tab-wizard-formularios"><a href="#ident_asegurado_carga_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Identificacion del asegurado o
                                carga</a></li>
                        <li class="tab-wizard-formularios"><a href="#ident_causa_solicitud_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Causa de la solicitud</a></li>
                        <li class="tab-wizard-formularios"><a href="#ant_reembolso_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Antecedentes del reembolso</a></li>
                        <li class="tab-wizard-formularios"><a href="#informe_medico_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Informe médico</a></li>
                        <li class="tab-wizard-formularios"><a href="#tratamientos_dentales"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Tratamientos dentales</a></li>
                        <li class="tab-wizard-formularios"><a href="#ortodoncia" class="nav-link-wizard rounded-0"
                                data-toggle="tab">Ortodoncia</a></li>
                        <li class="tab-wizard-formularios"><a href="#info_profesional_tratante_dental"
                                class="nav-link-wizard rounded-0" data-toggle="tab">Profesional tratante</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane pt-4 active show" id="ident_asegurado_carga_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Identificacion del asegurado o carga</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Aseguradora</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aseguradora_dental" id="aseguradora_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº Poliza</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="num_poliza_dental" id="num_poliza_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Empresa asociada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="empresa_asociada_dental" id="empresa_asociada_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre Asegurado</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_asegurado_dental" id="nombre_asegurado_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut asegurado</label>
                                        <input type="person" class="form-control form-control-sm"
                                            type="rut_asegurado_dental" name="rut_asegurado_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Previsión</label>
                                        <select id="prevision" name="prevision" class="form-control form-control-sm">
                                            <option value="0">Selecione una opción</option>
                                            <option value="particular">Particular</option>
                                            <option value="fonasa">Fonasa</option>
                                            <option value="banmedica">Banmedica</option>
                                            <option value="colmena">Colmena</option>
                                            <option value="cruz verde">Cruz Verde</option>
                                            <option value="nueva masvida">Nueva MasVida</option>
                                            <option value="consalud">Consalud</option>
                                            <option value="control sin costo">Control sin costo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_dental" id="nombre_paciente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_carga_dental" id="tipo_carga_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm" name="edad"
                                            id="edad">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de carga</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="numero_carga_dental" id="numero_carga_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ident_causa_solicitud_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Causa de la solicitud</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Causa</label>
                                        <select class="form-control form-control-sm" id="causa_dental"
                                            name="causa_dental">
                                            <option>Accidente</option>
                                            <option>Continuidad de tratamiento</option>
                                            <option>Enfermedad</option>
                                            <option>Embarazo</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Especifique otro</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="causa_otro_dental" name="causa_otro_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            type="diagnostico_causa_dental" name="diagnostico_causa_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Continuidad de tratamiento?</label>
                                        <select class="form-control form-control-sm" id="causa_dental"
                                            name="causa_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            type="fecha_accidente_dental" name="fecha_accidente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar del accidente</label>
                                        <select class="form-control form-control-sm " id="lugar_accidente_dental"
                                            name="lugar_accidente_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Vía Pública</option>
                                            <option>Hogar</option>
                                            <option>Trayecto al trabajo</option>
                                            <option>Trayecto al hogar</option>
                                            <option>Trabajo</option>
                                            <option>Tránsito</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                            <p>Por este medio certifico que los datos aportados son verdaderos y
                                                autorizo al médico tratante hospitales o cualquier otra institución de
                                                salud , para que suministre la información requerida de mi persona o
                                                beneficiario, conforme lo dispone la LEY Nº 19.628 y el artículo 127 del
                                                código Sanitario declaro también conocer y autorizar a que todos los
                                                antecedentes en esta solicitud de reembolso serán del conocimiento de
                                                las diferentes personas que participan en la evaluación, liquidación y
                                                traslado de la misma , por lo que libero a la compañía aseguradora de
                                                toda responsabilidad en el manejo de la misma. En el caso de requerir
                                                confidencialidad, rogamos enviar en sobre cerrado al departamento de
                                                salud con el rotulo de confidencial. Recuerde que en el caso de
                                                accidente del tránsito, <strong>deberá presentar la liquidación del
                                                    seguro obligatorio de accidentes personales.</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ant_reembolso_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Antecedentes del reembolso</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de prestación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_prestación_dental" id="fecha_prestación_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Bonos</label>
                                        <input type="text" class="form-control form-control-sm" name="bonos_dental"
                                            id="bonos_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Total de documentos</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="total_documentos_dental" id="total_documentos_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Boletas</label>
                                        <input type="text" class="form-control form-control-sm" name="boletas_dental"
                                            id="boletas_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Recetas</label>
                                        <input type="text" class="form-control form-control-sm" name="recetas_dental"
                                            id="recetas_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diferencia reclamada</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diferencia_reclamada_dental" id="diferencia_reclamada_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm" name="otros_dental"
                                            id="otros_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nº de reclamos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_reclamos_dental" id="numero_reclamos_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de ingresos</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_ingreso_dental" id="fecha_ingreso_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Otros</label>
                                        <input type="text" class="form-control form-control-sm" name="otros_dental"
                                            id="otros_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Reclamo anterior</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="reclamo_anterior_dental" id="reclamo_anterior_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Autorización del usuario</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="autorizacion_usuario_dental" id="autorizacion_usuario_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="informe_medico_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Informe médico tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de inicio de enfermedad</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_inicio_enfermedad_dental" id="fecha_inicio_enfermedad_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha primera consulta médica</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primera_consulta_dental" id="fecha_primera_consulta_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de consulta</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_consulta_dental" id="fecha_consulta_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre del paciente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_paciente_dental" id="nombre_paciente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Edad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="edad_paciente_dental" id="edad_paciente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Dirección</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="direccion_paciente_dental" id="direccion_paciente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Diagnóstico</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="diagnostico_dental" id="diagnostico_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Control?</label>
                                        <select class="form-control form-control-sm" id="control_dental"
                                            name="control_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">¿Accidente?</label>
                                        <select class="form-control form-control-sm" id="accidente_dental"
                                            name="accidente_dental">
                                            <option>Seleccione una opción</option>
                                            <option>Si</option>
                                            <option>No</option>
                                            <option>Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de accidente</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_accidente_dental" id="fecha_accidente_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="tipo_accidente_dental" id="tipo_accidente_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Lugar de accidente</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="lugar_accidente_dental" id="lugar_accidente_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="tratamientos_dentales">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Tratamientos dentales</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presntación_dental" id="presntación_dental">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_prestacion_dental" id="numero_prestacion_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Cantidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cantidad_dental" id="cantidad_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                            id="fecha_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Valor unitario</label>
                                        <input type="number" class="form-control form-control-sm" name="valor_dental"
                                            id="valor_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total</label>
                                        <input type="number" class="form-control form-control-sm" name="total_dental"
                                            id="total_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="floating-label-activo-sm">Prestación</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="presntación_dental" id="presntación_dental">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label class="floating-label-activo-sm">Nº</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="numero_prestacion_dental" id="numero_prestacion_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Cantidad</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="cantidad_dental" id="cantidad_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm" name="fecha_dental"
                                            id="fecha_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Valor unitario</label>
                                        <input type="number" class="form-control form-control-sm" name="valor_dental"
                                            id="valor_dental">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="floating-label-activo-sm">Total</label>
                                        <input type="number" class="form-control form-control-sm" name="total_dental"
                                            id="total_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Laboratorio</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="laboratorio_dental" id="laboratorio_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor total reclamo</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_reclamo_dental" id="valor_reclamo_dental">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="ortodoncia">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Ortodoncia</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Tipo de aparato</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="aparato_dental_ortodoncia" id="aparato_dental_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de instalación</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_instalacion_ortodoncia" id="fecha_instalacion_ortodoncia">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Fecha de primer control</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_primer_control_ortodoncia" id="fecha_primer_control_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Duración del tratamiento</label>
                                        <input type="texto" class="form-control form-control-sm"
                                            name="duracion_ortodoncia" id="duracion_ortodoncia">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor clínico del aparato</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_aparato_ortodoncia" id="valor_aparato_ortodoncia">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Valor de controles clínicos</label>
                                        <input type="number" class="form-control form-control-sm"
                                            name="valor_clinico_ortodoncia" id="valor_clinico_ortodoncia">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pt-4" id="info_profesional_tratante_dental">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Profesional tratante</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Rut</label>
                                        <input type="person" class="form-control form-control-sm"
                                            name="rut_profesional" id="rut_profesional">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Nombre</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="nombre_profesional" id="nombre_profesional">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Teléfono</label>
                                        <input type="tel" class="form-control form-control-sm"
                                            name="telefono_profesional_dental" id="telefono_profesional_dental">
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="floating-label-activo-sm">Email</label>
                                        <input type="email" class="form-control form-control-sm"
                                            name="email_profesional_dental" id="email_profesional_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-sm-12">
                                        <h6 class="text-c-blue">Fecha del informe</h6>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="date" class="form-control form-control-sm"
                                            name="fecha_informe_dental" id="fecha_informe_dental">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                            PDF</button>
                                    </div>
                                </div>
                            </form>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>  --}}


<!--Modals Formularios de Consentimientos informados generales-->

<!---******* Modal Formulario Anestesia ********-->
<div id="modal_anestesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_anestesia"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Consentimiento informado anestesia</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Dirección</label>
                            <input type="address" class="form-control form-control-sm" name="direccion" id="direccion">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Región / Comuna</label>
                            <select id="region_comuna" name="region_comuna" class="form-control form-control-sm">
                                <option selected value="0">Seleccione una opción </option>
                                <optgroup label="Región de Valparaíso">
                                    <option>Viña del Mar</option>
                                    <option>Valparaíso</option>
                                    <option>San Felipe</option>
                                    <option>etc...</option>
                                </optgroup>
                                <optgroup label="Región Metropolitana">
                                    <option>Santiago</option>
                                    <option>Maipú</option>
                                    <option>etc...</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_anestesi"
                                id="fecha_anestesi">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6>En representeción de</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre del paciente</label>
                            <input type="person" class="form-control form-control-sm" type="nombre_paciente"
                                name="nombre_paciente">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Incapacitado en estos momentos por</label>
                            <input type="text" class="form-control form-control-sm" type="incapacitacion"
                                name="incapacitacion">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6>Certifico que el profesional</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre del profesional</label>
                            <input type="person" class="form-control form-control-sm" type="nombre_profesional"
                                name="nombre_profesional">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6>Me ha informado acerca de los riesgos y el porqué considera necesario realizar el
                                procedimiento</h6>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre y tipo de anestesia</label>
                            <input type="person" class="form-control form-control-sm" type="nombre_profesional"
                                name="nombre_profesional">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en
                                PDF</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Autentificación</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!--Modals Consultas previas-->
<!---******* Modal Ficha ********-->
<div id="m_consultaant" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_consultaantLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_consultaantLabel">Consulta del..... </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="MotConsulta">Motivo de Consulta</label>
                                <!--fin autollenado-->
                                <input id="MotConsulta" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="AntConsulta">Antecedentes</label>
                                <!--fin autollenado-->
                                <input id="AntConsulta" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="ExFísico">Examen Físico</label>
                                <!--fin autollenado-->
                                <input id="ExFísico" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Dignóstico">Dignóstico</label>
                                <!--fin autollenado-->
                                <input id="Dignóstico" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Receta">Receta</label>
                                <!--fin autollenado-->
                                <input id="Receta" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <label class="floating-label" for="Examenes">Examenes</label>
                                <!--fin autollenado-->
                                <input id="Examenes" type="text" class="form-control form-control-sm">
                            </div>
                        </div>
                    </div>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Exámenes ********-->
<div id="m_cons_ex" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_exLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_exLabel">Exámenes solicitados el.... </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="atenciones_previas_1"
                        class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Urgencia</th>
                                <th class="text-center align-middle">Nombre</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Sangre</td>
                                <td class="text-center align-middle">Normal</td>
                                <td class="text-center align-middle">Hemograma y vhs</td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Otorrinolaríngologico</td>
                                <td class="text-center align-middle">Normal</td>
                                <td class="text-center align-middle">Rinomanometría</td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Sangre</td>
                                <td class="text-center align-middle">Urgente</td>
                                <td class="text-center align-middle">Grupo Sanguíneo</td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Recetas ********-->
<div id="m_cons_receta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_recetaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_recetaLabel">Receta del .... </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="atenciones_previas_2"
                        class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Medicamento</th>
                                <th class="text-center align-middle">Dosis</th>
                                <th class="text-center align-middle">Posología</th>
                                <th class="text-center align-middle">Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Rigotax_D</td>
                                <td class="text-center align-middle">50mg</td>
                                <td class="text-center align-middle">1 al día</td>
                                <td class="text-center align-middle">30 Cáps</td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Prednisona</td>
                                <td class="text-center align-middle">5 mg</td>
                                <td class="text-center align-middle">1 cada 12 horas</td>
                                <td class="text-center align-middle">1 caja de 20 comp</td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Levofloxacino</td>
                                <td class="text-center align-middle">750 mg</td>
                                <td class="text-center align-middle">1 al día</td>
                                <td class="text-center align-middle">10 Comprimidos</td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!---******* Modal Archivos ********-->
{{--
    <div id="m_cons_archivos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="m_cons_archivosLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white" id="m_cons_archivosLabel">Archivos subidos con la consulta ....
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <table id="atenciones_previas_3"
                        class="display table table-striped table-hover dt-responsive nowrap pb-4" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">Fecha</th>
                                <th class="text-center align-middle">Tipo</th>
                                <th class="text-center align-middle">Nombre</th>
                                <th class="text-center align-middle">Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Sangre</td>
                                <td class="text-center align-middle">Hemograma y vhs</td>
                                <td class="text-center align-middle"><button href="#!"
                                        class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver
                                        Archivo</button></td>
                            </tr>
                            <tr>
                                <td class="text-center align-middle">27/07/2021</td>
                                <td class="text-center align-middle">Otorrinolaríngologico</td>
                                <td class="text-center align-middle">Rinomanometría</td>
                                <td class="text-center align-middle"><button href="#!"
                                        class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#m_cons_archivos"><i class="feather icon-folder"></i> Ver
                                        Archivo</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <!--fin autollenado-->
                <div class="modal-footer">
                    <button type="button mt-5" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
--}}

<!--Modals Formularios Enfermedades crónicas y GES-->
<!--******* Modal: GES *******-->
<div id="form_ges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="form_ges" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Constancia GES (Artículo 24 Ley 19.966)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 mt-3">
                        <div class="form-group fill">
                            <label class="floating-label-activo-sm">Seleccione Patología Ges</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_ges" id="nombre_ges">
                            <input type="hidden" class="form-control form-control-sm" name="id_ges" id="id_ges">
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
                                                <label><strong>Nombre Institución: </strong></label>
                                                <span>{{ $lugar_atencion->nombre }}</span>
                                                <input type="hidden" name="nombre_institucion_ficha_ges" id="nombre_institucion_ficha_ges" value="{{ $lugar_atencion->nombre }}">

                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Profesional: </strong></label>
                                                <span>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}</span>

                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Teléfono: </strong></label>
                                                <span>{{ $profesional->telefono_uno }}</span>

                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Dirección: </strong></label>
                                                {{--  <span>{{ $profesional->Direccion()->first()->direccion .' ' .$profesional->Direccion()->first()->numero_dir .', Región de ' .$profesional->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$profesional->Direccion()->first()->Ciudad()->first()->nombre }}</span>  --}}
                                                <span>{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}</span>
                                                <input type="hidden" name="direccion_institucion_ficha_ges" id="direccion_institucion_ficha_ges" value="{{ $lugar_atencion->Direccion()->first()->direccion .' ' .$lugar_atencion->Direccion()->first()->numero_dir .', Región de ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->Region()->first()->nombre .' ' .$lugar_atencion->Direccion()->first()->Ciudad()->first()->nombre }}">

                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Nombre del responsable</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="nombre_responsable_ficha_ges"
                                                    id="nombre_responsable_ficha_ges" value="">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">Rut del responsable</label>
                                                <input type="person" class="form-control form-control-sm"
                                                    name="rut_responsable_ficha_ges" id="rut_responsable_ficha_ges" value="">
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
                                                <label><strong>Nombre: </strong></label>
                                                <span>{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos  }}</span>
                                                <input type="hidden" name="nombre_paciente_ficha_ges" id="nombre_paciente_ficha_ges" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Rut: </strong></label>
                                                <span>{{ $paciente->rut }}</span>
                                                <input type="hidden" name="rut_paciente_ficha_ges" id="rut_paciente_ficha_ges" value="{{ $paciente->rut }}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Previsión: </strong></label>
                                                <span>
                                                    @foreach ($prevision as $previ)
                                                        @if ($previ->id == $paciente->Prevision()->first()->id)
                                                            {{ $previ->nombre }}
                                                            <input type="hidden" name="prevision_ficha_ges" id="prevision_ficha_ges" value="{{ $paciente->Prevision()->first()->id }}"
                                                        @endif
                                                    @endforeach
                                                </span>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Dirección: </strong></label>
                                                <span>{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}</span>
                                                <input type="hidden" name="direccion_paciente" id="direccion_paciente" value="{{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Correo electrónico: </strong></label>
                                                <span>{{ $paciente->email }}</span>
                                                <input type="hidden" name="email_paciente" value="{{ $paciente->email }}" id="email_paciente" >
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label><strong>Teléfono: </strong></label>
                                                <span>{{ $paciente->telefono_uno }}</span>
                                                <input type="hidden" name="telefono_paciente" value="{{ $paciente->telefono_uno }}" id="telefono_paciente" >
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
                                                <input type="text" class="form-control form-control-sm" name="confirmacion_diagnostica_ficha_ges" id="confirmacion_diagnostica_ficha_ges">
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <label class="floating-label-activo-sm">¿Paciente con tratamiento?</label>
                                                <input type="text" class="form-control form-control-sm" name="paciente_tratamiento_ficha_ges" id="paciente_tratamiento_ficha_ges">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-sm-12 col-md-12">
                                                <h6 class="text-c-blue">Fecha Notificación</h6>
                                            </div>
                                            <div class="form-group col-sm-12 col-md-12">
                                                <span>
                                                    <h5 class="text-c-blue">
                                                        {{ Carbon\Carbon::now()->timezone('America/Santiago')->format('d-m-Y H:i') }}
                                                    </h5>
                                                </span>
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
                                                <p>Desea adjuntar algún documento</p>
                                                <input type="file" name="" id="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="alert alert-success text-justify pt-3 pb-1" role="alert">
                                                <p>Declaro que con esta <span>fecha</span> y
                                                    <span>hora</span>, he tomado conocimiento de que tengo derecho a
                                                    acceder a las "Garantías Explícitas en Salud" GES, siempre que la
                                                    atención sea otorgada en la "Red de Prestadores" que me corresponde
                                                    según Fonasa o la Isapre a la que me encuentro adscrito/a.<br> Confirmo mediante el código:.
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-4"><input type="text" class="form-control form-control-sm" name="codigo_validacion_informe_ges" id="codigo_validacion_informe_ges"></div>
                                                    <div class="col-md-4"><button type="button" class="btn btn-info">Renviar Código</button></div>
                                                    <div class="col-md-4"><button type="button" class="btn btn-success" onclick="validar_codigo_ges()">Validar Código</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  <div class="row">  --}}
                                        {{--  <div class="col-sm-12 col-md-12 text-center">  --}}
                                            {{--  <button type="button" class="btn btn-sm btn-primary mt-2 mb-4" onclick="registrar_ges_ficha();">Guardar</button>  --}}
                                        {{--  </div>  --}}
                                    {{--  </div>  --}}
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 text-center">
                                            <button type="button" class="btn btn-sm btn-primary mt-2 mb-4">Ver documento en PDF</button>
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!--Botón Flotante-->
<div class="row">
    <div class="col-sm-12">
        <div class="boton-formularios">
            <input type="checkbox" id="btn-mas">
            <div class="redes">
                <a id="boton_1" class="fas fa-user fa-2x" data-toggle="canvas" data-target="#antecedentes_paciente" aria-expanded="false" aria-controls="bs-canvas-right" title="Antecedentes del paciente" data-placement="left" style="cursor:pointer;"> </a>
                <a id="boton_2" class="fas fa-notes-medical fa-2x" data-toggle="canvas" data-target="#formularios_atencion" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios de atención" data-placement="left" style="cursor:pointer;"></a>
                @if($profesional->SubTipoEspecialidad()->first())
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Otorrinolaringología' )
                        <a id="boton_3" class="fas fa-deaf fa-2x" data-toggle="canvas" data-target="#formularios_orl" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Otorrinolaringología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Oftalmología' )
                        <a id="boton_3" class="fas fa-eye-slash fa-2x" data-toggle="canvas" data-target="#formularios_ojo" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Oftalmología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Cirugía Gástrica' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_cirugia" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Cirugia" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Cirugía Coloproctológica' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_colon" aria-expanded="false" aria-controls="bs-canvas-right" title="Coloproctología" data-placement="left"></a>
                    @endif
                    @if($profesional->SubTipoEspecialidad()->first()->nombre == 'Urología' )
                        <a id="boton_3" class="fas fa-user-ninja fa-2x" data-toggle="canvas" data-target="#formularios_uro" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Urología" data-placement="left"></a>
                    @endif
                @endif
                @if($profesional->TipoEspecialidad()->first())
                    @if($profesional->TipoEspecialidad()->first()->nombre == 'PEDIATRÍA' )
                        <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Pediatria" data-placement="left"></a>
                    @endif
                @endif
                @if($profesional->Especialidad()->first()->nombre == 'ENFERMERA UNIVERSITARIA' )
                    <a id="boton_3" class="fas fa-bezier-curve fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Enfermera Universitaria" data-placement="left"></a>
                @endif
                @if($profesional->Especialidad()->first()->nombre == 'MATRÓN/A' )
                    <a id="boton_3" class="fas fa-child fa-2x" data-toggle="canvas" data-target="#formularios_pediatria" aria-expanded="false" aria-controls="bs-canvas-right" title="Formularios Matrón/a" data-placement="left"></a>
                @endif
            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="fa fa-plus"></label>
            </div>
        </div>
    </div>
</div>


@include('atencion_medica.sidebars.antecedentes_paciente')
@include('atencion_medica.sidebars.formularios_atencion')

@section('js-sidebar')
    <script>
        $(document).ready(function(){
            var bsDefaults = {
                offset: false,
                overlay: true,
                width: '330px'
            },
            bsMain = $('.bs-offset-main'),
            bsOverlay = $('.bs-canvas-overlay');

            $('[data-toggle="canvas"][aria-expanded="false"]').on('click', function() {
                var canvas = $(this).data('target'),
                    opts = $.extend({}, bsDefaults, $(canvas).data()),
                    prop = $(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left';

                if (opts.width === '100%')
                    opts.offset = false;

                $(canvas).css('width', opts.width);
                if (opts.offset && bsMain.length)
                    bsMain.css(prop, opts.width);

                $(canvas + ' .bs-canvas-close').attr('aria-expanded', "true");
                $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr('aria-expanded', "true");
                if (opts.overlay && bsOverlay.length)
                    bsOverlay.addClass('show');
                return false;
            });

            $('.bs-canvas-close, .bs-canvas-overlay').on('click', function() {
                var canvas, aria;
                if ($(this).hasClass('bs-canvas-close')) {
                    canvas = $(this).closest('.bs-canvas');
                    aria = $(this).add($('[data-toggle="canvas"][data-target="#' + canvas.attr('id') +
                        '"]'));
                    if (bsMain.length)
                        bsMain.css(($(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left'),
                            '');
                } else {
                    canvas = $('.bs-canvas');
                    aria = $('.bs-canvas-close, [data-toggle="canvas"]');
                    if (bsMain.length)
                        bsMain.css({
                            'margin-left': '',
                            'margin-right': ''
                        });
                }
                canvas.css('width', '');
                aria.attr('aria-expanded', "false");
                if (bsOverlay.length)
                    bsOverlay.removeClass('show');
                return false;
            });

            $('#wizard_constancia_ges').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });

            $('#enfermedades_declaracion_obligatoria').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });

            $('#reembolso_gastos_medicos').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
            $('#reembolso_gastos_dentales').bootstrapWizard({
                withVisible: false,
                'nextSelector': '.button-next',
                'previousSelector': '.button-previous',
                'firstSelector': '.button-first',
                'lastSelector': '.button-last'
            });
        });

        function registrar_cetificado_reposo() {

            let fecha_inicio_certificado = $('#fecha_inicio_certificado').val();
            let fecha_termino_certificado = $('#fecha_termino_certificado').val();
            let hipotesis_certificado = $('#hipotesis_certificado').val();
            let comentarios_certificado = $('#comentarios_certificado').val();
            let url = "{{ route('ficha_medica.registrar_certificado_reposo') }}";
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        fecha_inicio_certificado: fecha_inicio_certificado,
                        fecha_termino_certificado: fecha_termino_certificado,
                        hipotesis_certificado: hipotesis_certificado,
                        comentarios_certificado: comentarios_certificado,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);
                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();
                        if(response['estado'] == '1')
                        {
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Certificado de reposo.<i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_certificado_reposo').modal('hide');
                            ver_pdf_certificado_reposo($('#id_fc').val());

                        }
                        else
                        {
                            {{--  $('#mensaje').removeClass('alert-success');
                            $('#mensaje').addClass('alert-danger');
                            $('#mensaje').html('Certificado de reposo. Intente nuevamente<i class="fas fa-times"></i>');
                            $('#mensaje').show();  --}}

                            swal({
                                title: "Registro de Certificado de Reposo." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                })
        };

        function ver_pdf_certificado_reposo(id_ficha_atencion)
        {

            let url = "{{ route('pdf.certificado_reposo') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.certificado_reposo") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        function registrar_interconsulta()
        {
            var  mensaje = '';
            var valido = 1;

            let profesion = $('#profesion').val();
            let especialidad = $('#especialidad').val();
            let sub_tipo_especialidad = $('#sub_tipo_especialidad').val();
            let profesional_inter = $('#profesional_inter').val();
            let nombre_profesional_inter = $('#nombre_profesional_inter').val();
            let hipotesis_interconsulta = $('#hipotesis_interconsulta').val();
            let comentarios_interconsulta = $('#comentarios_interconsulta').val();
            let id_fc = $('#id_fc').val();
            let url = "{{ route('ficha_medica.registrar_interconsulta') }}";
            let hora_medica = $('#hora_medica').val();

            if(profesion == '') {
                mensaje += 'Debe ingresar Profesión\n';
                valido = 0;
            }

            if(especialidad == '') {
                mensaje += 'Debe ingresar Especialidad\n';
                valido = 0;
            }

            // if(sub_tipo_especialidad == '') {
            //     mensaje += 'Debe ingresar Sub Tipo Especialidad\n';
            //     valido = 0;
            // }
            // if(profesional_inter == '') {
            //     mensaje += 'Debe ingresar profesional_inter\n';
            //     valido = 0;
            // }
            // if(nombre_profesional_inter == '') {
            //     mensaje += 'Debe ingresar nombre_profesional_inter\n';
            //     valido = 0;
            // }

            if(hipotesis_interconsulta == '') {
                mensaje += 'Debe ingresar Hipótesis diagnóstica\n';
                valido = 0;
            }
            if(comentarios_interconsulta == '') {
                mensaje += 'Debe ingresar que desea saber\n';
                valido = 0;
            }

            if(valido == 1)
            {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            profesion: profesion,
                            especialidad: especialidad,
                            sub_tipo_especialidad: sub_tipo_especialidad,
                            profesional_inter: profesional_inter,
                            nombre_profesional_inter: nombre_profesional_inter,
                            hipotesis_interconsulta: hipotesis_interconsulta,
                            comentarios_interconsulta: comentarios_interconsulta,
                            id_fc: id_fc,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha creado la interconsulta de forma correcta');
                            $('#mensaje').show();
                            $('#modal_interconsulta').modal('hide');
                            ver_pdf_interconsulta(response.id_last);
                        }
                        else
                        {
                            swal({
                                title: "Se ha presentado un problema al registrar." ,
                                icon: "error",
                            })
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);

                    })

            }
            else
            {
                swal({
                    title: "Complete los datos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }
        };

        function enviar_respuesta_interconsulta()
        {
            var  mensaje = '';
            var valido = 1;

            let inter_id = $('#inter_id').val();
            let inter_resp_diagnostico = $('#inter_resp_diagnostico').val();
            let inter_resp_tratamiento = $('#inter_resp_tratamiento').val();
            let inter_resp_comentario = $('#inter_resp_comentario').val();
            let requiere_control = $('#requiere_control').prop('checked');
            let id_fc = $('#id_fc').val();
            let url = "{{ route('ficha_medica.registrar_interconsulta_respuesta') }}";


            if(inter_resp_diagnostico == '') {
                mensaje += 'Debe ingresar Diagnostico\n';
                valido = 0;
            }
            if(inter_resp_tratamiento == '') {
                mensaje += 'Debe ingresar Tratamiento\n';
                valido = 0;
            }


            if(valido == 1)
            {
                $.ajax({
                        url: url,
                        type: 'GET',
                        data: {
                            inter_id : inter_id,
                            inter_resp_diagnostico : inter_resp_diagnostico,
                            inter_resp_tratamiento : inter_resp_tratamiento,
                            inter_resp_comentario : inter_resp_comentario,
                            requiere_control : requiere_control,
                            id_fc : id_fc,
                        },
                    })
                    .done(function(response) {

                        if (response.estado == 1) {
                            console.log(response);
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').text('Se ha enviado la respuesta de la interconsulta de forma correcta');
                            $('#mensaje').show();
                            $('#modal_interconsulta_respuesta').modal('hide');
                            ver_pdf_interconsulta(inter_id);
                        }
                        else
                        {
                            swal({
                                title: "Se ha presentado un problema al registrar." ,
                                icon: "error",
                            })
                        }
                    })
                    .fail(function(e) {
                        console.log("error");
                        console.log(e);

                    })

            }
            else
            {
                swal({
                    title: "Complete los datos." ,
                    text: mensaje,
                    icon: "error",
                    // buttons: "Aceptar",
                    //SuccessMode: true,
                })
            }

        }

        function ver_pdf_interconsulta(id_interconsulta)
        {

            let url = "{{ route('pdf.interconsulta') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.interconsulta") }}?id_interconsulta='+id_interconsulta,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }


        function registrar_informe_medico() {

            {{-- let fecha_informe_medico = $('#fecha_informe_medico').val(); --}}
            let comentarios_informe_medico = $('textarea#comentarios_informe_medico').val();
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('ficha_medica.registrar_informe_medico') }}";

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        comentarios_informe_medico: comentarios_informe_medico,
                        hora_medica: hora_medica,
                        id_lugar_atencion: id_lugar_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);

                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();

                        if(response['estado'] == '1')
                        {
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Informe medico. <i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_inf_medico').modal('hide');

                            ver_pdf_informe_medico($('#id_fc').val());
                        }
                        else
                        {
                            swal({
                                title: "Registro de Informe Medico." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }


                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);

                })
        };

        function ver_pdf_informe_medico(id_ficha_atencion)
        {

            let url = "{{ route('pdf.informe_medico') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.informe_medico") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        function registrar_uso_personal() {


            let dirigido_a = $('#uso_personal_dirigido_a').val();
            let cargo = $('#uso_personal_cargo').val();
            let mensaje = $('textarea#uso_personal_mensaje').val();
            let hora_medica = $('#hora_medica').val();
            let id_lugar_atencion = $('#id_lugar_atencion').val();
            let url = "{{ route('ficha_medica.registrar_uso_personal') }}";

            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        dirigido_a : dirigido_a,
                        cargo : cargo,
                        mensaje : mensaje,
                        hora_medica : hora_medica,
                        id_lugar_atencion : id_lugar_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {
                        console.log(response);

                        $('#mensaje').removeClass('alert-success');
                        $('#mensaje').removeClass('alert-danger');
                        $('#mensaje').hide();

                        if(response['estado'] == '1')
                        {
                            //$('#form_control_obesidad').trigger("reset");
                            $('#mensaje').addClass('alert-success');
                            $('#mensaje').removeClass('alert-danger');
                            $('#mensaje').html('Uso Personal. <i class="fas fa-check"></i>');
                            $('#mensaje').show();
                            $('#modal_uso_personal').modal('hide');

                            ver_pdf_uso_personal($('#id_fc').val());
                        }
                        else
                        {
                            swal({
                                title: "Registro de Uso Personal." ,
                                text: response['msj'],
                                icon: "error",
                                // buttons: "Aceptar",
                                //SuccessMode: true,
                            })
                        }


                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);

                })
        };

        function ver_pdf_uso_personal(id_ficha_atencion)
        {

            let url = "{{ route('pdf.uso_personal') }}";
            Fancybox.show(
                [
                    {
                    src: '{{ route("pdf.uso_personal") }}?id_ficha_atencion='+id_ficha_atencion,
                    type: "iframe",
                    preload: false,
                    },
                ]
            );
        }

        {{--  ESPECIALIDADES Y SUB_ESPECIALIDAD  --}}
        function buscar_tipo_especialidad()
        {

            let tipo_especialidad_registro = $('#especialidad');
            tipo_especialidad_registro.find('option').remove();

            let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#profesion').val();
            let url = "{{ route('home.buscar_especialidad') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    especialidad: especialidad,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    let especialidades = $('#especialidad');

                    especialidades.find('option').remove();
                    especialidades.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        especialidades.append('<option value="0">No Aplica</option>');
                        especialidades.val(0);

                        let sub_especialidades = $('#sub_tipo_especialidad');
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });

        }

        function buscar_sub_tipo_especialidad()
        {
            let sub_tipo_especialidad_registro = $('#sub_tipo_especialidad');
            sub_tipo_especialidad_registro.find('option').remove();

            let especialidad = $('#especialidad').val();
            let url = "{{ route('home.buscar_sub_tipo_especialidad') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    especialidad: especialidad,
                },
            })
            .done(function(data) {
                if (data != null) {
                    data = JSON.parse(data);
                    console.log(data);
                    console.log(data.length);
                    let sub_especialidades = $('#sub_tipo_especialidad');

                    sub_especialidades.find('option').remove();
                    sub_especialidades.append('<option value="">Seleccione</option>');
                    if(data.length > 0)
                    {
                        $(data).each(function(i, v) { // indice, valor
                            sub_especialidades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
                        })
                    }
                    else
                    {
                        sub_especialidades.append('<option value="0">No Aplica</option>');
                        sub_especialidades.val(0);
                    }


                } else {
                    alert('No se pudo Cargar los tipos de especialidad');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_profesional()
        {
            let profesional_inter = $('#profesional_inter');
            profesional_inter.find('option').remove();

            let profesion = $('#profesion').val();
            let especialidad = $('#especialidad').val();
            let sub_tipo_especialidad = $('#sub_tipo_especialidad').val();
            let url = "{{ route('profesional.buscar') }}";
            $.ajax({
                url: url,
                type: "get",
                data: {
                    //_token: _token,
                    id_especialidad: profesion,
                    id_tipo_especialidad: especialidad,
                    id_sub_tipo_especialidad: sub_tipo_especialidad,
                },
            })
            .done(function(data) {
                if (data.estado = 1) {

                    console.log(data);
                    console.log(data.registros.length);


                    profesional_inter.find('option').remove();
                    profesional_inter.append('<option value="">Seleccione</option>');
                    if(data.registros.length > 0)
                    {
                        $(data.registros).each(function(i, v) { // indice, valor
                            profesional_inter.append('<option value="' + v.id + '">' + v.nombre + ' ' + v.apellido_uno + ' ' + v.apellido_dos + '</option>');
                        })
                        profesional_inter.append('<option value="OTRO">Otro</option>');
                    }
                    else
                    {
                        profesional_inter.append('<option value="0">Sin Especialista</option>');
                        profesional_inter.append('<option value="OTRO">Otro</option>');
                        profesional_inter.val(0);
                    }

                    $('#profesional_inter').change(function(){
                        var id_actual  = $('#profesional_inter option:selected').val();
                        var text_actual  = $('#profesional_inter option:selected').text();
                        if(id_actual == 'OTRO'){
                            $('.nombre_profesional_inter').show();
                            $('#nombre_profesional_inter').val('Ingrese nombre del profesional');
                        }
                        else
                        {
                            $('.nombre_profesional_inter').hide();
                            $('#nombre_profesional_inter').val(text_actual);
                        }

                    });

                } else {
                    console.log('No se encontro profesional');
                }

            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log(jqXHR, ajaxOptions, thrownError)
            });
        }

        function buscar_receta(id_ficha_clinica) {

            {{--  url = '{{ route('buscar.recetas') }}';  --}}
            url = '{{ route('detalle_receta.ver_medicamentos') }}';
            id_ficha = id_ficha_clinica;
            $('#tabla_receta tbody').empty();

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_receta').text('Receta de Paciente: ' + data.paciente.nombre_paciente);

                        if(data.estado == 1)
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var medicamento = value.producto;
                                var presentacion = value.presentacion;
                                var posologia = value.posologia;
                                var via_administracion = value.via_administracion;
                                var periodo = value.periodo;
                                var uso_cronico = value.uso_cronico;
                                var cantidad_compr = value.cantidad_compra;

                                if(uso_cronico == 1)
                                    uso_cronico = 'USO CRONICO';
                                else
                                    uso_cronico = 'NORMAL';

                                var j = 1; //contador para asignar id al boton que borrara la fila
                                var fila =  '<tr class="tr_receta" id="row' + j + '">'+
                                                '<td>' + fecha + '</td>'+
                                                '<td>' + medicamento + '</td>'+
                                                '<td>' + presentacion + '</td>'+
                                                '<td>' + posologia + '</td>'+
                                                '<td>' + via_administracion + '</td>'+
                                                '<td>' + periodo + '</td>'+
                                                '<td>' + uso_cronico + '</td>'+
                                                '<td>' + cantidad_compr + '</td>'+
                                            '</tr>';
                                            //esto seria lo que contendria la fila

                                $('#tabla_atenciones_previas_receta tbody').append(fila);
                            });
                        }
                        else
                        {
                            $('#tabla_atenciones_previas_receta tbody').html('');
                            var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#tabla_atenciones_previas_receta tbody').append(fila);
                        }

                    } else {
                        $('#tabla_atenciones_previas_receta tbody').html('');
                        var fila = '<tr><td colspan="8"><span><h5>no existen registros</h5></span></td></tr>';
                        $('#tabla_atenciones_previas_receta tbody').append(fila);
                    }
                    $('#m_cons_receta').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#tabla_atenciones_previas_receta').dataTable().fnClearTable();
                $('#tabla_atenciones_previas_receta').dataTable().fnDestroy();
                $('#tabla_atenciones_previas_receta').DataTable({
                    responsive: true,
                    "bPaginate": false,
                    "searching": false
                });

        }

        function buscar_examenes(id_ficha_clinica)
        {

            {{-- url = "{{ route('buscar.examenes_ficha') }}"; --}}
            url = "{{ route('examenes.ver_examenes') }}";
            id_ficha = id_ficha_clinica;
            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#id_ficha_examen').text('Exámenes de: ' + data.paciente.nombre_paciente);
                        if(data.estado == 1)
                        {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.created_at);
                                //var salida = formato(fecha);
                                var examen = value.examen;
                                var tipo_examen = value.tipo_examen;
                                var prioridad = value.id_prioridad;

                                switch (prioridad) {
                                    case 1:
                                        prioridad = 'Baja';
                                        break;
                                    case 2:
                                        prioridad = 'Media';
                                        break;
                                    case 3:
                                        prioridad = 'Alta';
                                        break;
                                    case 4:
                                        prioridad = 'Urgente';
                                        break;

                                    default:
                                        prioridad = 'Sin Prioridad';
                                        break;
                                }

                                var fila = '';
                                fila += '<tr class="tr_examen" id="row' + j + '">';
                                fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                fila += '    <td class="text-center align-middle">' + examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + tipo_examen + '</td>';
                                fila += '    <td class="text-center align-middle">' + prioridad + '</td>';
                                fila += '</tr>'; //esto seria lo que contendria la fila

                                j++;

                                $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);

                            });
                        }
                        else
                        {
                            $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                            var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atecion_previa_tabla_examen_paciente tbody').html('');
                        var fila = '<tr><td colspan="4"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atecion_previa_tabla_examen_paciente tbody').append(fila);
                    }
                    $('#m_cons_examen').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnClearTable();
                $('#table_atecion_previa_tabla_examen_paciente').dataTable().fnDestroy();
                $('#table_atecion_previa_tabla_examen_paciente').DataTable({
                    responsive: true,
                    "bPaginate": false,
                });

        }

        function buscar_archivos(id_ficha_clinica)
        {

            let url = "{{ route('ficha_atencion.ver_archivos') }}";
            let id_ficha = id_ficha_clinica;
            $('#table_atenciones_previas_archivos tbody').html('');

            $.ajax({
                    url: url,
                    type: "get",
                    data: {
                        id_ficha_atencion_soli: id_ficha
                    },
                    dataType: "json",
                })
                .done(function(data) {
                    if (data != null) {

                        $('#m_cons_archivosLabel').text('Documentos de esta consulta del Paciente: ' + data.paciente.nombre);
                        if(data.estado == 1)
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
                            var j = 1; //contador para asignar id al boton que borrara la fila
                            $.each(data.registros, function(index, value)
                            {
                                var fecha = formatDate(value.fecha);
                                var tipo = value.tipo;
                                var id = value.id;
                                var id_ficha_archivo = value.id_ficha;
                                var url = value.url;

                                var metodo='';
                                switch (tipo) {
                                    case 'Certificado de Reposo':
                                        metodo = 'ver_pdf_certificado_reposo'+'('+id_ficha_archivo+')';
                                        break;
                                    case 'Interconsulta':
                                        metodo = 'ver_pdf_interconsulta'+'('+id+')';
                                        break;
                                    case 'Informen Medico':
                                        metodo = 'ver_pdf_informe_medico'+'('+id_ficha_archivo+')';
                                        break;
                                    case 'Uso Personal':
                                        metodo = 'ver_pdf_uso_personal'+'('+id_ficha_archivo+')';
                                        break;

                                    default:
                                        metodo = '';
                                        break;
                                }

                                var fila = '';
                                fila += '<tr class="tr_examen" id="row' + j + '">';
                                fila += '    <td class="text-center align-middle">' + fecha + '</td>';
                                fila += '    <td class="text-center align-middle">' + tipo + '</td>';
                                if(metodo != '')
                                    fila += '    <td class="text-center align-middle"><div onclick="'+metodo+'; $(\'#m_cons_archivos\').modal(\'hide\');" class="btn btn-success btn-sm has-ripple"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                else
                                    fila += '    <td class="text-center align-middle"><div class="btn btn-success btn-sm has-ripple disabled"><i class="feather icon-folder"></i> Ver Archivo</div></td>';
                                fila += '</tr>';

                                j++;

                                $('#table_atenciones_previas_archivos tbody').append(fila);

                            });
                        }
                        else
                        {
                            $('#table_atenciones_previas_archivos tbody').html('');
                            var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>';
                            $('#table_atenciones_previas_archivos tbody').append(fila);
                        }

                    }
                    else
                    {
                        $('#table_atenciones_previas_archivos tbody').html('');
                        var fila = '<tr><td colspan="3"><span><h5>no existen registros</h5></span></td></tr>'
                        $('#table_atenciones_previas_archivos tbody').append(fila);
                    }
                    $('#m_cons_archivos').modal('show');
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });

                $('#table_atenciones_previas_archivos').dataTable().fnClearTable();
                $('#table_atenciones_previas_archivos').dataTable().fnDestroy();
                $('#table_atenciones_previas_archivos').DataTable({
                    responsive: true,
                    "bPaginate": false,
                    "searching": false
                });

        }

        function buscar_receta_ficha(id) {
            console.log(id);
        };

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;

            return [day, month, year].join('-');
        }

        function  buscar_ficha_atencion(id_ficha_atencion)
        {
            let url = "{{ route('ficha_clinica.get_ficha') }}";


            $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        id_ficha_atencion: id_ficha_atencion,
                    },
                })
                .done(function(response) {

                    if (response != '') {

                        if (response['estado'] == '1')
                        {
                            $('#m_consultaantLabel').html( 'Datos de Consulta de: '+response.paciente.nombre);
                            $('#label_motivo').html(response.registros.motivo);
                            $('#label_examen_fisico').html(response.registros.examen_fisico);
                            $('#label_antecedentes').html(response.registros.antecedentes);
                            $('#label_diagnostico').html(response.registros.hipotesis_diagnostico);


                        } else {
                            $('#label_motivo').html('');
                            $('#label_examen_fisico').html('');
                            $('#label_antecedentes').html('');
                            $('#label_diagnostico').html('');
                        }
                        $('#m_consultaant').modal('show');
                    }
                })
                .fail(function(e) {
                    console.log("error");
                    console.log(e);
                });
        }


    </script>
@endsection
