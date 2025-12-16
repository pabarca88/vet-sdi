<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="grupo_5_tab" data-toggle="tab" href="#grupo_5" role="tab" aria-controls="grupo_5" aria-selected="true">CUADRANTE 5</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_6-tab" data-toggle="tab" href="#grupo_6" role="tab" aria-controls="grupo_6" aria-selected="true">CUADRANTE 6</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_7-tab" data-toggle="tab" href="#grupo_7" role="tab" aria-controls="grupo_7" aria-selected="true">CUADRANTE 7</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_8-tab" data-toggle="tab" href="#grupo_8" role="tab" aria-controls="grupo_8" aria-selected="true">CUADRANTE 8</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" >
            <!--GRUPO 5-->
            <div class="tab-pane fade show active" id="grupo_5" role="tabpanel" aria-labelledby="grupo_5_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="text-center text-c-blue mb-2">CUADRANTE 5</h6>
                                            @if(isset($quinto_cuadrante))
                                            @foreach($quinto_cuadrante as $q5)
                                                <div class="table-responsive">
                                                    
                                                        <input type="hidden" name="ficha_id_atencion_dental_odon1"
                                                            id="ficha_id_atencion_dental_odon1">
                                                            {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                        <input type="hidden" name="paciente_atencion_dental_odon1"
                                                            id="paciente_atencion_dental_odon1" value="{{ $paciente->id }}">


                                                        <table class="table table-bordered table-xs" style="width:100%;">
                                                            <tr class="bg-encabezado">
                                                                <th class="text-center align-middle">PIEZA</th>
                                                                <th class="text-center align-middle">CARA</th>
                                                                <th class="text-center align-middle">CUADRANTE</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-1 py-1 text-center align-middle">
                                                                    <select id="pieza_odontograma_1" name="pieza_odontograma_1"
                                                                        class="form-control form-control-sm">
                                                                        <option value="5-5"> 5-5 </option>
                                                                        <option value="5-4"> 5-4 </option>
                                                                        <option value="5-3"> 5-3 </option>
                                                                        <option value="5-2"> 5-2 </option>
                                                                        <option value="5-1"> 5-1</option>
                                                                    </select>
                                                                    <div id="t53">
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-40 py-1">
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <table class="table-borderless" style="align-content:center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="padding-caras"></td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-v" id="caraV1"
                                                                                        onclick="cambiar_color(1)">
                                                                                        V
                                                                                    </div>

                                                                                </td>
                                                                                <td class="padding-caras"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-d" id="caraD1"
                                                                                        onclick="cambiar_colorD(1)">D</div>
                                                                                </td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-o" id="caraO1"
                                                                                        onclick="cambiar_colorO(1)">O</div>

                                                                                </td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-m" id="caraM1"
                                                                                        onclick="cambiar_colorM(1)">M</div>

                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="padding-caras"></td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-p" id="caraP1"
                                                                                        onclick="cambiar_colorP(1)">P</div>

                                                                                </td>
                                                                                <td class="padding-caras"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <div id="t53" style="width:100%;">
                                                                        <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                            class="wid-100">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-1 py-1"><button type="button"
                                                                        class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                        title="Historia" data-content="cargar historia del diente">Ver
                                                                        historia</button></td>
                                                                <td class="px-1 py-1">
                                                                    <select class="form-control form-control-sm" id="diagnostico_1"
                                                                        name="diagnostico_1">
                                                                        <option value="0">Diagnóstico</option>
                                                                        <option value="1">Caries</option>
                                                                        <option value="2">Fractura</option>
                                                                        <option value="3">periodontopatia</option>
                                                                        <option value="4">profilaxis</option>
                                                                        <option value="5">Restos radiculares</option>
                                                                    </select>
                                                                </td>
                                                                <td class="px-2 py-2">
                                                                    <select class="form-control form-control-sm" id="tratamiento_1"
                                                                        name="tratamiento_1">
                                                                            <optgroup label="Tratamiento Pediátrico">
                                                                            <option value="1 ">Examen inicial, plan de tratamiento y  presupuesto </option>                                                                                    
                                                                            <option value="2 ">Instrucción y control de higiene y profilaxis </option>                                                                                                                                                                  
                                                                            <option value="3 ">Aplicación flúor gel</option>
                                                                            <option value="4 ">Aplicación flúor barniz</option>
                                                                            <option value="5 ">Destartraje (por grupo, máximo dos) </option>
                                                                            <option value="6 ">Endodoncia pieza permanente</option>
                                                                            <option value="7 ">Exodoncia simple diente temporal</option>
                                                                            <option value="8 ">Mantenedor de espacio fijo o removible /valor no incluye laboratorio</option>                                                                                   
                                                                            <option value="9">Obturación v. ionómero pieza temporal anterior y posterior simple</option>                                                                                   
                                                                            <option value="10">Obturación v. ionómero pieza temporal anterior y posterior compuesto</option>                                                                                  
                                                                            <option value="11">Obturación resina fotocurado composite  pieza  permanente anterior y posterior simple</option>                                                                                                                                                                     
                                                                            <option value="12">Obturación resina fotocurado composite pieza permanente anterior y posterior compuesto</option>                                                                                      
                                                                            <option value="13">Obturación resina fotocurado, reconstitución </option>
                                                                            <option value="14">Obturación resina fotocurado carillas  anteriores </option>
                                                                            <option value="15">Pulpotomía</option>
                                                                            <option value="16">Pulpectomía anterior</option>
                                                                            <option value="17">Pulpectomía posterior</option>
                                                                            <option value="18">Recubrimiento pulpar directo</option>
                                                                            <option value="19">Recubrimiento pulpar indirecto</option>
                                                                            <option value="20">Sellantes pieza temporal y permanente  </option>
                                                                            <option value="21">Sesión de adaptación</option>
                                                                            <option value="22">Trat. de conducto en pieza temporal anterior </option>
                                                                            <option value="23">Tratamiento de conducto en pieza temporal posterior</option>   
                                                                            <option value="24">Tratamiento diente gangrenado</option>
                                                                            <option value="25">Otro diagnóstico anotar</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <input type="hidden" name="odontograma1" id="odontograma1" value="1">
                                                                    <input type="hidden" name="caraM_check_1" id="caraM_check_1" value="0">
                                                                    <input type="hidden" name="caraO_check_1" id="caraO_check_1" value="0">
                                                                    <input type="hidden" name="caraD_check_1" id="caraD_check_1" value="0">
                                                                    <input type="hidden" name="carav_check_1" id="carav_check_1" value="0">
                                                                    <input type="hidden" name="caraP_check_1" id="caraP_check_1" value="0">
                                                                    <button type="submit" class="btn btn-info btn-sm">
                                                                        Registrar
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 6-->
            <div class="tab-pane fade show" id="grupo_6" role="tabpanel" aria-labelledby="grupo_6_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="text-center text-c-blue mb-2">CUADRANTE 6</h6>
                                            @if(isset($sexto_cuadrante))
                                                @foreach($sexto_cuadrante as $pieza)
                                                <div class="table-responsive">
                                                    
                                                        <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                            id="ficha_id_atencion_dental_odon2">
                                                            {{-- value=" @if ($ficha != null) {{ $ficha->id }} @endif">  --}}
                                                        <input type="hidden" name="paciente_atencion_dental_odon2"
                                                            id="paciente_atencion_dental_odon2" value="{{ $paciente->id }}">
                                                        <table class="table table-bordered table-xs" style="width:100%;">
                                                            <tr class="bg-encabezado">
                                                                <th class="text-center align-middle">PIEZA</th>
                                                                <th class="text-center align-middle">CARA</th>
                                                                <th class="text-center align-middle">CUADRANTE</th>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-1 py-1 text-center align-middle">
                                                                    <select id="pieza_odontograma_2" name="pieza_odontograma_2"
                                                                        class="form-control form-control-sm">
                                                                        <option value="6-1"> 6-1 </option>
                                                                        <option value="6-2"> 6-2 </option>
                                                                        <option value="6-3"> 6-3 </option>
                                                                        <option value="6-4"> 6-4 </option>
                                                                        <option value="6-5"> 6-5</option>
                                                                    </select>
                                                                    <div id="t53">
                                                                        <img src="{{ asset('images/dientes/d53.png') }}"
                                                                            class="wid-40 py-1">
                                                                    </div>
                                                                </td>
                                                                <td class="align-middle text-center">
                                                                    <table class="table-borderless" style="align-content:center">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="padding-caras"></td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-v" id="caraV2"
                                                                                        onclick="cambiar_color(2)">V</div>
                                                                                </td>
                                                                                <td class="padding-caras"></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-d" id="caraD2"
                                                                                        onclick="cambiar_colorD(2)">D</div>
                                                                                </td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-o" id="caraO2"
                                                                                        onclick="cambiar_colorO(2)">O</div>
                                                                                </td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-m" id="caraM2"
                                                                                        onclick="cambiar_colorM(2)">M</div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="padding-caras"></td>
                                                                                <td class="padding-caras">
                                                                                    <div class="circulo-p" id="caraP2"
                                                                                        onclick="cambiar_colorP(2)">P</div>
                                                                                </td>
                                                                                <td class="padding-caras"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td class="text-center align-middle">
                                                                    <div id="t53" style="width:100%;">
                                                                        <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                            class="wid-100">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="px-1 py-1"><button type="button"
                                                                        class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                        title="Historia" data-content="cargar historia del diente">Ver
                                                                        historia</button></td>
                                                                <td class="px-1 py-1">
                                                                    <select class="form-control form-control-sm" id="diagnostico_2"
                                                                        name="diagnostico_2">
                                                                        <option value="0">Diagnóstico</option>
                                                                        <option value="1">Caries</option>
                                                                        <option value="2">Fractura</option>
                                                                        <option value="3">periodontopatia</option>
                                                                        <option value="4">profilaxis</option>
                                                                        <option value="5">Restos radiculares</option>
                                                                    </select>
                                                                </td>
                                                                <td class="px-1 py-1">
                                                                    <select class="form-control form-control-sm" id="tratamiento_2"
                                                                        name="tratamiento_2">
                                                                        <option>Tratamiento</option>
                                                                        <optgroup label="Tratamiento Pediátrico">
                                                                            <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                                presupuesto
                                                                            </option>
                                                                            <option value="dp_2">Instrucción y control de higiene y
                                                                                profilaxis
                                                                            </option>
                                                                            <option value="dp_3">Aplicación flúor gel</option>
                                                                            <option value="dp_4">Aplicación flúor barniz</option>
                                                                            <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                            </option>
                                                                            <option value="dp_6">Endodoncia pieza permanente</option>
                                                                            <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                            <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                                /valor no
                                                                                incluye laboratorio</option>
                                                                            <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                                anterior y
                                                                                posterior simple</option>
                                                                            <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                                anterior y
                                                                                posterior compuesto</option>
                                                                            <option value="dp_11">Obturación resina fotocurado composite
                                                                                pieza
                                                                                permanente anterior y posterior simple</option>
                                                                            <option value="dp_12">Obturación resina fotocurado composite
                                                                                pieza
                                                                                permanente anterior y posterior compuesto</option>
                                                                            <option value="dp_13">Obturación resina fotocurado,
                                                                                reconstitución
                                                                            </option>
                                                                            <option value="dp_14">Obturación resina fotocurado carillas
                                                                                anteriores
                                                                            </option>
                                                                            <option value="dp_15">Pulpotomía</option>
                                                                            <option value="dp_16">Pulpectomía anterior</option>
                                                                            <option value="dp_17">Pulpectomía posterior</option>
                                                                            <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                            <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                            <option value="dp_20">Sellantes pieza temporal y permanente
                                                                            </option>
                                                                            <option value="dp_21">Sesión de adaptación</option>
                                                                            <option value="dp_22">Trat. de conducto en pieza temporal
                                                                                anterior
                                                                            </option>
                                                                            <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                                posterior</option>
                                                                            <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                            <option value="dp_25">Urgencia odontopediátrica</option>
                                                                        </optgroup>
                                                                    </select>
                                                                    <input type="hidden" name="odontograma2" id="odontograma2" value="1">
                                                                    <input type="hidden" name="caraM_check_2" id="caraM_check_2" value="0">
                                                                    <input type="hidden" name="caraO_check_2" id="caraO_check_2" value="0">
                                                                    <input type="hidden" name="caraD_check_2" id="caraD_check_2" value="0">
                                                                    <input type="hidden" name="carav_check_2" id="carav_check_2" value="0">
                                                                    <input type="hidden" name="caraP_check_2" id="caraP_check_2" value="0">
                                                                    <button type="submit" class="btn btn-info btn-sm">
                                                                        Registrar
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 3-->
            <div class="tab-pane fade show" id="grupo_7" role="tabpanel" aria-labelledby="grupo_7-tab">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <h6 class="text-center text-c-blue mb-2">CUADRANTE 7</h6>
                                            @if(isset($septimo_cuadrante))
                                            @foreach($septimo_cuadrante as $cuadrante)
                                            <div class="table-responsive">
                                                
                                                    <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                        id="ficha_id_atencion_dental_odon3">
                                                    {{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif"> --}}
                                                    <input type="hidden" name="paciente_atencion_dental_odon3"
                                                        id="paciente_atencion_dental_odon3" value="{{ $paciente->id }}">
                                                    <table class="table table-bordered table-xs" style="width:100%;">
                                                        <tr class="bg-encabezado">
                                                            <th class="text-center align-middle">PIEZA</th>
                                                            <th class="text-center align-middle">CARA</th>
                                                            <th class="text-center align-middle">CUADRANTE</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1 text-center align-middle">
                                                                <select id="pieza_odontograma_3" name="pieza_odontograma_3"
                                                                    class="form-control form-control-sm">
                                                                    <option value="7-1"> 7-1 </option>
                                                                    <option value="7-2"> 7-2 </option>
                                                                    <option value="7-3"> 7-3 </option>
                                                                    <option value="7-4"> 7-4 </option>
                                                                    <option value="7-5"> 7-5</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dientes/d53.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV3"
                                                                                    onclick="cambiar_color(3)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD3"
                                                                                    onclick="cambiar_colorD(3)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO3"
                                                                                    onclick="cambiar_colorO(3)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM3"
                                                                                    onclick="cambiar_colorM(3)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP3"
                                                                                    onclick="cambiar_colorP(3)">P</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td class="text-center align-middle">
                                                                <div id="t53" style="width:100%;">
                                                                    <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                        class="wid-100">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="px-1 py-1"><button type="button"
                                                                    class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                    title="Historia" data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_3"
                                                                    name="diagnostico_3">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="01">Caries</option>
                                                                    <option value="02">Fractura</option>
                                                                    <option value="03">Periodontopatia</option>
                                                                    <option value="04">Profilaxis</option>
                                                                    <option value="05">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="tratamiento_3"
                                                                    name="tratamiento_3">
                                                                    <option>Tratamiento</option>
                                                                    <optgroup label="Tratamiento Pediátrico">
                                                                        <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                            presupuesto
                                                                        </option>
                                                                        <option value="dp_2">Instrucción y control de higiene y
                                                                            profilaxis
                                                                        </option>
                                                                        <option value="dp_3">Aplicación flúor gel</option>
                                                                        <option value="dp_4">Aplicación flúor barniz</option>
                                                                        <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                        </option>
                                                                        <option value="dp_6">Endodoncia pieza permanente</option>
                                                                        <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                        <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                            /valor no
                                                                            incluye laboratorio</option>
                                                                        <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior simple</option>
                                                                        <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                            anterior y
                                                                            posterior compuesto</option>
                                                                        <option value="dp_11">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior simple</option>
                                                                        <option value="dp_12">Obturación resina fotocurado composite
                                                                            pieza
                                                                            permanente anterior y posterior compuesto</option>
                                                                        <option value="dp_13">Obturación resina fotocurado,
                                                                            reconstitución
                                                                        </option>
                                                                        <option value="dp_14">Obturación resina fotocurado carillas
                                                                            anteriores
                                                                        </option>
                                                                        <option value="dp_15">Pulpotomía</option>
                                                                        <option value="dp_16">Pulpectomía anterior</option>
                                                                        <option value="dp_17">Pulpectomía posterior</option>
                                                                        <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                        <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                        <option value="dp_20">Sellantes pieza temporal y permanente
                                                                        </option>
                                                                        <option value="dp_21">Sesión de adaptación</option>
                                                                        <option value="dp_22">Trat. de conducto en pieza temporal
                                                                            anterior
                                                                        </option>
                                                                        <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                            posterior</option>
                                                                        <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                        <option value="dp_25">Urgencia odontopediátrica</option>
                                                                    </optgroup>
                                                                </select>
                                                                <input type="hidden" name="odontograma3" id="odontograma3" value="1">
                                                                <input type="hidden" name="caraM_check_3" id="caraM_check_3" value="0">
                                                                <input type="hidden" name="caraO_check_3" id="caraO_check_3" value="0">
                                                                <input type="hidden" name="caraD_check_3" id="caraD_check_3" value="0">
                                                                <input type="hidden" name="carav_check_3" id="carav_check_3" value="0">
                                                                <input type="hidden" name="caraP_check_3" id="caraP_check_3" value="0">
                                                                <button type="submit" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>

                                                            </td>
                                                        </tr>
                                                    </table>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 4-->
            <div class="tab-pane fade show" id="grupo_8" role="tabpanel" aria-labelledby="grupo_8-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="text-center text-c-blue mb-2">CUADRANTE 8</h6>
                                        @if(isset($octavo_cuadrante))
                                        @foreach($octavo_cuadrante as $cuadrante)
                                        <div class="table-responsive">
                                            
                                                <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                    id="ficha_id_atencion_dental_odon4"
                                                    >{{--  value=" @if ($ficha != null) {{ $ficha->id }} @endif" --}}
                                                <input type="hidden" name="paciente_atencion_dental_odon4"
                                                    id="paciente_atencion_dental_odon4" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_4" name="pieza_odontograma_4"
                                                                class="form-control form-control-sm">
                                                                <option value="8-5"> 8-5 </option>
                                                                <option value="8-4"> 8-4 </option>
                                                                <option value="8-3"> 8-3 </option>
                                                                <option value="8-2"> 8-2 </option>
                                                                <option value="8-1"> 8-1</option>
                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dientes/d53.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV4"
                                                                                onclick="cambiar_color(4)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD4"
                                                                                onclick="cambiar_colorD(4)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO4"
                                                                                onclick="cambiar_colorO(4)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM4"
                                                                                onclick="cambiar_colorM(4)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP4"
                                                                                onclick="cambiar_colorP(4)">P</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <div id="t53" style="width:100%;">
                                                                <img src="{{ asset('images/dientes/cuadrante.png') }}"
                                                                    class="wid-100">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1"><button type="button"
                                                                class="btn btn-block btn-sm btn-outline-primary" data-toggle="popover"
                                                                title="Historia" data-content="cargar historia del diente">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_4"
                                                                name="diagnostico_4">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="tratamiento_4"
                                                                name="tratamiento_4">
                                                                <option>Tratamiento</option>
                                                                <optgroup label="Tratamiento Pediátrico">
                                                                    <option value="dp_1">Examen inicial, plan de tratamiento y
                                                                        presupuesto
                                                                    </option>
                                                                    <option value="dp_2">Instrucción y control de higiene y
                                                                        profilaxis
                                                                    </option>
                                                                    <option value="dp_3">Aplicación flúor gel</option>
                                                                    <option value="dp_4">Aplicación flúor barniz</option>
                                                                    <option value="dp_5">Destartraje (por grupo, máximo dos)
                                                                    </option>
                                                                    <option value="dp_6">Endodoncia pieza permanente</option>
                                                                    <option value="dp_7">Exodoncia simple diente temporal</option>
                                                                    <option value="dp_8">Mantenedor de espacio fijo o removible
                                                                        /valor no
                                                                        incluye laboratorio</option>
                                                                    <option value="dp_9">Obturación v. ionómero pieza temporal
                                                                        anterior y
                                                                        posterior simple</option>
                                                                    <option value="dp_10">Obturación v. ionómero pieza temporal
                                                                        anterior y
                                                                        posterior compuesto</option>
                                                                    <option value="dp_11">Obturación resina fotocurado composite
                                                                        pieza
                                                                        permanente anterior y posterior simple</option>
                                                                    <option value="dp_12">Obturación resina fotocurado composite
                                                                        pieza
                                                                        permanente anterior y posterior compuesto</option>
                                                                    <option value="dp_13">Obturación resina fotocurado,
                                                                        reconstitución
                                                                    </option>
                                                                    <option value="dp_14">Obturación resina fotocurado carillas
                                                                        anteriores
                                                                    </option>
                                                                    <option value="dp_15">Pulpotomía</option>
                                                                    <option value="dp_16">Pulpectomía anterior</option>
                                                                    <option value="dp_17">Pulpectomía posterior</option>
                                                                    <option value="dp_18">Recubrimiento pulpar directo</option>
                                                                    <option value="dp_19">Recubrimiento pulpar indirecto</option>
                                                                    <option value="dp_20">Sellantes pieza temporal y permanente
                                                                    </option>
                                                                    <option value="dp_21">Sesión de adaptación</option>
                                                                    <option value="dp_22">Trat. de conducto en pieza temporal
                                                                        anterior
                                                                    </option>
                                                                    <option value="dp_23">Tratamiento de conducto en pieza temporal
                                                                        posterior</option>
                                                                    <option value="dp_24">Tratamiento diente gangrenado</option>
                                                                    <option value="dp_25">Urgencia odontopediátrica</option>
                                                                </optgroup>
                                                            </select>
                                                            <input type="hidden" name="odontograma4" id="odontograma4" value="1">
                                                            <input type="hidden" name="caraM_check_4" id="caraM_check_4" value="0">
                                                            <input type="hidden" name="caraO_check_4" id="caraO_check_4" value="0">
                                                            <input type="hidden" name="caraD_check_4" id="caraD_check_4" value="0">
                                                            <input type="hidden" name="carav_check_4" id="carav_check_4" value="0">
                                                            <input type="hidden" name="caraP_check_4" id="caraP_check_4" value="0">
                                                            <button type="submit" class="btn btn-info btn-sm">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>