<div id="carne_rn_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="carne_rn_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Carnet de alta recien nacido</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
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
                            <input type="text" class="form-control form-control-sm" name="sem_gest" id="sem_gest"
                                value="{{ $solicitud_pabellon->semanas_gestacion }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Fecha de alta clínica</label>
                            <input type="date" class="form-control form-control-sm" name="f_alta" id="f_alta">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Condición de salud</label>
                            <input type="text" class="form-control form-control-sm" name="cond_salud" id="cond_salud">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Alta durante la hospitalización</label>
                            <input type="text" class="form-control form-control-sm" name="alt_hosp" id="alt_hosp">
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">II.- Datos del recién nacido</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label-activo-sm">Fecha nacimiento</label>
                            <input type="date" class="form-control form-control-sm" name="fn" id="fn"
                                value="{{ $ficha_neonatologica->fecha_nacimiento }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">Hora</label>
                            <input type="time" class="form-control form-control-sm" name="hora" id="hora"
                                value="{{ $ficha_neonatologica->hora_nacimiento }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">Peso</label>
                            <input type="text" class="form-control form-control-sm" name="p_nac" id="p_nac"
                                value="{{ $ficha_neonatologica->peso_nacimiento }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">Talla</label>
                            <input type="text" class="form-control form-control-sm" name="talla" id="talla"
                                value="{{ $ficha_neonatologica->talla_nacimiento }}">
                        </div>

                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">Perimetro cefálico</label>
                            <input type="text" class="form-control form-control-sm" name="pc" id="pc"
                                value="{{ $ficha_neonatologica->perimetro_cefalico }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">APGAR min</label>
                            <input type="text" class="form-control form-control-sm" name="" id=""
                                value="{{ $ficha_neonatologica->apgar }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">APGAR 5 min</label>
                            <input type="text" class="form-control form-control-sm" name="a_1" id="a_1"
                                value="{{ $ficha_neonatologica->apgar_5 }}">
                        </div>
                        <div class="form-group col-sm-3 col-md-3">
                            <label class="floating-label">Edad gestacional</label>
                            <input type="text" class="form-control form-control-sm" name="a_5" id="a_5"
                                value="{{ $ficha_neonatologica->edad_gestacional }}">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Reanimación</label>
                            <input type="text" class="form-control form-control-sm" name="reanimacion" id="reanimacion"
                                value="{{ $ficha_neonatologica->reanimacion }}">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label">Medicamentos</label>
                            <input type="text" class="form-control form-control-sm" name="medic" id="medic"
                                value="{{ $ficha_neonatologica->medicamentos }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">III.- Vacunas</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label">BCG</label>
                            <input type="text" class="form-control form-control-sm" name="bcg" id="bcg"
                                value="{{ $ficha_neonatologica->bcg }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Hepatitis B</label>
                            <input type="text" class="form-control form-control-sm" name="hep_b" id="hep_b"
                                value="{{ $ficha_neonatologica->hepatitis_b }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Otra</label>
                            <input type="text" class="form-control form-control-sm" name="otra_vac" id="otra_vac"
                                value="{{ $ficha_neonatologica->otras_vacunas }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <h6 class="my-3">IV.- Control</h6>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="floating-label-activo-sm">Fecha</label>
                            <input type="date" class="form-control form-control-sm" name="F_control" id="F_control"
                                value="{{ $epicrisis_alta_medica->fecha_control }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Lugar</label>
                            <input type="text" class="form-control form-control-sm" name="lugar_control"
                                id="lugar_control" value="{{ $lugar_atencion->nombre }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="floating-label">Profesional</label>
                            <input type="text" class="form-control form-control-sm" name="prof_control"
                                id="prof_control"
                                value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno }}">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-info btn-sm">Guardar</button>
            </div>
        </div>
    </div>
</div>
