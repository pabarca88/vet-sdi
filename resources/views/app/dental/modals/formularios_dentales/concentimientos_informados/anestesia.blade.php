<div id="modal_anestesia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_anestesia"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Consentimiento Informado Anestesia</h5>
                <h5 class="close text-white" style="font-size:15px">
                    <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                            "Octubre", "Noviembre", "Diciembre");

                        var f = new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form id="form_anestesia" action="{{ route('dental.registrar_anestesia_paciente') }}" method="post">

                    @csrf
                    <input type="hidden" name="ficha_id_anestesia_paciente" id="ficha_id_anestesia_paciente"
                        value=" @if ($ficha != null) {{ $ficha->id }} @endif">
                    <input type="hidden" name="paciente_anestesia_paciente" id="paciente_anestesia_paciente"
                        value="{{ $paciente->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body border-top info_basica collapse show" id="info_pcte">

                                <div class="form-row">
                                    <label class="col-sm-4 col-form-label">Nombre Paciente</label>
                                    <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                        <span
                                            id="nom_pcte">{{ $paciente->nombres . ' ' . $paciente->apellido_uno . '' . $paciente->apellido_dos }}</span>
                                    </div>
                                    <label class="col-sm-4 col-form-label">Rut</label>
                                    <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                        <span id="rut_pcte"> {{ $paciente->rut }}</span>
                                    </div>
                                    <label class="col-sm-4 col-form-label">Edad</label>
                                    <div class="col-sm-4 my-auto ml-1 font-weight-bolder">
                                        <span
                                            id="edad_pcte">{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}
                                        </span>
                                    </div>
                                    <label class="col-sm-4 col-form-label">Dirección</label>
                                    <div class="col-sm-6 my-auto ml-1 font-weight-bolder">
                                        @if (isset($paciente))
                                            @if ($paciente->Direccion()->first() != null)
                                                {{ $paciente->Direccion()->first()->direccion . ' ' . $paciente->Direccion()->first()->numero_dir }}
                                            @else
                                                <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                            @endif
                                        @else
                                            <span class="error">NO HA REGISTRADO DIRECCIÓN !</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <h6>En representación de:</h6>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Nombre del Responsable</label>
                            <input type="text" class="form-control form-control-sm"
                                name="nombre_responsable_anestesia_paciente" id="nombre_responsable_anestesia_paciente">
                        </div>
                        <div class="form-group col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Paciente Incapacitado por:</label>
                            <input type="text" class="form-control form-control-sm"
                                id="incapacitado_por_anestesia_paciente" name="incapacitado_por_anestesia_paciente">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-5 col-md-5">
                            <label class="col-sm-6 col-form-label">
                                <h6>He consultado con el profesional:</h6>
                            </label>
                        </div>
                        <div class=" col-sm-7 col-md-7">
                            <label class="col-sm-6 col-form-label"
                                id="cod_prof"><strong>{{ $profesional->nombre . ' ' . $profesional->apellido_uno . ' ' . $profesional->apellido_dos }}<br>{{ $profesional->rut }}<strong></label>
                            <!--auto-->
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="alert alert-secondary" role="alert">
                            <strong>Odontólogo</strong> Quién me ha explicado e informado, sobre los objetivos y
                            potenciales riesgos para mi salud, que este conlleva.
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre y tipo de anestesia</label>
                            <input type="text" class="form-control form-control-sm"
                                id="nombre_anestesia_anestesia_paciente" name="nombre_anestesia_anestesia_paciente">
                        </div>

                    </div>


                    <div class="form-row">

                        <div class="col-sm-6 col-md-6">
                            <label class="floating-label-activo-sm">Código Verificación</label>
                            <input type="text" class="form-control form-control-sm"
                                type="codigo_verificacion_anestesia_paciente"
                                name="codigo_verificacion_anestesia_paciente">
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <button type="button" class="btn btn-sm btn-block btn-success">Solicitar código de
                                verificación</button>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="alert alert-success" role="alert">
                            Al entregar mi código de verificación, doy mi consentimiento para lo enunciado
                            precedentemente
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Ver documento en PDF</button>
                        <button type="button" onclick="reset_form('form_anestesia')" class="btn btn-danger"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
