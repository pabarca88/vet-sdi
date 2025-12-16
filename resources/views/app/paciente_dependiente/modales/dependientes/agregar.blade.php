<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_agregar_dep_buscar">
  Launch
</button> -->

<!-- Modal busqueda por rut -->
<div class="modal fade" id="modal_agregar_dep_buscar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Buscar Rut Dependiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_input_rut" id="modal_agregar_dep_input_rut" value="">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="buscar_rut_dep();">Buscar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal agregar paciente existente -->
<div class="modal fade" id="modal_agregar_dep_existente" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Agregar Dependiente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <input type="hidden" name="id_paciente_dependiente" id="id_paciente_dependiente">

                <div class="row">
                    <div class="col-md-6">
                        <label class="label text-bolt">Nombre:</label><label name="label_agregar_nombre_paciente" id="label_agregar_nombre_paciente"></label>
                    </div>
                    <div class="col-md-6">
                        <label class="label text-bolt">Apellido:</label><label name="label_agregar_apellido_paciente" id="label_agregar_apellido_paciente"></label>
                    </div>
                    <div class="col-md-6">
                        <label class="label text-bolt">Rut:</label><label name="label_agregar_rut_paciente" id="label_agregar_rut_paciente"></label>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Relación</label>
                            <select class="form-control form-control-sm" name="agregar_relacion" id="agregar_relacion" onchange="cargar_tipo_dependencia('agregar_relacion','agregar_tipo_dependencia');">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm"><span style="color: red;">*</span>Tipo Dependencia</label>
                            <select class="form-control form-control-sm" name="agregar_tipo_dependencia" id="agregar_tipo_dependencia" onchange="evaluar_tipodependencia('agregar_tipo_dependencia', 'agregar_fechas', 3);">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>
                    <div class="agregar_fechas" name="agregar_fechas" id="agregar_fechas" style="display: none;">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="agregar_fecha_inicio"><span style="color: red;">*</span>Fecha Inicio</label>
                                <input type="date" name="agregar_fecha_inicio" id="agregar_fecha_inicio" value="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="agregar_fecha_termino"><span style="color: red;">*</span>Fecha Termino</label>
                                <input type="date" name="agregar_fecha_termino" id="agregar_fecha_termino" value="">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="floating-label-activo-sm">Comentario</label>
                            <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="agregar_comentario" id="agregar_comentario"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12"><span style="color: red;">*</span>Campos requeridos</div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="registrar_dep_existente();">Registrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal agregar paciente nuevo -->
