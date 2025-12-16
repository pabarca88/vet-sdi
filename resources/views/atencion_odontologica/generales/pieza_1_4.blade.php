  {{--  </head>  --}}
  <style>
    #i14{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente14-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i14b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente14b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-14b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d14,#i14,#i14b,#f14,,#ae14-a,#ae14-b:hover{
        background: #E6E6E6;
    }
    #i14-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f14{
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
    #pi14{
        width: 100%;
    }
    #furca14-a,#furca14-b{
        width: 16px;
        height: 16px;
        position: absolute;
    }
    #furca14-a{
        margin-top: 70px;
    }
    #furca14-b{
        margin-top: 80px;
        margin-left: 28px;
    }

    .f14,{
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
    $pieza14 = $piezas_periodonto->firstWhere('pieza', '14');
    $cuerpo14 = $pieza14 ? $pieza14->cuerpo : [];
    $pronostico14 = $cuerpo14['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl14.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau14.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-14b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-14b.png') }}"/>
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
                            Pieza 1.4
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

                                            <div id="visualization14a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente14-a"><div id="furca14"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d14">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i14">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m14" name="m14" value="0" tabindex="1" onchange="rangoNumero('m14');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>

                                            <select class="form-control form-control-xs" name="pi14" id="pi14">
                                                <option value="" {{ $pronostico14 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico14 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico14 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico14 == 'M' ? 'selected' : '' }}>Resrvado</option>
                                                <option value="I" {{ $pronostico14 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f14"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s14-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s14-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s14-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su14-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su14-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su14-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p14-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p14-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p14-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae14" name="ae14" value="0" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg14-a" name="mg14-a" value="{{ $cuerpo14["vest_altura_mg_a"] ?? 0 }}" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-a');cargar14a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg14-b" name="mg14-b" value="{{ $cuerpo14["vest_altura_mg_b"] ?? 0 }}" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-b');cargar14a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg14-c" name="mg14-c" value="{{ $cuerpo14["vest_altura_mg_c"] ?? 0 }}" onchange="cargar14a();getDefectos();rangoNumeroMargen('mg14-c');cargar14a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps14-a" name="ps14-a" value="{{ $cuerpo14["vest_psondaje_a"] ?? 0 }}" onchange="cargar14a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps14-b" name="ps14-b" value="{{ $cuerpo14["vest_psondaje_b"] ?? 0 }}" onchange="cargar14a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps14-c" name="ps14-c" value="{{ $cuerpo14["vest_psondaje_c"] ?? 0 }}" onchange="cargar14a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization14b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente14b-a">
                                                        <div id="furca14-a"></div>
                                                        <div id="furca14-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps14b-a" name="ps14b-a" value="0" onchange="cargar14b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps14b-b" name="ps14b-b" value="0" onchange="cargar14b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps14b-c" name="ps14b-c" value="0" onchange="cargar14b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg14b-a" name="mg14b-a" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-a');cargar14b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg14b-b" name="mg14b-b" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-b');cargar14b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg14b-c" name="mg14b-c" value="0" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-c');cargar14b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s14b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s14b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s14b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su14b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su14b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su14b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p14b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p14b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p14b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f14b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f14b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps14b-a" name="ps14b-a" value="{{ $cuerpo14["pala_psondaje_a"] ?? 0 }}" onchange="cargar14b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps14b-b" name="ps14b-b" value="{{ $cuerpo14["pala_psondaje_b"] ?? 0 }}" onchange="cargar14b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps14b-c" name="ps14b-c" value="{{ $cuerpo14["pala_psondaje_c"] ?? 0 }}" onchange="cargar14b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg14b-a" name="mg14b-a" value="{{ $cuerpo14["pala_altura_mg_a"] ?? 0 }}" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-a');cargar14b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg14b-b" name="mg14b-b" value="{{ $cuerpo14["pala_altura_mg_b"] ?? 0 }}" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-b');cargar14b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg14b-c" name="mg14b-c" value="{{ $cuerpo14["pala_altura_mg_c"] ?? 0 }}" onchange="cargar14b();getDefectos();rangoNumeroMargen('mg14b-c');cargar14b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s14b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s14b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s14b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su14b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su14b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su14b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p14b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p14b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p14b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f14b-a"></div>
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
            <div class="form-group" id="obs_pieza1.4">
                <label class="floating-label-activo-sm">Obs. Pieza 1.4</label>
                 <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_17" id="obs_17" placeholder="Describa observaciones">{{ $cuerpo14["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza1.4">
            <button type="button" onclick="guardar_pieza('14')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.4</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar14a();
    cargar14b();

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

