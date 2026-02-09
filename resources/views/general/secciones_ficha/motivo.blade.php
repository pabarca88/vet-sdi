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
                        <select class="form-control form-control-sm" name="esterilizado" id="esterilizado" value="">
                            <option value="">Seleccione</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Cirugías previas</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cirugias_previas" id="cirugias_previas"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Esquema de Inmunizaciones</label>
                         <textarea class="form-control caja-texto form-control-sm mb-9" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="esquema_inmunizaciones" id="esquema_inmunizaciones"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label class="floating-label-activo-sm">Última Desparasitación</label>
                        <input type="date" class="form-control form-control-sm" name="ultima_desparasitacion" id="ultima_desparasitacion" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-3 col-xxl-3">
                        <label class="floating-label-activo-sm">Producto Desparasitación</label>
                        <input type="text" class="form-control form-control-sm" name="producto_desparasitacion" id="producto_desparasitacion" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Tratamientos recientes</label>
                         <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="tratamientos_recientes" id="tratamientos_recientes"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm">Viajes recientes</label>
                         <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="viajes_recientes" id="viajes_recientes"></textarea>
                    </div>
                     <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">¿Vive con animales?</label>
                        <select class="form-control form-control-sm" name="vive_con_animales" id="vive_con_animales" value="">
                            <option value="">Seleccione</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">¿Cuáles?</label>
                         <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="cuales_animales" id="cuales_animales"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <label class="floating-label-activo-sm" for="motivo">Comportamiento del animal</label>
                         <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comportamiento_animal" id="comportamiento_animal" placeholder="Escriba la información cómo la describe el Responsable"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                        <label class="floating-label-activo-sm" for="motivo">Motivo de consulta</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="motivo" id="motivo" placeholder="Escriba la información cómo la describe el Responsable"></textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>


