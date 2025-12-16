<div id="en_construccion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="en_construccion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" bg-info" style="text-align: center;height:60px">
                <h3 class="modal-title text-white text-center">Sección en construcción</h3>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group fill">
                                <img src="{{ asset('images/maintance/maintance.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger align-middle" onclick="cerrarModal()"; data-dismiss="modal">Cerrar Modal</button>
            </div>
        </div>
    </div>
</div>
<script>
    function en_construccion() {
        $('#en_construccion').modal('show');
    }
    function cerrarModal() {
        $('#en_construccion').modal('hide');
        }
</script>
