
<!-- Modal -->
<div class="modal fade" id="modal_imagen_dental_rx" tabindex="-1" aria-labelledby="modal_imagen_dental_rxLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_imagen_dental_rxLabel">Imagen RX</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="zoom-container">
                <img src="" alt="Imagen RX" id="imagen_paciente_rx" class="img-fluid">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger btn-sm" onclick="cerrar_modal()">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <style>
    .zoom-container {
        position: relative;
        overflow: hidden;
        cursor: zoom-in;
    }

    .zoom-container img {
        transition: transform 0.3s ease; /* Animación para el zoom */
    }

    .zoom-container:hover img {
        transform: scale(2); /* Nivel de zoom */
    }
  </style>

  <script>

    function cerrar_modal(){
        // $('.zoom-container img').css('transform', 'scale(1)'); // Restablece el zoom
        // ocultar modal
        $('#modal_imagen_dental_rx').modal('hide');
    }
  </script>
