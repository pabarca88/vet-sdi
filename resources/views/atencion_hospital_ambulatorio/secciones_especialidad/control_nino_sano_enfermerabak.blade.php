@extends('template.pediatria.template_pediatria')
@section('Content')
<div class="tab-pane fade" id="ns" role="tabpanel" aria-labelledby="ns-tab">
    <div class="row bg-white shadow-sm rounded mx-1">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mt-3 mb-0">
                    <h6 class="f-16 text-c-blue">Ficha de atención Niño Sano</h6>
                    <hr>
                </div>
            </div>
            <div class="row bg-white shadow-sm rounded mx-3 mt-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-2">
                            <h6 class="f-18 d-inline float-left">Control de parámetros  en crecimiento y desarrollo</h6>
                            <h6 class="f-16 d-inline float-right">Viernes, 18 de Marzo de 2022</h6>
                        </div>
                    </div>
                    <hr class="mt-1">
                    <!--Formularios (botones)-->
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-pills mt-1 mb-4" id="pills-tab-crec-desarrollo" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link-modal active" id="pills-tab-parto-perpu" data-toggle="pill" href="#pills-parto-perpu" role="tab" aria-controls="pills-parto-perpu" aria-selected="true">Info del acompañante, parto y puerperio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-0-7-dias-tab" data-toggle="pill" href="#pills-0-7-dias" role="tab" aria-controls="pills-0-7-dias" aria-selected="false">Recien nacido (0 y 7 días)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-1-mes-tab" data-toggle="pill" href="#pills-1-mes" role="tab" aria-controls="pills-1-mes" aria-selected="false">Control 1 mes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-2-5-meses-tab" data-toggle="pill" href="#pills-2-5-meses" role="tab" aria-controls="pills-2-5-meses" aria-selected="false">Lactante menor (2 a 5 meses)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-6-11-meses-tab" data-toggle="pill" href="#pills-6-11-meses" role="tab" aria-controls="pills-6-11-meses" aria-selected="false">Lactante medio (6 a 11 meses)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-12-23-meses-tab" data-toggle="pill" href="#pills-12-23-meses" role="tab" aria-controls="pills-12-23-meses" aria-selected="false">Lactante mayor (12 a 23 meses)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-2-4-anos-tab" data-toggle="pill" href="#pills-2-4-anos" role="tab" aria-controls="pills-2-4-anos" aria-selected="false">Lactante menor (2 a 4 años)</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link-modal" id="pills-6-9-anos-tab" data-toggle="pill" href="#pills-6-9-anos" role="tab" aria-controls="pills-6-9-anos" aria-selected="false">Escolar (6 a 9 años)</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent-crec-desarrollo">
                                <!--Info del acompañante, parto y puerperio-->
                                <div class="tab-pane fade show active" id="pills-parto-perpu" role="tabpanel" aria-labelledby="pills-tab-parto-perpu">
                                    <div class="row">
                                        <div class="col-md-12 mt-0">
                                            <h6 class="text-c-blue f-16">Información del acompañante, parto y puerperio</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>Información del acompañente</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Rut</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Nombres</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre_acompañante" id="nombre_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Apellidos</label>
                                                        <input type="text" class="form-control form-control-sm" name="apellidos_acompañante" id="apellidos_acompañante">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Relación</label>
                                                        <input type="text" class="form-control form-control-sm" name="relacion_acompañante" id="relacion_acompañante">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>Información del embarazo puerperio</h6>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Clínica / Hospital</label>
                                                        <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Patología del Embarazo</label>
                                                        <input type="text" class="form-control form-control-sm" name="pat_embarazo" id="pat_embarazo">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Semanas gestación</label>
                                                        <input type="text" class="form-control form-control-sm" name="sem_gest" id="sem_gest">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Embarazo controlado</label>
                                                        <input type="text" class="form-control form-control-sm" name="cont_emb" id="cont_emb">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Tipo de parto</label>
                                                        <input type="text" class="form-control form-control-sm" name="tpo_parto" id="tpo_parto">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Lactancia</label>
                                                        <input type="text" class="form-control form-control-sm" name="madre_lactancia" id="madre_lactancia">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Inscripción en Registro Civil</label>
                                                        <input type="text" class="form-control form-control-sm" name="insc" id="insc">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Otros</label>
                                                        <input type="text" class="form-control form-control-sm" name="otros_parto" id="otros_parto">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>II. Datos del recién nacido <i id="btn_recien_nacido" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                    </div>
                                                </div>
                                                <div class="form-row" id="recien_nacido" style="display:none;">
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label-activo-sm">Fecha nacimiento</label>
                                                        <input type="date" class="form-control form-control-sm" name="fn" id="fn">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label-activo-sm">Hora</label>
                                                        <input type="time" class="form-control form-control-sm" name="hora" id="hora">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">Peso (kg.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="p_nac" id="p_nac">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">Talla (cm.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="talla" id="talla">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">Perimetro cefálico (cm.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="pc" id="pc">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">APGAR min</label>
                                                        <input type="text" class="form-control form-control-sm" name="" id="">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">APGAR 5 min</label>
                                                        <input type="text" class="form-control form-control-sm" name="a_1" id="a_1">
                                                    </div>
                                                    <div class="form-group col-sm-3 col-md-3">
                                                        <label class="floating-label">Edad gestacional</label>
                                                        <input type="text" class="form-control form-control-sm" name="a_5" id="a_5">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6">
                                                        <label class="floating-label">Reanimación</label>
                                                        <input type="text" class="form-control form-control-sm" name="reanimacion" id="reanimacion">
                                                    </div>
                                                    <div class="form-group col-sm-6 col-md-6">
                                                        <label class="floating-label">Medicamentos</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="medicamento" id="med"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Diagnóstico</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="diag" id="diag"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Pronóstico</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="pronostico" id="pronostico"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Observaciones</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="obs" id="obs"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>III. Vacunas <i id="btn_vac_part_puerp" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                    </div>
                                                </div>
                                                <div class="form-row" id="vac_part_puerp" style="display:none;">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">BCG</label>
                                                        <input type="text" class="form-control form-control-sm" name="bcg" id="bcg">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Hepatitis B</label>
                                                        <input type="text" class="form-control form-control-sm" name="hep_b" id="hep_b">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Otra</label>
                                                        <input type="text" class="form-control form-control-sm" name="otra_vac" id="otra_vac">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Sueros y Medicamentos</label>
                                                        <input type="text" class="form-control form-control-sm" name="otra_vac" id="otra_vac">
                                                    </div>
                                                </div>
                                                <div class="form-row mb-2">
                                                    <div class="col-md-12">
                                                        <h6>IV. Exámenes y Tamizaje <i id="btn_extamiz" class="fas fa-plus-circle text-primary" data-toggle="tooltip" data-placement="top" title="Ver" style="cursor:pointer;"></i></h6>
                                                    </div>
                                                </div>
                                                <div class="form-row" id="extamiz" style="display:none;">
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">TSH</label>
                                                        <input type="text" class="form-control form-control-sm" name="tsh" id="tsh">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">Evaluacion auditíva</label>
                                                        <input type="text" class="form-control form-control-sm" name="eval_audit" id="eval_audit">
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label class="floating-label">PKU</label>
                                                        <input type="text" class="form-control form-control-sm" name="pku" id="pku">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Otros</label>
                                                        <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=2" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Recién nacido (0 y 7 días)-->
                                <div class="tab-pane fade" id="pills-0-7-dias" role="tabpanel" aria-labelledby="pills-0-7-dias-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Recién nacido (0 y 7 días)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <!--Control parametros 0 y 7 días-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Control parámetros 0 y 7 días</h6>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="floating-label">Anamnesis</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Experiencia del embarazo parto y puerperio</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Estado emocional familiar y redes de apoyo</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Lactancia (hasta el momento del control) </label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Antecedentes heredo-familiares maternos</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Antecedentes heredo-familiares paternos</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_pat" name="ant_pat" ></textarea>
                                                    </div>
                                                </div>
                                                <!--Examen físico del menor-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Examen físico del menor</h6>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label class="floating-label">Inspección general</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Actividad</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="actividad" name="actividad" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Malformaciones</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="malf" name="malf" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Tono y postura</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tono" name="tono" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Piel</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Ex. oftalmológico</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Ex. Buco-dental</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucoden" name="bucoden" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Cabeza y cuello</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cab_cuello" name="cab_cuello" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Cordón</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cordon" name="cordon" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3" id="form_0">
                                                        <label class="floating-label">Abdomen</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abd" name="abd" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Tórax</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="torax" name="torax" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Columna</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="columna" name="columna" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Extremidades</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extremidades" name="extremidades" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Genitales y Ano</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genit_ano" name="genit_ano" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="floating-label">Ex. Neurológico (reflejos)</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genit_ano" name="genit_ano" ></textarea>
                                                    </div>
                                                </div>
                                                <!--Antropometría-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Antropometría</h6>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Peso (gr.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Longitud (cm.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="peri_cef" id="peri_cef">
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label">Otros</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_ant" name="otros_ant" ></textarea>
                                                    </div>
                                                </div>
                                                <!--Estado de salud materno-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Estado de salud materno</h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Signos vitales</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Peso (kg.)</label>
                                                        <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Involución uterina</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Hda. Operatoria</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Zona genito-anal</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Extremidades inferiores (edemas)</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                </div>
                                                <!--Lactancia materna-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Lactancia materna</h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">General</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Técnica</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Ex. mamas</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                </div>
                                                <!--Diagnósticos-->
                                                <div class="form-row">
                                                    <div class="col-md-12 mb-3 mt-2">
                                                        <h6>Diagnósticos</h6>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">General</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Incremento ponderal</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Lactancia</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Salud del lactante</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Salud de la madre</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="floating-label">Salud sico-social</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="descripcion" name="descripcion" ></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Recién nacido (1 mes)-->
                                <div class="tab-pane fade" id="pills-1-mes" role="tabpanel" aria-labelledby="pills-1-mes-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Control 1 mes</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Evaluación relación-familiares</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=9" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral"></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Cardio pulmonar</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cardiopulm" name="ex_cardiopulmf" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ex genito-anal</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Reflejos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Motilidad</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="motilidad" name="motilidad" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Tono axilar</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Signos sug. parálisis cerebral</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="s_paralisis" name="s_paralisis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Columna</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="columna" name="columna" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Caderas</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Extremidades</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extremidades" name="extremidades" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Oftalmológico</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Auditivo</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Buco dental</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucoden" name="bucoden" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso en (gr.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Longitud (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Cefalohematomas Fontanella ant</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Lactancia materna</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="lac_general" name="lac_general" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Técnica</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="tec" name="tec" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ex. Mamas</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="mamas" name="mamas" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label-activo-sm">Señales de maltrato</label>
                                                     <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Incremento ponderal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Nutricional</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud del lactante</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud de la madre</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_madre" id="sal_madre"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Lactante menor (2 a 5 meses)-->
                                <div class="tab-pane fade" id="pills-2-5-meses" role="tabpanel" aria-labelledby="pills-2-5-meses-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Lactante menor (2 y 5 meses)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Antecedentes heredofamiliares maternos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_mat" name="ant_mat" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Antecedentes heredofamiliares paternos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ant_pat" name="ant_pat" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Test de Edimburgo</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Rx. Caderas</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Evaluación DSM</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="rx_cadera" name="rx_cadera" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general y relación parental</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Cardiopulmonar</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Genitoanal</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Reflejos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Tono y motilidad</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Caderas</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Extremidades</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen oftalmológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen auditívo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso en (gr.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Longitud (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros (lesiones)</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font"></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Señales de maltrato</label>
                                                     <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Incremento ponderal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lactancia</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud del lactante</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros</label>
                                                     <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                     <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Lactante medio (6 a 11 meses)-->
                                <div class="tab-pane fade" id="pills-6-11-meses" role="tabpanel" aria-labelledby="pills-6-11-meses-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Lactante medio (6 y 11 meses)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Test de Edimburgo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="edimburgo" name="edimburgo"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pautas prevención accidentes</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="prev_accident" name="prev_accident"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros" name="otros"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general y relación parental</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Cardiopulmonar</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Genitoanal</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Reflejos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Tono y motilidad</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Caderas</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Extremidades</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen oftalmológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen auditívo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso en (gr.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Longitud (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="per_cef" id="per_cef">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros (lesiones)</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Señales de maltrato</label>
                                                     <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Incremento ponderal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lactancia</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud del lactante</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_lact" id="sal_lact"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros</label>
                                                     <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                     <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Lactante mayor (12 a 23 meses)-->
                                <div class="tab-pane fade" id="pills-12-23-meses" role="tabpanel" aria-labelledby="pills-12-23-meses-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Lactante mayor (12 y 23 meses)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Dieta</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Hábitos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Rutinas de sueño alimentación</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Prevención de accidentes</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Cuidadores</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general y relación parental</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Cardiopulmonar</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Genitoanal</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Reflejos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="reflejos" name="reflejos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Tono y motilidad</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="t_motilidad" name="t_motilidad" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Caderas</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="caderas" name="caderas" ></textarea>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Extremidades</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="extr" name="extr" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen oftalmológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Examen auditívo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso en (gr.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Longitud (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="per_cefalico" id="per_cefalico">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros (lesiones)</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="otros_font" name="otros_font" ></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Señales de maltrato</label>
                                                     <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Incremento ponderal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inscr_ponderal" id="inscr_ponderal"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Lactancia</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="lactancia" id="lactancia"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud del lactante</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_lactante" id="salud_lactante"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud de la madre</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="salud_madre" id="salud_madre"></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_psico" id="sal_psico"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Pre-escolar (2 a 4 años)-->
                                <div class="tab-pane fade" id="pills-2-4-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Pre-escolar (2 y 4 años)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Evaluaciones indicaciones anteriores</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ev_anter" name="ev_anter" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Dieta</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="dieta" name="dieta" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Hábitos</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="habitos" name="habitos" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Rutinas de sueño alimentación</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Prevención de accidentes</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="accidentes" name="accidentes" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Cuidadores</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="cuidadores" name="cuidadores" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen Físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general y relación parental</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Cardiopulmonar</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ex_cv" name="ex_cv" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Genitoanal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Presión arterial</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Neurológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="neurl" name="neurl" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Marcha</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pié plano flexible</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pié plano doloroso</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Genu valgo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Examen oftalmológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Examen auditívo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Peso en (gr.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label class="floating-label">Longitud (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Perímetro cefálico (cm.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="per_cefal" id="per_cefal">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Bucodental</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="bucodental" name="bucodental" ></textarea>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Señales de maltrato</label>
                                                     <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="dg_gen" id="dg_gen"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Incremento ponderal</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="inc_pon" id="inc_pon"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Otros</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="otros" id="otros"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_sicosocial" id="sal_sicosocial"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Escolar (6 a 9 años)-->
                                <div class="tab-pane fade" id="pills-6-9-anos" role="tabpanel" aria-labelledby="pills-2-4-anos-tab">
                                    <div class="row">
                                        <div class="col-md-12 mt-1">
                                            <h6 class="text-c-blue f-16">Escolar (6 y 9 años)</h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Anamnesis</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="anamnesis" name="anamnesis" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Evaluaciones psicoafectivas</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="ev_psicoa" name="ev_psicoa" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Otros</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=8" onblur="this.rows=1;" id="sueno_alim" name="sueno_alim" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Examen físico del menor</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label class="floating-label">Inspección general y relación parental</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="insp_gral" name="insp_gral" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-1">
                                                <div class="col-md-12">
                                                    <h6>Antropometría</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Peso (kg.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="peso" id="peso">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">Talla (cms.)</label>
                                                    <input type="number" class="form-control form-control-sm" name="longitud" id="longitud">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label class="floating-label">IMC</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" id="imc" name="imc" ></textarea>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button type="button" class="btn btn-info btn-block btn-sm">Calcular IMC</button>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Piel</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="piel" name="piel" ></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Ganglios</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="ganglios" name="ganglios" ></textarea>
                                                </div>
                                                <div class="form-group col-md-12 mb-0">
                                                    <p class="text-danger">Este examen se debe desarrollar con la presencia del adulto responsable del menor y con el consentimiento escolar*</p>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                    <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="desarr_pub" name="desarr_pub" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label text-danger">Desarrollo puberal *</label>
                                                    <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="abdomen" name="abdomen" placeholder="REVISAR RESPUESTAS DEL CUESTIONARIO (COMPLETADO POR PADRES)" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label text-danger">Ex. Genitoanal *</label>
                                                    <textarea class="form-control form-control-sm"  rows="2" onfocus="this.rows=6" onblur="this.rows=2;" id="genito_anal" name="genito_anal" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Presión arterial</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_arterial" name="p_arterial" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Test de Adams</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="adams" name="adams" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                        <label class="floating-label">Ex. Tórax</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="torax" name="torax" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Abdomen</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="abdomen" name="abdomen" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Ex. Bucodental</label>
                                                    <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="buco_dent" name="buco_dent" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Marcha</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="marcha" name="marcha" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pié plano flexible</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planof" name="p_planof" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Pié plano doloroso</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="p_planod" name="p_planod" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Genu valgo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="genu" name="genu" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Examen oftalmológico</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="oft" name="oft" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Examen auditívo</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="audit" name="audit" ></textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="floating-label">Señales de maltrato</label>
                                                        <textarea class="form-control form-control-sm"  rows="1" onfocus="this.rows=6" onblur="this.rows=1;" id="maltrato" name="maltrato" ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row mb-2">
                                                <div class="col-md-12">
                                                    <h6>Diagnósticos</h6>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">General</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="general" id="general"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Nutricional</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="nutricional" id="nutricional"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Salud (General)</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="sal_gnal" id="sal_gnal"></textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="floating-label">Salud psicosocial</label>
                                                    <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=6" onblur="this.rows=1;" name="s_psicosocial" id="s_psicosocial"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Próximo control-->
                    <div class="row mt-3">
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-info align-middle">
                                    <h6 class="float-left d-inline">Indicaciones de próximo control</h6>
                                </div>
                                <div class="card-body shadow-none">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label class="floating-label-activo-sm">Fecha</label>
                                                <input type="date" class="form-control form-control-sm" name="fecha" id="fecha">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="floating-label">Control con:</label>
                                                <input type="text" class="form-control form-control-sm" name="control" id="control">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="floating-label">Sugerencias</label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="sug" id="sug"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="floating-label">Otras sugerencias</label>
                                                <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;" name="otras_sugerencias" id="otras_sugerencias"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Botones carnet vacunas-->
                    <div class="row">
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="carnet_vac();"><i class="fa fa-plus"></i> Carnet de vacunas generales</button>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="inter();"><i class="fa fa-plus"></i> Interconsulta</button>
                        </div>
                        <div class="form-group col-md-4">
                            <button type="button" class="btn btn-success btn-block btn-sm mt-1" onclick="otras_vac();"><i class="fa fa-plus"></i> Carnet de vacunas especiales</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <button type="reset" class="btn btn-danger">Borrar</button>
                            <button type="submit" class="btn btn-info">Guardar ficha</button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
@endsection
