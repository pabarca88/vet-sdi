<div id="apgar_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="apgar_modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Cálculo referencial del apgar</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body"id="mc3k">
                <script type="text/javascript">
                    /* <![CDATA[ */

                    var curelement;

                    function togCB(thisid){
                    thischeckbox = document.getElementById(thisid);
                    if (thischeckbox.checked){ thischeckbox.checked = false; }
                    else { thischeckbox.checked = true; }
                    ApgarScore_fx();
                    }

                    function setRB(thisid){
                    document.getElementById(thisid).checked = true;
                    ApgarScore_fx();
                    }


                    /* ]]> */
                </script>
                <script language="JavaScript1.1" type="text/javascript">
                    /* <![CDATA[ */

                    var calctxt = '';
                    var xmltxt = '';
                    var xmlresult = '';
                    var htmtxt = '';
                    var postNow = false;
                    var printing = false;


                    function ApgarScore_fx() {
                    with(document.ApgarScore_form){

                    Score = 0.0;
                    doCalc = true;

                    if (cc1[0].checked){
                    Score = Score + 2;
                    }
                    if (cc1[1].checked){
                    Score = Score + 1;
                    }
                    if (cc1[2].checked){
                    Score = Score + 0;
                    }
                    if (cc2[0].checked){
                    Score = Score + 2;
                    }
                    if (cc2[1].checked){
                    Score = Score + 1;
                    }
                    if (cc2[2].checked){
                    Score = Score + 0;
                    }
                    if (cc3[0].checked){
                    Score = Score + 2;
                    }
                    if (cc3[1].checked){
                    Score = Score + 1;
                    }
                    if (cc3[2].checked){
                    Score = Score + 0;
                    }
                    if (cc4[0].checked){
                    Score = Score + 2;
                    }
                    if (cc4[1].checked){
                    Score = Score + 1;
                    }
                    if (cc4[2].checked){
                    Score = Score + 0;
                    }
                    if (cc5[0].checked){
                    Score = Score + 2;
                    }
                    if (cc5[1].checked){
                    Score = Score + 1;
                    }
                    if (cc5[2].checked){
                    Score = Score + 0;
                    }
                    if (doCalc){
                    cctotal.value = Score;
                    if (cctotal.value == 'NaN') cctotal.value = '';
                    }
                    else{
                    Score = null;
                    cctotal.value = '';
                    if (typeof rrclr == 'function') { rrclr(); };
                    document.ApgarScore_form.cctotal.value = '';
                    }

                    if (doCalc){
                    rrclr();
                    if ((Score >= 7) && (Score <= 10)){ document.getElementById('rr1_1').bgColor = '#8ab2be';
                    }
                    if ((Score >= 0) && (Score <= 6)){ document.getElementById('rr1_2').bgColor = '#8ab2be';
                    }


                    }
                    }
                    }




                    function rrclr(){
                    document.getElementById('rr1_1').bgColor = '';
                    document.getElementById('rr1_2').bgColor = '';
                    }




                    /* ]]> */
                </script>
                <form name="ApgarScore_form" id="ApgarScore_form" action="" onsubmit="return false;" onreset="rrclr(); ">
                    <table width="100%" cellpadding="4" cellspacing="0" summary="EBMcalc Table">
                        <tbody>
                            <tr>
                                <td colspan="3" align="left"><br><br></td>
                                <td class="#">
                                    <h5>Seleccione Parámetros</h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div id="calc_main">
                        <div id="calc_input">
                            <table>
                                <tbody>
                                    <tr>
                                        <td colspan="3" align="left"><h6 class="#">Frecuencia cardíaca </h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%"<br><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel1" name="cc1" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel1');">100 latidos/minuto o más (2 puntos)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel2" name="cc1" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel2');">Menos de 100 (1 punto)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel3" name="cc1" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel3');">Ninguno (0 puntos)</span></td>
                                    </tr>

                                    <tr>
                                         <td colspan="3" align="left"><h6 class="#">Madurez pulmonar </h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel4" name="cc2" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel4');">Respiración regular (2 puntos)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel5" name="cc2" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel5');">Irregular (1 punto)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="35%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel6" name="cc2" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel6');">Ninguno (0 puntos)</span></td>
                                    </tr>
                                    <tr>
                                         <td colspan="3" align="left"><h6 class="#">Tono muscular   </h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel7" name="cc3" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel7');">Activo (2 puntos)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel8" name="cc3" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel8');">Moderado (1 punto)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel9" name="cc3" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel9');">Relajado (0 puntos)</span></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" align="left"><h6 class="#">Color de la piel  </h6>
                                        </td>
                                    </tr>
                                        <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel10" name="cc4" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel10');">Rosado (2 puntos)</span></td>
                                    </tr>
                                        <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel11" name="cc4" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel11');">Cianosis distal (1 punto)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel12" name="cc4" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel12');">Totalmente cianótico (0 puntos)</span></td>

                                    </tr>
                                    <tr>
                                         <td colspan="3" align="left"><h6 class="#">Respuesta  estímulos </h6>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel13" name="cc5" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel13');">Llanto (2 puntos)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel14" name="cc5" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel14');">Quejidos (1 punto)</span></td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><br></td>
                                        <td align="right"><input style="margin-right:10px" type="radio" id="togel15" name="cc5" onclick="ApgarScore_fx();"></td>
                                        <td align="left"><span class="#" onclick="setRB('togel15');">Silencio (0 puntos)</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div id="calc_result" style="text-align:left">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <h6> Apgar aproximado:</h6>
                                    </td>
                                    <td><input class="form-control form-control-sm" align="left" type="text" size="2" name="cctotal" onfocus="blur();"></td>
                                    <td style="margin-left:25px">   <input type="reset"class="btn btn-info btn-sm" align="right" name="reset" value="Reiniciar el formulario"></td>
                                </tr>
                            </table>


                            <table width="100%"  cellspacing="0" summary="EBMcalc Table">
                                <tbody>
                                    <tr>
                                        <td class="medCalcTitleBox" width="1%"><br></td>
                                        <td class="#">
                                            <h6 class="#">Puntuación de Apgar:   Normal(7 - 10) RN Deprimido(0   -   6 )</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
                <div id="calc_disclaimer"><center>
                    <table bgcolor="#cccccc"  summary="EBMcalc Table">
                        <tbody>
                            <tr>
                               <td><center><span class="medCalcFontTwo"><b>
                                    <u>Avisos legales y exención de responsabilidad</u>
                                    </b>
                                    </span></center><span class="medCalcFontTwo">Este es solo referencial el examen y puntuación del Apgar debe ser revisado y aplicado con los criterios médicos correspondientes y por un profesional de la salud.

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <script language="JavaScript1.1" type="text/javascript">
                    /* <![CDATA[ */
                    ApgarScore_fx();
                    function loadQueryParams(thisqs){
                    if (thisqs) alert('Data panel values cannot be transferred to this calculator.');
                    return;
                    }
                    /* ]]> */
                </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function apgar() {
        $('#apgar_modal').modal('show');
    }
</script>
