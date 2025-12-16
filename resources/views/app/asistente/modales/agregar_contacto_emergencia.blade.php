<!-- Modal agregar contacto emergencia-->
<div id="agregar_contacto_emergencia" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="agregar_contacto_emergencia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white text-center">Agregar contacto de emergencia</h5>
                <button type="button" class="close text-white" onclick="cerrar_agregar_contacto_emergencia();" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <h6 class="text-c-blue ml-1 mb-3">Ingrese los datos de su contacto de emergencia</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Rut</label>
                                <input type="text" class="form-control" name="rut_nuevo_contacto" id="rut_nuevo_contacto" onkeyup="formatoRut(this);">
                                <span id="mensaje_asistente"></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-info" onclick="buscar_contacto()" type="button" id="">Buscar
                            </button>
                        </div>
                    </div>
                    <div class="row" id="form_contacto_nuevo" name="form_contacto_nuevo" style="display: none">

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Nombres</label>
                                <input type="text" class="form-control" name="nombres_contacto_emergencia" id="nombres_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Primer Apellido</label>
                                <input type="text" class="form-control" name="apellido_uno_contacto_emergencia" id="apellido_uno_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Segundo Apellido</label>
                                <input type="text" class="form-control" name="apellido_dos_contacto_emergencia" id="apellido_dos_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Fecha Nacimiento</label>
                                <input type="date" class="form-control" name="fecha_nac_contacto_emergencia" id="fecha_nac_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-9 col-md-9">
                            <div class="form-group">
                                <label class="floating-label-activo">Direcci&oacute;n</label>
                                <input type="address" class="form-control" name="direccion_contacto_emergencia" id="direccion_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="floating-label-activo">N&uacute;mero</label>
                                <input type="address" class="form-control" name="numero_dir_contacto_emergencia" id="numero_dir_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Regi&oacute;n</label>
                                <select id="region_agregar_emergencia" onchange="buscar_ciudad_general('region_agregar_emergencia', 'ciudad_agregar_emergencia', 0);" name="region_agregar_emergencia" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($region as $reg)
                                        @if (isset($region))
                                            <option value="{{ $reg->id }}">{{ $reg->nombre }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Comuna</label>
                                <select id="ciudad_agregar_emergencia" name="ciudad_agregar_emergencia" class="form-control" required>
                                    <option value="0">Seleccione</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email_contacto_emergencia" id="email_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label-activo">Teléfono</label>
                                <input type="tel" class="form-control" name="telefono_contacto_emergencia" id="telefono_contacto_emergencia">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Parentezco</label>
                                <select id="parentezco_contacto_emergencia" name="parentezco_contacto_emergencia"
                                    class="form-control">
                                    <option value="0">Seleccione una opción</option>
                                    <option value="Pareja">Pareja</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Hermano/a">Hermano/a</option>
                                    <option value="Abuelo/a">Abuelo/a</option>
                                    <option value="Tío/a">Tío/a</option>
                                    <option value="Primo/a">Primo/a</option>
                                    <option value="Amigo/a">Amigo/a</option>
                                    <option value="Otro">Otro</option>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  el parentezco-->
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label class="floating-label">Prioridad</label>
                                <select id="prioridad_contacto_emergencia" name="prioridad_contacto_emergencia"
                                    class="form-control">
                                    <option value="0">Seleccione una opción</option>
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cerrar_agregar_contacto_emergencia();" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="registrar_contacto_emergencia();" class="btn btn-info">Guardar
                            Contacto</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    function cerrar_agregar_contacto_emergencia() {
        $('#agregar_contacto_emergencia').modal('hide');
        $('#form_contacto_nuevo').hide();
        //  $(this).find('form').trigger('reset');
    }
</script>