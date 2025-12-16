
ingreso
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Solicitud de Pabellon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
                    <div class="col-md-12 py-0 px-2 shadow-none">
                        <div class="row mx-0">
                            <div class="col-md-12">
                            </div>
                        </div>
                        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-12 mt-3 mb-1">
                                        <div class="form-row">
                                            <div class="form-group col-md-3 ">
                                                <h6 class="f-16 text-c-blue">Ingreso del paciente</h6>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>


                                      {{--<input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon" value="{{ $id_solicitud_pabellon }}">--}}

                                    {{--
                                    <input type="hidden" name="medicamentos_cirugia" id="medicamentos_cirugia">
                                    <input type="hidden" name="examenes_cirugia" id="examenes_cirugia">
                                    --}}

                                    <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="quirurgica">
                                     {{-- <input type="hidden" name="id_ingreso_paciente" id="id_ingreso_paciente" value="{{ $ingreso_paciente->id }}">--}}

                                    <div class="row">
                                        <!--Anamnesis-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Anamnesis</h6>
                                                </div>
                                                <div class="card-body shadow-none">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <textarea name="anamnesis" id="anamnesis" class="form-control form-control-sm" rows="2" onfocus="this.rows=4"onblur="this.rows=2;"></textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Antecedetes y examen físico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Antecedetes y examen físico</h6>
                                                </div>
                                                <div class="card-body shadow-none">

                                                    <div class="form-row">
                                                      {{--  @if (isset($ingreso_paciente->antecedentes_examenes_fisicos))
                                                            <div class="form-group col-md-12">--}}
                                                                <input name="antecedentes_examenes_fisicos"
                                                                    id="antecedentes_examenes_fisicos"
                                                                    class="form-control form-control-sm"
                                                                 {{--    value="{{ $ingreso_paciente->antecedentes_examenes_fisicos }} ">--}}
                                                            </div>
                                                            {{-- @else--}}
                                                            <div class="form-group col-md-12">
                                                                <textarea name="antecedentes_examenes_fisicos" id="antecedentes_examenes_fisicos" class="form-control form-control-sm"
                                                                    rows="2" onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                            </div>
                                                        {{-- @endif--}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Diagnóstico-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Diagnóstico</h6>
                                                </div>
                                                <div class="card-body shadow-none">

                                                    <div class="form-row">
                                                        {{-- @if (isset($ingreso_paciente->hipotesis_diagnostica))--}}
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis
                                                                    diagnóstica</label>
                                                                <input name="hipotesis_diagnostica"
                                                                    id="hipotesis_diagnostica"
                                                                    class="form-control form-control-sm"
                                                                    {{-- value="{{ $ingreso_paciente->hipotesis_diagnostica }} ">--}}
                                                            </div>
                                                        {{-- @else--}}
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Hipótesis
                                                                    diagnóstica</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="hipotesis_diagnostica"
                                                                    id="hipotesis_diagnostica">
                                                            </div>
                                                        {{-- @endif--}}
                                                        {{--@if (isset($ingreso_paciente->diagnostico_cie10))--}}
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Diagnóstico
                                                                    CIE-10</label>
                                                                <input name="diagnostico_cie10" id="diagnostico_cie10"
                                                                    class="form-control form-control-sm"
                                                                 {{--   value="{{ $ingreso_paciente->diagnostico_cie10 }} ">--}}
                                                            </div>
                                                       {{-- @else--}}
                                                            <div class="form-group col-md-6">
                                                                <label class="floating-label">Diagnóstico
                                                                    CIE-10</label>
                                                                <input type="text"
                                                                    class="form-control form-control-sm"
                                                                    name="diagnostico_cie10" id="diagnostico_cie10">
                                                            </div>
                                                       {{-- @endif--}}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--Indicaciones de ingreso-->
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Indicaciones de ingreso</h6>
                                                </div>
                                                <div class="card-body shadow-none">


                                                    <div class="form-row">

                                                       {{-- @if (isset($ingreso_paciente->indicaciones_ingreso))--}}
                                                    </div>
                                                            <div class="form-group col-md-12">

                                                                <input name="indicaciones_ingreso"
                                                                    id="indicaciones_ingreso"
                                                                    class="form-control form-control-sm"
                                                                  {{--  value="{{ $ingreso_paciente->indicaciones_ingreso }} ">--}}
                                                                </div>
                                                            </div>
                                                       {{-- @else--}}
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <textarea name="indicaciones_ingreso" id="indicaciones_ingreso" class="form-control form-control-sm" rows="2"
                                                                    onfocus="this.rows=4" onblur="this.rows=2;"></textarea>
                                                            </div>
                                                        {{--@endif--}}
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Preparar para
                                                                operar a
                                                                las</label>
                                                            {{-- @if (isset($ingreso_paciente->hora_operacion))--}}
                                                                <input type="time"
                                                                    class="form-control form-control-sm"
                                                                    name="hora_operacion" id="hora_operacion"
                                                                     {{--value="{{ $ingreso_paciente->hora_operacion }}">--}}
                                                            {{-- @else--}}
                                                                <input type="time"
                                                                    class="form-control form-control-sm"
                                                                    name="hora_operacion" id="hora_operacion">
                                                            {{-- @endif--}}
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Hospitalizar en</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="hospitalizar_en" id="hospitalizar_en"
                                                                {{-- value="@if (isset($ingreso_paciente->hospitalizar_en)) {{ $ingreso_paciente->hospitalizar_en }} @endif">--}}
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label">Tipo de sala</label>
                                                            <input type="text" class="form-control form-control-sm"
                                                                name="tipo_sala" id="tipo_sala"
                                                                 {{--value="@if (isset($ingreso_paciente->tipo_sala)) {{ $ingreso_paciente->tipo_sala }} @endif">--}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card">

                                                <div class="card-header bg-info align-middle">
                                                    <h6 class="float-left d-inline">Medicamentos</h6>
                                                </div>
                                                <div class="card-body shadow-none">
                                                    {{-- @if (isset($medicamentos_ingreso_paciente))--}}
                                                        {{-- @foreach ($medicamentos_ingreso_paciente as $med_ip)--}}
                                                            <div class="col-md-12">
                                                                {{-- <span>{{ $med_ip->producto }}</span>--}}
                                                            </div>
                                                        {{-- @endforeach--}}
                                                    {{-- @endif--}}
                                                </div>

                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-header bg-info align-middle">
                                            <h6 class="float-left d-inline">Examenes</h6>
                                        </div>


                                        <div class="card-body shadow-none">
                                            @if (isset($examenes_ingreso_paciente))
                                                @foreach ($examenes_ingreso_paciente as $exa_ip)
                                                    <div class="col-md-12">

                                                        <span>{{ $exa_ip->examen . ' - ' . $exa_ip->tipo_examen }}</span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!--Indicaciones-->
                                <div class="col-sm-12 mt-1">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                                onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar
                                                medicamento</button>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <button type="button" class="btn btn-success btn-block btn-sm mt-1"
                                                onclick="mostrar_modal_examen_cirguria();"><i class="fa fa-plus"></i>
                                                Indicar
                                                examen</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                                        <hr>
                                        <div class="row mb-3">
                                            <div class="col-md-12 text-center">
                                                <button type="reset" class="btn btn-danger">Borrar</button>
                                                <button type="submit"
                                                    onclick="agregar_medicamentos_cirugia(); agregar_examenes_cirugia();"
                                                    class="btn btn-info">
                                                   {{-- @if (isset($ingreso_paciente))--}}
                                                        Actualizar Ingreso
                                                   {{-- @else--}}
                                                        Enviar ingreso
                                                   {{-- @endif--}}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6"><button type="button" class="btn btn-danger" data-dismiss="modal"
                            aria-label="Close">Cancelar</button></div>
                    <div class="col-md-6"><button type="button" class="btn btn-success">Guardar</button></div>
                </div>
            </div>
        </div>
    </div>
</div>



{{--
@include('app.cirugia.modals.modals_cesarea.modal_indicar_examenes')
@include('app.cirugia.modals.modals_cesarea.modal_indicar_medicamentos')
--}}
