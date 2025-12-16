  {{--  </head>  --}}
  <style>
    #i44{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente44-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-44.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i44b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente44b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-44b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d44,#i44,#i44b,#f44,,#ae44-a,#ae44-b:hover{
        background: #E6E6E6;
    }
    #i44-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f44{
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
    #pi44{
        width: 100%;
    }
    #furca44-a,#furca44-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca44-a{
        margin-top: 70px;
    }
    #furca44-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f44,{
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
    $pieza44 = $piezas_periodonto->firstWhere('pieza', '44');
    $cuerpo44 = $pieza44 ? $pieza44->cuerpo : [];
    $pronostico44 = $cuerpo44['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl44.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau44.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-44b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-44b.png') }}"/>
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
                            Pieza 4.4
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

                                            <div id="visualization44a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente44-a"><div id="furca44"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d44">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i44">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m44" name="m44" value="{{ $cuerpo44["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m44');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi44" id="pi44">
                                                <option value="" {{ $pronostico44 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico44 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico44 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico44 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico44 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f44"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s44-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s44-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s44-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su44-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su44-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su44-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p44-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p44-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p44-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae44" name="ae44" value="{{ $cuerpo44["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg44-a" name="mg44-a" value="{{ $cuerpo44["vest_altura_mg_a"] ?? 0 }}" onchange="cargar44a();getDefectos();rangoNumeroMargen('mg44-a');cargar44a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg44-b" name="mg44-b" value="{{ $cuerpo44["vest_altura_mg_b"] ?? 0 }}" onchange="cargar44a();getDefectos();rangoNumeroMargen('mg44-b');cargar44a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg44-c" name="mg44-c" value="{{ $cuerpo44["vest_altura_mg_c"] ?? 0 }}" onchange="cargar44a();getDefectos();rangoNumeroMargen('mg44-c');cargar44a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps44-a" name="ps44-a" value="{{ $cuerpo44["vest_psondaje_a"] ?? 0 }}" onchange="cargar44a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps44-b" name="ps44-b" value="{{ $cuerpo44["vest_psondaje_b"] ?? 0 }}" onchange="cargar44a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps44-c" name="ps44-c" value="{{ $cuerpo44["vest_psondaje_c"] ?? 0 }}" onchange="cargar44a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization44b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente44b-a">
                                                        <div id="furca44-a"></div>
                                                        <div id="furca44-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps44b-a" name="ps44b-a" value="0" onchange="cargar44b();getDefectos();" tabindex="445"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps44b-b" name="ps44b-b" value="0" onchange="cargar44b();getDefectos();" tabindex="446"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps44b-c" name="ps44b-c" value="0" onchange="cargar44b();getDefectos();" tabindex="447"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg44b-a" name="mg44b-a" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-a');cargar44b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg44b-b" name="mg44b-b" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-b');cargar44b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg44b-c" name="mg44b-c" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-c');cargar44b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s44b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s44b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s44b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su44b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su44b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su44b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p44b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p44b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p44b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f44b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f44b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps44b-a" name="ps44b-a" value="{{ $cuerpo44["pala_psondaje_a"] ?? 0 }}" onchange="cargar44b();getDefectos();" tabindex="445"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps44b-b" name="ps44b-a" value="{{ $cuerpo44["pala_psondaje_b"] ?? 0 }}" onchange="cargar44b();getDefectos();" tabindex="446"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps44b-c" name="ps44b-a" value="{{ $cuerpo44["pala_psondaje_c"] ?? 0 }}" onchange="cargar44b();getDefectos();" tabindex="447"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg44b-a" name="mg44b-a" value="{{ $cuerpo44["pala_altura_mg_a"] ?? 0 }}" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-a');cargar44b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg44b-b" name="mg44b-b" value="{{ $cuerpo44["pala_altura_mg_b"] ?? 0 }}" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-b');cargar44b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg44b-c" name="mg44b-c" value="{{ $cuerpo44["pala_altura_mg_c"] ?? 0 }}" onchange="cargar44b();getDefectos();rangoNumeroMargen('mg44b-c');cargar44b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s44b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s44b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s44b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su44b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su44b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su44b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p44b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p44b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p44b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f44b-a"></div>
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
            <div class="form-group" id="obs_pieza4.4">
                <label class="floating-label-activo-sm">Obs. Pieza 4.4</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.4" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_44" id="obs_44" placeholder="Describa observaciones">{{ $cuerpo44["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza4.4">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('44')"><i class="feather icon-save"></i>  Guardar evaluación 4.4</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar44a();
    cargar44b();

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

function drawVisualization44a(data44a) {
    // Create and draw the visualization.
    var ac44a = new google.visualization.AreaChart(document.getElementById('visualization44a'));
    ac44a.draw(data44a, {
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

    $('#visualization44a iframe').attr('allowTransparency', 'true');
    $('#visualization44a iframe').contents().find('body').css('background', 'transparent');

}

function cargar44a(){

    var datoae44=document.getElementById('ae44').value;

    var datomg44a=document.getElementById('mg44-a').value;
    var datomg44b=document.getElementById('mg44-b').value;
    var datomg44c=document.getElementById('mg44-c').value;

    var datops44a=document.getElementById('ps44-a').value;
    var datops44b=document.getElementById('ps44-b').value;
    var datops44c=document.getElementById('ps44-c').value;

    //alert(document.getElementById('ps44-a').value);

    if(datops44a>3){
        document.getElementById('ps44-a').style.color="red";
    }else{
        document.getElementById('ps44-a').style.color="black";
    }
    if(datops44b>3){
        document.getElementById('ps44-b').style.color="red";
    }else{
        document.getElementById('ps44-b').style.color="black";
    }
    if(datops44c>3){
        document.getElementById('ps44-c').style.color="red";
    }else{
        document.getElementById('ps44-c').style.color="black";
    }


    var data44a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg44a)+parseInt(datops44a)),      0-parseInt(datops44a), parseInt(datoae44)],
        ['',    0+(parseInt(datomg44b)+parseInt(datops44b)),      0-parseInt(datops44b), parseInt(datoae44)],
        ['',    0+(parseInt(datomg44c)+parseInt(datops44c)),      0-parseInt(datops44c), parseInt(datoae44)]
    ]);

    drawVisualization44a(data44a);

}

function drawVisualization44b(data44b) {

    // Create and draw the visualization.
    var ac44b = new google.visualization.AreaChart(document.getElementById('visualization44b'));
    ac44b.draw(data44b, {
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
    $('#visualization44b iframe').attr('allowTransparency', 'true');
    $('#visualization44b iframe').contents().find('body').css('background', 'transparent');
}

function cargar44b(){

    var datomg44ba=document.getElementById('mg44b-a').value;
    var datomg44bb=document.getElementById('mg44b-b').value;
    var datomg44bc=document.getElementById('mg44b-c').value;

    var datops44ba=document.getElementById('ps44b-a').value;
    var datops44bb=document.getElementById('ps44b-b').value;
    var datops44bc=document.getElementById('ps44b-c').value;

    if(datops44ba>3){
        document.getElementById('ps44b-a').style.color="red";
    }else{
        document.getElementById('ps44b-a').style.color="black";
    }
    if(datops44bb>3){
        document.getElementById('ps44b-b').style.color="red";
    }else{
        document.getElementById('ps44b-b').style.color="black";
    }
    if(datops44bc>3){
        document.getElementById('ps44b-c').style.color="red";
    }else{
        document.getElementById('ps44b-c').style.color="black";
    }

    var data44b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg44ba)+parseInt(datops44ba)),      0+parseInt(datops44ba)],
        ['',    0-(parseInt(datomg44bb)+parseInt(datops44bb)),      0+parseInt(datops44bb)],
        ['',    0-(parseInt(datomg44bc)+parseInt(datops44bc)),      0+parseInt(datops44bc)]
    ]);

    drawVisualization44b(data44b);

}

