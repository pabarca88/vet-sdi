<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
                <ul class="nav nav-tabs-secciones mb-3 mt-3" id="oft" role="tablist">
                    <li class="nav-item-secciones">
                        <a class="nav-secciones active text-uppercase" id="audiometria-tab" data-toggle="tab" href="#audiometria" role="tab" aria-controls="audiometria" aria-selected="true">AUDIOMETRÍA</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones  text-uppercase" id="impedancio-tab" data-toggle="tab" href="#impedancio" role="tab" aria-controls="impedancio" aria-selected="true">IMPEDANCIOMETRÍA</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="ocho_par-tab" data-toggle="tab" href="#ocho_par" role="tab" aria-controls="ocho_par" aria-selected="false">EXAMEN FUNCIONAL 8° PAR</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="emisiones-tab" data-toggle="tab" href="#emisiones" role="tab" aria-controls="emisiones" aria-selected="false">EMISIONES OTOACÚSTICAS</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="h_control-tab" data-toggle="tab" href="#h_control" role="tab" aria-controls="h_control" aria-selected="false">EJERCICIOS DE REHABILITACIÓN VESTIBULAR</a>
                    </li>
                    <li class="nav-item-secciones">
                        <a class="nav-secciones text-uppercase" id="h_control-tab" data-toggle="tab" href="#h_control" role="tab" aria-controls="h_control" aria-selected="false">RINOMANOMETRÍA</a>
                    </li>

                </ul>
            </div>
            <div class="tab-content" id="tecn_orl_contenido">
                <div class="tab-pane fade show active" id="audiometria" role="tabpanel" aria-labelledby="audiometria-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12" style="height: 100%;overflow:scroll;">
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">AUDIOMETRÍA</h6>
                                    <hr>
                                </div>
                            </div>
                            <!--FORMULARIOS-->
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <!--Formulario / Menor de edad-->
                                    @include('atencion_medica.generales.seccion_menor')
                                    <!--Cierre: Formulario / Menor de edad-->
                                    <!--Motivo consulta-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">

                                            <div id="motivo_c" >
                                                <div class="#">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12" id="">
                                                            <label class="floating-label-activo-sm">Gráfica</label>
                                                            <div class="form-group">
                                                                <div id="chart1" class="chart1" style="width:1158px;height:350px;border:1px solid #c0c0c0;margin-bottom:35px" >
                                                                    <table style="width:100%";>
                                                                        <tr>
                                                                            <td style="width:20%" > </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="chart2" style="width:1158px;height:350px;border:1px solid #c0c0c0;margin-bottom:35px">
                                                                        <table style="width:100%">
                                                                            <tr>
                                                                                <td  class="disc">
                                                                                    <table class="pad_caj" >
                                                                                        <tr>
                                                                                            <td class="td_subtit" colspan="6" style="padding:10px">Discriminación OD</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x" colspan="3">Monosilabos</td>
                                                                                            <td class="dhx_axis_title_x" colspan="3">Disilabos</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x" colspan="2"style="padding:5px">%</td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">INT</td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">ENM</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcd%_od2" class="impWidh" name="txtcd%_od2" type="text" value="0"  /></td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcdI_od2" class="impWidh" name="txtcdI_od2" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x" colspan="2" style="padding:10px">
                                                                                                <input id="txtcdE_od2" class="impWidh" name="txtcdE_od2" type="text" value="0" /></td>
                                                                                            </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcd%_od3" class="impWidh" name="txtcd%_od3" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcdI_od3" class="impWidh" name="txtcdI_od3" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcdE_od3" class="impWidh" name="txtcdE_od3" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                                                                                            <td class="dhx_axis_title_x" colspan="3">
                                                                                                <input id="txtcM_od0" class="impWidh" name="txtcM_od0" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td  class="disc">
                                                                                    <table class="tab_disc1">
                                                                                            <tr>
                                                                                                    <td class="td_subtit" colspan="6" style="padding:10px">Discriminación OI</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x" colspan="3">Monosilabos</td>
                                                                                                <td class="dhx_axis_title_x" colspan="3">Disilabos</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x" colspan="2" style="padding:5px">%</td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">INT</td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">ENM</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcd%_oi2" class="impWidhOI" name="txtcd%_oi2" type="text" value="0" /></td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcdI_oi2" class="impWidhOI" name="txtcdI_oi2" type="text" value="0" /></td>
                                                                                                <td class="dhx_axis_title_x" colspan="2" style="padding:10px">
                                                                                                    <input id="txtcdE_oi2" class="impWidhOI" name="txtcdE_oi2" type="text" value="0" /></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcd%_oi3" class="impWidhOI" name="txtcd%_oi3" type="text" value="0" /></td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcdI_oi3" class="impWidhOI" name="txtcdI_oi3" type="text" value="0" /></td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcdE_oi3" class="impWidhOI" name="txtcdE_oi3" type="text" value="0" /></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x" colspan="3" style="font-size: x-small">P DE MARX</td>
                                                                                                <td class="dhx_axis_title_x" colspan="3">
                                                                                                    <input id="txtcM_oi0" class="impWidhOI" name="txtcM_oi0" type="text" value="0" /></td>
                                                                                            </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td class="ptp ">
                                                                                    <table class="pad_caj1">
                                                                                            <tr>
                                                                                                <td class="td_subtit">&nbsp;</td>
                                                                                                <td class="td_subtit" colspan="3">PTP </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x">&nbsp;</td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">Aerea</td>
                                                                                                <td class="dhx_axis_title_x">Osea</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="dhx_axis_title_x">OD
                                                                                                </td>
                                                                                                <td class="dhx_axis_title_x">
                                                                                                    <input id="txtcdptp_od" class="impWidh" name="txtcdptp_od" type="text" value="0" />
                                                                                                </td>
                                                                                                <td class="dhx_axis_title_x" colspan="2">
                                                                                                    <input id="txtcdptp_odo" class="impWidh" name="txtcdptp_odo" type="text" value="0" /></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td class="txt_ptp">OI
                                                                                                </td>
                                                                                                <td class="txt_ptp">
                                                                                                    <input id="txtcdptp_oi" class="impWidhOI" name="txtcd%_od3" type="text" value="0" />
                                                                                                </td>
                                                                                                <td class="txt_ptp" colspan="2">
                                                                                                    <input id="txtcdptp_oii" class="impWidhOI" name="txtcdptp_oii" type="text" value="0" />
                                                                                                </td>
                                                                                            </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td class="toned">
                                                                                    <table style="border: 1px solid #666666; width:80%;margin-left:20px;margin-top:20px;margin-right:15px">
                                                                                        <tr>
                                                                                            <td class="td_subtit" colspan="7">Deterioro Tonal</td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">&nbsp;</td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">500</td>
                                                                                            <td class="dhx_axis_title_x">1000</td>
                                                                                            <td class="dhx_axis_title_x">2000</td>
                                                                                            <td class="dhx_axis_title_x">3000</td>
                                                                                            <td class="dhx_axis_title_x">4000</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                OD</td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcdt_od2" class="impWidh" name="txtcdt_od2" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdt_od3" class="impWidh" name="txtcdt_od3" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdt_od4" class="impWidh" name="txtcdt_od4" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdt_od5" class="impWidh" name="txtcdt_od5" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdt_od6" class="impWidh" name="txtcdt_od6" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                OI</td>
                                                                                            <td class="dhx_axis_title_x" colspan="2">
                                                                                                <input id="txtcdI_oi7" class="impWidhOI" name="txtcdI_oi7" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdI_oi8" class="impWidhOI" name="txtcdI_oi8" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdI_oi9" class="impWidhOI" name="txtcdI_oi9" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdI_oi10" class="impWidhOI" name="txtcdI_oi10" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                                <input id="txtcdI_oi11" class="impWidhOI" name="txtcdI_oi11" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2" rowspan="2">
                                                                                    <table class="diapa" >
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">&nbsp;</td>
                                                                                            <td class="dhx_axis_title_x">125</td>
                                                                                            <td class="dhx_axis_title_x">250</td>
                                                                                            <td class="dhx_axis_title_x">500</td>
                                                                                            <td class="dhx_axis_title_x">1000</td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">Weber
                                                                                            </td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcdI_oi4" class="impWidh" name="txtcdI_oi4" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcdE_oi4" class="impWidh" name="txtcdE_oi4" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcd%_oi10" class="impWidh" name="txtcd%_oi10" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcd%_oi11" class="impWidh" name="txtcd%_oi11" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">Rinne
                                                                                            </td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcdI_oi5" class="impWidhOI" name="txtcdI_oi5" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcdE_oi5" class="impWidhOI" name="txtcdE_oi5" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcd%_oi13" class="impWidhOI" name="txtcd%_oi13" type="text" value="0" /></td>
                                                                                            <td class="dhx_axis_title_x">
                                                                                            <input id="txtcd%_oi14" class="impWidhOI" name="txtcd%_oi14" type="text" value="0" /></td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                                <td class="" colspan="2">
                                                                                    <table style="width:100%">
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">Observaciones
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                            <input id="txtcobs" class="txt_obs" name="txtcobs" type="text" value="Ingrese observaciones" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td colspan="2">
                                                                                    <table style="width:100%;margin-bottom:15px">
                                                                                        <tr>
                                                                                            <td class="dhx_axis_title_x">Examinador
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                            <input id="txtcex" class="txt_obs" name="txtcoex" type="text" value="Autocomplete" />
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                        <table style="width:1158px;;margin-left:15px;margin-top:35px;">
                                                                            <tr>
                                                                                <td>
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td style="width:100%">
                                                                                                <table style="width:1158px;margin-left:15px;margin-top:15px;">

                                                                                                    <tr>
                                                                                                        <td colspan="2" class="tit">Osea</td> <td colspan="2" class="tit">Aérea</td>
                                                                                                        <td class="#" rowspan="9" ><input type="button" onclick="actualiza_datos();" value="Mostrar Gráfico" class="btn  btn-primary" style="background-color: #4680FF; color: #E1E1E1" /></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD1" >125<input type="text" id="txtc1" name="txtc1" value="" class="impWidh" /></td>
                                                                                                        <td class="subtitOI1" >125<input type="text" id="txtc9" name="txtc9" value="" class="impWidhOI" /></td>
                                                                                                        <td class="subtitOD1" >125<input type="text" id="txtc17" name="txtc17" value="" class="impWidh" /></td>
                                                                                                        <td class="subtitOI1" >125<input type="text" id="txtc25" name="txtc25" value="" class="impWidhOI" /></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD1" >250<input type="text" id="txtc2" name="txtc2" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI1" >250<input type="text" id="txtc10" name="txtc10" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD1" >250<input type="text" id="txtc18" name="txtc18" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI1" >250<input type="text" id="txtc26" name="txtc26" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD1">500<input type="text" id="txtc3" name="txtc3" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI1">500<input type="text" id="txtc11" name="txtc11" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD1">500<input type="text" id="txtc19" name="txtc19" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI1">500<input type="text" id="txtc27" name="txtc27" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD" >1000<input type="text" id="txtc4" name="txtc4" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >1000<input type="text" id="txtc12" name="txtc12" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD" >1000<input type="text" id="txtc20" name="txtc20" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >1000<input type="text" id="txtc28" name="txtc28" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD" >2000<input type="text" id="txtc5" name="txtc5" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >2000<input type="text" id="txtc13" name="txtc13" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD" >2000<input type="text" id="txtc21" name="txtc21" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >2000<input type="text" id="txtc29" name="txtc29" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD" >3000<input type="text" id="txtc6" name="txtc6" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >3000<input type="text" id="txtc14" name="txtc14" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD" >3000<input type="text" id="txtc22" name="txtc22" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >3000<input type="text" id="txtc30" name="txtc30" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD" >4000<input type="text" id="txtc7" name="txtc7" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >4000<input type="text" id="txtc15" name="txtc15" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD" >4000<input type="text" id="txtc23" name="txtc23" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >4000<input type="text" id="txtc31" name="txtc31" value="" class="impWidhOI"/></td>
                                                                                                        </tr>
                                                                                                    <tr>
                                                                                                        <td class="subtitOD" >6000<input type="text" id="txtc8" name="txtc8" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >6000<input type="text" id="txtc16" name="txtc16" value="" class="impWidhOI"/></td>
                                                                                                        <td class="subtitOD" >6000<input type="text" id="txtc24" name="txtc24" value="" class="impWidh"/></td>
                                                                                                        <td class="subtitOI" >6000<input type="text" id="txtc32" name="txtc32" value="" class="impWidhOI"/></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="4" style="text-align:center">&nbsp;</td>
                                                                                                        <td style="text-align:center">&nbsp;</td>
                                                                                                    </tr>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        actualiza_datos = function ()
                                        {
                                            multiple_dataset[0]["oseaOD"] = document.getElementById("txtc1").value *-1;
                                            multiple_dataset[1]["oseaOD"] = document.getElementById("txtc2").value*-1;
                                            multiple_dataset[2]["oseaOD"] = document.getElementById("txtc3").value*-1;
                                            multiple_dataset[3]["oseaOD"] = document.getElementById("txtc4").value*-1;
                                            multiple_dataset[4]["oseaOD"] = document.getElementById("txtc5").value*-1;
                                            multiple_dataset[5]["oseaOD"] = document.getElementById("txtc6").value*-1;
                                            multiple_dataset[6]["oseaOD"] = document.getElementById("txtc7").value*-1;
                                            multiple_dataset[7]["oseaOD"] = document.getElementById("txtc8").value*-1;
                                            multiple_dataset[0]["oseaOI"] = document.getElementById("txtc9").value*-1;
                                            multiple_dataset[1]["oseaOI"] = document.getElementById("txtc10").value*-1;
                                            multiple_dataset[2]["oseaOI"] = document.getElementById("txtc11").value*-1;
                                            multiple_dataset[3]["oseaOI"] = document.getElementById("txtc12").value*-1;
                                            multiple_dataset[4]["oseaOI"] = document.getElementById("txtc13").value*-1;
                                            multiple_dataset[5]["oseaOI"] = document.getElementById("txtc14").value*-1;
                                            multiple_dataset[6]["oseaOI"] = document.getElementById("txtc15").value*-1;
                                            multiple_dataset[7]["oseaOI"] = document.getElementById("txtc16").value*-1;
                                            multiple_dataset[0]["aereaOD"] = document.getElementById("txtc17").value*-1;
                                            multiple_dataset[1]["aereaOD"] = document.getElementById("txtc18").value*-1;
                                            multiple_dataset[2]["aereaOD"] = document.getElementById("txtc19").value*-1;
                                            multiple_dataset[3]["aereaOD"] = document.getElementById("txtc20").value*-1;
                                            multiple_dataset[4]["aereaOD"] = document.getElementById("txtc21").value*-1;
                                            multiple_dataset[5]["aereaOD"] = document.getElementById("txtc22").value*-1;
                                            multiple_dataset[6]["aereaOD"] = document.getElementById("txtc23").value*-1;
                                            multiple_dataset[7]["aereaOD"] = document.getElementById("txtc24").value*-1;
                                            multiple_dataset[0]["aereaOI"] = document.getElementById("txtc25").value*-1;
                                            multiple_dataset[1]["aereaOI"] = document.getElementById("txtc26").value*-1;
                                            multiple_dataset[2]["aereaOI"] = document.getElementById("txtc27").value*-1;
                                            multiple_dataset[3]["aereaOI"] = document.getElementById("txtc28").value*-1;
                                            multiple_dataset[4]["aereaOI"] = document.getElementById("txtc29").value*-1;
                                            multiple_dataset[5]["aereaOI"] = document.getElementById("txtc30").value*-1;
                                            multiple_dataset[6]["aereaOI"] = document.getElementById("txtc31").value*-1;
                                            multiple_dataset[7]["aereaOI"] = document.getElementById("txtc32").value*-1;
                                            document.getElementById("chart1").innerHTML = "";
                                            doOnLoad();
                                        }


                                        var multiple_dataset = [
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "125" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "250" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "500" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "1000" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "2000" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "3000" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "4000" },
                                            { oseaOD: "0", aereaOD: "0", oseaOI: "0", aereaOI: "0", frecuencia: "6000" }
                                        ];
                                        var myLineChart;
                                        function doOnLoad() {
                                                                myLineChart = new dhtmlXChart({
                                                                    view: "line",
                                                                    container: "chart1",
                                                                    value: "#oseaOD#",
                                                                    item: {
                                                                        borderColor: "#FF0000",
                                                                        color: "#FF0000",
                                                                    },
                                                                    line: {
                                                                        color: "#FF0000",
                                                                        width: 2
                                                                    },
                                                                    tooltip: {
                                                                        template: "#oseaOD#"
                                                                    },
                                                                    offset: 0,
                                                                    xAxis: {
                                                                        template: "#frecuencia#"
                                                                    },
                                                                    yAxis: {
                                                                        end: 10,

                                                                        step: 10,
                                                                        start:-110 ,
                                                                    },
                                                                    padding: {
                                                                        left: 35,
                                                                        bottom: 50
                                                                    },
                                                                    origin: 0,
                                                                    legend: {
                                                                        values: [{ text: "Osea OD" }, { text: "Aerea OD" }, { text: "Osea OI" }, { text: "Aerea OI" }],
                                                                        align: "right",
                                                                        valign: "middle",
                                                                        layout: "y",
                                                                        width: 100,
                                                                        margin: 8,
                                                                        marker: {
                                                                            type: "item"
                                                                        }
                                                                    }
                                                                });
                                                                myLineChart.addSeries({
                                                                    value: "#aereaOD#",
                                                                    item: {
                                                                            borderColor: "#FF0000",
                                                                        color: "#FF0000",
                                                                        type: "s",
                                                                        radius: 4
                                                                    },

                                                                    line: {

                                                                        color: "#FF0000",
                                                                        width: 2
                                                                    },
                                                                    tooltip: {
                                                                        template: "#aereaOD#"
                                                                    }
                                                                });
                                                                myLineChart.addSeries({
                                                                    value: "#oseaOI#",
                                                                    item: {
                                                                        borderColor: "#007EFD",
                                                                        color: "#007EFD",
                                                                        type: "t",
                                                                        radius: 4
                                                                    },
                                                                    line: {
                                                                        color: "#007EFD",
                                                                        width: 2,
                                                                    },
                                                                    tooltip: {
                                                                        template: "#oseaOI#"
                                                                    }
                                                                });
                                                                myLineChart.addSeries({
                                                                    value: "#aereaOI#",
                                                                    item: {
                                                                        borderColor: "#007EFD",
                                                                        color: "#007EFD",
                                                                        type: "s",
                                                                        radius: 4
                                                                    },
                                                                    line: {
                                                                        color: "#007EFD",
                                                                        width: 2
                                                                    },
                                                                    tooltip: {
                                                                        template: "#aereaOI#"
                                                                    }
                                                                });
                                                                myLineChart.parse(multiple_dataset, "json");
                                                            }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="impedancio" role="tabpanel" aria-labelledby="impedancio-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="col-md-12" style="height: 100%;overflow:scroll;">
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <h6 class="f-16 text-c-blue">IMPEDANCIOMETRÍA</h6>
                                    <hr>
                                </div>
                            </div>
                            <!--FORMULARIOS-->
                            <div class="row">
                                <div class="col-md-12 mt-3 mb-0">
                                    <!--Formulario / Menor de edad-->
                                    @include('atencion_medica.generales.seccion_menor')
                                    <!--Cierre: Formulario / Menor de edad-->
                                    <!--Motivo consulta-->
                                    <div class="col-sm-12 col-md-12">
                                        <div class="card">

                                            <div id="motivo_c" >
                                                <div class="#">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12" id="">
                                                            <label class="floating-label-activo-sm">Gráfica</label>
                                                            <div class="form-group">
                                                                <div id="chart1" class="chart1">
                                                                    <table style="width:100%";>
                                                                        <tr>
                                                                            <td style="width:20%" > Impedanciometria</td><td style="width:50%" hidden="hidden" ><label>Nombre </label><input id="txtcnom" class="" name="txtcnom" type="text" value="nombre" /></td><td style="width:30%" hidden="hidden" ><label>Edad</label><input id="txtced" class="" name="txtced" type="text" value="Edad" /></td><td style="width:10%" hidden="hidden"> <label>Fecha</label><input id="txtcfec" class="" name="txtcfec" type="text" value="fecha" /></td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div id="chart2" style="width:900px;height:450px;border:1px solid #c0c0c0;padding-bottom:15px">
                                                                    <table class="">
                                                                        <tr>
                                                                            <td  class="auto-style17">
                                                                                <table class="pad_caj1">
                                                                                    <tr>
                                                                                        <td class="td_subtit" colspan="4">PERMEABILIDAD TUBARICA</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="dhx_axis_title_x">&nbsp;</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">OD</td>
                                                                                        <td class="dhx_axis_title_x">OI</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style12">VALSALVA</td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2181" name="campo_2181" type="text" value="0" /></td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2182" name="campo_2182" type="text" value="0" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style11">DEGLUCION</td>
                                                                                        <td class="txt_ptp">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2183" name="campo_2183"  type="text" value="0" /></td>
                                                                                        <td class="txt_ptp" colspan="2">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2184" name="campo_2184"  type="text" value="0" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style11">TPG POST V</td>
                                                                                        <td class="txt_ptp">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2185" name="campo_2186" type="text" value="0" /></td>
                                                                                        <td class="txt_ptp" colspan="2">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2185" name="campo_2186" type="text" value="0" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="txt_ptp" colspan="4">CONCLUSION</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style11" colspan="4">
                                                                                            <input class="auto-style16" onblur="guardar(this.id);" id="campo_2187" name="campo_2187" type="text" value="" /></td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                            <td colspan="2" class="auto-style14">

                                                                                <table class="" style="border: 1px solid #666666; margin-left:20px;margin-top:20px;margin-right:15px">
                                                                                    <tr>
                                                                                        <td class="td_subtit" colspan="3">&nbsp;</td>
                                                                                        <td class="td_subtit" colspan="3">REFLEJO</td>
                                                                                        <td class="td_subtit" colspan="3">&nbsp;</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style5">&nbsp;</td>
                                                                                        <td class="auto-style5">&nbsp;</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">500</td>
                                                                                        <td class="auto-style6">1000</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">2000</td>
                                                                                        <td class="auto-style6">4000</td>
                                                                                        <td class="auto-style6">WN</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style5">OD</td>
                                                                                        <td class="auto-style5">C/I</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2188" name="campo_2188" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2189" name="campo_2189" type="text" value="0" /></td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2190" name="campo_2190" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2191" name="campo_2191" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2192" name="campo_2192" type="text" value="0" /></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="auto-style5">OI</td>
                                                                                        <td class="auto-style5">I/C</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2193" name="campo_2193" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2194" name="campo_2194" type="text" value="0" /></td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2195" name="campo_2195" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2196" name="campo_2196" type="text" value="0" /></td>
                                                                                        <td class="auto-style6">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2197" name="campo_2197" type="text" value="0" /></td>
                                                                                    </tr>
                                                                                </table>

                                                                            </td>
                                                                            <td class="">

                                                                                <table class="diapa">
                                                                                    <tr>
                                                                                        <td class="dhx_axis_title_x" colspan="3">DETERIORO DEL REFLEJO</td>
                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td class="dhx_axis_title_x">
                                                                                            OD</td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            &nbsp;</td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            OI</td>

                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td class="dhx_axis_title_x">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2198" name="campo_2198" type="text" value="0" /></td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            500</td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2199" name="campo_2199" type="text" value="0" /></td>

                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td class="dhx_axis_title_x">
                                                                                            <input class="impWidh" onblur="guardar(this.id);" id="campo_2200" name="campo_2200" type="text" value="0" /></td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            1000</td>
                                                                                        <td class="dhx_axis_title_x">
                                                                                            <input class="impWidhOI" onblur="guardar(this.id);" id="campo_2201" name="campo_2201" type="text" value="0" /></td>

                                                                                    </tr>
                                                                                    <tr>

                                                                                        <td class="dhx_axis_title_x">
                                                                                            OTROS</td>
                                                                                        <td class="dhx_axis_title_x" colspan="2">
                                                                                            <input class="auto-style15" onblur="guardar(this.id);" id="campo_2202" name="campo_2202" type="text" value="" /></td>

                                                                                    </tr>
                                                                                </table>

                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                     <table>
                                                                    <tr>
                                                                        <td style="width:100%">
                                                                            <table style="width:885px;margin-left:15px;">
                                                                                <tr>

                                                                                    <td colspan="3" class="tit">Valores del Timpanograma</td>

                                                                                    <td class="button" rowspan="6" ><input type="button" onclick="actualiza_datos();" value="Graficar" class="button" /></td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td class="subtitOD1" >Volumen</td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2203" name="campo_2203" value="0" class="impWidh" /></td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2204" name="campo_2204" value="0" class="impWidhOI" /></td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td class="auto-style1" >Presion</td>

                                                                                    <td class="auto-style1" ><input type="text" onblur="guardar(this.id);" id="campo_2205" name="campo_2205" value="0" class="impWidh"/></td>

                                                                                    <td class="auto-style1" ><input type="text" onblur="guardar(this.id);" id="campo_2206" name="campo_2206" value="0" class="impWidhOI"/></td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td class="subtitOD1">Gr</td>

                                                                                    <td class="subtitOD1"><input type="text" onblur="guardar(this.id);" id="campo_2207" name="campo_2207" value="0" class="impWidh" /></td>

                                                                                    <td class="subtitOD1"><input type="text" onblur="guardar(this.id);" id="campo_2208" name="campo_2208" value="0" class="impWidhOI"/></td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td class="subtitOD1" >C.E.</td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2209" name="campo_2209" value="0" class="impWidh"/></td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2210" name="campo_2210" value="0" class="impWidhOI"/></td>

                                                                                </tr>
                                                                                <tr>

                                                                                    <td class="subtitOD1" >R</td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2211" name="campo_2211" value="0" class="impWidh"/></td>

                                                                                    <td class="subtitOD1" ><input type="text" onblur="guardar(this.id);" id="campo_2212" name="campo_2212" value="0" class="impWidhOI"/></td>

                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="4" style="text-align:center">
                                                                                        <table Style="width:100%">
                                                                                            <tr>
                                                                                                <td class="td_subtit">Observaciones</td><td class="td_subtit">Examinador</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td>
                                                                                                    <input class="txt_obs" onblur="guardar(this.id);" id="campo_2213" name="campo_2213" type="text" value="Ingrese observaciones" />
                                                                                                </td>
                                                                                                <td>
                                                                                                    <input class="txt_obs" onblur="guardar(this.id);" id="campo_2214" name="campo_2214" name="txtcoex" type="text" value="Autocomplete" />
                                                                                                </td>
                                                                                            </tr>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>

                                                                    </tr>
                                                                </table>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        actualiza_datos = function () {


                                            multiple_dataset[3]["ceOD"] = document.getElementById("txtCeOD").value;
                                            multiple_dataset[3]["ceOI"] = document.getElementById("txtCeOI").value;

                                            document.getElementById("chart1").innerHTML = "";
                                            doOnLoad();
                                        }


                                        var multiple_dataset = [
                                            { ceOD: "0", ceOI: "0", Gr: "-400" },
                                            { ceOD: "0", ceOI: "0", Gr: "-200" },
                                            { ceOD: "0", ceOI: "0", Gr: "-100" },
                                            { ceOD: "0", ceOI: "0", Gr: "0" },
                                            { ceOD: "0", ceOI: "0", Gr: "100" },
                                            { ceOD: "0", ceOI: "0", Gr: "200" },


                                        ];
                                        var myLineChart;

                                        function doOnLoad() {
                                            myLineChart = new dhtmlXChart({
                                                view: "line",
                                                container: "chart1",
                                                value: "#ceOD#",
                                                item: {
                                                    borderColor: "#FF0000",
                                                    color: "#FF0000",
                                                },
                                                line: {
                                                    color: "#FF0000",
                                                    width: 2
                                                },
                                                tooltip: {
                                                    template: "#ceOD#"
                                                },
                                                offset: 0,
                                                xAxis: {
                                                    template: "#Gr#"
                                                },
                                                yAxis: {
                                                    start: -0.0,
                                                    step: 0.5,
                                                    end: 2
                                                },
                                                padding: {
                                                    left: 35,
                                                    bottom: 50
                                                },
                                                origin: 0,
                                                legend: {
                                                    values: [{ text: " OD" }, { text: "OI" }],
                                                    align: "right",
                                                    valign: "middle",
                                                    layout: "y",
                                                    width: 100,
                                                    margin: 8,
                                                    marker: {
                                                        type: "item"
                                                    }
                                                }
                                            });

                                            myLineChart.addSeries({
                                                value: "#ceOI#",
                                                item: {
                                                    borderColor: "#007EFD",
                                                    color: "#007EFD",
                                                    type: "t",
                                                    radius: 4
                                                },
                                                line: {
                                                    color: "#007EFD",
                                                    width: 2,
                                                },
                                                tooltip: {
                                                    template: "#ceOI#"
                                                }
                                            });

                                            myLineChart.parse(multiple_dataset, "json");
                                        }

                                    require_once('../../scripts/conexion.php');
                                    $sql = "Select campodatos.idcampo, valor from campodatos
                                            inner join campo on campodatos.idcampo = campo.idcampo
                                            WHERE idseccion = 1027 and cod_con=".$cod_con;
                                    $rs = $dba->prepare($sql);
                                    $rs->execute();
                                    while ($rst = $rs->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
                                        print("$('campo_".$rst[0]."_".$cod_con."').value='".$rst[1]."';");
                                    }

                                        actualiza_datos();
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="tab-pane fade" id="ocho_par" role="tabpanel" aria-labelledby="ocho_par-tab">
                    <div class="row bg-white shadow-none rounded mx-1">
                        <div class="card" style="width: 100%">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="card-body shadow-none" id="form_0_fono">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <div> <label class="form_fono">Fecha Control   </label>
                                                        <script>
                                                        date = new Date().toLocaleDateString();
                                                        document.write(date);
                                                        </script>
                                                    </div> <h6>EXAMEN FUNCIONAL 8° PAR CRANEAL</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <label id="" name="" class="floating-label-activo-sm">Derivado por:</label>
                                                    <div class="form-group fill">
                                                        <select class="form-control form-control-sm" name="tipo_resp" id="tipo_resp">
                                                            <option value="NE">•Otorrinolaringólogo</option>
                                                            <option value="N">•Neurólogo</option>
                                                            <option value="CS">•Espontánea</option>
                                                            <option value="CD">•Otro profesional</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Nombre derivador</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="form-group col-md-8 mt-1 ">
                                                    <label class="floating-label-activo-sm">Sintomatología</label>
                                                     <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                </div>
                                                <div class="col-md-3 mt-1">
                                                    <label class="floating-label-activo-sm">Diagnóstico</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="form-group col-md-9 mt-1 ">
                                                    <label class="floating-label-activo-sm">Antecedentes</label>
                                                     <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                 </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <h6>Equilibrio Estático:</h6>

                                                </div>
                                                <div class="col-md-5 mt-1">
                                                    <label class="floating-label-activo-sm">Romberg</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-5 mt-1">
                                                    <label class="floating-label-activo-sm">Romberg Sensibilizado</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <h6>Equilibrio Cinético:</h6>

                                                </div>
                                                <div class="col-md-3 mt-1">
                                                    <label class="floating-label-activo-sm">Marcha con ojos abiertos</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-3 mt-1">
                                                    <label class="floating-label-activo-sm">Prueba de Babinsky-weil</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Prueba de Romberg Barre</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Prueba de Untenberg-Fakuda</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <h6>Pruebas Cerebelosas:</h6>

                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Temblor Intencional</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Dismetría</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Disinergia</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Disdiadococinesia</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="floating-label-activo-sm">Hipotonia</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <h6>Equilibrio Segmentario:</h6>
                                                </div>
                                                <div class="col-md-10 mt-1">
                                                    <label class="floating-label-activo-sm">Prueba de Indicación</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-2 mt-1">
                                                    <h6>Otras Pruebas:</h6>
                                                </div>
                                                <div class="col-md-10 mt-1">
                                                    <label class="floating-label-activo-sm">Prueba y resultado</label>
                                                     <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-row">

                                                <div class="form-group col-md-12-center">
                                                    <table>
                                                        <tr>
                                                            <td colspan="3"  rowspan="3">
                                                                <table style="border: 2px solid #808080; width:100%">
                                                                    <tr>
                                                                        <td class="text_center" colspan="3">Con fijación Ocular</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="text_center">
                                                                            <select id="e391" class="ng_esp" size="1" name="Ng" title="Ng">
                                                                                <option> p</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                        <tr>
                                                                        <td>
                                                                            <select id="e395" class="ng_esp" size="1" name="59" title="ng">
                                                                                <option> t</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text_center">
                                                                            <select id="e393" class="ng_esp" size="1" name="57" title="ng" >
                                                                                <option>  </option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="tib_pcned">
                                                                            <select id="e392" class="ng_esp" size="1" name="56" title="ng">
                                                                                <option> u</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                        <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td class="text_center">
                                                                            <select id="e394" class="ng_esp" size="1" name="58" title="ng">
                                                                                <option> q</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>

                                                            <td colspan="3" rowspan="3">
                                                                <table style="border: 2px solid #808080; width:100%">
                                                                    <tr>
                                                                        <td class="text_center" colspan="3">Sin Fijación Ocular</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td class="text_center">
                                                                            <select id="e391" class="ng_esp" size="1" name="Ng" title="Ng">
                                                                                <option> p</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td></td>
                                                                    </tr>
                                                                        <tr>
                                                                        <td>
                                                                            <select id="e395" class="ng_esp" size="1"  title="ng">
                                                                                <option> t</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="text_center"><select id="e393" class="ng_esp" size="1" name="57" title="ng">
                                                                                <option> </option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td class="tib_pcned">
                                                                            <select id="e392" class="ng_esp" size="1"  title="ng">
                                                                                <option> u</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                    </tr>
                                                                        <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td class="text_center">
                                                                            <select id="e394" class="ng_esp" size="1"  title="ng">
                                                                                <option> q</option>
                                                                                <option> g</option>
                                                                                <option> f</option>
                                                                                <option> i</option>
                                                                                <option> h</option>
                                                                                <option> j</option>
                                                                                <option> k</option>
                                                                                <option> m</option>
                                                                                <option> l</option>
                                                                                <option> n</option>
                                                                            </select>
                                                                        </td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label-activo-sm">Mov oculares involuntarios y persecución </label>
                                                    <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label-activo-sm">Dismetría Ocular</label>
                                                    <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label-activo-sm">Comentarios </label>
                                                    <input class="form-control caja-texto form-control-sm mt-1" name="motivo_consulta" id="motivo_consulta">
                                                </div>
                                            </div>
                                            <div>
                                                <table style="width:100%">
                                                    <tr>
                                                        <td colspan="9"class="barra_tit">  NISTAGMO PROVOCADO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="tit3"></td>
                                                        <td class="tit3" style="color: #999999"> DIRECCION</td>
                                                        <td class="tit3" style="color: #999999"> LATENCIA</td>
                                                        <td class="tit3" style="color: #999999">PAROXISMO</td>
                                                        <td class="tit3" style="color: #999999"> FATIGA</td>
                                                        <td class="tit3" style="color: #999999">DURACION</td>
                                                        <td class="tit3" style="color: #999999">VERTIGO</td>
                                                        <td class="tit3" style="color: #999999">NAUSEAS</td>
                                                        <td class="tit3" style="color: #999999"> VOMITO</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_center" style="color: #808080">
                                                            EaS</td>
                                                        <td class="text_center">
                                                            <select id="EaS" class="ng_esp" size="1" name="EaS" title="EaS">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center"> <input id="LatEaS" class="form-control form-control-sm" type="text" name="LatEaS" title="LatEaS" size="6"></td>
                                                        <td class="text_center">
                                                            <select id="e415" class="cc326" size="1" name="par1" title="par1">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="e308" class="cc326" size="1" name="fat1" title="fat1">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center"><input id="DurEaS" class="form-control form-control-sm" type="text" name="DurEaS" title="DurEaS" size="9"></td>
                                                        <td class="text_center">
                                                            <select id="verEaS" class="tcaj_vert" name="verEaS" size="1" title="verEaS">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="NauEaS" class="tcaj_vert" name="NauEaS" size="1" title="NAUSEAS">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="VomEaS" class="tcaj_vert" name="VomEaS" size="1" title="VOMITOS">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">SaD</td>
                                                        <td class="caja_resp">
                                                            <select id="SaD" class="ng_esp" size="1" name="SaD" title="SaD">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatSaD" class="form-control form-control-sm" type="text" name="LatSaD" title="LatSaD" size="9"></td>
                                                            <td class="caja_resp">
                                                                <select id="e323" class="cc326" size="1" name="par2" title="par2">
                                                                    <option> si</option>
                                                                    <option> no</option>
                                                                </select>
                                                            </td>
                                                        <td class="caja_resp">
                                                            <select id="e334" class="cc326" size="1" name="fat2" title="fat2">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"><input id="DurSaD" class="form-control form-control-sm" type="text" name="DurSaD" title="DurSaD" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e345" class="tcaj_vert" name="VOM30OI2" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e356" class="tcaj_vert" name="VOM30OI13" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="VomSaE" class="tcaj_vert" name="VomSaE" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080"> DaS</td>
                                                        <td class="caja_resp">
                                                            <select id="DaS" class="ng_esp" size="1" name="DaS" title="DaS">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatDaS" class="form-control form-control-sm" type="text" name="LatDaS" title="LatDaS" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e324" class="cc326" size="1" name="par3" title="par3">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e335" class="cc326" size="1" name="fat3" title="fat3">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"><input id="DurDaS" class="form-control form-control-sm" type="text" name="DurDaS" title="DurDaS" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e346" class="tcaj_vert" name="VOM30OI3" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e358" class="tcaj_vert" name="VOM30OI15" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e359" class="tcaj_vert" name="VOM30OI16" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_center" style="color: #808080">SaL</td>
                                                        <td class="text_center">
                                                            <select id="SaL" class="ng_esp" size="1" name="SaL" title="SaL">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center"><input id="LatSal" class="form-control form-control-sm" type="text" name="LatSal" title="LatSal" size="9"></td>
                                                        <td class="text_center">
                                                            <select id="e325" class="cc326" size="1" name="par4" title="par4">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="e336" class="cc326" size="1" name="fat4" title="fat4">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center"><input id="DurSal" class="form-control form-control-sm" type="text" name="DurSal" title="DurSal" size="9"></td>
                                                        <td class="text_center">
                                                            <select id="e347" class="tcaj_vert" name="VOM30OI4" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="e360" class="tcaj_vert" name="VOM30OI17" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="text_center">
                                                            <select id="e361" class="tcaj_vert" name="VOM30OI18" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">  LaS</td>
                                                        <td class="caja_resp">
                                                            <select id="LaS" class="ng_esp" size="1" name="LaS" title="LaS">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">  <input id="LatLas" class="form-control form-control-sm" type="text" name="LatLas" title="LatLas" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e326" class="cc326" size="1" name="par5" title="par5">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e337" class="cc326" size="1" name="fat5" title="fat5">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="DurLaS" class="form-control form-control-sm" type="text" name="DurLaS" title="DurLaS" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e348" class="tcaj_vert" name="VOM30OI5" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e362" class="tcaj_vert" name="VOM30OI19" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select></td>
                                                        <td class="caja_resp">
                                                            <select id="e363" class="tcaj_vert" name="VOM30OI20" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080"> SaE</td>
                                                        <td class="caja_resp">
                                                            <select id="SaE" class="ng_esp" size="1" name="SaE" title="SaE">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatSaE" class="form-control form-control-sm" type="text" name="LatSaE" title="LatSaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e327" class="cc326" size="1" name="par6" title="par6">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select
                                                            td>
                                                        <td class="caja_resp">
                                                            <select id="e338" class="cc326" size="1" name="fat6" title="fat6">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="DurSaE" class="form-control form-control-sm" type="text" name="DurSaE" title="DurSaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e349" class="tcaj_vert" name="VOM30OI6" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e364" class="tcaj_vert" name="VOM30OI21" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e365" class="tcaj_vert" name="VOM30OI22" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">EaCC</td>
                                                        <td class="caja_resp">
                                                            <select id="EaCC" class="ng_esp" size="1" name="EaCC" title="EaCC">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatEaCC" class="form-control form-control-sm" type="text" name="LatEaCC" title="LatEaCC" size="9"></td>
                                                            <td class="caja_resp">
                                                                <select id="e328" class="cc326" size="1" name="par7" title="par7">
                                                                    <option> si</option>
                                                                    <option> no</option>
                                                                </select>
                                                            </td>
                                                        <td class="caja_resp">
                                                            <select id="e339" class="cc326" size="1" name="fat7" title="fat7">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="DurEaCC" class="form-control form-control-sm" type="text" name="DurEaCC" title="DurEaCC" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e350" class="tcaj_vert" name="VOM30OI7" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e377" class="tcaj_vert" name="VOM30OI34" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e366" class="tcaj_vert" name="VOM30OI23" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">CCaE</td>
                                                        <td class="caja_resp">
                                                            <select id="CCaE" class="ng_esp" size="1" name="CCaE" title="CCaE">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatCCaE" class="form-control form-control-sm" type="text" name="LatCCaE" title="LatCCaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e329" class="cc326" size="1" name="par8" title="par8">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e340" class="cc326" size="1" name="fat8" title="fat8">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">  <input id="DurCCaE" class="form-control form-control-sm" type="text" name="DurCCaE" title="DurCCaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e351" class="tcaj_vert" name="VOM30OI8" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e376" class="tcaj_vert" name="VOM30OI33" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e367" class="tcaj_vert" name="VOM30OI24" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080"> EaCCd</td>
                                                        <td class="caja_resp">
                                                            <select id="EaCCd" class="ng_esp" size="1" name="EaCCd" title="EaCCd">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatEaCCd" class="form-control form-control-sm" type="text" name="LatEaCCd" title="LatEaCCd" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e330" class="cc326" size="1" name="par9" title="par9">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e341" class="cc326" size="1" name="fat9" title="fat9">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"><input id="DurEaCCd" class="form-control form-control-sm" type="text" name="DurEaCCd" title="DurEaCCd" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e352" class="tcaj_vert" name="VOM30OI9" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e374" class="tcaj_vert" name="VOM30OI31" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e368" class="tcaj_vert" name="VOM30OI25" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">CCdaE</td>
                                                        <td class="caja_resp">
                                                            <select id="CCdaE" class="ng_esp" size="1" name="CCdaE" title="CCdaE">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatCCdaE" class="form-control form-control-sm" type="text" name="LatCCdaE" title="LatCCdaE" size="9"></td>
                                                            <td class="caja_resp">
                                                                <select id="e331" class="cc326" size="1" name="par10" title="par10">
                                                                    <option> si</option>
                                                                    <option> no</option>
                                                                </select>
                                                            </td>
                                                        <td class="caja_resp">
                                                            <select id="e342" class="cc326" size="1" name="fat10" title="fat10">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="DurCCdaE" class="form-control form-control-sm" type="text" name="DurCCdaE" title="DurCCdaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e353" class="tcaj_vert" name="VOM30OI10" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e375" class="tcaj_vert" name="VOM30OI32" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e369" class="tcaj_vert" name="VOM30OI26" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080"> EaCCi</td>
                                                        <td class="caja_resp">
                                                            <select id="EaCCi" class="ng_esp" size="1" name="EaCCi" title="EaCCi">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">   <input id="LatEaCCi" class="form-control form-control-sm" type="text" name="LatEaCCi" title="LatEaCCi" size="9"></td>
                                                            <td class="caja_resp">
                                                                <select id="e332" class="cc326" size="1" name="par11" title="par11">
                                                                    <option> si</option>
                                                                    <option> no</option>
                                                                </select>
                                                            </td>
                                                        <td class="caja_resp">
                                                            <select id="e343" class="cc326" size="1" name="fat11" title="fat11">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="DurEaCCi" class="form-control form-control-sm" type="text" name="DurEaCCi" title="DurEaCCi" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e354" class="tcaj_vert" name="VOM30OI11" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e373" class="tcaj_vert" name="VOM30OI30" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e370" class="tcaj_vert" name="VOM30OI27" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="caja_resp" style="color: #808080">CCiaE</td>
                                                        <td class="caja_resp">
                                                            <select id="CCiaE" class="ng_esp" size="1" name="CCiaE" title="CCiaE">
                                                                <option>  </option>
                                                                <option> g</option>
                                                                <option> f</option>
                                                                <option> i</option>
                                                                <option> h</option>
                                                                <option> j</option>
                                                                <option> k</option>
                                                                <option> m</option>
                                                                <option> l</option>
                                                                <option> n</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"> <input id="LatCCiaE" class="form-control form-control-sm" type="text" name="LatCCiaE" title="LatCCiaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e333" class="cc326" size="1" name="par12" title="par12">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e344" class="cc326" size="1" name="fat12" title="fat12">
                                                                <option> si</option>
                                                                <option> no</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp"><input id="DurCCiaE" class="form-control form-control-sm" type="text" name="DurCCiaE" title="DurCCiaE" size="9"></td>
                                                        <td class="caja_resp">
                                                            <select id="e355" class="tcaj_vert" name="VOM30OI12" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e372" class="tcaj_vert" name="VOM30OI29" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="caja_resp">
                                                            <select id="e371" class="tcaj_vert" name="VOM30OI28" size="1" title="VOM">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <br>
                                                </table>
                                            </div>
                                            <div>
                                                <table class="tab_pc">
                                                    <tr>
                                                        <td colspan="8" class="tit2">   PRUEBA CALORICA</td>

                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #999999">  </td>
                                                        <td class="text_PC" style="color: #999999"> DURACION</td>
                                                        <td class="text_PC" style="color: #999999">FRECUENCIA</td>
                                                        <td class="text_PC" style="color: #999999"> AMPLITUD</td>
                                                        <td class="text_PC" style="color: #999999"> VERTIGO</td>
                                                        <td class="tcaj_nau" style="color: #999999"> NAUSEAS</td>
                                                        <td class="tib_pc" style="color: #999999"> VOMITO</td>
                                                        <td class="tib_pc" style="color: #999999"> VCL</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #6699FF"> OI a 30°C</td>
                                                        <td class="text_PC"><input id="DUR_30OI" class="form-control form-control-sm" type="text" name="DUR_30OI" title="OIa30°C" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"> <input id="FR_30OI" class="form-control form-control-sm" type="text" name="FR_30OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"><input id="AM_30OI" class="form-control form-control-sm" type="text" name="AM_30OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e288" class="tcaj_vert" name="VER30OI" size="1" title="VERT" style="color: #6699FF;text-align:center" >
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tcaj_nau">
                                                            <select id="e294" class="tcaj_vert" name="NAU30OI" size="1" title="NAUSEAS" style="color: #6699FF;text-align:center" >
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc">
                                                            <select id="e300" class="tcaj_vert" name="VOM30OI" size="1" title="VOM" style="color: #6699FF;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc"> <input id="VCL_30OI" class="form-control form-control-sm" type="text" name="VCL_30OI" title="VCL" size="9" style="color: #6699FF;text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #FF0000"> OD a 30°C</td>
                                                        <td class="text_PC"> <input id="DUR_30OD" class="form-control form-control-sm" type="text" name="DUR_30OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="FR_30OD" class="form-control form-control-sm" type="text" name="FR_30OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="AM_30OD" class="form-control form-control-sm" type="text" name="AM_30OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e289" class="tcaj_vert"  name="1" size="1" title="pc" style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tcaj_nau">
                                                            <select id="e295" class="tcaj_vert"  name="7" size="1" title="pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc">
                                                            <select id="e301" class="tcaj_vert"  name="13" size="1" title="pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc"> <input id="VCL_30OD" class="form-control form-control-sm" type="text" name="VCL_30OD" title="VCL" size="9"style="color: #FF0000;text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #6699FF">  OI a 44°C</td>
                                                        <td class="text_PC"><input id="DUR_44OI" class="form-control form-control-sm" type="text" name="DUR_44OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"><input id="FR_44OI" class="form-control form-control-sm" type="text" name="FR_44OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"><input id="AM_44OI" class="form-control form-control-sm" type="text" name="AM_44OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e290" class="tcaj_vert" name="2" size="1" title="Pc" style="color: #6699FF;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select></td>
                                                        <td class="tcaj_nau">
                                                            <select id="e296" class="tcaj_vert"  name="8" size="1" title="Pc" style="color: #6699FF;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select></td>
                                                        <td class="tib_pc">
                                                            <select id="e302" class="tcaj_vert"  name="14" size="1" title="Pc"style="color: #6699FF;text-align:center" >
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc"><input id="VCL_44OI" class="form-control form-control-sm" type="text" name="VCL_44OI" title="VCL" size="9" style="color: #6699FF;text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #FF0000"> OD a 44°C</td>
                                                        <td class="text_PC"> <input id="DUR_44OD" class="form-control form-control-sm" type="text" name="DUR_44OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="FR_44OD" class="form-control form-control-sm" type="text" name="FR_44OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="AM_44OD" class="form-control form-control-sm" type="text" name="AM_44OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e291" class="tcaj_vert"  name="3" size="1" title="Pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tcaj_nau">
                                                            <select id="e297" class="tcaj_vert"  name="9" size="1" title="Pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc">
                                                            <select id="e303" class="tcaj_vert"  name="15" size="1" title="Pc" style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc"><input id="VCL_44OD" class="form-control form-control-sm" type="text" name="VCL_44OD" title="VCL" size="9"style="color: #FF0000;text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #6699FF"> OI a 18°C</td>
                                                        <td class="text_PC"><input id="DUR_18OI" class="form-control form-control-sm" type="text" name="DUR_18OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"><input id="FR_18OI" class="form-control form-control-sm" type="text" name="FR_18OI" title="Nombre" size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC"> <input id="AM_18OI" class="form-control form-control-sm" type="text" name="AM_18OI" title="Nombre"size="9" style="color: #6699FF;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e292" class="tcaj_vert"  name="4" size="1" title="Pc" style="color: #6699FF;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tcaj_nau">
                                                            <select id="e298" class="tcaj_vert"  name="10" size="1" title="Pc"style="color: #6699FF;text-align:center" >
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc">
                                                            <select id="e304" class="tcaj_vert"  name="16" size="1" title="Pc" style="color: #6699FF;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc"><input id="VCL_18OI" class="form-control form-control-sm" type="text" name="VCL_18OI" title="VCL" size="9" style="color: #6699FF;text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text_PC" style="color: #FF0000">OD a 18°C</td>
                                                        <td class="text_PC"> <input id="DUR_18OD" class="form-control form-control-sm" type="text" name="DUR_18OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="FR_18OD" class="form-control form-control-sm" type="text" name="FR_18OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC"> <input id="AM_18OD" class="form-control form-control-sm" type="text" name="AM_18OD" title="Nombre" size="9"style="color: #FF0000;text-align:center"></td>
                                                        <td class="text_PC">
                                                            <select id="e293" class="tcaj_vert"  name="5" size="1" title="Pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tcaj_nau">
                                                            <select id="e299" class="tcaj_vert"  name="11" size="1" title="Pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        </td>
                                                        <td class="tib_pc">
                                                            <select id="e305" class="tcaj_vert" name="17" size="1" title="Pc"style="color: #FF0000;text-align:center">
                                                                <option>+</option>
                                                                <option>++</option>
                                                                <option>0</option>
                                                            </select>
                                                        0</td>
                                                        <td class="tib_pc"><input id="VCL_18OD" class="form-control form-control-sm" type="text" name="VCL_18OD" title="VCL" size="9"style="color: #FF0000;text-align:center"></td>
                                                    </tr>
                                                   <br>
                                                </table>
                                                <hr>
                                                <div class="form-row">
                                                    <div class="form-group col-md-4 mt-1 ">
                                                        <label class="floating-label-activo-sm">Comentarios</label>
                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 mt-1 ">
                                                        <label class="floating-label-activo-sm">Conclusiones</label>
                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4 mt-1 ">
                                                        <label class="floating-label-activo-sm">Sugerencias</label>
                                                        <textarea class="form-control caja-texto form-control-sm mt-1" rows="1"  onfocus="this.rows=2" onblur="this.rows=1;" name="motivo_consulta" id="motivo_consulta"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--CIERRE: CONTROLES ATENCIÓN-->

                 <!--HISTORICO CONTROLES ATENCIÓN -->
                <div class="tab-pane fade" id="emisiones" role="tabpanel" aria-labelledby="emisiones-tab">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="form_fono d-inline">HISTÓRICO CONTROLES </h6>
                            </div>
                            <div class="card-body shadow-none" id="form_0_fono">
                                <form>
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <table id="atenciones_previas" class="display table dt-responsive nowrap pb-4 table-sm" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center align-middle">Fecha</th>
                                                        <th class="text-center align-middle">Sesion N°</th>
                                                        <th class="text-center align-middle">Sesiones Faltantes</th>
                                                        <th class="text-center align-middle">Trabajo en</th>
                                                        <th class="text-center align-middle">Objetivo Logrado?</th>
                                                        <th class="text-center align-middle">Técnicas</th>
                                                        <th class="text-center align-middle">Ver Control</th>
                                                        <th class="text-center align-middle">Ver Documentos</th>
                                                        <th class="text-center align-middle">Ver Informe Final</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center align-middle">23/03/2020</td>
                                                        <td class="text-center align-middle">1</td>
                                                        <td class="text-center align-middle">9</td>
                                                        <td class="text-center align-middle">Hombro Der</td>
                                                        <td class="text-center align-middle">Si</td>
                                                        <td class="text-center align-middle">Ultrasonido</td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Control</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-success btn-sm"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-secondary btn-sm"><i class="feather icon-file-plus"></i> Ver Informe</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center align-middle">30/03/2020</td>
                                                        <td class="text-center align-middle">2</td>
                                                        <td class="text-center align-middle">8</td>
                                                        <td class="text-center align-middle">Hombro Der</td>
                                                        <td class="text-center align-middle">Si</td>
                                                        <td class="text-center align-middle">Ultrasonido</td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-info btn-sm"><i class="feather icon-file-text"></i> Ver Control</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-success btn-sm"><i class="feather icon-folder"></i> Ver Archivos</button>
                                                        </td>
                                                        <td class="text-center align-middle">
                                                            <button href="#!" class="btn btn-secondary btn-sm"><i class="feather icon-file-plus"></i> Ver Informe</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CIERRE: HISTORICO CONTROLES ATENCIÓN-->
            </div>
        </div>
    </div>
