<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-0 pt-3">
                        <h6 class="f-16 text-c-blue">Licencia médica</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form>
                            <!--SWITCH TIPO ENFERMEDAD-->
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group ml-3">
                                        <div class="switch switch-success d-inline m-r-10">
                                          <input type="checkbox" id="tipo_licencia_1" checked>
                                          <label for="tipo_licencia_1" class="cr"></label>
                                        </div>
                                        <label>Enfermedad común o maternal</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ml-3">
                                        <div class="switch switch-success d-inline m-r-10">
                                          <input type="checkbox" id="tipo_licencia_2" checked>
                                          <label for="tipo_licencia_2" class="cr"></label>
                                        </div>
                                        <label>Laboral</label>
                                    </div>
                                </div>
                            </div>
                            <!--INFO. DEL TRABAJADOR-->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="info-trabajador">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#info-trabajador-c" aria-expanded="false" aria-controls="info-trabajador-c">
                                              Información del trabajador
                                            </button>
                                        </div>
                                        <div id="info-trabajador-c" class="collapse show" aria-labelledby="info-trabajador" data-parent="#info-trabajador">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Previsión</label>
                                                            <input type="text" class="form-control form-control-sm" value="{{ $paciente->prevision->nombre }}">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label class="floating-label-activo-sm">Rut</label>
                                                            <input type="text" class="form-control form-control-sm" name="rut_paciente_fc" id="rut_paciente_fc" value="{{ $paciente->rut }}">

                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <button type="button" class="btn btn-sm btn-success btn-block">Verificar</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--REPOSO-->
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="reposo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#reposo-c" aria-expanded="false" aria-controls="reposo-c">
                                              Reposo
                                            </button>
                                        </div>
                                        <div id="reposo-c" class="collapse show" aria-labelledby="reposo" data-parent="#reposo">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">N° días</label>
                                                        <input type="text" name="num_dias_reposo" id="num_dias_reposo" class="form-control form-control-sm" onchange="sumaFecha(this.value,$('#fecha').val());"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Desde</label>
                                                        <input type="date" name="fecha" id="fecha" class="form-control form-control-sm"/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">Hasta</label>
                                                        <input type="text" name="hasta" id="hasta" class="form-control form-control-sm" value=""/>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label class="floating-label-activo-sm">
                                                        Tipo de reposo
                                                        </label>
                                                        <select class="form-control form-control-sm" name="tipo_reposo" id="tipo_reposo">
                                                            <option selected>Total</option>
                                                            <option>Mañana</option>
                                                            <option>Tarde</option>
                                                            <option>Otro</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <script>
                                                    // Función que suma o resta días a la fecha indicada
                                                    sumaFecha = function(d, fecha)
                                                    {
                                                    var Fecha = new Date();
                                                    var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
                                                    var sep = sFecha.indexOf('/') != -1 ? '/' : '-';
                                                    var aFecha = sFecha.split(sep);
                                                    var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
                                                    fecha= new Date(fecha);
                                                    fecha.setDate(fecha.getDate()+parseInt(d));
                                                    var anno=fecha.getFullYear();
                                                    var mes= fecha.getMonth()+1;
                                                    var dia= fecha.getDate();
                                                    mes = (mes < 10) ? ("0" + mes) : mes;
                                                    dia = (dia < 10) ? ("0" + dia) : dia;
                                                    var fechaFinal = dia+sep+mes+sep+anno;
                                                   // return (fechaFinal);
                                                    $('#hasta').val(fechaFinal);
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--INFORMACION LICENCIA-->
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" id="menor-edad">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#menor-edad-c" aria-expanded="false" aria-controls="menor-edad-c">
                                              Información de licencia
                                            </button>
                                        </div>
                                        <div id="menor-edad-c" class="collapse show" aria-labelledby="menor-edad" data-parent="#menor-edad">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4 mt-2">
                                                            <label class="floating-label-activo-sm"> Tipo de licencia</label>
                                                            <select class="form-control d-inline form-control-sm" name="" id="">
                                                                <option>Seleccione una opción</option>
                                                                <option value= "1" selected>Tipo 1: enfermedad o accidente común.</option>
                                                                <option value= "2" >Tipo 2: medicina preventiva.</option>
                                                                <option value= "3" >Tipo 3: pre y postnatal.</option>
                                                                <option value= "4">Tipo 4: enfermedad grave del niño menor del año</option>
                                                                <option value= "5">Tipo 5: Patología del Embarazo</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                              <div class="switch switch-success d-inline m-r-2">
                                                                  <input type="checkbox" id="info_licencia_1" checked>
                                                                  <label for="info_licencia_1" class="cr"></label>
                                                              </div>
                                                              <label>Recuperabilidad laboral</label>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <div class="switch switch-success d-inline m-r-2">
                                                                <input type="checkbox" id="info_licencia_2" checked>
                                                                <label for="info_licencia_2" class="cr"></label>
                                                            </div>
                                                            <label>Inicio trámite de invalidez</label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Formulario / Diagnóstico-->
                            <div class="form-row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="card">
                                        <div class="card-header" id="diagnostico_lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#diagnostico-_lic-c" aria-expanded="false" aria-controls="diagnostico-_lic-c">
                                                Diagnóstico
                                            </button>
                                        </div>
                                        <div id="diagnostico-_lic-c" class="collapse show" aria-labelledby="diagnostico_lic" data-parent="#diagnostico_lic">
                                            <div class="card-body-aten shadow-none">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) &&
                                                        $fichaAtencion->hipotesis_diagnostico != null)
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm"  data-input_igual="hip-diag_spec,descripcion_hipotesis" name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{{ $fichaAtencion->hipotesis_diagnostico }}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Hipótesis
                                                            Diagnóstica</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="hip-diag_spec,descripcion_hipotesis"  name="lic_descripcion_hipotesis" id="lic_descripcion_hipotesis" value="{!! old('descripcion_hipotesis') !!}" onchange="cargarIgual('lic_descripcion_hipotesis')">
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        @if (isset($fichaAtencion) && $fichaAtencion->diagnostico_ce10
                                                        != null)
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{{ $fichaAtencion->diagnostico_ce10 }}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @else
                                                        <label class="floating-label-activo-sm">Diagnóstico CIE-10</label>
                                                        <input type="text" class="form-control form-control-sm" data-input_igual="descripcion_cie,descripcion_cie_esp" name="lic_descripcion_cie" id="lic_descripcion_cie" value="{!! old('lic_descripcion_cie') !!}" onchange="cargarIgual('lic_descripcion_cie')">
                                                        <input type="hidden" class="form-control form-control-sm" data-input_igual="id_descripcion_cie,id_descripcion_cie_esp" name="id_lic_descripcion_cie" id="id_lic_descripcion_cie" value="{!! old('id_lic_descripcion_cie') !!}" onchange="cargarIgual('id_lic_descripcion_cie')">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Cierre: Formulario / Diagnóstico-->

                            <!--OTROS ANTECEDENTES-->
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" id="ot-ant-lic">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#ot-ant-lic-c" aria-expanded="false" aria-controls="ot-ant-lic-c">
                                                Otros antecedentes
                                            </button>
                                        </div>
                                        <div id="ot-ant-lic-c" class="collapse show" aria-labelledby="ot-ant-lic" data-parent="#ot-ant-lic">
                                            <div class="card-body-aten shadow-none">
                                            <form>
                                                <div class="form-row">
                                                    <div class="form-group col-sm-12 col-md-12">
                                                        <label class="floating-label">Descripción</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion" id="descripcion">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--EXAMENES DE APOYO-->
                            <div class="form-row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" id="exam-apoyo">
                                            <button class="accor-closed btn pt-1 pb-0 pl-1 btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#exam-apoyo-c" aria-expanded="false" aria-controls="exam-apoyo-c">
                                              Exámenes de apoyo
                                            </button>
                                        </div>
                                        <div id="exam-apoyo-c" class="collapse show" aria-labelledby="exam-apoyo" data-parent="#exam-apoyo">
                                            <div class="card-body-aten shadow-none">
                                                <form>
                                                    <input type="file" class="form-control-file pb-3" id="exampleFormControlFile1">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--BOTONES ACCION-->
                            <div class="row pb-3">
                                <div class="col-md-12 text-center">
                                    <button type="button" class="btn btn-info">Guardar</button>
                                    <button type="button" class="btn btn-success">Imprimir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
