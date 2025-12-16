<div id="modal_examenbiopsia_cirugia" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_examenbiopsia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Orden de Biopsia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_biopsia_cirugia"
                    action="@if (isset($biopsia)) {{ route('cirugia.actualizar_biopsia_cesarea') }} @else  {{ route('cirugia.registrar_biopsia_cesarea') }} @endif"
                    method="post">

                    @csrf
                    {{-- <input type="hidden" name="ficha_id" id="ficha_id"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif"> --}}
                    {{-- <input type="hidden" name="paciente_biopsia" id="paciente_biopsia" value="{{ $paciente->id }}"> --}}
                    @if (isset($protocolo))
                        <input type="hidden" name="id_protocolo" id="id_protocolo" value="{{ $protocolo->id }}">
                    @endif
                    @if (isset($solicitud_pabellon))
                        <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                            value="{{ $solicitud_pabellon->id }}">
                    @endif
                    @if (isset($biopsia))
                        <input type="hidden" name="id_biopsia" id="id_biopsia" value="{{ $biopsia->id }}">
                    @endif
                    <div class=" form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <script>
                                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                                    "Octubre", "Noviembre", "Diciembre");
                                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var f = new Date();
                                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
                                    .getFullYear());
                            </script>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Enviar a Lab anatomía Patológica</label>
                            <input type="text" class="form-control form-control-sm" name="laboratorio_patologia"
                                id="laboratorio_patologia"
                                value="@if (isset($biopsia)) {{ $biopsia->laboratorio_patologia }} @endif">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Diagnóstico pre-op</label>
                            <input type="text" class="form-control form-control-sm" name="diagnostico_pre"
                                id="diagnostico_pre"
                                value="@if (isset($biopsia)) {{ $biopsia->diagnostico_pre }} @endif">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Diagnóstico post-op</label>
                            <input type="text" class="form-control form-control-sm" name="diagnostico_post"
                                id="diagnostico_post"
                                value="@if (isset($biopsia)) {{ $biopsia->diagnostico_post }} @endif">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Organo o Localización</label>
                            <input type="text" class="form-control form-control-sm" name="organo_localizacion"
                                id="organo_localizacion"
                                value="@if (isset($biopsia)) {{ $biopsia->organo_localizacion }} @endif">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Enfermedades asociadas</label>
                            <input type="text" class="form-control form-control-sm" name="enfermedades_asociadas"
                                id="enfermedades_asociadas"
                                value="@if (isset($biopsia)) {{ $biopsia->laboratorio_patologia }} @endif">
                        </div>

                        <div class="form-group col-sm-12 col-md-12">
                            <label><strong>Biopsia Rápida</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="biopsia_rapida" name="biopsia_rapida"
                                    @if (isset($biopsia) && $biopsia->biopsia_rapida == 1) checked @endif>
                                <label for="biopsia_rapida" class="cr"></label>
                            </div>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label">Información adicional</label>
                            <input type="text" class="form-control form-control-sm" name="informacion_adicional"
                                id="informacion_adicional"
                                value="@if (isset($biopsia)) {{ $biopsia->informacion_adicional }} @endif">

                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="reset_form('form_biopsia_cirugia')" class="btn btn-danger"
                                data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-info">
                                @if (isset($biopsia))
                                    Actualizar
                                @else
                                    Guardar
                                @endif
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
