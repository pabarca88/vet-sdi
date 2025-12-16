  {{--  </head>  --}}
  <style>
    #i27{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente27-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-27.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i27b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente27b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-27b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d27,#i27,#i27b,#f27,,#ae27-a,#ae27-b:hover{
        background: #E6E6E6;
    }
    #i27-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f27{
        width: 95%;
        height: 18px;

        border: 1px solid #2cdcbf;
        background-repeat: no-repeat;
        float:left;
        display:inline;
    }
    #lineas-gr,#lineas-gr-inf{
        width: 100%;
        height: 160px;
        position:absolute;

        background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico.png') }}') repeat-x;
    }
    #lineas-gr{
        background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico.png') }}') repeat-x;
    }
    #lineas-gr-inf{
        background: url('{{ asset('images/dental/periodontograma/img/fondo-grafico-inf.png') }}') repeat-x;
        margin: 0px 0 0;
    }
    #pi27{
        width: 100%;
    }
    #furca27-a,#furca27-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca27-a{
        margin-top: 70px;
    }
    #furca27-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f27,{
        width: 100%;
        height: 18px;
        background: #f5c6c6;
        border: 1px solid #2cdcbf;
        background-repeat: no-repeat;
        float:left;
        display:inline;
    }
    .titulo{
        text-align: left;
        padding-right: 5px;
        font-weight:bold;
        color:rgb(39, 41, 47);
    }
    .borde{
            border: 1px solid #a4a4a4;
            padding: 1px;
            text-align: center;
        }
    .noborde{



    }

</style>
@php
    $pieza27 = $piezas_periodonto->firstWhere('pieza', '27');
    $cuerpo27 = $pieza27 ? $pieza27->cuerpo : [];
    $pronostico27 = $cuerpo27['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl27.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau27.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-27b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-27b.png') }}"/>
            </div>
        </div>

    </div>
</div>

