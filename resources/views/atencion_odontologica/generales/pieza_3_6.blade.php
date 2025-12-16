  {{--  </head>  --}}
  <style>
    #i36{
    background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente36-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla6/periodontograma-dientes-arriba-36.png') }}');
        width:74px;
        background-position: 0 -2px;
        background-repeat: no-repeat;
    }


    #i36b{
        background: url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center;
        width: 100%;
        height:18px;
    }
    #diente36b-a{
        margin:auto;
        background: url('{{ asset('images/dental/periodontograma/img/tabla8/periodontograma-dientes-abajo-36b.png') }}');
        width:74px;
        background-position: 0 23px;
        background-repeat: no-repeat;
    }
    #d36,#i36,#i36b,#f36,,#ae36-a,#ae36-b:hover{
        background: #E6E6E6;
    }
    #i36-implante{
        display:none;
        background: #000000;
        width: 8px;
        height:8px;
        margin: -12px 20px;
        position: absolute;
        cursor: pointer;
    }
    #f36{
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
    #pi36{
        width: 100%;
    }
    #furca36-a,#furca36-b{
        width: 18px;
        height: 18px;
        position: absolute;
    }
    #furca36-a{
        margin-top: 80px;
    }
    #furca36-b{
        margin-top: 80px;
        margin-left: 168px;
    }

    .f36,{
        width: 100%;
        height: 28px;
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
    $pieza36 = $piezas_periodonto->firstWhere('pieza', '36');
    $cuerpo36 = $pieza36 ? $pieza36->cuerpo : [];
    $pronostico36 = $cuerpo36['pronostico'] ?? '';
@endphp
<div class="col-md-12 bg-white shadow-sm rounded mx-1">
    <div class="col-md-12">
        <div class="row">

            <div style="display:none">
                <img src="{{ asset('images/dental/periodontograma/img/cuadrado.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/lleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/mediolleno.png') }}"/>
                <img src="{{ asset('images/dental/periodontograma/img/vacio.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/implante/impl36.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau36.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-36b.png') }}"/>

                <img src="{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-36b.png') }}"/>
            </div>
        </div>

    </div>
</div>

<!--LADO IZQ-->
<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Vestibular (3.6)</h5>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-md-4">
                            <form name ="grafico1" id="grafico1" action="#">
                                <table id="tabla" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <!-- <td class="titulo" style="color:#565A5D">Vestibular</td>-->
                                            <td colspan="2" class="noborde formulario" style="position: relative;" >
                                            <div id="lineas-gr"></div>

                                            <div id="visualization36a" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                            <div id="diente36-a"><div id="furca36"></div></div>
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
                                        <div class="py-2 border bg-c-blue input-dental rounded pointer"  id="d36">Diente ausente</div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 my-2">
                                         <div class="form-group">
                                            <label class="floating-label-activo-sm"></label>
                                            <div class="py-2 border input-dental rounded" id="i36">Marcar Implante</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Movilidad</label>
                                            <input  class="form-control form-control-xs"  type="number"  id="m36" name="m36" value="{{ $cuerpo36["movilidad"] ?? 0 }}" tabindex="1" onchange="rangoNumero('m36');"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Pronóstico</label>
                                            <select class="form-control form-control-xs" name="pi36" id="pi36">
                                                    <option value="B" {{ $pronostico36 == 'B' ? 'selected' : '' }}>Buen pronóstico</option>
                                                    <option value="D" {{ $pronostico36 == 'D' ? 'selected' : '' }}>Dudoso</option>
                                                    <option value="M" {{ $pronostico36 == 'M' ? 'selected' : '' }}>Reservado</option>
                                                    <option value="I" {{ $pronostico36 == 'I' ? 'selected' : '' }}>Mal pronóstico</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <div class="form-group">
                                            <label class="floating-label-activo-sm">Furca</label>
                                            <div class="border rounded input-dental pointer w-100" id="f36"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s36-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s36-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental" id="s36-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer pointer rounded-pill border-warning input-dental " id="su36-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su36-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-warning input-dental " id="su36-c"></div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p36-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p36-b"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill borde-celeste input-dental " id="p36-c"></div>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Plataforma</h6>
                                    </div>
                                    <div class="col-sm-12 col-md-8">
                                        <input class="form-control form-control-xs" type="number" id="ae36" name="ae36" value="{{ $cuerpo36["plataforma"] ?? 0 }}" tabindex="33"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg36-a" name="mg36-a" value="{{ $cuerpo36["vest_altura_mg_a"] ?? 0 }}" onchange="cargar36a();getDefectos();rangoNumeroMargen('mg36-a');cargar36a();" tabindex="49"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg36-b" name="mg36-b" value="{{ $cuerpo36["vest_altura_mg_b"] ?? 0 }}" onchange="cargar36a();getDefectos();rangoNumeroMargen('mg36-b');cargar36a();" tabindex="50"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="mg36-c" name="mg36-c" value="{{ $cuerpo36["vest_altura_mg_c"] ?? 0 }}" onchange="cargar36a();getDefectos();rangoNumeroMargen('mg36-c');cargar36a();" tabindex="50"/>
                                    </div>
                                </div>
                                <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">P.Sondaje</h6>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps36-a" name="ps36-a" value="{{ $cuerpo36["vest_psondaje_a"] ?? 0 }}" onchange="cargar36a();getDefectos();" tabindex="97"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps36-b" name="ps36-b" value="{{ $cuerpo36["vest_psondaje_b"] ?? 0 }}" onchange="cargar36a();getDefectos();" tabindex="98"/>
                                    </div>
                                    <div class="col">
                                        <input class="form-control form-control-xs" type="number" id="ps36-c" name="ps36-c" value="{{ $cuerpo36["vest_psondaje_c"] ?? 0 }}" onchange="cargar36a();getDefectos();" tabindex="99"/>
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
            <h5 class="text-c-blue f-20 text-center font-weight-bold mb-2">Palatino (3.6)</h5>
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
                                                    <div id="visualization36b" style="width: 40px; height: 160px; position: absolute; margin: auto !important; left: 50%; transform: translateX(-50%);"></div>
                                                    <div id="diente36b-a">
                                                        <div id="furca36-a"></div>
                                                        <div id="furca36-b"></div>
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
                                    <input class="form-control form-control-xs" type="number" id="ps36b-a" name="ps36b-a" value="{{ $cuerpo36["pala_psondaje_a"] ?? 0 }}" onchange="cargar36b();getDefectos();" tabindex="145"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps36b-b" name="ps36b-b" value="{{ $cuerpo36["pala_psondaje_b"] ?? 0 }}" onchange="cargar36b();getDefectos();" tabindex="146"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="ps36b-c" name="ps36b-c" value="{{ $cuerpo36["pala_psondaje_c"] ?? 0 }}" onchange="cargar36b();getDefectos();" tabindex="147"//>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Altura MG</h6>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg36b-a" name="mg36b-a" value="{{ $cuerpo36["pala_altura_mg_a"] ?? 0 }}" onchange="cargar36b();getDefectos();rangoNumeroMargen('mg36b-a');cargar36b();" tabindex="193"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg36b-b" name="mg36b-b" value="{{ $cuerpo36["pala_altura_mg_b"] ?? 0 }}" onchange="cargar36b();getDefectos();rangoNumeroMargen('mg36b-b');cargar36b();" tabindex="194"/>
                                </div>
                                <div class="col">
                                    <input class="form-control form-control-xs" type="number" id="mg36b-c" name="mg36b-c" value="{{ $cuerpo36["pala_altura_mg_c"] ?? 0 }}" onchange="cargar36b();getDefectos();rangoNumeroMargen('mg36b-c');cargar36b();" tabindex="195"/>
                                </div>
                            </div>
                             <div class="form-row mb-2">
                                    <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Sangrado</h6>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s36b-a"></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s36b-b" ></div>
                                    </div>
                                    <div class="col">
                                        <div class="border py-2 pointer rounded-pill border-danger input-dental w-100" id="s36b-c"></div>
                                    </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Supuración</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su36b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su36b-b" ></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill border-warning input-dental" id="su36b-c"></div>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-sm-12 col-md-4">
                                    <h6 class="font-weight-bold text-c-blue pt-2">Higiene</h6>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p36b-a"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p36b-b"></div>
                                </div>
                                <div class="col">
                                    <div class="border py-2 pointer rounded-pill borde-celeste input-dental w-100" id="p36b-c"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-12 col-md-4">
                                        <h6 class="font-weight-bold text-c-blue pt-2">Furca</h6>
                                </div>
                                <div class="col-sm-12 col-md-8">
                                    <div class="border rounded input-dental pointer w-100" id="f36b-a"></div>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group" id="obs_pieza3.6">
                        <label class="floating-label-activo-sm">Obs. Pieza 3.6</label>
                        <textarea class="form-control caja-texto form-control-sm" data-titulo="Obs Pieza 3.6" data-seccion="Eval_periimplantar"  rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="obs_36" id="obs_36" placeholder="Describa observaciones">{{ $cuerpo36["observaciones"] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
    <div id="obs_pieza3.6">
            <button type="button" class="btn btn-info text-center" onclick="guardar_pieza('36')"><i class="feather icon-save"></i>  Guardar evaluación 3.6</button>
    </div>
</div>

<script>

$(document).ready(function() {
    // Handler for .ready() called.
    //anchuraValor();
    cargar36a();
    cargar36b();

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

function drawVisualization36a(data36a) {
    // Create and draw the visualization.
    var ac36a = new google.visualization.AreaChart(document.getElementById('visualization36a'));
    ac36a.draw(data36a, {
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

    $('#visualization36a iframe').attr('allowTransparency', 'true');
    $('#visualization36a iframe').contents().find('body').css('background', 'transparent');

}

function cargar36a(){

    var datoae36=document.getElementById('ae36').value;

    var datomg36a=document.getElementById('mg36-a').value;
    var datomg36b=document.getElementById('mg36-b').value;
    var datomg36c=document.getElementById('mg36-c').value;

    var datops36a=document.getElementById('ps36-a').value;
    var datops36b=document.getElementById('ps36-b').value;
    var datops36c=document.getElementById('ps36-c').value;

    //alert(document.getElementById('ps36-a').value);

    if(datops36a>3){
        document.getElementById('ps36-a').style.color="red";
    }else{
        document.getElementById('ps36-a').style.color="black";
    }
    if(datops36b>3){
        document.getElementById('ps36-b').style.color="red";
    }else{
        document.getElementById('ps36-b').style.color="black";
    }
    if(datops36c>3){
        document.getElementById('ps36-c').style.color="red";
    }else{
        document.getElementById('ps36-c').style.color="black";
    }


    var data36a=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje','Plataforma'],
        ['',    0+(parseInt(datomg36a)+parseInt(datops36a)),      0-parseInt(datops36a), parseInt(datoae36)],
        ['',    0+(parseInt(datomg36b)+parseInt(datops36b)),      0-parseInt(datops36b), parseInt(datoae36)],
        ['',    0+(parseInt(datomg36c)+parseInt(datops36c)),      0-parseInt(datops36c), parseInt(datoae36)]
    ]);

    drawVisualization36a(data36a);

}

function drawVisualization36b(data36b) {

    // Create and draw the visualization.
    var ac36b = new google.visualization.AreaChart(document.getElementById('visualization36b'));
    ac36b.draw(data36b, {
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
    $('#visualization36b iframe').attr('allowTransparency', 'true');
    $('#visualization36b iframe').contents().find('body').css('background', 'transparent');
}

function cargar36b(){

    var datomg36ba=document.getElementById('mg36b-a').value;
    var datomg36bb=document.getElementById('mg36b-b').value;
    var datomg36bc=document.getElementById('mg36b-c').value;

    var datops36ba=document.getElementById('ps36b-a').value;
    var datops36bb=document.getElementById('ps36b-b').value;
    var datops36bc=document.getElementById('ps36b-c').value;

    if(datops36ba>3){
        document.getElementById('ps36b-a').style.color="red";
    }else{
        document.getElementById('ps36b-a').style.color="black";
    }
    if(datops36bb>3){
        document.getElementById('ps36b-b').style.color="red";
    }else{
        document.getElementById('ps36b-b').style.color="black";
    }
    if(datops36bc>3){
        document.getElementById('ps36b-c').style.color="red";
    }else{
        document.getElementById('ps36b-c').style.color="black";
    }

    var data36b=google.visualization.arrayToDataTable([
        ['',   'Margen Gingival', 'Profundidad de sondaje'],
        ['',    0-(parseInt(datomg36ba)+parseInt(datops36ba)),      0+parseInt(datops36ba)],
        ['',    0-(parseInt(datomg36bb)+parseInt(datops36bb)),      0+parseInt(datops36bb)],
        ['',    0-(parseInt(datomg36bc)+parseInt(datops36bc)),      0+parseInt(datops36bc)]
    ]);

    drawVisualization36b(data36b);

}

arrstyle = ["i36","f36","f36b-a","f36b-b","s36-a","s36-b","s36-c","p36-a","p36-b","p36-c","s36b-a","s36b-b","s36b-c","p36b-a","p36b-b","p36b-c"];

//FUNCIONES PARA ANCHURA ENCÍA
$('#ae36').change(function() {
    if(parseInt(document.getElementById('ae36').value)<3){
        $(this).css("color","red");
    }else{
        $(this).css("color","black");
    }
    cargar36a();
});

//FUNCIONES PARA SANGRADO
$('#s36-a').toggle(
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
$('#s36-b').toggle(
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
$('#s36-c').toggle(
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

$('#s36b-a').toggle(
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
$('#s36b-b').toggle(
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
$('#s36b-c').toggle(
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
$('#su36-a').toggle(
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
$('#su36-b').toggle(
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
$('#su36-c').toggle(
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

$('#su36b-a').toggle(
    function () {
        $(this).css({"background":"#f3e836"});
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
$('#su36b-b').toggle(
    function () {
        $(this).css({"background":"#f3e836"});
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
$('#su36b-c').toggle(
    function () {
        $(this).css({"background":"#f3e836"});
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
$('#p36-a').toggle(
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
$('#p36-b').toggle(
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
$('#p36-c').toggle(
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
$('#p36b-a').toggle(
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
$('#p36b-b').toggle(
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
$('#p36b-c').toggle(
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
$('#d36').toggle(
    function () {
        $('#diente36-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/diente-ausente/dau36.png') }}')");
        $('#diente36-a').css("background-position","1px -2px");
        $('#diente36-a').css("background-repeat","no-repeat");
        $('#m36').prop('disabled', true); // Deshabilita el input con id 'm36'
        $('#i36').prop("disabled",true);
        $('#f36').prop("disabled",true);
        $('#s36-a').prop("disabled",true);
        $('#s36-b').prop("disabled",true);
        $('#s36-c').prop("disabled",true);
        $('#p36-a').prop("disabled",true);
        $('#p36-b').prop("disabled",true);
        $('#p36-c').prop("disabled",true);
        $('#mg36-a').prop("disabled",true);
        $('#mg36-b').prop("disabled",true);
        $('#mg36-c').prop("disabled",true);
        $('#ps36-a').prop("disabled",true);
        $('#ps36-b').prop("disabled",true);
        $('#ps36-c').prop("disabled",true);
        /*$('#furca36').css("background","none");*/
        $('#mg36-a').val('0');
        $('#mg36-b').val('0');
        $('#mg36-c').val('0');
        $('#ps36-a').val('0');
        $('#ps36-b').val('0');
        $('#ps36-c').val('0');

        $('#diente36b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-36b.png') }}')");
        $('#diente36b-a').css("background-position","0 23px");
        $('#diente36b-a').css("background-repeat","no-repeat");
        $('#m36b').prop("disabled",true);
        $('#i36b').prop("disabled",true);
        $('#f36b-a').prop("disabled",true);
        $('#f36b-b').prop("disabled",true);
        $('#s36b-a').prop("disabled",true);
        $('#s36b-b').prop("disabled",true);
        $('#s36b-c').prop("disabled",true);
        $('#p36b-a').prop("disabled",true);
        $('#p36b-b').prop("disabled",true);
        $('#p36b-c').prop("disabled",true);
        $('#mg36b-a').prop("disabled",true);
        $('#mg36b-b').prop("disabled",true);
        $('#mg36b-c').prop("disabled",true);
        $('#ps36b-a').prop("disabled",true);
        $('#ps36b-b').prop("disabled",true);
        $('#ps36b-c').prop("disabled",true);
        $('#mg36b-a').val('0');
        $('#mg36b-b').val('0');
        $('#mg36b-c').val('0');
        $('#ps36b-a').val('0');
        $('#ps36b-b').val('0');
        $('#ps36b-c').val('0');

        $('#furca36').prop("disabled",true);
        $('#furca36-a').prop("disabled",true);
        $('#furca36-b').prop("disabled",true);
        $('#ae36').prop("disabled",true);
        $('#pi36').prop("disabled",true);

        totalDientes--;
        getDefectos();
        cargar36a();
        cargar36b();

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
        $('#diente36-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-36.png') }}')");
        $('#diente36-a').css("background-position","0 -2px");
        $('#diente36-a').css("background-repeat","no-repeat");
        $('#m36').prop("disabled",false);
        $('#i36').prop("disabled",false);
        $('#f36').prop("disabled",false);
        $('#s36-a').prop("disabled",false);
        $('#s36-b').prop("disabled",false);
        $('#s36-c').prop("disabled",false);
        $('#p36-a').prop("disabled",false);
        $('#p36-b').prop("disabled",false);
        $('#p36-c').prop("disabled",false);
        $('#mg36-a').prop("disabled",false);
        $('#mg36-b').prop("disabled",false);
        $('#mg36-c').prop("disabled",false);
        $('#ps36-a').prop("disabled",false);
        $('#ps36-b').prop("disabled",false);
        $('#ps36-c').prop("disabled",false);

        $('#diente36b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-abajo-36b.png') }}')");
        $('#diente36b-a').css("background-position","0 23px");
        $('#diente36b-a').css("background-repeat","no-repeat");
        $('#m36b').prop("disabled",false);
        $('#i36b').prop("disabled",false);
        $('#f36b-a').prop("disabled",false);
        $('#f36b-b').prop("disabled",false);
        $('#s36b-a').prop("disabled",false);
        $('#s36b-b').prop("disabled",false);
        $('#s36b-c').prop("disabled",false);
        $('#p36b-a').prop("disabled",false);
        $('#p36b-b').prop("disabled",false);
        $('#p36b-c').prop("disabled",false);
        $('#mg36b-a').prop("disabled",false);
        $('#mg36b-b').prop("disabled",false);
        $('#mg36b-c').prop("disabled",false);
        $('#ps36b-a').prop("disabled",false);
        $('#ps36b-b').prop("disabled",false);
        $('#ps36b-c').prop("disabled",false);

        $('#furca36').css("display","block");
        $('#furca36-a').css("display","block");
        $('#furca36-b').css("display","block");
        $('#ae36').prop("disabled",false);
        $('#pi36').prop("disabled",false);

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
$('#i36').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/cuadrado.png') }}') no-repeat center"});
        $('#f36').css({"background":"#FFFFFF"});
        $('#diente36-a').css("background","url('{{ asset('images/dental/periodontograma/img/dientes/implante/impl36.png') }}')");
        $('#diente36-a').css("background-position","0px -2px");
        $('#diente36-a').css("background-repeat","no-repeat");

        $('#diente36b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-36b.png') }}')");
        $('#diente36b-a').css("background-position","0 23px");
        $('#diente36b-a').css("background-repeat","no-repeat");

        $('#furca36').css("background","none");
        $('#furca36-a').css("background","none");
        $('#furca36-b').css("background","none");
        $('#f36').css("background","none");
        $('#f36b-a').css("background","none");
        $('#f36b-b').css("background","none");

        $("#f36").attr("id","f36desact");
        $("#f36b-a").attr("id","f36b-adesact");
        $("#f36b-b").attr("id","f36b-bdesact");

    },
    function () {
        $(this).css({"background":" url('{{ asset('images/dental/periodontograma/img/periodontograma-oblicuas.png') }}') repeat-x center"});
        $('#diente36-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla1/periodontograma-dientes-arriba-36.png') }}')");
        $('#diente36-a').css("background-position","0 -2px");
        $('#diente36-a').css("background-repeat","no-repeat");

        $('#diente36b-a').css("background","url('{{ asset('images/dental/periodontograma/img/tabla3/periodontograma-dientes-arriba-36b.png') }}')");
        $('#diente36b-a').css("background-position","0 23px");
        $('#diente36b-a').css("background-repeat","no-repeat");

        $('#f36').css("background","#FFFFFF");
        $('#f36b-a').css("background","#FFFFFF");
        $('#f36b-b').css("background","#FFFFFF");

        $("#f36desact").attr("id","f36");
        $("#f36b-adesact").attr("id","f36b-a");
        $("#f36b-bdesact").attr("id","f36b-b");
        $('#d36').trigger('click');
    }
);

//FURCA
$('#f36').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#i36').css({"background":"#FFFFFF"});
        $('#furca36').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {

        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca36').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca36').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca36').css("background","none");
    }
);

//FURCAS TABLA 3
$('#f36b-a').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca36-a').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca36-a').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca36-a').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca36-a').css("background","none");
    }
);
$('#f36b-b').toggle(
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/vacio.png') }}') no-repeat center"});
        $('#furca36-b').css("background","url('{{ asset('images/dental/periodontograma/img/vacio.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}') no-repeat center"});
        $('#furca36-b').css("background","url('{{ asset('images/dental/periodontograma/img/mediolleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF url('{{ asset('images/dental/periodontograma/img/lleno.png') }}') no-repeat center"});
        $('#furca36-b').css("background","url('{{ asset('images/dental/periodontograma/img/lleno.png') }}')");
    },
    function () {
        $(this).css({"background":"#FFFFFF"});
        $('#furca36-b').css("background","none");
    }
);




</script>
