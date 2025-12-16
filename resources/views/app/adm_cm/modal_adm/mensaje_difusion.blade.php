<div id="mensaje_difusion" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje Difusion</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <form id="mensajeDifusionForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="de" class="floating-label-activo-sm">De:</label>
                        <input type="text" class="form-control" id="de_difusion" name="de_difusion" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="para" class="floating-label-activo-sm">Para:</label>

                        <select class="form-control form-control-sm" name="msj_para_difusion" id="msj_para_difusion" multiple="multiple">
                            <option value="0">A todos los roles</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->alias }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="titulo_msj" class="floating-label-activo-sm">Título:</label>
                        <input type="text" class="form-control" id="titulo_msj_difusion" name="titulo_msj_difusion" required>
                    </div>
                    <div class="form-group">
                        <label for="detalle_msj" class="floating-label-activo-sm">Asunto:</label>
                        <textarea class="form-control" rows="3" id="detalle_msj_difusion" name="detalle_msj_difusion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="mensaje_msj" class="floating-label-activo-sm">Mensaje:</label>
                        <textarea class="form-control" rows="5" id="mensaje_msj_difusion" name="mensaje_msj_difusion" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="card-a">
                            <div class="card-header-a" id="img">
                                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                    Adjuntar archivo
                                </button>
                            </div>
                            <div id="img_cons_dermato_pre-c" class="collapse show" aria-labelledby="img_cons_dermato_pre" data-parent="#img_cons_dermato_pre">
                                <div class="card-body-aten-a">
                                    <!-- [ Main Content ] start -->
                                    <div class="dropzone" id="misArchivosGes" action="{{ route('profesional.archivo.carga') }}"></div>
                                    <!-- [ file-upload ] end -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        var myDropzone_ges; // Define la variable globalmente
                        document.addEventListener("DOMContentLoaded", function() {
                            // Verifica si Dropzone ya está inicializado en el elemento
                            if (Dropzone.instances.length > 0) {
                                Dropzone.instances.forEach(instance => {
                                    if (instance.element.id === "misArchivosGes") {
                                        instance.destroy();
                                    }
                                });
                            }
                            // Inicializa Dropzone en el elemento con el ID "misArchivosGes"
                            myDropzone_ges = new Dropzone("#misArchivosGes", {
                                url: "{{ route('profesional.archivo.carga') }}",
                                method: 'post',
                                createImageThumbnails: true,
                                addRemoveLinks: true,
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                },
                                acceptedFiles: "application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*",
                                maxFilesize: 4, // Tamaño máximo en MiB
                                maxFiles: 4,
                                dictDefaultMessage: "Arrastre Archivo al recuadro para subirlo.",
                                dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
                                dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos como en los viejos tiempos.",
                                dictFileTooBig: "El archivo es demasiado grande. Max tamaño de archivo: 4 MiB.",
                                dictInvalidFileType: "No puedes subir archivos de este tipo.",
                                dictCancelUpload: "Cancelar carga",
                                dictUploadCanceled: "Subida cancelada.",
                                dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
                                dictRemoveFile: "Eliminar archivo",
                                dictMaxFilesExceeded: "No puede cargar más archivos.",
                                autoProcessQueue: false, // Desactiva el procesamiento automático
                                init: function() {
                                    this.on("sending", function(file, xhr, formData) {
                                        formData.append("id", "{{ Auth::user()->id }}");
                                    });
                                    this.on("success", function(file, response) {
                                        // Manejar la respuesta de éxito
                                        console.log(response);
                                    });
                                    this.on("error", function(file, message) {
                                        // Manejar el error
                                        console.error(message);
                                    });
                                    this.on("removedfile", function(file) {
                                        // Manejar la eliminación del archivo
                                        console.log("Archivo eliminado");
                                    });
                                    this.on("canceled", function(file) {
                                        // Manejar la cancelación de la carga
                                        console.log("Carga cancelada");
                                    });
                                }
                            });

                            window.enviarMensajeDifusion = function() {
                                var formData = new FormData(document.getElementById("mensajeDifusionForm"));
                                myDropzone_ges.getAcceptedFiles().forEach(function(file) {
                                    formData.append('misArchivosGes[]', file);
                                });

                                formData.append('_token', '{{ csrf_token() }}');
                                formData.append('de', document.getElementById('de').value);
                                formData.append('para', document.getElementById('para').value);
                                formData.append('titulo', document.getElementById('titulo').value);
                                formData.append('detalle', document.getElementById('detalle').value);
                                formData.append('mensaje', document.getElementById('mensaje').value);

                                fetch("{{ route('mensaje_difusion') }}", {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log(data);
                                    // Manejar la respuesta del servidor
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                });
                            };
                        });
                    </script>
                </form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" onclick="enviar_mensaje_difusion_confirmar()">Enviar</button>
			</div>
		</div>
	</div>
</div>

<script>


    function enviar_mensaje_difusion_confirmar() {
        var formData = new FormData(document.getElementById("mensajeDifusionForm"));
        myDropzone_ges.getAcceptedFiles().forEach(function(file) {
            formData.append('misArchivosGes[]', file);
        });

        // validar los campos del formulario
        if (document.getElementById('de_difusion').value === '') {
            swal("¡Error!", "El campo 'De' es obligatorio", "error");
            return;
        }

        if (document.getElementById('msj_para_difusion').selectedOptions.length === 0) {
            swal("¡Error!", "El campo 'Para' es obligatorio", "error");
            return;
        }

        if (document.getElementById('titulo_msj_difusion').value === '') {
            swal("¡Error!", "El campo 'Título' es obligatorio", "error");
            return;
        }

        if (document.getElementById('detalle_msj_difusion').value === '') {
            swal("¡Error!", "El campo 'Asunto' es obligatorio", "error");
            return;
        }

        if (document.getElementById('mensaje_msj_difusion').value === '') {
            swal("¡Error!", "El campo 'Mensaje' es obligatorio", "error");
            return;
        }

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('de_difusion', document.getElementById('de_difusion').value);
        
        // Manejar el select múltiple correctamente
        var selectElement = document.getElementById('msj_para_difusion');
        var selectedValues = Array.from(selectElement.selectedOptions).map(option => option.value);
        
        // Agregar cada valor seleccionado como elemento de array
        selectedValues.forEach(function(value) {
            formData.append('msj_para_difusion[]', value);
        });
        
        formData.append('titulo_msj_difusion', document.getElementById('titulo_msj_difusion').value);
        formData.append('detalle_msj_difusion', document.getElementById('detalle_msj_difusion').value);
        formData.append('mensaje_msj_difusion', document.getElementById('mensaje_msj_difusion').value);

        fetch("{{ route('mensaje_difusion') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Manejar la respuesta del servidor
            if(data.estado == 1){
                swal({
                    title: "¡Éxito!",
                    text: "El mensaje de difusión se ha enviado correctamente.",
                    icon: "success"
                });
            }else{
                swal({
                    title: "¡Error!",
                    text: "No se pudo enviar el mensaje de difusión.",
                    icon: "error"
                });
            }
            // cerrar modal
            $('#mensajeDifusionModal').modal('hide');
        })
        .catch(error => {
            console.error('Error:', error.responseText);
        });
    };

</script>