</div>

@section('page-script-ficha-atencion')
<script>
$(document).ready(function() {
    $('#select_1').select2();
    $('#select_2').select2();
    $('#select_3').select2();
    $('#select_4').select2();
    $('#select_5').select2();
    $('#select_6').select2();
    $('#select_7').select2();
    $('#select_8').select2();
    $('#select_9').select2();
    $('#select_10').select2();
    $('#select_11').select2();
    $('#select_12').select2();
    $('#select_13').select2();
    $('#select_14').select2();
    $('#select_15').select2();
});
function internutri() {
    $('#modal_interconsulta_nutri').modal('show');
}
function informeNutri() {
    $('#informe_nutri').modal('show');
}

function examenes_nutri() {
    $('#indicar_examen_nutri').modal('show');
}
function e_plan_nutri() {
    $('#plan_nutri').modal('show');
}
function dieta_diaria_nutri() {
    $('#m_dieta_diaria').modal('show');
}
function encuesta_nutri() {
    $('#m_test_alimentacion_mens').modal('show');
}
function dieta_nutri() {
    $('#m_dieta_nutri').modal('show');
}
function dieta_diab() {
    $('#m_rec_diab').modal('show');
}
function raciones() {
    $('#m_raciones').modal('show');
}
function indicadores_nutri() {
    $('#m_indicadores_nutri').modal('show');
}
</script>
@endsection


