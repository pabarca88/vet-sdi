<!-- Modal -->
<div class="modal fade" id="modal_mensaje_difusion" tabindex="-1" role="dialog" aria-labelledby="modal_mensaje_difusionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_mensaje_difusionLabel">Enviar Mensaje</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add your form fields here -->
                <form id="mensajeForm" method="POST" action="{{ ROUTE('mensaje_difusion_ministerio') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="de_difusion">De:</label>
                        <input type="text" class="form-control" id="de" name="de" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="select_receptores">Receptores:</label>
                        <select class="form-control" id="select_receptores" name="receptores[]" multiple="multiple">
                            <!-- Opciones de ejemplo, reemplaza con tus datos -->
                            <option value="1">Pacientes</option>
                            <option value="2">Directores medicos de hospital</option>
                            <option value="3">Profesionales</option>
                            <option value="4">Directores medicos de CM</option>
                            <option value="5">Laboratorios</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="" required />
                    </div>
                    <div class="form-group">
                        <label for="detalle">Detalle:</label>
                        <textarea class="form-control" id="detalle" name="detalle" rows="3" placeholder="Escriba aqui" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <textarea class="form-control" id="message" name="message" rows="3" placeholder="Escriba aqui" required></textarea>
                    </div>
                    <div class="form-group">
                        <div class="dropzone" id="mis-archivos-difusion-ministerio" action="{{ route('ministerio.imagen.carga') }}" >
                            <!-- Aquí se manejarán las imágenes -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="submit-all" class="btn btn-primary" onclick="enviar_mensaje_difusion_confirmar()">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
     function enviar_mensaje_difusion_confirmar() {
        var formData = new FormData(document.getElementById("mensajeForm"));
        var files = $('#mis-archivos-difusion-ministerio').get(0).dropzone.files;
        if(files.length == 0){
            swal({
                title: "Error",
                text: "Debe adjuntar al menos un archivo",
                icon: "error",
            });
            return;
        }

        let de = document.getElementById('de').value
        let para = $('#select_receptores').val();
        let titulo = document.getElementById('titulo').value;
        let detalle = document.getElementById('detalle').value;
        let mensaje = document.getElementById('message').value;

        let valido = 0;
        let msj = '';

        // validar el infreso de al menos una imagen
        if(files.length == 0){
            valido = 1;
            msj += 'Debe ingresar al menos una imagen o archivo <br>';
        }

        if(de == ''){
            valido = 1;
            msj += 'Debe seleccionar un remitente <br>';
        }

        if(para == null || para.length == 0){
            valido = 1;
            msj += 'Debe seleccionar al menos un grupo receptor <br>';
        }

        if(titulo == ''){
            valido = 1;
            msj += 'Debe ingresar un titulo <br>';
        }

        if(detalle == ''){
            valido = 1;
            msj += 'Debe ingresar un detalle <br>';
        }

        if(mensaje == ''){
            valido = 1;
            msj += 'Debe ingresar un mensaje <br>';
        }

        if(valido == 1){
            swal({
                title: "Error",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: msj
                    }
                },
                icon: "error",
                button: "Aceptar",
            });
            return;
        }

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('de', document.getElementById('de').value);
        // receptores
        formData.append('para', JSON.stringify($('#select_receptores').val()));
        formData.append('message', document.getElementById('message').value);
        formData.append('titulo', document.getElementById('titulo').value);
        formData.append('detalle', document.getElementById('detalle').value);

        fetch("{{ route('mensaje_difusion_ministerio') }}", {
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
                    title: "Mensaje enviado",
                    text: data.mensaje,
                    icon: "success",
                    button: "Aceptar",
                });
                $('#modal_mensaje_difusion').modal('hide');
                $('#select_receptores').val(null).trigger('change');
                $('#message').val('');
                myDropzone.removeAllFiles();
            }
        })
        .catch(error => {
            console.error('Error:', error.responseText);
        });
    };
</script>