arrstyle = ["i44","f44","f44b-a","f44b-b","s44-a","s44-b","s44-c","p44-a","p44-b","p44-c","s44b-a","s44b-b","s44b-c","p44b-a","p44b-b","p44b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae44').change(function() {
    if(parseInt(document.getElementById('ae44').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar44a();
});

//FUNCIONES PARA SANGRADO
$('#s44-a').toggle(
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
$('#s44-b').toggle(
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
$('#s44-c').toggle(
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

$('#s44b-a').toggle(
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
$('#s44b-b').toggle(
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
$('#s44b-c').toggle(
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
$('#su44-a').toggle(
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
$('#su44-b').toggle(
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
$('#su44-c').toggle(
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

$('#su44b-a').toggle(
    function () {
        $(this).css({"background":"#f3e844"});
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
$('#su44b-b').toggle(
    function () {
        $(this).css({"background":"#f3e844"});
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
$('#su44b-c').toggle(
    function () {
        $(this).css({"background":"#f3e844"});
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
$('#p44-a').toggle(
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
$('#p44-b').toggle(
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
$('#p44-c').toggle(
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
$('#p44b-a').toggle(
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
$('#p44b-b').toggle(
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
$('#p44b-c').toggle(
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
$('#d44').toggle(
    function () {
        $('#diente44-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau44.png') }}')");
        $('#diente44-a').css("background-position","-36px -13px");
        $('#diente44-a').css("background-repeat","no-repeat");
        $('#m44').prop('disabled', true); // Deshabilita el input con id 'm44'
        $('#i44').prop("disabled",true);
        $('#f44').prop("disabled",true);
        $('#s44-a').prop("disabled",true);
        $('#s44-b').prop("disabled",true);
        $('#s44-c').prop("disabled",true);
        $('#p44-a').prop("disabled",true);
        $('#p44-b').prop("disabled",true);
        $('#p44-c').prop("disabled",true);
        $('#mg44-a').prop("disabled",true);
        $('#mg44-b').prop("disabled",true);
        $('#mg44-c').prop("disabled",true);
        $('#ps44-a').prop("disabled",true);
        $('#ps44-b').prop("disabled",true);
        $('#ps44-c').prop("disabled",true);
        /*$('#furca44').css("background","none");*/
        $('#mg44-a').val('0');
        $('#mg44-b').val('0');
        $('#mg44-c').val('0');
        $('#ps44-a').val('0');
        $('#ps44-b').val('0');
        $('#ps44-c').val('0');

        $('#diente44b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-44b.png') }}')");
        $('#diente44b-a').css("background-position","0 23px");
        $('#diente44b-a').css("background-repeat","no-repeat");
        $('#m44b').prop("disabled",true);
        $('#i44b').prop("disabled",true);
        $('#f44b-a').prop("disabled",true);
        $('#f44b-b').prop("disabled",true);
        $('#s44b-a').prop("disabled",true);
        $('#s44b-b').prop("disabled",true);
        $('#s44b-c').prop("disabled",true);
        $('#p44b-a').prop("disabled",true);
        $('#p44b-b').prop("disabled",true);
        $('#p44b-c').prop("disabled",true);
        $('#mg44b-a').prop("disabled",true);
        $('#mg44b-b').prop("disabled",true);
        $('#mg44b-c').prop("disabled",true);
        $('#ps44b-a').prop("disabled",true);
        $('#ps44b-b').prop("disabled",true);
        $('#ps44b-c').prop("disabled",true);
        $('#mg44b-a').val('0');
        $('#mg44b-b').val('0');
        $('#mg44b-c').val('0');
        $('#ps44b-a').val('0');
        $('#ps44b-b').val('0');
        $('#ps44b-c').val('0');

        $('#furca44').prop("disabled",true);
        $('#furca44-a').prop("disabled",true);
        $('#furca44-b').prop("disabled",true);
        $('#ae44').prop("disabled",true);
        $('#pi44').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar44a();
        cargar44b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar44a();
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
        $('#diente44-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-44.png') }}')");
        $('#diente44-a').css("background-position","0 -2px");
        $('#diente44-a').css("background-repeat","no-repeat");
        $('#m44').prop("disabled",false);
        $('#i44').prop("disabled",false);
        $('#f44').prop("disabled",false);
        $('#s44-a').prop("disabled",false);
        $('#s44-b').prop("disabled",false);
        $('#s44-c').prop("disabled",false);
        $('#p44-a').prop("disabled",false);
        $('#p44-b').prop("disabled",false);
        $('#p44-c').prop("disabled",false);
        $('#mg44-a').prop("disabled",false);
        $('#mg44-b').prop("disabled",false);
        $('#mg44-c').prop("disabled",false);
        $('#ps44-a').prop("disabled",false);
        $('#ps44-b').prop("disabled",false);
        $('#ps44-c').prop("disabled",false);

        $('#diente44b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-44b.png') }}')");
        $('#diente44b-a').css("background-position","0 23px");
        $('#diente44b-a').css("background-repeat","no-repeat");
        $('#m44b').prop("disabled",false);
        $('#i44b').prop("disabled",false);
        $('#f44b-a').prop("disabled",false);
        $('#f44b-b').prop("disabled",false);
        $('#s44b-a').prop("disabled",false);
        $('#s44b-b').prop("disabled",false);
        $('#s44b-c').prop("disabled",false);
        $('#p44b-a').prop("disabled",false);
        $('#p44b-b').prop("disabled",false);
        $('#p44b-c').prop("disabled",false);
        $('#mg44b-a').prop("disabled",false);
        $('#mg44b-b').prop("disabled",false);
        $('#mg44b-c').prop("disabled",false);
        $('#ps44b-a').prop("disabled",false);
        $('#ps44b-b').prop("disabled",false);
        $('#ps44b-c').prop("disabled",false);

        $('#furca44').css("display","block");
        $('#furca44-a').css("display","block");
        $('#furca44-b').css("display","block");
        $('#ae44').prop("disabled",false);
        $('#pi44').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar44a();
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
$('#i44').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f44').css({"background":"#FFFFFF"});
        $('#diente44-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl44.png') }}')");
        $('#diente44-a').css("background-position","-38px -2px");
        $('#diente44-a').css("background-repeat","no-repeat");

        $('#diente44b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-44b.png') }}')");
        $('#diente44b-a').css("background-position","0 23px");
        $('#diente44b-a').css("background-repeat","no-repeat");

        $('#furca44').css("background","none");
        $('#furca44-a').css("background","none");
        $('#furca44-b').css("background","none");
        $('#f44').css("background","none");
        $('#f44b-a').css("background","none");
        $('#f44b-b').css("background","none");

        $("#f44").attr("id","f44desact");
        $("#f44b-a").attr("id","f44b-adesact");
        $("#f44b-b").attr("id","f44b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente44-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-44.png') }}')");
        $('#diente44-a').css("background-position","0 -2px");
        $('#diente44-a').css("background-repeat","no-repeat");

        $('#diente44b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-44b.png') }}')");
        $('#diente44b-a').css("background-position","0 23px");
        $('#diente44b-a').css("background-repeat","no-repeat");

        $('#f44').css("background","#FFFFFF");
        $('#f44b-a').css("background","#FFFFFF");
        $('#f44b-b').css("background","#FFFFFF");

        $("#f44desact").attr("id","f44");
        $("#f44b-adesact").attr("id","f44b-a");
        $("#f44b-bdesact").attr("id","f44b-b");
        $('#d44').trigger('click');
    }
);

//FURCA
$('#f44').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i44').css({"background":"#FFFFFF"});
        $('#furca44').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca44').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca44').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca44').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f44b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca44-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca44-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca44-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca44-a').css("background","none");
    }
);
$('#f44b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca44-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca44-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca44-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca44-b').css("background","none");
    }
);




</script>





