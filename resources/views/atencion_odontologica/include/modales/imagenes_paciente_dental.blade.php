<!-- Modal -->
<div class="modal fade" id="modal_agregar_imagenes_dental_paciente" tabindex="-1" aria-labelledby="modal_agregar_imagenes_dental_pacienteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_agregar_imagenes_dental_pacienteLabel">Nuevas imagenes Paciente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="dropzone" id="nuevas-imagenes-dental-oral-paciente" action="{{ route('profesional.imagen.carga') }}" method="post"  ></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Subir</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function(){
        // Configuración de Dropzone para el modal
        Dropzone.options.nuevasImagenesDentalOralPaciente = {
            url: "{{ route('profesional.imagen.carga') }}", // Ruta de carga
            paramName: "file", // Nombre del parámetro que recibirá el archivo en el servidor
            maxFilesize: 5, // Tamaño máximo del archivo en MB
            acceptedFiles: ".jpg,.jpeg,.png,.gif", // Tipos de archivos permitidos
            addRemoveLinks: true, // Agregar botón de eliminar archivo
            dictDefaultMessage: "Arrastra los archivos aquí o haz clic para subir",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            init: function () {
                this.on("success", function(file, response) {
                    console.log("Archivo subido exitosamente:", response);
                });
                this.on("error", function(file, errorMessage) {
                    console.error("Error al subir archivo:", errorMessage);
                });
            }
        };
    })

  </script>

