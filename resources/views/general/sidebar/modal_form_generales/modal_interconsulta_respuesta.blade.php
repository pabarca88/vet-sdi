<div id="modal_interconsulta_respuesta" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_interconsulta_respuesta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Respuesta Interconsulta</h5>
                <button type="button" class="close text-white" onclick="$('#modal_interconsulta_respuesta').modal('hide')"  data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body mb-0">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Nombre</label>
                        <input class="form-control form-control-sm" name="nombre_paciente_interconsulta" id="nombre_paciente_interconsulta" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Rut</label>
                        <input class="form-control form-control-sm"  name="rut_paciente_interconsulta" id="rut_paciente_interconsulta" value="{{ $paciente->rut }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-12">
                        <label class="floating-label-activo-sm">Edad</label>
                        <input class="form-control form-control-sm" name="edad_paciente_interconsulta" id="edad_paciente_interconsulta" value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}">
                    </div>

                </div>

                <ul class="nav nav-tabs-aten nav-fill mb-4 mt-3" id="pills-tab-interconsulta" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset active" id="pills-tab-inter-especialidad" data-toggle="pill" href="#pills-inter-especialidad" role="tab" aria-controls="pills-home" aria-selected="true">Interconsulta Especialidad</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-aten text-reset" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Responder Interconsulta</a>
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
                                        <input class="form-control form-control-sm">{{ $interconsulta->hipotesis }}>
                                    @else
                                        <input class="form-control form-control-sm">
                                    @endif
                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label class="floating-label-activo-sm">Se desea saber</label>
                                    @if(isset($interconsulta) )
                                        <input class="form-control form-control-sm" >{{ $interconsulta->comentarios }}>
                                    @else
                                        <input class="form-control form-control-sm">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer pt-2 pb-0">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_interconsulta_respuesta').modal('hide')" ><i class="feather icon-x"></i> Cancelar</button>
                                @if(!isset($interconsulta) )
                                <button type="button" onclick="registrar_interconsulta();" class="btn btn-info btn-sm"><i class="feather icon-check"></i> Guardar</button>
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
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="$('#modal_interconsulta_respuesta').modal('hide')" ><i class="feather icon-x"></i> Cancelar</button>
                                <button type="button" class="btn btn-info btn-sm" onclick="enviar_respuesta_interconsulta();"><i class="feather icon-check"></i> Enviar Respuesta</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
