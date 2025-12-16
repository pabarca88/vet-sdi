{{--  SECCION MENOR DE EDAD INICIO  --}}
@if (\Carbon\Carbon::parse($paciente->fecha_nac)->age < 18)
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card-a">
            <div class="card-header" id="menor_edad">
                <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor_edad_c" aria-expanded="false" aria-controls="menor_edad_c">
                    Info. Acompañante del menor de edad
                </button>
            </div>

            <div id="menor_edad_c" class="collapse show" aria-labelledby="menor_edad" data-parent="#menor_edad">
                <div class="card-body-aten-a shadow-none">
                    <div class="form-row">
                        <input type="hidden" name="id_tipo_autorizacion_acompanante" id="id_tipo_autorizacion_acompanante" value="1">
                        <div class="form-group col-md-3">
                            <label class="floating-label-activo-sm">Rut</label>
                            <input type="text" class="form-control form-control-sm" name="rut_acompanante" id="rut_acompanante">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label-activo-sm">Nombres</label>
                            <input type="text" class="form-control form-control-sm" name="nombre_acompanante" id="nombre_acompanante">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label-activo-sm">Apellidos</label>
                            <input type="text" class="form-control form-control-sm" name="apell_acompanante" id="apell_acompanante">
                        </div>
                        <div class="form-group col-md-3" id="">
                            <label class="floating-label-activo-sm">Relación</label>
                            <select name="relacion_acompanante" id="relacion_acompanante" class="form-control form-control-sm">
                                <option value="0">Seleccione</option>
                                <option value="1">Madre</option>
                                <option value="2">Padre</option>
                                <option value="3">Tio(a)</option>
                                <option value="4">Abuelo(a)</option>
                                <option value="5">Hermano(a) (Mayor Edad)
                                </option>
                                <option value="6">Primo(a) (Mayor Edad)
                                </option>
                                <option value="7">Amigo(a) de Familia
                                    (Mayor Edad)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3" id="">
                            <label class="floating-label-activo-sm">Forme de envio</label>
                            <select name="tipo_medio_acompanante" id="tipo_medio_acompanante" class="form-control form-control-sm">
                                <option value="1">SMS</option>
                                <option value="2">EMAIL</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label-activo-sm">Teléfono</label>
                            <input type="text" class="form-control form-control-sm" name="tel_acompanante" id="tel_acompanante">
                        </div>
                        <div class="form-group col-md-3">
                            <label class="floating-label-activo-sm">Email</label>
                            <input type="text" class="form-control form-control-sm" name="email_acompanante" id="email_acompanante">
                        </div>
                        <div class="form-group col-md-3">
                            <button type="button" class="btn btn-success btn-block btn-sm" onclick="solicitar_autorizacion();"><i class="fa fa-plus"></i> Autoriza el
                                examen</button>
                            {{--
                            <!--genera codigo de aceptación al teléfono del responsable -->
                            --}}
                        </div>

                        {{-- <div class="form-group col-md-6">
                            <label class="floating-label-activo-sm">Nombre del
                                acompañante</label>
                            <input type="text" class="form-control form-control-sm"
                                name="nombre_acompanante" id="nombre_acompanante"
                                value="{!! old('nombre_acompanante') !!}">
                        </div>
                        <div class="form-group col-md-6" id="form_0">
                            <label
                                class="floating-label-activo-sm">Relaci&oacute;n</label>
                            <input type="text" class="form-control form-control-sm"
                                name="relacion_acompanante"
                                id="relacion_acompanante"
                                value="{!! old('relacion_acompanante') !!}">
                        </div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endif

@section('Modals')
    {{--  MODAL DE AUTORIZACION  --}}
    @include('atencion_medica.formularios.modal_atencion_general.modal_autorizacion')
@endsection

@section('page-script')
    @include('template.templateAutorizacion')
@endsection

{{--  SECCION MENOR DE EDAD INICIO  --}}