<!--LADO IZQ-->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!--NUEVO FORM-->
                    <div class="row">
                        <div class="col-12 text-center">
                            Pieza 2.7
                        </div>
                    </div>
                    <!--FORMULARIO ANTIGUO-->
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico1" id="grafico1" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>

                                            <div id="visualization27a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente27-a"><div id="furca27"></div></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>

                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">

                            <form name ="grafico1" id="grafico1" action="#">
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 my-2">
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d27">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i27">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m27" name="m27" value="{{ $cuerpo27["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m27');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi27" id="pi27">
                                                <option value="" {{ $pronostico27 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico27 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico27 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico27 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico27 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f27"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s27-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s27-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s27-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su27-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su27-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su27-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p27-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p27-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p27-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae27" name="ae27" value="{{ $cuerpo27["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg27-a" name="mg27-a" value="{{ $cuerpo27["vest_altura_mg_a"] ?? 0 }}" onchange="cargar27a();getDefectos();rangoNumeroMargen('mg27-a');cargar27a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg27-b" name="mg27-b" value="{{ $cuerpo27["vest_altura_mg_b"] ?? 0 }}" onchange="cargar27a();getDefectos();rangoNumeroMargen('mg27-b');cargar27a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg27-c" name="mg27-c" value="{{ $cuerpo27["vest_altura_mg_c"] ?? 0 }}" onchange="cargar27a();getDefectos();rangoNumeroMargen('mg27-c');cargar27a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps27-a" name="ps27-a" value="{{ $cuerpo27["vest_psondaje_a"] ?? 0 }}" onchange="cargar27a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps27-b" name="ps27-b" value="{{ $cuerpo27["vest_psondaje_b"] ?? 0 }}" onchange="cargar27a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps27-c" name="ps27-c" value="{{ $cuerpo27["vest_psondaje_c"] ?? 0 }}" onchange="cargar27a();getDefectos();" tabindex="99"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico3" id="grafico3" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                            <tr>
                                                <!--<td class="titulo" style="color:#565A5D">Palatino</td>-->
                                                <td colspan="2" class="noborde">
                                                    <div id="lineas-gr-inf"></div>
                                                    <div id="visualization27b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente27b-a">
                                                        <div id="furca27-a"></div>
                                                        <div id="furca27-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps27b-a" name="ps27b-a" value="0" onchange="cargar27b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps27b-b" name="ps27b-b" value="0" onchange="cargar27b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps27b-c" name="ps27b-c" value="0" onchange="cargar27b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg27b-a" name="mg27b-a" value="0" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-a');cargar27b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg27b-b" name="mg27b-b" value="0" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-b');cargar27b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg27b-c" name="mg27b-c" value="0" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-c');cargar27b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s27b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s27b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s27b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su27b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su27b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su27b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p27b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p27b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p27b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f27b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f27b-b">F-2</div>

                                                </td>
                                            </tr>-->

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form class="pl-2" name ="grafico3" id="grafico3" action="#">
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps27b-a" name="ps27b-a" value="{{ $cuerpo27["pala_psondaje_a"] ?? 0 }}" onchange="cargar27b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps27b-b" name="ps27b-b" value="{{ $cuerpo27["pala_psondaje_b"] ?? 0 }}" onchange="cargar27b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps27b-c" name="ps27b-c" value="{{ $cuerpo27["pala_psondaje_c"] ?? 0 }}" onchange="cargar27b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg27b-a" name="mg27b-a" value="{{ $cuerpo27["pala_altura_mg_a"] ?? 0 }}" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-a');cargar27b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg27b-b" name="mg27b-b" value="{{ $cuerpo27["pala_altura_mg_b"] ?? 0 }}" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-b');cargar27b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg27b-c" name="mg27b-c" value="{{ $cuerpo27["pala_altura_mg_c"] ?? 0 }}" onchange="cargar27b();getDefectos();rangoNumeroMargen('mg27b-c');cargar27b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s27b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s27b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s27b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su27b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su27b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su27b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p27b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p27b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p27b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f27b-a"></div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--FORMULARIO DE OBS. Y BOTÓN GUARDAR-->
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="form-group" id="obs_pieza2.7">
                <label class="floating-label-activo-sm">Obs. Pieza 2.7</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_27" id="obs_27" placeholder="Describa observaciones">{{ $cuerpo27["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza2.7">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('27')"><i class="feather icon-save"></i>  Guardar evaluación 2.7</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar27a();
    cargar27b();

});
function rangoNumero(campo){
    var dato=document.getElementById(campo).value;
    dato= parseInt(dato);
    //alert(dato);
    if(dato<(-3) || dato>3){
        alert("El dato de movilidad debe estar comprendido entre -3 y +3");
        document.getElementById(campo).value='0';
    }
}

function rangoNumeroMargen(campo){
    var dato=document.getElementById(campo).value;
    dato= parseInt(dato);
    //alert(dato);
    if(dato<(-9) || dato>9){
        alert("El dato de margen gingival debe estar comprendido entre -9 y +9");
        document.getElementById(campo).value='0';
    }

}

function drawVisualization27a(data27a) {
    // Create and draw the visualization.
    var ac27a = new google.visualization.AreaChart(document.getElementById('visualization27a'));
    ac27a.draw(data27a, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:19,min:-12}}
    });

    $('#visualization27a iframe').attr('allowTransparency', 'true');
    $('#visualization27a iframe').contents().find('body').css('background', 'transparent');

}

