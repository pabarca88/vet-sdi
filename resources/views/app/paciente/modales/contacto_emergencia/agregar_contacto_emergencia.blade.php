<!-- Modal agregar contacto emergencia-->
<div id="agregar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="agregar_contacto_emergencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Agregar contacto de emergencia</h5>
                <button type="button" class="close text-white" onclick="cerrar_agregar_contacto_emergencia();" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->id }}">
                    <div class="form-row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Rut</label>
                                <input type="text" class="form-control form-control-sm" name="rut_nuevo_contacto" id="rut_nuevo_contacto">
                                <span id="mensaje_asistente"></span>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <button class="btn btn-info btn-sm" onclick="buscar_contacto()" type="button" id=""><i class="feather icon-search"></i> Buscar</button>
                        </div>
                    </div>
                    <div class="form-row" id="form_contacto_nuevo" name="form_contacto_nuevo" style="display: none">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Nombres</label>
                                <input type="text" class="form-control form-control-sm" name="nombres_contacto_emergencia" id="nombres_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Primer Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="apellido_uno_contacto_emergencia" id="apellido_uno_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Segundo Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="apellido_dos_contacto_emergencia" id="apellido_dos_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha nacimiento</label>
                                <input type="date" class="form-control form-control-sm" name="fecha_nac_contacto_emergencia" id="fecha_nac_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Direcci&oacute;n</label>
                                <input type="address" class="form-control form-control-sm" name="direccion_contacto_emergencia" id="direccion_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                            <div class="form-group">
                                <label class="floating-label-activo">N&uacute;mero</label>
                                <input type="address" class="form-control form-control-sm" name="numero_dir_contacto_emergencia" id="numero_dir_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Regi&oacute;n</label>
                                <select id="region_agregar" onchange="buscar_ciudades();" name="region_agregar" class="form-control form-control-sm" required>
                                    <option value="">Seleccione</option>
                                    @if (isset($regiones))
                                        @foreach ($regiones as $reg)
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Comuna</label>
                                <select id="ciudad_agregar" name="ciudad_agregar" class="form-control form-control-sm" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Correo electrónico</label>
                                <input type="email" class="form-control form-control-sm" name="email_contacto_emergencia" id="email_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Teléfono</label>
                                <input type="tel" class="form-control form-control-sm" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Parentezco</label>
                                <select id="parentezco_contacto_emergencia" name="parentezco_contacto_emergencia" class="form-control form-control-sm">
                                    <option value="0">Seleccione una opción</option>
                                    <option value="Pareja">Pareja</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hermano/a">Hermano/a</option>
                                    <option value="Abuelo/a">Abuelo/a</option>
                                    <option value="Tío/a">Tío/a</option>
                                    <option value="Primo/a">Primo/a</option>
                                    <option value="Amigo/a">Amigo/a</option>
                                    <option value="Otro">Otro</option> el parentezco-->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Prioridad</label>
                                <select id="prioridad_contacto_emergencia" name="prioridad_contacto_emergencia" class="form-control form-control-sm">
                                    <option>Seleccione una opción</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <button type="button" onclick="registrar_contacto_emergencia();" class="btn btn-info btn-sm"><i class="feather icon-save"></i> Guardar contacto</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cerrar_agregar_contacto_emergencia();" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="feather icon-x"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
