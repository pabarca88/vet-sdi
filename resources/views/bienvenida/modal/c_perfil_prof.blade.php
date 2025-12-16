<div id="c_perfil_prof" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="c_peso" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content" >
			<div class="modal-header">
				<h5 class="modal-title text-c-blue mt-1">Perfil académico</h5>
				<hr>
				<script>
                        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

                        var f=new Date();
                        document.write( f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
				</script>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
			</div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <ul class="nav nav-tabs-aten nav-fill mb-3" id="ev-nutricional" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset active" id="info-titulo-tab" data-toggle="tab" href="#info-titulo" role="tab" aria-controls="info-titulo" aria-selected="true">Titulo Profesional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="info-especialidad-tab" data-toggle="tab" href="#info-especialidad" role="tab" aria-controls="info-especialidad" aria-selected="false">Especialidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="info-subesp-tab" data-toggle="tab" href="#info-subesp" role="tab" aria-controls="info-subesp" aria-selected="false">Subespecialidad</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="equiinfo-otros" data-toggle="tab" href="#info-otros" role="tab" aria-controls="info-otros" aria-selected="false">Otros</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link-aten text-reset" id="archivos-info-tab" data-toggle="tab" href="#archivos-info" role="tab" aria-controls="archivos-pab" aria-selected="false">Archivos</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="tab-content" id="ev-nutricional">
                            <!--INFO. TITULO-->
                            <div class="tab-pane fade show active" id="info-titulo" role="tabpanel" aria-labelledby="info-titulo-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6>Titulo Profesional</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Profesión</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Universidad</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Año de Titulo</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ciudad y País</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">N° SUPERSALUD</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">N° colegio profesional</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                            </div>
                             <!--ESPECIALIDAD-->
                            <div class="tab-pane fade show" id="info-especialidad" role="tabpanel" aria-labelledby="info-especialidad-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6>Especialidad</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Profesión</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Universidad</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Año de Titulo</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ciudad y País</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                            </div>
                            <!--SUBESPECIALIDAD-->
                            <div class="tab-pane fade show" id="info-subesp" role="tabpanel" aria-labelledby="info-subesp-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6>Subespecialidad</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Profesión</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Universidad</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Año de Titulo</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ciudad y País</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                            </div>
                            <!--OTROS-->
                            <div class="tab-pane fade show" id="info-otros" role="tabpanel" aria-labelledby="info-otros-tab">
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6>Otros Cursos y Perfecionamiento</h6>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Profesión</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Universidad</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Año de Titulo</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <label class="floating-label-activo-sm">Ciudad y País</label>
                                        <input type="text" class="form-control form-control-sm" id="agregar_ant_academico_profesion">
                                    </div>
                                </div>
                            </div>
                            <!--ARCHIVO-->
                            <div class="tab-pane fade show" id="archivos-info" role="tabpanel" aria-labelledby="archivos-info-tab">
                                <form>
                                    <div class="form-row mb-2">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                        <h6 class="mb-2 text-c-blue">SI LO DESEA PUEDE SUBIR LOS ARCHIVOS DE RESPALDO</h6>
                                        <input class="mb-2" size="80" name="archivo_up" id="archivo_up" type="file" onchange="javascript: submit();">
                                        <br>
                                        <!--IDEA DEL ARCHIVO ADJUNTO
                                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Nombre del archivo</a>
                                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="alert alert-warning alert-dismissible fade show pb-2" role="alert">
                                            <i class="feather icon-file f-16"></i><a href="#" class="alert-link"> Eco -Doppler- Nombre paciente.pdf</a>
                                            <button type="button" class="close pt-1" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>-->
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

<script>
    function perfil() {
        $('#c_perfil_prof').modal('show');
    }
</script>
