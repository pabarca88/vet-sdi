<div id="modal_certificado_reposo" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="modal_certificado_reposo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Certificado de reposo</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form name="form_imprimir_certificado_reposo_pdf"
                    action="{{ route('dental.imprimir_certificado_reposo') }}" method="post">
                    @csrf
                    <input type="hidden" name="ficha_id_certificado_reposo" id="ficha_id_certificado_reposo"
                        value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                    <input type="hidden" name="paciente_certificado_reposo" id="paciente_certificado_reposo"
                        value="{{ $paciente->id }}">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->nombres }}"
                                name="" id="" readonly>
                        </div>
                    </div>
                </form>
                <form id="form_certificado_reposo" name="form_certificado_reposo"
                    action="{{ route('dental.registrar_certificado_reposo') }}" method="post">
                    @csrf
                    <input type="hidden" name="ficha_id_certificado_reposo" id="ficha_id_certificado_reposo"
                        value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                    <input type="hidden" name="paciente_certificado_reposo" id="paciente_certificado_reposo"
                        value="{{ $paciente->id }}">
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Nombre</label>
                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->nombres }}"
                                name="" id="" readonly>
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="person" class="form-control form-control-sm" value="{{ $paciente->rut }}"
                                name="" id="">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Edad</label>
                            <input type="number" class="form-control form-control-sm"
                                value="{{ \Carbon\Carbon::parse($paciente->fecha_nac)->diff(\Carbon\Carbon::now())->format('%y') }}"
                                name="" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12 mb-1 mt-2">
                            <p class="text-c-blue">El Profesional que suscribe certifica que este paciente debe
                                permanecer en reposo</p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Desde</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_inicio_certificado"
                                id="fecha_inicio_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hasta</label>
                            <input type="date" class="form-control form-control-sm" name="fecha_termino_certificado"
                                id="fecha_termino_certificado">
                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Hipótesis Diagnóstica</label>
                            <input type="text" class="form-control form-control-sm" name="hipotesis_certificado"
                                id="hipotesis_certificado">

                        </div>
                        <div class="form-group col-sm-12 col-md-12">
                            <label class="floating-label-activo-sm">Comentarios</label>
                            <input type="text" class="form-control form-control-sm" name="comentarios_certificado"
                                id="comentarios_certificado">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12 text-center">
                            <!--<p class="mb-2">Saluda atentamente</p>-->
                            <button type="submit" form="form_imprimir_certificado_reposo_pdf"
                                class="btn btn-sm btn-primary"> PDF</button>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" onclick="reset_form('form_certificado_reposo')" class="btn btn-danger"
                            data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
