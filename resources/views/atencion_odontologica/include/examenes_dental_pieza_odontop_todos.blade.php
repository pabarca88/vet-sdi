@php $counter = 1; @endphp
@foreach ($examenes as $examen)
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <div class="form-row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Pieza N°</label>
                        <input type="text" class="form-control form-control-sm" name="n_pieza_ex_pp{{ $counter }}" id="n_pieza_ex_pp{{ $counter }}" value="{{ $examen->numero_pieza }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Resp.Calor</label>
                        <select id="sel_endo_resp_calor{{ $counter }}" name="sel_endo_resp_calor{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->resp_calor == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->resp_calor == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->resp_calor == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->resp_calor == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->resp_calor == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Resp.Frio</label>
                        <select id="sel_endo_resp_frio{{ $counter }}" name="sel_endo_resp_frio{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->resp_frio == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->resp_frio == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->resp_frio == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->resp_frio == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->resp_frio == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>

                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Eléctrico</label>
                        <select id="sel_endo_resp_elect{{ $counter }}" name="sel_endo_resp_elect{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->electrico == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->electrico == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->electrico == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->electrico == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->electrico == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Percusión</label>
                        <select id="sel_endo_resp_perc{{ $counter }}" name="sel_endo_resp_perc{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->percusion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->percusion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->percusion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->percusion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->percusion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Exploración</label>
                        <select id="sel_endo_resp_expl{{ $counter }}" name="sel_endo_resp_expl{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->exploracion == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->exploracion == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->exploracion == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->exploracion == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->exploracion == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Cavitaria</label>
                        <select id="sel_endo_cavitaria{{ $counter }}" name="sel_endo_cavitaria{{ $counter }}" class="form-control form-control-sm" style=" font-size: 14px; color: #232020">
                            <option @if($examen->cavitaria == 'N/R No realizada') selected @endif><span>N/R </span> No realizada</option>
                            <option @if($examen->cavitaria == '↑ Aumentado') selected @endif><span>↑ </span> Aumentado</option>
                            <option @if($examen->cavitaria == '↓ Disminuido') selected @endif><span>↓ </span> Disminuido</option>
                            <option @if($examen->cavitaria == 'N Normal') selected @endif><span>N </span> Normal</a></option>
                            <option @if($examen->cavitaria == '(-) No responde') selected @endif><span>(-) </span> No responde</a></option>
                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-icon btn-danger-light-c" onclick="eliminar_pieza_dental_pieza({{ $examen->id }},'odontop')">X</button>
            </div>
        </div>
    </div>
</div>


@php $counter++; @endphp
@endforeach
