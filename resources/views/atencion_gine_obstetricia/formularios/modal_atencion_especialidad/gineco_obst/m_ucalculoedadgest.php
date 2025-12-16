<div id="modal_edadgest" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal_edadgest" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
             <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1 f-18" id="modal_info1"> Calculadora gestacional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
             </div>
             <div class="modal-body">
                    <div class="pt-3 pb-5 text-center">
                        <h2>Calculadora gestacional</h2>
                    </div>

                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span>Edad Gestacional</span>
                            </h4>
                            <ul class="list-group mb-3">
                                <li class="list-group-item">
                                    <div>
                                        <h6>Fecha de la última regla</h6>
                                        <div class="input-group">
                                            <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group">
                                             <input  class="form-control form-control-sm" type="date" name="data2" id="data2"onchange="mostrarDUR3()" data-type="datepicker" data-guid="cfc3093a-d1fa-0a61-2b33-ca0770d65c78" data-datepicker="true" role="input">
                                            <!--<input type="text" class="form-control border" id="data2" value="" onchange="mostrarDUR3()" data-type="datepicker" data-guid="cfc3093a-d1fa-0a61-2b33-ca0770d65c78" data-datepicker="true" role="input"><span class="input-group-append" role="right-icon">
                                            <button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button>
                                            </span>-->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div>
                                        <h6>Fecha de la exploración</h6>
                                        <div class="input-group">
                                            <input  class="form-control form-control-sm" type="date" name="data1" id="data1"onchange="mostrarDUR3()" data-type="datepicker" data-guid="8a8b2503-32a3-6a4f-73a3-b63feee48e3b" data-datepicker="true" role="input">
                                            <!--<input type="text" class="form-control border" id="data2" value="" onchange="mostrarDUR3()" data-type="datepicker" data-guid="cfc3093a-d1fa-0a61-2b33-ca0770d65c78" data-datepicker="true" role="input"><span class="input-group-append" role="right-icon">
                                            <button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button>
                                            </span>
                                            <div role="wrapper" class="gj-datepicker gj-datepicker-bootstrap gj-unselectable input-group"><input type="text" class="form-control border" id="data1" onchange="mostrarDUR3()" data-type="datepicker" data-guid="8a8b2503-32a3-6a4f-73a3-b63feee48e3b" data-datepicker="true" role="input"><span class="input-group-append" role="right-icon"><button class="btn btn-outline-secondary border-left-0" type="button"><i class="gj-icon">event</i></button></span>-->

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="setmanes">
                                                <h6>Semanas</h6>
                                            </label>
                                            <input type="number" class="form-control border" id="setmanes" placeholder="semanas" value="" onchange="datamanual()">

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="dies">
                                                <h6>Días</h6>
                                            </label>
                                            <input type="number" class="form-control border" id="dies" placeholder="días" value="" onchange="datamanual()">
                                        </div>
                                    </div>
                                </li>
                                <h4 class="d-flex justify-content-between align-items-center mb-3 mt-4">
                                    <span>Primer Trimestre</span>
                                </h4>
                                <ul class="list-group mb-3">
                                    <li class="list-group-item">
                                        <div>
                                            <h6>CRL <span id="crl_fur">(FUR corregida: 2022-02-13)</span></h6>
                                            <div class="input-group">
                                                <input type="number" class="form-control border" id="crl" placeholder="CRL" value="">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="CRLtx">6+3 sg</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>
                                            <h6>TN</h6>
                                            <div class="input-group">
                                                <input type="text" class="form-control border" id="tn" readonly="">
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div>
                                            <div class="input-group d-flex justify-content-between">
                                                <!--<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalRefPrimer">Referencias</button>-->
                                                <button class="btn btn-primary ml-3" type="button" onclick="calcPrimer()">Calcula</button>
                                            </div>
                                        </div>
                                    </li>
                        </ul></ul></div>

                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Peso fetal estimado y percentil <span id="sdgesta">(3+2 sg)</span></h4>


                            <div class="mb-3">
                                <label for="pfe3">Peso fetal estimado (g)</label>
                                <div class="input-group">
                                    <input type="number" class="form-control border" id="pfe3" placeholder="Peso fetal estimado">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="percentilA">p__</span>
                                    </div>
                                    <button class="btn btn-primary ml-3" type="button" onclick="calcPercentil()">Calcula</button>
                                    <!-- Trigger the modal with a button -->
                                    <button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#myModal">Biometrías</button>
                                </div>
                            </div>
                            <div class="mb-1">
                                Sexo fetal
                            </div>
                            <div class="row">
                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="opt" id="cap" value="cap" checked="" onchange="calcPercentil()">
                                        Desconocido
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="opt" id="nen" value="nen" onchange="calcPercentil()">
                                        Masculino
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label>
                                        <input type="radio" name="opt" id="nena" value="nena" onchange="calcPercentil()">
                                        Femenino
                                    </label>
                                </div>

                            </div>

                            <hr class="my-4">
                            <h4 class="mb-3">Doppler fetal <span id="sdgesta2">(3+2 sg)</span></h4>
                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="ipAU">IP A. Umbilical</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control border" id="ipAU" placeholder="IP Umb" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="ipAUtx">p__</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ipACM">IP A. Cerebral Media</label>

                                    <div class="input-group">
                                        <input type="number" class="form-control border" id="ipACM" placeholder="IP ACM" value="">
                                        <div class="input-group-append">
                                            <p class="input-group-text" id="ipACMtx">p__</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ICP">Índice cerebro-placentario</label>

                                    <div class="input-group">
                                        <input type="number" class="form-control border" id="ICP" placeholder="ICP" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="ICPtx">p__</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="velACM">Velocidad máx. ACM</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control border" id="velACM" placeholder="V. máx ACM" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="velACMtx">__M</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="ipDV">IP Ductus Venoso</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control border" id="ipDV" placeholder="IP DV" value="">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="ipDVtx">p__</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-3 align-self-end text-right">
                                    <!--<button type="button" class="btn btn-secondary mt-2" data-toggle="modal" data-target="#ModalRefDoppler">Referencias</button>-->
                                    <button class="btn btn-primary mt-2 ml-2" type="button" onclick="dopplerFetal()">Calcula</button>
                                </div>

                            </div>
                            <hr class="my-4">
                            <h4 class="mb-3">Doppler de arterias uterinas <span id="sdgesta3">(3+2 sg)</span></h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="uterinaE">Uterina izquierda (IP)</label>
                                    <input type="number" class="form-control border" id="uterinaE" value="" placeholder="IP" onchange="mitjanaUterines()">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="uterinaD">Uterina derecha (IP)</label>
                                    <input type="number" class="form-control border" id="uterinaD" value="" placeholder="IP" onchange="mitjanaUterines()">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="mitjaUt">IP medio de arterias uterinas</label>
                                <div class="input-group">
                                    <input type="text" class="form-control border" id="mitjaUt" aria-label="Media de arterias uterinas" placeholder="IP medio" readonly="">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="percentilUt">p__</span>
                                    </div>
                                    <!--<button type="button" class="btn btn-secondary ml-3" data-toggle="modal" data-target="#ModalRefDoppler">Referencias</button>-->
                                    <button class="btn btn-primary ml-3" type="button" onclick="mitjanaUterines()">Calcula</button>
                                </div>
                            </div>
                            <div class="row col-xs-12">
                                <hr class="my-2">
                            </div>
                        </div>
                    </div>
                    <hr class="mb-3">
                    <small class="text-muted">Los cálculos son referenciales por lo que Ninguna de las partes implicadas en el desarrollo de este software se
                        responsabiliza de posibles errores
                     </small>

             </div>
             <!-- Modal -->
             <div id="myModal" class="modal fade" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Calcula el peso fetal estimado</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group">
                                <div class="col-md-3">
                                    <label for="DBP">DBP:</label>
                                    <input type="number" class="form-control border" id="DBP" onchange="pesEstimat2()">
                                </div>
                                <div class="col-md-3">
                                    <label for="PC">CC:</label>
                                    <input type="number" class="form-control border" id="PC" onchange="pesEstimat2()">
                                </div>
                                <div class="col-md-3">
                                    <label for="PA">PA:</label>
                                    <input type="number" class="form-control border" id="PA" onchange="pesEstimat2()">
                                </div>
                                <div class="col-md-3">
                                    <label for="LF">LF:</label>
                                    <input type="number" class="form-control border" id="LF" onchange="pesEstimat2()">
                                </div>
                                <div class="col-md-9 mb-3 mt-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">PFE:</span>
                                        </div>
                                        <input type="text" class="form-control border" aria-label="Peso fetal estimado" id="pfe2" readonly="">
                                        <div class="input-group-append">
                                            <span class="input-group-text">g</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3 mb-3 mt-3">
                                    <button type="button" class="btn btn-primary btn-block" onclick="pesEstimat2()">Calcula</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="transfer()">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
             </div>
             <!-- Modal referencies Primer -->
             <div id="ModalRefPrimer" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Referencias para la ecografía de 1r Trimestre</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <h5>CRL y edad gestacional:</h5>
                            <p>Napolitano R, Dhami J, Ohuma EO, Ioannou C, Conde-Agudelo A, Kennedy SH, Villar J, Papageorghiou
                                AT. Pregnancy dating by fetal crown-rump length: a systematic review of charts. BJOG. 2014
                                Apr;121(5):556-65. doi: 10.1111/1471-0528.12478. Epub 2014 Jan 6. PMID: 24387345.</p>
                            <p>Robinson HP, Fleming JE. A critical evaluation of sonar "crown-rump length" measurements. Br J
                                Obstet Gynaecol. 1975 Sep;82(9):702-10. doi: 10.1111/j.1471-0528.1975.tb00710.x. PMID: 1182090.
                            </p>
                            <h5>Translucencia nucal:</h5>
                            <p>Borrell et al. Translucencia nucal y ductus venoso: valores de referencia en el primer trimestre
                                de la gestación. Progresos de Obstetricia y Ginecología. Volume 49, Issue 8, 2006, Pages
                                434-440, ISSN
                                0304-5013, doi: 10.1016/S0304-5013(06)72632-2.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
             </div>
             <!-- Modal referencies Doppler -->
             <div id="ModalRefDoppler" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Referencias de doppler fetal y materno</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <h5>IP de las arterias umbilical y cerebral media e índice cerebro-placentario:</h5>
                            <p>Ciobanu A, Wright A, Syngelaki A, Wright D, Akolekar R, Nicolaides KH. Fetal Medicine Foundation
                                reference ranges for umbilical artery and middle cerebral artery pulsatility index and
                                cerebroplacental ratio. Ultrasound Obstet Gynecol. 2019 Apr;53(4):465-472. doi:
                                10.1002/uog.20157. Epub 2019 Feb 13. PMID: 30353583.</p>
                            <h5>MoMs de la arteria cerebral media:</h5>
                            <p>Mari G, Adrignolo A, Abuhamad AZ, Pirhonen J, Jones DC, Ludomirsky A, Copel JA. Diagnosis of
                                fetal anemia with Doppler ultrasound in the pregnancy complicated by maternal blood group
                                immunization. Ultrasound Obstet Gynecol. 1995 Jun;5(6):400-5. doi:
                                10.1046/j.1469-0705.1995.05060400.x. PMID: 7552802.</p>
                            <p>Mari G, Deter RL, Carpenter RL, Rahman F, Zimmerman R, Moise KJ Jr, Dorman KF, Ludomirsky A,
                                Gonzalez R, Gomez R, Oz U, Detti L, Copel JA, Bahado-Singh R, Berry S, Martinez-Poyer J,
                                Blackwell SC. Noninvasive diagnosis by Doppler ultrasonography of fetal anemia due to maternal
                                red-cell alloimmunization. Collaborative Group for Doppler Assessment of the Blood Velocity in
                                Anemic Fetuses. N Engl J Med. 2000 Jan 6;342(1):9-14. doi: 10.1056/NEJM200001063420102. PMID:
                                10620643.</p>
                            <h5>Doppler del ductus venoso: </h5>
                            <p> Hecher K, Campbell S, Snijders R, Nicolaides K. Reference ranges for fetal venous and
                                atrioventricular blood flow parameters. Ultrasound Obstet Gynecol. 1994 Sep 1;4(5):381-390. doi:
                                10.1046/j.1469-0705.1994.04050381.x. PMID: 12797146.</p>
                            <h5>Doppler de arterias uterinas: </h5>
                            <p>Gómez O, Figueras F, Fernández S, Bennasar M, Martínez JM, Puerto B, Gratacós E. Reference ranges
                                for uterine artery mean pulsatility index at 11-41 weeks of gestation. Ultrasound Obstet
                                Gynecol. 2008 Aug;32(2):128-32. doi: 10.1002/uog.5315. PMID: 18457355.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
             </div>
             <!-- Modal Más PFE -->
             <div id="ModalRefPFE" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Percentiles de peso fetal estimado</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="pfemiko" placeholder="p__" value="" readonly="">
                                </div>
                                <div class="col-md-9">
                                    <p id="pfemikotx">Adaptación en población del HUVH en base a la publicación de Mikolajczyk et al. “A Global Reference for Fetal-Weight and Birthweight Percentiles.” The Lancet 377 (9780): 1855–61.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="percentil" placeholder="p__" value="" readonly="">
                                </div>
                                <div class="col-md-9">
                                    <p id="pfevhtx">Curvas de crecimiento en base a peso fetal estimado por ecografía de gestantes de bajo riesgo del Hospital Vall d'Hebron.</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
             </div>
             <script>
                 function edad_gest() {
                        $('#modal_edadgest').modal('show');
                    }
             </script>
             <script>
                    $('#data1').datepicker({ uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'});
                    $('#data2').datepicker({ uiLibrary: 'bootstrap4', format: 'dd/mm/yyyy'});
                    var today = new Date();
                    var dd = today.getDate();

                    var mm = today.getMonth() + 1;
                    var yyyy = today.getFullYear();
                    if (dd < 10) {
                        dd = '0' + dd;
                    }

                    if (mm < 10) {
                        mm = '0' + mm;
                    }
                    today = dd + '/' + mm + '/' + yyyy;
                    document.getElementById('data1').value = today;
                    document.getElementById("anys").innerHTML = "Calculadora gestacional, 2015 - " + yyyy + ". Dra. Alba Farràs Llobet.<br>Hospital Universitari Vall d'Hebron";

                    var sg = 0;
                    document.getElementById('velACMtx').innerHTML = "__M";
                    document.getElementById('ipAUtx').innerHTML = "p__";
                    document.getElementById('ipACMtx').innerHTML = "p__";
                    document.getElementById('ICPtx').innerHTML = "p__";
                    document.getElementById('percentilUt').innerHTML = "p__";
                    document.getElementById('percentilA').innerHTML = "p__";
                    document.getElementById('ipDVtx').innerHTML = "p__";
                    document.getElementById("ref_pfe").innerHTML = "Adaptación en población del HUVH en base a la publicación de Mikolajczyk et al. “A Global Reference for Fetal-Weight and Birthweight Percentiles.” The Lancet 377 (9780): 1855–61.";
                    document.getElementById("pfemikotx").innerHTML = "Adaptación en población del HUVH en base a la publicación de Mikolajczyk et al. “A Global Reference for Fetal-Weight and Birthweight Percentiles.” The Lancet 377 (9780): 1855–61.";
                    document.getElementById("pfevhtx").innerHTML = "Curvas de crecimiento en base a peso fetal estimado por ecografía de gestantes de bajo riesgo del Hospital Vall d'Hebron.";

                    function datamanual() {
                        var data1 = document.getElementById('data1').value;
                        var d1 = new Date(data1); //exploracio
                        var d2 = new Date(data1); // DUR
                        if (document.getElementById('setmanes').value) {
                            let restadies = (Number(document.getElementById('setmanes').value) * 7) + Number(document.getElementById('dies').value);
                            d2.setDate(d2.getDate() - restadies);
                            let dd = d2.getDate();
                            let mm = d2.getMonth() + 1;
                            let yyyy = d2.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }

                            if (mm < 10) {
                                mm = '0' + mm;
                            }

                            document.getElementById('data2').value = dd + '/' + mm + '/' + yyyy;
                            document.getElementById('sdgesta').innerHTML = "(" + document.getElementById('setmanes').value + "+" + document.getElementById('dies').value + " sg)";
                            document.getElementById('sdgesta2').innerHTML = "(" + document.getElementById('setmanes').value + "+" + document.getElementById('dies').value + " sg)";
                            document.getElementById('sdgesta3').innerHTML = "(" + document.getElementById('setmanes').value + "+" + document.getElementById('dies').value + " sg)";
                        } else {
                            document.getElementById('data1').value = today;
                            document.getElementById('data2').value = "";
                            document.getElementById('sdgesta').innerHTML = "";
                            document.getElementById('sdgesta2').innerHTML = "";
                            document.getElementById('sdgesta3').innerHTML = "";
                        }
                    }
                    function mostrarDUR3() {
                        var data = document.getElementById('data1').value;
                        var data2 = document.getElementById('data2').value;
                        var d1 = new Date(data2); //exploracio
                        var d2 = new Date(data)  // DUR
                        if (data && data2) {
                            var sad0 = Math.floor(Math.abs(d1 - d2) / 86400000);
                            var sas = Math.floor(Math.abs(sad0 / 7));
                            var sad = sad0 - (sas * 7);
                            document.getElementById('setmanes').value = sas;
                            document.getElementById('dies').value = sad;
                            document.getElementById('sdgesta').innerHTML = "(" + sas + "+" + sad + " sg)";
                            document.getElementById('sdgesta2').innerHTML = "(" + sas + "+" + sad + " sg)";
                            document.getElementById('sdgesta3').innerHTML = "(" + sas + "+" + sad + " sg)";
                            sg = sad0;
                        } else {
                            document.getElementById('sdgesta').innerHTML = "";
                            document.getElementById('sdgesta2').innerHTML = "";
                            document.getElementById('sdgesta3').innerHTML = "";
                        }
                    }

                    var cont = 0;

                    function lol() {
                        //var diesGestats = document.getElementById('SG').value;
                        var diesGestats = sg;
                        var radios = document.getElementsByName('opt');
                        var sexe = undefined;
                        for (var i = 0, length = radios.length; i < length; i++) {
                            if (radios[i].checked) {
                                // do whatever you want with the checked radio
                                sexe = radios[i].value;
                                // only one radio can be logically checked, don't check the rest
                                break;
                            }
                        }
                        var row = diesGestats - 91;
                        var mu;
                        var sigma;
                        var nu;
                        var tau;
                        if (row >= 0 && row <= 252) {
                            if (sexe == "nen") {
                                mu = parseFloat(nens[row * 5 + 1]);
                                sigma = parseFloat(nens[row * 5 + 2]);
                                nu = parseFloat(nens[row * 5 + 3]);
                                tau = parseFloat(nens[row * 5 + 4]);
                            }
                            else if (sexe == "nena") {
                                mu = parseFloat(nenes[row * 5 + 1]);
                                sigma = parseFloat(nenes[row * 5 + 2]);
                                nu = parseFloat(nenes[row * 5 + 3]);
                                tau = parseFloat(nenes[row * 5 + 4]);
                            }
                            else {
                                mu = (parseFloat(nens[row * 5 + 1]) + parseFloat(nenes[row * 5 + 1])) / 2;
                                sigma = (parseFloat(nens[row * 5 + 2]) + parseFloat(nenes[row * 5 + 2])) / 2;
                                nu = (parseFloat(nens[row * 5 + 3]) + parseFloat(nenes[row * 5 + 3])) / 2;
                                tau = (parseFloat(nens[row * 5 + 4]) + parseFloat(nenes[row * 5 + 4])) / 2;
                            }

                            var t = (Math.pow(pfe / mu, nu) - 1) / (nu * sigma);
                            var percentil = forwardT2(tau, t);
                            document.getElementById('percentil').value = percentil;


                        }
                    }

                    function calcPercentil() {
                        if (document.getElementById('setmanes').value && document.getElementById('pfe3').value > 0) {
                            if (!document.getElementById('dies').value) {
                                document.getElementById('dies').value = 0;
                            }
                            datamanual();
                            var s = document.getElementById('setmanes').value;
                            var d = document.getElementById('dies').value;

                            var diesGestats = parseInt(s) * 7;
                            diesGestats += parseInt(d);

                            var radios = document.getElementsByName('opt');
                            var sexe = undefined;
                            for (var i = 0, length = radios.length; i < length; i++) {
                                if (radios[i].checked) {
                                    // do whatever you want with the checked radio
                                    sexe = radios[i].value;
                                    // only one radio can be logically checked, don't check the rest
                                    break;
                                }
                            }
                            var row = diesGestats - 91;
                            var mu;
                            var sigma;
                            var nu;
                            var tau;
                            var sexo = 0;
                            var pfe = document.getElementById('pfe3').value;
                            if (sexe == "nen") {
                                sexo = 0;
                            } else if (sexe == "nena") {
                                sexo = 1;
                            }
                            if (row >= 7 && row <= 161) { // Rang corbes fins 35w
                                if (sexe == "nen") {
                                    mu = parseFloat(nens[row * 5 + 1]);
                                    sigma = parseFloat(nens[row * 5 + 2]);
                                    nu = parseFloat(nens[row * 5 + 3]);
                                    tau = parseFloat(nens[row * 5 + 4]);
                                    sexo = 0;
                                }
                                else if (sexe == "nena") {
                                    mu = parseFloat(nenes[row * 5 + 1]);
                                    sigma = parseFloat(nenes[row * 5 + 2]);
                                    nu = parseFloat(nenes[row * 5 + 3]);
                                    tau = parseFloat(nenes[row * 5 + 4]);
                                    sexo = 1;
                                }
                                else {
                                    mu = (parseFloat(nens[row * 5 + 1]) + parseFloat(nenes[row * 5 + 1])) / 2;
                                    sigma = (parseFloat(nens[row * 5 + 2]) + parseFloat(nenes[row * 5 + 2])) / 2;
                                    nu = (parseFloat(nens[row * 5 + 3]) + parseFloat(nenes[row * 5 + 3])) / 2;
                                    tau = (parseFloat(nens[row * 5 + 4]) + parseFloat(nenes[row * 5 + 4])) / 2;
                                }
                                var t = (Math.pow(pfe / mu, nu) - 1) / (nu * sigma);
                                var percentil = forwardT2(tau, t);
                                percentil = Math.round(percentil);
                            }

                            // GLOBAL REFERENCE - Mikolajczyk et al
                            var gestawk = (Number(d) + (Number(s) * 7)) / 7;
                            var exponencial = 0;
                            var zscore = 0;
                            var centileA = 0;
                            exponencial = Math.exp(0.578 + 0.332 * (gestawk + 0.5) - 0.00354 * (gestawk + 0.5) * (gestawk + 0.5));
                            zscore = (pfe - exponencial * 0.9223) / (exponencial * 0.1138 * 0.9223);
                            // calcul zscore-percentil

                            var factK = 1;
                            var term = 1;
                            var k = 0;
                            var loopStop = Math.exp(-23);
                            while (Math.abs(term) > loopStop) {
                                term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                                centileA += term;
                                k++;
                                factK *= k;

                            }
                            centileA += 0.5;
                            if (centileA < 0) {
                                centileA = 0;
                            }

                            document.getElementById('percentil').value = "p " + percentil;
                            document.getElementById('pfemiko').value = "p " + Math.round(centileA * 100);
                            document.getElementById('percentilA').innerHTML = "p " + Math.round(centileA * 100);
                            document.getElementById("ref_pfe").innerHTML = "Adaptación en población del HUVH en base a la publicación de Mikolajczyk et al. “A Global Reference for Fetal-Weight and Birthweight Percentiles.” The Lancet 377 (9780): 1855–61.";

                            if (row < 7) { //<14w?
                                document.getElementById('pfemiko').value = "p__";
                                document.getElementById('percentil').value = "p__";
                                document.getElementById('percentilA').innerHTML = "p__";
                                document.getElementById("ref_pfe").innerHTML = "";
                            } else if (row < 77) { // <24w? Fora rang corbes Global
                                document.getElementById('percentil').value = "p " + percentil;
                                document.getElementById('percentilA').innerHTML = "p " + percentil;
                                document.getElementById('pfemiko').value = "p__";
                                document.getElementById("ref_pfe").innerHTML = "*Curvas de crecimiento en base a peso fetal estimado por ecografía de gestantes de bajo riesgo del Hospital Vall d'Hebron.";
                            }
                            if (row > 210) {
                                document.getElementById('percentilA').innerHTML = "p__";
                                document.getElementById('percentil').value = "p__";
                                document.getElementById('pfemiko').value = "p__";
                                document.getElementById("ref_pfe").innerHTML = "";
                            } else if (row > 161) { // Fora rang corbes HUVH
                                document.getElementById('percentil').value = "p__";
                            }
                        }

                    }
                    function ipAUp() {
                        let s = document.getElementById('setmanes').value;
                        let d = document.getElementById('dies').value;
                        let gestawk = (Number(d) + (Number(s) * 7));
                        if (document.getElementById('ipAU').value && gestawk >= 140 && gestawk <= 294) {
                            let ip_AU = Math.log10(document.getElementById('ipAU').value);
                            if (ip_AU == 0) {
                                ip_AU = Math.log10(Number(document.getElementById('ipAU').value) + 0.000001);
                            }
                            let zscore = 0;
                            let centileA = 0;
                            let mitjana = Math.log10(1.64737123 - (0.003004566 * gestawk));
                            let sd = 0.0871258999174847 - (0.000293587139447361 * gestawk) + (0.000000935493584242832 * gestawk * gestawk);

                            zscore = (ip_AU - mitjana) / sd;

                            // calcul zscore-percentil

                            let factK = 1;
                            let term = 1;
                            let k = 0;
                            let loopStop = Math.exp(-23);
                            while (Math.abs(term) > loopStop) {
                                term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                                centileA += term;
                                k++;
                                factK *= k;

                            }
                            centileA += 0.5;
                            if (centileA < 0) {
                                centileA = 0;
                            }


                            document.getElementById('ipAUtx').innerHTML = "p " + + Math.round(centileA * 100);
                        } else {
                            document.getElementById('ipAUtx').innerHTML = "p__";
                        }
                    }
                    function ipACMp() { // Middle cerebral artery blood flow velocities and pulsatility index and the cerebroplacental pulsatility ratio: longitudinal reference ranges and terms for serial measurements
                        let s = document.getElementById('setmanes').value;
                        let d = document.getElementById('dies').value;
                        let gestawk = (Number(d) + (Number(s) * 7));
                        let ip_acm = Math.log10(document.getElementById('ipACM').value);
                        if (document.getElementById('ipACM').value && gestawk >= 140 && gestawk <= 294) {
                            let zscore = 0;
                            let centileA = 0;
                            let mitjana = 0.3117131 - (0.007099515 * gestawk) + (0.00006345179 * gestawk * gestawk) - (0.0000001442668 * gestawk * gestawk * gestawk);
                            let sd = 0.1707559 - (0.001199194 * gestawk) + (0.000003211353 * gestawk * gestawk);
                            zscore = (ip_acm - mitjana) / sd;

                            // calcul zscore-percentil

                            let factK = 1;
                            let term = 1;
                            let k = 0;
                            let loopStop = Math.exp(-23);
                            while (Math.abs(term) > loopStop) {
                                term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                                centileA += term;
                                k++;
                                factK *= k;

                            }
                            centileA += 0.5;
                            if (centileA < 0) {
                                centileA = 0;
                            }
                            document.getElementById('ipACMtx').innerHTML = "p " + + Math.round(centileA * 100);

                        } else {
                            document.getElementById('ipACMtx').innerHTML = "p__";
                        }
                    }
                    function ICPp() {
                        let s = document.getElementById('setmanes').value;
                        let d = document.getElementById('dies').value;
                        let gestawk = Number(d) + (Number(s) * 7);
                        let ip_icp = Math.log10(document.getElementById('ICP').value);
                        if (document.getElementById('ICP').value && gestawk >= 140 && gestawk <= 294) {
                            let zscore = 0;
                            let centileA = 0;
                            let mitjana = -0.3564 + (0.0003969 * gestawk) + (0.00003199 * gestawk * gestawk) - (0.00000009266 * gestawk * gestawk * gestawk);
                            let sd = 0.1948 - (0.00122 * gestawk) + (0.000003262 * gestawk * gestawk);
                            zscore = (ip_icp - mitjana) / sd;
                            // calcul zscore-percentil

                            let factK = 1;
                            let term = 1;
                            let k = 0;
                            let loopStop = Math.exp(-23);
                            while (Math.abs(term) > loopStop) {
                                term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                                centileA += term;
                                k++;
                                factK *= k;

                            }
                            centileA += 0.5;
                            if (centileA < 0) {
                                centileA = 0;
                            }
                            document.getElementById('ICPtx').innerHTML = "p " + + Math.round(centileA * 100);

                        } else {
                            document.getElementById('ICPtx').innerHTML = "p__";
                        }
                    }
                    function velACMm() {
                        var s = document.getElementById('setmanes').value;
                        var d = document.getElementById('dies').value;
                        let gestawk = (Number(d) + (Number(s) * 7)) / 7;
                        let vel_ACM = document.getElementById('velACM').value;
                        if (vel_ACM && gestawk >= 15 && gestawk < 43) {
                            let mitjana = Math.exp(2.30921 + (0.0463954 * gestawk)); //0.0463954
                            document.getElementById('velACMtx').innerHTML = Math.round(100 * vel_ACM / mitjana) / 100 + " MoM";
                        } else {
                            document.getElementById('velACMtx').innerHTML = "__M";
                        }
                    }
                    function ipDVp() {
                        let s = document.getElementById('setmanes').value;
                        let d = document.getElementById('dies').value;
                        let gestawk = (Number(d) + (Number(s) * 7)) / 7;
                        let ip_DV = document.getElementById('ipDV').value;
                        let zscore = 0;
                        let centileA = 0;
                        let mitjana = 0.903 + (-0.0116 * gestawk);
                        let sd = 0.1483;
                        zscore = (ip_DV - mitjana) / sd;
                        // calcul zscore-percentil

                        let factK = 1;
                        let term = 1;
                        let k = 0;
                        let loopStop = Math.exp(-23);
                        while (Math.abs(term) > loopStop) {
                            term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                            centileA += term;
                            k++;
                            factK *= k;

                        }
                        centileA += 0.5;
                        if (centileA < 0) {
                            centileA = 0;
                        }
                        if (ip_DV && gestawk >= 20 && gestawk <= 41) {
                            document.getElementById('ipDVtx').innerHTML = "p " + + Math.round(centileA * 100);
                        } else {
                            document.getElementById('ipDVtx').innerHTML = "p__";
                        }
                    }
                    function calculaIndex() {
                        var ip_acm = document.getElementById('ipACM').value;
                        var ip_umb = document.getElementById('ipAU').value;
                        if (ip_acm && ip_umb) {
                            document.getElementById('ICP').value = Math.round(ip_acm * 100 / ip_umb) / 100;
                            ICPp();
                        } else if (document.getElementById('ICP').value) {
                            ICPp();
                        }
                    }
                    function dopplerFetal() {
                        calculaIndex()
                        if (document.getElementById('setmanes').value) {
                            if (!document.getElementById('dies').value) {
                                document.getElementById('dies').value = 0;
                            }
                            datamanual();
                            ipACMp();
                            velACMm();
                            ipDVp();
                            ipAUp();
                        }
                    }
                    function Trimestre1() {
                        var crl = document.getElementById('crl').value;
                        var diesgesta = 23.73 + 8.052 * Math.sqrt(1.037 * Number(crl))
                    }
                    function pesEstimat2() {
                        if (document.getElementById('PA').value && document.getElementById('PC').value && document.getElementById('LF').value && document.getElementById('DBP').value) {
                            var h3 = Math.pow(10, (1.326 - (0.00326 * (document.getElementById('PA').value * 0.1) * (document.getElementById('LF').value * 0.1)) + (0.0107 * (document.getElementById('PC').value * 0.1)) + (0.0438 * (document.getElementById('PA').value * 0.1)) + (0.158 * (document.getElementById('LF').value * 0.1))));
                            var h4 = Math.pow(10, (1.3596 + (0.0064 * (document.getElementById('PC').value * 0.1)) + (0.0424 * (document.getElementById('PA').value * 0.1)) + (0.174 * (document.getElementById('LF').value * 0.1)) + (0.00061 * (document.getElementById('DBP').value * 0.1) * (document.getElementById('PA').value * 0.1)) - (0.00386 * (document.getElementById('PA').value * 0.1)) * (document.getElementById('LF').value * 0.1)));

                            document.getElementById('pfe2').value = Math.round(h4);
                        } else {
                            document.getElementById('pfe2').value = "";
                        }
                    }
                    function transfer() {
                        document.getElementById('pfe3').value = document.getElementById('pfe2').value;
                        calcPercentil();
                    }
                    function mitjanaUterines() {
                        if (document.getElementById('setmanes').value && document.getElementById('uterinaE').value) {
                            if (!document.getElementById('dies').value) {
                                document.getElementById('dies').value = 0;
                            }
                            datamanual();
                            var s = document.getElementById('setmanes').value;
                            var d = document.getElementById('dies').value;
                            var mitjana = (Number(document.getElementById('uterinaE').value) + Number(document.getElementById('uterinaD').value)) / 2;
                            document.getElementById('mitjaUt').value = mitjana;

                            // O. GOMEZ, F. FIGUERAS, Reference ranges for uterine artery mean pulsatility index at 11–41 weeks of gestation
                            var gestad = Number(d) + (Number(s) * 7);
                            var centileA = 0;
                            let mpoblacio = 1.39 - 0.012 * (gestad) + 0.0000198 * (gestad) * (gestad);
                            let sd = 0.272 - (gestad * 0.000259);
                            let zscore = (Math.log(mitjana) - mpoblacio) / sd;
                            // calcul zscore-percentil
                            var factK = 1;
                            var term = 1;
                            var k = 0;
                            var loopStop = Math.exp(-23);
                            while (Math.abs(term) > loopStop) {
                                term = .3989422804 * Math.pow(-1, k) * Math.pow(zscore, k) / (2 * k + 1) / Math.pow(2, k) * Math.pow(zscore, k + 1) / factK;
                                centileA += term;
                                k++;
                                factK *= k;

                            }
                            centileA += 0.5;
                            if (centileA < 0) {
                                centileA = 0;
                            }
                            document.getElementById('percentilUt').innerHTML = "p " + Math.round(centileA * 100);
                        }
                    }
                    function calcPrimer() {
                        if (document.getElementById('crl').value) {
                            let crlm = Number(document.getElementById('crl').value);
                            let diesg = Math.round(8.052 * Math.sqrt(crlm * 1.037) + 23.73);
                            document.getElementById('CRLtx').innerHTML = Math.floor(diesg / 7) + "+" + (diesg - (Math.floor(diesg / 7) * 7)) + " sg";

                            let data1 = document.getElementById('data1').value;
                            let d1 = new Date(data1); //exploracio
                            let d2 = new Date(data1); // DUR

                            let restadies = Math.round(diesg);
                            d2.setDate(d2.getDate() - restadies);
                            let dd = d2.getDate();
                            let mm = d2.getMonth() + 1;
                            let yyyy = d2.getFullYear();
                            if (dd < 10) {
                                dd = '0' + dd;
                            }

                            if (mm < 10) {
                                mm = '0' + mm;
                            }
                            document.getElementById('crl_fur').innerHTML = "(FUR corregida: " + dd + '/' + mm + '/' + yyyy + ")";
                            if (crlm >= 45 && crlm <= 84) {
                                var vars = {};
                                vars['c45'] = "p95 = 1.88; p99 = 2.27";
                                vars['c46'] = "p95 = 1.92; p99 = 2.32";
                                vars['c47'] = "p95 = 1.97; p99 = 2.38";
                                vars['c48'] = "p95 = 2.01; p99 = 2.43";
                                vars['c49'] = "p95 = 2.05; p99 = 2.47";
                                vars['c50'] = "p95 = 2.09; p99 = 2.52";
                                vars['c51'] = "p95 = 2.13; p99 = 2.57";
                                vars['c52'] = "p95 = 2.17; p99 = 2.61";
                                vars['c53'] = "p95 = 2.21; p99 = 2.66";
                                vars['c54'] = "p95 = 2.25; p99 = 2.70";
                                vars['c55'] = "p95 = 2.29; p99 = 2.75";
                                vars['c56'] = "p95 = 2.33; p99 = 2.79";
                                vars['c57'] = "p95 = 2.36; p99 = 2.83";
                                vars['c58'] = "p95 = 2.40; p99 = 2.87";
                                vars['c59'] = "p95 = 2.43; p99 = 2.91";
                                vars['c60'] = "p95 = 2.47; p99 = 2.95";
                                vars['c61'] = "p95 = 2.50; p99 = 2.99";
                                vars['c62'] = "p95 = 2.53; p99 = 3.03";
                                vars['c63'] = "p95 = 2.56; p99 = 3.07";
                                vars['c64'] = "p95 = 2.60; p99 = 3.11";
                                vars['c65'] = "p95 = 2.63; p99 = 3.15";
                                vars['c66'] = "p95 = 2.66; p99 = 3.18";
                                vars['c67'] = "p95 = 2.69; p99 = 3.22";
                                vars['c68'] = "p95 = 2.72; p99 = 3.26";
                                vars['c69'] = "p95 = 2.75; p99 = 3.29";
                                vars['c70'] = "p95 = 2.78; p99 = 3.33";
                                vars['c71'] = "p95 = 2.81; p99 = 3.36";
                                vars['c72'] = "p95 = 2.84; p99 = 3.40";
                                vars['c73'] = "p95 = 2.86; p99 = 3.43";
                                vars['c74'] = "p95 = 2.89; p99 = 3.46";
                                vars['c75'] = "p95 = 2.92; p99 = 3.50";
                                vars['c76'] = "p95 = 2.95; p99 = 3.53";
                                vars['c77'] = "p95 = 2.97; p99 = 3.56";
                                vars['c78'] = "p95 = 3.00; p99 = 3.60";
                                vars['c79'] = "p95 = 3.02; p99 = 3.66";
                                vars['c80'] = "p95 = 3.05; p99 = 3.69";
                                vars['c81'] = "p95 = 3.08; p99 = 3.69";
                                vars['c82'] = "p95 = 3.10; p99 = 3.72";
                                vars['c83'] = "p95 = 3.13; p99 = 3.75";
                                vars['c84'] = "p95 = 3.15; p99 = 3.78";

                                document.getElementById('tn').value = vars['c' + Math.round(crlm)];
                            } else {
                                document.getElementById('tn').value = "";
                            }

                        } else {
                            document.getElementById('CRLtx').innerHTML = "(eg)";
                            document.getElementById('crl_fur').innerHTML = "";
                            document.getElementById('tn').value = "";
                        }
                    }
             </script>
        </div>
    </div>
</div>
