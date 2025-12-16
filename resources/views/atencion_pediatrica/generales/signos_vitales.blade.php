<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card-a">
        <div class="card-header-a" id="sig-vit">
            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#sig-vit-c" aria-expanded="false" aria-controls="sig-vit-c">
              Signos vitales
            </button>
        </div>
        <div id="sig-vit-c" class="collapse" aria-labelledby="sig-vit" data-parent="#sig-vit">
            <div class="card-body-aten-a shadow-none">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-1">
                            @if (isset($fichaAtencion) && $fichaAtencion->temperatura !=
                            null)
                            <label class="floating-label-activo-sm">Tº</label>
                            <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{{ $fichaAtencion->temperatura }}">
                            @else
                            <label class="floating-label-activo-sm">Tº</label>
                            <input type="text" class="form-control form-control-sm" name="temperatura" id="temperatura" value="{!! old('temperatura') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-1">
                            @if (isset($fichaAtencion) && $fichaAtencion->pulso != null)
                            <label class="floating-label-activo-sm">Pulso</label>
                            <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{{ $fichaAtencion->pulso }}">
                            @else
                            <label class="floating-label-activo-sm">Pulso</label>
                            <input type="text" class="form-control form-control-sm" name="pulso" id="pulso" value="{!! old('pulso') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            @if (isset($fichaAtencion) && $fichaAtencion->frecuencia_reposo
                            != null)
                            <label class="floating-label-activo-sm">Frec.
                                Reposo</label>
                            <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{{ $fichaAtencion->frecuencia_reposo }}">
                            @else
                            <label class="floating-label-activo-sm">Frec.
                                Reposo</label>
                            <input type="text" class="form-control form-control-sm" name="frecuencia_reposo" id="frecuencia_reposo" value="{!! old('frecuencia_reposo') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            @if (isset($fichaAtencion) && $fichaAtencion->peso != null)
                            <label class="floating-label-activo-sm">Peso</label>
                            <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{{ $fichaAtencion->peso }}">
                            @else
                            <label class="floating-label-activo-sm">Peso</label>
                            <input type="text" class="form-control form-control-sm" name="peso" id="peso" value="{!! old('peso') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            @if (isset($fichaAtencion) && $fichaAtencion->talla != null)
                            <label class="floating-label-activo-sm">Talla</label>
                            <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{{ $fichaAtencion->talla }}">
                            @else
                            <label class="floating-label-activo-sm">Talla</label>
                            <input type="text" class="form-control form-control-sm" name="talla" id="talla" value="{!! old('talla') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            @if (isset($fichaAtencion) && $fichaAtencion->imc != null)
                            <label class="floating-label-activo-sm">IMC</label>
                            <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{{ $fichaAtencion->imc }}">
                            @else
                            <label class="floating-label-activo-sm">IMC</label>
                            <input type="text" class="form-control form-control-sm" name="imc" id="imc" value="{!! old('imc') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-2">
                            @if (isset($fichaAtencion) && $fichaAtencion->estado_nutricional
                            != null)
                            <label class="floating-label-activo-sm">Estado
                                Nutricional</label>
                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{{ $fichaAtencion->estado_nutricional }}">
                            @else
                            <label class="floating-label-activo-sm">Estado
                                Nutricional</label>
                            <input type="text" class="form-control form-control-sm" name="estado_nutricional" id="estado_nutricional" value="{!! old('estado_nutricional') !!}">
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mb-1">
                            <label><strong>Presión Arterial</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="p_arterial" value="{!! old('p_arterial') !!}">
                                <label for="p_arterial" class="cr"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" id="form_1" style="display:none">
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bi !=
                            null)
                            <label class="floating-label-activo-sm">BI</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{{ $fichaAtencion->presion_bi }}">
                            @else
                            <label class="floating-label-activo-sm">BI</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bi" id="presion_bi" value="{!! old('presion_bi') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_bd !=
                            null)
                            <label class="floating-label-activo-sm">BD</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{{ $fichaAtencion->presion_bd }}">
                            @else
                            <label class="floating-label-activo-sm">BD</label>
                            <input type="text" class="form-control form-control-sm" name="presion_bd" id="presion_bd" value="{!! old('presion_bd') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_de_pie !=
                            null)
                            <label class="floating-label-activo-sm">De pié</label>
                            <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{{ $fichaAtencion->presion_de_pie }}">
                            @else
                            <label class="floating-label-activo-sm">De pié</label>
                            <input type="text" class="form-control form-control-sm" name="presion_de_pie" id="presion_de_pie" value="{!! old('presion_de_pie') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-3">
                            @if (isset($fichaAtencion) && $fichaAtencion->presion_sentado !=
                            null)
                            <label class="floating-label-activo-sm">Sentado</label>
                            <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{{ $fichaAtencion->presion_sentado }}">
                            @else
                            <label class="floating-label-activo-sm">Sentado</label>
                            <input type="text" class="form-control form-control-sm" name="presion_sentado" id="presion_sentado" value="{!! old('presion_sentado') !!}">
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mb-1">
                            <label><strong>Comunicación y traslado</strong></label>
                            <div class="switch switch-success d-inline m-r-10">
                                <input type="checkbox" id="com_trasl" value="{!! old('com_trasl') !!}">
                                <label for="com_trasl" class="cr"></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row" id="form_2" style="display:none">
                        <div class="form-group col-md-4">
                            @if (isset($fichaAtencion) &&
                            $fichaAtencion->ct_estado_conciencia != null)
                            <label class="floating-label-activo-sm">Estado de
                                conciencia</label>
                            <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{{ $fichaAtencion->ct_estado_conciencia }}">
                            @else
                            <label class="floating-label-activo-sm">Estado de
                                conciencia</label>
                            <input type="text" class="form-control form-control-sm" name="ct_estado_conciencia" id="ct_estado_conciencia" value="{!! old('ct_estado_conciencia') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            @if (isset($fichaAtencion) && $fichaAtencion->ct_lenguaje !=
                            null)
                            <label class="floating-label-activo-sm">Lenguaje</label>
                            <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{{ $fichaAtencion->ct_lenguaje }}">
                            @else
                            <label class="floating-label-activo-sm">Lenguaje</label>
                            <input type="text" class="form-control form-control-sm" name="ct_lenguaje" id="ct_lenguaje" value="{!! old('ct_lenguaje') !!}">
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            @if (isset($fichaAtencion) && $fichaAtencion->ct_traslado !=
                            null)
                            <label class="floating-label-activo-sm">Traslado</label>
                            <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{{ $fichaAtencion->ct_traslado }}">
                            @else
                            <label class="floating-label-activo-sm">Traslado</label>
                            <input type="text" class="form-control form-control-sm" name="ct_traslado" id="ct_traslado" value="{!! old('ct_traslado') !!}">
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

