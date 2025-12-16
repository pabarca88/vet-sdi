<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivodd">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                Motivo de la consulta y Examen físico general
            </button>
        </div>
        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="floating-label-activo-sm">Motivo de consulta</label>
                        <input type="text" class="form-control form-control-sm" name="motivo" id="motivo">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="floating-label-activo-sm">Antecedentes Especialidad</label>
                        <input type="text" class="form-control form-control-sm" name="antecedentes" id="antecedentes">
                    </div>
                </div>
                <div class="form-row" >
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                        <label class="floating-label-activo-sm">Observaciones al Examen de la Especialidad</label>
                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico" placeholder="OBSERVACIONES DE LA CONSULTA Y EXAMEN FISICO RELEVANTE"></textarea>
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="anestesia_local_dental();">Anestesia local</button>
                    </div>
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="hemorragia_dental();"<i class="feather icon-save"></i> Hemorragias</button>
                    </div>
                    <div class="form-group col-md-4">
                        <button type="button" class="btn btn-primary-light btn-sm btn-block" onclick="fractura_dental();"<i class="feather icon-save"></i> Fracturas</button>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
