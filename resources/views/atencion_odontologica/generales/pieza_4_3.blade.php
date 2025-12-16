  {{--  </head>  --}}
  <style>
    #i43{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente43-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla5/periodontograma-dientes-arriba-43.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i43b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente43b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla7/periodontograma-dientes-abajo-43b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d43,#i43,#i43b,#f43,,#ae43-a,#ae43-b:hover{
        background: #E6E6E6;
    }
    #i43-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f43{
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
    #pi43{
        width: 100%;
    }

    .f43,{
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
        $pieza43 = $piezas_periodonto->firstWhere('pieza', '43');
        $cuerpo43 = $pieza43 ? $pieza43->cuerpo : [];
        $pronostico43 = $cuerpo43['pronostico'] ?? '';
    @endphp

<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl43.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau43.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-43b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-43b.png') }}"/>
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
                            Pieza 4.3
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

                                            <div id="visualization43a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente43-a"><div id="furca43"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d43">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i43">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m43" name="m43" value="{{ $cuerpo43["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m43');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi43" id="pi43">
                                                <option value="" {{ $pronostico43 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico43 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico43 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico43 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                <option value="I" {{ $pronostico43 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f43"></div>
                                        </div>
                                    </div>  --}}
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s43-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s43-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s43-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su43-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su43-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su43-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p43-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p43-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p43-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae43" name="ae43" value="{{ $cuerpo43["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg43-a" name="mg43-a" value="{{ $cuerpo43["vest_altura_mg_a"] ?? 0 }}" onchange="cargar43a();getDefectos();rangoNumeroMargen('mg43-a');cargar43a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg43-b" name="mg43-b" value="{{ $cuerpo43["vest_altura_mg_b"] ?? 0 }}" onchange="cargar43a();getDefectos();rangoNumeroMargen('mg43-b');cargar43a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg43-c" name="mg43-c" value="{{ $cuerpo43["vest_altura_mg_c"] ?? 0 }}" onchange="cargar43a();getDefectos();rangoNumeroMargen('mg43-c');cargar43a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps43-a" name="ps43-a" value="{{ $cuerpo43["vest_psondaje_a"] ?? 0 }}" onchange="cargar43a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps43-b" name="ps43-b" value="{{ $cuerpo43["vest_psondaje_b"] ?? 0 }}" onchange="cargar43a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps43-c" name="ps43-c" value="{{ $cuerpo43["vest_psondaje_c"] ?? 0 }}" onchange="cargar43a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization43b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente43b-a">
                                                        <div id="furca43-a"></div>
                                                        <div id="furca43-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
                                           <!-- <tr>
                                                <td class="titulo">P. sondaje</td>
                                                <td class="borde">
                                                    <input style="width: 30%;height: 25px; margin-left: 7px" type="number" id="ps43b-a" name="ps43b-a" value="0" onchange="cargar43b();getDefectos();" tabindex="145"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps43b-b" name="ps43b-b" value="0" onchange="cargar43b();getDefectos();" tabindex="146"/>
                                                    <input style="width: 30%;height: 25px;" type="number" id="ps43b-c" name="ps43b-c" value="0" onchange="cargar43b();getDefectos();" tabindex="147"/></td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Altura MG</td>
                                                <td class="borde">
                                                    <div class="row">
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  style=" margin-left: 7px" type="number" id="mg43b-a" name="mg43b-a" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-a');cargar43b();" tabindex="193"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm"  type="number" id="mg43b-b" name="mg43b-b" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-b');cargar43b();" tabindex="194"/>
                                                        </div>
                                                        <div class="col-md-4 text-center">
                                                            <input class="form-control form-control-sm" style=" margin-right: 7px" type="number" id="mg43b-c" name="mg43b-c" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-c');cargar43b();" tabindex="195"/>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Sangrado </td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="s43b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="s43b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="s43b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Supuraci&oacute;n</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="su43b-a"></div>
                                                    <div style="width: 30%;height: 20px;"id="su43b-b" ></div>
                                                    <div style="width: 30%;height: 20px;" id="su43b-c" ></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Higiene</td>
                                                <td class="borde">
                                                    <div style="width: 30%;height: 20px;margin-left: 7px" id="p43b-a"></div>
                                                    <div style="width: 30%;height: 20px;" id="p43b-b"></div>
                                                    <div style="width: 30%;height: 20px;" id="p43b-c"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="titulo">Furca</td>
                                                <td class="borde"style="text-align:center">
                                                    <div style="width: 20%;height: 25px;margin-left: 7px" id="f43b-a">F-1</div><div style="width: 20%;height: 25px;margin-left: 7px" id="f43b-b">F-2</div>

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
                                    <input class="form-control form-control-xs" type="number" id="ps43b-a" name="ps43b-a" value="{{ $cuerpo43["pala_psondaje_a"] ?? 0 }}" onchange="cargar43b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps43b-b" name="ps43b-b" value="{{ $cuerpo43["pala_psondaje_b"] ?? 0 }}" onchange="cargar43b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps43b-c" name="ps43b-c" value="{{ $cuerpo43["pala_psondaje_c"] ?? 0 }}" onchange="cargar43b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg43b-a" name="mg43b-a" value="{{ $cuerpo43["pala_altura_mg_a"] ?? 0 }}" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-a');cargar43b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg43b-b" name="mg43b-b" value="{{ $cuerpo43["pala_altura_mg_b"] ?? 0 }}" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-b');cargar43b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg43b-c" name="mg43b-c" value="{{ $cuerpo43["pala_altura_mg_c"] ?? 0 }}" onchange="cargar43b();getDefectos();rangoNumeroMargen('mg43b-c');cargar43b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s43b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s43b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s43b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su43b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su43b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su43b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p43b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p43b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p43b-c"></div>
                                </div>
                            </div>
                            {{--  <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f43b-a"></div>
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
            <div class="form-group" id="obs_pieza4.3">
                <label class="floating-label-activo-sm">Obs. Pieza 4.3</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 4.3" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_43" id="obs_43" placeholder="Describa observaciones">{{ $cuerpo43["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza4.3">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('43')"><i class="feather icon-save"></i>  Guardar evaluación 4.3</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar43a();
    cargar43b();

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

function drawVisualization43a(data43a) {
    // Create and draw the visualization.
    var ac43a = new google.visualization.AreaChart(document.getElementById('visualization43a'));
    ac43a.draw(data43a, {
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

    $('#visualization43a iframe').attr('allowTransparency', 'true');
    $('#visualization43a iframe').contents().find('body').css('background', 'transparent');

}

function cargar43a(){

    var datoae43=document.getElementById('ae43').value;

    var datomg43a=document.getElementById('mg43-a').value;
    var datomg43b=document.getElementById('mg43-b').value;
    var datomg43c=document.getElementById('mg43-c').value;

    var datops43a=document.getElementById('ps43-a').value;
    var datops43b=document.getElementById('ps43-b').value;
    var datops43c=document.getElementById('ps43-c').value;

    //alert(document.getElementById('ps43-a').value);

    if(datops43a>3){
        document.getElementById('ps43-a').style.color="red";
    }else{
        document.getElementById('ps43-a').style.color="black";
    }
    if(datops43b>3){
        document.getElementById('ps43-b').style.color="red";
    }else{
        document.getElementById('ps43-b').style.color="black";
    }
    if(datops43c>3){
        document.getElementById('ps43-c').style.color="red";
    }else{
        document.getElementById('ps43-c').style.color="black";
    }


    var data43a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg43a)+parseInt(datops43a)),      0-parseInt(datops43a), parseInt(datoae43)],
        ['',    0+(parseInt(datomg43b)+parseInt(datops43b)),      0-parseInt(datops43b), parseInt(datoae43)],
        ['',    0+(parseInt(datomg43c)+parseInt(datops43c)),      0-parseInt(datops43c), parseInt(datoae43)]
    ]);

    drawVisualization43a(data43a);

}

function drawVisualization43b(data43b) {

    // Create and draw the visualization.
    var ac43b = new google.visualization.AreaChart(document.getElementById('visualization43b'));
    ac43b.draw(data43b, {
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
    $('#visualization43b iframe').attr('allowTransparency', 'true');
    $('#visualization43b iframe').contents().find('body').css('background', 'transparent');
}

function cargar43b(){

    var datomg43ba=document.getElementById('mg43b-a').value;
    var datomg43bb=document.getElementById('mg43b-b').value;
    var datomg43bc=document.getElementById('mg43b-c').value;

    var datops43ba=document.getElementById('ps43b-a').value;
    var datops43bb=document.getElementById('ps43b-b').value;
    var datops43bc=document.getElementById('ps43b-c').value;

    if(datops43ba>3){
        document.getElementById('ps43b-a').style.color="red";
    }else{
        document.getElementById('ps43b-a').style.color="black";
    }
    if(datops43bb>3){
        document.getElementById('ps43b-b').style.color="red";
    }else{
        document.getElementById('ps43b-b').style.color="black";
    }
    if(datops43bc>3){
        document.getElementById('ps43b-c').style.color="red";
    }else{
        document.getElementById('ps43b-c').style.color="black";
    }

    var data43b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg43ba)+parseInt(datops43ba)),      0+parseInt(datops43ba)],
        ['',    0-(parseInt(datomg43bb)+parseInt(datops43bb)),      0+parseInt(datops43bb)],
        ['',    0-(parseInt(datomg43bc)+parseInt(datops43bc)),      0+parseInt(datops43bc)]
    ]);

    drawVisualization43b(data43b);

}

arrstyle = ["i43","f43","f43b-a","f43b-b","s43-a","s43-b","s43-c","p43-a","p43-b","p43-c","s43b-a","s43b-b","s43b-c","p43b-a","p43b-b","p43b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae43').change(function() {
    if(parseInt(document.getElementById('ae43').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar43a();
});

//FUNCIONES PARA SANGRADO
$('#s43-a').toggle(
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
$('#s43-b').toggle(
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
$('#s43-c').toggle(
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

$('#s43b-a').toggle(
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
$('#s43b-b').toggle(
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
$('#s43b-c').toggle(
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
$('#su43-a').toggle(
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
$('#su43-b').toggle(
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
$('#su43-c').toggle(
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

$('#su43b-a').toggle(
    function () {
        $(this).css({"background":"#f3e843"});
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
$('#su43b-b').toggle(
    function () {
        $(this).css({"background":"#f3e843"});
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
$('#su43b-c').toggle(
    function () {
        $(this).css({"background":"#f3e843"});
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
$('#p43-a').toggle(
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
$('#p43-b').toggle(
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
$('#p43-c').toggle(
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
$('#p43b-a').toggle(
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
$('#p43b-b').toggle(
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
$('#p43b-c').toggle(
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
$('#d43').toggle(
    function () {
        $('#diente43-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau43.png') }}')");
        $('#diente43-a').css("background-position","-36px -43px");
        $('#diente43-a').css("background-repeat","no-repeat");
        $('#m43').prop('disabled', true); // Deshabilita el input con id 'm43'
        $('#i43').prop("disabled",true);
        $('#f43').prop("disabled",true);
        $('#s43-a').prop("disabled",true);
        $('#s43-b').prop("disabled",true);
        $('#s43-c').prop("disabled",true);
        $('#p43-a').prop("disabled",true);
        $('#p43-b').prop("disabled",true);
        $('#p43-c').prop("disabled",true);
        $('#mg43-a').prop("disabled",true);
        $('#mg43-b').prop("disabled",true);
        $('#mg43-c').prop("disabled",true);
        $('#ps43-a').prop("disabled",true);
        $('#ps43-b').prop("disabled",true);
        $('#ps43-c').prop("disabled",true);
        /*$('#furca43').css("background","none");*/
        $('#mg43-a').val('0');
        $('#mg43-b').val('0');
        $('#mg43-c').val('0');
        $('#ps43-a').val('0');
        $('#ps43-b').val('0');
        $('#ps43-c').val('0');

        $('#diente43b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-43b.png') }}')");
        $('#diente43b-a').css("background-position","0 23px");
        $('#diente43b-a').css("background-repeat","no-repeat");
        $('#m43b').prop("disabled",true);
        $('#i43b').prop("disabled",true);
        $('#f43b-a').prop("disabled",true);
        $('#f43b-b').prop("disabled",true);
        $('#s43b-a').prop("disabled",true);
        $('#s43b-b').prop("disabled",true);
        $('#s43b-c').prop("disabled",true);
        $('#p43b-a').prop("disabled",true);
        $('#p43b-b').prop("disabled",true);
        $('#p43b-c').prop("disabled",true);
        $('#mg43b-a').prop("disabled",true);
        $('#mg43b-b').prop("disabled",true);
        $('#mg43b-c').prop("disabled",true);
        $('#ps43b-a').prop("disabled",true);
        $('#ps43b-b').prop("disabled",true);
        $('#ps43b-c').prop("disabled",true);
        $('#mg43b-a').val('0');
        $('#mg43b-b').val('0');
        $('#mg43b-c').val('0');
        $('#ps43b-a').val('0');
        $('#ps43b-b').val('0');
        $('#ps43b-c').val('0');

        $('#furca43').prop("disabled",true);
        $('#furca43-a').prop("disabled",true);
        $('#furca43-b').prop("disabled",true);
        $('#ae43').prop("disabled",true);
        $('#pi43').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar43a();
        cargar43b();

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar43a();
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
        $('#diente43-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-43.png') }}')");
        $('#diente43-a').css("background-position","0 -2px");
        $('#diente43-a').css("background-repeat","no-repeat");
        $('#m43').prop("disabled",false);
        $('#i43').prop("disabled",false);
        $('#f43').prop("disabled",false);
        $('#s43-a').prop("disabled",false);
        $('#s43-b').prop("disabled",false);
        $('#s43-c').prop("disabled",false);
        $('#p43-a').prop("disabled",false);
        $('#p43-b').prop("disabled",false);
        $('#p43-c').prop("disabled",false);
        $('#mg43-a').prop("disabled",false);
        $('#mg43-b').prop("disabled",false);
        $('#mg43-c').prop("disabled",false);
        $('#ps43-a').prop("disabled",false);
        $('#ps43-b').prop("disabled",false);
        $('#ps43-c').prop("disabled",false);

        $('#diente43b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-43b.png') }}')");
        $('#diente43b-a').css("background-position","0 23px");
        $('#diente43b-a').css("background-repeat","no-repeat");
        $('#m43b').prop("disabled",false);
        $('#i43b').prop("disabled",false);
        $('#f43b-a').prop("disabled",false);
        $('#f43b-b').prop("disabled",false);
        $('#s43b-a').prop("disabled",false);
        $('#s43b-b').prop("disabled",false);
        $('#s43b-c').prop("disabled",false);
        $('#p43b-a').prop("disabled",false);
        $('#p43b-b').prop("disabled",false);
        $('#p43b-c').prop("disabled",false);
        $('#mg43b-a').prop("disabled",false);
        $('#mg43b-b').prop("disabled",false);
        $('#mg43b-c').prop("disabled",false);
        $('#ps43b-a').prop("disabled",false);
        $('#ps43b-b').prop("disabled",false);
        $('#ps43b-c').prop("disabled",false);

        $('#furca43').css("display","block");
        $('#furca43-a').css("display","block");
        $('#furca43-b').css("display","block");
        $('#ae43').prop("disabled",false);
        $('#pi43').prop("disabled",false);

        totalDientes++;

        {{--  cargar17a();
        cargar16a();
        cargar15a();
        cargar14a();
        cargar43a();
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
$('#i43').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f43').css({"background":"#FFFFFF"});
        $('#diente43-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl43.png') }}')");
        $('#diente43-a').css("background-position","-38px -2px");
        $('#diente43-a').css("background-repeat","no-repeat");

        $('#diente43b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-43b.png') }}')");
        $('#diente43b-a').css("background-position","0 23px");
        $('#diente43b-a').css("background-repeat","no-repeat");

        $('#furca43').css("background","none");
        $('#furca43-a').css("background","none");
        $('#furca43-b').css("background","none");
        $('#f43').css("background","none");
        $('#f43b-a').css("background","none");
        $('#f43b-b').css("background","none");

        $("#f43").attr("id","f43desact");
        $("#f43b-a").attr("id","f43b-adesact");
        $("#f43b-b").attr("id","f43b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente43-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-43.png') }}')");
        $('#diente43-a').css("background-position","0 -2px");
        $('#diente43-a').css("background-repeat","no-repeat");

        $('#diente43b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-43b.png') }}')");
        $('#diente43b-a').css("background-position","0 23px");
        $('#diente43b-a').css("background-repeat","no-repeat");

        $('#f43').css("background","#FFFFFF");
        $('#f43b-a').css("background","#FFFFFF");
        $('#f43b-b').css("background","#FFFFFF");

        $("#f43desact").attr("id","f43");
        $("#f43b-adesact").attr("id","f43b-a");
        $("#f43b-bdesact").attr("id","f43b-b");
        $('#d43').trigger('click');
    }
);

//FURCA
$('#f43').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i43').css({"background":"#FFFFFF"});
        $('#furca43').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca43').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca43').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca43').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f43b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca43-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca43-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca43-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca43-a').css("background","none");
    }
);
$('#f43b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca43-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca43-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca43-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca43-b').css("background","none");
    }
);




</script>









