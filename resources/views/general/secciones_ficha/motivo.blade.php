<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivo">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                Motivo de la consulta y examen físico
            </button>
        </div>
        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                        <input type="text" class="form-control form-control-sm" name="motivo" id="motivo" placeholder="{{ $placeholder_motivo_consulta }}" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="antecedentes">Antecedentes Especialidad</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" class="form-control form-control-sm" name="antecedentes" id="antecedentes" placeholder="{{ $placeholder_antecedentes }}"></textarea>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label class="floating-label-activo-sm" for="examen_fisico">Examen Físico</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="{{ $placeholder_examen_fisico }}"></textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



