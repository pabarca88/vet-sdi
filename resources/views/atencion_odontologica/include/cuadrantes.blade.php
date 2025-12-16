
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <ul class="nav nav-tabs-aten nav-fill mb-10" id="orl_adulto" role="tablist">
            <li class="nav-item">
                <a class="nav-link-aten text-reset active" id="grupo_1_tab" data-toggle="tab" href="#grupo_1" role="tab" aria-controls="grupo_1" aria-selected="true">Grupo I</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_2-tab" data-toggle="tab" href="#grupo_2" role="tab" aria-controls="grupo_2" aria-selected="true">Grupo II</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_3-tab" data-toggle="tab" href="#grupo_3" role="tab" aria-controls="grupo_3" aria-selected="true">Grupo III</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_4-tab" data-toggle="tab" href="#grupo_4" role="tab" aria-controls="grupo_4" aria-selected="true">Grupo IV</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_5-tab" data-toggle="tab" href="#grupo_5" role="tab" aria-control="grupo_5" aria-selected="false">Grupo V</a>
            </li>
            <li class="nav-item">
                <a class="nav-link-aten text-reset" id="grupo_6-tab" data-toggle="tab" href="#grupo_6" role="tab" aria-control="grupo_6" aria-selected="false">Grupo VI</a>
            </li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="tab-content" id="endo_eval_adulto">
            <!--GRUPO 1-->
            <div class="tab-pane fade show active" id="grupo_1" role="tabpanel" aria-labelledby="grupo_1_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <h6 class="text-center text-c-blue mb-2">GRUPO 1</h6>
                                    <div class="form-row">
                                        @if(isset($primer_cuadrante))
                                            @foreach ($primer_cuadrante as $primer)
                                                <div class="col-md-12">

                                                    <div class="table-responsive">

                                                            <input type="hidden" name="ficha_id_lugar_atencion" id="ficha_id_lugar_atencion"
                                                                value=" @if ($id_lugar_atencion != null) {{ $id_lugar_atencion }} @endif">
                                                            <input type="hidden" name="ficha_id_atencion_dental_odon"
                                                                id="ficha_id_atencion_dental_odon"
                                                                value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                                                            <input type="hidden" name="paciente_atencion_dental_odon{{ $loop->index + 1 }}"
                                                                id="paciente_atencion_dental_odon{{ $loop->index + 1 }}_1" value="{{ $paciente->id }}">
                                                                <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                <tr class="bg-encabezado">
                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                    <th class="text-center align-middle">CARA</th>
                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                        <select id="pieza_odontograma_{{ $loop->index + 1  }}_1" name="pieza_odontograma_{{ $loop->index + 1 }}_1"
                                                                            class="form-control form-control-sm">
                                                                            <option value="{{ $primer->numero_pieza }}"> {{ $primer->numero_pieza }} </option>
                                                                        </select>
                                                                        <div id="t53">
                                                                            <img src="{{ asset('images/dental/i/dientes/d18.png') }}"
                                                                                class="wid-40 py-1">
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <table class="table-borderless" style="align-content:center">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="padding-caras"></td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-v" id="caraV{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_color({{ $loop->index + 1 }},1)">
                                                                                            V
                                                                                        </div>

                                                                                    </td>
                                                                                    <td class="padding-caras"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-d" id="caraD{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorD({{ $loop->index + 1 }},1)">D</div>
                                                                                    </td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-o" id="caraO{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorO({{ $loop->index + 1 }},1)">O</div>

                                                                                    </td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-m" id="caraM{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorM({{ $loop->index + 1 }},1)">M</div>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="padding-caras"></td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-p" id="caraP{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorP({{ $loop->index + 1 }},1)">P</div>

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
                                                                            class="btn btn-block btn-sm btn-outline-primary"
                                                                            data-toggle="popover" title="Historia"
                                                                            data-content="cargar historia del diente" onclick="info_odontograma('{{ $primer->numero_pieza }}')">Ver
                                                                            historia</button></td>
                                                                    <td class="px-1 py-1">
                                                                        <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_1"
                                                                            name="diagnostico_{{ $loop->index + 1 }}_1">
                                                                            <option value="0">Diagnóstico</option>
                                                                            <option value="1">Caries</option>
                                                                            <option value="2">Fractura</option>
                                                                            <option value="3">periodontopatia</option>
                                                                            <option value="4">profilaxis</option>
                                                                            <option value="5">Restos radiculares</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="px-1 py-1">
                                                                        <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_1" name="tratamiento_{{ $loop->index + 1 }}_1" placeholder="Tratamiento">
                                                                        <button type="button" onclick="registrar_odontograma_primer_cuadrante({{ $loop->index + 1 }},'gral')" style="margin-top:15px" class="btn btn-success-light btn-sm">Registrar </button>
                                                                        <input type="hidden" name="odontograma{{ $loop->index + 1 }}_1" id="odontograma{{ $loop->index + 1 }}_1"
                                                                            value="1">
                                                                            <input type="hidden" name="cuadrante" id="cuadrante" value="1">
                                                                            <input type="hidden" name="posicion_pieza" id="posicion_pieza" value="{{ $loop->index + 1 }}">
                                                                        <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_1" id="caraM_check_{{ $loop->index + 1 }}_1"
                                                                            value="0">
                                                                        <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_1" id="caraO_check_{{ $loop->index + 1 }}_1"
                                                                            value="0">
                                                                        <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_1" id="caraD_check_{{ $loop->index + 1 }}_1" value="0">
                                                                        <input type="hidden" name="carav_check_{{ $loop->index + 1 }}_1" id="carav_check_{{ $loop->index + 1 }}_1"value="0">
                                                                        <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_1" id="caraP_check_{{ $loop->index + 1 }}_1"value="0">
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if(isset($primer_cuadrante_endodoncia))
                                            @foreach ($primer_cuadrante_endodoncia as $primer)
                                                <div class="col-md-12">

                                                    <div class="table-responsive">

                                                            <input type="hidden" name="ficha_id_lugar_atencion" id="ficha_id_lugar_atencion"
                                                                value=" @if ($id_lugar_atencion != null) {{ $id_lugar_atencion }} @endif">
                                                            <input type="hidden" name="ficha_id_atencion_dental_odon"
                                                                id="ficha_id_atencion_dental_odon"
                                                                value=" @if ($id_ficha_atencion != null) {{ $id_ficha_atencion }} @endif">
                                                            <input type="hidden" name="paciente_atencion_dental_odon{{ $loop->index + 1 }}"
                                                                id="paciente_atencion_dental_odon{{ $loop->index + 1 }}_1" value="{{ $paciente->id }}">
                                                                <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                                                            <table class="table table-bordered table-xs" style="width:100%;">
                                                                <tr class="bg-encabezado">
                                                                    <th class="text-center align-middle">PIEZA</th>
                                                                    <th class="text-center align-middle">CARA</th>
                                                                    <th class="text-center align-middle">CUADRANTE</th>
                                                                </tr>
                                                                <tr>
                                                                    <td class="px-1 py-1 text-center align-middle">
                                                                        <select id="pieza_odontograma_endo_{{ $loop->index + 1  }}_1" name="pieza_odontograma_endo_{{ $loop->index + 1 }}_1"
                                                                            class="form-control form-control-sm">
                                                                            <option value="{{ $primer->numero_pieza }}"> {{ $primer->numero_pieza }} </option>
                                                                        </select>
                                                                        <div id="t53">
                                                                            <img src="{{ asset('images/dental/i/dientes/d18.png') }}"
                                                                                class="wid-40 py-1">
                                                                        </div>
                                                                    </td>
                                                                    <td class="align-middle text-center">
                                                                        <table class="table-borderless" style="align-content:center">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td class="padding-caras"></td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_color_endo({{ $loop->index + 1 }},1)">
                                                                                            V
                                                                                        </div>

                                                                                    </td>
                                                                                    <td class="padding-caras"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorD_endo({{ $loop->index + 1 }},1)">D</div>
                                                                                    </td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorO_endo({{ $loop->index + 1 }},1)">O</div>

                                                                                    </td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorM_endo({{ $loop->index + 1 }},1)">M</div>

                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="padding-caras"></td>
                                                                                    <td class="padding-caras">
                                                                                        <div class="circulo-p" id="caraP{{ $loop->index + 1 }}1"
                                                                                            onclick="cambiar_colorP({{ $loop->index + 1 }},1)">P</div>

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
                                                                            class="btn btn-block btn-sm btn-outline-primary"
                                                                            data-toggle="popover" title="Historia"
                                                                            data-content="cargar historia del diente" onclick="info_odontograma('{{ $primer->numero_pieza }}')">Ver
                                                                            historia</button></td>
                                                                    <td class="px-1 py-1">
                                                                        <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_1"
                                                                            name="diagnostico_endo_{{ $loop->index + 1 }}_1">
                                                                            <option value="0">Diagnóstico</option>
                                                                            <option value="1">Caries</option>
                                                                            <option value="2">Fractura</option>
                                                                            <option value="3">periodontopatia</option>
                                                                            <option value="4">profilaxis</option>
                                                                            <option value="5">Restos radiculares</option>
                                                                        </select>
                                                                    </td>
                                                                    <td class="px-1 py-1">
                                                                        <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_1" name="tratamiento_endo_{{ $loop->index + 1 }}_1" placeholder="Tratamiento">
                                                                        <button type="button" onclick="registrar_odontograma_primer_cuadrante({{ $loop->index + 1 }},'endo')" style="margin-top:15px" class="btn btn-success-light btn-sm">Registrar </button>
                                                                        <input type="hidden" name="odontograma{{ $loop->index + 1 }}_1" id="odontograma{{ $loop->index + 1 }}_1"
                                                                            value="1">
                                                                            <input type="hidden" name="cuadrante" id="cuadrante" value="1">
                                                                            <input type="hidden" name="posicion_pieza" id="posicion_pieza" value="{{ $loop->index + 1 }}">
                                                                        <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_1" id="caraM_endo_check_{{ $loop->index + 1 }}_1"
                                                                            value="0">
                                                                        <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_1" id="caraO_endo_check_{{ $loop->index + 1 }}_1"
                                                                            value="0">
                                                                        <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_1" id="caraD_endo_check_{{ $loop->index + 1 }}_1" value="0">
                                                                        <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_1" id="caraV_endo_check_{{ $loop->index + 1 }}_1"value="0">
                                                                        <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_1" id="caraP_endo_check_{{ $loop->index + 1 }}_1"value="0">
                                                                    </td>
                                                                </tr>
                                                            </table>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($primer_cuadrante->count() == 0 && $primer_cuadrante_endodoncia->count() == 0)
                                            <div class="col-md-12">
                                                <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 2-->
            <div class="tab-pane fade show" id="grupo_2" role="tabpanel" aria-labelledby="grupo_2_tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <h6 class="text-center text-c-blue mb-2">GRUPO 2</h6>
                                            @if(isset($segundo_cuadrante))
                                            @foreach ($segundo_cuadrante as $segundo)
                                            <div class="table-responsive">

                                                    <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                        id="ficha_id_atencion_dental_odon2"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}
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
                                                                <select id="pieza_odontograma_{{ $loop->index + 1  }}_2" name="pieza_odontograma_{{ $loop->index + 1  }}_2"
                                                                    class="form-control form-control-sm">
                                                                    <option value="{{ $segundo->numero_pieza }}"> {{ $segundo->numero_pieza }}</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d21.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_color({{ $loop->index + 1 }},2)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorD({{ $loop->index + 1 }},2)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorO({{ $loop->index + 1 }},2)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorM({{ $loop->index + 1 }},2)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorP({{ $loop->index + 1 }},2)">P</div>
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
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_2"
                                                                    name="diagnostico_{{ $loop->index + 1 }}_2">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="1">Caries</option>
                                                                    <option value="2">Fractura</option>
                                                                    <option value="3">periodontopatia</option>
                                                                    <option value="4">profilaxis</option>
                                                                    <option value="5">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_2" name="tratamiento_{{ $loop->index + 1 }}_2" placeholder="Tratamiento">
                                                                <input type="hidden" name="odontograma{{ $loop->index + 1 }}2" id="odontograma{{ $loop->index + 1 }}2"
                                                                    value="1">
                                                                    <input type="hidden" name="cuadrante" id="cuadrante" value="2">
                                                                    <input type="hidden" name="posicion_pieza" id="posicion_pieza" value="{{ $loop->index + 1 }}">
                                                                <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_2" id="caraM_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_2" id="caraO_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_2" id="caraD_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="carav_check_{{ $loop->index + 1 }}_2" id="carav_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_2" id="caraP_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <button type="button" onclick="registrar_odontograma_segundo_cuadrante({{ $loop->index + 1 }},'gral')" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>

                                            </div>
                                            @endforeach
                                            @endif
                                            @if(isset($segundo_cuadrante_endodoncia))
                                            @foreach ($segundo_cuadrante_endodoncia as $segundo)
                                            <div class="table-responsive">

                                                    <input type="hidden" name="ficha_id_atencion_dental_odon2"
                                                        id="ficha_id_atencion_dental_odon2"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}
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
                                                                <select id="pieza_odontograma_endo_{{ $loop->index + 1  }}_2" name="pieza_odontograma_endo_{{ $loop->index + 1  }}_2"
                                                                    class="form-control form-control-sm">
                                                                    <option value="{{ $segundo->numero_pieza }}"> {{ $segundo->numero_pieza }}</option>
                                                                </select>
                                                                <div id="t53">
                                                                    <img src="{{ asset('images/dental/i/dientes/d21.png') }}"
                                                                        class="wid-40 py-1">
                                                                </div>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <table class="table-borderless" style="align-content:center">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_color_endo({{ $loop->index + 1 }},2)">V</div>
                                                                            </td>
                                                                            <td class="padding-caras"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorD_endo({{ $loop->index + 1 }},2)">D</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorO_endo({{ $loop->index + 1 }},2)">O</div>
                                                                            </td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorM_endo({{ $loop->index + 1 }},2)">M</div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="padding-caras"></td>
                                                                            <td class="padding-caras">
                                                                                <div class="circulo-p" id="caraP_endo{{ $loop->index + 1 }}2"
                                                                                    onclick="cambiar_colorP_endo({{ $loop->index + 1 }},2)">P</div>
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
                                                                    class="btn btn-block btn-sm btn-outline-primary"
                                                                    data-toggle="popover" title="Historia"
                                                                    data-content="cargar historia del diente">Ver
                                                                    historia</button></td>
                                                            <td class="px-1 py-1">
                                                                <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_2"
                                                                    name="diagnostico_endo_{{ $loop->index + 1 }}_2">
                                                                    <option value="0">Diagnóstico</option>
                                                                    <option value="1">Caries</option>
                                                                    <option value="2">Fractura</option>
                                                                    <option value="3">periodontopatia</option>
                                                                    <option value="4">profilaxis</option>
                                                                    <option value="5">Restos radiculares</option>
                                                                </select>
                                                            </td>
                                                            <td class="px-1 py-1">
                                                                <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_2" name="tratamiento_endo_{{ $loop->index + 1 }}_2" placeholder="Tratamiento">
                                                                <input type="hidden" name="odontograma_endo{{ $loop->index + 1 }}2" id="odontograma_endo{{ $loop->index + 1 }}2"
                                                                    value="1">
                                                                    <input type="hidden" name="cuadrante" id="cuadrante" value="2">
                                                                    <input type="hidden" name="posicion_pieza_endo" id="posicion_pieza_endo" value="{{ $loop->index + 1 }}">
                                                                <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_2" id="caraM_endo_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_2" id="caraO_endo_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_2" id="caraD_endo_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_2" id="caraV_endo_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_2" id="caraP_endo_check_{{ $loop->index + 1 }}_2"
                                                                    value="0">
                                                                <button type="button" onclick="registrar_odontograma_segundo_cuadrante({{ $loop->index + 1 }},'endo')" class="btn btn-info btn-sm">
                                                                    Registrar
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>

                                            </div>
                                            @endforeach
                                            @endif
                                            @if($segundo_cuadrante->count() == 0 && $segundo_cuadrante_endodoncia->count() == 0)
                                                <div class="col-md-12">
                                                    <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                                </div>
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
            <div class="tab-pane fade show" id="grupo_3" role="tabpanel" aria-labelledby="grupo_3-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="text-center text-c-blue mb-2">GRUPO 3</h6>
                                        @if(isset($tercer_cuadrante))
                                        @foreach ($tercer_cuadrante as $tercer)
                                        <div class="table-responsive">

                                                <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                    id="ficha_id_atencion_dental_odon3"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                <input type="hidden" name="id_paciente"
                                                    id="id_paciente" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_3" name="pieza_odontograma_{{ $loop->index + 1 }}_3"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $tercer->numero_pieza }}"> {{ $tercer->numero_pieza }} </option>
                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d26.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_color({{ $loop->index + 1 }},3)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }},3)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }},3)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }},3)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }},3)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente" onclick="info_odontograma('{{ $tercer->numero_pieza }}')">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_3"
                                                                name="diagnostico_{{ $loop->index + 1 }}_3">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">Periodontopatia</option>
                                                                <option value="04">Profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_3" name="tratamiento_{{ $loop->index + 1 }}_3" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_3" id="odontograma{{ $loop->index + 1 }}_3"
                                                                value="1">
                                                                <input type="hidden" name="cuadrante" id="cuadrante" value="3">
                                                                <input type="hidden" name="posicion_pieza" id="posicion_pieza" value="{{ $loop->index + 1 }}">
                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_3" id="caraM_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_3" id="caraO_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_3" id="caraD_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="carav_check_{{ $loop->index + 1 }}_3" id="carav_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_3" id="caraP_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_tercer_cuadrante({{ $loop->index + 1 }},'gral')">
                                                                Registrar
                                                            </button>

                                                        </td>
                                                    </tr>
                                                </table>

                                        </div>
                                        @endforeach
                                        @endif
                                        @if(isset($tercer_cuadrante_endodoncia))
                                        @foreach ($tercer_cuadrante_endodoncia as $tercer)
                                        <div class="table-responsive">

                                                <input type="hidden" name="ficha_id_atencion_dental_odon3"
                                                    id="ficha_id_atencion_dental_odon3"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

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
                                                            <select id="pieza_odontograma_endo_{{ $loop->index + 1 }}_3" name="pieza_odontograma_endo_{{ $loop->index + 1 }}_3"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $tercer->numero_pieza }}"> {{ $tercer->numero_pieza }} </option>
                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d26.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_color_endo({{ $loop->index + 1 }},3)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorD_endo({{ $loop->index + 1 }},3)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorO_endo({{ $loop->index + 1 }},3)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorM_endo({{ $loop->index + 1 }},3)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP_endo{{ $loop->index + 1 }}3"
                                                                                onclick="cambiar_colorP_endo({{ $loop->index + 1 }},3)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_3"
                                                                name="diagnostico_endo_{{ $loop->index + 1 }}_3">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">Periodontopatia</option>
                                                                <option value="04">Profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_3" name="tratamiento_endo_{{ $loop->index + 1 }}_3" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma3" id="odontograma3"
                                                                value="1">
                                                            <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_3" id="caraM_endo_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_3" id="caraO_endo_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_3" id="caraD_endo_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_3" id="caraV_endo_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_3" id="caraP_endo_check_{{ $loop->index + 1 }}_3"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_tercer_cuadrante({{ $loop->index + 1 }},'endo')">
                                                                Registrar
                                                            </button>

                                                        </td>
                                                    </tr>
                                                </table>

                                        </div>
                                        @endforeach
                                        @endif
                                        @if(count($tercer_cuadrante) == 0 && count($tercer_cuadrante_endodoncia) == 0)
                                            {{-- No hay piezas dentales registradas --}}
                                            <div class="col-md-12">
                                                <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 4-->
            <div class="tab-pane fade show" id="grupo_4" role="tabpanel" aria-labelledby="grupo_4-tab">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <h6 class="text-center text-c-blue mb-2">GRUPO 4</h6>
                                        @if(isset($cuarto_cuadrante))
                                        @foreach ($cuarto_cuadrante as $cuarto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                    id="ficha_id_atencion_dental_odon4"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

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
                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_4" name="pieza_odontograma_{{ $loop->index + 1 }}_4"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $cuarto->numero_pieza }}"> {{ $cuarto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_color({{ $loop->index + 1 }},4)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }},4)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }},4)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }},4)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }},4)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente" onclick="info_odontograma('{{ $cuarto->numero_pieza }}')">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_4"
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
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_4" name="tratamiento_{{ $loop->index + 1 }}_4" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_4" id="odontograma{{ $loop->index + 1 }}_4"
                                                                value="1">
                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_4" id="caraM_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_4" id="caraO_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_4" id="caraD_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_4" id="caraV_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_4" id="caraP_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_cuarto_cuadrante({{ $loop->index + 1 }},'gral')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(isset($cuarto_cuadrante_endodoncia))
                                        @foreach ($cuarto_cuadrante_endodoncia as $cuarto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon4"
                                                    id="ficha_id_atencion_dental_odon4"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

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
                                                            <select id="pieza_odontograma_endo_{{ $loop->index + 1 }}_4" name="pieza_odontograma_endo_{{ $loop->index + 1 }}_4"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $cuarto->numero_pieza }}"> {{ $cuarto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_color_endo({{ $loop->index +1 }},4)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorD_endo({{ $loop->index + 1 }},4)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorO_endo({{ $loop->index + 1 }},4)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorM_endo({{ $loop->index + 1 }},4)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP_endo{{ $loop->index + 1 }}4"
                                                                                onclick="cambiar_colorP_endo({{ $loop->index + 1 }},4)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_4"
                                                                name="diagnostico_endo_{{ $loop->index + 1 }}_4">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_4" name="tratamiento_endo_{{ $loop->index + 1 }}_4" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma4" id="odontograma4"
                                                                value="1">
                                                            <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_4" id="caraM_endo_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_4" id="caraO_endo_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_4" id="caraD_endo_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_4" id="caraV_endo_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_4" id="caraP_endo_check_{{ $loop->index + 1 }}_4"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm"  onclick="registrar_odontograma_cuarto_cuadrante({{ $loop->index + 1 }},'endo')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(count($cuarto_cuadrante) == 0 && count($cuarto_cuadrante_endodoncia) == 0)
                                            {{-- No hay piezas dentales registradas --}}
                                            <div class="col-md-12">
                                                <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 5-->
            <div class="tab-pane fade show" id="grupo_5" role="tabpanel" aria-labelledby="grupo_5-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h6 class="text-center text-c-blue mb-2">GRUPO 5</h6>
                                        @if(isset($quinto_cuadrante))
                                        @foreach ($quinto_cuadrante as $quinto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon5"
                                                    id="ficha_id_atencion_dental_odon5"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                <input type="hidden" name="paciente_atencion_dental_odon5"
                                                    id="paciente_atencion_dental_odon5" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_5" name="pieza_odontograma_{{ $loop->index + 1 }}_5"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $quinto->numero_pieza }}"> {{ $quinto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_color({{ $loop->index + 1 }},5)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }},5)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }},5)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }},5)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }},5)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente" onclick="info_odontograma('{{ $quinto->numero_pieza }}')">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_5"
                                                                name="diagnostico_5">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_5" name="tratamiento_{{ $loop->index + 1 }}_5" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_5" id="odontograma{{ $loop->index + 1 }}_5"
                                                                value="1">
                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_5" id="caraM_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_5" id="caraO_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_5" id="caraD_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_5" id="caraV_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_5" id="caraP_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_quinto_cuadrante({{ $loop->index + 1 }},'gral')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(isset($quinto_cuadrante_endodoncia))
                                        @foreach ($quinto_cuadrante_endodoncia as $quinto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon5"
                                                    id="ficha_id_atencion_dental_odon5"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                <input type="hidden" name="paciente_atencion_dental_odon5"
                                                    id="paciente_atencion_dental_odon5" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_endo_{{ $loop->index + 1 }}_5" name="pieza_odontograma_endo_{{ $loop->index + 1 }}_5"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $quinto->numero_pieza }}"> {{ $quinto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_color_endo({{ $loop->index +1 }},5)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorD_endo({{ $loop->index + 1 }},5)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorO_endo({{ $loop->index + 1 }},5)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorM_endo({{ $loop->index + 1 }},5)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP_endo{{ $loop->index + 1 }}5"
                                                                                onclick="cambiar_colorP_endo({{ $loop->index + 1 }},5)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_5"
                                                                name="diagnostico_endo_{{ $loop->index + 1 }}_5">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td                                                                                         <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_5" name="tratamiento_endo_{{ $loop->index + 1 }}_5" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma4" id="odontograma4"
                                                                value="1">
                                                            <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_5" id="caraM_endo_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_5" id="caraO_endo_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_5" id="caraD_endo_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_5" id="caraV_endo_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_5" id="caraP_endo_check_{{ $loop->index + 1 }}_5"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm"  onclick="registrar_odontograma_quinto_cuadrante({{ $loop->index + 1 }},'endo')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(count($quinto_cuadrante) == 0 && count($quinto_cuadrante_endodoncia) == 0)
                                            {{-- No hay piezas dentales registradas --}}
                                            <div class="col-md-12">
                                                <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--GRUPO 6-->
            <div class="tab-pane fade show" id="grupo_6" role="tabpanel" aria-labelledby="grupo_6-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <h6 class="text-center text-c-blue mb-2">GRUPO 6</h6>
                                        @if(isset($sexto_cuadrante))
                                        @foreach ($sexto_cuadrante as $sexto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon6"
                                                    id="ficha_id_atencion_dental_odon6"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                <input type="hidden" name="paciente_atencion_dental_odon6"
                                                    id="paciente_atencion_dental_odon5" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_{{ $loop->index + 1 }}_6" name="pieza_odontograma_{{ $loop->index + 1 }}_6"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $sexto->numero_pieza }}"> {{ $sexto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_color({{ $loop->index + 1 }},6)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorD({{ $loop->index + 1 }},6)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorO({{ $loop->index + 1 }},6)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorM({{ $loop->index + 1 }},6)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorP({{ $loop->index + 1 }},6)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente" onclick="info_odontograma('{{ $sexto->numero_pieza }}')">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_{{ $loop->index + 1 }}_6"
                                                                name="diagnostico_6">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_{{ $loop->index + 1 }}_6" name="tratamiento_{{ $loop->index + 1 }}_6" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma{{ $loop->index + 1 }}_6" id="odontograma{{ $loop->index + 1 }}_6"
                                                                value="1">
                                                            <input type="hidden" name="caraM_check_{{ $loop->index + 1 }}_6" id="caraM_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraO_check_{{ $loop->index + 1 }}_6" id="caraO_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraD_check_{{ $loop->index + 1 }}_6" id="caraD_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraV_check_{{ $loop->index + 1 }}_6" id="caraV_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraP_check_{{ $loop->index + 1 }}_6" id="caraP_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm" onclick="registrar_odontograma_sexto_cuadrante({{ $loop->index + 1 }},'gral')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if(isset($sexto_cuadrante_endodoncia))
                                        @foreach ($sexto_cuadrante_endodoncia as $sexto)
                                        <div class="table-responsive">
                                            <form id="form_6_5" action="{{ route('dental.registrar_odontograma') }}"
                                                method="POST">

                                                @csrf
                                                <input type="hidden" name="ficha_id_atencion_dental_odon6"
                                                    id="ficha_id_atencion_dental_odon6"
                                                    {{--   value=" @if ($ficha != null) {{ $ficha->id }} @endif">--}}

                                                <input type="hidden" name="paciente_atencion_dental_odon6"
                                                    id="paciente_atencion_dental_odon6" value="{{ $paciente->id }}">
                                                <table class="table table-bordered table-xs" style="width:100%;">
                                                    <tr class="bg-encabezado">
                                                        <th class="text-center align-middle">PIEZA</th>
                                                        <th class="text-center align-middle">CARA</th>
                                                        <th class="text-center align-middle">CUADRANTE</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-1 py-1 text-center align-middle">
                                                            <select id="pieza_odontograma_endo_{{ $loop->index + 1 }}_6" name="pieza_odontograma_endo_{{ $loop->index + 1 }}_6"
                                                                class="form-control form-control-sm">
                                                                <option value="{{ $sexto->numero_pieza }}"> {{ $sexto->numero_pieza }} </option>

                                                            </select>
                                                            <div id="t53">
                                                                <img src="{{ asset('images/dental/i/dientes/d47.png') }}"
                                                                    class="wid-40 py-1">
                                                            </div>
                                                        </td>
                                                        <td class="align-middle text-center">
                                                            <table class="table-borderless" style="align-content:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-v" id="caraV_endo{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_color_endo({{ $loop->index +1 }},6)">V</div>
                                                                        </td>
                                                                        <td class="padding-caras"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-d" id="caraD_endo{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorD_endo({{ $loop->index + 1 }},6)">D</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-o" id="caraO_endo{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorO_endo({{ $loop->index + 1 }},6)">O</div>
                                                                        </td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-m" id="caraM_endo{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorM_endo({{ $loop->index + 1 }},6)">M</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="padding-caras"></td>
                                                                        <td class="padding-caras">
                                                                            <div class="circulo-p" id="caraP_endo{{ $loop->index + 1 }}6"
                                                                                onclick="cambiar_colorP_endo({{ $loop->index + 1 }},6)">P</div>
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
                                                                class="btn btn-block btn-sm btn-outline-primary"
                                                                data-toggle="popover" title="Historia"
                                                                data-content="cargar historia del diente">Ver
                                                                historia</button></td>
                                                        <td class="px-1 py-1">
                                                            <select class="form-control form-control-sm" id="diagnostico_endo_{{ $loop->index + 1 }}_6"
                                                                name="diagnostico_endo_{{ $loop->index + 1 }}_6">
                                                                <option value="0">Diagnóstico</option>
                                                                <option value="01">Caries</option>
                                                                <option value="02">Fractura</option>
                                                                <option value="03">periodontopatia</option>
                                                                <option value="04">profilaxis</option>
                                                                <option value="05">Restos radiculares</option>
                                                            </select>
                                                        </td>
                                                        <td class="px-1 py-1">
                                                            <input type="text" class="form-control form-control-sm tratamiento-autocomplete" id="tratamiento_endo_{{ $loop->index + 1 }}_6" name="tratamiento_endo_{{ $loop->index + 1 }}_6" placeholder="Tratamiento">
                                                            <input type="hidden" name="odontograma4" id="odontograma4"
                                                                value="1">
                                                            <input type="hidden" name="caraM_endo_check_{{ $loop->index + 1 }}_6" id="caraM_endo_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraO_endo_check_{{ $loop->index + 1 }}_6" id="caraO_endo_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraD_endo_check_{{ $loop->index + 1 }}_6" id="caraD_endo_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraV_endo_check_{{ $loop->index + 1 }}_6" id="caraV_endo_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <input type="hidden" name="caraP_endo_check_{{ $loop->index + 1 }}_6" id="caraP_endo_check_{{ $loop->index + 1 }}_6"
                                                                value="0">
                                                            <button type="button" class="btn btn-info btn-sm"  onclick="registrar_odontograma_sexto_cuadrante({{ $loop->index + 1 }},'endo')">
                                                                Registrar
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>
                                        @endforeach
                                        @endif
                                        @if($sexto_cuadrante->count() == 0 && $sexto_cuadrante_endodoncia->count() == 0)
                                            <div class="col-md-12">
                                                <h6 class="text-center text-c-blue mb-2">No hay piezas dentales registradas</h6>
                                            </div>
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

{{-- atencion_odontologica/include/cuadrantes.blade.php --}}
<div>
    <!-- Contenido de los cuadrantes -->
</div>

<input type="hidden" name="url_tratamientos" id="url_tratamientos" value="{{ $url_tratamientos }}">

{{-- Script para inicializar el autocomplete --}}
<script>
    $(document).ready(function() {
        let url = $('#url_tratamientos').val();
        $('.tratamiento-autocomplete').each(function() {
            $(this).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: url,
                        type: 'post',
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success: function(data) {
                            if (data.length == 0) {
                                $('.diagnostico_activo').hide();
                                $('.diagnostico_inactivo').show();
                            } else {
                                $('.diagnostico_activo').show();
                                $('.diagnostico_inactivo').hide();
                            }
                            response(data);
                        }
                    });
                },
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    $(this).next('input[type="hidden"]').val(ui.item.value);
                    return false;
                }
            });
        });
    });
</script>

