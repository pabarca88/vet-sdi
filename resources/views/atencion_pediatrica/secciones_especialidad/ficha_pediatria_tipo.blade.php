{{--  MODAL DE REGISTRO DE   --}}
<div id="modal_registrar_ficha_tipo_pediatria_general" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_registrar_ficha_tipo_pediatria_general" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Registro de Ficha Tipo de Pediatria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    {{--  <div class="form-row">

                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Tipo</label>
                            <select class="form-control form-control-sm" id="registro_f_t_orl_tipo_seccion" onchange="cargarSeccion('registro_f_t_orl_detalle');">
                                <option value="">Seleccione</option>
                                <option value="1">Oído</option>
                                <option value="2">Nariz</option>
                                <option value="3">Faringolaringe</option>
                            </select>
                        </div>
                    </div>  --}}
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Nombre Ficha</label>
                            <input class="form-control form-control-sm "name="registro_f_t_pedgen_nombre" id="registro_f_t_pedgen_nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Descripción</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="registro_f_t_pedgen_descripcion" id="registro_f_t_pedgen_descripcion"></textarea>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12" id ="registro_f_t_pedgen_detalle" >
                            {{--  visualizar detalle de seccion detallado  --}}
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="guardar_tipo_ficha_pedgen();">Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


