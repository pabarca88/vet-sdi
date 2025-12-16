<div id="carnet_alta_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="carnet_alta_modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white text-center">Carnet de alta</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <form>
                                <div class="form-row">
                                    <h6 class="mb-3">Identificación del paciente</h6>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Nombre</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre" id="nombre"
                                            value="{{ $paciente->nombre . ' ' . $paciente->apellido_uno . ' ' . $paciente->apellido_dos }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Rut</label>
                                        <input type="text" class="form-control form-control-sm" name="Rut" id="rut"
                                            value="{{ $paciente->rut }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Correo electrónico</label>
                                        <input type="text" class="form-control form-control-sm" name="email" id="email"
                                            value="{{ $paciente->email }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Semanas de embarazo</label>
                                        <input type="text" class="form-control form-control-sm" name="sem_emb" id="sem_emb">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">N° embarazo</label>
                                        <input type="text" class="form-control form-control-sm" name="num_emb" id="num_emb">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Antec. partos anteriores</label>
                                        <input type="text" class="form-control form-control-sm" name="p_anteriores" id="p_anteriores">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <h6 class="mb-3">I.- Datos de hospitalización</h6>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Clínica / Hospital</label>
                                        <input type="text" class="form-control form-control-sm" name="clinica_hospital"
                                            id="clinica_hospital" value="{{ $lugar_atencion->nombre }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Servicio</label>
                                        <input type="text" class="form-control form-control-sm" name="servicio" id="servicio">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Rut paciente</label>
                                        <input type="text" class="form-control form-control-sm" name="rut" id="rut"
                                            value="{{ $paciente->rut }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Desde</label>

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Hasta</label>


                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Total de días</label>



                                    </div>
                                </div>
                                <div class="form-row">
                                    <h6 class="my-3">II.- Dignósticos</h6>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Diagnósticos de ingreso</label>
                                        <input class="form-control form-control-sm" name="" id="">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Diagnósticos de alta</label>
                                        <input class="form-control form-control-sm" name="" id="">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <h6 class="my-3">III.- Tratamientos y cirugías realizadas</h6>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Tratamientos</label>
                                        <input class="form-control form-control-sm" name="" id="">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="floating-label">Procedimientos quirúrgicos</label>
                                        <input class="form-control form-control-sm" name="" id="">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="floating-label">Otros procedimientos y/o tratamientos</label>
                                        <input class="form-control form-control-sm" name="" id="">

                                    </div>
                                </div>

                                <div class="form-row">
                                    <h6 class="my-3">IV.- Controles e indicaciones al alta</h6>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label-activo-sm">Fecha</label>
                                        <input type="text" class="form-control form-control-sm" name="fecha" id="fecha">
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label class="floating-label">Indicaciones</label>
                                        <input class="form-control form-control-sm">

                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Rut</label>
                                        <input type="text" class="form-control form-control-sm" name="rut_profesional"id="rut_profesional" value="{{ $profesional->rut }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Nombre y Apellidos</label>
                                        <input type="text" class="form-control form-control-sm" name="nombre_profesional" id="nombre_profesional" value="{{ $profesional->nombre . ' ' . $profesional->apellido_uno }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="floating-label">Email</label>
                                        <input type="text" class="form-control form-control-sm" name="email_profesional" id="email_profesional" value="{{ $profesional->email }}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
