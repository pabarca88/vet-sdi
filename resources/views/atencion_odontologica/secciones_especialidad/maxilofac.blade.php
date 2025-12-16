<div class="row">
    <div class="col-md-12">
        <div class="tab-content" id="dental-contenido">
            <div class="tab-pane fade show active" id="ficha-dental" role="tabpanel" aria-labelledby="ficha-dental-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Ficha de atención dental Especialidad Maxilo-Facial</h5>
                        <hr>
                    </div>
                    <hr>

                    <!--Formulario / Motivo consulta-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Motivo de la consulta</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Motivo consulta-->
                    <!--Formulario / Antecedentes-->
                    <div class="col-md-12">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12 mx-auto">
                                                    <label class="floating-label">Descripción</label>
                                                    <textarea class="form-control caja-texto form-control-sm" rows="1" name="descripcion_antecedentes" id="descripcion_antecedentes"></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Antecedentes dentales</h6>
                                    </div>
                                    <div class="card-body pt-1 pb-1">
                                       <form>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info1();" id="flexCheckDefault1">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                Problemas con la anestesia local
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info2();" id="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Hemorragias
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" role="button" onclick="info_info3();" id="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckChecked">
                                                Fracturas
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Cierre: Formulario / Antecedentes-->



                    <!--Formulario / cirugia maxilo-->
                    <div class="col-sm-12">
                        <div class="card">
                            <a class="label" data-toggle="collapse" href="#f_cir_max" role="button" aria-expanded="false" aria-controls="f_orto">
                                <div class="card mb-3">
                                    <div class="card-header bg-info align-middle">
                                        <h6 class="float-left d-inline">ESTUDIO MAXILO-FACIAL</h6><h6 class="text-center">Examen Clínico</h6>
                                        <i id="f_cir_max" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                    </div>
                                </div>
                            </a>
                            <div class="collapse" id="f_cir_max" style="">
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h6 class="text-center">Examen Extra-Oral</h6>
                                                    </div>
                                                    <div class="card-body pt-1 pb-1" >
                                                        <div class="form-row">
                                                            <form>
                                                                <div class="form-group col-md-4">
                                                                    <div class="">
                                                                    <h6 class="text-center">Examen General Extra-Oral</h6>
                                                                    </div>
                                                                    {{--  <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm">
                                                                            <option selected value="0">Biotipo </option>
                                                                            <option>Biotipo Mesofacial</option>
                                                                            <option>Biotipo Braquifacial</option>
                                                                            <option>Biotipo Dólicofacial</option>
                                                                        </select>
                                                                    </div>  --}}

                                                                    {{--  <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Tipo Esqueletal </option>
                                                                            <option>Tipo I</option>
                                                                            <option>Tipo II Mandíbular</option>
                                                                            <option>Tipo II Maxilar</option>
                                                                            <option>Tipo III Mandíbular</option>
                                                                            <option>Tipo III Maxilar</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="floating-label"></label>
                                                                        <select id="" name="" class="form-control form-control-sm"  >
                                                                            <option selected value="0">Tipo de Crecimiento </option>
                                                                            <option>Horario</option>
                                                                            <option>Neutro</option>
                                                                            <option>Anti-Horario</option>
                                                                        </select>
                                                                    </div>  --}}
                                                                </div>
                                                                <div class="form-group col-md-8">
                                                                    <div class="form-group">
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-12 mx-auto" style="margin-top:16px">
                                                                                    <label class="floating-label"></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Examen Clínico General"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <form>
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-12 mx-auto">
                                                                                    <label class="floating-label"></label>
                                                                                    <textarea class="form-control caja-texto form-control-sm" rows="2" name="descripcion_antecedentes" id="descripcion_antecedentes" placeholder="Comentarios al examen extra-oral"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h6 class="text-center">Examen De Frente</h6>
                                                    </div>
                                                    <div class="card-body col-md-12" >
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" >
                                                                <div class="imagen_ortognatica" style="background-image: url(i/especialidad/ortognatica_alineamiento_es.png);">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_1_ficha_ortognatica" name="ex_frontal_sup" data-toggle="tooltip" data-placement="left auto" data-title="Superior" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_2_ficha_ortognatica" name="ex_frontal_med" data-toggle="tooltip" data-placement="left auto" data-title="Medio" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_1" id="input_3_ficha_ortognatica" name="ex_frontal_inf" data-toggle="tooltip" data-placement="left auto" data-title="Inferior" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_18_ficha_ortognatica" name="ex_frontal_nariz" data-toggle="tooltip" data-placement="right auto" data-title="Nariz" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_19_ficha_ortognatica" name="ex_frontal_isup" data-toggle="tooltip" data-placement="right auto" data-title="Inc. Sup." data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_20_ficha_ortognatica" name="ex_frontal_iinf" data-toggle="tooltip" data-placement="right auto" data-title="Inc. Inf." data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_21_ficha_ortognatica" name="ex_frontal_menton" data-toggle="tooltip" data-placement="right auto" data-title="Mentón" data-original-title="" title="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="imagen_ortognatica" style="background-image: url(i/especialidad/ortognatica_tercios_es.png);">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_4_ficha_ortognatica" name="ex_frontal_gn" data-toggle="tooltip" data-placement="top auto" data-title="Distancia de Tr hasta Gn" tabindex="-1" readonly="" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_5_ficha_ortognatica" name="ex_frontal_ft" data-toggle="tooltip" data-placement="left auto" data-title="Ft" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_6_ficha_ortognatica" name="ex_frontal_zy" data-toggle="tooltip" data-placement="left auto" data-title="Zy" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input input_ortognatica_2" id="input_7_ficha_ortognatica" name="ex_frontal_go" data-toggle="tooltip" data-placement="left auto" data-title="Go" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_8_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_9_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_10_ficha_ortognatica" tabindex="-1" readonly="" data-toggle="tooltip" data-placement="right auto" data-title="Proporción" data-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body col-md-12" >
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6" >
                                                                <div class="imagen_ortognatica_ancha" style="background-image: url(i/especialidad/ortognatica_canteo_es.png);">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_22_ficha_ortognatica" name="canteo_molar_1" data-toggle="tooltip" data-placement="bottom auto" data-title="Molar Der." data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_23_ficha_ortognatica" name="canteo_canino_1" data-toggle="tooltip" data-placement="bottom auto" data-title="Canino Der." data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_24_ficha_ortognatica" name="canteo_canino_2" data-toggle="tooltip" data-placement="bottom auto" data-title="Canino Izq." data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="input_25_ficha_ortognatica" name="canteo_molar_2" data-toggle="tooltip" data-placement="bottom auto" data-title="Molar Izq." data-original-title="" title="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <table class="table_full margin_bottom">
                                                                    <tbody>
                                                                        <tr><td colspan="2"><label class="margin_bottom"><h5>Relación Labio Diente</h5></label></td></tr>
                                                                        <tr>
                                                                            <td> <h6 style="margin-right:30px">Reposo:</h6></td>
                                                                            <td style="width:140px;">
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text" id="labio_diente_reposo" name="labio_diente_reposo" class="form-control input-sm text-right">
                                                                                    <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><h6>Sonrisa:</h6></td>
                                                                            <td>
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text" id="labio_diente_sonrisa" name="labio_diente_sonrisa" class="form-control input-sm text-right">
                                                                                   <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><h6>Risa:</h6></td>
                                                                            <td>
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text" id="labio_diente_risa" name="labio_diente_risa" class="form-control input-sm text-right">
                                                                                    <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr><td colspan="2"><label class="margin_top margin_bottom"><h5 style="Margin-top:25px">Gradiente de Canteo</h5></label></td></tr>
                                                                        <tr>
                                                                            <td><h6>Molar:</h6></td>
                                                                            <td>
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text" class="form-control input-sm text-right" name="canteo_gradiente_molar">
                                                                                    <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td><h6>Canino:</h6></td>
                                                                            <td>
                                                                                <div class="input-group-prepend">
                                                                                    <input type="text" class="form-control input-sm text-right" name="canteo_gradiente_canino">
                                                                                   <span class="input-group-text"><font style="vertical-align: inherit;">mm.</font></span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h6 class="text-center">Examen De Perfíl</h6>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <div class="imagen_ortognatica" style="background-image: url(i/especialidad/ortognatica_perfil.png);">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_11_ficha_ortognatica" name="ex_perfil_ls" data-toggle="tooltip" data-placement="right" data-title="Ls" data-original-title="" title="">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_12_ficha_ortognatica" name="ex_perfil_li" data-toggle="tooltip" data-placement="right" data-title="Li" data-original-title="" title="">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_13_ficha_ortognatica" name="ex_perfil_pg" data-toggle="tooltip" data-placement="right" data-title="Pg" data-original-title="" title="">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_14_ficha_ortognatica" name="ex_perfil_gn" data-toggle="tooltip" data-placement="right" data-title="Distancia de C hasta Gn" data-original-title="" title="">
                                                                <div id="cervico_prop">
                                                                    <input type="text" class="form-control input-sm ort_input" id="ang_cerv" name="ex_perfil_ac" data-toggle="tooltip" data-placement="bottom" data-title="Ángulo Cervicofacial" data-original-title="" title="">
                                                                    <input type="text" class="form-control input-sm ort_input" id="prop_cerv" name="ex_perfil_pc" data-toggle="tooltip" data-placement="bottom" data-title="Proporción Cervicofacial" style="left:54px;" data-original-title="" title="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="imagen_ortognatica_ancha" style="background-image: url(i/especialidad/ortognatica_nariz_inf.png);">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_15_ficha_ortognatica" name="ex_perfil_c1" data-toggle="tooltip" data-placement="right" data-title="Sn-Prn" data-original-title="" title="">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_16_ficha_ortognatica" name="ex_perfil_a1" data-toggle="tooltip" data-placement="right" data-title="Al" data-original-title="" title="">
                                                                <input type="text" class="form-control input-sm ort_input" id="input_17_ficha_ortognatica" name="ex_perfil_ac2" data-toggle="tooltip" data-placement="right" data-title="Ac" data-original-title="" title="">
                                                            </div>
                                                            <table class="col-md-6 col-md-offset-2 text-center margin_bottom">
                                                                <tbody>
                                                                    <tr><td colspan="2"><label class="margin_bottom">Ancho Interalar en Cirugía</label></td></tr>
                                                                    <tr>
                                                                        <td width="50%">c/TNT:</td>
                                                                        <td width="50%">
                                                                            <div class="input-group margin_bottom">
                                                                                <input type="text" class="form-control input-sm text-right" name="ancho_interalar_con">
                                                                                <span class="input-group-addon">mm.</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>s/TNT:</td>
                                                                        <td>
                                                                            <div class="input-group margin_bottom">
                                                                                <input type="text" class="form-control input-sm text-right" name="ancho_interalar_sin">
                                                                                <span class="input-group-addon">mm.</span>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h6 class="text-center">Examen nariz</h6>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <label>Dorso:</label>
                                                                <input type="hidden" name="nariz_dorso" value="1">
                                                                <div id="nariz_dorso" class="nariz_img margin_bottom" data-toggle="popover" data-original-title="" title="" aria-describedby="popover_nariz"></div>

                                                                <div class="popover fade right in" role="tooltip" id="popover_nariz" style="top: 119.562px; left: 137px; display: block;">
                                                                    <div class="arrow" style="top: 15.0179%;"><h3 class="popover-title" style="display: none;"></h3>
                                                                        <div class="popover-content">
                                                                            <ul class="menu_nariz">
                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(1);">
                                                                                    <a><img src="../i/especialidad/nariz_1.png" class="cuadro_nariz" alt="Nariz"></a>
                                                                                </li>
                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(2);">
                                                                                    <a><img src="../i/especialidad/nariz_2.png" class="cuadro_nariz" alt="Nariz"></a>
                                                                                </li>
                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(3);">
                                                                                    <a><img src="../i/especialidad/nariz_3.png" class="cuadro_nariz" alt="Nariz"></a>
                                                                                </li>
                                                                                <li class="li_menu_nariz" onclick="cambiar_nariz(4);">
                                                                                    <a><img src="../i/especialidad/nariz_4.png" class="cuadro_nariz" alt="Nariz"></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <label>Ángulo Columela Labio:</label>
                                                                <div class="input-group margin_bottom" style="width:50px;margin-left:15px;text-align:middle">
                                                                    <input type="text" class="form-control input-sm text-center" name="nariz_angulo">
                                                                    <span class="input-group-addon">Grados</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label>Punta nasal:</label>
                                                            <textarea name="nariz_punta" class="form-control input-sm margin_bottom" placeholder="Descripción de la punta nasal"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-header bg-info">
                                                        <h6 class="text-center">Angulos de Perfil</h6>
                                                    </div>
                                                    <table id="tabla_ortog">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-center align-middle">perfil_m1</th>
                                                                <th class="text-center align-middle">perfil_m2</th>
                                                                <th class="text-center align-middle">perfil_m21</th>
                                                                <th class="text-center align-middle">perfil_m22</th>
                                                                <th class="text-center align-middle">perfil_m3</th>
                                                                <th class="text-center align-middle">perfil_m4</th>
                                                                <th class="text-center align-middle">perfil_m5</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m1" name="ex_perfil_m1"> </textarea>
                                                                </td>
                                                                <td >
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m2"></textarea>
                                                                </td>
                                                                <td >
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m21" name="ex_perfil_m21"></textarea>
                                                                </td>
                                                                <td >
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m22"></textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m3"></textarea>
                                                                </td>
                                                                <td >
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m4"></textarea>
                                                                </td>
                                                                <td >
                                                                    <textarea style="#" class="form-control input-sm" id="ex_perfil_m2" name="ex_perfil_m5"></textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-sm-12 mt-3">
                                                <div class="card-header bg-info">
                                                    <h6 class="text-center">Comentarios nariz</h6>
                                                </div>
                                                <div class="card">
                                                    <label class="floating-label">Comentarios al Examen</label>
                                                    <textarea class="form-control input-sm margin_bottom" rows="3" name="descripcion_antecedentes" id="Comentarios al Examen Facial"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-header bg-info">
                                        <h6>Diagnóstico</h6>
                                    </div>
                                    <div class="card-body">
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Hipótesis diagnóstica</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Diagnóstico CIE-10</label>
                                                    <input type="text" class="form-control form-control-sm" name="" id="">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <form>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                        <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_medicamento();"><i class="fa fa-plus"></i> Indicar medicamento</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="i_examen();"><i class="fa fa-plus"></i> Indicar examen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="col-sm-12 mt-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar ficha clínica</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="est_rx" role="tabpanel" aria-labelledby="est_rx-tab">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mx-auto">
                                            <label class="floating-label">Listado de Anomalias del Examen Clínico</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="2" name="list_alt_ortod1" id="list_alt_ortod1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Análisis Esqueletales Sagitales</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SNA</td>
                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SNB</td>
                                                    <td class="text-left align-middle">82 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo ANB</td>
                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Prof Facial</td>
                                                    <td class="text-left align-middle">87 +/- 3°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Convex. Facial</td>
                                                    <td class="text-left align-middle">2 +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones Esqueletales Verticales</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Relación de alturas faciales Harvold: N-ANS/ANS-Me</td>
                                                    <td class="text-left align-middle">0.8 +/- 0.05 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">% de alturas faciales P-A Jarabak: S-Go/ N-Me x 100</td>
                                                    <td class="text-left align-middle">59 - 63%</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo SN - GoGn</td>
                                                    <td class="text-left align-middle">32° +/- 2°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo PP-PM</td>
                                                    <td class="text-left align-middle">25° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Eje Facial</td>
                                                    <td class="text-left align-middle">90° +/- 3</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones Dentarias</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo 1 - PP</td>
                                                    <td class="text-left align-middle">110° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">1 - Apo</td>
                                                    <td class="text-left align-middle">3.5 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo 1 inf - PM</td>
                                                    <td class="text-left align-middle">90° +/- 3°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Á1 inf - Apo</td>
                                                    <td class="text-left align-middle">1 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo Intercisivo</td>
                                                    <td class="text-left align-middle">130° +/- 5°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="dt-responsive table-responsive pb-4">
                                        <table id="" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-left align-middle">Consideraciones de Tejidos Blandos</th>
                                                    <th class="text-left align-middle">Norma + - DS</th>
                                                    <th class="text-left align-middle">Valor T1</th>
                                                    <th class="text-left align-middle">Dif T1</th>
                                                    <th class="text-left align-middle">Valor T2</th>
                                                    <th class="text-left align-middle">Dif T2</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio superior</td>
                                                    <td class="text-left align-middle">- 4 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Línea E (punta nasal-Pg blando) a labio inferior</td>
                                                    <td class="text-left align-middle">- 2 +/- 2 mm.</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Ángulo Naso - Labial</td>
                                                    <td class="text-left align-middle">108° +/- 8°</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Gap Labial (perpendicular a Vert Sn)</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Exposición Incisiva (perpendicular a Vert Sn)</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Labio Superior - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">2 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Labio Inferior - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">0 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-left align-middle">Mentón - Vertical Subnasal</td>
                                                    <td class="text-left align-middle">4 +/- 2 mm</td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                    <td class="text-left align-middle"><input type="text" class="form-control form-control-sm" name="" id=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                     <!--Formulario / diagnóstico rx-->
                                    <div class="col-sm-12">
                                        <div class="card">
                                            <a class="label" data-toggle="collapse" href="#Dg_rx" role="button" aria-expanded="false" aria-controls="Dg_rx">
                                                <div class="card mb-3">
                                                    <div class="card-header bg-info align-middle">
                                                        <h6 class="float-left d-inline">Diagnóstico Radiológico</h6>
                                                        <i id="Dg_rx" class="float-right f-18 d-inline fas fa-angle-down  mb-0" style="cursor:pointer"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="collapse" id="Dg_rx" style="">
                                                <div class="card-body">
                                                    <form>
                                                        <div class="form-row" id="form_dg_rx">
                                                            <div class="form-group col-md-6">
                                                                <select class="form-control input-sm margin_bottom" id="diag_esqueletal" name="diag_esqueletal">
                                                                    <option value="0" disabled="" selected="">Tipo_esqueletal</option>
                                                                    <option value="1">Tipo I</option>
                                                                    <option value="2">Tipo II Mandíbula</option>
                                                                    <option value="3">Tipo II Maxilar</option>
                                                                    <option value="4">Tipo III Mandíbula</option>
                                                                    <option value="5">Tipo III Maxilar</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <select class="form-control input-sm margin_bottom" id="diag_facial" name="tipo_facial">
                                                                    <option value="0" disabled="" selected="">Biotipo</option>
                                                                    <option value="1">Mesofacial</option>
                                                                    <option value="2">Braquifacial</option>
                                                                    <option value="3">Dólicofacial</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="floating-label">Diagnóstico</label>
                                                                <textarea id="dg_rx_cefalometrico" class="form-control margin_bottom resize_vertical" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Cierre: Formulario /diagnóstico rx-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="analisis_dent_mod" role="tabpanel" aria-labelledby="analisis_dent_mod-tab">
                <br>
                <div class="barra_titulo">
                    <h5 class="color_dd_title">Dientes y modelos</h5>
                </div>
                    <table class="table table-condensed table_no_bg table_full align_middle no_margin">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Forma</th>
                                <th>Ausencias</th>
                                <th class="border_right">Discrepancia</th>
                                <th width="34%">Facetas de desgastes y Contactos prematuros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Arco Superior</th>
                                <td>
                                    <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_sup_f">
                                        <option value="0">Tipo de forma</option>
                                        <option value="1">Semicircular</option>
                                        <option value="2">Cuadrangular</option>
                                        <option value="3">Triangular</option>
                                        <option value="4">Otra</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control input-sm" name="arc_sup_a"></td>
                                <td class="border_right"><input type="text" class="form-control input-sm" name="arc_sup_d"></td>
                                <td>
                                    <input type="text" id="facetas_desgastes" placeholder="Facetas de desgastes" class="form-control input-sm" name="faceta_desgaste">
                                </td>
                            </tr>
                            <tr>
                                <th>Arco Inferior</th>
                                <td>
                                    <select id="esp_tipo_porma_sup" class="form-control input-sm" name="arc_inf_f">
                                        <option selected="" disabled="" value="0">Tipo de forma</option>
                                        <option value="1">Semicircular</option>
                                        <option value="2">Cuadrangular</option>
                                        <option value="3">Triangular</option>
                                        <option value="4">Otra</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control input-sm" name="arc_inf_a"></td>
                                <td class="border_right"><input type="text" class="form-control input-sm" name="arc_inf_d"></td>
                                <td>
                                    <input type="text" id="contactos_prematuros" placeholder="Contactos prematuros" class="form-control input-sm" name="contacto_prematuro">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table_full align_middle no_margin">
                        <thead>
                            <tr>
                                <th width="33%" colspan="3" class="border_right">Modelos en oclusión</th>
                                <th width="33%" colspan="2">Modelos en ventaja</th>
                                <th width="34%">Modelos en ventaja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th></th>
                                <th>Derecho</th>
                                <th class="border_right">Izquierdo</th>
                                <td width="15%">Over bite:</td>
                                <td class="border_right">
                                    <div class="input-group margin_bottom">
                                        <input type="text" name="ventaja_ob" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                                <td class="align_top" rowspan="5">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="ventaja_coordinacion" name="ventaja_coordinacion" class="ventaja_check"> Coordinación                    </label>
                                    </div>
                                    <input type="text" id="ventaja_coordinacion_txt" name="ventaja_coordinacion_txt" class="form-control input-sm hide">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="ventaja_competencia_a" name="ventaja_competencia_a" class="ventaja_check"> Competencia Trans. Ant.                    </label>
                                    </div>
                                    <input type="text" id="ventaja_competencia_a_txt" name="ventaja_competencia_a_txt" class="form-control input-sm hide">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="ventaja_competencia_p" name="ventaja_competencia_p" class="ventaja_check"> Competencia Trans. Post.                    </label>
                                    </div>
                                    <input type="text" id="ventaja_competencia_p_txt" name="ventaja_competencia_p_txt" class="form-control input-sm hide">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="ventaja_linea_dentaria" name="ventaja_linea_dentaria" class="ventaja_check"> Líneas Medias Dentarias                    </label>
                                    </div>
                                    <input type="text" id="ventaja_linea_dentaria_txt" name="ventaja_linea_dentaria_txt" class="form-control input-sm hide">
                                </td>
                            </tr>
                            <tr>
                                <th class="no_border_top">Clase molar</th>
                                <td class="no_border_top">
                                    <select class="form-control input-sm" name="clase_molar_d">
                                        <option value="0">Tipo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                                <td class="no_border_top border_right">
                                    <select class="form-control input-sm" name="clase_molar_i">
                                        <option value="0">Tipo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                                <td class="no_border_top">Over jet:</td>
                                <td class="no_border_top border_right">
                                    <div class="input-group margin_bottom">
                                        <input type="text" name="ventaja_oj" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="no_border_top">Clase canina</th>
                                <td class="no_border_top">
                                    <select class="form-control input-sm" name="clase_canina_d">
                                        <option value="0">Tipo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                                <td class="no_border_top border_right">
                                    <select class="form-control input-sm" name="clase_canina_i">
                                        <option value="0">Tipo</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </td>
                                <td class="no_border_top">Periodo Ventana Derecha:</td>
                                <td class="no_border_top border_right">
                                    <div class="input-group margin_bottom">
                                        <input type="text" name="ventaja_d" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="no_border_top">Mordida cruzada</th>
                                <td class="no_border_top">
                                    <select class="form-control input-sm" name="clase_cruzada_d">
                                        <option value="0">Tipo</option>
                                        <option value="1">Posterior</option>
                                        <option value="2">Anterior</option>
                                    </select>
                                </td>
                                <td class="no_border_top border_right">
                                    <select class="form-control input-sm" name="clase_cruzada_i">
                                        <option value="0">Tipo</option>
                                        <option value="1">Posterior</option>
                                        <option value="2">Anterior</option>
                                    </select>
                                </td>
                                <td class="no_border_top">Periodo Ventana Izquierda:</td>
                                <td class="no_border_top border_right">
                                    <div class="input-group margin_bottom">
                                        <input type="text" name="ventaja_i" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                            </tr>
                            <tr class="border_bottom">
                                <td class="no_border_top border_right" colspan="3"></td>
                                <td class="no_border_top">Necesidad de Segmentos:</td>
                                <td class="no_border_top border_right"><input type="text" name="necesidad_segmentos" class="form-control input-sm text-center"></td>
                            </tr>
                            <tr>
                                <th class="border_right" colspan="3">Oclusión Anterior</th>
                                <th colspan="2">
                                    Modelo                <i class="glyphicon glyphicon-question-sign clickeable" id="help-modelo" data-content="Realizar marcas dentro del área de dibujo" rel="popover" data-placement="top" data-original-title="Dibujo" data-trigger="hover"></i>
                                    <button type="button" class="btn btn-info btn-sm pull-right" id="clear-modelo">Limpiar</button>
                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                <td class="no_border_top">Over bite:</td>
                                <td class="no_border_top border_right" colspan="2">
                                    <div class="input-group margin_bottom" style="width:120px">
                                        <input type="text" name="oclusion_ob" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                                <td class="no_border_top" colspan="3" rowspan="7">
                                    {{--  <input type="hidden" name="modelo_imagen" value="{&quot;lines&quot;:[[[173.72,59.91],[173.72,60.91],[171.72,60.91],[168.72,62.91],[162.72,67.91],[150.72,73.91],[138.72,81.91],[123.72,88.91],[109.72,95.91],[96.72,101.91],[86.72,107.91],[83.72,108.91],[80.72,110.91],[80.72,111.91]],[[98.72,70.91],[100.72,70.91],[101.72,70.91],[107.72,73.91],[116.72,76.91],[122.72,80.91],[134.72,85.91],[149.72,95.91],[172.72,107.91],[180.72,114.91],[190.72,119.91],[192.72,121.91],[193.72,121.91]],[[245.72,30.91],[245.72,31.91],[243.72,32.91],[242.72,34.91],[239.72,38.91],[234.72,43.91],[229.72,48.91],[225.72,52.91],[221.72,56.91],[219.72,59.91],[215.72,63.91],[214.72,64.91]],[[233.72,30.91],[233.72,32.91],[233.72,40.91],[234.72,42.91],[235.72,49.91],[235.72,54.91],[235.72,57.91],[235.72,59.91],[235.72,60.91]]]}">  --}}
                                    <input type="hidden" name="modelo_imagen" value="">
                                    <div id="modelo_imagen" class="kbw-signature"><canvas width="318" height="215"></canvas></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="no_border_top">Over jet:</td>
                                <td class="no_border_top border_right" colspan="2">
                                    <div class="input-group margin_bottom" style="width:120px">
                                        <input type="text" name="oclusion_oj" class="form-control input-sm text-right">
                                        <span class="input-group-addon">mm.</span>
                                    </div>
                                </td>
                            </tr>
                            <tr><td class="no_border_top" colspan="3"></td></tr>
                            <tr><td class="no_border_top" colspan="3"></td></tr>
                            <tr><td class="no_border_top" colspan="3"></td></tr>
                            <tr><td class="no_border_top" colspan="3"></td></tr>
                            <tr><td class="no_border_top" colspan="3"></td></tr>
                        </tbody>
                    </table>
                    <div class="barra_titulo">
                        <h5 class="color_dd_title">Mucosas</h5>
                    </div>
                    <div class="col-md-12 padding_top padding_bottom">
                        <div class="row">
                            <div class="col-md-4">Biotipo Gingival</div>
                            <div class="col-md-4">
                                <select name="biotipo_gingival" class="form-control input-sm margin_bottom">
                                    <option value="0">Seleccione Biotipo Gingival</option>
                                    <option value="1">Fino</option>
                                    <option value="2">Mediano</option>
                                    <option value="3">Grueso</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="gingivitis" name="gingivitis" class="mucosas_check"> Gingivitis</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="gingivitis_txt" name="gingivitis_txt" class="form-control input-sm hide">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="perio_inflamado" name="perio_inflamado" class="mucosas_check"> Enf. periodontal inflam.</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="perio_inflamado_txt" name="perio_inflamado_txt" class="form-control input-sm hide">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="no_inflamado" name="no_inflamado" class="mucosas_check"> No inflam.</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="no_inflamado_txt" name="no_inflamado_txt" class="form-control input-sm hide">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label><input type="checkbox" id="ret_gingivales" name="ret_gingivales" class="mucosas_check"> Retracciones gingivales</label>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="ret_gingivales_txt" name="ret_gingivales_txt" class="form-control input-sm hide">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Comentarios:</label>
                        <textarea name="comentarios" class="form-control input-sm margin_bottom" rows="3" placeholder="Comentarios"></textarea>
                    </div>
            </div>
            <div class="tab-pane fade" id="analisis_psicoem" role="tabpanel" aria-labelledby="analisis_psicoem-tab">
                <br>
                <div class="barra_titulo">
                    <h5 class="color_dd_title">Dientes y modelos</h5>
                </div>
                   <div class="tab-pane sub_menu_tab" id="neuro">
                                            <div class="menu_acciones_vacio"></div>
                                            <div class="barra_titulo">
                                                <h5 class="color_dd_title">Evaluación neurosensorial</h5>
                                            </div>
                                            <table class="table_full table_no_bg align_middle padding_bottom border_bottom">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"></th>
                                                        <th width="30%" class="text-center padding_top padding_bottom border_right" colspan="3">Labio superior</th>
                                                        <th width="30%" class="text-center padding_top padding_bottom border_right" colspan="3">Labio inferior</th>
                                                        <th width="30%" class="text-center padding_top padding_bottom" colspan="3">Mentón</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td class="text-center padding_bottom">Der.</td>
                                                        <td class="text-center padding_bottom">Med.</td>
                                                        <td class="text-center padding_bottom border_right">Izq.</td>
                                                        <td class="text-center padding_bottom">Der.</td>
                                                        <td class="text-center padding_bottom">Med.</td>
                                                        <td class="text-center padding_bottom border_right">Izq.</td>
                                                        <td class="text-center padding_bottom">Der.</td>
                                                        <td class="text-center padding_bottom">Med.</td>
                                                        <td class="text-center padding_bottom">Izq.</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="padding_left">Discriminación 2 Puntos</td>
                                                        <td><input type="text" name="ev_pls_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pls_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_pls_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pli_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pli_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_pli_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pme_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pme_m" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_pme_i" class="form-control input-sm input_micro"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding_left">Tacto/dolor</td>
                                                        <td><input type="text" name="ev_tls_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tls_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_tls_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tli_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tli_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_tli_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tme_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tme_m" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_tme_i" class="form-control input-sm input_micro"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="padding_left">Direccional</td>
                                                        <td><input type="text" name="ev_dls_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dls_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_dls_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dli_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dli_m" class="form-control input-sm input_micro"></td>
                                                        <td class="border_right"><input type="text" name="ev_dli_i" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dme_d" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dme_m" class="form-control input-sm input_micro"></td>
                                                        <td><input type="text" name="ev_dme_i" class="form-control input-sm input_micro"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="col-md-12 margin_top margin_bottom">
                                                <label>Comentarios:</label>
                                                <textarea name="comentarios_neuro" class="form-control input-sm margin_bottom" rows="3" placeholder="Comentarios"></textarea>
                                            </div>
                                                            </div>
                                            <div class="tab-pane sub_menu_tab" id="psico">
                                                                <div class="menu_acciones_vacio"></div>
                                            <div class="barra_titulo margin_bottom">
                                                <h5 class="color_dd_title">Evaluación Psicoemocional</h5>
                                            </div>
                                            <div class="col-md-12 margin_bottom">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Motivo de Consulta</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_motivo_consulta"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Motivaciónes Internas</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_motivaciones_internas"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Motivación Inicial de Tratamiento</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_motivacion_inicial"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Motivaciónes Externas</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_motivaciones_externas"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Motivaciónes Estéticas</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_motivaciones_esteticas"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="margin_bottom">Miedos</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_miedos"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="margin_bottom">Comentario Final</label>
                                                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="psi_comentario"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                    <div class="col-md-12">
                        <label>Comentarios:</label>
                        <textarea name="comentarios" class="form-control input-sm margin_bottom" rows="3" placeholder="Comentarios"></textarea>
                    </div>
            </div>
            <div class="tab-pane sub_menu_tab" id="plan_t">
                <div class="menu_acciones_vacio"></div>
                <div class="barra_titulo margin_bottom">
                    <h5 class="color_dd_title">Plan de Tratamiento</h5>
                </div>

                <div class="col-md-12 margin_bottom">
                    <div class="col-md-6">
                        <label class="margin_bottom">Maxilar</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="plan_tratamiento_maxilar"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="margin_bottom">Mandíbula</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="plan_tratamiento_mandibula"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="margin_bottom">Mentón</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="plan_tratamiento_menton"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="margin_bottom">Cirugías Complementarias</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="plan_tratamiento_cirugias"></textarea>
                    </div>
                </div>
                <div class="barra_titulo margin_bottom">
                    <h5 class="color_dd_title">Comentarios</h5>
                </div>
                <div class="col-md-12 margin_bottom">
                    <div class="col-md-6">
                        <label class="margin_bottom">Comentarios de Imágenes Disponibles</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="com_imagenes_disponibles"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="margin_bottom">Comentarios Generales</label>
                        <textarea rows="3" class="form-control input-sm margin_bottom resize_vertical" name="com_generales"></textarea>
                    </div>
                </div>

                        <div class="col-md-12 acciones_finales">
                            <button type="button" class="btn btn-primary pull-right" id="btn_guardar_ortognatica">Guardar</button>
                        </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tratamiento_orto" role="tabpanel" aria-labelledby="tratamiento_orto-tab">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="text-c-blue mt-1 mb-1 f-16">Tratamiento según presupuesto</h5>
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="dt-responsive table-responsive pb-4">
                            <table id="tratamiento_presupuesto" class="display table table-striped table-hover dt-responsive nowrap table-sm" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle">Fecha</th>
                                        <th class="text-center align-middle">Nº Presupuesto</th>
                                        <th class="text-center align-middle">Aprobado</th>
                                        <th class="text-center align-middle">Pieza</th>
                                        <th class="text-center align-middle">Boca</th>
                                        <th class="text-center align-middle">Presupuesto</th>
                                        <th class="text-center align-middle">Estado</th>
                                        <th class="text-center align-middle">Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center align-middle">23/05/2021</td>
                                        <td class="text-center align-middle">782638</td>
                                        <td class="text-center align-middle">Si</td>
                                        <td class="text-center align-middle">Sector I</td>
                                        <td class="text-center align-middle">no</td>
                                        <td class="text-center align-middle">
                                            <button type="button" class="btn btn-info btn-sm" onclick="presupuesto_orto();">
                                                <i class="fa fa-plus"></i> Cargar Presupuesto
                                            </button>
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="form-group col-md-4">
                                            <div class="switch switch-success d-inline m-r-2">
                                                <input type="checkbox" id="info_finalizado" checked="">
                                                <label for="info_finalizado" class="cr"></label>
                                            </div>
                                                <label>Realizado?</label>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            20/05/2022
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
