<div id="asociar_personal_cm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="asociar_personal_cm" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Asociar personal</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                    <div class="col-sm-12 mb-3">
                        <h6 class="text-c-blue">Escriba rut o nombre del asistente y seleccione la sucursal en que desea asociar</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Rut o Nombre</label>
                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label">Funciones y roles</label>
                            <select class="form-control form-control-sm">
                                <option>Seleccione una opción</option>
                                    <option>secretaria publico</option>
                                    <option>secretaria administrativa</option>
                                    <option>Empresa aseo y mantención</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-info" >Enviar invitación
                        </button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function Asociar_personal() {
        $('#asociar_personal_cm').modal('show');
    }
</script>
