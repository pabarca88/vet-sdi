  {{--  </head>  --}}
  <style>
    #i13{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente13-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png') }}');
        width:54px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i13b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente13b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-13b.png') }}');
        width:54px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d13,#i13,#i13b,#f13,,#ae13-a,#ae13-b:hover{
        background: #E6E6E6;
    }
    #i13-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f13{
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
    #pi13{
        width: 100%;
    }

    .f13,{
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
    $pieza13 = $piezas_periodonto->firstWhere('pieza', '13');
    $cuerpo13 = $pieza13 ? $pieza13->cuerpo : [];
    $pronostico13 = $cuerpo13['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl13.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau13.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-13b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-13b.png') }}"/>
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
                            Pieza 1.3
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

                                            <div id="visualization13a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente13-a"><div id="furca13"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d13">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i13">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m13" name="m13" value="0" tabindex="1" onchange="rangoNumero('m13');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-9">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi13" id="pi13">
                                                <option value="" {{ $pronostico13 == '' ? 'selected' : '' }}></option>
                                                <option value="B" {{ $pronostico13 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                <option value="D" {{ $pronostico13 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                <option value="M" {{ $pronostico13 == 'M' ? 'selected' : '' }}>Resrvado</option>
                                                <option value="I" {{ $pronostico13 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--  <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f13"></div>
                                        </div>
                                    </div>  --}}
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s13-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s13-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s13-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su13-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su13-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su13-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p13-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p13-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p13-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae13" name="ae13" value="{{ $cuerpo13["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg13-a" name="mg13-a" value="{{ $cuerpo13["vest_altura_mg_a"] ?? 0 }}" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-a');cargar13a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg13-b" name="mg13-b" value="{{ $cuerpo13["vest_altura_mg_b"] ?? 0 }}" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-b');cargar13a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg13-c" name="mg13-c" value="{{ $cuerpo13["vest_altura_mg_c"] ?? 0 }}" onchange="cargar13a();getDefectos();rangoNumeroMargen('mg13-c');cargar13a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps13-a" name="ps13-a" value="{{ $cuerpo13["vest_psondaje_a"] ?? 0 }}" onchange="cargar13a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps13-b" name="ps13-b" value="{{ $cuerpo13["vest_psondaje_b"] ?? 0 }}" onchange="cargar13a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps13-c" name="ps13-c" value="{{ $cuerpo13["vest_psondaje_c"] ?? 0 }}" onchange="cargar13a();getDefectos();" tabindex="99"/>
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
                                                    <div id="visualization13b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente13b-a">
                                                        <div id="furca13-a"></div>
                                                        <div id="furca13-b"></div>
                                                    </div>
                                                </td>
                                            </tr>
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
                                    <input class="form-control form-control-xs" type="number" id="ps13b-a" name="ps13b-a" value="{{ $cuerpo13["pala_psondaje_a"] ?? 0 }}" onchange="cargar13b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps13b-b" name="ps13b-b" value="{{ $cuerpo13["pala_psondaje_b"] ?? 0 }}" onchange="cargar13b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps13b-c" name="ps13b-c" value="{{ $cuerpo13["pala_psondaje_c"] ?? 0 }}" onchange="cargar13b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg13b-a" name="mg13b-a" value="{{ $cuerpo13["pala_altura_mg_a"] ?? 0 }}" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-a');cargar13b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg13b-b" name="mg13b-b" value="{{ $cuerpo13["pala_altura_mg_b"] ?? 0 }}" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-b');cargar13b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg13b-c" name="mg13b-c" value="{{ $cuerpo13["pala_altura_mg_c"] ?? 0 }}" onchange="cargar13b();getDefectos();rangoNumeroMargen('mg13b-c');cargar13b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s13b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s13b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s13b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer pointer rounded-pill border-warning input-dental" id="su13b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su13b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su13b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p13b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p13b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p13b-c"></div>
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
            <div class="form-group" id="obs_pieza1.3">
                <label class="floating-label-activo-sm">Obs. Pieza 1.3</label>
                <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 1.7" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_17" id="obs_17" placeholder="Describa observaciones">{{ $cuerpo13["observaciones"] ?? '' }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza1.3">
            <button type="button" onclick="guardar_pieza('13')" class="btn btn-info text-center"><i class="feather icon-save"></i>  Guardar evaluación 1.3</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar13a();
    cargar13b();

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

function drawVisualization13a(data13a) {
    // Create and draw the visualization.
    var ac13a = new google.visualization.AreaChart(document.getElementById('visualization13a'));
    ac13a.draw(data13a, {
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

    $('#visualization13a iframe').attr('allowTransparency', 'true');
    $('#visualization13a iframe').contents().find('body').css('background', 'transparent');

}

function cargar13a(){

    var datoae13=document.getElementById('ae13').value;

    var datomg13a=document.getElementById('mg13-a').value;
    var datomg13b=document.getElementById('mg13-b').value;
    var datomg13c=document.getElementById('mg13-c').value;

    var datops13a=document.getElementById('ps13-a').value;
    var datops13b=document.getElementById('ps13-b').value;
    var datops13c=document.getElementById('ps13-c').value;

    //alert(document.getElementById('ps13-a').value);

    if(datops13a>3){
        document.getElementById('ps13-a').style.color="red";
    }else{
        document.getElementById('ps13-a').style.color="black";
    }
    if(datops13b>3){
        document.getElementById('ps13-b').style.color="red";
    }else{
        document.getElementById('ps13-b').style.color="black";
    }
    if(datops13c>3){
        document.getElementById('ps13-c').style.color="red";
    }else{
        document.getElementById('ps13-c').style.color="black";
    }


    var data13a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg13a)+parseInt(datops13a)),      0-parseInt(datops13a), parseInt(datoae13)],
        ['',    0+(parseInt(datomg13b)+parseInt(datops13b)),      0-parseInt(datops13b), parseInt(datoae13)],
        ['',    0+(parseInt(datomg13c)+parseInt(datops13c)),      0-parseInt(datops13c), parseInt(datoae13)]
    ]);

    drawVisualization13a(data13a);

}

function drawVisualization13b(data13b) {

    // Create and draw the visualization.
    var ac13b = new google.visualization.AreaChart(document.getElementById('visualization13b'));
    ac13b.draw(data13b, {
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
    $('#visualization13b iframe').attr('allowTransparency', 'true');
    $('#visualization13b iframe').contents().find('body').css('background', 'transparent');
}

function cargar13b(){

    var datomg13ba=document.getElementById('mg13b-a').value;
    var datomg13bb=document.getElementById('mg13b-b').value;
    var datomg13bc=document.getElementById('mg13b-c').value;

    var datops13ba=document.getElementById('ps13b-a').value;
    var datops13bb=document.getElementById('ps13b-b').value;
    var datops13bc=document.getElementById('ps13b-c').value;

    if(datops13ba>3){
        document.getElementById('ps13b-a').style.color="red";
    }else{
        document.getElementById('ps13b-a').style.color="black";
    }
    if(datops13bb>3){
        document.getElementById('ps13b-b').style.color="red";
    }else{
        document.getElementById('ps13b-b').style.color="black";
    }
    if(datops13bc>3){
        document.getElementById('ps13b-c').style.color="red";
    }else{
        document.getElementById('ps13b-c').style.color="black";
    }

    var data13b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg13ba)+parseInt(datops13ba)),      0+parseInt(datops13ba)],
        ['',    0-(parseInt(datomg13bb)+parseInt(datops13bb)),      0+parseInt(datops13bb)],
        ['',    0-(parseInt(datomg13bc)+parseInt(datops13bc)),      0+parseInt(datops13bc)]
    ]);

    drawVisualization13b(data13b);

}

