<form>
    <div class="form-row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h6 class="t-aten">CONCIENCIA</h6>
            <div class="form-group">
                <label class="floating-label-activo-sm" for="tipo_conc">Tipo</label>
                <select class="form-control form-control-sm" name="tipo_conc" id="tipo_conc">
                    <option value="1">No examinada</option>
                    <option value="2">Lúcido</option>
                    <option value="3">Obnubilado</option>
                    <option value="4">Desorientado</option>
                    <option value="5">Sopor</option>
                    <option value="6">Coma</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h6 class="t-aten">ORIENTACIÓN</h6>
            <div class="form-group">
                <label class="floating-label-activo-sm" for="tipo_orient">Tipo</label>
                <select class="form-control form-control-sm" name="tipo_orient" id="tipo_orient">
                    <option value="1">No examinada</option>
                    <option value="2">Orientado en tiempo y espacio</option>
                    <option value="3">Perdido</option>
                    <option value="4">Dudosa</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h6 class="t-aten">COMPORTAMIENTO</h6>
            <div class="form-group">
                <label class="floating-label-activo-sm" for="tipo_comport">Tipo</label>
                <select class="form-control form-control-sm" name="tipo_comport" id="tipo_comport">
                    <option value="1">No examinada</option>
                    <option value="2">Coherente</option>
                    <option value="3">Incoherente</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <h6 class="t-aten">COLABORACIÓN</h6>
            <div class="form-group">
                <label class="floating-label-activo-sm" for="tipo_colab">Tipo</label>
                <select class="form-control form-control-sm" name="tipo_colab" id="tipo_colab">
                    <option value="1">No examinada</option>
                    <option value="2">No</option>
                    <option value="3">Si</option>
                </select>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <label class="floating-label-activo-sm" for="coment_comunic">Comentario de la evaluación</label>
            <textarea type="text" class="form-control form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="coment_comunic" id="coment_comunic"></textarea>
        </div>
    </div>
</form>
