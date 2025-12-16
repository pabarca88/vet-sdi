<div class="tab-pane fade" id="pills-fmu" role="tabpanel" aria-labelledby="pills-fmu-tab">
    <div class="row">
        <div class="col-md-4 mx-auto m-ingreso-ficha">
            <!--Ingreso a Ficha Médica Única-->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img src="{{ asset('images/iconos/candado.svg') }}" alt="" class="img-fluid mb-4 wid-90">
                    <p class="f-w-400 mb-4">Ingrese uno de los códigos de seguridad que se le ha enviado por correo
                        electrónico</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form method="GET" target="_blank"
                        action="{{ ROUTE('profesional.ficha_medica_unica_atencion', $paciente->id) }}">
                        <div class="form-group">
                            <label class="floating-label" for="password">Código de seguridad</label>
                            <input type="password" class="form-control form-control-sm" name="" id="" placeholder="">
                            <button class="btn btn-sm btn-block btn-info mb-2">
                                Acceder a Ficha Médica Única
                            </button>
                            <p class="mb-2 text-muted text-center">¿No has recibido los códigos de seguridad?<br>
                                podemos <a href="recuperarclave.php" class="f-w-400 text-dark"> volver a enviarlos</a>
                            </p>
                        </div>
                    </form>



                </div>
            </div>
            <!-- Cierre: Ingreso a Ficha Médica Única-->
        </div>
    </div>
</div>
