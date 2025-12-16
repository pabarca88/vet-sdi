
    <style type="text/css">
        @font-face {
            font-family: 'Wingdings 3';
            src: url(../fonts/wingdings3/wingdings-3.ttf) format("truetype");
            src: url(../fonts/wingdings3/wingdings-3.woff2) format("woff2");
            src: url(../fonts/wingdings3/wingdings-3.woff) format("woff");
            font-style: normal;
            font-weight: 500;
          }

          @font-face {
            font-family: 'dsb';
            src: url(../fonts/dsb/dsb-regular.ttf) format("truetype");
            src: url(../fonts/dsb/dsb-regular.woff2) format("woff2");
            src: url(../fonts/dsb/dsb-regular.woff) format("woff");
            font-style: normal;
            font-weight: 500;
            }


         .ng_esp {
            /* Common */
            font : 16px 'dsb';
            width: 60px; background-color: #f6faf9; text-align:center; font-weight: bold; font-size: x-large;
            background-color: #f6faf9;
            text-align:center;
            font-weight: bold;
            display: block;
            width: 100%;
            padding: 0.4rem 0.5rem 0.3rem 0.5rem!important;
            font-size: 1.0rem;
            font-weight: 400;
            line-height: 1.5;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 3px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .der option {
            color:#ff5252 !important ;
        }

        .izq option{
             color: #1a49a3!important;
        }

        .neutro option{
            color: #000;
        }

        .select option[value="1"] {
            color:#ff5252 !important;
        }

        /* Ocultar icono de reloj en inputs de tiempo */
        .no-time-icon::-webkit-calendar-picker-indicator {
            display: none;
            -webkit-appearance: none;
        }

        .no-time-icon::-webkit-inner-spin-button {
            -webkit-appearance: none;
            display: none;
        }

        .no-time-icon::-webkit-outer-spin-button {
            -webkit-appearance: none;
            display: none;
        }

        /* Para todos los inputs de tiempo si quieres aplicarlo globalmente */
        input[type="time"]::-webkit-calendar-picker-indicator {
            opacity: 0;
            pointer-events: none;
        }



    </style>
            <!--Contenido de tab-->

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="at-oftalmo">
                        <!--Atender paciente-->
                        <div class="tab-pane fade show active" id="atender" role="tabpanel" aria-labelledby="atender-tab">
                            <div class="row div_form_examen_ocho_par">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ex_equilibrio">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ex_equilibrio_c" aria-expanded="false" aria-controls="ex_equilibrio_c">
                                                Informe examen del Equilibrio del 8° par craneano
                                            </button>
                                        </div>
                                        <div id="ex_equilibrio_c" class="collapse show" aria-labelledby="ex_equilibrio" data-parent="#ex_equilibrio">
                                            <div class="card-body-aten-a">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <!--Otros pares craneanos-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Otros pares craneanos</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="floating-label-activo-sm">Describa</label>
                                                                        <textarea type="text" class="form-control form-control-sm" name="otros_pares_craneanos" id="otros_pares_craneanos" placeholder="INFORME DE OTROS PARES CRANEANOS"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Equilibrio estático-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Equilibrio estático</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-6">
                                                                        <label class="floating-label-activo-sm">Prueba de Romberg</label>
                                                                        <input type="text" class="form-control form-control-sm" name="romberg" id="romberg">
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="floating-label-activo-sm">Prueba de Romberg Sensibilizada</label>
                                                                        <input type="text" class="form-control form-control-sm" name="romberg_sens" id="romberg_sens">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Equilibrio cinético-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Equilibrio Cinético</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Marcha con ojos abiertos</label>
                                                                        <input type="text" class="form-control form-control-sm" name="marcha_ojo_ab" id="marcha_ojo_ab">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Prueba de Babinsky-weil </label>
                                                                        <input type="text" class="form-control form-control-sm" name="babinsky" id="babinsky">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Prueba de Romberg Barre</label>
                                                                        <input type="text" class="form-control form-control-sm" name="romberg_barre" id="romberg_barre">
                                                                    </div>
                                                                    <div class="form-group col-md-3">
                                                                        <label class="floating-label-activo-sm">Prueba de Untenberg-Fakuda</label>
                                                                        <input type="text" class="form-control form-control-sm" name="untenberg_fak" id="untenberg_fak">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Equilibrio segmentario-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Equilibrio Segmentário</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                                        <label class="floating-label-activo-sm">Prueba de la Indicación</label>
                                                                        <input type="text" class="form-control form-control-sm" name="indicacion" id="indicacion">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Equilibrio cerebelo-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Cerebelo</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Temblor intencional</label>
                                                                        <input type="text" class="form-control form-control-sm" name="temblor" id="temblor">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Dismetría</label>
                                                                        <input type="text" class="form-control form-control-sm" name="dismetria" id="dismetria">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Disinergia</label>
                                                                        <input type="text" class="form-control form-control-sm" name="discinergia" id="discinergia">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Disdiadococinesia</label>
                                                                        <input type="text" class="form-control form-control-sm" name="disdiadoco" id="disdiadoco">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Hipotonía</label>
                                                                        <input type="text" class="form-control form-control-sm" name="hipotonia" id="hipotonia">
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label class="floating-label-activo-sm">Otras pruebas</label>
                                                                        <input type="text" class="form-control form-control-sm" name="otras_pruebas" id="otras_pruebas">
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                        <label class="floating-label-activo-sm">Observaciones a las pruebas de equilibrio</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="observaciones_equilibrio" id="observaciones_equilibrio" placeholder="OBSERVACIONES GENERALES, SINTOMATOLOGIA REACCIONES, ETC."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--Nistagmo espontáneo-->
                                                        <div class="card-informacion">
                                                            <div class="card-body">
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                                        <h6 class="t-aten">Nistagmo espontáneo</h6>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row mb-2">
                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                        <table class="rounded" style="border: 1px solid #ced4da; width:100%; padding-bottom: 10px;">
                                                                            <tr>
                                                                                <td class="text_center" colspan="3">Sin Fijación Ocular</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_1" class="ng_esp" size="1" name="ng_1">
                                                                                        <option  value="1"> u</option>
                                                                                        <option class="izq" value="2"> q</option>
                                                                                        <option class="der" value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="ng_2" class="ng_esp" size="1" name="ng_2">
                                                                                        <option  value="1"> u</option>
                                                                                        <option class="izq" style="color: rgb(71 149 205);" value="2"> q</option>
                                                                                        <option value="3" style="color: red"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6" style="color: red"> a</option>
                                                                                        <option value="7" style="color: rgb(71 149 205);"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_3" class="ng_esp" size="1" name="ng_3">
                                                                                        <option class="neutro" value="1"> u</option>
                                                                                        <option class="izq"  value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text_left">
                                                                                    <select id="ng_4" class="ng_esp" size="1" name="ng_4">
                                                                                        <option value="1"> u</option>
                                                                                        <option class="izq" value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_5" class="ng_esp" size="1" name="ng_5">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                        <table class="pb-2 rounded" style="border: 1px solid  #ced4da; width:100%">
                                                                            <tr>
                                                                                <td class="text_center" colspan="3">Con fijación Ocular</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td></td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_6" class="ng_esp" size="1" name="ng_6">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <select id="ng_7" class="ng_esp" size="1" name="ng_7">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_8" class="ng_esp" size="1" name="ng_8">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td class="tib_left">
                                                                                    <select id="ng_9" class="ng_esp" size="1" name="ng_9">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                                <td class="text_center">
                                                                                    <select id="ng_10" class="ng_esp" size="1" name="ng_10">
                                                                                        <option value="1"> u</option>
                                                                                        <option value="2"> q</option>
                                                                                        <option value="3"> r</option>
                                                                                        <option value="4"> s</option>
                                                                                        <option value="5"> t</option>
                                                                                        <option value="6"> a</option>
                                                                                        <option value="7"> b</option>
                                                                                        <option value="8"> c</option>
                                                                                        <option value="9"> d</option>
                                                                                        <option value="10"> i</option>
                                                                                        <option value="11"> j</option>
                                                                                        <option value="12"> k</option>
                                                                                        <option value="13"> l</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>&nbsp;</td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                        <label class="floating-label-activo-sm">Mov. oculares involuntarios y persecución</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="mov_oculares" id="mov_oculares" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                    </div>
                                                                    <div class="form-group col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-3 mb-3">
                                                                        <label class="floating-label-activo-sm">Dismetría Ocular</label>
                                                                        <textarea class="form-control caja-texto form-control-sm"  rows="6"  name="dismetria_ocular" id="dismetria_ocular" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="form-row">
                                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                                        <label class="floating-label-activo-sm">Comentarios</label>
                                                                        <textarea class="form-control caja-texto form-control-sm mb-9"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="obs_comentarios" id="obs_comentarios" placeholder="Obs. generales, sintomatologia reacciones, etc."></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ex_ng_provocado">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ex_ng_provocado_c" aria-expanded="false" aria-controls="ex_ng_provocado_c">
                                                Nistagmo Provocado
                                            </button>
                                        </div>
                                        <div id="ex_ng_provocado_c" class="collapse show" aria-labelledby="ex_ng_provocado" data-parent="#ex_ng_provocado">
                                            <div class="card-body-aten-a">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div style="overflow-x:auto;">
                                                            <div class="table-responsive">
                                                                <table id="tabla_registros_ng" class="table table-striped table-xs table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                        <th>POSICIÓN</th>
                                                                        <th>DIRECCIÓN</th>
                                                                        <th>LATENCIA</th>
                                                                        <th>PAROXISMO</th>
                                                                        <th>FATIGA</th>
                                                                        <th>DURACIÓN</th>
                                                                        <th>VÉRTIGO</th>
                                                                        <th>NAUSEAS</th>
                                                                        <th>VÓMITO</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>EaS</td>
                                                                            <td>
                                                                                <select id="EaS" class="ng_esp" size="1" name="EaS" title="EaS">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaS" class="form-control form-control-sm" type="text" name="LatEaS" title="LatEaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="eas_1" class="form-control form-control-sm" size="1" name="eas_1" title="eas_1">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="eas_2" class="form-control form-control-sm" size="1" name="eas_2" title="eas_2">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaS" class="form-control form-control-sm" type="text" name="DurEaS" title="DurEaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="eas_3" class="form-control form-control-sm" name="eas_3" size="1" title="eas_3">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="eas_4" class="form-control form-control-sm" name="eas_4" size="1" title="NAUSEAS">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="eas_5" class="form-control form-control-sm" name="eas_5" size="1" title="VOMITOS">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SaD</td>
                                                                            <td>
                                                                                <select id="SaD" class="ng_esp" size="1" name="SaD" title="SaD">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <input id="LatSaD" class="form-control form-control-sm" type="text" name="LatSaD" title="LatSaD" size="9">
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <select id="sad_1" class="form-control form-control-sm" size="1" name="sad_1" title="par2">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="text-center">
                                                                                <select id="sad_2" class="form-control form-control-sm" size="1" name="sad_2" title="fat2">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSaD" class="form-control form-control-sm" type="text" name="DurSaD" title="DurSaD" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_3" class="form-control form-control-sm" name="sad_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_4" class="form-control form-control-sm" name="sad_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="sad_5" class="form-control form-control-sm" name="sad_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>DaS</td>
                                                                            <td>
                                                                                <select id="DaS" class="ng_esp" size="1" name="DaS" title="DaS">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatDaS" class="form-control form-control-sm" type="text" name="LatDaS" title="LatDaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_1" class="form-control form-control-sm" size="1" name="DaS_1" title="par3">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_2" class="form-control form-control-sm" size="1" name="DaS_2" title="fat3">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurDaS" class="form-control form-control-sm" type="text" name="DurDaS" title="DurDaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_3" class="form-control form-control-sm" name="DaS_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_4" class="form-control form-control-sm" name="DaS_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="DaS_5" class="form-control form-control-sm" name="DaS_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>SaL</td>
                                                                            <td>
                                                                                <select id="SaL" class="ng_esp" size="1" name="SaL" title="SaL">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatSal" class="form-control form-control-sm" type="text" name="LatSal" title="LatSal" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_1" class="form-control form-control-sm" size="1" name="SaL_1" title="par4">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_2" class="form-control form-control-sm" size="1" name="SaL_2" title="fat4">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSal" class="form-control form-control-sm" type="text" name="DurSal" title="DurSal" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_3" class="form-control form-control-sm" name="SaL_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td>
                                                                                <select id="SaL_4" class="form-control form-control-sm" name="SaL_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaL_5" class="form-control form-control-sm" name="SaL_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> LaS</td>
                                                                            <td>
                                                                                <select id="LaS" class="ng_esp" size="1" name="LaS" title="LaS">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatLas" class="form-control form-control-sm" type="text" name="LatLas" title="LatLas" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_1" class="form-control form-control-sm" size="1" name="LaS_1" title="par5">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_2" class="form-control form-control-sm" size="1" name="LaS_2" title="fat5">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurLaS" class="form-control form-control-sm" type="text" name="DurLaS" title="DurLaS" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_3" class="form-control form-control-sm" name="LaS_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_4" class="form-control form-control-sm" name="LaS_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="LaS_5" class="form-control form-control-sm" name="LaS_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                SaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE" class="ng_esp" size="1" name="SaE" title="SaE">
                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatSaE" class="form-control form-control-sm" type="text" name="LatSaE" title="LatSaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_1" class="form-control form-control-sm" size="1" name="SaE_1" title="par6">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_2" class="form-control form-control-sm" size="1" name="SaE_2" title="fat6">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurSaE" class="form-control form-control-sm" type="text" name="DurSaE" title="DurSaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_3" class="form-control form-control-sm" name="SaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_4" class="form-control form-control-sm" name="SaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="SaE_5" class="form-control form-control-sm" name="SaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCC
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC" class="ng_esp" size="1" name="EaCC" title="EaCC">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCC" class="form-control form-control-sm" type="text" name="LatEaCC" title="LatEaCC" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_1" class="form-control form-control-sm" size="1" name="EaCC_1" title="par7">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_2" class="form-control form-control-sm" size="1" name="EaCC_2" title="fat7">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCC" class="form-control form-control-sm" type="text" name="DurEaCC" title="DurEaCC" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_3" class="form-control form-control-sm" name="EaCC_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_4" class="form-control form-control-sm" name="EaCC_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCC_5" class="form-control form-control-sm" name="EaCC_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                CCaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE" class="ng_esp" size="1" name="CCaE" title="CCaE">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCaE" class="form-control form-control-sm" type="text" name="LatCCaE" title="LatCCaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_1" class="form-control form-control-sm" size="1" name="CCaE_1" title="par8">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_2" class="form-control form-control-sm" size="1" name="CCaE_2" title="fat8">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCaE" class="form-control form-control-sm" type="text" name="DurCCaE" title="DurCCaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_3" class="form-control form-control-sm" name="CCaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_4" class="form-control form-control-sm" name="CCaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCaE_5" class="form-control form-control-sm" name="CCaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCCd
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd" class="ng_esp" size="1" name="EaCCd" title="EaCCd">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCCd" class="form-control form-control-sm" type="text" name="LatEaCCd" title="LatEaCCd" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_1" class="form-control form-control-sm" size="1" name="EaCCd_1" title="par9">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_2" class="form-control form-control-sm" size="1" name="EaCCd_2" title="fat9">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCCd" class="form-control form-control-sm" type="text" name="DurEaCCd" title="DurEaCCd" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_3" class="form-control form-control-sm" name="EaCCd_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_4" class="form-control form-control-sm" name="EaCCd_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCd_5" class="form-control form-control-sm" name="EaCCd_55" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                CCdaE
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE" class="ng_esp" size="1" name="CCdaE" title="CCdaE">

                                                                                    <option value="1"a selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCdaE" class="form-control form-control-sm" type="text" name="LatCCdaE" title="LatCCdaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_1" class="form-control form-control-sm" size="1" name="CCdaE_1" title="par10">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_2" class="form-control form-control-sm" size="1" name="CCdaE_2" title="fat10">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCdaE" class="form-control form-control-sm" type="text" name="DurCCdaE" title="DurCCdaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_3" class="form-control form-control-sm" name="CCdaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_4" class="form-control form-control-sm" name="CCdaE_42" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCdaE_5" class="form-control form-control-sm" name="CCdaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                EaCCi</td>
                                                                            <td>
                                                                                <select id="EaCCi" class="ng_esp" size="1" name="EaCCi" title="EaCCi">

                                                                                    <option value="1"a selected> 0 </option>
                                                                                    <option value="2"> G</option>
                                                                                    <option value="3"> F</option>
                                                                                    <option value="4"> I</option>
                                                                                    <option value="5"> H</option>
                                                                                    <option value="6"> J</option>
                                                                                    <option value="7"> K</option>
                                                                                    <option value="8"> M</option>
                                                                                    <option value="9"> L</option>
                                                                                    <option value="10"> N</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatEaCCi" class="form-control form-control-sm" type="text" name="LatEaCCi" title="LatEaCCi" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_1" class="form-control form-control-sm" size="1" name="EaCCi_1" title="par11">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_2" class="form-control form-control-sm" size="1" name="EaCCi_2" title="fat11">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurEaCCi" class="form-control form-control-sm" type="text" name="DurEaCCi" title="DurEaCCi" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_3" class="form-control form-control-sm" name="EaCCi_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_4" class="form-control form-control-sm" name="EaCCi_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="EaCCi_5" class="form-control form-control-sm" name="EaCCi_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>CCiaE</td>
                                                                            <td>
                                                                                <select id="CCiaE" class="ng_esp" size="1" name="CCiaE" title="CCiaE">

                                                                                    <option value="1" selected> 0 </option>
                                                                                    <option value="2"> g</option>
                                                                                    <option value="3"> f</option>
                                                                                    <option value="4"> i</option>
                                                                                    <option value="5"> h</option>
                                                                                    <option value="6"> j</option>
                                                                                    <option value="7"> k</option>
                                                                                    <option value="8"> m</option>
                                                                                    <option value="9"> l</option>
                                                                                    <option value="10"> n</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="LatCCiaE" class="form-control form-control-sm" type="text" name="LatCCiaE" title="LatCCiaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_1" class="form-control form-control-sm" size="1" name="CCiaE_1" title="par12">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_2" class="form-control form-control-sm" size="1" name="CCiaE_2" title="fat12">
                                                                                    <option value="1"> Si</option>
                                                                                    <option selected value="2"> No</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input id="DurCCiaE" class="form-control form-control-sm" type="text" name="DurCCiaE" title="DurCCiaE" size="9">
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_3" class="form-control form-control-sm" name="CCiaE_3" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_4" class="form-control form-control-sm" name="CCiaE_4" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <select id="CCiaE_5" class="form-control form-control-sm" name="CCiaE_5" size="1" title="VOM">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
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
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="ex_p_calorica">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#ex_p_calorica_c" aria-expanded="false" aria-controls="ex_p_calorica_c">
                                                Prueba Calórica
                                            </button>
                                        </div>
                                        <div id="ex_p_calorica_c" class="collapse show" aria-labelledby="ex_p_calorica" data-parent="#ex_p_calorica">
                                            <div class="card-body-aten-a">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <div style="overflow-x:auto;">
                                                            <div class="table-responsive">
                                                                <table id="tabla_registros_pc" class="display table table-striped  table-bordered dt-responsive nowrap table-xs">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col"></th>
                                                                            <th scope="col">DURACIÓN</th>
                                                                            <th scope="col">FRECUENCIA</th>
                                                                            <th scope="col">AMPLITUD</th>
                                                                            <th scope="col">VÉRTIGO</th>
                                                                            <th scope="col">NAUSEAS</th>
                                                                            <th scope="col">VÓMITO</th>
                                                                            <th scope="col">VCL</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-primary font-weight-bold">
                                                                                OI a 30°C
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="DUR_IO30" class="form-control form-control-sm text-c-blue no-time-icon" type="time" name="DUR_IO30" title="OIa30°C" size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_IO30" class="form-control form-control-sm"  type="text" name="FR_IO30" title="Nombre" size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_IO30" class="form-control form-control-sm" type="text" name="AM_IO30" title="Nombre" size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="IO30_1" class="form-control form-control-sm"  name="IO30_1" size="1" title="VERT" style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="IO30_2" class="form-control form-control-sm" name="IO30_2" size="1" title="NAUSEAS" style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="IO30_3" class="form-control form-control-sm"  name="IO30_3" size="1" title="VOM" style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="VCL_IO30" class="form-control form-control-sm"  type="text" name="VCL_IO30" title="VCL" size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-danger font-weight-bold">
                                                                                OD a 30°C
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="DUR_OD30" class="form-control form-control-sm"  type="time" name="DUR_OD30"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_OD30" class="form-control form-control-sm"  type="text" name="FR_OD30"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_OD30" class="form-control form-control-sm"  type="text" name="AM_OD30"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD30_1" class="form-control form-control-sm"   name="OD30_1" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD30_2" class="form-control form-control-sm" name="OD30_2" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD30_3" class="form-control form-control-sm" name="OD30_3" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="VCL_OD30"class="form-control form-control-sm"type="text" name="VCL_OD30"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-primary font-weight-bold">
                                                                                OI a 44°C
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="DUR_IO44"class="form-control form-control-sm"type="time" name="DUR_IO44"  size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_IO44"class="form-control form-control-sm"type="text" name="FR_IO44"  size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_IO44"class="form-control form-control-sm"type="text" name="AM_IO44"  size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="IO44_1" class="form-control form-control-sm"name="IO44_1" size="1"  style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td class="#">
                                                                                <select id="IO44_2" class="form-control form-control-sm" name="IO44_2" size="1"  style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="IO44_3" class="form-control form-control-sm" name="IO44_3" size="1" style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="VCL_IO44"class="form-control form-control-sm"type="text" name="VCL_IO44" t size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-danger font-weight-bold">
                                                                                OD a 44°C</td>
                                                                            <td class="#">
                                                                                <input id="DUR_OD44" class="form-control form-control-sm" type="time" name="DUR_OD44"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_OD44" class="form-control form-control-sm" type="text" name="FR_OD44"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_OD44" class="form-control form-control-sm" type="text" name="AM_OD44"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD44_1" class="form-control form-control-sm"  name="OD44_1" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td class="#">
                                                                                <select id="OD44_2" class="form-control form-control-sm"  name="OD44_2" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td class="#">
                                                                                <select id="OD44_3" class="form-control form-control-sm"  name="OD44_3" size="1"  style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td class="#">
                                                                                <input id="VCL_OD44" class="form-control form-control-sm" type="text" name="VCL_OD44"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-primary font-weight-bold">
                                                                                OI a 18°C</td>
                                                                            <td class="#">
                                                                                <input id="DUR_OI18" class="form-control form-control-sm" type="time" name="DUR_OI18"  size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_OI18" class="form-control form-control-sm" type="text" name="FR_OI18"  size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_OI18" class="form-control form-control-sm" type="text" name="AM_OI18" size="9" style="color: #1a49a3;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OI18_1" class="form-control form-control-sm" name="OI18_1" size="1"  style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select></td>
                                                                            <td class="#">
                                                                                <select id="OI18_2" class="form-control form-control-sm" name="OI18_2" size="1" style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OI18_3" class="form-control form-control-sm" name="OI18_3" size="1"  style="color: #1a49a3;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="VCL_OI18"class="form-control form-control-sm"type="text" name="VCL_OI18" size="9" style="color:#1a49a3;">
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-danger font-weight-bold">
                                                                                OD a 18°C</td>
                                                                            <td class="#">
                                                                                <input id="DUR_OD18"class="form-control form-control-sm" type="time" name="DUR_OD18"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="FR_OD18"class="form-control form-control-sm"type="text" name="FR_OD18"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="AM_OD18"class="form-control form-control-sm"type="text" name="AM_OD18"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD18_1" class="form-control form-control-sm" name="OD18_1" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD18_2" class="form-control form-control-sm" name="OD18_2" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <select id="OD18_3" class="form-control form-control-sm"name="OD18_3" size="1" style="color: #FF0000;">
                                                                                    <option value="1">+</option>
                                                                                    <option value="2">++</option>
                                                                                    <option selected value="3">0</option>
                                                                                </select>
                                                                            </td>
                                                                            <td class="#">
                                                                                <input id="VCL_OD18"class="form-control form-control-sm"type="text" name="VCL_OD18"  size="9"style="color: #FF0000;">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                        <label class="floating-label-activo-sm">Comentarios</label>
                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="comentarios_pc" id="comentarios_pc" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
                                                        <label class="floating-label-activo-sm">Conclusiones Examen</label>
                                                        <textarea class="form-control caja-texto form-control-sm"  rows="1"  onfocus="this.rows=4" onblur="this.rows=1;" name="concluciones_examen" id="concluciones_examen" placeholder="Observaciones generales, sintomatologia reacciones, etc."></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row d-flex justify-content-end">
                                                    <button class="btn btn-primary btn-sm" onclick="generar_pdf()"><i class="fa fa-file-pdf"></i> Generar PDF</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="card-a">
                                        <div class="card-header-a" id="sec_carga_archivo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left card-act-open collapsed" type="button" data-toggle="collapse" data-target="#sec_carga_archivo_c" aria-expanded="false" aria-controls="sec_carga_archivo_c">
                                                Carga de Archivos
                                            </button>
                                        </div>
                                        <div id="sec_carga_archivo_c" class="collapse show" aria-labelledby="sec_carga_archivo" data-parent="#sec_carga_archivo">
                                            <div class="card-body-aten-a pb-2">
                                                <div class="row">
                                                    <input type="hidden" name="input_lista_archivo" id="input_lista_archivo" value="">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                        <!-- [ Main Content ] start -->
                                                        <div class="dropzone" id="misArchivosOctavoPar" action="{{ route('profesional.archivo.carga') }}">
                                                        </div>
                                                        <!-- [ file-upload ] end -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!--GUARDAR O IMPRIMIR FICHA-->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <input type="button" class="btn btn-secondary mt-1" onclick="guardar_examen_octavopar()" value="Guardar Examen">
                        </div>
                    </div>
                </div>
            </div>


    <script>

        $(document).ready(function() {

        });

        function cargar_profesional(rut, input_nombre, input_id, div_solicitar,input_telefono)
        {
            rut = $(rut).val();

            // console.log('------------------------------------');
            // console.log(rut.length);
            // console.log(rut);
            // console.log('------------------------------------');

            if(rut.length>5)
            {
                url = "{{ route('profesional.buscar') }}";
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        rut : rut,
                    },
                })
                .done(function(data)
                {
                    // console.log('-----------------------');
                    // console.log(data);
                    // console.log('-----------------------');
                    if(data.estado == 1)
                    {

                        if(data.registros.length>0)
                        {
                            var nombre = data.registros[0].nombre+' '+data.registros[0].apellido_uno;
                            var id = data.registros[0].id;
                            // $('#'+input_nombre).attr('readonly', true);
                            $('#'+input_nombre).val(nombre);
                            $('#'+input_id).val(id);
                            if(input_telefono != undefined)
                            {
                                $('#'+input_telefono).val(data.registros[0].telefono_uno);
                            }
                            // console.log('-----------------------');
                            $('#'+div_solicitar).hide();
                            mensaje = '';
                            $('#div_mensaje').hide();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                        }
                        else
                        {
                            mensaje = 'Profesional no encontrato, debe ingresar datos.';
                            $('#'+input_nombre).val('');
                            $('#'+input_id).val('');
                            $('#'+div_solicitar).show();
                            $('#div_mensaje').show();
                            $('#mensaje_solicitado_por').html(mensaje);
                            $('#solicitado_nombre_oct_par').val('');
                            $('#solicitado_apellido_oct_par').val('');
                            $('#solicitado_telefono_oct_par').val('');
                            $('#solicitado_email_oct_par').val('');
                            $('#'+input_nombre).attr('readonly', true);
                        }
                    }
                    else
                    {
                        mensaje = 'Se presento un problema en la busqueda intente nuevamente';
                        $('#div_mensaje').show();
                        $('#mensaje_solicitado_por').html(mensaje);
                        $('#'+input_nombre).attr('readonly', false);
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log(jqXHR, ajaxOptions, thrownError)
                });
            }
            else if(rut.length==0)
            {
                $('#'+input_nombre).val('');
                // $('#'+input_nombre).attr('readonly', true);
                $('#'+input_id).val('');
                $('#'+div_solicitar).hide();
                $('#div_mensaje').hide();
                $('#mensaje_solicitado_por').html('');
            }
        }

        function actualizar_solicitado_por(input_solitado_por, input_nombre, input_apellido)
        {
            var nombre = $('#'+input_nombre).val();
            var apellido = $('#'+input_apellido).val();
            if(nombre != '' || apellido != '')
            {
                // $('#'+input_solitado_por).attr('readonly', true);
                $('#'+input_solitado_por).val($('#'+input_nombre).val()+' '+$('#'+input_apellido).val());
            }
            else
            {
                // $('#'+input_solitado_por).attr('readonly', false);
                $('#'+input_solitado_por).val();
            }
        }

        /************** ARCHIVO **************/
        // Variable para token CSRF
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content') || '{{ csrf_token() }}';

        var myDropzone_Archivo;

        // CLAVE: Deshabilitar autoDiscover ANTES de cualquier configuración
        if (typeof Dropzone !== 'undefined') {
            Dropzone.autoDiscover = false;
            console.log('✅ Dropzone.autoDiscover deshabilitado para Octavo Par');
        }

        // Función para inicializar Dropzone MANUALMENTE
        function inicializarDropzone() {
            // Verificar que Dropzone esté disponible
            if (typeof Dropzone === 'undefined') {
                console.error('❌ Dropzone no está cargado. Asegúrese de incluir la librería Dropzone.');
                return false;
            }

            // Verificar que el elemento dropzone existe
            var elementoDropzone = document.getElementById('misArchivosOctavoPar');
            if (!elementoDropzone) {
                console.warn('⚠️ Elemento dropzone #misArchivosOctavoPar no encontrado en el DOM');
                return false;
            }

            // Verificar si ya está inicializado
            if (elementoDropzone.dropzone) {
                console.log('⚠️ Dropzone ya está inicializado para #misArchivosOctavoPar');
                myDropzone_Archivo = elementoDropzone.dropzone;
                return true;
            }

            console.log('✅ Inicializando Dropzone manualmente para #misArchivosOctavoPar...');

            // Configuración completa del Dropzone
            var configuracionDropzone = {
                init: function() {
                    myDropzone_Archivo = this;
                    console.log('✅ Dropzone misArchivosOctavoPar inicializado correctamente');

                    var dropzoneInstance = this;

                    // Evento cuando se agrega un archivo
                    this.on("addedfile", function(file) {
                        console.log('📎 Archivo agregado:', file.name);

                        // Verificar límite de archivos
                        var totalFiles = dropzoneInstance.files.length;
                        console.log('📊 Total de archivos:', totalFiles, 'Máximo:', dropzoneInstance.options.maxFiles);

                        if (totalFiles > dropzoneInstance.options.maxFiles) {
                            console.warn('⚠️ Eliminando archivo excedente:', file.name);
                            dropzoneInstance.removeFile(file);

                            // Mostrar alerta al usuario
                            alert('❌ Máximo ' + dropzoneInstance.options.maxFiles + ' archivos permitidos. El archivo "' + file.name + '" fue rechazado.');
                            return;
                        }

                        // Actualizar interfaz si es necesario
                        console.log('✅ Archivo aceptado en la cola');
                    });

                    // Evento personalizado cuando se completa la carga
                    this.on("complete", function(file) {
                        console.log('📁 Archivo procesado:', file.name, 'Estado:', file.status);
                    });

                    // Evento cuando se alcanza el máximo de archivos (backup)
                    this.on("maxfilesexceeded", function(file) {
                        console.warn('⚠️ Máximo de archivos excedido (evento nativo):', file.name);
                        this.removeFile(file);
                        alert('❌ No puede cargar más archivos. Máximo permitido: ' + this.options.maxFiles);
                    });
                },

            // Configuración básica
            url: "{{ route('profesional.archivo.carga') }}",
            method: 'post',
            paramName: 'file', // Nombre del parámetro que se envía al servidor
            autoDiscover: false, // Desactivar auto-discovery para mayor control
            createImageThumbnails: true,
            addRemoveLinks: true,
            parallelUploads: 1, // Solo 1 archivo a la vez para mejor control
            timeout: 120000, // 2 minutos de timeout

            headers: {
                'X-CSRF-TOKEN': CSRF_TOKEN,
                'X-Requested-With': 'XMLHttpRequest'
            },

            // Tipos de archivo más específicos y seguros
            acceptedFiles: ".pdf,.doc,.docx,.jpg,.jpeg,.png,.gif,.bmp,.webp",
            maxFilesize: 4, // 4 MB
            maxFiles: 4,
            autoProcessQueue: true, // Procesar automáticamente
            uploadMultiple: false, // No subir múltiples a la vez
            forceFallback: false, // Permitir HTML5 cuando esté disponible

            // Mensajes en español mejorados con placeholders correctos
            dictDefaultMessage: "📎 Arrastre archivos hasta aquí o haga clic para seleccionar<br>Examen de Equilibrio y Audiometría",
            dictFallbackMessage: "Su navegador no admite la carga de archivos mediante arrastrar y soltar.",
            dictFallbackText: "Utilice el formulario alternativo a continuación para cargar sus archivos.",
            dictFileTooBig: "❌ El archivo es demasiado grande (MB). Tamaño máximo: MB.",
            dictInvalidFileType: "❌ Tipo de archivo no permitido. Solo se aceptan: PDF, DOC, DOCX e imágenes.",
            dictResponseError: "❌ Error del servidor: ",
            dictCancelUpload: "Cancelar",
            dictUploadCanceled: "Carga cancelada",
            dictCancelUploadConfirmation: "¿Está seguro de que desea cancelar esta carga?",
            dictRemoveFile: "🗑️ Eliminar",
            dictMaxFilesExceeded: "❌ No puede cargar más archivos. Máximo permitido: 4",

            // Validación antes de aceptar el archivo
            accept: function(file, done) {
                console.log('🔍 Validando archivo:', file.name, 'Tipo:', file.type, 'Tamaño:', (file.size / 1024 / 1024).toFixed(2) + 'MB');

                // 1. Validar que el archivo no esté vacío
                if (file.size === 0) {
                    done("❌ El archivo está vacío");
                    return;
                }

                // 2. Validar límite de archivos manualmente
                var archivosActuales = this.getAcceptedFiles().length + this.getQueuedFiles().length;
                console.log('📊 Archivos actuales:', archivosActuales, 'Máximo permitido:', this.options.maxFiles);

                if (archivosActuales >= this.options.maxFiles) {
                    done("❌ Máximo " + this.options.maxFiles + " archivos permitidos. Ya tienes " + archivosActuales + " archivos.");
                    return;
                }

                // 3. Validar tamaño del archivo
                var tamañoMB = file.size / 1024 / 1024;
                if (tamañoMB > this.options.maxFilesize) {
                    done("❌ El archivo es demasiado grande (" + tamañoMB.toFixed(2) + "MB). Tamaño máximo: " + this.options.maxFilesize + "MB.");
                    return;
                }

                // 4. Validar extensión manualmente como seguridad adicional
                var allowedExtensions = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
                var fileExtension = file.name.split('.').pop().toLowerCase();

                if (allowedExtensions.indexOf(fileExtension) === -1) {
                    done("❌ Extensión de archivo no permitida: ." + fileExtension + ". Solo se permiten: " + allowedExtensions.join(', '));
                    return;
                }

                console.log('✅ Archivo validado correctamente');
                done(); // Archivo aceptado
            },

            success: function(file, response) {
                console.log('✅ Archivo subido exitosamente:', file.name);
                console.log('Respuesta del servidor:', response);

                try {
                    // Verificar que la respuesta sea válida
                    if (typeof response === 'string') {
                        response = JSON.parse(response);
                    }

                    if (response && response.archivo) {
                        cargar_lista_archivo(myDropzone_Archivo, '');

                        if (file.previewElement) {
                            file.previewElement.classList.add("dz-success");

                            // Agregar información del archivo subido
                            var infoElement = file.previewElement.querySelector('[data-dz-name]');
                            if (infoElement) {
                                infoElement.innerHTML += '<br><small class="text-success">✅ Subido</small>';
                            }
                        }
                    } else {
                        throw new Error('Respuesta del servidor inválida');
                    }
                } catch (error) {
                    console.error('Error procesando respuesta:', error);
                    this.emit("error", file, "Error procesando la respuesta del servidor");
                }
            },

            error: function(file, message) {
                console.error('❌ Error subiendo archivo:', file.name, 'Mensaje:', message);

                if (file.previewElement) {
                    file.previewElement.classList.add("dz-error");

                    var errorMessage = message;

                    // Procesar diferentes tipos de errores
                    if (typeof message !== "string") {
                        if (message.error) {
                            errorMessage = message.error;
                        } else if (message.message) {
                            errorMessage = message.message;
                        } else {
                            errorMessage = "Error desconocido al subir el archivo";
                        }
                    }

                    // Mostrar mensaje de error en el elemento
                    for (let node of file.previewElement.querySelectorAll("[data-dz-errormessage]")) {
                        node.textContent = errorMessage;
                    }
                }
            },

            removedfile: function(file) {
                console.log('🗑️ Archivo eliminado:', file.name);

                // Actualizar lista de archivos
                cargar_lista_archivo(myDropzone_Archivo, '');

                // Eliminar elemento del DOM
                if (file.previewElement != null && file.previewElement.parentNode != null) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                }

                return this._updateMaxFilesReachedClass();
            },

            canceled: function(file) {
                console.log('⏹️ Carga cancelada:', file.name);
                cargar_lista_archivo(myDropzone_Archivo, '');
                return this.emit("error", file, this.options.dictUploadCanceled);
            },

            // Evento cuando se inicia la carga
            sending: function(file, xhr, formData) {
                console.log('📤 Enviando archivo:', file.name);
                // Aquí puedes agregar datos adicionales al formulario si es necesario
                // formData.append("additional_data", "value");
            },

            // Evento de progreso de carga
            uploadprogress: function(file, progress, bytesSent) {
                if (progress % 10 === 0) { // Solo mostrar cada 10%
                    console.log('📊 Progreso de', file.name + ':', Math.round(progress) + '%');
                }
            }
        };

        // INSTANCIAR MANUALMENTE el Dropzone (no usar autoDiscover)
        try {
            myDropzone_Archivo = new Dropzone("#misArchivosOctavoPar", configuracionDropzone);
            console.log('✅ Dropzone instanciado manualmente correctamente');
            console.log('📋 Instancia guardada en myDropzone_Archivo');

            // Hacer disponible globalmente para debugging
            window.myDropzone_OctavoPar = myDropzone_Archivo;

            return true;
        } catch (error) {
            console.error('❌ Error al instanciar Dropzone:', error);
            return false;
        }
    }

    // Verificar e inicializar Dropzone cuando esté listo
    $(document).ready(function() {
        console.log('🔄 DOM listo, verificando Dropzone...');

        // Intentar inicializar Dropzone inmediatamente
        if (!inicializarDropzone()) {
            console.log('⏳ Dropzone no disponible, esperando...');

            // Si no está disponible, esperar un poco e intentar de nuevo
            var intentos = 0;
            var maxIntentos = 10;
            var intervalo = setInterval(function() {
                intentos++;
                console.log('🔄 Intento', intentos, 'de', maxIntentos, '- Verificando Dropzone...');

                if (inicializarDropzone()) {
                    console.log('✅ Dropzone inicializado después de', intentos, 'intentos');
                    clearInterval(intervalo);
                } else if (intentos >= maxIntentos) {
                    console.error('❌ No se pudo inicializar Dropzone después de', maxIntentos, 'intentos');
                    console.log('💡 Verifique que las librerías de Dropzone estén cargadas correctamente');
                    clearInterval(intervalo);
                }
            }, 500); // Verificar cada 500ms
        }
    });


        var lista_archivo = {};

        // Función para debuggear el estado de Dropzone
        function debugDropzoneStatus() {
            console.log('🔍 Verificando configuración de Dropzone...');
            console.log('- Elemento DOM mis-archivos-octavo-par existe:', $('#mis-archivos-octavo-par').length > 0);
            console.log('- Dropzone.options.misArchivosOctavoPar existe:', typeof Dropzone.options.misArchivosOctavoPar !== 'undefined');

            if (myDropzone_Archivo) {
                console.log('🔍 Estado actual de Dropzone:');
                console.log('- Archivos totales:', myDropzone_Archivo.files.length);
                console.log('- Archivos aceptados:', myDropzone_Archivo.getAcceptedFiles().length);
                console.log('- Archivos en cola:', myDropzone_Archivo.getQueuedFiles().length);
                console.log('- Archivos subiendo:', myDropzone_Archivo.getUploadingFiles().length);
                console.log('- Archivos rechazados:', myDropzone_Archivo.getRejectedFiles().length);
                console.log('- Máximo permitido:', myDropzone_Archivo.options.maxFiles);
                console.log('- Mensajes en español:', {
                    defaultMessage: myDropzone_Archivo.options.dictDefaultMessage,
                    maxFilesExceeded: myDropzone_Archivo.options.dictMaxFilesExceeded,
                    fileTooBig: myDropzone_Archivo.options.dictFileTooBig
                });
            } else {
                console.log('❌ myDropzone_Archivo no está definido');

                // Verificar si hay una instancia en el elemento DOM
                var element = document.getElementById('mis-archivos-octavo-par');
                if (element && element.dropzone) {
                    console.log('✅ Encontrada instancia de Dropzone en el elemento DOM');
                    console.log('- Archivos en instancia DOM:', element.dropzone.files.length);
                } else {
                    console.log('❌ No hay instancia de Dropzone en el elemento DOM');
                }
            }
        }

        // Hacer disponible globalmente para debugging manual
        window.debugDropzone = debugDropzoneStatus;

        // Función para obtener la instancia de Dropzone correcta
        function obtenerInstanciaDropzone() {
            if (myDropzone_Archivo) {
                return myDropzone_Archivo;
            }

            // Intentar obtener desde el elemento DOM
            var element = document.getElementById('mis-archivos-octavo-par');
            if (element && element.dropzone) {
                console.log('📋 Usando instancia de Dropzone desde elemento DOM');
                return element.dropzone;
            }

            console.warn('⚠️ No se encontró ninguna instancia de Dropzone');
            return null;
        }

        // Hacer disponible globalmente
        window.obtenerDropzone = obtenerInstanciaDropzone;

        function cargar_lista_archivo(obj_dropzone, alias_archivo) {
            console.log('🔄 Actualizando lista de archivos (Octavo Par - independiente)...');

            // Si no se pasa un obj_dropzone, usar la variable global
            if (!obj_dropzone) {
                obj_dropzone = myDropzone_Archivo;
            }

            // Verificar que el dropzone existe
            if (!obj_dropzone) {
                console.warn('⚠️ Dropzone no válido para cargar lista de archivos (Octavo Par)');
                // Intentar obtener desde el elemento DOM
                var elemento = document.getElementById('misArchivosOctavoPar');
                if (elemento && elemento.dropzone) {
                    obj_dropzone = elemento.dropzone;
                    console.log('✅ Dropzone obtenido desde elemento DOM');
                } else {
                    console.error('❌ No se pudo obtener Dropzone de ninguna fuente');
                    return;
                }
            }

            // Reiniciar lista de archivos (INDEPENDIENTE del archivo principal)
            lista_archivo = {};
            $('#input_lista_archivo').val('');

            // Obtener archivos aceptados (subidos exitosamente)
            let archivosAceptados = obj_dropzone.getAcceptedFiles();
            console.log('📎 Archivos aceptados en Octavo Par:', archivosAceptados.length);

            if (archivosAceptados.length === 0) {
                console.log('No hay archivos para procesar');
                return;
            }

            // Procesar cada archivo
            $.each(archivosAceptados, function(index, file) {
                console.log('Procesando archivo', index + 1, ':', file.name, 'Estado:', file.status);

                if (file.status === "success") {
                    if (file.xhr !== undefined) {
                        try {
                            var responseText = file.xhr.response || file.xhr.responseText;
                            var archivo_temp = JSON.parse(responseText);

                            // Verificar que la respuesta tenga la estructura esperada
                            if (archivo_temp && archivo_temp.archivo) {
                                // Crear estructura compatible con el controlador PHP
                                lista_archivo[index] = {
                                    url: archivo_temp.archivo.url,
                                    nombre_original: archivo_temp.archivo.original_file_name,
                                    nombre_archivo: archivo_temp.archivo.nombre_archivo,
                                    file_extension: archivo_temp.archivo.file_extension,
                                    tamaño: file.size,
                                    tipo: file.type,
                                    fecha_subida: new Date().toISOString()
                                };

                                console.log('✅ Archivo', index + 1, 'procesado:', archivo_temp.archivo.original_file_name);
                                console.log('📋 Datos estructurados:', lista_archivo[index]);
                            } else {
                                console.warn('⚠️ Respuesta del servidor inválida para archivo:', file.name);
                            }
                        } catch (error) {
                            console.error('❌ Error parseando respuesta para archivo', file.name, ':', error);
                        }
                    } else {
                        console.warn('⚠️ No hay respuesta xhr para archivo:', file.name);
                    }
                } else {
                    console.log('⏳ Archivo', file.name, 'no completado, estado:', file.status);
                }
            });

            // Actualizar campo hidden con la lista de archivos
            var listaJSON = JSON.stringify(lista_archivo);
            $('#input_lista_archivo').val(listaJSON);

            console.log('📄 Lista de archivos actualizada:', Object.keys(lista_archivo).length, 'archivos');
            console.log('📋 Estructura final para PHP:', lista_archivo);
            console.log('📄 JSON generado:', listaJSON);

            // Debugging adicional: verificar qué se está enviando realmente
            console.log('🔍 DEBUGGING ESTRUCTURA:');
            console.log('Tipo de lista_archivo:', typeof lista_archivo);
            console.log('Es array lista_archivo:', Array.isArray(lista_archivo));
            console.log('Claves de lista_archivo:', Object.keys(lista_archivo));

            // Verificar cada elemento
            Object.keys(lista_archivo).forEach(function(key) {
                console.log('📁 Archivo ' + key + ':', {
                    tipo: typeof lista_archivo[key],
                    esArray: Array.isArray(lista_archivo[key]),
                    claves: Object.keys(lista_archivo[key]),
                    contenido: lista_archivo[key]
                });
            });

            // Disparar evento personalizado para notificar que la lista cambió
            $(document).trigger('archivos_actualizados', [lista_archivo]);
        }

        // Función auxiliar para obtener información de archivos cargados
        function obtenerArchivosSubidos() {
            return lista_archivo;
        }

        // Función para validar que todos los archivos estén subidos
        function validarArchivosCompletos() {
            var dropzoneInstance = obtenerInsgbtanciaDropzone();

            if (!dropzoneInstance) {
                console.log('ℹ️ No hay instancia de Dropzone, asumiendo que está OK');
                return true; // Si no hay dropzone, asumimos que está OK
            }

            var archivosEnCola = dropzoneInstance.getQueuedFiles();
            var archivosSubiendo = dropzoneInstance.getUploadingFiles();

            console.log('📊 Validando archivos:', {
                'En cola': archivosEnCola.length,
                'Subiendo': archivosSubiendo.length,
                'Total pendientes': archivosEnCola.length + archivosSubiendo.length
            });

            if (archivosEnCola.length > 0 || archivosSubiendo.length > 0) {
                console.warn('⚠️ Hay archivos pendientes de subir');
                return false;
            }

            return true;
        }

        // Función para recolectar todos los datos del formulario
        function recolectarDatosFormulario() {
            console.log('📋 Recolectando datos del formulario...');

            var datosFormulario = {
                // Datos básicos del examen
                fecha_ex: $('#fecha_ex').val(),
                profesional: $('#profesional').val(),
                derivado_por: $('#derivado_por').val(),
                derivado_por_rut: $('#derivado_por_rut').val(),

                // Datos del profesional solicitante
                solicitado_id_profesional_oct_par: $('#solicitado_id_profesional_oct_par').val(),
                solicitado_nombre_oct_par: $('#solicitado_nombre_oct_par').val(),
                solicitado_apellido_oct_par: $('#solicitado_apellido_oct_par').val(),
                solicitado_telefono_oct_par: $('#solicitado_telefono_oct_par').val(),
                solicitado_email_oct_par: $('#solicitado_email_oct_par').val(),

                // Examen del equilibrio - Equilibrio estático
                otros_pares_craneanos: $('#otros_pares_craneanos').val(),
                romberg: $('#romberg').val(),
                romberg_sens: $('#romberg_sens').val(),

                // Equilibrio cinético
                marcha_ojo_ab: $('#marcha_ojo_ab').val(),
                babinsky: $('#babinsky').val(),
                romberg_barre: $('#romberg_barre').val(),
                untenberg_fak: $('#untenberg_fak').val(),

                // Equilibrio segmentario
                indicacion: $('#indicacion').val(),

                // Equilibrio cerebelo
                temblor: $('#temblor').val(),
                dismetria: $('#dismetria').val(),
                discinergia: $('#discinergia').val(),
                disdiadoco: $('#disdiadoco').val(),
                hipotonia: $('#hipotonia').val(),
                otras_pruebas: $('#otras_pruebas').val(),

                // Observaciones equilibrio
                observaciones_equilibrio: $('#observaciones_equilibrio').val(),

                // Nistagmo espontáneo (todos los select ng_)
                nistagmo_espontaneo: {
                    ng_1: $('#ng_1').val(),
                    ng_2: $('#ng_2').val(),
                    ng_3: $('#ng_3').val(),
                    ng_4: $('#ng_4').val(),
                    ng_5: $('#ng_5').val(),
                    ng_6: $('#ng_6').val(),
                    ng_7: $('#ng_7').val(),
                    ng_8: $('#ng_8').val(),
                    ng_9: $('#ng_9').val()
                },

                // Nistagmo Provocado - recolectar todos los campos de la tabla
                nistagmo_provocado: {},
                mov_oculares: $('#mov_oculares').val(),
                dismetria_ocular: $('#dismetria_ocular').val(),

                // Prueba Calórica
                prueba_calorica: {
                    // OI a 30°C
                    DUR_IO30: $('#DUR_IO30').val(),
                    FR_IO30: $('#FR_IO30').val(),
                    AM_IO30: $('#AM_IO30').val(),
                    IO30_1: $('#IO30_1').val(), // VÉRTIGO
                    IO30_2: $('#IO30_2').val(), // NÁUSEAS
                    IO30_3: $('#IO30_3').val(), // VÓMITO
                    VCL_IO30: $('#VCL_IO30').val(),

                    // OD a 30°C
                    DUR_OD30: $('#DUR_OD30').val(),
                    FR_OD30: $('#FR_OD30').val(),
                    AM_OD30: $('#AM_OD30').val(),
                    OD30_1: $('#OD30_1').val(), // VÉRTIGO
                    OD30_2: $('#OD30_2').val(), // NÁUSEAS
                    OD30_3: $('#OD30_3').val(), // VÓMITO
                    VCL_OD30: $('#VCL_OD30').val(),

                    // OI a 44°C
                    DUR_IO44: $('#DUR_IO44').val(),
                    FR_IO44: $('#FR_IO44').val(),
                    AM_IO44: $('#AM_IO44').val(),
                    IO44_1: $('#IO44_1').val(), // VÉRTIGO
                    IO44_2: $('#IO44_2').val(), // NÁUSEAS
                    IO44_3: $('#IO44_3').val(), // VÓMITO
                    VCL_IO44: $('#VCL_IO44').val(),

                    // OD a 44°C
                    DUR_OD44: $('#DUR_OD44').val(),
                    FR_OD44: $('#FR_OD44').val(),
                    AM_OD44: $('#AM_OD44').val(),
                    OD44_1: $('#OD44_1').val(), // VÉRTIGO
                    OD44_2: $('#OD44_2').val(), // NÁUSEAS
                    OD44_3: $('#OD44_3').val(), // VÓMITO
                    VCL_OD44: $('#VCL_OD44').val(),

                    // OI a 18°C
                    DUR_OI18: $('#DUR_OI18').val(),
                    FR_OI18: $('#FR_OI18').val(),
                    AM_OI18: $('#AM_OI18').val(),
                    OI18_1: $('#OI18_1').val(), // VÉRTIGO
                    OI18_2: $('#OI18_2').val(), // NÁUSEAS
                    OI18_3: $('#OI18_3').val(), // VÓMITO
                    VCL_OI18: $('#VCL_OI18').val(),

                    // OD a 18°C
                    DUR_OD18: $('#DUR_OD18').val(),
                    FR_OD18: $('#FR_OD18').val(),
                    AM_OD18: $('#AM_OD18').val(),
                    OD18_1: $('#OD18_1').val(), // VÉRTIGO
                    OD18_2: $('#OD18_2').val(), // NÁUSEAS
                    OD18_3: $('#OD18_3').val(), // VÓMITO
                    VCL_OD18: $('#VCL_OD18').val()
                },


                // Comentarios y conclusiones
                comentarios_pc: $('#comentarios_pc').val(),
                concluciones_examen: $('#concluciones_examen').val(),

                // Archivos subidos
                archivos: obtenerArchivosSubidos(),
                input_lista_archivo: $('#input_lista_archivo').val()
            };

            // Debugging específico para archivos
            console.log('🔍 DEBUGGING ARCHIVOS EN RECOLECCION:');
            console.log('input_lista_archivo value:', $('#input_lista_archivo').val());
            console.log('Tipo de input_lista_archivo:', typeof $('#input_lista_archivo').val());

            try {
                var parsedArchivos = JSON.parse($('#input_lista_archivo').val() || '{}');
                console.log('input_lista_archivo parseado:', parsedArchivos);
                console.log('Tipo después de parsear:', typeof parsedArchivos);
                console.log('Es array después de parsear:', Array.isArray(parsedArchivos));
            } catch (e) {
                console.log('Error al parsear input_lista_archivo:', e);
            }

            // Recolectar campos de nistagmo provocado dinámicamente
            console.log('📊 Recolectando campos de nistagmo provocado...');
            $('input[id*="Lat"], input[id*="Dur"], select[id*="_1"], select[id*="_2"], select[id*="_3"], select[id*="_4"], select[id*="_5"]').each(function() {
                var id = $(this).attr('id');
                var valor = $(this).val();
                if (id && valor !== undefined && valor !== '') {
                    datosFormulario.nistagmo_provocado[id] = valor;
                    console.log('Campo nistagmo:', id, '=', valor);
                }
            });

            // Recolectar selectores especiales (.ng_esp)
            $('.ng_esp').each(function() {
                var id = $(this).attr('id');
                var valor = $(this).val();
                if (id && valor !== undefined && valor !== '') {
                    datosFormulario.nistagmo_provocado[id] = valor;
                    console.log('Campo ng_esp:', id, '=', valor);
                }
            });

            console.log('✅ Datos recolectados:', datosFormulario);
            return datosFormulario;
        }

        function guardar_examen_octavopar(){
            swal({
                title: "¿Está seguro de guardar el examen del octavo par?",
                content: {
                        element: "div",
                        attributes: {
                        innerHTML: `
                            <p>Revise que toda la información esté correcta antes de continuar.</p>
                            <p><b>No olvide subir Audiometría</b> si corresponde.</p>
                        `
                        },
                    },
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willSave) => {
                if (willSave) {
                    guardar_examen_octavopar_confirmar();
                } else {
                    console.log('❌ Guardado cancelado por el usuario');
                }
            });
        }

        // Función para guardar el examen del octavo par
        function guardar_examen_octavopar_confirmar() {
            console.log('🔄 Iniciando proceso de guardado del examen del octavo par...');

            // Validar que no hay archivos pendientes de subir
            if (!validarArchivosCompletos()) {
                // alert('⚠️ Hay archivos pendientes de subir. Por favor espere a que terminen de cargarse todos los archivos antes de guardar.');
                swal({
                    title: "⚠️ Hay archivos pendientes de subir",
                    text: "Por favor espere a que terminen de cargarse todos los archivos antes de guardar.",
                    icon: "warning",
                    button: "Aceptar"
                })
                return false;
            }

            // Recolectar todos los datos del formulario
            var datosFormulario = recolectarDatosFormulario();

            // Obtener archivos subidos
            var archivosSubidos = obtenerArchivosSubidos();
            console.log('📎 Archivos subidos:', Object.keys(archivosSubidos).length);

            // Validaciones adicionales del formulario
            var errores = validarDatosRequeridos(datosFormulario);
            if (errores.length > 0) {
                // alert('⚠️ Faltan campos requeridos:\n' + errores.join('\n'));
                swal({
                    title: "⚠️ Faltan campos requeridos",
                    text: errores.join('\n'),
                    icon: "warning",
                    button: "Aceptar"
                })
                return false;
            }

            // Agregar datos de contexto
            datosFormulario.id_fc = $('#id_fc').val();
            datosFormulario.hora_medica = $('#hora_medica').val();
            datosFormulario.id_examen = $('#id_examen').val();
            datosFormulario.id_paciente_fc = $('#id_paciente_fc').val();
            datosFormulario.id_profesional_fc = $('#id_profesional_fc').val();
            datosFormulario.id_lugar_atencion = $('#id_lugar_atencion').val();
            datosFormulario.cerrarsession = $('#cerrarsession').val();
            datosFormulario.id_procedimiento = 2; // Código fijo para octavo par

            console.log('📤 Enviando datos al servidor...');

            // Enviar por AJAX
            $.ajax({
                url: "{{ route('ficha.otro.prof.registrar_lab_octavo_par') }}", // Ajustar esta ruta según tu controlador
                type: 'POST',
                data: datosFormulario,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                beforeSend: function() {
                    // Mostrar loading
                    console.log('⏳ Enviando datos...');
                    $('input[type="button"]').prop('disabled', true).val('Guardando...');
                },
                success: function(response) {
                    console.log('✅ Respuesta exitosa:', response);

                    if (response.success || response.estado == 1) {
                        // alert('✅ Examen guardado exitosamente');
                        swal({
                            title: "✅ Examen guardado exitosamente",
                            text: "El examen del octavo par craneal ha sido guardado.",
                            icon: "success",
                            button: "Aceptar"
                        }).then(() => {
                            // Opcional: redireccionar o realizar alguna acción
                            if (response.redirect) {
                                //window.location.href = response.redirect;
                            } else {
                                // Recargar la página o ir a otra vista
                                // window.location.reload();
                                console.log('ℹ️ No hay redirección proporcionada, permaneciendo en la página actual.');
                            }
                        });
                    } else {
                        // alert('❌ Error al guardar: ' + (response.message || 'Error desconocido'));
                        swal({
                            title: "❌ Error al guardar",
                            content:{
                                element: "div",
                                attributes: {
                                    innerHTML: response.msj || 'Error desconocido'
                                }
                            },
                            icon: "error",
                            button: "Aceptar"
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('❌ Error en AJAX:', {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });

                    var mensaje = 'Error al guardar el examen';
                    try {
                        var errorResponse = JSON.parse(xhr.responseText);
                        if (errorResponse.message) {
                            mensaje = errorResponse.message;
                        }
                        if (errorResponse.errors) {
                            mensaje += '\nErrores:\n' + Object.values(errorResponse.errors).join('\n');
                        }
                    } catch (e) {
                        mensaje += '\nDetalles técnicos: ' + xhr.responseText;
                    }

                    // alert('❌ ' + mensaje);
                    swal({
                        title: "❌ " + mensaje,
                        text: mensaje,
                        icon: "error",
                        button: "Aceptar"
                    });
                },
                complete: function() {
                    // Restaurar botones
                    $('input[type="button"]').prop('disabled', false).val('Guardar Examen');
                    console.log('🔄 Proceso completado');
                }
            });

            return false; // Prevenir envío normal del formulario
        }

        // Función para validar campos requeridos
        function validarDatosRequeridos(datos) {
            var errores = [];

            // Validaciones básicas
            if (!datos.fecha_ex) {
                errores.push('- Fecha del examen es requerida');
            }

            // if (!datos.profesional) {
            //     errores.push('- Profesional es requerido');
            // }

            // Validar que al menos algunos campos estén llenos
            var tieneExamenEquilibrio = datos.romberg || datos.marcha_ojo_ab || datos.observaciones_equilibrio;
            var tienePruebaCalorica = datos.DUR_IO30 || datos.DUR_OD30 || datos.comentarios_pc;

            if (!tieneExamenEquilibrio && !tienePruebaCalorica) {
                errores.push('- Debe completar al menos algunos campos del examen');
            }

            return errores;
        }

        // Función para obtener archivos subidos
        function obtenerArchivosSubidos() {
            console.log('📁 Obteniendo archivos subidos del Dropzone...');

            var dropzoneInstance = obtenerInstanciaDropzone();
            var archivos = {};

            if (dropzoneInstance) {
                var archivosSubidos = dropzoneInstance.getAcceptedFiles();
                console.log('📎 Archivos encontrados:', archivosSubidos.length);

                archivosSubidos.forEach(function(archivo, index) {
                    var info = {
                        nombre: archivo.name,
                        tamaño: archivo.size,
                        tipo: archivo.type,
                        status: archivo.status,
                        upload_path: archivo.upload ? archivo.upload.filename : null,
                        server_response: archivo.xhr ? archivo.xhr.response : null
                    };

                    // Intentar obtener información del servidor si está disponible
                    if (archivo.xhr && archivo.xhr.response) {
                        try {
                            var serverData = JSON.parse(archivo.xhr.response);
                            if (serverData.path) info.server_path = serverData.path;
                            if (serverData.filename) info.server_filename = serverData.filename;
                        } catch (e) {
                            console.log('⚠️ No se pudo parsear respuesta del servidor para:', archivo.name);
                        }
                    }

                    archivos['archivo_' + index] = info;
                    console.log('📄 Archivo ' + index + ':', info);
                });
            } else {
                console.log('⚠️ No se encontró instancia de Dropzone');
            }

            return archivos;
        }

        // Función para validar que todos los archivos están completamente subidos
        function validarArchivosCompletos() {
            console.log('🔍 Validando estado de archivos...');

            var dropzoneInstance = obtenerInstanciaDropzone();
            if (!dropzoneInstance) {
                console.log('✅ No hay Dropzone, continuando...');
                return true;
            }

            var archivosEnProceso = dropzoneInstance.getUploadingFiles();
            var archivosEnCola = dropzoneInstance.getQueuedFiles();

            console.log('📊 Estado de archivos:', {
                subiendo: archivosEnProceso.length,
                en_cola: archivosEnCola.length,
                aceptados: dropzoneInstance.getAcceptedFiles().length,
                total: dropzoneInstance.files.length
            });

            if (archivosEnProceso.length > 0) {
                console.log('⚠️ Hay archivos subiendo:', archivosEnProceso.length);
                return false;
            }

            if (archivosEnCola.length > 0) {
                console.log('⚠️ Hay archivos en cola:', archivosEnCola.length);
                return false;
            }

            console.log('✅ Todos los archivos están completos');
            return true;
        }

        // Función para configurar el envío del formulario
        function configurarEnvioFormulario() {
            console.log('⚙️ Configurando envío del formulario...');

            // Interceptar el envío del formulario
            $('form').on('submit', function(e) {
                e.preventDefault();
                console.log('🚀 Envío de formulario interceptado');
                guardar_examen_octavopar();
                return false;
            });

            // También manejar botones específicos de guardar
            $('input[type="submit"], button[type="submit"]').on('click', function(e) {
                e.preventDefault();
                console.log('🔘 Botón de guardar clickeado');
                guardar_examen_octavopar();
                return false;
            });

            console.log('✅ Formulario configurado para envío por AJAX');
        }

        // Inicialización cuando el documento esté listo
        $(document).ready(function() {
            console.log('🚀 Inicializando página de examen del octavo par...');

            // Inicializar Dropzone (la función que realmente existe)
            inicializarDropzone();

            // Configurar envío del formulario por AJAX
            // configurarEnvioFormulario();

            // Agregar funciones de depuración globales
            window.debugDropzone = debugDropzoneStatus;
            window.obtenerDropzone = obtenerInstanciaDropzone;
            window.guardar_examen_octavopar = guardar_examen_octavopar;
            window.recolectarDatosFormulario = recolectarDatosFormulario;

            console.log('✅ Página inicializada correctamente');
            console.log('🔧 Funciones disponibles:');
            console.log('  - debugDropzone() - Estado del dropzone');
            console.log('  - obtenerInstanciaDropzone() - Obtener instancia');
            console.log('  - guardar_examen_octavopar() - Guardar formulario');
            console.log('  - recolectarDatosFormulario() - Recolectar datos');
            console.log('  - testArchivos() - Test completo de archivos');
            console.log('  - regenerarListaArchivos() - Regenerar lista archivos');
            console.log('  - verificarArchivosSubidos() - Verificación detallada');
            console.log('  - simularGuardado() - Simulación de guardado');
        });

        // Función para testing manual desde la consola
        function testRecoleccionDatos() {
            console.log('🧪 Testing recolección de datos...');
            var datos = recolectarDatosFormulario();
            console.table(datos);
            return datos;
        }

        // Función para regenerar la lista de archivos en formato correcto
        function regenerarListaArchivos() {
            console.log('🔄 Regenerando lista de archivos...');

            var dropzoneInstance = obtenerInstanciaDropzone();
            if (!dropzoneInstance) {
                console.error('❌ No hay instancia de Dropzone');
                return false;
            }

            var archivosAceptados = dropzoneInstance.getAcceptedFiles();
            var nuevaLista = {};

            archivosAceptados.forEach(function(file, index) {
                if (file.status === "success" && file.xhr && file.xhr.response) {
                    try {
                        var response = JSON.parse(file.xhr.response);
                        if (response && response.archivo) {
                            // Asegurar estructura correcta (objeto con propiedades)
                            nuevaLista[index] = {
                                url: response.archivo.url,
                                nombre_original: response.archivo.original_file_name,
                                nombre_archivo: response.archivo.nombre_archivo,
                                file_extension: response.archivo.file_extension,
                                tamaño: file.size,
                                tipo: file.type,
                                fecha_subida: new Date().toISOString()
                            };

                            console.log('✅ Archivo regenerado:', index, nuevaLista[index]);
                        }
                    } catch (e) {
                        console.error('❌ Error procesando archivo:', file.name, e);
                    }
                }
            });

            // Actualizar el campo hidden
            var nuevaListaJSON = JSON.stringify(nuevaLista);
            $('#input_lista_archivo').val(nuevaListaJSON);

            console.log('📄 Nueva lista generada:', nuevaLista);
            console.log('📄 JSON actualizado:', nuevaListaJSON);

            return nuevaLista;
        }

        // Función para verificar archivos subidos con detalles técnicos
        function verificarArchivosSubidos() {
            console.log('🔍 VERIFICACIÓN DETALLADA DE ARCHIVOS SUBIDOS');
            console.log('=' .repeat(60));

            var dropzoneInstance = obtenerInstanciaDropzone();
            if (!dropzoneInstance) {
                console.error('❌ No hay instancia de Dropzone');
                return false;
            }

            var archivosAceptados = dropzoneInstance.getAcceptedFiles();
            console.log('📊 Total de archivos aceptados:', archivosAceptados.length);

            var detallesArchivos = [];

            archivosAceptados.forEach(function(file, index) {
                console.log(`\n🔍 ARCHIVO ${index + 1}: ${file.name}`);
                console.log('-'.repeat(40));

                var detalleArchivo = {
                    index: index,
                    nombre: file.name,
                    estado: file.status,
                    tamaño: file.size,
                    tipo: file.type,
                    xhr_response: null,
                    datos_servidor: null,
                    error: null
                };

                if (file.xhr && file.xhr.response) {
                    try {
                        var response = JSON.parse(file.xhr.response);
                        detalleArchivo.xhr_response = response;

                        if (response && response.archivo) {
                            detalleArchivo.datos_servidor = response.archivo;

                            console.log('✅ Respuesta del servidor válida:');
                            console.log('  📁 Nombre original:', response.archivo.original_file_name);
                            console.log('  🏷️ Nombre archivo:', response.archivo.nombre_archivo);
                            console.log('  📄 Extensión:', response.archivo.file_extension);
                            console.log('  🔗 URL:', response.archivo.url);
                            console.log('  📋 Tipo MIME:', response.archivo.file_mime_type);

                            // Verificar si está en la lista de archivos actual
                            var listaActual = $('#input_lista_archivo').val();
                            if (listaActual) {
                                try {
                                    var listaParseada = JSON.parse(listaActual);
                                    var estaEnLista = false;

                                    Object.keys(listaParseada).forEach(function(key) {
                                        var item = listaParseada[key];
                                        if (Array.isArray(item)) {
                                            // Formato legacy
                                            if (item[2] === response.archivo.nombre_archivo) {
                                                estaEnLista = true;
                                            }
                                        } else if (item.nombre_archivo === response.archivo.nombre_archivo) {
                                            // Formato nuevo
                                            estaEnLista = true;
                                        }
                                    });

                                    console.log('  📋 Está en lista:', estaEnLista ? '✅ SÍ' : '❌ NO');
                                    detalleArchivo.esta_en_lista = estaEnLista;
                                } catch (e) {
                                    console.log('  📋 Error verificando lista:', e.message);
                                    detalleArchivo.error_lista = e.message;
                                }
                            }
                        } else {
                            console.log('❌ Respuesta del servidor inválida');
                            detalleArchivo.error = 'Respuesta inválida del servidor';
                        }
                    } catch (e) {
                        console.log('❌ Error parseando respuesta:', e.message);
                        detalleArchivo.error = 'Error parseando respuesta: ' + e.message;
                    }
                } else {
                    console.log('❌ No hay respuesta del servidor');
                    detalleArchivo.error = 'Sin respuesta del servidor';
                }

                detallesArchivos.push(detalleArchivo);
            });

            console.log('\n📋 RESUMEN DE VERIFICACIÓN:');
            console.log('Total archivos:', detallesArchivos.length);
            console.log('Con respuesta válida:', detallesArchivos.filter(a => a.datos_servidor).length);
            console.log('Con errores:', detallesArchivos.filter(a => a.error).length);

            console.log('\n📄 Lista actual en input_lista_archivo:');
            var listaActual = $('#input_lista_archivo').val();
            console.log('Raw:', listaActual);

            if (listaActual) {
                try {
                    var parsed = JSON.parse(listaActual);
                    console.log('Parseado:', parsed);
                    console.log('Tipo:', typeof parsed);
                    console.log('Es array:', Array.isArray(parsed));
                    console.log('Claves:', Object.keys(parsed));
                } catch (e) {
                    console.log('Error parseando:', e.message);
                }
            }

            console.log('=' .repeat(60));

            return {
                total: detallesArchivos.length,
                validos: detallesArchivos.filter(a => a.datos_servidor).length,
                errores: detallesArchivos.filter(a => a.error).length,
                detalles: detallesArchivos
            };
        }        // Hacer funciones de testing disponibles globalmente
        window.testRecoleccionDatos = testRecoleccionDatos;
        window.regenerarListaArchivos = regenerarListaArchivos;
        window.verificarArchivosSubidos = verificarArchivosSubidos;

        // Mensaje de estado al final de la carga
        $(document).ready(function() {
            setTimeout(function() {
                console.log('🎯 ESTADO FINAL DE DROPZONE:');
                console.log('📋 Para debuggear archivos, use: testArchivos()');
                console.log('📋 Para verificar archivos, use: verificarArchivosSubidos()');
                console.log('📋 Para regenerar archivos, use: regenerarListaArchivos()');
                console.log('📋 Para debuggear dropzone, use: debugDropzone()');
                console.log('📋 Para obtener instancia: obtenerInstanciaDropzone()');
                console.log('📋 Elemento objetivo: #mis-archivos-octavo-par');
                debugDropzoneStatus();
            }, 2000); // Esperar 2 segundos para que todo se inicialice
        });

        /************** ARCHIVO **************/

        function generar_pdf(){

            var datos = recolectarDatosFormulario();
            datos.id_examen = $('#id_examen').val();
            datos.id_fc = $('#id_fc').val();
            datos.id_paciente_fc = $('#id_paciente_fc').val();
            datos.id_profesional_fc = $('#id_profesional_fc').val();
            datos.id_lugar_atencion = $('#id_lugar_atencion').val();
            datos.id_procedimiento = 2; // Código fijo para octavo par

            // validacion
            var valido = validarDatosRequeridos(datos);
            if(valido.length > 0){
                swal({
                    title: "⚠️ Faltan campos requeridos",
                    text: valido.join('\n'),
                    icon: "warning",
                    button: "Aceptar"
                })
                return false;
            }

            $.ajax({
                url: "{{ route('ficha.otro.prof.generar_pdf_octavo_par') }}", // Ajustar esta ruta según tu controlador
                type: 'POST',
                data: datos,
                headers: {
                    'X-CSRF-TOKEN': CSRF_TOKEN,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                success: function(data) {
                    console.log(data);
                    if(data.ruta){
                            swal({
                                title: "Examen Generado",
                                text: "El PDF se ha generado correctamente",
                                icon: "success",
                                button: "Aceptar"
                            }).then(() => {
                                // Abrir el PDF en una ventana emergente
                                var width = 800;
                                var height = 600;
                                var left = (screen.width - width) / 2;
                                var top = (screen.height - height) / 2;
                                window.open(data.ruta, 'Examen', 'width=' + width + ',height=' + height + ',top=' + top + ',left=' + left);
                            });
                        }else{
                            swal({
                                title: "Error",
                                text: "Ha ocurrido un error al generar el PDF.",
                                icon: "error",
                                button: "Aceptar"
                            });
                        }
                },
                error: function(xhr, status, error) {
                    console.error('❌ Error en AJAX:', {
                        status: status,
                        error: error,
                        response: xhr.responseText
                    });
                    swal({
                        title: "Error",
                        text: "Ocurrió un error al generar el PDF.",
                        icon: "error",
                        button: "Aceptar"
                    });
                }
            })
        }
    </script>
