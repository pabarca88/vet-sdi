<!--BOTON-->
<button type="button" class="btn btn-agenda btn-warning d-inline float-right mb-2 mt-0 ml-2 mr-3" onclick="abrir_simbologia_agenda();" data-toggle="tooltip" data-placement="top" title="Significado de estados de agenda"><i class="fas fa-info"></i></button>
<!--MODAL-->
<div class="modal fade" id="modal_simbologia_agenda" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modal_simbologia_agenda" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-white">
            <h5 class="modal-title text-c-blue">Significado de los estados de la agenda</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal_simbologia_agenda').modal('hide');" style="background-color: #fff!important; color:#656565!important;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle text-c-blue fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Hora Pre Reservada</h5></div>

                        <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle hora-reservada fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Hora Reservada</h5></div>

                         <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle hora-confirmada fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Hora Confirmada</h5></div>

                         <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle text-purple fa-2x pt-1"></i> <h5 class="pt-2 ml-2">En espera de atención</h5></div>

                        <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle realizando-atencion fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Realizando Atención</h5></div>

                         <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle atencion-fin  fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Atención Realizada</h5></div>

                         <div class="d-flex d-inline align-self-center mb-3"><i class="fas fa-circle no-disponible-agenda fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Horario No Disponible</h5></div>

                         <div class="d-flex d-inline align-self-center"><i class="fas fa-circle text-danger fa-2x pt-1"></i> <h5 class="pt-2 ml-2">Horario Bloqueado</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
      /**CIERRE MODAL**/
    function abrir_simbologia_agenda()
    {
        $('#modal_simbologia_agenda').modal('show');
    }
    function cerrar_simbologia_agenda() {
        $('#modal_simbologia_agenda').modal ('hide');
      }
    /**CIERRE: CIERRE MODAL**/

</script>




