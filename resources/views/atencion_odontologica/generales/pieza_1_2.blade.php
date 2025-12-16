  {{--  </head>  --}}
  <style>
    #i12{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente12-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png') }}');
        width:54px;
        background-position: 0 4px;
        background-repeat: no-repeat;
    }


    #i12b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente12b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-12b.png') }}');
        width:54px;
        background-position: 0 16px;
        background-repeat: no-repeat;
    }
    #d12,#i12,#i12b,#f1,,#ae12-a,#ae12-b:hover{
        background: #E6E6E6;
    }
    #i12-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f12{
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
    #pi12{
        width: 100%;
    }


    .f12,{
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
    $pieza12 = $piezas_periodonto->firstWhere('pieza', '12');
    $cuerpo12 = $pieza12 ? $pieza12->cuerpo : [];
    $pronostico12 = $cuerpo12['pronostico'] ?? '';
@endphp

<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl12.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau12.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-12b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-12b.png') }}"/>
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
                            Pieza 1.2
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

                                            <div id="visualization12a" style="width: 60px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                           </div>
                                           <div id="diente12-a">
                                            <div id="furca12-a"></div>
                                            <div id="furca12-b"></div>
                                        </div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d12">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i12">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m12" name="m12" value="{{ $cuerpo12["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m12');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>

                                            <select class="form-control form-control-xs" name="pi12" id="pi12">
                                                <option value="" {{ $pronostico12 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico12 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico12 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico12 == 'M' ? 'selected' : '' }}>Resrvado</option>
                                                <option value="I" {{ $pronostico12 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f12"></div>
                                        </div>
                                    </div>  --}}
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s12-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s12-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s12-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su12-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su12-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su12-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p12-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p12-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p12-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae12" name="ae12" value="{{ $cuerpo12["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg12-a" name="mg12-a" value="{{ $cuerpo12["vest_altura_mg_a"] ?? 0 }}" onchange="cargar12a();getDefectos();rangoNumeroMargen('mg12-a');cargar12a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg12-b" name="mg12-b" value="{{ $cuerpo12["vest_altura_mg_b"] ?? 0 }}" onchange="cargar12a();getDefectos();rangoNumeroMargen('mg12-b');cargar12a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg12-c" name="mg12-c" value="{{ $cuerpo12["vest_altura_mg_a"] ?? 0 }}" onchange="cargar12a();getDefectos();rangoNumeroMargen('mg12-c');cargar12a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps12-a" name="ps12-a" value="{{ $cuerpo12["vest_psondaje_a"] ?? 0 }}" onchange="cargar12a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps12-b" name="ps12-b" value="{{ $cuerpo12["vest_psondaje_b"] ?? 0 }}" onchange="cargar12a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps12-c" name="ps12-c" value="{{ $cuerpo12["vest_psondaje_c"] ?? 0 }}" onchange="cargar12a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization12b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente12b-a">
                                                        <div id="furca12-a"></div>
                                                        <div id="furca12-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps12b-a" name="ps12b-a" value="0" onchange="cargar12b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps12b-b" name="ps12b-b" value="0" onchange="cargar12b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps12b-c" name="ps12b-c" value="0" onchange="cargar12b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg12b-a" name="mg12b-a" value="0" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-a');cargar12b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg12b-b" name="mg12b-b" value="0" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-b');cargar12b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg12b-c" name="mg12b-c" value="0" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-c');cargar12b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s12b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s12b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s12b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su12b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su12b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su12b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p12b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p12b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p12b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f12b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f12b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps12b-a" name="ps12b-a" value="{{ $cuerpo12["pala_psondaje_a"] ?? 0 }}" onchange="cargar12b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps12b-b" name="ps12b-a" value="{{ $cuerpo12["pala_psondaje_b"] ?? 0 }}" onchange="cargar12b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps12b-c" name="ps12b-a" value="{{ $cuerpo12["pala_psondaje_c"] ?? 0 }}" onchange="cargar12b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg12b-a" name="mg12b-a" value="{{ $cuerpo12["pala_altura_mg_a"] ?? 0 }}" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-a');cargar12b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg12b-b" name="mg12b-b" value="{{ $cuerpo12["pala_altura_mg_b"] ?? 0 }}" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-b');cargar12b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg12b-c" name="mg12b-c" value="{{ $cuerpo12["pala_altura_mg_c"] ?? 0 }}" onchange="cargar12b();getDefectos();rangoNumeroMargen('mg12b-c');cargar12b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s12b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s12b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s12b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su12b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su12b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su12b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p12b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p12b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p12b-c"></div>
                                </div>
                            </div>
                            {{--  <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f12b-a"></div>
                                </div>
                            </div>  --}}
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
            <div class="form-group" id="obs_pieza1.2">
                <label class="floating-label-activo-sm">Obs. Pieza 1.2</label>

                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_17" id="obs_17" placeholder="Describa observaciones">{{ $cuerpo12["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza1.2">
            <button type="button" onclick="guardar_pieza('12')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.2</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar12a();
    cargar12b();

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

function drawVisualization12a(data12a) {
    // Create and draw the visualization.
    var ac12a = new google.visualization.AreaChart(document.getElementById('visualization12a'));
    ac12a.draw(data12a, {
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

    $('#visualization12a iframe').attr('allowTransparency', 'true');
    $('#visualization12a iframe').contents().find('body').css('background', 'transparent');

}

function cargar12a(){

    var datoae12=document.getElementById('ae12').value;

    var datomg12a=document.getElementById('mg12-a').value;
    var datomg12b=document.getElementById('mg12-b').value;
    var datomg12c=document.getElementById('mg12-c').value;

    var datops12a=document.getElementById('ps12-a').value;
    var datops12b=document.getElementById('ps12-b').value;
    var datops12c=document.getElementById('ps12-c').value;

    //alert(document.getElementById('ps12-a').value);

    if(datops12a>3){
        document.getElementById('ps12-a').style.color="red";
    }else{
        document.getElementById('ps12-a').style.color="black";
    }
    if(datops12b>3){
        document.getElementById('ps12-b').style.color="red";
    }else{
        document.getElementById('ps12-b').style.color="black";
    }
    if(datops12c>3){
        document.getElementById('ps12-c').style.color="red";
    }else{
        document.getElementById('ps12-c').style.color="black";
    }


    var data12a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg12a)+parseInt(datops12a)),      0-parseInt(datops12a), parseInt(datoae12)],
        ['',    0+(parseInt(datomg12b)+parseInt(datops12b)),      0-parseInt(datops12b), parseInt(datoae12)],
        ['',    0+(parseInt(datomg12c)+parseInt(datops12c)),      0-parseInt(datops12c), parseInt(datoae12)]
    ]);

    drawVisualization12a(data12a);

}

function drawVisualization12b(data12b) {

    // Create and draw the visualization.
    var ac12b = new google.visualization.AreaChart(document.getElementById('visualization12b'));
    ac12b.draw(data12b, {
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
    $('#visualization12b iframe').attr('allowTransparency', 'true');
    $('#visualization12b iframe').contents().find('body').css('background', 'transparent');
}

function cargar12b(){

    var datomg12ba=document.getElementById('mg12b-a').value;
    var datomg12bb=document.getElementById('mg12b-b').value;
    var datomg12bc=document.getElementById('mg12b-c').value;

    var datops12ba=document.getElementById('ps12b-a').value;
    var datops12bb=document.getElementById('ps12b-b').value;
    var datops12bc=document.getElementById('ps12b-c').value;

    if(datops12ba>3){
        document.getElementById('ps12b-a').style.color="red";
    }else{
        document.getElementById('ps12b-a').style.color="black";
    }
    if(datops12bb>3){
        document.getElementById('ps12b-b').style.color="red";
    }else{
        document.getElementById('ps12b-b').style.color="black";
    }
    if(datops12bc>3){
        document.getElementById('ps12b-c').style.color="red";
    }else{
        document.getElementById('ps12b-c').style.color="black";
    }

    var data12b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg12ba)+parseInt(datops12ba)),      0+parseInt(datops12ba)],
        ['',    0-(parseInt(datomg12bb)+parseInt(datops12bb)),      0+parseInt(datops12bb)],
        ['',    0-(parseInt(datomg12bc)+parseInt(datops12bc)),      0+parseInt(datops12bc)]
    ]);

    drawVisualization12b(data12b);

}

