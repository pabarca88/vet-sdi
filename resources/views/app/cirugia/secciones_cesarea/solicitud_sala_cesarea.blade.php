<div class="user-profile user-card mt-0"style="background-color: #ecf0f5!important;">
    <div class="col-md-12 py-0 px-2 shadow-none">
        <div class="row mx-0">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row bg-white shadow-sm rounded mx-3 mt-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt-3 mb-0">
                        <h6 class="f-16 text-c-blue">Solicitud de sala de partos</h6>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <!--Información y autorización-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">Información y autorización clínica</h6>
                            </div>
                            <div class="card-body shadow-none">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Clínica / Hospital</label>
                                            <input type="text" class="form-control form-control-sm" name="clinica_hospital" id="clinica_hospital">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="Email" class="form-control form-control-sm" name="email" id="email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código</label>
                                            <input type="number" class="form-control form-control-sm" name="codigo" id="codigo">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <h6 class="text-secondary">00/00/000</h6>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label-activo">Fecha y hora operación</label>
                                            <input type="datetime-local" class="form-control form-control-sm" name="fecha_hora" id="fecha_hora">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Grado de urgencia</label>
                                            <select id="g_urgencia" name="g_urgencia" class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>  
                                                <option>Normal</option> 
                                                <option>Urgente</option> 
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button type="button" class="btn btn-info btn-sm btn-block">Solicitar código</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Información paciente-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">Información general de la paciente</h6>
                            </div>
                            <div class="card-body shadow-none">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Rut</label>
                                            <input type="number" class="form-control form-control-sm" name="rut" id="rut">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Nombre completo</label>
                                            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Edad</label>
                                            <input type="text" class="form-control form-control-sm" name="edad" id="edad">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Previsión</label>
                                            <input type="text" class="form-control form-control-sm" name="prevision" id="prevision">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Correo electrónico</label>
                                            <input type="email" class="form-control form-control-sm" name="email" id="email">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Teléfono</label>
                                            <input type="tel" class="form-control form-control-sm" name="telefono" id="telefono">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patologías crónicas</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Cesareas previas</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Semanas de embarazo</label>
                                            <input type="text" class="form-control form-control-sm" name="prevision" id="prevision">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Evolución</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Riesgo fetal</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Riesgo materno</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Patología embarazo</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;"></textarea>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Código de cirugía</label>
                                            <input type="number" class="form-control form-control-sm" name="telefono" id="telefono">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Anestesia</label>
                                            <input type="text" class="form-control form-control-sm" name="telefono" id="telefono">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="floating-label">Tipo de hospital</label>
                                            <select id="g_urgencia" name="g_urgencia" class="form-control form-control-sm">
                                                <option selected value="0">Seleccione</option>  
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Equipo-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">Equipo</h6>
                            </div>
                            <div class="card-body shadow-none">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Cirujano</label>
                                            <input type="text" class="form-control form-control-sm" name="cirujano" id="cirujano">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Ayudantes</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ayudantes" id="ayudantes"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Anestesistas y ayudantes de anestesia</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ayud_anestes" id="ayud_anestes"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Arsenalería</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="arsena" id="arsena"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Neonatólogo/a</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="equip_espec" id="equip_espec"></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="floating-label">Enfermero/a</label>
                                            <input type="text" class="form-control form-control-sm" name="codigo_cirugia" id="codigo_cirugia">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--Otros profesionales-->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header bg-info align-middle">
                                <h6 class="float-left d-inline">Otros</h6>
                            </div>
                            <div class="card-body shadow-none">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="floating-label">Comentarios y observaciones</label>
                                            <textarea class="form-control form-control-sm" rows="1" onfocus="this.rows=3" onblur="this.rows=1;" name="ayudantes" id="ayudantes"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-12 text-center">
                        <button type="reset" class="btn btn-danger">Borrar formulario</button>
                        <button type="submit" class="btn btn-info">Enviar formulario</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>