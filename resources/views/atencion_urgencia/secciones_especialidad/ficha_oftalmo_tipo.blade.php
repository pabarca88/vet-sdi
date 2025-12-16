{{--  MODAL DE REGISTRO DE   --}}
<div id="modal_registrar_ficha_tipo_oft" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_registrar_ficha_tipo_oft" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Registro de Ficha Tipo de Oftalmología</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Nombre Ficha</label>
                            <input class="form-control form-control-sm "name="registro_f_t_oft_nombre" id="registro_f_t_oft_nombre">
                        </div>

                        <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Descripción</label>
                            <textarea class="form-control caja-texto form-control-sm" rows="1"  onfocus="this.rows=6" onblur="this.rows=1;" name="registro_f_t_oft_descripcion" id="registro_f_t_oft_descripcion"></textarea>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-md-12" id ="registro_f_t_oft_detalle" >
                            {{--  visualizar detalle de seccion detallado  --}}
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btn_modal_registrar_ficha_tipo_oft" >Registrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