arrstyle = ["i13","f13","f13b-a","f13b-b","s13-a","s13-b","s13-c","p13-a","p13-b","p13-c","s13b-a","s13b-b","s13b-c","p13b-a","p13b-b","p13b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae13').change(function() {
    if(parseInt(document.getElementById('ae13').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar13a();
});

//FUNCIONES PARA SANGRADO
$('#s13-a').toggle(
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
$('#s13-b').toggle(
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
$('#s13-c').toggle(
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

$('#s13b-a').toggle(
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
$('#s13b-b').toggle(
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
$('#s13b-c').toggle(
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
$('#su13-a').toggle(
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
$('#su13-b').toggle(
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
$('#su13-c').toggle(
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

$('#su13b-a').toggle(
    function () {
        $(this).css({"background":"#f3e813"});
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
$('#su13b-b').toggle(
    function () {
        $(this).css({"background":"#f3e813"});
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
$('#su13b-c').toggle(
    function () {
        $(this).css({"background":"#f3e813"});
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
$('#p13-a').toggle(
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
$('#p13-b').toggle(
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
$('#p13-c').toggle(
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
$('#p13b-a').toggle(
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
$('#p13b-b').toggle(
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
$('#p13b-c').toggle(
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
$('#d13').toggle(
    function () {
        $('#diente13-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau13.png') }}')");
        $('#diente13-a').css("background-position","0px -2px");
        $('#diente13-a').css("background-repeat","no-repeat");
        $('#m13').prop('disabled', true); // Deshabilita el input con id 'm13'
        $('#i13').prop("disabled",true);
        $('#f13').prop("disabled",true);
        $('#s13-a').prop("disabled",true);
        $('#s13-b').prop("disabled",true);
        $('#s13-c').prop("disabled",true);
        $('#p13-a').prop("disabled",true);
        $('#p13-b').prop("disabled",true);
        $('#p13-c').prop("disabled",true);
        $('#mg13-a').prop("disabled",true);
        $('#mg13-b').prop("disabled",true);
        $('#mg13-c').prop("disabled",true);
        $('#ps13-a').prop("disabled",true);
        $('#ps13-b').prop("disabled",true);
        $('#ps13-c').prop("disabled",true);
        /*$('#furca13').css("background","none");*/
        $('#mg13-a').val('0');
        $('#mg13-b').val('0');
        $('#mg13-c').val('0');
        $('#ps13-a').val('0');
        $('#ps13-b').val('0');
        $('#ps13-c').val('0');

        $('#diente13b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-13b.png') }}')");
        $('#diente13b-a').css("background-position","0 23px");
        $('#diente13b-a').css("background-repeat","no-repeat");
        $('#m13b').prop("disabled",true);
        $('#i13b').prop("disabled",true);
        $('#f13b-a').prop("disabled",true);
        $('#f13b-b').prop("disabled",true);
        $('#s13b-a').prop("disabled",true);
        $('#s13b-b').prop("disabled",true);
        $('#s13b-c').prop("disabled",true);
        $('#p13b-a').prop("disabled",true);
        $('#p13b-b').prop("disabled",true);
        $('#p13b-c').prop("disabled",true);
        $('#mg13b-a').prop("disabled",true);
        $('#mg13b-b').prop("disabled",true);
        $('#mg13b-c').prop("disabled",true);
        $('#ps13b-a').prop("disabled",true);
        $('#ps13b-b').prop("disabled",true);
        $('#ps13b-c').prop("disabled",true);
        $('#mg13b-a').val('0');
        $('#mg13b-b').val('0');
        $('#mg13b-c').val('0');
        $('#ps13b-a').val('0');
        $('#ps13b-b').val('0');
        $('#ps13b-c').val('0');

        $('#furca13').prop("disabled",true);
        $('#furca13-a').prop("disabled",true);
        $('#furca13-b').prop("disabled",true);
        $('#ae13').prop("disabled",true);
        $('#pi13').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar13a();
        cargar13b();

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
        $('#diente13-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png') }}')");
        $('#diente13-a').css("background-position","0 -2px");
        $('#diente13-a').css("background-repeat","no-repeat");
        $('#m13').prop("disabled",false);
        $('#i13').prop("disabled",false);
        $('#f13').prop("disabled",false);
        $('#s13-a').prop("disabled",false);
        $('#s13-b').prop("disabled",false);
        $('#s13-c').prop("disabled",false);
        $('#p13-a').prop("disabled",false);
        $('#p13-b').prop("disabled",false);
        $('#p13-c').prop("disabled",false);
        $('#mg13-a').prop("disabled",false);
        $('#mg13-b').prop("disabled",false);
        $('#mg13-c').prop("disabled",false);
        $('#ps13-a').prop("disabled",false);
        $('#ps13-b').prop("disabled",false);
        $('#ps13-c').prop("disabled",false);

        $('#diente13b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-13b.png') }}')");
        $('#diente13b-a').css("background-position","0 23px");
        $('#diente13b-a').css("background-repeat","no-repeat");
        $('#m13b').prop("disabled",false);
        $('#i13b').prop("disabled",false);
        $('#f13b-a').prop("disabled",false);
        $('#f13b-b').prop("disabled",false);
        $('#s13b-a').prop("disabled",false);
        $('#s13b-b').prop("disabled",false);
        $('#s13b-c').prop("disabled",false);
        $('#p13b-a').prop("disabled",false);
        $('#p13b-b').prop("disabled",false);
        $('#p13b-c').prop("disabled",false);
        $('#mg13b-a').prop("disabled",false);
        $('#mg13b-b').prop("disabled",false);
        $('#mg13b-c').prop("disabled",false);
        $('#ps13b-a').prop("disabled",false);
        $('#ps13b-b').prop("disabled",false);
        $('#ps13b-c').prop("disabled",false);

        $('#furca13').css("display","block");
        $('#furca13-a').css("display","block");
        $('#furca13-b').css("display","block");
        $('#ae13').prop("disabled",false);
        $('#pi13').prop("disabled",false);

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
$('#i13').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f13').css({"background":"#FFFFFF"});
        $('#diente13-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl13.png') }}')");
        $('#diente13-a').css("background-position","1px -2px");
        $('#diente13-a').css("background-repeat","no-repeat");

        $('#diente13b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-13b.png') }}')");
        $('#diente13b-a').css("background-position","0 23px");
        $('#diente13b-a').css("background-repeat","no-repeat");

        $('#furca13').css("background","none");
        $('#furca13-a').css("background","none");
        $('#furca13-b').css("background","none");
        $('#f13').css("background","none");
        $('#f13b-a').css("background","none");
        $('#f13b-b').css("background","none");

        $("#f13").attr("id","f13desact");
        $("#f13b-a").attr("id","f13b-adesact");
        $("#f13b-b").attr("id","f13b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente13-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png') }}')");
        $('#diente13-a').css("background-position","0 -2px");
        $('#diente13-a').css("background-repeat","no-repeat");

        $('#diente13b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-13b.png') }}')");
        $('#diente13b-a').css("background-position","0 23px");
        $('#diente13b-a').css("background-repeat","no-repeat");

        $('#f13').css("background","#FFFFFF");
        $('#f13b-a').css("background","#FFFFFF");
        $('#f13b-b').css("background","#FFFFFF");

        $("#f13desact").attr("id","f13");
        $("#f13b-adesact").attr("id","f13b-a");
        $("#f13b-bdesact").attr("id","f13b-b");
        $('#d13').trigger('click');
    }
);

//FURCA
$('#f13').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i13').css({"background":"#FFFFFF"});
        $('#furca13').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca13').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca13').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca13').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f13b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca13-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca13-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca13-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca13-a').css("background","none");
    }
);
$('#f13b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca13-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca13-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca13-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca13-b').css("background","none");
    }
);




</script>