function cargar27a(){

    var datoae27=document.getElementById('ae27').value;

    var datomg27a=document.getElementById('mg27-a').value;
    var datomg27b=document.getElementById('mg27-b').value;
    var datomg27c=document.getElementById('mg27-c').value;

    var datops27a=document.getElementById('ps27-a').value;
    var datops27b=document.getElementById('ps27-b').value;
    var datops27c=document.getElementById('ps27-c').value;

    //alert(document.getElementById('ps27-a').value);

    if(datops27a>3){
        document.getElementById('ps27-a').style.color="red";
    }else{
        document.getElementById('ps27-a').style.color="black";
    }
    if(datops27b>3){
        document.getElementById('ps27-b').style.color="red";
    }else{
        document.getElementById('ps27-b').style.color="black";
    }
    if(datops27c>3){
        document.getElementById('ps27-c').style.color="red";
    }else{
        document.getElementById('ps27-c').style.color="black";
    }


    var data27a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg27a)+parseInt(datops27a)),      0-parseInt(datops27a), parseInt(datoae27)],
        ['',    0+(parseInt(datomg27b)+parseInt(datops27b)),      0-parseInt(datops27b), parseInt(datoae27)],
        ['',    0+(parseInt(datomg27c)+parseInt(datops27c)),      0-parseInt(datops27c), parseInt(datoae27)]
    ]);

    drawVisualization27a(data27a);

}

function drawVisualization27b(data27b) {

    // Create and draw the visualization.
    var ac27b = new google.visualization.AreaChart(document.getElementById('visualization27b'));
    ac27b.draw(data27b, {
    isStacked: true,
    backgroundColor: 'transparent',
    legend: {position: 'none'},
    tooltip: {trigger:'none'},
    axisTitlesPosition: 'none',
    theme: {chartArea: {width: '100%', height: '100%'}},
    width: 40,
    height: 160,
    hAxis: {},
    vAxis: {gridlines: {color: 'transparent', count: 31},baseline:0,textPosition:'none',viewWindowMode: 'explicit',viewWindow: {max:12,min:-19}}
    });
    $('#visualization27b iframe').attr('allowTransparency', 'true');
    $('#visualization27b iframe').contents().find('body').css('background', 'transparent');
}

function cargar27b(){

    var datomg27ba=document.getElementById('mg27b-a').value;
    var datomg27bb=document.getElementById('mg27b-b').value;
    var datomg27bc=document.getElementById('mg27b-c').value;

    var datops27ba=document.getElementById('ps27b-a').value;
    var datops27bb=document.getElementById('ps27b-b').value;
    var datops27bc=document.getElementById('ps27b-c').value;

    if(datops27ba>3){
        document.getElementById('ps27b-a').style.color="red";
    }else{
        document.getElementById('ps27b-a').style.color="black";
    }
    if(datops27bb>3){
        document.getElementById('ps27b-b').style.color="red";
    }else{
        document.getElementById('ps27b-b').style.color="black";
    }
    if(datops27bc>3){
        document.getElementById('ps27b-c').style.color="red";
    }else{
        document.getElementById('ps27b-c').style.color="black";
    }

    var data27b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg27ba)+parseInt(datops27ba)),      0+parseInt(datops27ba)],
        ['',    0-(parseInt(datomg27bb)+parseInt(datops27bb)),      0+parseInt(datops27bb)],
        ['',    0-(parseInt(datomg27bc)+parseInt(datops27bc)),      0+parseInt(datops27bc)]
    ]);

    drawVisualization27b(data27b);

}

arrstyle = ["i27","f27","f27b-a","f27b-b","s27-a","s27-b","s27-c","p27-a","p27-b","p27-c","s27b-a","s27b-b","s27b-c","p27b-a","p27b-b","p27b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae27').change(function() {
    if(parseInt(document.getElementById('ae27').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar27a();
});

//FUNCIONES PARA SANGRADO
$('#s27-a').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s27-b').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s27-c').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }})"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);

$('#s27b-a').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s27b-b').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);
$('#s27b-c').toggle(
    function () {
        $(this).css({"background":"#FA5858"});
        totalSangrado++;
        getSangrado();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/sangrado-supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSangrado--;
        getSangrado();
    }
);