arrstyle = ["i12","f12","f12b-a","f12b-b","s12-a","s12-b","s12-c","p12-a","p12-b","p12-c","s12b-a","s12b-b","s12b-c","p12b-a","p12b-b","p12b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae12').change(function() {
    if(parseInt(document.getElementById('ae12').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar12a();
});

//FUNCIONES PARA SANGRADO
$('#s12-a').toggle(
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
$('#s12-b').toggle(
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
$('#s12-c').toggle(
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

$('#s12b-a').toggle(
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
$('#s12b-b').toggle(
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
$('#s12b-c').toggle(
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
$('#su12-a').toggle(
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
$('#su12-b').toggle(
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
$('#su12-c').toggle(
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

$('#su12b-a').toggle(
    function () {
        $(this).css({"background":"#f3e812"});
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
$('#su12b-b').toggle(
    function () {
        $(this).css({"background":"#f3e812"});
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
$('#su12b-c').toggle(
    function () {
        $(this).css({"background":"#f3e812"});
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
$('#p12-a').toggle(
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
$('#p12-b').toggle(
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
$('#p12-c').toggle(
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
$('#p12b-a').toggle(
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
$('#p12b-b').toggle(
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
$('#p12b-c').toggle(
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
$('#d12').toggle(
    function () {
        $('#diente12-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau12.png') }}')");
        $('#diente12-a').css("background-position","0px -2px");
        $('#diente12-a').css("background-repeat","no-repeat");
        $('#m12').prop('disabled', true); // Deshabilita el input con id 'm12'
        $('#i12').prop("disabled",true);
        $('#f12').prop("disabled",true);
        $('#s12-a').prop("disabled",true);
        $('#s12-b').prop("disabled",true);
        $('#s12-c').prop("disabled",true);
        $('#p12-a').prop("disabled",true);
        $('#p12-b').prop("disabled",true);
        $('#p12-c').prop("disabled",true);
        $('#mg12-a').prop("disabled",true);
        $('#mg12-b').prop("disabled",true);
        $('#mg12-c').prop("disabled",true);
        $('#ps12-a').prop("disabled",true);
        $('#ps12-b').prop("disabled",true);
        $('#ps12-c').prop("disabled",true);
        /*$('#furca12').css("background","none");*/
        $('#mg12-a').val('0');
        $('#mg12-b').val('0');
        $('#mg12-c').val('0');
        $('#ps12-a').val('0');
        $('#ps12-b').val('0');
        $('#ps12-c').val('0');

        $('#diente12b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-12b.png') }}')");
        $('#diente12b-a').css("background-position","0 23px");
        $('#diente12b-a').css("background-repeat","no-repeat");
        $('#m12b').prop("disabled",true);
        $('#i12b').prop("disabled",true);
        $('#f12b-a').prop("disabled",true);
        $('#f12b-b').prop("disabled",true);
        $('#s12b-a').prop("disabled",true);
        $('#s12b-b').prop("disabled",true);
        $('#s12b-c').prop("disabled",true);
        $('#p12b-a').prop("disabled",true);
        $('#p12b-b').prop("disabled",true);
        $('#p12b-c').prop("disabled",true);
        $('#mg12b-a').prop("disabled",true);
        $('#mg12b-b').prop("disabled",true);
        $('#mg12b-c').prop("disabled",true);
        $('#ps12b-a').prop("disabled",true);
        $('#ps12b-b').prop("disabled",true);
        $('#ps12b-c').prop("disabled",true);
        $('#mg12b-a').val('0');
        $('#mg12b-b').val('0');
        $('#mg12b-c').val('0');
        $('#ps12b-a').val('0');
        $('#ps12b-b').val('0');
        $('#ps12b-c').val('0');

        $('#furca12').prop("disabled",true);
        $('#furca12-a').prop("disabled",true);
        $('#furca12-b').prop("disabled",true);
        $('#ae12').prop("disabled",true);
        $('#pi12').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar12a();
        cargar12b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar12a();
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
        $('#diente12-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png') }}')");
        $('#diente12-a').css("background-position","0 -2px");
        $('#diente12-a').css("background-repeat","no-repeat");
        $('#m12').prop("disabled",false);
        $('#i12').prop("disabled",false);
        $('#f12').prop("disabled",false);
        $('#s12-a').prop("disabled",false);
        $('#s12-b').prop("disabled",false);
        $('#s12-c').prop("disabled",false);
        $('#p12-a').prop("disabled",false);
        $('#p12-b').prop("disabled",false);
        $('#p12-c').prop("disabled",false);
        $('#mg12-a').prop("disabled",false);
        $('#mg12-b').prop("disabled",false);
        $('#mg12-c').prop("disabled",false);
        $('#ps12-a').prop("disabled",false);
        $('#ps12-b').prop("disabled",false);
        $('#ps12-c').prop("disabled",false);

        $('#diente12b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-12b.png') }}')");
        $('#diente12b-a').css("background-position","0 23px");
        $('#diente12b-a').css("background-repeat","no-repeat");
        $('#m12b').prop("disabled",false);
        $('#i12b').prop("disabled",false);
        $('#f12b-a').prop("disabled",false);
        $('#f12b-b').prop("disabled",false);
        $('#s12b-a').prop("disabled",false);
        $('#s12b-b').prop("disabled",false);
        $('#s12b-c').prop("disabled",false);
        $('#p12b-a').prop("disabled",false);
        $('#p12b-b').prop("disabled",false);
        $('#p12b-c').prop("disabled",false);
        $('#mg12b-a').prop("disabled",false);
        $('#mg12b-b').prop("disabled",false);
        $('#mg12b-c').prop("disabled",false);
        $('#ps12b-a').prop("disabled",false);
        $('#ps12b-b').prop("disabled",false);
        $('#ps12b-c').prop("disabled",false);

        $('#furca12').css("display","block");
        $('#furca12-a').css("display","block");
        $('#furca12-b').css("display","block");
        $('#ae12').prop("disabled",false);
        $('#pi12').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar12a();
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
$('#i12').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f12').css({"background":"#FFFFFF"});
        $('#diente12-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl12.png') }}')");
        $('#diente12-a').css("background-position","0px -2px");
        $('#diente12-a').css("background-repeat","no-repeat");

        $('#diente12b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-12b.png') }}')");
        $('#diente12b-a').css("background-position","0 23px");
        $('#diente12b-a').css("background-repeat","no-repeat");

        $('#furca12').css("background","none");
        $('#furca12-a').css("background","none");
        $('#furca12-b').css("background","none");
        $('#f12').css("background","none");
        $('#f12b-a').css("background","none");
        $('#f12b-b').css("background","none");

        $("#f12").attr("id","f12desact");
        $("#f12b-a").attr("id","f12b-adesact");
        $("#f12b-b").attr("id","f12b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente12-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png') }}')");
        $('#diente12-a').css("background-position","0 -2px");
        $('#diente12-a').css("background-repeat","no-repeat");

        $('#diente12b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-12b.png') }}')");
        $('#diente12b-a').css("background-position","0 23px");
        $('#diente12b-a').css("background-repeat","no-repeat");

        $('#f12').css("background","#FFFFFF");
        $('#f12b-a').css("background","#FFFFFF");
        $('#f12b-b').css("background","#FFFFFF");

        $("#f12desact").attr("id","f12");
        $("#f12b-adesact").attr("id","f12b-a");
        $("#f12b-bdesact").attr("id","f12b-b");
        $('#d12').trigger('click');
    }
);

//FURCA
$('#f12').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i12').css({"background":"#FFFFFF"});
        $('#furca12').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca12').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca12').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca12').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f12b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca12-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca12-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca12-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca12-a').css("background","none");
    }
);
$('#f12b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca12-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca12-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca12-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca12-b').css("background","none");
    }
);




</script>