<div class="modal fade" id="modal_agregar_dep_nuevo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h5 class="modal-title text-white mt-1" id="modal_indicar_examen">Agregar Dependiente No registrado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_rut">*</span>Rut</label>
                        <input type="text" required class="form-control form-control-sm" name="modal_agregar_dep_nuevo_rut" id="modal_agregar_dep_nuevo_rut">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_nombres_paciente">*</span>Nombres</label>
                        <input type="text" required class="form-control form-control-sm" name="modal_agregar_dep_nuevo_nombres_paciente" id="modal_agregar_dep_nuevo_nombres_paciente">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_apellido_uno">*</span>Primer Apellido</label>
                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_apellido_uno" id="modal_agregar_dep_nuevo_apellido_uno">
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_apellido_dos">*</span>Segundo Apellido</label>
                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_apellido_dos" id="modal_agregar_dep_nuevo_apellido_dos">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_fecha_nac">*</span>F. Nacimiento</label>
                        <input type="date" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_fecha_nac" id="modal_agregar_dep_nuevo_fecha_nac" max="{{ date('Y-m-d') }}" onchange="validar_requeridos('modal_agregar_dep_nuevo_fecha_nac');">
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Sexo</label>
                        <select id="modal_agregar_dep_nuevo_sexo" name="modal_agregar_dep_nuevo_sexo" class="form-control form-control-sm">
                            <option value="0">Selecione una opci&oacute;n</option>
                            <option value="F">Femenino</option>
                            <option value="M">Masculino</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Previsi&oacute;n</label>
                        <select id="modal_agregar_dep_nuevo_convenio" name="modal_agregar_dep_nuevo_convenio" class="form-control form-control-sm">
                            <option value="0">Selecione una opci&oacute;n</option>
                            @if (isset($prevision))
                                @foreach ($prevision as $p)
                                    <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_direccion">*</span>Direcci&oacute;n</label>
                        <input type="address" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_direccion" id="modal_agregar_dep_nuevo_direccion">
                    </div>
                </div>

                <div class="col-sm-4 col-md-4">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Depto. | Ofic.</label>
                        <input type="address" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_numero_dir" id="modal_agregar_dep_nuevo_numero_dir">
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Region</label>
                        <select onchange="buscar_ciudad('modal_agregar_dep_nuevo_region', 'modal_agregar_dep_nuevo_ciudad',$('#modal_agregar_dep_nuevo_region').val());" name="modal_agregar_dep_nuevo_region" id="modal_agregar_dep_nuevo_region"  class="form-control form-control-sm" required>
                            <option value="0">Seleccione Regio&oacute;n</option>
                            @if (isset($region))
                                @foreach ($region as $reg)
                                    <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_sm">*</span>Ciudad</label>
                        <select id="modal_agregar_dep_nuevo_ciudad" name="modal_agregar_dep_nuevo_ciudad" class="form-control form-control-sm" required>
                            <option value="0">Seleccione Ciudad</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_correo">*</span>Correo Electr&oacute;nico</label>
                        <input type="text" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_correo" id="modal_agregar_dep_nuevo_correo">
                        <span id="mensaje_email_reserva" style="display:none"></span>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_telefono_uno">*</span>Tel&eacute;fono</label>
                        <input type="tel" class="form-control form-control-sm" name="modal_agregar_dep_nuevo_telefono_uno" id="modal_agregar_dep_nuevo_telefono_uno">
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_modal_agregar_dep_nuevo_tipo_dependencia">*</span>Relación</label>
                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_relacion" id="modal_agregar_dep_nuevo_relacion" onchange="cargar_tipo_dependencia('modal_agregar_dep_nuevo_relacion','modal_agregar_dep_nuevo_tipo_dependencia');">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm"><span class="requerido" style="color: red;" id="requerido_3">*</span>Tipo Dependencia</label>
                        <select class="form-control form-control-sm" name="modal_agregar_dep_nuevo_tipo_dependencia" id="modal_agregar_dep_nuevo_tipo_dependencia" onchange="evaluar_tipodependencia('modal_agregar_dep_nuevo_tipo_dependencia', 'modal_agregar_dep_nuevo_fechas', 3);">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
                <div class="modal_agregar_dep_nuevo_fechas" name="modal_agregar_dep_nuevo_fechas" id="modal_agregar_dep_nuevo_fechas" style="display: none;">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="modal_agregar_dep_nuevo_fecha_inicio"><span class="requerido" style="color: red;" id="equerido_')">*</span>Fecha Ir nicio</label>
                            <input class="form-control form-control-sm" type="date" name="modal_agregar_dep_nuevo_fecha_inicio" id="modal_agregar_dep_nuevo_fecha_inicio" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="modal_agregar_dep_nuevo_fecha_termino"><span class="requerido" style="color: red;" id="">*</span>Fecha requerido_Tvalueermino</label>
                            <input type="date" name="modal_agregar_dep_nuevo_fecha_termino" id="modal_agregar_dep_nuevo_fecha_termino" value="">
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label class="floating-label-activo-sm">Comentario</label>
                        <textarea class="form-control form-control-sm" rows="1"  onfocus="this.rows=3" onblur="this.rows=1;" name="modal_agregar_dep_nuevo_comentario" id="modal_agregar_dep_nuevo_comentario"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12"><span style="color: red;" >*</span>Campos requeridos</div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="registrar_dep_nuevo();">Registrar</button>
        </div>

    </div>
  </div>
</div>

