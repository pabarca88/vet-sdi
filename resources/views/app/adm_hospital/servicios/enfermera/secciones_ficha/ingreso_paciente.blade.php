<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active" id="ing_enf" role="tabpanel"aria-labelledby="ing_enf_tab">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                    <input type="text" class="form-control form-control-sm"name="motivo" id="motivo" @if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->motivo_consulta }}" @endif @if(!$enfermera) readonly @endif>
                </div>
                <div class="form-group col-md-4">
                    <label class="floating-label-activo-sm" for="antecedentes">Medio en que llega</label>
                    <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes"@if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->medio_referencia }}" @endif @if(!$enfermera) readonly @endif>
                </div>
                <div class="form-group col-md-4">
                    <label class="floating-label-activo-sm" for="esc_eva_ing">Escala EVA</label>
                    <input type="text" class="form-control form-control-sm" name="esc_eva_ing" id="esc_eva_ing"@if(isset($antecedentes_urgencia_paciente)) value="{{ $antecedentes_urgencia_paciente->eva }}" @endif @if(!$enfermera) readonly @endif>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                    <label class="floating-label-activo-sm" for="examen_fisico">Examen relevante y Observaciones de la  Urgencia</label>
                    <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="obs_ing_pcte" id="obs_ing_pcte" placeholder="EXAMEN DE INGRESO PACIENTE" @if(!$enfermera) readonly @endif>
                        @if(isset($antecedentes_urgencia_paciente)){{ $antecedentes_urgencia_paciente->observaciones }}@endif
                    </textarea>
                </div>
            </div>
            @if($enfermera)
            <div class="form-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 my-2">
                    @if(isset($antecedentes_urgencia_paciente))
                        <button type="button" class="btn btn-outline-warning btn-sm float-right" onclick="guardar_antecedentes_ingreso()"><i class="fas fa-save"></i>Actualizar</button>
                    @else
                        <button type="button" class="btn btn-outline-success btn-sm float-right" onclick="guardar_antecedentes_ingreso()"><i class="fas fa-save"></i>Guardar</button>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
