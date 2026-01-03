<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivo">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
               Anamnesis
            </button>
        </div>
        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">
                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Dieta</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="dieta" id="dieta"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Enfermedades previas</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="enfermedades_previas" id="enfermedades_previas"></textarea>
                    </div>
                   <!-- <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="antecedentes">Antecedentes Especialidad</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" class="form-control form-control-sm" name="antecedentes" id="antecedentes" placeholder="{{ $placeholder_antecedentes }}"></textarea>
                    </div>-->
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Esterilizado</label>
                        <select class="form-control form-control-sm" name="condicion_corporal" id="condicion_corporal" value="">
                            <option value="">Seleccione</option>
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Cirugías previas</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="enfermedades_previas" id="enfermedades_previas"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Esquema Vacunal</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="enfermedades_previas" id="enfermedades_previas"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label class="floating-label-activo-sm">Última Desparasitación</label>
                        <input type="date" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label class="floating-label-activo-sm">Producto Desparasitación</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Tratamientos recientes</label>
                         <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="ttos_recientes" id="ttos_recientes"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Viajes recientes</label>
                         <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="enfermedades_previas" id="enfermedades_previas"></textarea>
                    </div>
                     <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">¿Vive con animales?</label>
                        <select class="form-control form-control-sm" name="condicion_corporal" id="condicion_corporal" value="">
                            <option value="">Seleccione</option>
                            <option value="">Si</option>
                            <option value="">No</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">¿Cuáles?</label>
                         <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="enfermedades_previas" id="enfermedades_previas"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <label class="floating-label-activo-sm" for="motivo">Comportamiento del animal</label>
                         <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comportamiento_animal" id="comportamiento_animal" placeholder="Escriba la información cómo la describe el propietario"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo" id="motivo" placeholder="Escriba la información cómo la describe el propietario"></textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



