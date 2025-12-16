<div id="neonatologia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="neonatologia"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Neonatología</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        X
                    </span>
                </button>
            </div>
            <form id="form_ingreso_paciente"
                action="@if (isset($ficha_neonatologica)) {{ route('cirugia.actualizar_ficha_neonatoligica') }} @else {{ route('cirugia.registrar_ficha_neonatoligica') }} @endif"
                method="POST">

                @csrf

                <input type="hidden" name="id_solicitud_pabellon" id="id_solicitud_pabellon"
                    value="{{ $id_solicitud_pabellon }}">

                <input type="hidden" name="tipo_cirugia" id="tipo_cirugia" value="obstetrico">
                @if (isset($ficha_neonatologica))
                    <input type="hidden" name="ficha_neonatologica" id="ficha_neonatologica"
                        value="{{ $ficha_neonatologica->id }}">
                @endif
                <div class="modal-body mb-0">
                    <form id="neonatologia">
                        <div class="form-row">
                            <h6 class="mb-3">I.- Datos de hospitalización</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label">Clínica / Hospital</label>
                                <input type="text" class="form-control form-control-sm" name="clinica_hospital"
                                    id="clinica_hospital" value="{{ $lugar_atencion->nombre }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Rut madre</label>
                                <input type="text" class="form-control form-control-sm" name="rut_madre" id="rut_madre"
                                    value="{{ $paciente->rut }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Semanas de gestación</label>
                                <input type="number" class="form-control form-control-sm" name="sem_gest" id="sem_gest"
                                    value="{{ $solicitud_pabellon->semanas_embarazo }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">II.- Datos del recién nacido</h6>
                        </div>
                        <div class="form-row">
                            {{-- {{ dd($ficha_neonatologica) }} --}}
                            @if (isset($ficha_neonatologica))
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                    <input type="date" value="{{ $ficha_neonatologica->fecha_nacimiento }}"
                                        class="form-control form-control-sm" name="fecha_nacimiento"
                                        id="fecha_nacimiento">
                                </div>
                            @else
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                    <input type="date" class="form-control form-control-sm" name="fecha_nacimiento"
                                        id="fecha_nacimiento">
                                </div>
                            @endif
                            @if (isset($ficha_neonatologica))
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Hora</label>
                                    <input type="time" value="{{ $ficha_neonatologica->hora_nacimiento }}"
                                        class="form-control form-control-sm" name="hora_nacimiento"
                                        id="hora_nacimiento">
                                </div>
                            @else
                                <div class="form-group col-sm-3 col-md-3">
                                    <label class="floating-label-activo-sm">Hora</label>
                                    <input type="time" class="form-control form-control-sm" name="hora_nacimiento"
                                        id="hora_nacimiento">
                                </div>
                            @endif

                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">Peso</label>
                                <input type="text" class="form-control form-control-sm" name="peso_nacimiento"
                                    id="peso_nacimiento"
                                    value="@if (isset($ficha_neonatologica->peso_nacimiento)) {{ $ficha_neonatologica->peso_nacimiento }} @endif">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">Talla</label>
                                <input type="text" class="form-control form-control-sm" name="talla_nacimiento"
                                    id="talla_nacimiento"
                                    value="@if (isset($ficha_neonatologica->talla_nacimiento)) {{ $ficha_neonatologica->talla_nacimiento }} @endif">
                            </div>

                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">Perímetro cefálico</label>
                                <input type="text" class="form-control form-control-sm" name="perimetro_cefalico"
                                    id="perimetro_cefalico"
                                    value="@if (isset($ficha_neonatologica->perimetro_cefalico)) {{ $ficha_neonatologica->perimetro_cefalico }} @endif">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">APGAR min</label>
                                <input type="text" class="form-control form-control-sm" name="apgar" id="apgar"
                                    value="@if (isset($ficha_neonatologica->apgar)) {{ $ficha_neonatologica->apgar }} @endif">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">APGAR 5 min</label>
                                <input type="text" class="form-control form-control-sm" name="apgar_cinco"
                                    id="apgar_cinco"
                                    value="@if (isset($ficha_neonatologica->apgar_cinco)) {{ $ficha_neonatologica->apgar_cinco }} @endif">
                            </div>
                            <div class="form-group col-sm-3 col-md-3">
                                <label class="floating-label">Edad gestacional</label>
                                <input type="text" class="form-control form-control-sm" name="edad_gestacional"
                                    id="edad_gestacional"
                                    value="@if (isset($ficha_neonatologica->edad_gestacional)) {{ $ficha_neonatologica->edad_gestacional }} @endif">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Reanimación</label>
                                <input type="text" class="form-control form-control-sm" name="reanimacion"
                                    id="reanimacion"
                                    value="@if (isset($ficha_neonatologica->reanimacion)) {{ $ficha_neonatologica->reanimacion }} @endif">
                            </div>
                            <div class="form-group col-sm-6 col-md-6">
                                <label class="floating-label">Medicamentos</label>
                                <input type="text" class="form-control form-control-sm" name="medicamentos"
                                    id="medicamentos"
                                    value="@if (isset($ficha_neonatologica->medicamentos)) {{ $ficha_neonatologica->medicamentos }} @endif">
                            </div>
                        </div>
                        <div class="form-row">
                            <h6 class="my-3">III.- Vacunas</h6>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="floating-label">BCG</label>
                                <input type="text" class="form-control form-control-sm" name="bcg" id="bcg"
                                    value="@if (isset($ficha_neonatologica->bcg)) {{ $ficha_neonatologica->bcg }} @endif">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Hepatitis B</label>
                                <input type="text" class="form-control form-control-sm" name="hepatitis_b"
                                    id="hepatitis_b"
                                    value="@if (isset($ficha_neonatologica->hepatitis_b)) {{ $ficha_neonatologica->hepatitis_b }} @endif">
                            </div>
                            <div class="form-group col-md-4">
                                <label class="floating-label">Otra</label>
                                <input type="text" class="form-control form-control-sm" name="otras_vacunas"
                                    id="otras_vacunas"
                                    value="@if (isset($ficha_neonatologica->otras_vacunas)) {{ $ficha_neonatologica->otras_vacunas }} @endif">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-info btn-sm">Guardar</button>

                </div>
            </form>
        </div>
    </div>
</div>