function drawVisualization14a(data14a) {
    // Create and draw the visualization.
    var ac14a = new google.visualization.AreaChart(document.getElementById('visualization14a'));
    ac14a.draw(data14a, {
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

    $('#visualization14a iframe').attr('allowTransparency', 'true');
    $('#visualization14a iframe').contents().find('body').css('background', 'transparent');

}

function cargar14a(){

    var datoae14=document.getElementById('ae14').value;

    var datomg14a=document.getElementById('mg14-a').value;
    var datomg14b=document.getElementById('mg14-b').value;
    var datomg14c=document.getElementById('mg14-c').value;

    var datops14a=document.getElementById('ps14-a').value;
    var datops14b=document.getElementById('ps14-b').value;
    var datops14c=document.getElementById('ps14-c').value;

    //alert(document.getElementById('ps14-a').value);

    if(datops14a>3){
        document.getElementById('ps14-a').style.color="red";
    }else{
        document.getElementById('ps14-a').style.color="black";
    }
    if(datops14b>3){
        document.getElementById('ps14-b').style.color="red";
    }else{
        document.getElementById('ps14-b').style.color="black";
    }
    if(datops14c>3){
        document.getElementById('ps14-c').style.color="red";
    }else{
        document.getElementById('ps14-c').style.color="black";
    }


    var data14a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg14a)+parseInt(datops14a)),      0-parseInt(datops14a), parseInt(datoae14)],
        ['',    0+(parseInt(datomg14b)+parseInt(datops14b)),      0-parseInt(datops14b), parseInt(datoae14)],
        ['',    0+(parseInt(datomg14c)+parseInt(datops14c)),      0-parseInt(datops14c), parseInt(datoae14)]
    ]);

    drawVisualization14a(data14a);

}

function drawVisualization14b(data14b) {

    // Create and draw the visualization.
    var ac14b = new google.visualization.AreaChart(document.getElementById('visualization14b'));
    ac14b.draw(data14b, {
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
    $('#visualization14b iframe').attr('allowTransparency', 'true');
    $('#visualization14b iframe').contents().find('body').css('background', 'transparent');
}

function cargar14b(){

    var datomg14ba=document.getElementById('mg14b-a').value;
    var datomg14bb=document.getElementById('mg14b-b').value;
    var datomg14bc=document.getElementById('mg14b-c').value;

    var datops14ba=document.getElementById('ps14b-a').value;
    var datops14bb=document.getElementById('ps14b-b').value;
    var datops14bc=document.getElementById('ps14b-c').value;

    if(datops14ba>3){
        document.getElementById('ps14b-a').style.color="red";
    }else{
        document.getElementById('ps14b-a').style.color="black";
    }
    if(datops14bb>3){
        document.getElementById('ps14b-b').style.color="red";
    }else{
        document.getElementById('ps14b-b').style.color="black";
    }
    if(datops14bc>3){
        document.getElementById('ps14b-c').style.color="red";
    }else{
        document.getElementById('ps14b-c').style.color="black";
    }

    var data14b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg14ba)+parseInt(datops14ba)),      0+parseInt(datops14ba)],
        ['',    0-(parseInt(datomg14bb)+parseInt(datops14bb)),      0+parseInt(datops14bb)],
        ['',    0-(parseInt(datomg14bc)+parseInt(datops14bc)),      0+parseInt(datops14bc)]
    ]);

    drawVisualization14b(data14b);

}

