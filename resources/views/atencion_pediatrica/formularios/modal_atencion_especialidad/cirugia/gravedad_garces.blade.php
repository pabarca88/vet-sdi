<div id="garces" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="garces" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Indice de gravedad de Garcés</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body text-center py-0">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ asset('images\imagenes_ped\indice_garces.png') }}"  class="img-thumbnail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function gravedad_garces()
    {
        $('#garces').modal('show');
    }
</script>
