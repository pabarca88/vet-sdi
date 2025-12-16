  {{--  </head>  --}}
  <style>
    #i26{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente26-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla2/periodontograma-dientes-arriba-26.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i26b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente26b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla4/periodontograma-dientes-abajo-26b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d26,#i26,#i26b,#f26,,#ae26-a,#ae26-b:hover{
        background: #E6E6E6;
    }
    #i26-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f26{
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
    #pi26{
        width: 100%;
    }
    #furca26-a,#furca26-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca26-a{
        margin-top: 70px;
    }
    #furca26-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f26,{
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
    $pieza26 = $piezas_periodonto->firstWhere('pieza', '26');
    $cuerpo26 = $pieza26 ? $pieza26->cuerpo : [];
    $pronostico26 = $cuerpo26['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl26.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau26.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-26b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-26b.png') }}"/>
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
                            Pieza 2.6
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

                                            <div id="visualization26a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente26-a"><div id="furca26"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d26">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i26">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m26" name="m26" value="{{ $cuerpo26["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m26');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi26" id="pi26">
                                                <option value="" {{ $pronostico26 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico26 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico26 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico26 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico26 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f26"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s26-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s26-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s26-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su26-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su26-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su26-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p26-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p26-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p26-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae26" name="ae26" value="{{ $cuerpo26["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg26-a" name="mg26-a" value="{{ $cuerpo26["vest_altura_mg_a"] ?? 0 }}" onchange="cargar26a();getDefectos();rangoNumeroMargen('mg26-a');cargar26a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg26-b" name="mg26-b" value="{{ $cuerpo26["vest_altura_mg_b"] ?? 0 }}" onchange="cargar26a();getDefectos();rangoNumeroMargen('mg26-b');cargar26a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg26-c" name="mg26-c" value="{{ $cuerpo26["vest_altura_mg_c"] ?? 0 }}" onchange="cargar26a();getDefectos();rangoNumeroMargen('mg26-c');cargar26a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps26-a" name="ps26-a" value="{{ $cuerpo26["vest_psondaje_a"] ?? 0 }}" onchange="cargar26a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps26-b" name="ps26-b" value="{{ $cuerpo26["vest_psondaje_b"] ?? 0 }}" onchange="cargar26a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps26-c" name="ps26-c" value="{{ $cuerpo26["vest_psondaje_c"] ?? 0 }}" onchange="cargar26a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization26b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente26b-a">
                                                        <div id="furca26-a"></div>
                                                        <div id="furca26-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps26b-a" name="ps26b-a" value="0" onchange="cargar26b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps26b-b" name="ps26b-b" value="0" onchange="cargar26b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps26b-c" name="ps26b-c" value="0" onchange="cargar26b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg26b-a" name="mg26b-a" value="0" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-a');cargar26b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg26b-b" name="mg26b-b" value="0" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-b');cargar26b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg26b-c" name="mg26b-c" value="0" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-c');cargar26b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s26b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s26b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s26b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su26b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su26b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su26b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p26b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p26b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p26b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f26b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f26b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps26b-a" name="ps26b-a" value="{{ $cuerpo26["pala_psondaje_a"] ?? 0 }}" onchange="cargar26b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps26b-b" name="ps26b-a" value="{{ $cuerpo26["pala_psondaje_b"] ?? 0 }}" onchange="cargar26b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps26b-c" name="ps26b-a" value="{{ $cuerpo26["pala_psondaje_c"] ?? 0 }}" onchange="cargar26b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg26b-a" name="mg26b-a" value="{{ $cuerpo26["pala_altura_mg_a"] ?? 0 }}" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-a');cargar26b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg26b-b" name="mg26b-b" value="{{ $cuerpo26["pala_altura_mg_b"] ?? 0 }}" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-b');cargar26b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg26b-c" name="mg26b-c" value="{{ $cuerpo26["pala_altura_mg_c"] ?? 0 }}" onchange="cargar26b();getDefectos();rangoNumeroMargen('mg26b-c');cargar26b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s26b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s26b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s26b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su26b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su26b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su26b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p26b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p26b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p26b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f26b-a"></div>
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
            <div class="form-group" id="obs_pieza2.6">
                <label class="floating-label-activo-sm">Obs. Pieza 2.6</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 2.6" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_26" id="obs_26" placeholder="Describa observaciones">{{ $cuerpo26["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza2.6">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('26')"><i class="feather icon-save"></i>  Guardar evaluación 2.6</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar26a();
    cargar26b();

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

function drawVisualization26a(data26a) {
    // Create and draw the visualization.
    var ac26a = new google.visualization.AreaChart(document.getElementById('visualization26a'));
    ac26a.draw(data26a, {
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

    $('#visualization26a iframe').attr('allowTransparency', 'true');
    $('#visualization26a iframe').contents().find('body').css('background', 'transparent');

}

function cargar26a(){

    var datoae26=document.getElementById('ae26').value;

    var datomg26a=document.getElementById('mg26-a').value;
    var datomg26b=document.getElementById('mg26-b').value;
    var datomg26c=document.getElementById('mg26-c').value;

    var datops26a=document.getElementById('ps26-a').value;
    var datops26b=document.getElementById('ps26-b').value;
    var datops26c=document.getElementById('ps26-c').value;

    //alert(document.getElementById('ps26-a').value);

    if(datops26a>3){
        document.getElementById('ps26-a').style.color="red";
    }else{
        document.getElementById('ps26-a').style.color="black";
    }
    if(datops26b>3){
        document.getElementById('ps26-b').style.color="red";
    }else{
        document.getElementById('ps26-b').style.color="black";
    }
    if(datops26c>3){
        document.getElementById('ps26-c').style.color="red";
    }else{
        document.getElementById('ps26-c').style.color="black";
    }


    var data26a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg26a)+parseInt(datops26a)),      0-parseInt(datops26a), parseInt(datoae26)],
        ['',    0+(parseInt(datomg26b)+parseInt(datops26b)),      0-parseInt(datops26b), parseInt(datoae26)],
        ['',    0+(parseInt(datomg26c)+parseInt(datops26c)),      0-parseInt(datops26c), parseInt(datoae26)]
    ]);

    drawVisualization26a(data26a);

}

function drawVisualization26b(data26b) {

    // Create and draw the visualization.
    var ac26b = new google.visualization.AreaChart(document.getElementById('visualization26b'));
    ac26b.draw(data26b, {
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
    $('#visualization26b iframe').attr('allowTransparency', 'true');
    $('#visualization26b iframe').contents().find('body').css('background', 'transparent');
}

function cargar26b(){

    var datomg26ba=document.getElementById('mg26b-a').value;
    var datomg26bb=document.getElementById('mg26b-b').value;
    var datomg26bc=document.getElementById('mg26b-c').value;

    var datops26ba=document.getElementById('ps26b-a').value;
    var datops26bb=document.getElementById('ps26b-b').value;
    var datops26bc=document.getElementById('ps26b-c').value;

    if(datops26ba>3){
        document.getElementById('ps26b-a').style.color="red";
    }else{
        document.getElementById('ps26b-a').style.color="black";
    }
    if(datops26bb>3){
        document.getElementById('ps26b-b').style.color="red";
    }else{
        document.getElementById('ps26b-b').style.color="black";
    }
    if(datops26bc>3){
        document.getElementById('ps26b-c').style.color="red";
    }else{
        document.getElementById('ps26b-c').style.color="black";
    }

    var data26b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg26ba)+parseInt(datops26ba)),      0+parseInt(datops26ba)],
        ['',    0-(parseInt(datomg26bb)+parseInt(datops26bb)),      0+parseInt(datops26bb)],
        ['',    0-(parseInt(datomg26bc)+parseInt(datops26bc)),      0+parseInt(datops26bc)]
    ]);

    drawVisualization26b(data26b);

}

