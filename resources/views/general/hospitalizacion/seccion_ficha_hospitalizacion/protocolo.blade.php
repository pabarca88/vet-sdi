<div class="user-profile user-card mt-0" style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-3 shadow-none">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                <h6 class="f-20 text-c-blue d-inline">Protocolo operatorio</h6>
                <div class=" d-inline">
                     <script>
                        var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
                            "Octubre", "Noviembre", "Diciembre");

                        var f = new Date();
                        document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
                    </script>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-paciente_protocolo-tab" data-toggle="tab" href="#info-paciente_protocolo" role="tab" aria-controls="info-paciente_protocolo"  aria-selected="true">Información Paciente</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="cirugia-equipo-pab-tab" data-toggle="tab" href="#cirugia-equipo-pab" role="tab" aria-controls="cirugia-equipo-pab" aria-selected="false">Equipo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="biopsia-pab-tab" data-toggle="tab" href="#biopsia-pab" role="tab" aria-controls="biopsia-pab" aria-selected="false">Biopsia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="operacion-pab-tab" data-toggle="tab" href="#operacion-pab" role="tab" aria-controls="operacion-pab" aria-selected="false">Operación</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="anestesia-protocolo-pab-tab" data-toggle="tab" href="#anestesia-protocolo-pab" role="tab" aria-controls="anestesia-protocolo-pab" aria-selected="false">Anestesia</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="consentimientos-pab-tab" data-toggle="tab" href="#consentimientos-pab" role="tab" aria-controls="consentimientos-pab" aria-selected="false">Consentimientos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="destino-pos-op-pab-tab" data-toggle="tab" href="#destino-pos-op-pab" role="tab" aria-controls="destino-pos-op-pab" aria-selected="false">Destino Pos-op</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="protocolo">
                            <!--INFO. INGRESO-->
                            <div class="tab-pane fade show active" id="info-paciente_protocolo" role="tabpanel"
                                aria-labelledby="info-paciente_protocolo-tab">
                                <!--Información general-->
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Información del paciente</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label-activo-sm">Patologías Crónicas y riesgos especiales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=4" onblur="this.rows=1;"name="ind_ingreso" id="ind_ingreso"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Rut</label>
                                            <input type="text" class="form-control form-control-sm" name="rut_protocolo_operatorio_dental"  id="rut_protocolo_operatorio_dental" value="{{ $paciente->rut }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre_protocolo_operatorio_dental"  id="nombre_protocolo_operatorio_dental" value="{{ $paciente->nombres . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad_protocolo_operatorio" id="edad_protocolo_operatorio">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Nacimiento</label>
                                            <input type="text" class="form-control form-control-sm" name="edad_protocolo_operatorio_dental" id="edad_protocolo_operatorio_dental" value="{{ $paciente->fecha_nac }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Previsión</label>
                                            <input type="text" class="form-control form-control-sm"  name="prevision_protocolo_operatorio_dental" id="prevision_protocolo_operatorio_dental"value="{{ $paciente->Prevision()->first()->nombre }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Teléfono</label>
                                            <input type="text" class="form-control form-control-sm" name="telefono_protocolo_operatorio_dental"id="telefono_protocolo_operatorio_dental"value="{{ $paciente->telefono_uno }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="floating-label-activo-sm">Hospital / Clínica</label>
                                            <input type="text" class="form-control form-control-sm" name="telefono_protocolo_operatorio_dental"id="telefono_protocolo_operatorio_dental"value="">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Nº Pabellón</label>
                                            <input type="number" class="form-control form-control-sm" name="nro_pabellon_protocolo_operatorio_dental" id="nro_pabellon_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Inicio operación</label>
                                            <input type="time" class="form-control form-control-sm"name="inicio_operacion_protocolo_operatorio_dental"id="inicio_operacion_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="floating-label-activo-sm">Fin operación</label>
                                            <input type="time" class="form-control form-control-sm" name="fin_operacion_protocolo_operatorio_dental" id="fin_operacion_protocolo_operatorio_dental">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Información de cirugía</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Diagnóstico pre operatorio</label>
                                            <input type="text" class="form-control form-control-sm"name="diag_preoperatorio_protocolo_operatorio_dental" id="diag_preoperatorio_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Diagnóstico post operatorio</label>
                                            <input type="text" class="form-control form-control-sm"  name="diag_postoperatorio_protocolo_operatorio_dental" id="diag_postoperatorio_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Código cirugía</label>
                                            <input type="text" class="form-control form-control-sm" name="codigo_cirugia_protocolo_operatorio_dental"id="codigo_cirugia_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label-activo-sm">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm" name="anestesia_protocolo_operatorio_dental" id="anestesia_protocolo_operatorio_dental">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--EQUIPO-->
                            <div class="tab-pane fade show" id="cirugia-equipo-pab" role="tabpanel"  aria-labelledby="cirugia-equipo-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Equipo</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Cirujano</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;" name="cirujano_protocolo_operatorio" id="cirujano_protocolo_operatorio"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Ayudantes</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;" name="ayudantes_protocolo_operatorio" id="ayudantes_protocolo_operatorio"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Anestesistas y ayudantes de anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;" name="anestesias_ayudantes_protocolo_operatorio_dental" id="anestesias_ayudantes_protocolo_operatorio_dental"></textarea>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Arsenalería</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=2;"  name="arsenaleria_protocolo_operatorio_dental" id="arsenaleria_protocolo_operatorio_dental"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--BIOPSIA-->
                            <div class="tab-pane fade show" id="biopsia-pab" role="tabpanel"aria-labelledby="biopsia-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Biopsia</h6>
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Rápida</label>
                                            <input type="text" class="form-control form-control-sm" name="biopsia_rapida_protocolo_operatorio_dental"  id="biopsia_rapida_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Diferida</label>
                                            <input type="text" class="form-control form-control-sm" name="biopsia_diferida_protocolo_operatorio_dental" id="biopsia_diferida_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Nº de muestras</label>
                                            <input type="number" class="form-control form-control-sm"name="biopsia_nro_muestra_protocolo_operatorio_dental" id="biopsia_nro_muestra_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-md-6 col-lg-6 col-xl-6">
                                            <label class="floating-label">Patólogo</label>
                                            <input type="text" class="form-control form-control-sm" name="biopsia_patologo_protocolo_operatorio_dental" id="biopsia_patologo_protocolo_operatorio_dental">
                                        </div>
                                        <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <label class="floating-label-activo-sm">Indicaciones especiales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--OPERACION-->
                            <div class="tab-pane fade show" id="operacion-pab" role="tabpanel"aria-labelledby="operacion-pab-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                        <select class="form-control form-control-sm" id="select_ficha_tipo_cirugia-prof" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_cirugia-prof','descripcion_ficha_tipo_cirugia-prof');">
                                            <option value="">Seleccione</option>
                                            @if(!empty($fichaTipo['ped_gen']))
                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <span id="descripcion_ficha_tipo_cirugia-prof"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Operación</label>
                                            <input type="text" class="form-control form-control-sm" name="operacion_nombre_protocolo" id="operacion_nombre_protocolo">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Material de Hemostasia</label>
                                            <input type="text" class="form-control form-control-sm" name="operacion_nombre_protocolo" id="operacion_nombre_protocolo">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Material de Cierre</label>
                                            <input type="text" class="form-control form-control-sm" name="operacion_nombre_protocolo" id="operacion_nombre_protocolo">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Otros</label>
                                            <input type="text" class="form-control form-control-sm" name="operacion_nombre_protocolo" id="operacion_nombre_protocolo">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Descripción Operatoria</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=7" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--ANESTESIA-->
                            <div class="tab-pane fade show" id="anestesia-protocolo-pab" role="tabpanel"aria-labelledby="anestesia-protocolo-pab-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <label class="floating-label-activo-sm">Carga ficha tipo</label>
                                        <select class="form-control form-control-sm" id="select_ficha_tipo_cirugia-prof" onchange="cargar_info_ficha_tipo_ped_gen('select_ficha_tipo_cirugia-prof','descripcion_ficha_tipo_cirugia-prof');">
                                            <option value="">Seleccione</option>
                                            @if(!empty($fichaTipo['ped_gen']))
                                                @foreach ($fichaTipo['ped_gen'] as $ft )
                                                    <option value="{{ $ft->id }}" data-descripcion="{{ $ft->descripcion }}">{{ $ft->nombre }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <span id="descripcion_ficha_tipo_cirugia-prof"></span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Farmacos</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Evolución signos vitales</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Incidentes</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group fill">
                                            <label class="floating-label-activo-sm">Descripción</label>
                                            <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=5" onblur="this.rows=1;"name="instrumental_especial" id="nstrumental_especial"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--CONSENTIMIENTOS-->
                            <div class="tab-pane fade show" id="consentimientos-pab" role="tabpanel"aria-labelledby="consentimientos-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h6 class="t-aten">Consentimientos</h6>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <!-- [ Main Content ] start -->
                                            <div class="dropzone" id="mis-imagenes" action="">
                                            </div>
                                            <!-- [ file-upload ] end -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!--IND POST-OP-->
                            <div class="tab-pane fade show" id="destino-pos-op-pab" role="tabpanel"aria-labelledby="destino-pos-op-pab-tab">
                                <form>
                                    <div class="form-row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <h6 class="t-aten">DESTINO E INDICACIONES POST-OPERATORIAS</h6>
                                            <div class="form-group">
                                                <label class="floating-label-activo-sm">Comentarios</label>
                                                <textarea class="form-control caja-texto form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="otros_hosp" id="otros_hosp"></textarea>
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
    </div>
</div>

