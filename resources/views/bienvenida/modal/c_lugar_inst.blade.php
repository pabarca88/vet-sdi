<div id="c_lugar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_lugar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title text-c-blue mt-1">Mis lugar de atención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut</label>
                            <input class="form-control form-control-sm" name="rut_lugar_atencion" id="rut_lugar_atencion" type="text" onkeyup="formatoRut(this);">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nombre</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Razon social</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Nº de inscripción Superintendecia de salud</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="floating-label">Dirección</label>
                            <input class="form-control form-control-sm" name="direccion_lugar_atencion" id="direccion_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label class="floating-label">Depto. | Ofic.</label>
                            <input class="form-control form-control-sm" name="numero_lugar_atencion" id="numero_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Región</label>
                            <select id="region_agregar" onchange="buscar_ciudad();" name="region_agregar" class="form-control form-control-sm" required="">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Ciudad</label>
                            <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required="">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label">Teléfono</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label">WhatsApp</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label class="floating-label">Sitio web</label>
                            <input class="form-control form-control-sm" name="nombre_lugar_atencion" id="nombre_lugar_atencion" type="text">
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="button" class="btn btn-info">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function lugar() {
        $('#c_lugar').modal('show');
    }
</script>
