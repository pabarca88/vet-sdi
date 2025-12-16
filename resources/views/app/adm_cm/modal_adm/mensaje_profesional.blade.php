<div id="mensaje_profesional" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Mensaje Profesional</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
                <div class="form-group fill">
                    <label class="floating-label-activo-sm" for="de">De:</label>
                    <input type="text" class="form-control" id="de" name="de" value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="form-group fill">
                    <label class="floating-label-activo-sm" for="para">Para:</label>
                    <input type="text" name="para_destino" class="form-control" id="para_destino" value="" readonly>
                </div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="titulo">Título:</label>
					<input type="text" class="form-control" id="titulo_a_profesional" name="titulo_a_profesional" required>
				</div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="detalle">Asunto:</label>
					<textarea class="form-control" rows="3" id="detalle_a_profesional" name="detalle_a_profesional" required></textarea>
				</div>
				<div class="form-group fill">
					<label class="floating-label-activo-sm" for="mensaje">Mensaje:</label>
					<textarea class="form-control" rows="5" id="mensaje_a_profesional" name="mensaje_a_profesional" required></textarea>
				</div>
                <div class="form-group">
                    <div class="card-a">
                        <div class="card-header-a" id="img">
                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#imagenes_elim_cicat_pre" aria-expanded="false" aria-controls="imagenes_elim_cicat_pre">
                                Adjuntar archivo
                            </button>
                        </div>

                        <div class="card-body-aten-a">
                            <!-- [ Main Content ] start -->
                            <div class="dropzone" id="mis-archivos-a-profesional" action="{{ route('profesional.archivo.carga') }}"></div>
                            <!-- [ file-upload ] end -->
                        </div>

                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" id="submit-all-profesional" class="btn btn-primary" onclick="enviar_mensaje_a_profesional()">Enviar</button>
			</div>
		</div>
	</div>
</div>

<script>
    function enviar_mensaje_a_profesional(){
        var de = $('#de').val();
        var para = $('#para_destino').val();
        var titulo = $('#titulo_a_profesional').val();
        var detalle = $('#detalle_a_profesional').val();
        var mensaje = $('#mensaje_a_profesional').val();

        var valido = 1;
        var msj = '';

        if(titulo == ''){
            valido = 0;
            msj += 'Debe ingresar un título <br>';
        }

        if(detalle == ''){
            valido = 0;
            msj += 'Debe ingresar un asunto <br>';
        }

        if(mensaje == ''){
            valido = 0;
            msj += 'Debe ingresar un mensaje <br>';
        }

        if (valido == 0) {
            swal({
                title: "Error",
                content: {
                    element: "div",
                    attributes: {
                        innerHTML: msj
                    },
                },
                icon: "error",
            });
            return;
        }

        // validar que al menos exista un archivo
        var files = $('#mis-archivos-a-profesional').get(0).dropzone.files;

        if(files.length == 0){
            swal({
                title: "Error",
                text: "Debe adjuntar al menos un archivo",
                icon: "error",
            });
            return;
        }
        $.ajax({
            url: "{{ route('mensaje_profesional') }}",
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                de: de,
                para: para,
                titulo: titulo,
                detalle: detalle,
                mensaje: mensaje,
                id_profesional_mensaje: $('#id_profesional_mensaje').val(),
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: "Mensaje Enviado",
                        text: "El mensaje ha sido enviado correctamente",
                        icon: "success",
                    })
                    $('#mensaje_profesional').modal('hide');
                }else{
                    swal({
                        title: "Error",
                        text: "Ha ocurrido un error al enviar el mensaje",
                        icon: "error",
                    })
                }
            }
        });
    }
</script>
