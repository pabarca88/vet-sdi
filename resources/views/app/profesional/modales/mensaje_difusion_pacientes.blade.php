
  <!-- Modal -->
  <div class="modal fade" id="modalMensajeDifusionPacientes" tabindex="-1" aria-labelledby="modalMensajeDifusionPacientesLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMensajeDifusionPacientesLabel">Mensaje difusion a mis paciente</h5>
          <button type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-row">
                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label class="floating-label-activo-sm" for="exampleFormControlInput1_difusion">Asunto</label>
                    <input type="text" class="form-control form-control-sm" id="exampleFormControlInput1_difusion">
                </div>
                <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label class="floating-label-activo-sm" for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1_difusion" rows="3"></textarea>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <button type="button" class="btn btn-info" onclick="enviar_mensaje_difusion_paciente_confirmar()"><i class="feather icon-mail"></i> Enviar mensaje</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="id_paciente_mensaje" name="id_paciente_mensaje" value="">
  <script>
    function enviar_mensaje_difusion_paciente_confirmar(){
        var asunto = $('#exampleFormControlInput1_difusion').val();
        var mensaje = $('#exampleFormControlTextarea1_difusion').val();
        // validar el ingreso de datos
        if(asunto == ''){
            swal({
                title: "Error",
                text: "Ingrese el asunto",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }

        if(mensaje == ''){
            swal({
                title: "Error",
                text: "Ingrese el mensaje",
                icon: "error",
                button: "Aceptar",
            });
            return false;
        }
        $.ajax({
            url: "{{ route('enviar_mensaje_difusion_pacientes') }}",
            type: 'POST',
            data: {
                asunto: asunto,
                mensaje: mensaje,
                _token: "{{ csrf_token() }}"
            },
            success: function(response){
                console.log(response);
                if(response.estado == 1){
                    swal({
                        title: "Mensaje enviado",
                        text: "El mensaje ha sido enviado correctamente",
                        icon: "success",
                        button: "Aceptar",
                    });
                    $('#modalMensajePaciente').modal('hide');
                }else{
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al enviar el mensaje",
                        icon: "error",
                        button: "Aceptar",
                    });
                }
            }
        });
    }
  </script>