arrstyle = ["i14","f14","f14b-a","f14b-b","s14-a","s14-b","s14-c","p14-a","p14-b","p14-c","s14b-a","s14b-b","s14b-c","p14b-a","p14b-b","p14b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae14').change(function() {
    if(parseInt(document.getElementById('ae14').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar14a();
});

//FUNCIONES PARA SANGRADO
$('#s14-a').toggle(
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
$('#s14-b').toggle(
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
$('#s14-c').toggle(
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

$('#s14b-a').toggle(
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
$('#s14b-b').toggle(
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
$('#s14b-c').toggle(
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
$('#su14-a').toggle(
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
$('#su14-b').toggle(
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
$('#su14-c').toggle(
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

$('#su14b-a').toggle(
    function () {
        $(this).css({"background":"#f3e814"});
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
$('#su14b-b').toggle(
    function () {
        $(this).css({"background":"#f3e814"});
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
$('#su14b-c').toggle(
    function () {
        $(this).css({"background":"#f3e814"});
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
$('#p14-a').toggle(
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
$('#p14-b').toggle(
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
$('#p14-c').toggle(
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
$('#p14b-a').toggle(
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
$('#p14b-b').toggle(
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
$('#p14b-c').toggle(
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
$('#d14').toggle(
    function () {
        $('#diente14-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau14.png') }}')");
        $('#diente14-a').css("background-position","0px -2px");
        $('#diente14-a').css("background-repeat","no-repeat");
        $('#m14').prop('disabled', true); // Deshabilita el input con id 'm14'
        $('#i14').prop("disabled",true);
        $('#f14').prop("disabled",true);
        $('#s14-a').prop("disabled",true);
        $('#s14-b').prop("disabled",true);
        $('#s14-c').prop("disabled",true);
        $('#p14-a').prop("disabled",true);
        $('#p14-b').prop("disabled",true);
        $('#p14-c').prop("disabled",true);
        $('#mg14-a').prop("disabled",true);
        $('#mg14-b').prop("disabled",true);
        $('#mg14-c').prop("disabled",true);
        $('#ps14-a').prop("disabled",true);
        $('#ps14-b').prop("disabled",true);
        $('#ps14-c').prop("disabled",true);
        /*$('#furca14').css("background","none");*/
        $('#mg14-a').val('0');
        $('#mg14-b').val('0');
        $('#mg14-c').val('0');
        $('#ps14-a').val('0');
        $('#ps14-b').val('0');
        $('#ps14-c').val('0');

        $('#diente14b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-14b.png') }}')");
        $('#diente14b-a').css("background-position","0 23px");
        $('#diente14b-a').css("background-repeat","no-repeat");
        $('#m14b').prop("disabled",true);
        $('#i14b').prop("disabled",true);
        $('#f14b-a').prop("disabled",true);
        $('#f14b-b').prop("disabled",true);
        $('#s14b-a').prop("disabled",true);
        $('#s14b-b').prop("disabled",true);
        $('#s14b-c').prop("disabled",true);
        $('#p14b-a').prop("disabled",true);
        $('#p14b-b').prop("disabled",true);
        $('#p14b-c').prop("disabled",true);
        $('#mg14b-a').prop("disabled",true);
        $('#mg14b-b').prop("disabled",true);
        $('#mg14b-c').prop("disabled",true);
        $('#ps14b-a').prop("disabled",true);
        $('#ps14b-b').prop("disabled",true);
        $('#ps14b-c').prop("disabled",true);
        $('#mg14b-a').val('0');
        $('#mg14b-b').val('0');
        $('#mg14b-c').val('0');
        $('#ps14b-a').val('0');
        $('#ps14b-b').val('0');
        $('#ps14b-c').val('0');

        $('#furca14').prop("disabled",true);
        $('#furca14-a').prop("disabled",true);
        $('#furca14-b').prop("disabled",true);
        $('#ae14').prop("disabled",true);
        $('#pi14').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar14a();
        cargar14b();

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
        $('#diente14-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png') }}')");
        $('#diente14-a').css("background-position","0 -2px");
        $('#diente14-a').css("background-repeat","no-repeat");
        $('#m14').prop("disabled",false);
        $('#i14').prop("disabled",false);
        $('#f14').prop("disabled",false);
        $('#s14-a').prop("disabled",false);
        $('#s14-b').prop("disabled",false);
        $('#s14-c').prop("disabled",false);
        $('#p14-a').prop("disabled",false);
        $('#p14-b').prop("disabled",false);
        $('#p14-c').prop("disabled",false);
        $('#mg14-a').prop("disabled",false);
        $('#mg14-b').prop("disabled",false);
        $('#mg14-c').prop("disabled",false);
        $('#ps14-a').prop("disabled",false);
        $('#ps14-b').prop("disabled",false);
        $('#ps14-c').prop("disabled",false);

        $('#diente14b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-14b.png') }}')");
        $('#diente14b-a').css("background-position","0 23px");
        $('#diente14b-a').css("background-repeat","no-repeat");
        $('#m14b').prop("disabled",false);
        $('#i14b').prop("disabled",false);
        $('#f14b-a').prop("disabled",false);
        $('#f14b-b').prop("disabled",false);
        $('#s14b-a').prop("disabled",false);
        $('#s14b-b').prop("disabled",false);
        $('#s14b-c').prop("disabled",false);
        $('#p14b-a').prop("disabled",false);
        $('#p14b-b').prop("disabled",false);
        $('#p14b-c').prop("disabled",false);
        $('#mg14b-a').prop("disabled",false);
        $('#mg14b-b').prop("disabled",false);
        $('#mg14b-c').prop("disabled",false);
        $('#ps14b-a').prop("disabled",false);
        $('#ps14b-b').prop("disabled",false);
        $('#ps14b-c').prop("disabled",false);

        $('#furca14').css("display","block");
        $('#furca14-a').css("display","block");
        $('#furca14-b').css("display","block");
        $('#ae14').prop("disabled",false);
        $('#pi14').prop("disabled",false);

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
$('#i14').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f14').css({"background":"#FFFFFF"});
        $('#diente14-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl14.png') }}')");
        $('#diente14-a').css("background-position","1px -2px");
        $('#diente14-a').css("background-repeat","no-repeat");

        $('#diente14b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-14b.png') }}')");
        $('#diente14b-a').css("background-position","0 23px");
        $('#diente14b-a').css("background-repeat","no-repeat");

        $('#furca14').css("background","none");
        $('#furca14-a').css("background","none");
        $('#furca14-b').css("background","none");
        $('#f14').css("background","none");
        $('#f14b-a').css("background","none");
        $('#f14b-b').css("background","none");

        $("#f14").attr("id","f14desact");
        $("#f14b-a").attr("id","f14b-adesact");
        $("#f14b-b").attr("id","f14b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente14-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png') }}')");
        $('#diente14-a').css("background-position","0 -2px");
        $('#diente14-a').css("background-repeat","no-repeat");

        $('#diente14b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-14b.png') }}')");
        $('#diente14b-a').css("background-position","0 23px");
        $('#diente14b-a').css("background-repeat","no-repeat");

        $('#f14').css("background","#FFFFFF");
        $('#f14b-a').css("background","#FFFFFF");
        $('#f14b-b').css("background","#FFFFFF");

        $("#f14desact").attr("id","f14");
        $("#f14b-adesact").attr("id","f14b-a");
        $("#f14b-bdesact").attr("id","f14b-b");
        $('#d14').trigger('click');
    }
);

//FURCA
$('#f14').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i14').css({"background":"#FFFFFF"});
        $('#furca14').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca14').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca14').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca14').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f14b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca14-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca14-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca14-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca14-a').css("background","none");
    }
);
$('#f14b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca14-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca14-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca14-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca14-b').css("background","none");
    }
);




</script>