arrstyle = ["i26","f26","f26b-a","f26b-b","s26-a","s26-b","s26-c","p26-a","p26-b","p26-c","s26b-a","s26b-b","s26b-c","p26b-a","p26b-b","p26b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae26').change(function() {
    if(parseInt(document.getElementById('ae26').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar26a();
});

//FUNCIONES PARA SANGRADO
$('#s26-a').toggle(
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
$('#s26-b').toggle(
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
$('#s26-c').toggle(
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

$('#s26b-a').toggle(
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
$('#s26b-b').toggle(
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
$('#s26b-c').toggle(
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
$('#su26-a').toggle(
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
$('#su26-b').toggle(
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
$('#su26-c').toggle(
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

$('#su26b-a').toggle(
    function () {
        $(this).css({"background":"#f3e826"});
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
$('#su26b-b').toggle(
    function () {
        $(this).css({"background":"#f3e826"});
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
$('#su26b-c').toggle(
    function () {
        $(this).css({"background":"#f3e826"});
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
$('#p26-a').toggle(
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
$('#p26-b').toggle(
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
$('#p26-c').toggle(
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
$('#p26b-a').toggle(
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
$('#p26b-b').toggle(
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
$('#p26b-c').toggle(
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
$('#d26').toggle(
    function () {
        $('#diente26-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau26.png') }}')");
        $('#diente26-a').css("background-position","-36px -13px");
        $('#diente26-a').css("background-repeat","no-repeat");
        $('#m26').prop('disabled', true); // Deshabilita el input con id 'm26'
        $('#i26').prop("disabled",true);
        $('#f26').prop("disabled",true);
        $('#s26-a').prop("disabled",true);
        $('#s26-b').prop("disabled",true);
        $('#s26-c').prop("disabled",true);
        $('#p26-a').prop("disabled",true);
        $('#p26-b').prop("disabled",true);
        $('#p26-c').prop("disabled",true);
        $('#mg26-a').prop("disabled",true);
        $('#mg26-b').prop("disabled",true);
        $('#mg26-c').prop("disabled",true);
        $('#ps26-a').prop("disabled",true);
        $('#ps26-b').prop("disabled",true);
        $('#ps26-c').prop("disabled",true);
        /*$('#furca26').css("background","none");*/
        $('#mg26-a').val('0');
        $('#mg26-b').val('0');
        $('#mg26-c').val('0');
        $('#ps26-a').val('0');
        $('#ps26-b').val('0');
        $('#ps26-c').val('0');

        $('#diente26b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-26b.png') }}')");
        $('#diente26b-a').css("background-position","0 23px");
        $('#diente26b-a').css("background-repeat","no-repeat");
        $('#m26b').prop("disabled",true);
        $('#i26b').prop("disabled",true);
        $('#f26b-a').prop("disabled",true);
        $('#f26b-b').prop("disabled",true);
        $('#s26b-a').prop("disabled",true);
        $('#s26b-b').prop("disabled",true);
        $('#s26b-c').prop("disabled",true);
        $('#p26b-a').prop("disabled",true);
        $('#p26b-b').prop("disabled",true);
        $('#p26b-c').prop("disabled",true);
        $('#mg26b-a').prop("disabled",true);
        $('#mg26b-b').prop("disabled",true);
        $('#mg26b-c').prop("disabled",true);
        $('#ps26b-a').prop("disabled",true);
        $('#ps26b-b').prop("disabled",true);
        $('#ps26b-c').prop("disabled",true);
        $('#mg26b-a').val('0');
        $('#mg26b-b').val('0');
        $('#mg26b-c').val('0');
        $('#ps26b-a').val('0');
        $('#ps26b-b').val('0');
        $('#ps26b-c').val('0');

        $('#furca26').prop("disabled",true);
        $('#furca26-a').prop("disabled",true);
        $('#furca26-b').prop("disabled",true);
        $('#ae26').prop("disabled",true);
        $('#pi26').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar26a();
        cargar26b();

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
        $('#diente26-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-26.png') }}')");
        $('#diente26-a').css("background-position","0 -2px");
        $('#diente26-a').css("background-repeat","no-repeat");
        $('#m26').prop("disabled",false);
        $('#i26').prop("disabled",false);
        $('#f26').prop("disabled",false);
        $('#s26-a').prop("disabled",false);
        $('#s26-b').prop("disabled",false);
        $('#s26-c').prop("disabled",false);
        $('#p26-a').prop("disabled",false);
        $('#p26-b').prop("disabled",false);
        $('#p26-c').prop("disabled",false);
        $('#mg26-a').prop("disabled",false);
        $('#mg26-b').prop("disabled",false);
        $('#mg26-c').prop("disabled",false);
        $('#ps26-a').prop("disabled",false);
        $('#ps26-b').prop("disabled",false);
        $('#ps26-c').prop("disabled",false);

        $('#diente26b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-26b.png') }}')");
        $('#diente26b-a').css("background-position","0 23px");
        $('#diente26b-a').css("background-repeat","no-repeat");
        $('#m26b').prop("disabled",false);
        $('#i26b').prop("disabled",false);
        $('#f26b-a').prop("disabled",false);
        $('#f26b-b').prop("disabled",false);
        $('#s26b-a').prop("disabled",false);
        $('#s26b-b').prop("disabled",false);
        $('#s26b-c').prop("disabled",false);
        $('#p26b-a').prop("disabled",false);
        $('#p26b-b').prop("disabled",false);
        $('#p26b-c').prop("disabled",false);
        $('#mg26b-a').prop("disabled",false);
        $('#mg26b-b').prop("disabled",false);
        $('#mg26b-c').prop("disabled",false);
        $('#ps26b-a').prop("disabled",false);
        $('#ps26b-b').prop("disabled",false);
        $('#ps26b-c').prop("disabled",false);

        $('#furca26').css("display","block");
        $('#furca26-a').css("display","block");
        $('#furca26-b').css("display","block");
        $('#ae26').prop("disabled",false);
        $('#pi26').prop("disabled",false);

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
$('#i26').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f26').css({"background":"#FFFFFF"});
        $('#diente26-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl26.png') }}')");
        $('#diente26-a').css("background-position","-38px -2px");
        $('#diente26-a').css("background-repeat","no-repeat");

        $('#diente26b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-26b.png') }}')");
        $('#diente26b-a').css("background-position","0 23px");
        $('#diente26b-a').css("background-repeat","no-repeat");

        $('#furca26').css("background","none");
        $('#furca26-a').css("background","none");
        $('#furca26-b').css("background","none");
        $('#f26').css("background","none");
        $('#f26b-a').css("background","none");
        $('#f26b-b').css("background","none");

        $("#f26").attr("id","f26desact");
        $("#f26b-a").attr("id","f26b-adesact");
        $("#f26b-b").attr("id","f26b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente26-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-26.png') }}')");
        $('#diente26-a').css("background-position","0 -2px");
        $('#diente26-a').css("background-repeat","no-repeat");

        $('#diente26b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-26b.png') }}')");
        $('#diente26b-a').css("background-position","0 23px");
        $('#diente26b-a').css("background-repeat","no-repeat");

        $('#f26').css("background","#FFFFFF");
        $('#f26b-a').css("background","#FFFFFF");
        $('#f26b-b').css("background","#FFFFFF");

        $("#f26desact").attr("id","f26");
        $("#f26b-adesact").attr("id","f26b-a");
        $("#f26b-bdesact").attr("id","f26b-b");
        $('#d26').trigger('click');
    }
);

//FURCA
$('#f26').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i26').css({"background":"#FFFFFF"});
        $('#furca26').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca26').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca26').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca26').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f26b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca26-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca26-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca26-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca26-a').css("background","none");
    }
);
$('#f26b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca26-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca26-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca26-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca26-b').css("background","none");
    }
);




</script>
