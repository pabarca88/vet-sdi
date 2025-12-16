<div id="modal_autorizacion_ficha_medica_unica" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_autorizacion_ficha_medica_unica" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Seleccionar Lugar de Atención</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ ROUTE('profesional.ficha_medica_unica_auth') }}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="id_paciente_fmu" id="id_paciente_fmu">
                    <div class="row">
                        <div class="col-md-12 mx-auto m-ingreso-ficha">
                            <!--Ingreso a Ficha Médica Única-->
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="{{ asset('images/iconos/candado.svg') }}" alt=""
                                        class="img-fluid mb-4 wid-90">
                                    <p class="f-w-400 mb-4">Ingrese uno de los códigos de seguridad que se le ha
                                        enviado por correo
                                        electrónico</p>
                                </div>
                            </div>
                            <!-- Cierre: Ingreso a Ficha Médica Única-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="form-group">
                                <label class="floating-label" for="password">Código de seguridad</label>
                                <input type="password" class="form-control form-control-sm" name="paciente_codigo"
                                    id="paciente_codigo" placeholder="">
                                <br>
                                <button type="submit" class="btn btn-sm btn-block btn-info mb-2">
                                    Acceder a Ficha Médica Única
                                </button>
                                <p class="mb-2 text-muted text-center">¿No has recibido los códigos de
                                    seguridad?<br>
                                    podemos <a href="recuperarclave.php" class="f-w-400 text-dark"> volver a
                                        enviarlos</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </form>
        </div>
    </div>
</div>