//FUNCIONES PARA SUPURACION
$('#su27-a').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su27-b').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su27-c').toggle(
    function () {
        $(this).css({"background":"#ffba57"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url({{ asset('images/dental/periodontograma/img/supuracion.png') }})"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);

$('#su27b-a').toggle(
    function () {
        $(this).css({"background":"#f3e827"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su27b-b').toggle(
    function () {
        $(this).css({"background":"#f3e827"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);
$('#su27b-c').toggle(
    function () {
        $(this).css({"background":"#f3e827"});
        totalSupuracion++;
        getSupuracion();
    },
    function () {
        $(this).css({"background":"url('{{ asset('images/dental/periodontograma/img/supuracion.png') }}')"});
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalSupuracion--;
        getSupuracion();
    }
);

//PLACA
$('#p27-a').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p27-b').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p27-c').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p27b-a').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p27b-b').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);
$('#p27b-c').toggle(
    function () {
        $(this).css({"background":"#58ACFA"});
        totalPlaca++;
        getPlaca();
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        totalPlaca--;
        getPlaca();
    }
);

//TACHADOS
$('#d27').toggle(
    function () {
        $('#diente27-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau27.png') }}')");
        $('#diente27-a').css("background-position","-36px -13px");
        $('#diente27-a').css("background-repeat","no-repeat");
        $('#m27').prop('disabled', true); // Deshabilita el input con id 'm27'
        $('#i27').prop("disabled",true);
        $('#f27').prop("disabled",true);
        $('#s27-a').prop("disabled",true);
        $('#s27-b').prop("disabled",true);
        $('#s27-c').prop("disabled",true);
        $('#p27-a').prop("disabled",true);
        $('#p27-b').prop("disabled",true);
        $('#p27-c').prop("disabled",true);
        $('#mg27-a').prop("disabled",true);
        $('#mg27-b').prop("disabled",true);
        $('#mg27-c').prop("disabled",true);
        $('#ps27-a').prop("disabled",true);
        $('#ps27-b').prop("disabled",true);
        $('#ps27-c').prop("disabled",true);
        /*$('#furca27').css("background","none");*/
        $('#mg27-a').val('0');
        $('#mg27-b').val('0');
        $('#mg27-c').val('0');
        $('#ps27-a').val('0');
        $('#ps27-b').val('0');
        $('#ps27-c').val('0');

        $('#diente27b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-27b.png') }}')");
        $('#diente27b-a').css("background-position","0 23px");
        $('#diente27b-a').css("background-repeat","no-repeat");
        $('#m27b').prop("disabled",true);
        $('#i27b').prop("disabled",true);
        $('#f27b-a').prop("disabled",true);
        $('#f27b-b').prop("disabled",true);
        $('#s27b-a').prop("disabled",true);
        $('#s27b-b').prop("disabled",true);
        $('#s27b-c').prop("disabled",true);
        $('#p27b-a').prop("disabled",true);
        $('#p27b-b').prop("disabled",true);
        $('#p27b-c').prop("disabled",true);
        $('#mg27b-a').prop("disabled",true);
        $('#mg27b-b').prop("disabled",true);
        $('#mg27b-c').prop("disabled",true);
        $('#ps27b-a').prop("disabled",true);
        $('#ps27b-b').prop("disabled",true);
        $('#ps27b-c').prop("disabled",true);
        $('#mg27b-a').val('0');
        $('#mg27b-b').val('0');
        $('#mg27b-c').val('0');
        $('#ps27b-a').val('0');
        $('#ps27b-b').val('0');
        $('#ps27b-c').val('0');

        $('#furca27').prop("disabled",true);
        $('#furca27-a').prop("disabled",true);
        $('#furca27-b').prop("disabled",true);
        $('#ae27').prop("disabled",true);
        $('#pi27').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar27a();
        cargar27b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar13a();
        cargar12a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getSupuracion();
        getPlaca();

    },
    function () {
        $('#diente27-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-27.png') }}')");
        $('#diente27-a').css("background-position","0 -2px");
        $('#diente27-a').css("background-repeat","no-repeat");
        $('#m27').prop("disabled",false);
        $('#i27').prop("disabled",false);
        $('#f27').prop("disabled",false);
        $('#s27-a').prop("disabled",false);
        $('#s27-b').prop("disabled",false);
        $('#s27-c').prop("disabled",false);
        $('#p27-a').prop("disabled",false);
        $('#p27-b').prop("disabled",false);
        $('#p27-c').prop("disabled",false);
        $('#mg27-a').prop("disabled",false);
        $('#mg27-b').prop("disabled",false);
        $('#mg27-c').prop("disabled",false);
        $('#ps27-a').prop("disabled",false);
        $('#ps27-b').prop("disabled",false);
        $('#ps27-c').prop("disabled",false);

        $('#diente27b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-27b.png') }}')");
        $('#diente27b-a').css("background-position","0 23px");
        $('#diente27b-a').css("background-repeat","no-repeat");
        $('#m27b').prop("disabled",false);
        $('#i27b').prop("disabled",false);
        $('#f27b-a').prop("disabled",false);
        $('#f27b-b').prop("disabled",false);
        $('#s27b-a').prop("disabled",false);
        $('#s27b-b').prop("disabled",false);
        $('#s27b-c').prop("disabled",false);
        $('#p27b-a').prop("disabled",false);
        $('#p27b-b').prop("disabled",false);
        $('#p27b-c').prop("disabled",false);
        $('#mg27b-a').prop("disabled",false);
        $('#mg27b-b').prop("disabled",false);
        $('#mg27b-c').prop("disabled",false);
        $('#ps27b-a').prop("disabled",false);
        $('#ps27b-b').prop("disabled",false);
        $('#ps27b-c').prop("disabled",false);

        $('#furca27').css("display","block");
        $('#furca27-a').css("display","block");
        $('#furca27-b').css("display","block");
        $('#ae27').prop("disabled",false);
        $('#pi27').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar13a();
        cargar12a();
        cargar11a();;
        cargar2();
        cargar3();
        cargar4();  --}}
        getSangrado();
        getPlaca();
    }
);

