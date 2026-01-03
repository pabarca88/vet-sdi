<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="motivo">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#motivo_c" aria-expanded="false" aria-controls="motivo_c">
                Examen físico
            </button>
        </div>
        <div id="motivo_c" class="collapse show" aria-labelledby="motivo" data-parent="#motivo">
            <div class="card-body-aten-a">
                <div class="form-row">
                   <!-- <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="antecedentes">Antecedentes Especialidad</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=5" onblur="this.rows=1;" class="form-control form-control-sm" name="antecedentes" id="antecedentes" placeholder="{{ $placeholder_antecedentes }}"></textarea>
                    </div>-->
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <label class="floating-label-activo-sm" for="motivo">Condición corporal</label>
                        <select class="form-control form-control-sm" name="condicion_corporal" id="condicion_corporal" value="">
                            <option value="">Seleccione</option>
                            <option value="">1 (Caquéctico)</option>
                            <option value="">2 (Delgado)</option>
                            <option value="">3 (Óptimo)</option>
                            <option value="">4 (Sobrepeso)</option>
                            <option value="">5 (Obeso)</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">T (ºC)</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">FC (L/min)</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">FR (R/min)</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">TLLC (seg)</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">TRPC (seg)</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">Pulso</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">Mucosas</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-2 col-xxl-2">
                        <label class="floating-label-activo-sm" for="motivo">% deshidratación</label>
                        <input type="text" class="form-control form-control-sm" name="" id="" value="">
                    </div>

                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Óganos de los sentidos</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Piel y pelaje</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Ganglios linfáticos</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema digestivo</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema endocrino</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema músculo esquelético</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema nervioso</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema urinario</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Sistema reproductivo</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Palpación rectal</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-4 col-xxl-4">
                        <label class="floating-label-activo-sm" for="examen_fisico">Otros</label>
                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=8" onblur="this.rows=1;" name="examen_fisico" id="examen_fisico"></textarea>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>