//IMPLANTES
$('#i27').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f27').css({"background":"#FFFFFF"});
        $('#diente27-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl27.png') }}')");
        $('#diente27-a').css("background-position","-38px -2px");
        $('#diente27-a').css("background-repeat","no-repeat");

        $('#diente27b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-27b.png') }}')");
        $('#diente27b-a').css("background-position","0 23px");
        $('#diente27b-a').css("background-repeat","no-repeat");

        $('#furca27').css("background","none");
        $('#furca27-a').css("background","none");
        $('#furca27-b').css("background","none");
        $('#f27').css("background","none");
        $('#f27b-a').css("background","none");
        $('#f27b-b').css("background","none");

        $("#f27").attr("id","f27desact");
        $("#f27b-a").attr("id","f27b-adesact");
        $("#f27b-b").attr("id","f27b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente27-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-27.png') }}')");
        $('#diente27-a').css("background-position","0 -2px");
        $('#diente27-a').css("background-repeat","no-repeat");

        $('#diente27b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-27b.png') }}')");
        $('#diente27b-a').css("background-position","0 23px");
        $('#diente27b-a').css("background-repeat","no-repeat");

        $('#f27').css("background","#FFFFFF");
        $('#f27b-a').css("background","#FFFFFF");
        $('#f27b-b').css("background","#FFFFFF");

        $("#f27desact").attr("id","f27");
        $("#f27b-adesact").attr("id","f27b-a");
        $("#f27b-bdesact").attr("id","f27b-b");
        $('#d27').trigger('click');
    }
);

//FURCA
$('#f27').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i27').css({"background":"#FFFFFF"});
        $('#furca27').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca27').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca27').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca27').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f27b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca27-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca27-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca27-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca27-a').css("background","none");
    }
);
$('#f27b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca27-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca27-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca27-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca27-b').css("background","none");
    }
);




</script>
